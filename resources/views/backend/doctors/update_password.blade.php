<div class="modal fade" id="update_password{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/doctors.change_Password')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($doctor , ['route' => ['update_password'] , 'method'=>'post' , 'autocomplete'=> 'off' ]) !!}
                
                <div class="modal-body">

                    {!! Form::hidden('id', old('id' , $doctor->id)) !!}

                    <div class="col">
                        <label> {!! Form::label('password' , trans('backend/doctors.new_password'), ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::password('password', old('password'), ['class' => 'form-control']) !!}
                    </div>

                    <br>
                    
                    <div class="col">
                        <label> {!! Form::label('password_confirmation' , trans('backend/doctors.confirm_password'), ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::password('password_confirmation', old('password_confirmation'), ['class' => 'form-control']) !!}
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