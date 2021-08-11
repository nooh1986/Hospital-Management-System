
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/sections.add_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            {!! Form::open(['route' => 'sections.store' , 'method'=>'post' , 'autocomplete'=> 'off' ]) !!}
                <div class="modal-body">
                    <div class="col">
                        <label> {!! Form::label('name' , trans('backend/sections.name_sections') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::text('name', old('name') , ['class' => 'form-control']) !!}
                    </div>
                    
                    <br>
                    
                    <div class="col">
                        <label>{!! Form::label('description' , trans('backend/sections.description') , ['class' => 'mr-sm-2']) !!}:</label>
                        {!! Form::textarea('description', old('description') , ['class' => 'form-control']) !!}
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