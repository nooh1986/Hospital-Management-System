<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/sections.edit_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::model($section , ['route' => ['sections.update' , 'test' ] , 'method'=>'put' , 'autocomplete'=> 'off' ]) !!}
                <div class="modal-body">
                    
                    {!! Form::hidden('id', old('id' , $section->id) , ['class' => 'form-control']) !!}
                    <div class="col">
                        <label> {!! Form::label('name' , trans('backend/sections.name_sections') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::text('name', old('name', $section->name) , ['class' => 'form-control']) !!}
                    </div>
                    <br>
                    
                    <div class="col">
                        <label>{!! Form::label('description' , trans('backend/sections.description') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::textarea('description', old('description', $section->description) , ['class' => 'form-control']) !!}
                    </div>
                    <br>

                    <div class="col">
                        <label for="status">{{trans('backend/doctors.Status')}}:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$section->status == 1 ? 'selected' : ''}}>{{trans('backend/doctors.Enabled')}}</option>
                            <option value="0" {{$section->status == 0 ? 'selected' : ''}}>{{trans('backend/doctors.Not_enabled')}}</option>
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