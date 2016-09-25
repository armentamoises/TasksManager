@extends('template')

@section('title')
    {{ Lang::get('tasks.tasks')}} - {{env('APP_NAME')}}
@stop


@section('content')

<?php 
    $lang = App::getLocale();
    $lang = ($lang != '') ? $lang : 'en' ;
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ Lang::get('tasks.tasks')}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert msg alert-warning" style="padding: 2px 2px 2px 2px;">
                    @if($errors->any())
                        <ul>
                        @foreach($errors->getMessages() as $message)
                            <li><h5 class="alert-heading"> {{$message[0]}}</h5></li>
                        @endforeach
                        </ul>
                    @endif 
                </div>
            @endif
            @if (session('status'))
                <div class="alert msg alert-success" style="padding: 10px 0px 10px 10px;">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

            @if (session('error_msg'))
                <div class="alert msg alert-warning" style="padding: 10px 0px 10px 10px;">
                    <strong>{{ session('error_msg') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get('tasks.module')}}
                </div>
                <div class="row" style="margin: 15px 5px 10px 0px;">
                    <div class="col-md-12">
                        <button type="submit" role="button" class="btn btn-primary load-ajax-modal" data-path="Add-Task" data-toggle="modal" data-target="#tasks-modal" >
                           <i class="fa fa-plus-circle"></i> {{ Lang::get('tasks.add')}}
                        </button>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover my-data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ Lang::get('tasks.task')}}</th>
                                   <!--  <th class="hidden-sm hidden-xs">Description</th> -->
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('tasks.requestor')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('tasks.project')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('tasks.type')}}</th>
                                    <th>{{ Lang::get('tasks.status')}}</th>
                                    <th>{{ Lang::get('tasks.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                    $tasks_ids = array();
                                ?>

                                @foreach($tasks as $key => $task) 
                                    
                                    <?php 
                                        $role_id = (Session::get('user_role_id') > 4) ? 0 : Session::get('user_role_id') ;
                                        
                                        if(in_array($task->task_id, $tasks_ids)){
                                            $print_flag = false;
                                        }else{
                                            if($role_id != 0 AND $task->user_role_id == 0){
                                                $print_flag = false;   
                                            }else{
                                               $tasks_ids[]= $task->task_id;
                                                $print_flag = true; 
                                            }
                                            
                                        }

                                        $requestor_flag = true;
                                        if ($task->status == 1 AND ($task->requestor_id != Session::get('user_id')) ) {
                                            $requestor_flag = false;
                                        }
                                    ?>

                                    @if($print_flag AND $requestor_flag)
                                        <tr class="{{($key % 2 == 0)? 'odd' : 'even' }}">
                                            <td>{{$task->task_id}}</td>
                                            <td>{{$task->task}}</td>
                                            <!-- <td class="hidden-sm hidden-xs">{{$task->description}}</td> -->
                                            <td class="hidden-sm hidden-xs">{{$task->requestor_name}} {{$task->requestor_lastname}}</td>
                                            <td class="hidden-sm hidden-xs">{{$task->project}}</td>
                                            <td class="hidden-sm hidden-xs">
                                                <ul>
                                                    @foreach($task->task_types as $task_type)
                                                        <li style="font-size: 12px;margin-left: -20px;">{{$task_type->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{$task->status_name}}
                                                @if(($task->complete == 1) AND (Session::get('user_id') == $task->developer_id))
                                                    <span class="tooltipWrapper">
                                                        <a href="#" data-toggle="tooltip" title="{{ Lang::get('tasks.iam-developer')}}">
                                                            <img src="/img/users/{{Session::get('user_avatar')}}" onError="this.onerror=null;this.src='/img/users/default-avatar.png';" style="border-radius:50%;" width="35px">
                                                        </a>
                                                    </span>
                                                @endif

                                                @if(($task->complete == 1) AND (Session::get('user_id') == $task->supervisor_id))
                                                    <span class="tooltipWrapper">
                                                        <a href="#" data-toggle="tooltip" title="{{ Lang::get('tasks.iam-supervisor')}}">
                                                            <img src="/img/users/{{Session::get('user_avatar')}}" onError="this.onerror=null;this.src='/img/users/default-avatar.png';" style="border-radius:50%;" width="35px">
                                                        </a>
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
                                                            <i class="fa fa-cog"></i> <span class="caret"></span>
                                                        </a>
                                                        
                                                            <ul role="menu" class="dropdown-menu pull-right dropdown-light">
                                                                
                                                                <li>
                                                                    <a  role="menuitem" tabindex="-1" href="View-Task-PDF/{{$task->encrypted_id}}" target="_blank" >
                                                                        <i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;{{ Lang::get('tasks.pdf')}}
                                                                    </a>
                                                                </li>

                                                                @if($task->edit == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Edit-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-edit"></i>&nbsp;&nbsp;{{ Lang::get('tasks.edit')}}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            
                                                                @if($task->delete == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Delete-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-trash-o"></i>&nbsp;&nbsp;{{ Lang::get('tasks.delete')}}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            
                                                                @if($task->send == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Send-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-send-o"></i>&nbsp;&nbsp;{{ Lang::get('tasks.send')}}
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if($task->approve == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Approve-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-check"></i>&nbsp;&nbsp;{{ Lang::get('tasks.approve')}}
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if($task->assign == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Assign-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-mail-forward"></i>&nbsp;&nbsp;{{ Lang::get('tasks.assign')}}
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if($task->authorize == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Authorize-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-check"></i>&nbsp;&nbsp;{{ Lang::get('tasks.authorize')}}
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if($task->reject == 1)
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Reject-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-ban"></i>&nbsp;&nbsp;{{ Lang::get('tasks.reject')}}
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if(($task->complete == 1) AND (Session::get('user_id') == $task->developer_id))
                                                                    <li>
                                                                        <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#tasks-modal" data-path="Complete-Task/{{$task->encrypted_id}}" >
                                                                            <i class="fa fa-check-square-o"></i>&nbsp;&nbsp;{{ Lang::get('tasks.complete')}}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                                
                                                            </ul>
                                                        
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                           </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <br><br>
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!- Modal ->
    <div class="modal-scrollable"   style="z-index: 1060;">
        <div id="tasks-modal" class="modal fade bs-example-modal-basic modal-overflow in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: none; margin-top: 0px;">  
            <div class="draw-modal"></div>   
        </div>
    </div>  

@stop

@section('style')
    <!-- DataTables CSS -->
    <link href="/assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/assets/datatables/media/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="/assets/datepicker/css/datepicker.css" rel="stylesheet">
    <style>
        .datepicker{z-index:1151 !important;}
        
        span.tooltipWrapper 
        {
            position:relative;
            display:inline-block;
            float: right;
            
            /*Hack for old IEs*/
            *position:static;
            *display:inline;
        }
    </style>
    
@stop

@section('script')
    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="/assets/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/jszip.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/media/js/buttons.print.min.js"></script>
    <script>
        var lang    = "<?php echo $lang;?>";
        var table   = "tasks";
    </script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/js/util.js"></script>
    <script type="text/javascript" src="/js/tasks.js"></script>
    
@stop

