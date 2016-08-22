<!- Scale up Task Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{$content['title']}}</h4>
                </div>
                <div class="modal-body">

                <form id="{{$content['form']}}" class="form-horizontal" method='post' action='{{$content['url']}}/{{$task->encrypted_id}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{ Lang::get('tasks.m-name')}}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" name="task" class="form-control" value="{{$task->task}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{ Lang::get('tasks.m-description')}}
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="description" disabled>{{$task->description}}</textarea>
                        </div>
                    </div>

                    @if(isset($content['assign']) AND $content['assign'])
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-3">
                               {{ Lang::get('tasks.m-supervisor')}}
                            </label>
                            <div class="col-sm-9">
                                <select name="supervisor" class="form-control">
                                    <option value="">{{ Lang::get('tasks.m-choose-sup')}}</option>
                                    @foreach($content['it_team'] as $supervisor)
                                        <option value="{{$supervisor->id}}">{{$supervisor->name}} {{$supervisor->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-3">
                               {{ Lang::get('tasks.m-developer')}}
                            </label>
                            <div class="col-sm-9">
                                <select name="developer" class="form-control">
                                    <option value="">{{ Lang::get('tasks.m-choose-dev')}}</option>
                                    @foreach($content['it_team'] as $developer)
                                        <option value="{{$developer->id}}">{{$developer->name}} {{$developer->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-2">
                                {{ Lang::get('tasks.m-due-date')}}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="due_date form-control" name="due_date" >

                            </div>
                        </div>
                    @endif


                    <br>
                    <center>
                        <a href="View-Task-PDF/{{$task->encrypted_id}}" target="_blank">
                            <button type="button" class="btn btn-primary">
                              {{ Lang::get('tasks.open-pdf')}}
                            </button>
                        </a>
                    </center>
                    <br>


                    
                    
                    <div class="modal-footer">
                        <center>
                            <h3><i class="{{$content['fa_icon']}}"></i>&nbsp;&nbsp;{{$content['question']}}</h3>
                        </center>
                    </div>

                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{ Lang::get('tasks.close')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{$content['action']}}">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>