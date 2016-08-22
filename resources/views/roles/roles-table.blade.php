@extends('template')


@section('title')
    {{Lang::get('roles.roles')}} - {{env('APP_NAME', 'Tasks Manager')}}
@stop

@section('content')

<?php 
    $lang = App::getLocale();
    $lang = ($lang != '') ? $lang : 'en' ;
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ Lang::get('roles.roles')}}</h1>
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
                    {{ Lang::get('roles.module')}}
                </div>
                <div class="row" style="margin: 15px 5px 10px 0px;">
                    <div class="col-md-12">
                        <button type="submit" role="button" class="btn btn-primary load-ajax-modal" data-path="Add-Role" data-toggle="modal" data-target="#roles-modal" >
                           <i class="fa fa-plus-circle"></i> {{ Lang::get('roles.add')}}
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="roles-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ Lang::get('roles.name')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('roles.description')}}</th>
                                    <th class="hidden-xs">{{ Lang::get('roles.users')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('roles.status')}}</th>
                                    <th>{{ Lang::get('roles.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($roles as $key => $role) 
                                    
                                    <tr class="{{($key % 2 == 0)? 'odd' : 'even' }}">
                                        <td>{{$role->role_id}}</td>
                                        <td>
                                            {{$role->name}}
                                        </td>
                                        <td class="hidden-sm hidden-xs">{{$role->description}}</td>
                                        <td class="hidden-xs">
                                            <div class="panel-body">
                                                <ul style="list-style-type: none;">
                                                    @foreach($role->users as $user)
                                                        <li>
                                                            <img src="/img/users/{{$user->avatar}}" onError="this.onerror=null;this.src='/img/users/default-avatar.png';" width="40px" style="border-radius:50%;">
                                                            {{$user->name}} {{$user->lastname}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="hidden-sm hidden-xs">
                                            @if($role->status == 1)
                                                {{ Lang::get('roles.active')}}
                                            @elseif($role->status == 2)
                                                {{ Lang::get('roles.inactive')}}
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
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#roles-modal" data-path="Edit-Role/{{$role->encrypted_id}}" >
                                                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;{{ Lang::get('roles.edit')}}
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#roles-modal" data-path="Delete-Role/{{$role->encrypted_id}}" >
                                                                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;{{ Lang::get('roles.delete')}}
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
        <div id="roles-modal" class="modal fade bs-example-modal-basic modal-overflow in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: none; margin-top: 0px;">  
            <div class="draw-modal"></div>   
        </div>
    </div>

@stop


@section('style')
    <!-- DataTables CSS -->
    <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/datepicker/css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap-fileupload/bootstrap-fileupload.min.css">
    
@stop

@section('script')
    <!-- DataTables JavaScript -->
    <script src="assets/datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
        var lang = "<?php echo $lang;?>";
    </script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script src="js/roles.js"></script>
    
@stop