@extends('backend.layouts.master')

@section('title')
    {{trans('backend/single-invoice.single_invoice')}}
@stop

@section('css')
    
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('backend/single-invoice.single_invoice')}}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
	
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<livewire:single-invoice />
				</div>
			</div>
		</div>
	</div>
	
@endsection

@section('js')
    
@endsection