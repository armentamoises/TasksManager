@extends('template')


@section('title')
    {{Lang::get('users.users')}} - {{env('APP_NAME', 'Tasks Manager')}}
@stop


@section('content')

<?php 
    $lang = App::getLocale();
    $lang = ($lang != '') ? $lang : 'en' ;
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{Lang::get('users.users')}}</h1>
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
                    {{ Lang::get('users.module')}}
                </div>
                <div class="row" style="margin: 15px 5px 10px 0px;">
                    <div class="col-md-12">
                        <button type="submit" role="button" class="btn btn-primary load-ajax-modal" data-path="Add-User" data-toggle="modal" data-target="#users-modal" >
                           <i class="fa fa-plus-circle"></i> {{ Lang::get('users.add')}}
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover my-data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="hidden-sm hidden-xs hidden-md">{{ Lang::get('users.avatar')}}</th>
                                    <th>{{ Lang::get('users.name')}}</th>
                                    <th class="hidden-xs">{{ Lang::get('users.email')}}</th>
                                    <th class="hidden-sm hidden-xs">{{ Lang::get('users.role')}}</th>
                                    <th class="hidden-sm hidden-xs hidden-md">{{ Lang::get('users.status')}}</th>
                                    <th>{{ Lang::get('users.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($users as $key => $user) 
                                    
                                    <tr class="{{($key % 2 == 0)? 'odd' : 'even' }}">
                                        <td>{{$user->user_id}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">
                                            <center>
                                                <img src="/img/users/{{$user->avatar}}" onError="this.onerror=null;this.src='/img/users/default-avatar.png';" style="border-radius:50%;" width="35px">
                                            </center>
                                        </td>
                                        <td>{{$user->name}} {{$user->lastname}}</td>
                                        <td class="hidden-xs">{{$user->email}}</td>
                                        <td class="hidden-sm hidden-xs">{{$user->role_name}}</td>
                                        <td class="hidden-sm hidden-xs hidden-md">
                                            @if($user->status == 1)
                                                {{ Lang::get('users.active')}}
                                            @elseif ($user->status == 2)
                                                {{ Lang::get('users.inactive')}}
                                            @elseif ($user->status == 3)
                                                {{ Lang::get('users.unverified')}}
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
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#users-modal" data-path="Edit-User/{{$user->encrypted_id}}" >
                                                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;{{ Lang::get('users.edit')}}
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a  class="load-ajax-modal" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#users-modal" data-path="Delete-User/{{$user->encrypted_id}}" >
                                                                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;{{ Lang::get('users.delete')}}
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
        <div id="users-modal" class="modal fade bs-example-modal-basic modal-overflow in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: none; margin-top: 0px;">  
            <div class="draw-modal"></div>   
        </div>
    </div>

@stop


@section('style')
    <!-- DataTables CSS -->
    <link href="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/assets/datatables/media/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/datepicker/css/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap-fileupload/bootstrap-fileupload.min.css">
    
    
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
        var table   = "users";
    </script>
    <script type="text/javascript" src="/assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
    <script type="text/javascript" src="/js/util.js"></script>
    <script type="text/javascript" src="/js/users.js"></script>
    
@stop