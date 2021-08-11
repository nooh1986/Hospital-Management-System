<button class="btn btn-primary pull-right" wire:click="show_form" type="button">{{ trans('backend/single-invoice.add_single_invoice') }}</button><br><br>
<table class="table text-md-nowrap" id="example1">
    <thead>
        <tr>
            <th class="border-bottom-0">#</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.name_patient')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.name_doctor')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.name_section')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.name_service')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.price')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.discount')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.tax_rate')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.tax_value')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.total')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.type')}}</th>
            <th class="border-bottom-0">{{trans('backend/single-invoice.Processes')}}</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($single_invoices as $single_invoice)
        
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{$single_invoice->patient->name}}</td>

            <td>{{$single_invoice->doctor->name}}</td>

            <td>{{$single_invoice->section->name}}</td>

            <td>{{$single_invoice->service->name}}</td>

            <td>{{ $single_invoice->price }}</td>

            <td>{{$single_invoice->discount}}</td>

            <td>{{$single_invoice->tax_rate}}</td>

            <td>{{$single_invoice->tax_value}}</td>

            <td>{{$single_invoice->Total}}</td>

            <td>{{ ($single_invoice->type == 1) ? trans('backend/single-invoice.cash') : trans('backend/single-invoice.Deferred')}}
            
            <td>
                <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" wire:click="delete({{ $single_invoice->id }})" ><i class="fa fa-trash"></i></button>
            </td>
        </tr>
                                               
    @endforeach
    </tbody>
   
</table>

@include('livewire.SingleInvoice.delete')