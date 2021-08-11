@extends('backend.layouts.master')

@section('title')
    {{trans('backend/patiens.patiens')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/patiens.patiens')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/main-sidebar.view_all')}}</span>
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
                        <a href="{{ route('Patients.create') }}" class="btn btn-primary">{{trans('backend/patiens.Add_patien')}}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.name')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.email')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.date')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.phone')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.gender')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.blood')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.address')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/patiens.Processes')}}</th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{$patient->name}}</td>

                                    <td>{{$patient->email}}</td>

                                    <td>{{$patient->date_birth}}</td>

                                    <td>{{$patient->phone}}</td>

                                    <td>{{ ($patient->gender) }}</td>

                                    <td>{{$patient->blood->name}}</td>

                                    <td>{{$patient->address}}</td>

                                    <td>
                                        <a href="{{ route('Patients.edit' , $patient->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $patient->id }}" title="{{ trans('backend/sections.delete_sections') }}"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                @include('backend.patiens.delete')

                                                                
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
