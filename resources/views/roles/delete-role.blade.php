<!- Delete Role Modal ->

<div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('roles.delete-role')}}</h4>
                </div>
                <form id="form-delete-role" class="form-horizontal" method='post' action='{{url("Delete-Role/$role->encrypted_id")}}' enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="alert alert-block alert-warning fade in">
                        
                            <h2 class="alert-heading"><i class="fa fa-warning"></i> {{ Lang::get('roles.warning')}}!</h2>
                            <h4>
                                {{ Lang::get('roles.question')}}
                            </h4>
                            <br>
                            <h4>
                                {{ Lang::get('roles.msg-status')}}
                            </h4>

                            <center>
                                <br>
                                <div class="panel panel-white">
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td>{{ Lang::get('roles.name')}}:</td>
                                            <td><b>{{$role->name}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ Lang::get('roles.description')}}:&nbsp;&nbsp;&nbsp;</td>
                                            <td><b>{{$role->description}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{ Lang::get('roles.status')}}:</td>
                                            @if($role->status == 1)
                                                <td><b>{{ Lang::get('roles.active')}}</b></td>
                                            @elseif ($role->status == 2)
                                                <td><b>{{ Lang::get('roles.inactive')}}</b></td>
                                            @endif
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            </center>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div id="buttons_delete">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                 {{ Lang::get('roles.cancel')}}
                            </button>
                            
                            <button class="btn btn-danger" type="submit">
                                &nbsp; {{ Lang::get('roles.delete')}}&nbsp;
                            </button>
                        </div>
                    </div>
                </form>
        </div>