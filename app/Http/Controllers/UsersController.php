<?php 

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Roles;
use App\Models\RolePermissions;

use Session;
use Input;
use Auth;
use Redirect;
use Response;
use Validator;
use File;
use Hash;
use Crypt;
use Swift_Validate;
use Mail;
use Lang;


class UsersController extends Controller{
	
	public function login(){

		$email    = trim( Input::get('email') );
		$password = Input::get('password');

		$user = Users::get($parameters=array('email' => $email));

        if ($user) {
            
            if($user[0]->status == 0){

    			return Redirect::back()->with('error_msg', Lang::get('login.msg-inactive'));
    		}

    		if ( Auth::attempt( array('email' => $email, 'password' => $password ) ) ){

    			Session::put('user_id', $user[0]->user_id);
    			Session::put('user_name', $user[0]->name);
                Session::put('user_lastname', $user[0]->lastname);
    			Session::put('user_email', $user[0]->email);
                Session::put('user_role_id', $user[0]->role_id);
                Session::put('user_avatar', $user[0]->avatar);
    			
    			return Redirect::intended('/');		
    		}
        }

		return Redirect::back()->with('error_msg', Lang::get('login.msg-credentials'));

	}

	public function getLogout(){

		Auth::logout();
		Session::flush();

		return Redirect::to('Log-in')->with('msg', Lang::get('login.msg-logout'));
	}

	public function index(){
    
        if( RolePermissions::CheckPermission(Session::get('user_role_id'), 1)){
            $users 	= Users::get();
    
            return view('users.users-table',
                        array(  'users'     => $users,
                                'menu'      => 'users',
                                'submenu'   => 'users')
                        );
        }
        else{
            return view('errors.no_permission',
                    array(  'module'    => 'Users',
                            'menu'      => 'users',
                            'submenu'   => 'users')
                    );  
        }
    }

    public function add(){
    
        $roles = Roles::get(['status'=> 1, 'visible'=> 0]);

        return view('users.new-user',
        			array('roles' => $roles)
        			);
    }

    public function store(){
        
        $rules = [
                    'image'    	=> 'required|image|max:1024*1024*1',
                    'name'    	=> 'required',
                    'lastname'  => 'required',
                    'email' 	=> 'required|unique:users|email',
                    'role_id'  	=> 'required',
                 ];
        
        $messages = [
                    'image.required'    => Lang::get('users.msg-avatar'),
                    'image.image'       => Lang::get('users.msg-format'),
                    'image.max'         => Lang::get('users.msg-max'),
                    ];
        
        $input = Input::all();

        $validator = Validator::make($input, $rules, $messages);
        
        if ($validator->fails()){
         
            $messages = $validator->messages();

            return redirect('Users')->withErrors($messages->all());
            
        }
        else{
            
            $destinationPath = 'img/users'; // upload path
            $file_name      = Input::file('image')->getClientOriginalName();
            $extension      = Input::file('image')->getClientOriginalExtension();

            $public         = public_path();
            $file_to_search = $public."/img/users/".$file_name;

            if (file_exists($file_to_search)) {
                
                $message = Lang::get('users.msg-duplicated');
                return redirect('Users')->withErrors($message);
            }
            
            $upload_success = Input::file('image')->move($destinationPath, $file_name); // uploading file to given path
            
            $input['avatar']    = $file_name;
            
            $new_user = Users::insert($input);

            if ($new_user['error'] == false) {
                
                //Send email with details
                $encrypted_email    = Crypt::encrypt($input['email']);

                $msg['subject']     = "Welcome to ".env('APP_NAME', 'Tasks Manager')." System";
                $msg['email']       = $input['email'];
                $msg['name']        = $input['name']." ".$input['lastname'];
                $msg['link']        = env('APP_URL').'/Verify-User/'.$encrypted_email;
                $msg['system']      = env('APP_NAME', 'Tasks Manager');


                if(Swift_Validate::email($input['email'])){
                    
                    Mail::send('emails.welcome', ['msg' => $msg], function ($m) use ($msg) {
                        $m->to($msg['email'], $msg['name'])->subject($msg['subject']);
                        $m->from( "welcome@moisesarmenta.info", "Moises Armenta");
                    });
                }

                return redirect('Users')->with('status', Lang::get('users.msg-saved'));
            }
            
            $message = Lang::get('users.msg-not-saved');
            
            return redirect('Users')->withErrors($message);
            
        }
    }

    public function edit($encrypted_id){
        
        $user_id    = Crypt::decrypt($encrypted_id);
        
        $user   = Users::get($parameters = array('user_id' => $user_id));
        
         $roles = Roles::get(['status'=> 1, 'visible'=> 0]);

        return view('users.edit-user', array('user' => $user[0], 'roles' => $roles) );
    }

    public function update($encrypted_id){
        $user_id    = Crypt::decrypt($encrypted_id);
        
        if(Input::file('image')){
            
            $rules = [
                    'image'     => 'required|image|max:1024*1024*1',
                    'name'      => 'required',
                    'lastname'  => 'required',
                    'email'     => 'required|email|unique:users,email,'.$user_id,
                    'role_id'   => 'required',
                    'status'    => 'required',
                    ];
        }
        else{

            $rules = [
                    'name'      => 'required',
                    'lastname'  => 'required',
                    'email'     => 'required|email|unique:users,email,'.$user_id,
                    'role_id'   => 'required',
                    'status'    => 'required',
                 ];    
        }
        
        $messages = [
                    'image.required'    => 'The image is required.',
                    'image.image'       => 'File format not allowed',
                    'image.max'         => 'Max size for the image is 1 MB',
                    ];
        
        $input = Input::all();

        $validator = Validator::make($input, $rules, $messages);
        
        if ($validator->fails()){
         
            $messages = $validator->messages();

            return redirect('Users')->withErrors($messages->all());
            
        }
        else{
            
            $file_name = "";

            if(Input::file('image')){

                $public         = public_path();
               
                
                $file_name      = Input::get('current_avatar');
                $file_to_delete = $public."/img/users/".$file_name;
                File::delete($file_to_delete); 
                
                $destinationPath= 'img/users'; // upload path
                $file_name      = Input::file('image')->getClientOriginalName();
                $extension      = Input::file('image')->getClientOriginalExtension();

                $file_to_search = $public."/img/users/".$file_name;

                if (file_exists($file_to_search)) {
                    
                    $message = Lang::get('users.msg-duplicated');
                    return redirect('Users')->withErrors($message);
                }
                
                $upload_success = Input::file('image')->move($destinationPath, $file_name); // uploading file to given path
            }
            
            
            Users::edit($user_id, $input, $file_name);
            
            return redirect('Users')->with('status', Lang::get('users.msg-updated'));
        }
    }

    public function random_password( $length = 10 ) {
        
        $chars      = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        
        $password   = substr( str_shuffle( $chars ), 0, $length );
        
        return $password;
    }

    /*public function verify($email){
    
        $email_to_verify = Crypt::decrypt($email);

        $user = Users::verify($email_to_verify);

        
        if($user['error'] == false){
            $user = Users::confirm($email_to_verify);

            Session::put('user_email', $email_to_verify);
            
            return view('auth.reset-password');
        }

        // else return view with error

        // return view('auth.verify',
        //             array('roles' => 'f')
        //             );
    }
*/
    public function verify($email){
    
        $email_to_verify = Crypt::decrypt($email);

        $user = Users::verify($email_to_verify);

        
        if($user['error'] == false){
            
            $user = Users::confirm($email_to_verify);

            Session::put('user_email', $email_to_verify);
            
            return view('auth.verify-user', array('encrypted_id' => $email,
                                                  'flag'   => 'set-password'));
        }
        else{

            $user = Users::where('email', $email_to_verify)->first();

            if($user->password == ""){

                Session::put('user_email', $email_to_verify);
            
                return view('auth.verify-user', array('encrypted_id' => $email,
                                                      'flag'   => 'no-password'));    
            }
            else{

                return view('auth.verify-user', array('encrypted_id' => $email,
                                                  'flag'   => 'verified'));    
            }  

        }

       
    }

    public function ResetUserPassword(){
    
        return view('auth.request-reset-password');
    }


    public function SetPassword(){
    
        Users::SetPassword(Session::get('user_email'));

        return Redirect::to('Log-in')->with('msg', Lang::get('login.msg-updated'));
    }

    public function ResetPassword(){
    
        $user = Users::where('email', '=', Input::get('email'))->where('status', '=', 1)->first();

        if ($user) {
            
            $encrypted_email    = Crypt::encrypt(Input::get('email'));
            $msg['subject']     = "Reset password request in ".env('APP_NAME', 'Campaign Manager')." System";
            $msg['email']       = Input::get('email');
            $msg['name']        = $user->name." ".$user->lastname;
            $msg['link']        = env('APP_URL')."/Reset-User-Password/".$encrypted_email;
            $msg['system']      = env('APP_NAME', 'Campaign Manager');

            Mail::send('emails.reset', ['msg' => $msg], function ($m) use ($msg) {
                        $m->to($msg['email'], $msg['name'])->subject($msg['subject']);
                        $m->from( env('MAIL_USERNAME'), env('APP_NAME')." Admin");
                    });

            return Redirect::to('Log-in')->with('msg', "Please check your email in order to reset your password.");
        }
        else{
            return Redirect::to('Log-in')->with('error_msg', "Email not found, please check your credentials."); 
        }   
    }

    public function SetNewPassword($email){
    
        $decrypted_email = Crypt::decrypt($email);

        $user = Users::where('email', '=', $decrypted_email)->where('status', '=', 1)->first();

        if ($user) {
            Session::put('user_email', $decrypted_email);
            return view('auth.reset-password');
        }
        else{
            return Redirect::to('Log-in')->with('error_msg', "Email not found, please check your credentials."); 
        }
       
    }

    public function delete($encrypted_id){
        
        $user_id    = Crypt::decrypt($encrypted_id);
        
        $user       = Users::get($parameters = array('user_id' => $user_id));

        return view('users.delete-user', array('user' => $user[0]) );
    }

    public function destroy($encrypted_id){
    
        $user_id    = Crypt::decrypt($encrypted_id);

        $user       = Users::destroy($user_id);  

        if($user['error'] == false){
            
            return redirect('Users')->with('status', $user['message']);
        }else{

            return redirect('Users')->with('error_msg', $user['message']);
        }
    }
   

}