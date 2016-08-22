<!- New User Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{Lang::get('roles.new-role')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-new-role" class="form-horizontal" method='post' action='{{url("Save-Role")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{Lang::get('roles.name')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{Lang::get('roles.description')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control">
                        </div>
                    </div>
                    
                    

                    <div class="panel panel-white" style="box-shadow: 0 1px 2px #FFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">{{Lang::get('roles.choose-permissions')}}</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover" id="sample-table-2">
                                <thead>
                                    <tr>
                                        <th class="center">{{Lang::get('roles.permission')}}</th>
                                        <th class="center"><input type="checkbox" id="all_permissions"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td class="center">{{ucfirst($permission->module)}}</td>
                                            <td class="center">
                                                <input type="checkbox" name="permissions[]" id="permissions" value="{{$permission->id}}">
                                            </td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>








                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{Lang::get('roles.cancel')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{Lang::get('roles.save')}}" id="save-brand">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>