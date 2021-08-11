@extends('backend.layouts.master')

@section('title')
    {{trans('backend/patiens.Edie_patien')}}
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
                <h4 class="content-title mb-0 my-auto">{{trans('backend/patiens.patiens')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/patiens.Edie_patien')}}</span>
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
                        <form action="{{ route('Patients.update' , 'test') }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{$patien->id}}">

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/patiens.name')}}</label>
                                    <input type="text" name="name"  value="{{old('name' , $patien->name)}}" class="form-control  @error('name') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/patiens.email')}}</label>
                                    <input type="text" name="email"  value="{{old('email' , $patien->email)}}" class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/patiens.date')}}</label>
                                    <input type="date" name="date"  value="{{old('date' , $patien->date)}}" class="form-control @error('date') is-invalid @enderror">
                                </div>
                            </div>    

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/patiens.phone')}}</label>
                                    <input type="text" name="phone"  value="{{old('phone' , $patien->phone)}}" class="form-control @error('phone') is-invalid @enderror">
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/patiens.gender')}}</label>
                                    <select name="gender" class="form-control SlectBox">
                                        <option value="1" {{$patien->gender === 1 ? 'selected' : ''}}>{{trans('backend/patiens.male')}}</option>
                                        <option value="0" {{$patien->gender === 0 ? 'selected' : ''}}>{{trans('backend/patiens.female')}}</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label>{{trans('backend/patiens.blood')}}</label>
                                    <select name="blood_id" class="form-control SlectBox">
                                        @foreach($bloods as $blood)
                                            <option value="{{$blood->id}}" {{$blood->id === $patien->blood_id ? 'selected':"" }}>{{$blood->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>   

                            <br>

                            <div class="row">
                                <div class="col">
                                    <label>{{trans('backend/patiens.address')}}</label>
                                    <textarea rows="5" cols="10" class="form-control @error('address') is-invalid @enderror" name="address">{{ $patien->address }}</textarea>
                                </div>
                            </div>
        
                            <br>
        
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success">{{trans('backend/patiens.save')}}</button>
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