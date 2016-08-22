<?php 

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Users;
use App\Models\Permissions;
use App\Models\RolePermissions;
use App\Models\TasksTypes;

use Session;
use Input;
use Auth;
use Redirect;
use Response;
use Validator;
use File;
use Crypt;
use Lang;

class TasksTypesController extends Controller{
	
	public function index(){
    
        if( RolePermissions::CheckPermission(Session::get('user_role_id'), 4)){
            
            $types = TasksTypes::get();
    
            return view('tasks-types.tasks-types-table',
                        array(  'types'     => $types,
                                'menu'      => 'tasks',
                                'submenu'   => 'types')
                        );
        }
        else{
            return view('errors.no_permission',
                    array(  'module'    => Lang::get('menu.tasks-types'),
                            'menu'      => 'tasks',
                            'submenu'   => 'types')
                    );  
        }
    }

    public function add(){

        return view('tasks-types.new-type');
    }

    public function store(){
        
        $new_type = TasksTypes::insert(Input::all());

        if ($new_type['error'] == false) {

            return redirect('Tasks-Types')->with('status', $new_type['message']);
        }
        else{
            
            return redirect('Tasks-Types')->withErrors($new_type['message']);
        }
    }

    public function edit($encrypted_id){

        $type_id = Crypt::decrypt($encrypted_id);
        
        $type    = TasksTypes::get($parameters = array('type_id' => $type_id));
         
        return view('tasks-types.edit-type', array('type' => $type[0]) );
    }

    public function update($encrypted_id){

        $type_id    = Crypt::decrypt($encrypted_id);

        $rules = [
                'name'          => 'required',
                'status'        => 'required'
             ];    
        
        
        $input = Input::all();

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()){
         
            $messages = $validator->messages();

            return redirect('Tasks-Types')->withErrors($messages->all());
            
        }
        else{
            
            TasksTypes::edit($type_id, $input);

            return redirect('Tasks-Types')->with('status', Lang::get('tasks-types.msg-updated'));
        }
    }

    public function delete($encrypted_id){
        
        $type_id    = Crypt::decrypt($encrypted_id);
        
        $type       = TasksTypes::get($parameters = array('type_id' => $type_id));

        return view('tasks-types.delete-type', array('type' => $type[0]) );
    }

    public function destroy($encrypted_id){
        
        $type_id = Crypt::decrypt($encrypted_id);
        
        $type = TasksTypes::find($type_id);
        
        $type->status = 0;
        
        $type->save();
        
        return redirect('Tasks-Types')->with('status', Lang::get('tasks-types.removed'));
        
    }

}