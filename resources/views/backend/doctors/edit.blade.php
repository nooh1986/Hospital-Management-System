@extends('backend.layouts.master')

@section('title')
    {{trans('backend/doctors.doctors')}}
@stop


@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{URL::asset('backend/assets/plugins/sumoselect/sumoselect-rtl.css')}}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{URL::asset('backend/assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection

@section('page-header')
	<!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('backend/doctors.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('backend/doctors.edit_doctor')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->			
@endsection

@section('content')
@include('backend.layouts.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                        <form action="{{ route('doctors.update' , 'test') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <input type="hidden" name="id" value="{{$doctor->id}}">

                            <div>
                                @if($doctor->image)
                                    <img style="border-radius:20%"
                                         src="{{Url::asset('backend/All_Photos/Doctors/'. $doctor->image->filename)}}"
                                         height="150px" width="150px" alt="">
                                @else
                                    <img style="border-radius:50%"
                                         src="{{Url::asset('backend/All_Photos/Doctors/doctor_defolat.png')}}"
                                         height="50px" width="50px" alt="">
                                @endif
                            </div>
                            <br><br>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{trans('backend/doctors.name')}}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="name" value="{{$doctor->name}}" type="text">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{trans('backend/doctors.email')}}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="email" type="email" value="{{$doctor->email}}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{ trans('backend/doctors.password') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="password" type="password" value="{{$doctor->password}}">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{ trans('backend/doctors.phone') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="phone" type="phone" value="{{$doctor->phone}}">
                                </div>
                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{trans('backend/doctors.section')}}</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="section_id" class="form-control SlectBox">
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}" {{$section->id == $doctor->section_id ? 'selected':"" }}>{{$section->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">{{trans('backend/doctors.appointments')}}</label>
                                </div>

                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select multiple="multiple" class="testselect2" name="appointments[]" value="{{$doctor->appointments}}">
                                        <option value="{{$doctor->appointments}}" selected>{{$doctor->appointments}}</option>
                                        <option value="{{trans('backend/doctors.sat')}}">{{trans('backend/doctors.sat')}}</option>
                                        <option value="{{trans('backend/doctors.sun')}}">{{trans('backend/doctors.sun')}}</option>
                                        <option value="{{trans('backend/doctors.mon')}}">{{trans('backend/doctors.mon')}}</option>
                                        <option value="{{trans('backend/doctors.tue')}}">{{trans('backend/doctors.tue')}}</option>
                                        <option value="{{trans('backend/doctors.wed')}}">{{trans('backend/doctors.wed')}}</option>
                                        <option value="{{trans('backend/doctors.thu')}}">{{trans('backend/doctors.thu')}}</option>
                                        <option value="{{trans('backend/doctors.fri')}}">{{trans('backend/doctors.fri')}}</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label for="exampleInputEmail1">
                                        {{ trans('backend/doctors.doctor_photo') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                    <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">{{ trans('backend/doctors.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@endsection
@section('js')

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>			

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('backend/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{URL::asset('backend/assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('backend/assets/js/select2.js')}}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{URL::asset('backend/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{URL::asset('backend/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('backend/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

@endsection