<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/payments.Add_payment')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('Payments.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="modal-body">
                    <div class="col">
                        <label>{{trans('backend/payments.name_patient')}}:</label>
                        <select name="patient_id" class="form-control ">
                            <option value="" selected disabled>---{{ trans('backend/reseipts.Choose') }}---</option>
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}">{{$patient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
               
                    <div class="col">
                        <label>{{trans('backend/payments.amount')}}:</label>
                        <input type="number" name="debtor"  value="{{old('debtor')}}" class="form-control">
                    </div>
                    <br>

                
                    <div class="col">
                        <label>{{trans('backend/payments.description')}}:</label>
                        <textarea rows="5" cols="10" class="form-control" name="description"></textarea>
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
