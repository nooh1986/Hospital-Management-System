<div>

    @if ($InvoiceSaved)
        <div class="alert alert-info">{{trans('backend/messages.add')}}</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">{{trans('backend/messages.edit')}}</div>
    @endif

    @if ($show_table)

        @include('livewire.SingleInvoice.table')

    @else

        @include('livewire.SingleInvoice.create')
        
    @endif 


</div>
