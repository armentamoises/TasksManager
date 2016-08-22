<!- New User Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{ Lang::get('users.new-user')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-new-user" class="form-horizontal" method='post' action='{{url("Save-User")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{ Lang::get('users.name')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-2">
                            {{ Lang::get('users.lastname')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('users.email')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('users.role')}}
                        </label>
                        <div class="col-sm-8">
                            <select name="role_id" class="form-control">
                                <option value="">{{ Lang::get('users.choose-option')}}</option>
                                @foreach($roles as $role)
                                        <option value="{{$role->role_id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-3">
                           {{ Lang::get('users.avatar')}}
                        </label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
                                        <div class="fileupload-new thumbnail"><img src="/img/users/noimage.png" alt=""></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="line-height: 10px;"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileupload-new"><i class="fa fa-picture-o"></i> {{ Lang::get('users.image')}}</span>
                                                <span class="fileupload-exists"><i class="fa fa-picture-o"></i> {{ Lang::get('users.change')}}</span>
                                                <input type="file" name="image">
                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i> {{ Lang::get('users.remove')}}
                                            </a>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{ Lang::get('users.cancel')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{ Lang::get('users.save')}}" id="save-brand">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>