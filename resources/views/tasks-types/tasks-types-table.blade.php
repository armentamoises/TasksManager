@extends('template')


@section('title')
    {{Lang::get('tasks-types.tasks-types')}} - {{env('APP_NAME', 'Tasks Manager')}}
@stop

@section('content')

<?php 
    $lang = App::getLocale();
    $lang = ($lang != '') ? $lang : 'en' ;
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ Lang::get('tasks-types.tasks-types')}}</h1>
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
                    <strong>{{ session('error_msg') }}</strong>vvv
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ Lang::get('tasks-types.module')}}
                </div>
                <div class="row" style="margin: 15px 5px 10px 0px;">
                    <div class="col-md-12">
                        <button type="submit" role="button" class="btn btn-primary load-ajax-modal" data-path="Add-Task-Type" data-toggle="modal" data-target="#types-modal" >
                           <i class="fa fa-plus-circle"></i> {{ Lang::get('tasks-types.add')}}
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover my-data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ Lang::get('tasks-types.name')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('tasks-types.status')}}</th>
                                    <th>{{ Lang::get('tasks-types.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($types as $key => $type) 
                                    
                                    <tr class="{{($key % 2 == 0)? 'odd' : 'even' }}">
                                        <td>{{$type->type_id}}</td>
                                        <td>
                                            {{$type->name}}
                                        </td>
                                        
                                        <td class="hidden-sm hidden-xs">
                                            @if($type->status == 1)
                                                {{ Lang::get('tasks-types.active')}}
                                            @elseif($type->status == 2)
                                                {{ Lang::get('tasks-types.inactive')}}
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
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#types-modal" data-path="Edit-Task-Type/{{$type->encrypted_id}}" >
                                                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;{{ Lang::get('tasks-types.edit')}}
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#types-modal" data-path="Delete-Task-Type/{{$type->encrypted_id}}" >
                                                                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;{{ Lang::get('tasks-types.delete')}}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach

                           </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!- Modal ->

    <div class="modal-scrollable"   style="z-index: 1060;">
        <div id="types-modal" class="modal fade bs-example-modal-basic modal-overflow in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: none; margin-top: 0px;">  
            <div class="draw-modal"></div>   
        </div>
    </div>

@stop


@section('style')
    <!-- DataTables CSS -->
    <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
@stop

@section('script')
    <!-- DataTables JavaScript -->
    <script src="/assets/datatables/media/js/jquery.dataTables.js"></script>
    <script src="/assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
        var lang = "<?php echo $lang;?>";
    </script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="js/util.js"></script>
    <script src="/js/tasks-types.js"></script>
    
@stop