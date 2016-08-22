<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class TasksTypesContent extends Model{
	
	protected $table = 'tasks_types_content';
	
	protected $fillable = array(
				"task_id",
				"task_type_id"
	);
	

	

	public static function insert($tasks_types, $task_id){
      
      foreach ($tasks_types as $key => $tasks_type) {
        	
        	TasksTypesContent::create(['task_id' => $task_id, 'task_type_id' => $tasks_type]);
        }  
        
    }

    public static function edit($tasks_types, $task_id){
      
      	DB::table('tasks_types_content')
            ->where('task_id',$task_id)
            ->delete();

      	foreach ($tasks_types as $key => $tasks_type) {
        	
        	TasksTypesContent::create(['task_id' => $task_id, 'task_type_id' => $tasks_type]);
        }  
        
    }

	
}

?>