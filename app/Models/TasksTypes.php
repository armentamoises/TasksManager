<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyUtilFunctions;

use Validator;
use DB;
use Crypt;
use Lang;

class TasksTypes extends Model{
	
	protected $table = 'tasks_types';
	
	protected $fillable = array(
				"name",
				"status",
				"created_at",
				"updated_at"
	);
	

	public static function get($parameters=array()){
        
    $type_id        = MyUtilFunctions::getParameter('type_id',$parameters);
    $visible        = MyUtilFunctions::getParameter('visible',$parameters, 1);
    $status         = MyUtilFunctions::getParameter('status',$parameters);

    $encrypt = true;

        $tasks_types = DB::table ('tasks_types')
                       ->select('tasks_types.id as type_id',
                                'tasks_types.name',
                                'tasks_types.status');
        if ($type_id != "") {
            $tasks_types=$tasks_types->where('tasks_types.id', $type_id);
        }

        if ($visible == 1) {
            $tasks_types=$tasks_types->where('tasks_types.status', '>', 0);
        }

        if ($status != "") {
            $tasks_types=$tasks_types->where('tasks_types.status', '=', $status);
        }

        $tasks_types->orderBy('tasks_types.id', 'asc');
        
        $tasks_types = $tasks_types->get();
		
		$size      = sizeof($tasks_types);
        
        $counter   = 0;

        while ($counter < $size){

            $tasks_types[$counter]->encrypted_id = Crypt::encrypt($tasks_types[$counter]->type_id);
            
            $counter++;
    	}

        return $tasks_types;
    }

    
    public static function insert($input){
        
        $new_type = array();
        
        $rules     = array(
                        'name'          => 'required',
                    );


        $validator  = Validator::make($input, $rules);

        if ($validator->fails()){
            $new_type['message']  = $validator->messages();
            $new_type['error']    = true;
            $new_type['id']       = '';
        }else{
            $var                  = static::create($input);
            $new_type['message']  = Lang::get('tasks-types.msg-saved');
            $new_type['error']    = false;
            $new_type['id']       = $var['id'];
        }
        
        return $new_type; 
    }

    public static function edit($id, $input){

        $answer = array();

        DB::table('tasks_types')
                ->where('id',$id)
                ->update(
                    array(      
                        'name'          =>  $input['name'],     
                        'status'        =>  $input['status']
                    )
                );
        
        return $answer['error'] = false;
    }

	
}

?>