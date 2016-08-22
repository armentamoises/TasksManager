<?php 

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Users;
use App\Models\Permissions;
use App\Models\RolePermissions;

use Session;
use Input;
use Auth;
use Redirect;
use Response;
use Validator;
use File;
use Crypt;
use Lang;

class RolesController extends Controller{
	
	public function index(){
    
        if( RolePermissions::CheckPermission(Session::get('user_role_id'), 2)){
            
            $roles = Roles::get();
    
            return view('roles.roles-table',
                        array(  'roles'     => $roles,
                                'menu'      => 'users',
                                'submenu'   => 'roles')
                        );
        }
        else{
            return view('errors.no_permission',
                    array(  'module'    => 'Roles',
                            'menu'      => 'users',
                            'submenu'   => 'roles')
                    );  
        }
    }

    public function add(){
    
        $permissions = Permissions::all();

        return view('roles.new-role',
        			array('permissions' => $permissions)
        			);
    }

    public function store(){
        
        
        $input = Input::all();

        $new_role = Roles::insert($input);

        if ($new_role['error'] == false) {

            foreach ($input['permissions'] as $key => $permission) {
                
                $data['role_id']        = $new_role['id'];
                $data['permission_id']  = $permission;

                $new_permission = RolePermissions::insert($data);
            }
            
            return redirect('Roles')->with('status', $new_role['message']);
        }
        else{
            
            return redirect('Roles')->withErrors($new_role['message']);
        }
    }

    public function edit($encrypted_id){

        $role_id    = Crypt::decrypt($encrypted_id);
        
        $role       = Roles::get($parameters = array('role_id' => $role_id));
         
        $permissions = Permissions::all();

        return view('roles.edit-role', array('role' => $role[0], 'permissions' => $permissions) );
    }

    public function update($encrypted_id){

        $role_id    = Crypt::decrypt($encrypted_id);

        $rules = [
                'name'          => 'required',
                'description'   => 'required',
                'status'        => 'required'
             ];    
        
        
        $input = Input::all();

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()){
         
            $messages = $validator->messages();

            return redirect('Roles')->withErrors($messages->all());
            
        }
        else{
            
            Roles::edit($role_id, $input);

            RolePermissions::where('role_id', '=', $role_id)->delete();

            foreach ($input['permissions'] as $key => $permission) {
                
                $data['role_id']        = $role_id;
                $data['permission_id']  = $permission;

                $new_permission = RolePermissions::insert($data);
            }

            if(Input::get('status') == 2){
                Users::destroy('', $role_id);
            }
            
            return redirect('Roles')->with('status', Lang::get('roles.msg-updated'));
        }
    }

    public function delete($encrypted_id){
        
        $role_id    = Crypt::decrypt($encrypted_id);
        
        $role       = Roles::get($parameters = array('role_id' => $role_id));

        return view('roles.delete-role', array('role' => $role[0]) );
    }

    public function destroy($encrypted_id){
        
        $role_id = Crypt::decrypt($encrypted_id);
        
        $role = Roles::find($role_id);
        
        $role->status = 0;
        
        $role->save();

        Users::destroy('', $role_id);
        
        return redirect('Roles')->with('status', Lang::get('roles.removed'));
        
    }

}