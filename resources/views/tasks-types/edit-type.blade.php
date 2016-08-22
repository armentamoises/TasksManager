<!- Edit Type Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{Lang::get('tasks-types.edit-type')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-edit-type" class="form-horizontal" method='post' action='{{url("Update-Task-Type/$type->encrypted_id")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{Lang::get('tasks-types.name')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" value="{{$type->name}}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('tasks-types.status')}}
                        </label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control">
                                <option value="">{{ Lang::get('tasks-types.choose-option')}}</option>
                                    @if($type->status > 0)
                                        @if($type->status == 1)
                                            <option value="2">{{ Lang::get('tasks-types.inactive')}}</option>
                                            <option value="1" selected>{{ Lang::get('tasks-types.active')}}</option>
                                        @else
                                            <option value="2" selected>{{ Lang::get('tasks-types.inactive')}}</option>
                                            <option value="1">{{ Lang::get('tasks-types.active')}}</option>
                                        @endif
                                    @endif
                            </select>
                        </div>       
                    </div>

                
                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{Lang::get('tasks-types.cancel')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{Lang::get('tasks-types.update')}}">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>