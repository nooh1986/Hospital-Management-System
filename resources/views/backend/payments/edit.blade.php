<div class="modal fade" id="edit{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/payments.Edit_payment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('Payments.update' , 'test') }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $payment->id }}">

                <div class="modal-body">
                    <div class="col">
                        <label>{{trans('backend/payments.name_patient')}}:</label>
                        <select name="patient_id" class="form-control">
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}" {{$patient->id == $payment->patient_id ? 'selected':"" }}>{{$patient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
               
                    <div class="col">
                        <label>{{trans('backend/payments.amount')}}:</label>
                        <input type="number" name="debtor" value="{{ $payment->amount }}" class="form-control">
                    </div>
                    <br>

                
                    <div class="col">
                        <label>{{trans('backend/payments.description')}}:</label>
                        <textarea rows="5" cols="10" class="form-control" name="description">{{ $payment->description }}</textarea>
                    </div>
                    <br>

                </div>    

                <div class="modal-footer">
                    <button class="btn btn-success">{{trans('backend/payments.save')}}</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
