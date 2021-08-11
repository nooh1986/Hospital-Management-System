<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/doctors.Status_change')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($doctor , ['route' => ('update_status') , 'method'=>'post' ]) !!}
                
                <div class="modal-body">

                    {!! Form::hidden('id', old('id' , $doctor->id)) !!}

                    <div class="form-group">
                        <label for="status">{{trans('backend/doctors.Status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$doctor->status == 1 ? 'selected' : ''}}>{{trans('backend/doctors.Enabled')}}</option>
                            <option value="0" {{$doctor->status == 0 ? 'selected' : ''}}>{{trans('backend/doctors.Not_enabled')}}</option>
                        </select>
                    </div>
                                                                       
                </div>
                
                <div class="modal-footer">
                    {!! Form::button(trans('backend/sections.Close'),['class'=>'btn btn-secondary','type'=>'button' , 'data-dismiss' => 'modal']) !!}
                    {!! Form::button(trans('backend/sections.submit'),['class'=>'btn btn-primary font-weight-bolder','type'=>'submit']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>