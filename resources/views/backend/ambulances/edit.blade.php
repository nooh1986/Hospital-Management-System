@extends('backend.layouts.master')

@section('title')
    {{trans('backend/ambulances.edit_ambulance')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/ambulances.ambulances')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/ambulances.edit_ambulance')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    @include('backend.layouts.messages_alert')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('Ambulances.update' , 'test') }}" method="POST" autocomplete="off">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="id" value="{{ $ambulance->id }}">

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/ambulances.car_number')}}</label>
                                    <input type="text" name="car_number"  value="{{old('car_number' , $ambulance->car_number)}}" class="form-control  @error('car_number') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/ambulances.car_model')}}</label>
                                    <input type="text" name="car_model"  value="{{old('car_model' , $ambulance->car_model)}}" class="form-control @error('car_model') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/ambulances.car_year_made')}}</label>
                                    <input type="text" name="car_year_made"  value="{{old('car_year_made' , $ambulance->car_year_made)}}" class="form-control @error('car_year_made') is-invalid @enderror">
                                </div>
                            </div>    

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/ambulances.driver_name')}}</label>
                                    <input type="text" name="driver_name"  value="{{old('driver_name' , $ambulance->driver_name)}}" class="form-control @error('driver_name') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/ambulances.driver_license_number')}}</label>
                                    <input type="text" name="driver_license_number"  value="{{old('driver_license_number' , $ambulance->driver_license_number)}}" class="form-control @error('driver_license_number') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/ambulances.driver_phone')}}</label>
                                    <input type="number" name="driver_phone"  value="{{old('driver_phone' , $ambulance->driver_phone)}}" class="form-control @error('driver_phone') is-invalid @enderror">
                                </div>
                            </div>   

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/ambulances.notes')}}</label>
                                    <textarea rows="5" cols="10" class="form-control @error('notes') is-invalid @enderror" name="notes">{{ $ambulance->notes}}</textarea>
                                </div>
                            </div>
        
                            <br>
        
                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/insurances.status')}}</label>
                                     &nbsp;
                                    <input name="status" {{$ambulance->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success">{{trans('backend/ambulances.save')}}</button>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>

@endsection


@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection