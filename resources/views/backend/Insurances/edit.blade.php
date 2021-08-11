@extends('backend.layouts.master')

@section('title')
    {{trans('backend/insurances.edit_Insurance')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/insurances.Insurance')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/insurances.edit_Insurance')}}</span>
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
                    <form action="{{route('Insurances.update' , 'test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="id"  value="{{ $insurance->id }}">

                        <div class="row">
                            <div class="col">
                                <label>{{trans('backend/insurances.Company_code')}}</label>
                                <input type="text" name="insurance_code"  value="{{old('insurance_code' , $insurance->insurance_code )}}" class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                                <label>{{trans('backend/insurances.Company_name')}}</label>
                                <input type="text" name="name"  value="{{old('name' , $insurance->name )}}" class="form-control @error('name') is-invalid @enderror">
                                @error('insurance_code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label>{{trans('backend/insurances.discount_percentage')}} %</label>
                                <input type="text" name="discount_percentage"  value="{{old('discount_percentage' , $insurance->discount_percentage )}}" class="form-control @error('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col">
                                <label>{{trans('backend/insurances.Insurance_bearing_percentage')}} %</label>
                                <input type="text" name="company_rate"  value="{{old('company_rate' , $insurance->company_rate )}}" class="form-control @error('company_rate') is-invalid @enderror">
                                @error('company_rate')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label>{{trans('backend/insurances.notes')}}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes">{{ $insurance->notes }}</textarea>
                            </div>
                        </div>
    
                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label>{{trans('backend/insurances.status')}}</label>
                                 &nbsp;
                                <input name="status" {{$insurance->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{trans('backend/insurances.save')}}</button>
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
