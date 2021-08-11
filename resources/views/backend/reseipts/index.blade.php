@extends('backend.layouts.master')

@section('title')
    {{trans('backend/reseipts.reseipts')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/reseipts.reseipts')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/main-sidebar.view_all')}}</span>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
							{{trans('backend/reseipts.Add_reseipt')}}
						</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{trans('backend/reseipts.name_patient')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/reseipts.amount')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/reseipts.description')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/reseipts.date')}}</th>
                                    <th class="border-bottom-0">{{trans('backend/reseipts.Processes')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($receipts as $receipt)
                               
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{$receipt->patient->name}}</td>

                                    <td>{{$receipt->debtor}}</td>

                                    <td>{{ \Str::limit($receipt->description, 50) }}</td>
                                    
                                    <td>{{ $receipt->created_at->diffForHumans() }}</td>

                                    <td>
                                        {{-- <a href="{{ route('Receipts.edit' , $receipt->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> --}}
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $receipt->id }}"><i class="fa fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $receipt->id }}"><i class="fa fa-trash"></i>
                                        </button>

                                        <a href="{{ route('Receipts.show' , $receipt->id) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                    
                                    </td>
                                </tr>

                                @include('backend.reseipts.edit')
                            
                                @include('backend.reseipts.delete')

                            @endforeach

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        @include('backend.reseipts.create')
        
    </div>

@endsection

@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('backend/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('backend/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('backend/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('backend/assets/js/form-elements.js')}}"></script>
@endsection