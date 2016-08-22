<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;



class TasksPermissions extends Model{
	
	protected $table = 'tasks_permissions';
	
	protected $fillable = array(
				"task_status",
				"user_role_id",
				"status",
				"created_at",
				"updated_at"
	);
	
	//public $timestamps = false;

	public static function GetTasksPermissions($role_id){
        
        $permissions = DB::table ('tasks_permissions')
                        ->select('tasks_permissions.task_status_id')
                        ->where('tasks_permissions.user_role_id', '=', $role_id)
                        ->where('tasks_permissions.edit', '=', 1)
                        ->where('tasks_permissions.status', '=', 1)
                        ->get();

        if (count($permissions) == 0) {
            return false;
        }
        else{
            return $permissions;
        }
    }
}

?>