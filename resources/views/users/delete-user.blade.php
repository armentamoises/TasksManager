<!- Delete User Modal ->

<div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('users.delete-user')}}</h4>
                </div>
                <form id="form-edit-user" class="form-horizontal" method='post' action='{{url("Delete-User/$user->encrypted_id")}}' enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="alert alert-block alert-warning fade in">
                        
                            <h2 class="alert-heading"><i class="fa fa-warning"></i> {{ Lang::get('users.warning')}}!</h2>
                            <h4>
                                {{ Lang::get('users.question')}}
                            </h4>

                            
                            <center>
                                <br>
                                <div class="panel panel-white">
                                    <br>
                                    <img src="/img/users/{{$user->avatar}}" width="85px" style="border-radius:50%;">
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td>{{ Lang::get('users.name')}}:</td>
                                            <td><b> {{$user->name}} {{$user->lastname}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ Lang::get('users.email')}}:</td>
                                            <td><b> {{$user->email}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ Lang::get('users.role')}}:</td>
                                            <td><b> {{$user->role_name}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ Lang::get('users.status')}}: &nbsp;&nbsp;&nbsp;</td>
                                            <td>
                                                @if($user->status == 1)
                                                    <b>{{ Lang::get('users.active')}}</b>
                                                @else
                                                    <b>{{ Lang::get('users.inactive')}}</b>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            </center>
                            <!-- <br><br>
                            <p>
                                <button id="delete-user" class="btn btn-danger" type="button">
                                &nbsp;{{ Lang::get('users.delete')}}&nbsp;
                                </button>
                            </p> -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div id="buttons_delete">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                 {{ Lang::get('users.cancel')}}
                            </button>
                            
                            <button class="btn btn-danger" type="submit">
                                &nbsp; {{ Lang::get('users.delete')}}&nbsp;
                            </button>
                        </div>
                    </div>
                </form>
        </div>