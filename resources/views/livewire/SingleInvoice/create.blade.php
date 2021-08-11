<form wire:submit.prevent="store" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col">
            <label>{{ trans('backend/single-invoice.name_patient') }}</label>
            <select wire:model="patient_id" class="form-control" required>
                <option value="" >{{ trans('backend/single-invoice.choose') }}</option>
                @foreach ($patients as $patient )
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>    
        </div>

        <div class="col">
            <label>{{ trans('backend/single-invoice.name_doctor') }}</label>
            <select wire:model="doctor_id" class="form-control" required>
                <option value="">{{ trans('backend/single-invoice.choose') }}</option>
                @foreach ($doctors as $doctor )
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>    
        </div>

        <div class="col">
            <label>{{ trans('backend/single-invoice.section') }}</label>
            <select wire:model="section_id" class="form-control" required>
                <option value="">{{ trans('backend/single-invoice.choose') }}</option>
                @foreach ($sections as $section )
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>  
        </div>

        <div class="col">
            <label>{{ trans('backend/single-invoice.type') }}</label>
            <select wire:model="type" class="form-control">
                <option value="">{{ trans('backend/single-invoice.choose') }}</option>
                <option value="1">{{ trans('backend/single-invoice.cash') }}</option>
                <option value="0">{{ trans('backend/single-invoice.Deferred') }}</option>
            </select>    
        </div>
    </div><br>

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('backend/single-invoice.name_service')}}</th>
                                    <th>{{trans('backend/single-invoice.price')}}</th>
                                    <th>{{trans('backend/single-invoice.discount')}}</th>
                                    <th>{{trans('backend/single-invoice.tax_rate')}}</th>
                                    <th>{{trans('backend/single-invoice.tax_value')}}</th>
                                    <th>{{trans('backend/single-invoice.total')}}</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    
                                    <td>
                                        <select wire:model="service_id" class="form-control" wire:change="get_price" id="exampleFormControlSelect1">
                                            <option value="">{{ trans('backend/single-invoice.choose') }}</option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td><input wire:model="price" type="text" class="form-control" readonly></td>

                                    <td><input wire:model="discount_value" type="text" class="form-control"></td>

                                    <th><input wire:model="tax_rate" type="text" class="form-control"></th>

                                    <td><input type="text" class="form-control" value="{{$tax_value}}" readonly ></td>

                                    <td><input type="text" class="form-control" readonly value="{{$total + $tax_value }}"></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">

</form>