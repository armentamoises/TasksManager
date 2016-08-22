<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyUtilFunctions;

use Validator;
use DB;
use Input;
use Hash;
use Crypt;
use Lang;


class Users extends Model{
	
	protected $table = 'users';
	
	protected $fillable = array(
				"name",
				"lastname",
				"email",
				"password",
				"role_id",
				"status",
				"avatar",
				"confirmed",
				"created_at",
				"updated_at",
				"rememeber_token"
	);
	

	public static function get($parameters=array()){
		
		$status   = MyUtilFunctions::getParameter('status',$parameters);
        $user_id  = MyUtilFunctions::getParameter('user_id',$parameters);
        $email    = MyUtilFunctions::getParameter('email',$parameters);
        $status   = MyUtilFunctions::getParameter('status',$parameters);
        $visible  = MyUtilFunctions::getParameter('visible',$parameters,1);

        $users = DB::table ('users')
						->join('roles', 'roles.id', '=', 'users.role_id')
					   	->select('users.id as user_id',
							    'users.name',
							    'users.lastname',
							    'users.email',
							    'users.role_id',
							    'users.status',
							    'users.avatar',
							    'users.created_at',
							    'users.updated_at',
							    'roles.name as role_name');
		
		if ($visible == 1) {
            $users=$users->where('users.status', '>', 0);
        }

        if ($status != "") {
			$users=$users->where('users.status', $status);
		}
		
		if ($user_id != "") {
			$users=$users->where('users.id', $user_id);
		}

		if ($email != "") {
			$users=$users->where('users.email', $email);
		}

		$users->orderBy('users.id', 'desc');
		
		$users = $users->get();

        $size    = sizeof($users);
        
        $counter = 0;

                while ($counter < $size){

                    $users[$counter]->encrypted_id = Crypt::encrypt($users[$counter]->user_id);
                    
                    $counter++;
                }
		
		return $users;
	}

	public static function insert($input){
        
    	$new_user = array();
        
        $var                  = static::create($input);
        $new_user['message']  = 'Data saved!';
        $new_user['error']    = false;
        $new_user['id']       = $var['id'];
        
        return $new_user; 
    }

    public static function edit($id, $input, $file_name){

        $answer = array();

        if ($file_name == "") {
            DB::table('users')
                    ->where('id',$id)
                    ->update(
                        array(      
                            'name'      =>  $input['name'],     
                            'lastname'  =>  $input['lastname'],
                            'email'  	=>  $input['email'],
                            'role_id'   =>  $input['role_id'],
                            'status'    =>  $input['status'],

                        )
                    );
        }else{
            DB::table('users')
                    ->where('id',$id)
                    ->update(
                        array(      
                            'name'      =>  $input['name'],     
                            'lastname'  =>  $input['lastname'],
                            'email'  	=>  $input['email'],
                            'role_id'   =>  $input['role_id'],
                            'avatar'    =>  $file_name,
                            'status'    =>  $input['status'],

                        )
                    );
        }
        

        return $answer['error'] = false;
    }

    public static function verify($email){
        
    	$user = Users::where('email', '=', $email)->where('confirmed', '=', 0)->get();
    	
        $reponse = array();

        if (count($user) > 0) {
        	
        	$response['error'] 	= false;
        	$response['message']= "Welcome";
        }
        else{
        	$response['error'] 	= true;
        	$response['message']= "The user with the email ".$email." has been verified already.";
        }
        return $response; 
    }

    public static function confirm($email){
        
    	$user = Users::where('email', '=', $email)->where('confirmed', '=', 0)->first();
    	
        $user->confirmed = 1;
        $user->status = 1;
        $user->save();
        
    }

    public static function SetPassword($email){
        
        $user = Users::where('email', '=', $email)->first();
        
        $user->password = Hash::make(Input::get('password'));
        $user->must_reset_password = 0;
        $user->save();
        
    }

    public static function destroy($user_id, $role_id=''){
        
        if($user_id != ''){
            $response = array();

            $user = Users::find($user_id);
            
            if ($user){
                $user->status = 0;
                $user->save();
                $response['error']      = false;
                $response['message']    = Lang::get('users.removed');
            }
            else{
                $response['error'] = true;
                $response['message']    = Lang::get('users.not-removed');
            }

            return $response;    
        }

        if($role_id != ''){

            DB::table('users')
                ->where('role_id',$role_id)
                ->update(
                    array(      
                        'status' => 2
                    )
                );
        }
        
    }

    public function position(){
        
        return $this->belongsTo('App\Models\Roles','role_id');
    }
}

?>