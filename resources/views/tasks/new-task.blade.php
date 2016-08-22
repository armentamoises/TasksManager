<!- New Task Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('tasks.m-new-task')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-new-task" class="form-horizontal" method='post' action='{{url("Save-Task")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{ Lang::get('tasks.m-name')}}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="task" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{ Lang::get('tasks.m-description')}}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('tasks.m-project')}}
                        </label>
                        <div class="col-sm-9">
                            <select name="project_id" class="form-control">
                                <option value="">{{ Lang::get('tasks.m-choose-proj')}}</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('tasks.m-priority')}}
                        </label>
                        <div class="col-sm-9">
                            <select name="priority" class="form-control">
                                <option value="">{{ Lang::get('tasks.m-choose-value')}}</option>
                                <option value="1">{{ Lang::get('tasks.low')}}</option>
                                <option value="2">{{ Lang::get('tasks.medium')}}</option>
                                <option value="3">{{ Lang::get('tasks.high')}}</option>
                                <option value="4">{{ Lang::get('tasks.urgent')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="peticion">{{ Lang::get('tasks.m-type')}}</label>
                        <div class="col-sm-9">
                            @foreach($task_types as $task_type)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="task_types[]" value="{{$task_type->id}}">{{$task_type->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    
                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{ Lang::get('tasks.close')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{ Lang::get('tasks.save')}}">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>