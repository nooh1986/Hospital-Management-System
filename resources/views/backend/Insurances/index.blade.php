@extends('backend.layouts.master')

@section('title')
    {{trans('backend/insurances.Insurance')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/insurances.Insurance')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/main-sidebar.view_all')}}</span>
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
                        <a href="{{ route('Insurances.create') }}" class="btn btn-primary">{{trans('backend/insurances.Add_Insurance')}}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.Company_name')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.Company_code')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.discount_percentage')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.Insurance_bearing_percentage')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.notes')}}</th>
                                    <th class="wd-20p border-bottom-0">{{trans('backend/insurances.status')}}</th>
                                    <th class="wd-15p border-bottom-0">{{trans('backend/insurances.Processes')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($insurances as $insurance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{$insurance->name}}</td>

                                    <td>{{$insurance->insurance_code}}</td>

                                    <td>{{$insurance->discount_percentage}}</td>

                                    <td>{{$insurance->company_rate}}</td>

                                    <td>{{$insurance->notes}}</td>

                                    <td>
                                        @if ($insurance->status === 1)
                                            <label class="badge badge-success">{{ trans('backend/sections.Status_Section_AC') }}</label>
                                        @else
                                            <label class="badge badge-danger">{{ trans('backend/sections.Status_Section_No') }}</label>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('Insurances.edit' , $insurance->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $insurance->id }}" title="{{ trans('backend/sections.edit_sections') }}"><i class="fa fa-edit"></i>
                                        </button> --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $insurance->id }}" title="{{ trans('backend/sections.delete_sections') }}"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                @include('backend.Insurances.delete')

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        @include('backend.sections.add')
    </div>

@endsection

@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
