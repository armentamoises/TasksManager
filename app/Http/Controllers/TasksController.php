<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Models\Tasks;
use App\Models\TasksPermissions;
use App\Models\TasksTypes;
use App\Models\TasksTypesContent;
use App\Models\Projects;
use App\Models\Users;
use App\Models\Roles;
use App\Models\RolePermissions;

use Input;
use Crypt;
use Route;
use Request;
use Session;
use Lang;



class TasksController extends Controller{

	function __construct() {
        $this->key              = env('TRELLO_KEY');
        $this->token            = env('TRELLO_TOKEN');
        $this->requests_list    = env('TRELLO_REQUESTS_LIST');
        $this->leadproject_list = env('TRELLO_LEADPROJECT_LIST');
        $this->itchief_list     = env('TRELLO_ITCHIEF-LIST');
        $this->developers_list  = env('TRELLO_DEVELOPER_LIST');
        $this->completed_list   = env('TRELLO_COMPLETED');
    }

    public function index(){
        
       	if( RolePermissions::CheckPermission(Session::get('user_role_id'), 3)){

            $tasks = Tasks::get($parameters = array('user_id' => Session::get('user_id'), 'user_role_id' => Session::get('user_role_id')));
    		
            return view('tasks.tasks-table',['menu'     =>'tasks', 
                                             'submenu'  => 'tasks',
                                             'tasks'    => $tasks]);
        }
        else{
            return view('errors.no_permission',
                    array(  'module'    => 'Tasks',
                            'menu'      => 'tasks',
                            'submenu'   => 'tasks',)
                    );  
        }
	}

	public function create(){
	
		
        
            $projects   = Projects::all();
            $task_types = TasksTypes::all();

            return view('tasks.new-task',
                        array('projects'    => $projects,
                              'task_types'  => $task_types)
                        );
       
	}

    public function store(){
        
        $new_task = Tasks::insert(Input::all());

        if ($new_task['error'] == false) {
            
            $task_types = TasksTypesContent::insert(Input::get('task_types'), $new_task['id']);
            
            return redirect('Tasks')->with('status', $new_task['message']);
        }
        else{
            
            return redirect('Tasks')->withErrors($new_task['message']->all());
        }
    }

    public function edit($encrypted_id){
         
        $task_id    = Crypt::decrypt($encrypted_id);

        $task       = Tasks::get($parameters = array('task_id' => $task_id, 'user_id' => Session::get('user_id'), 'user_role_id' => Session::get('user_role_id')));  
    
        $projects   = Projects::all();

        $task_types = TasksTypes::all();

        return view('tasks.edit-task',
                    array('menu'        => 'tasks',
                          'projects'    => $projects,
                          'task_types'  => $task_types,
                          'task'        => $task[0])
                    );
    }

    public function update($encrypted_id){
         
        $task_id    = Crypt::decrypt($encrypted_id);

        $edit_task  = Tasks::edit(Input::all(), $task_id);

        if ($edit_task['error'] == false) {
            
            $task_types = TasksTypesContent::edit(Input::get('task_types'), $task_id);
            
            return redirect('Tasks')->with('status', $edit_task['message']);
        }
        else{
            
            return redirect('Tasks')->withErrors($edit_task['message']->all());
        }
        
    }

    public function cancel($encrypted_id){
         
        $task_id    = Crypt::decrypt($encrypted_id);

        $task       = Tasks::get($parameters = array('task_id' => $task_id, 'user_id' => Session::get('user_id'), 'user_role_id' => Session::get('user_role_id')));  
    
        $projects   = Projects::all();

        $task_types = TasksTypes::all();

        return view('tasks.delete-task',
                    array('menu'        => 'tasks',
                          'projects'    => $projects,
                          'task_types'  => $task_types,
                          'task'        => $task[0])
                    );
    }

    public function destroy($encrypted_id){
         
        $task_id = Crypt::decrypt($encrypted_id);

        $task    = Tasks::find($task_id);

        $task->status       = 0;

        $task->observations = 'This task was canceled by the requestor user on: '.date('Y-m-d h:i:s');

        $task->save();

        return redirect('Tasks')->with('status', 'The task was succesfully deleted!');
    }

    public function confirmScaleUp($encrypted_id){
         
        $task_id    = Crypt::decrypt($encrypted_id);

        $task       = Tasks::get($parameters = array('task_id' => $task_id, 'user_id' => Session::get('user_id'), 'user_role_id' => Session::get('user_role_id')));  

        $route = Request::segment(1);
        
        $content = array();

        switch ($route) {
            case 'Send-Task':
                $content['title']   = Lang::get('tasks.send-title');
                $content['fa_icon'] = "fa fa-send-o" ;
                $content['question']= Lang::get('tasks.send-question');
                $content['action']  = Lang::get('tasks.send');
                $content['url']     = "Send-Task";
                $content['form']    = "form-send-task";
                break;

            case 'Approve-Task':
                $content['title']   = Lang::get('tasks.approve-title');
                $content['fa_icon'] = "fa fa-check" ;
                $content['question']= Lang::get('tasks.approve-question');
                $content['action']  = Lang::get('tasks.approve');
                $content['url']     = "Approve-Task";
                $content['form']    = "form-approve-task";
                break;

            case 'Reject-Task':
                $content['title']   = Lang::get('tasks.reject-title');
                $content['fa_icon'] = "fa fa-ban" ;
                $content['question']= Lang::get('tasks.reject-question');
                $content['action']  = Lang::get('tasks.reject');
                $content['url']     = "Reject-Task";
                $content['form']    = "form-reject-task";
                break;

            case 'Authorize-Task':
                $content['title']   = Lang::get('tasks.authorize-title');
                $content['fa_icon'] = "fa fa-check" ;
                $content['question']= Lang::get('tasks.authorize-question');
                $content['action']  = Lang::get('tasks.authorize');
                $content['url']     = "Authorize-Task";
                $content['form']    = "form-authorize-task";
                break;

            case 'Assign-Task':
                $content['title']   = Lang::get('tasks.assign-title');
                $content['fa_icon'] = "fa fa-mail-forward" ;
                $content['question']= Lang::get('tasks.assign-question');
                $content['action']  = Lang::get('tasks.assign');
                $content['url']     = "Assign-Task";
                $content['form']    = "form-assign-task";
                $content['assign']  = true;
                $content['it_team'] = Users::whereIn('role_id', [1, 2, 3, 4])->get();
                break;

            case 'Complete-Task':
                $content['title']   = Lang::get('tasks.complete-title');
                $content['fa_icon'] = "fa fa-check-square-o" ;
                $content['question']= Lang::get('tasks.complete-question');
                $content['action']  = Lang::get('tasks.complete');
                $content['url']     = "Complete-Task";
                $content['form']    = "form-assign-task";
                break;
            
            default:
                return redirect('Tasks')->with('error_msg', Lang::get('tasks.error-content-1'));
                break;
        }

        return view('tasks.scale-up-task',
                    array('content' => $content,
                          'task'    => $task[0])
                    );
    }

    public function scaleUp($encrypted_id){
         
        $task_id    = Crypt::decrypt($encrypted_id);

        $task       = Tasks::get($parameters = array('task_id' => $task_id, 'user_id' => Session::get('user_id'), 'user_role_id' => Session::get('user_role_id')));  

        $route = Request::segment(1);
        
        switch ($route) {
            case 'Send-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 2;
                $task->request_date                 = date('Y-m-d h:i:s');
                $task->save();
                $message                            = Lang::get('tasks.send-ok-msg');

                //Trello API
                $card                               = $this->MakeTrelloCard($task->task, $task->description);

                if (isset($card['id'])) {
                    $task->trello_card_id           = $card['id'];
                    $task->save();
                }

                break;

            case 'Approve-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 3;
                $task->lead_project_id              = Session::get('user_id');
                $task->lead_project_approval_date   = date('Y-m-d h:i:s');
                $task->save();
                $message                            = Lang::get('tasks.approve-ok-msg');
                
                //Trello API
                $this->MoveTrelloCard($this->leadproject_list, $task->trello_card_id);
                
                break;

            case 'Reject-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 7;
                $task->observations                 = 'This task was rejected by '.Session::get('user_name').' '.Session::get('user_lastname').' on '.date('Y-m-d h:i:s');
                $task->save();
                $message                            = Lang::get('tasks.reject-ok-msg');

                // Trello API
                $this->DeleteTrelloCard($task->trello_card_id);
                
                break;

            case 'Authorize-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 4;
                $task->chief_id                     = Session::get('user_id');
                $task->chief_approval_date          = date('Y-m-d h:i:s');
                $task->save();
                $message                            = Lang::get('tasks.authorize-ok-msg');

                //Trello API
                $this->MoveTrelloCard($this->itchief_list, $task->trello_card_id);
                
                break;

            case 'Assign-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 5;
                $task->supervisor_id                = Input::get('supervisor');
                $task->developer_id                 = Input::get('developer');
                $task->supervisor_assignment_date   = date('Y-m-d h:i:s');
                $task->developer_assignment_date    = date('Y-m-d h:i:s');
                $task->due_date                     = Input::get('due_date')." 12:00:00";
                $task->save();
                $message                            = Lang::get('tasks.assign-ok-msg');

                //Trello API
                $this->MoveTrelloCard($this->developers_list, $task->trello_card_id);
                
                $developer = Users::find(Input::get('developer'));
                
                if($developer->trello_id != NULL){
                    $this->AsignTrelloCard($developer->trello_id, $task->trello_card_id);
                }

                $supervisor = Users::find(Input::get('supervisor'));

                if($supervisor->trello_id != NULL){
                    $this->AsignTrelloCard($supervisor->trello_id, $task->trello_card_id);
                }

                $comment = 'Task assigned to '.$developer->name.' '.$developer->lastname;
                
                $this->MakeCommentTrelloCard($comment, $task->trello_card_id);

                $comment = 'Task supervised by '.$supervisor->name.' '.$supervisor->lastname;
                
                $this->MakeCommentTrelloCard($comment, $task->trello_card_id);

                $this->DueTrelloCard(Input::get('due_date')." 12:00:00", $task->trello_card_id);

                break;

            case 'Complete-Task':
                $task                               = Tasks::find($task_id);
                $task->status                       = 6;
                $task->end_date                     = date('Y-m-d h:i:s');
                $task->save();
                $message                            = Lang::get('tasks.complete-ok-msg');

                //Trello API
                $this->MoveTrelloCard($this->completed_list, $task->trello_card_id);

                break;
            
            default:
                return redirect('Tasks')->with('error_msg', Lang::get('tasks.error-content-1'));
                break;
        }

        return redirect('Tasks')->with('status', $message);
    }

    public function taskPDF($encrypted_id){
        
        $task_id    = Crypt::decrypt($encrypted_id);

        $task       = Tasks::find($task_id);

        $task_details  = array();

        $requestor                  = $task->requestor()->first();
        $position                   = Roles::find($requestor->role_id);

        $requestor_info             = array();
        $requestor_info['name']     = $requestor->name.' '.$requestor->lastname;
        $requestor_info['position'] = $position->name;
        $requestor_info['id']       = $requestor->id;
        $request_date               = $task->request_date;

        
        $lead_project                       = $task->leadProject()->first();
        $lead_project_info                  = array();

        if($lead_project != NULL){
            $position                       = Roles::find($lead_project->role_id);
            $lead_project_info['name']      = $lead_project->name.' '.$lead_project->lastname;
            $lead_project_info['position']  = $position->name;
            $lead_project_info['id']        = $lead_project->id;

        }else{
            $lead_project_info['name']      = '';
            $lead_project_info['position']  = '';
            $lead_project_info['id']        = '';
        }

        $lead_project_approval_date         = ($task->lead_project_approval_date != NULL) ? $task->lead_project_approval_date : "" ;
            

        $chief                              = $task->chief()->first();
        $chief_info                         = array();

        if($chief != NULL){
            $position                       = Roles::find($chief->role_id);
            $chief_info['name']             = $chief->name.' '.$chief->lastname;
            $chief_info['position']         = $position->name;
            $chief_info['id']               = $chief->id;

        }else{
            $chief_info['name']             = '';
            $chief_info['position']         = '';
            $chief_info['id']               = '';
        }

        $chief_approval_date                = ($task->chief_approval_date != NULL) ? $task->chief_approval_date : "" ;
           

        $supervisor                         = $task->supervisor()->first();
        $supervisor_info                    = array();

        if($supervisor != NULL){
            $position                       = Roles::find($supervisor->role_id);
            $supervisor_info['name']        = $supervisor->name.' '.$supervisor->lastname;
            $supervisor_info['position']    = $position->name;
            $supervisor_info['id']          = $supervisor->id;

        }else{
            $supervisor_info['name']        = '';
            $supervisor_info['position']    = '';
            $supervisor_info['id']          = '';
        }

        $supervisor_assignment_date         = ($task->supervisor_assignment_date != NULL) ? $task->supervisor_assignment_date : "" ;
        

        $developer                          = $task->developer()->first();
        $developer_info                     = array();

        if($developer != NULL){
            $position                       = Roles::find($developer->role_id);
            $developer_info['name']         = $developer->name.' '.$developer->lastname;
            $developer_info['position']     = $position->name;
            $developer_info['id']           = $developer->id;

        }else{
            $developer_info['name']         = '';
            $developer_info['position']     = '';
            $developer_info['id']           = '';
        }

        $developer_assignment_date          = ($task->developer_assignment_date != NULL) ? $task->developer_assignment_date : "" ;

        $due_date                           = ($task->due_date != NULL) ? $task->due_date : "" ;
        $end_date                           = ($task->end_date != NULL) ? $task->end_date : "" ;
         
        

        $flow = array( 'requestor'      => array(   "id"            => $requestor_info['id'], 
                                                    "name"          => $requestor_info['name'],
                                                    "position"      => $requestor_info['position'],
                                                    "request_date"  => $request_date),
                       'lead_project'   => array(   "id"            => $lead_project_info['id'],
                                                    "name"          => $lead_project_info['name'],
                                                    "position"      => $lead_project_info['position'],         
                                                    "request_date"  => $lead_project_approval_date),
                       'chief'          => array(   "id"            => $chief_info['id'],
                                                    "name"          => $chief_info['name'],       
                                                    "position"      => $chief_info['position'],
                                                    "request_date"  => $chief_approval_date ),
                       'supervisor'     => array(   "id"            => $supervisor_info['id'],
                                                    "name"          => $supervisor_info['name'] , 
                                                    "position"      => $supervisor_info['position'] ,
                                                    "request_date"  => $supervisor_assignment_date),
                       'developer'      => array(   "id"            => $developer_info['id'],
                                                    "name"          => $developer_info['name'],
                                                    "position"      => $developer_info['position'],  
                                                    "request_date"  => $developer_assignment_date),
                );

        $task_details['task_id']        = $task->id;
        $task_details['task']           = $task->task;
        $task_details['description']    = $task->description;
        $task_details['project_id']     = $task->project_id;
        $task_details['project']        = $task->project()->first()->name;
        $task_details['project_logo']   = $task->project()->first()->logo;
        $task_details['status_id']      = $task->status;
        $task_details['status']         = $task->statusName()->first()->name;
        $task_details['priority']       = $task->priority;
        $task_details['observations']   = $task->observations;
        $task_details['task_types']     = $task->types($task->id);
        $task_details['flow']           = $flow;
        $task_details['due_date']       = $due_date;
        $task_details['end_date']       = $end_date;

        return view('tasks.pdf-task',['task' => $task_details]);
    }

    public function MakeTrelloCard($name, $desc){

        //Trello API
        $trello = [
                  "key"    => $this->key,
                  "token"  => $this->token,
                  "name"   => $name,
                  "desc"   => $desc,
              ];
        $trello = http_build_query($trello);

        $s = curl_init();
        curl_setopt($s, CURLOPT_URL, 'https://api.trello.com/1/lists/'.$this->requests_list.'/cards');
        curl_setopt($s, CURLOPT_TIMEOUT, 30);
        curl_setopt($s, CURLOPT_POST, 1);
        curl_setopt($s, CURLOPT_POSTFIELDS, $trello);
        curl_setopt($s, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        $new_card = curl_exec($s);

        $card  = json_decode($new_card,TRUE);

        return $card;
    }

    public function MoveTrelloCard($list, $trello_card_id){

        $trello = [
                  "key"     => $this->key,
                  "token"   => $this->token,
                  "value"   => $list,
              ];
        $trello = http_build_query($trello);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.trello.com/1/cards/'.$trello_card_id.'/idList');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $trello);
        $move_card = curl_exec($ch);
    }

    public function AsignTrelloCard($developer, /*$supervisor,*/  $trello_card_id){
        
        $trello = [
                  "key"     => $this->key,
                  "token"   => $this->token,
                  /*
                  //You can assign to more than one trello user at the time if you want
                  "value"   => $developer.",".$supervisor
                  */
                  "value"   => $developer
              ];
        $trello = http_build_query($trello);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.trello.com/1/cards/'.$trello_card_id.'/idMembers');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $trello);
        $assign = curl_exec($ch);
        curl_close($ch);
    }

    public function MakeCommentTrelloCard($comment, $trello_card_id){
        $trello = [
                  "key"     => $this->key,
                  "token"   => $this->token,
                  "text"    => $comment
              ];
        $trello = http_build_query($trello);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.trello.com/1/cards/'.$trello_card_id.'/actions/comments');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $trello);
        $comment = curl_exec($ch);
        curl_close($ch);
    }

    public function DueTrelloCard($due_date, $trello_card_id){
        $trello = [
                  "key"     => $this->key,
                  "token"   => $this->token,
                  "value"   => $due_date,
              ];
        $trello = http_build_query($trello);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.trello.com/1/cards/'.$trello_card_id.'/due');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $trello);
        $assign = curl_exec($ch);
        curl_close($ch);
    }   

    public function DeleteTrelloCard($trello_card_id){
        $trello = [
                  "key"     => $this->key,
                  "token"   => $this->token,
              ];
        $trello = http_build_query($trello);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.trello.com/1/cards/'.$trello_card_id);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $trello);
        $delete = curl_exec($ch);
        curl_close($ch);
    } 
}