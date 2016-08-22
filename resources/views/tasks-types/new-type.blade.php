<!- New Type Modal ->

        <div class="modal-dialog modal-basic">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 id="myLargeModalLabel" class="modal-title">{{Lang::get('tasks-types.new-type')}}</h4>
                </div>
                <div class="modal-body">

                <form id="form-new-type" class="form-horizontal" method='post' action='{{url("Save-Task-Type")}}' enctype='multipart/form-data'>

                    {{csrf_field()}}

                   <div class="form-group">
                        <label class="col-sm-2 control-label" for="form-field-1">
                            {{Lang::get('tasks-types.name')}}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <div id="buttons">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                {{Lang::get('tasks-types.cancel')}}
                            </button>
                           <input class='btn btn-primary' type="submit" value="{{Lang::get('tasks-types.save')}}" id="save-brand">
                        </div>
                        <div id="footer"></div>
                    </div>
                </form>
            </div>
        </div>