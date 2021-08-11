<div class="modal fade" id="edit{{ $receipt->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('backend/reseipts.Edit_reseipt')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('Receipts.update' , 'test') }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $receipt->id }}">

                <div class="modal-body">
                    <div class="col">
                        <label>{{trans('backend/reseipts.name_patient')}}:</label>
                        <select name="patient_id" class="form-control select2">
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}" {{$patient->id == $receipt->patient_id ? 'selected':"" }}>{{$patient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
               
                    <div class="col">
                        <label>{{trans('backend/reseipts.amount')}}:</label>
                        <input type="number" name="debtor" value="{{ $receipt->debtor }}" class="form-control">
                    </div>
                    <br>

                
                    <div class="col">
                        <label>{{trans('backend/reseipts.description')}}:</label>
                        <textarea rows="5" cols="10" class="form-control" name="description">{{ $receipt->description }}</textarea>
                    </div>
                    <br>

                </div>    

                <div class="modal-footer">
                    <button class="btn btn-success">{{trans('backend/reseipts.save')}}</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
