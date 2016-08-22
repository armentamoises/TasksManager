<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyUtilFunctions;

use App\Models\Users;

use Util;
use DB;
use Session;
use Validator;
use Crypt;
use Lang;

class Tasks extends Model
{
	protected $table 	= 'tasks';
	
	protected $fillable = array(
				"task",
				"description",
				"status",
				"requestor_id",
				"supervisor_id",
				"developer_id",
				"lead_project_id",
				"chief_id",
				"project_id",
				"priority",
				"request_date",
				"lead_project_approval_date",
				"chief_approval_date",
				"supervisor_assignment_date",
				"developer_assignment_date",
				"due_date",
				"end_date",
				"observations",
				"trello_card_id",
				"created_at",
				"updated_at"
	);
    

    
   	public static function get($parameters=array()){
		
		$task_id        = MyUtilFunctions::getParameter('task_id',$parameters);
		$txtBuscar    	= MyUtilFunctions::getParameter('txtBuscar',$parameters);
		$user_id    	= MyUtilFunctions::getParameter('user_id',$parameters,0);
		$user_role_id   = MyUtilFunctions::getParameter('user_role_id',$parameters,0);
		$id_task_status = MyUtilFunctions::getParameter('status',$parameters,0);

		$role_id 		= ($user_role_id > 4) ? 0 : $user_role_id ;

		$tasks = DB::table('tasks')
				->join('users','tasks.requestor_id','=','users.id')
				->join('projects','tasks.project_id','=','projects.id')
				->join('tasks_statuses','tasks_statuses.id','=','tasks.status')
				->select(
					'tasks.id as task_id',
					'tasks.task',
					'tasks.description',
					'tasks.priority',
					'tasks.requestor_id',
					'tasks.project_id',
					'tasks.supervisor_id',
					'tasks.developer_id',
					'tasks.status',
					'users.name as requestor_name',
					'users.lastname as requestor_lastname',
					'projects.name as project',
					'tasks_statuses.name as status_name'
				)
				->where('tasks.status','>',0);

				if( $user_id != 0){

					$tasks = $tasks->join('tasks_permissions',function($join) use ($role_id, $user_id){
				      		 $join->on('tasks_permissions.task_status_id', '=', 'tasks.status');
							 $join->on( DB::raw( '( tasks_permissions.user_role_id = '.$role_id.' or (tasks_permissions.user_role_id = 0 and tasks.requestor_id = '.$user_id.'))' ), DB::raw(''), DB::raw(''));
					      	})->addSelect(
				        		'tasks_permissions.user_role_id',
				        		'tasks_permissions.edit',
				        		'tasks_permissions.delete',
				        		'tasks_permissions.send',
				        		'tasks_permissions.approve',
				        		'tasks_permissions.assign',
				        		'tasks_permissions.authorize',
				        		'tasks_permissions.reject',
				        		'tasks_permissions.complete'
				        		);
		 		}

		 		if( $task_id != 0){

		 			$tasks = $tasks->where('tasks.id', '=', $task_id);
						
		 		}

		 		$tasks->orderBy('tasks.id', 'desc');

		 		$tasks = $tasks->get();

		 		
		 		$size      = sizeof($tasks);
            	$counter   = 0;

	            while ($counter < $size){

	                $types = DB::table ('tasks_types_content')
                                        ->select('tasks_types.id',
                                        		 'tasks_types.name')
                                        ->join('tasks_types', 'tasks_types.id',  '=', 'tasks_types_content.task_type_id')
                                        ->where('tasks_types_content.task_id', '=', $tasks[$counter]->task_id)
                                        ->get();

                    $tasks[$counter]->task_types = $types;

                    $tasks[$counter]->encrypted_id = Crypt::encrypt($tasks[$counter]->task_id);
	                

	                $counter++;
	            }
	            
		return $tasks;
	}

	public static function insert($input){
        
        $new_task = array();
        
        $rules     = array(
                        'task'          => 'required',
	                    'description'   => 'required',
	                    'project_id'    => 'required',
	                    'priority'      => 'required'
                    );

        $input['requestor_id'] = Session::get('user_id');

        $validator  = Validator::make($input, $rules);

        if ($validator->fails()){
            $new_task['message']  = $validator->messages();
            $new_task['error']    = true;
            $new_task['id']       = '';
        }else{
            $var                  = static::create($input);
            $new_task['message']  = Lang::get('tasks.insert-msg');
            $new_task['error']    = false;
            $new_task['id']       = $var['id'];
        }
        
        return $new_task; 
    }

    public static function edit($input, $task_id){
        
        $edit_task = array();
        
        $rules     = array(
                        'task'          => 'required',
	                    'description'   => 'required',
	                    'project_id'    => 'required',
	                    'priority'      => 'required'
                    );

    	$validator  = Validator::make($input, $rules);

        if ($validator->fails()){
            $edit_task['message']  = $validator->messages();
            $edit_task['error']    = true;
        }else{
           	
           	DB::table('tasks')
                ->where('id',$task_id)
                ->update(
                    array(      
                        'task'      	=>  $input['task'],     
                        'description'  	=>  $input['description'],
                        'project_id'  	=>  $input['project_id'],
                        'priority'   	=>  $input['priority'],

                    )
                );

            $edit_task['message']  = Lang::get('tasks.update-msg');
            $edit_task['error']    = false;
        }
        
        return $edit_task; 
    }

    

    public function project()
    {
    	return $this->belongsTo('App\Models\Projects','project_id');
    }

	public function statusName()
    {
    	return $this->belongsTo('App\Models\TasksStatuses','status');
    }

    public function requestor(){
    	
    	return $this->belongsTo('App\Models\Users','requestor_id');
    }

    public function leadProject()
    {
    	return $this->belongsTo('App\Models\Users','lead_project_id');
    }    

    public function supervisor()
    {
    	return $this->belongsTo('App\Models\Users','supervisor_id');
    }    

    public function chief()
    {
    	return $this->belongsTo('App\Models\Users','chief_id');
    }    

    public function developer()
    {
    	return $this->belongsTo('App\Models\Users','developer_id');
    }

    public function types($task_id)
    {
        $types = DB::table ('tasks_types_content')
                    ->select('tasks_types.id',
                    		 'tasks_types.name')
                    ->join('tasks_types', 'tasks_types.id', '=', 'tasks_types_content.task_type_id')
                    ->where('tasks_types_content.task_id', '=', $task_id)
                    ->get();
        return $types;
    }
    
}