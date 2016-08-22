<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyUtilFunctions;

use Validator;
use DB;
use Crypt;
use Lang;

class Roles extends Model{
	
	protected $table = 'roles';
	
	protected $fillable = array(
				"name",
				"description",
				"status",
				"created_at",
				"updated_at"
	);
	
public static function get($parameters=array()){
        
    $role_id        = MyUtilFunctions::getParameter('role_id',$parameters);
    $visible        = MyUtilFunctions::getParameter('visible',$parameters, 1);
    $status         = MyUtilFunctions::getParameter('status',$parameters);
    $users          = MyUtilFunctions::getParameter('users',$parameters, true);
    $permissions    = MyUtilFunctions::getParameter('permissions',$parameters, true);

    $encrypt = true;

        $roles = DB::table ('roles')
                       ->select('roles.id as role_id',
                                'roles.name',
                                'roles.description',
                                'roles.status');
        if ($role_id != "") {
            $roles=$roles->where('roles.id', $role_id);
        }

        if ($visible == 1) {
            $roles=$roles->where('roles.status', '>', 0);
        }

        if ($status != "") {
            $roles=$roles->where('roles.status', '=', $status);
        }

        $roles->orderBy('roles.id', 'asc');
        
        $roles = $roles->get();

        

        if($users === true OR $permissions === true OR $encrypt === true){

            $size      = sizeof($roles);
            $counter   = 0;

            while ($counter < $size){

                if($users === true){

                    $role_users = DB::table ('users')
                                        ->select('users.name', 
                                                'users.lastname',
                                                'users.id as user_id',
                                                'users.avatar' )
                                        ->join('roles', 'roles.id',  '=', 'users.role_id')
                                        ->where('roles.id', '=', $roles[$counter]->role_id)
                                        ->get();

                    $roles[$counter]->users = $role_users ;
                }

                if($permissions === true){

                    $role_permissions = DB::table ('role_permissions')
                                        ->select('role_permissions.role_id', 
                                                'role_permissions.permission_id')
                                        ->join('roles', 'roles.id',  '=', 'role_permissions.role_id')
                                        ->where('roles.id', '=', $roles[$counter]->role_id)
                                        ->get();
                    
                    $roles[$counter]->permissions = $role_permissions ;
                }

                if($encrypt === true){
                    
                    $roles[$counter]->encrypted_id = Crypt::encrypt($roles[$counter]->role_id);
                }

                $counter++;
            }
        }

        return $roles;
    }

    
    public static function insert($input){
        
        $new_role = array();
        
        $rules     = array(
                        'name'          => 'required',
                        'description'   => 'required'
                    );


        $validator  = Validator::make($input, $rules);

        if ($validator->fails()){
            $new_role['message']  = $validator->messages();
            $new_role['error']    = true;
            $new_role['id']       = '';
        }else{
            $var                  = static::create($input);
            $new_role['message']  = Lang::get('roles.msg-saved');
            $new_role['error']    = false;
            $new_role['id']       = $var['id'];
        }
        
        return $new_role; 
    }

    public static function edit($id, $input){

        $answer = array();

        DB::table('roles')
                ->where('id',$id)
                ->update(
                    array(      
                        'name'          =>  $input['name'],     
                        'description'   =>  $input['description'],
                        'status'        =>  $input['status']
                    )
                );
        
        return $answer['error'] = false;
    }

    // public static function destroy($role_id){
        
    //     $response = array();

    //     $role = Roles::where('id', '=', $role_id)->first();
        
    //     if ($role){
    //         $role->status = 0;
    //         $response['error']      = false;
    //         $response['message']    = Lang::get('roles.removed');
    //     }
    //     else{
    //         $response['error'] = true;
    //         $response['message']    = Lang::get('roles.not-removed');
    //     }

    //     return $response;
    // }


}
?>