@extends('backend.layouts.master')

@section('title')
    {{trans('backend/ambulances.ambulances')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/ambulances.ambulances')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/main-sidebar.view_all')}}</span>
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
                        <a href="{{ route('Ambulances.create') }}" class="btn btn-primary">{{trans('backend/ambulances.Add_ambulance')}}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.car_number')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.car_model')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.car_year_made')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.driver_name')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.driver_license_number')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.driver_phone')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.notes')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.status')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/ambulances.Processes')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($ambulances as $ambulance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{$ambulance->car_number}}</td>

                                    <td>{{$ambulance->car_model}}</td>

                                    <td>{{$ambulance->car_year_made}}</td>

                                    <td>{{$ambulance->driver_name}}</td>

                                    <td>{{$ambulance->driver_license_number}}</td>

                                    <td>{{$ambulance->driver_phone}}</td>

                                    <td>{{$ambulance->notes}}</td>

                                    <td>
                                        @if ($ambulance->status === 1)
                                            <label class="badge badge-success">{{ trans('backend/sections.Status_Section_AC') }}</label>
                                        @else
                                            <label class="badge badge-danger">{{ trans('backend/sections.Status_Section_No') }}</label>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('Ambulances.edit' , $ambulance->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $ambulance->id }}" title="{{ trans('backend/sections.delete_sections') }}"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                            @include('backend.ambulances.delete')    

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        
    </div>

@endsection

@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection