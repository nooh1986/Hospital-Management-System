<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/services.edit_Service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($service , ['route' => ['services.update' , 'test' ] , 'method'=>'put' , 'autocomplete'=> 'off' ]) !!}
                
                <div class="modal-body">

                    {!! Form::hidden('id', old('id' , $service->id) , ['class' => 'form-control']) !!}
                    
                    <div class="col">
                        <label> {!! Form::label('name' , trans('backend/services.name') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::text('name', old('name' , $service->name) , ['class' => 'form-control']) !!}
                    </div>
                    <br>

                    <div class="col">
                        <label> {!! Form::label('price' , trans('backend/services.price') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::number('price', old('price' , $service->price) , ['class' => 'form-control']) !!}
                    </div>
                    <br>

                    <div class="col">
                        <label>{!! Form::label('description' , trans('backend/services.description') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::textarea('description', old('description' , $service->description) , ['class' => 'form-control']) !!}
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="status">{{trans('doctors.Status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$service->status == 1 ? 'selected' : ''}}>{{trans('doctors.Enabled')}}</option>
                            <option value="0" {{$service->status == 0 ? 'selected' : ''}}>{{trans('doctors.Not_enabled')}}</option>
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