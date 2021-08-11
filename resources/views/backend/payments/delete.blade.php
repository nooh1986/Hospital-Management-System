<div class="modal fade" id="delete{{ $payment->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('backend/payments.Delete_payment') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['Payments.destroy' , 'test'], 'class' => 'form' , 'method'=>'delete' ]) !!}
                    {{ trans('backend/payments.Warning') }}
                    <br>

                    {!! Form::hidden('id', old('id' , $payment->id) ) !!}  
                    <br>
                    
                    <div class="modal-footer">
                        {!! Form::button(trans('backend/payments.close'),['class'=>'btn btn-secondary','type'=>'button' , 'data-dismiss' => 'modal']) !!}
                        {!! Form::button(trans('backend/payments.submit'),['class'=>'btn btn-danger font-weight-bolder','type'=>'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>