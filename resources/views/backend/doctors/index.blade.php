@extends('backend.layouts.master')

@section('title')
    {{trans('backend/doctors.doctors')}}
@stop

@section('css')
    <link href="{{ URL::asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('backend/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('backend/doctors.doctors')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('backend/main-sidebar.view_all') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
@include('backend.layouts.messages_alert')			
	<div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <a href="{{route('doctors.create')}}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('backend/doctors.add_doctor')}}</a>
                </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th wd-5p class="border-bottom-0">#</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.doctor_photo') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.name') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.email') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.section') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.phone') }}</th>
                                <th wd-15p class="border-bottom-0">{{ trans('backend/doctors.appointments') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.Status') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.created_at') }}</th>
                                <th wd-10p class="border-bottom-0">{{ trans('backend/doctors.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @if($doctor->image)
                                            <img src="{{url::asset('backend/All_Photos/Doctors/'. $doctor->image->filename) }}" height="50px" width="50px">
                                        @else
                                            <img src="{{ url::asset('backend/All_Photos/Doctors/doctor_defolat.png') }}" height="50px" width="50px">
                                        @endif
                                    </td>

                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->section->name }}</td>
                                    <td>{{ $doctor->phone }}</td>
                                    <td>{{ $doctor->appointments }}</td>
                                    
                                    <td>
                                        @if ($doctor->status === 1)
                                            <label class="badge badge-success">{{ trans('backend/sections.Status_Section_AC') }}</label>
                                        @else
                                            <label class="badge badge-danger">{{ trans('backend/sections.Status_Section_No') }}</label>
                                        @endif
                                    </td>

                                    <td>{{ $doctor->created_at->diffForHumans() }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('backend/doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp; {{ trans('backend/doctors.Edit_data') }}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i class="text-primary ti-key"></i>&nbsp;&nbsp;{{ trans('backend/doctors.change_Password') }}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i class="text-warning ti-back-right"></i>&nbsp;&nbsp;{{ trans('backend/doctors.Status_change') }}</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i class="text-danger ti-trash"></i>&nbsp;&nbsp;{{ trans('backend/doctors.delete_data') }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    @include('backend.doctors.delete')

                                    @include('backend.doctors.update_password')

                                    @include('backend.doctors.update_status')

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

@endsection

@section('js')
 
	<!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
