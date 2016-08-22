<!- Edit Task Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('tasks.m-edit-task')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-edit-task" class="form-horizontal" method='post' action='{{url("Update-Task/$task->encrypted_id")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{ Lang::get('tasks.m-name')}}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="task" class="form-control" value="{{$task->task}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{ Lang::get('tasks.m-description')}}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="description">{{$task->description}}</textarea>
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
                                    @if($project->id == $task->project_id)
                                        <option value="{{$project->id}}" selected>{{$project->name}}</option>
                                    @else
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endif
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
                                @if($task->priority == 1)
                                    <option value="">{{ Lang::get('tasks.m-choose-value')}}</option>
                                    <option value="1" selected>{{ Lang::get('tasks.low')}}</option>
                                    <option value="2">{{ Lang::get('tasks.medium')}}</option>
                                    <option value="3">{{ Lang::get('tasks.high')}}</option>
                                    <option value="4">{{ Lang::get('tasks.urgent')}}</option>
                                @elseif ($task->priority == 2)
                                    <option value="">Choose a value</option>
                                    <option value="1">{{ Lang::get('tasks.low')}}</option>
                                    <option value="2" selected>{{ Lang::get('tasks.medium')}}</option>
                                    <option value="3">{{ Lang::get('tasks.high')}}</option>
                                    <option value="4">{{ Lang::get('tasks.urgent')}}</option>
                                @elseif ($task->priority == 3)
                                    <option value="">Choose a value</option>
                                    <option value="1">{{ Lang::get('tasks.low')}}</option>
                                    <option value="2">{{ Lang::get('tasks.medium')}}</option>
                                    <option value="3" selected>{{ Lang::get('tasks.high')}}</option>
                                    <option value="4">{{ Lang::get('tasks.urgent')}}</option>
                                @else ($task->priority == 4)
                                    <option value="">Choose a value</option>
                                    <option value="1">{{ Lang::get('tasks.low')}}</option>
                                    <option value="2">{{ Lang::get('tasks.medium')}}</option>
                                    <option value="3">{{ Lang::get('tasks.high')}}</option>
                                    <option value="4" selected>{{ Lang::get('tasks.urgent')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="peticion">{{ Lang::get('tasks.m-type')}}</label>
                        <div class="col-sm-9">
                            <?php
                                $types = array();
                                
                                foreach ($task->task_types as $key => $type) {
                                    $types[$key] = $type->id;
                                }
                            ?>
                            @foreach($task_types as $key => $task_type)
                                <div class="checkbox">
                                    <label>
                                        @if(in_array($task_type->id, $types))
                                            <input type="checkbox" name="task_types[]" value="{{$task_type->id}}" checked>{{$task_type->name}}
                                        @else
                                            <input type="checkbox" name="task_types[]" value="{{$task_type->id}}">{{$task_type->name}}
                                        @endif
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
                           <input class='btn btn-primary' type="submit" value="{{ Lang::get('tasks.update')}}">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>