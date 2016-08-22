<!- Delete Type Modal ->

<div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('tasks-types.delete-type')}}</h4>
                </div>
                <form id="form-delete-type" class="form-horizontal" method='post' action='{{url("Delete-Task-Type/$type->encrypted_id")}}' enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="alert alert-block alert-warning fade in">
                        
                            <h2 class="alert-heading"><i class="fa fa-warning"></i> {{ Lang::get('tasks-types.warning')}}!</h2>
                            <h4>
                                {{ Lang::get('tasks-types.question')}}
                            </h4>
                            <br>

                            <center>
                                <br>
                                <div class="panel panel-white">
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td>{{ Lang::get('tasks-types.name')}}:&nbsp;&nbsp;</td>
                                            <td><b>{{$type->name}}</b></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>{{ Lang::get('tasks-types.status')}}:</td>
                                            @if($type->status == 1)
                                                <td><b>{{ Lang::get('tasks-types.active')}}</b></td>
                                            @elseif($type->status == 2)
                                                <td><b>{{ Lang::get('tasks-types.inactive')}}</b></td>
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
                                 {{ Lang::get('tasks-types.cancel')}}
                            </button>
                            
                            <button class="btn btn-danger" type="submit">
                                &nbsp; {{ Lang::get('tasks-types.delete')}}&nbsp;
                            </button>
                        </div>
                    </div>
                </form>
        </div>