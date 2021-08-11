<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('backend/sections.delete_sections') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['sections.destroy' , 'test'], 'class' => 'form' , 'method'=>'delete' ]) !!}
                    {{ trans('backend/sections.Warning') }}
                    <br>

                    {!! Form::hidden('id', old('id' , $section->id) ) !!}  
                    <br>
                    
                    <div class="modal-footer">
                        {!! Form::button(trans('backend/sections.Close'),['class'=>'btn btn-secondary','type'=>'button' , 'data-dismiss' => 'modal']) !!}
                        {!! Form::button(trans('backend/sections.submit'),['class'=>'btn btn-danger font-weight-bolder','type'=>'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>