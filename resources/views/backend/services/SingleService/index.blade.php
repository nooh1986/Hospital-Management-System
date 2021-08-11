@extends('backend.layouts.master')

@section('title')
    {{trans('backend/main-sidebar.Services')}}
@stop

@section('css')
	<link href="{{URL::asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
	<!--Internal   Notify -->
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('backend/main-sidebar.Services')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/main-sidebar.view_all')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->			
@endsection

@section('content')
@include('backend.layouts.messages_alert')			
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
							{{trans('backend/services.add_Service')}}
						</button>
					</div>
				</div>
				
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example1">
							<thead>
								<tr>
									<th class="wd-15p border-bottom-0">#</th>
									<th class="wd-15p border-bottom-0">{{trans('backend/sections.name_sections')}}</th>
									<th class="wd-15p border-bottom-0">{{trans('backend/sections.description')}}</th>
									<th class="wd-20p border-bottom-0">{{trans('backend/sections.status')}}</th>
									<th class="wd-20p border-bottom-0">{{trans('backend/sections.created_at')}}</th>
									<th class="wd-15p border-bottom-0">{{trans('backend/sections.Processes')}}</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($services as $service)
								<tr>
									<td>{{ $loop->iteration }}</td>

									<td>{{ $service->name }}</td>
									
									<td>{{\Str::limit($service->description, 50) }}</td>

									<td>
										@if ($service->status === 1)
                                       		<label class="badge badge-success">{{ trans('backend/sections.Status_Section_AC') }}</label>
                                        @else
                                        	<label class="badge badge-danger">{{ trans('backend/sections.Status_Section_No') }}</label>
                                        @endif
									</td>

									<td>{{$service->created_at->diffForHumans()}}</td>

									<td>
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal"
										data-target="#edit{{ $service->id }}" title="{{ trans('backend/sections.edit_sections') }}"><i class="fa fa-edit"></i></button>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
										data-target="#delete{{ $service->id }}" title="{{ trans('backend/sections.delete_sections') }}"><i class="fa fa-trash"></i></button>
									</td>

									@include('backend.services.SingleService.edit')

									@include('backend.services.SingleService.delete')

								</tr>
									
								@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--/div-->

		@include('backend.services.SingleService.add')
	</div>								
			
		
@endsection


@section('js')
	
	<!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>	

@endsection