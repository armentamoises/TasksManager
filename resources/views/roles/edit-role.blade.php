<!- Edit Role Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{Lang::get('roles.edit-role')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-edit-role" class="form-horizontal" method='post' action='{{url("Update-Role/$role->encrypted_id")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{Lang::get('roles.name')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" value="{{$role->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{Lang::get('roles.description')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="description" class="form-control" value="{{$role->description}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('roles.status')}}
                        </label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control">
                                <option value="">{{ Lang::get('roles.choose-option')}}</option>
                                    @if($role->status > 0)
                                        @if($role->status == 1)
                                            <option value="2">{{ Lang::get('roles.inactive')}}</option>
                                            <option value="1" selected>{{ Lang::get('roles.active')}}</option>
                                        @else
                                            <option value="2" selected>{{ Lang::get('roles.inactive')}}</option>
                                            <option value="1">{{ Lang::get('roles.active')}}</option>
                                        @endif
                                    @endif
                            </select>
                        </div>       
                    </div>

                    <div class="form-group" id="help-warning" style="display:none;">
                        <label class="col-sm-2 control-label" for="form-field-3"></label>
                        <div class="col-sm-8">
                            <div class="alert alert-block alert-warning fade in">
                                <h4 class="alert-heading"><i class="fa fa-warning"></i> {{ Lang::get('roles.warning')}}!</h4>
                            
                                {{Lang::get('roles.status-help')}}
                            </div>
                        </div>
                                
                    </div>
                    
                    <?php
                        $permissions_array = array();

                        foreach ($role->permissions as $key => $role_permission) {
                            $permissions_array[$key] = $role_permission->permission_id;
                        }
                    ?>

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
                                    @foreach($permissions as $index => $permission)
                                        <tr>

                                            <td class="center">{{ucfirst($permission->module)}}</td>
                                            
                                            @if(in_array($permission->id, $permissions_array))
                                                <td class="center">
                                                    <input type="checkbox" name="permissions[]" id="permissions" value="{{$permission->id}}" checked>
                                                </td>
                                            @else
                                                <td class="center">
                                                    <input type="checkbox" name="permissions[]" id="permissions" value="{{$permission->id}}">
                                                </td>
                                            @endif
                                            
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
                           <input class='btn btn-primary' type="submit" value="{{Lang::get('roles.update')}}">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>