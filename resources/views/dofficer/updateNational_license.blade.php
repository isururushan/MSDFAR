@extends('layouts.dofficerApp')
@section('title')
    New National license

@stop
@section('pageHeader')
    Add New National license
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dofficer')}}">Home</a></li>
        <li class="breadcrumb-item active"> Add New National license </li>
    </ul>
@stop
@section('content')
    <section class="no-padding-top">
    <div class="row">
        <div class="col-lg-8 offset-md-2 offset-lg-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create New National license</h4>
                </div>
                    <div class="form  ">
                        <div class="content">
                            <form class="text-left form-validate"  method="POST" action="{{route('dofficer/national_license/update/update')}}">
                                <div class="card-body">
                                @csrf
                                <div class="row">
                                <input type="hidden" name="id" value="{{$national_license->id}}">
                                {{------------------EEz license number---------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label> EEZ License Number</label>
                                        <input type="text" name="eez_license_number" value="{{$national_license->eez_license_number}}"  required data-msg="Please enter license number" class="form-control">
                                        <small class="help-block-none"></small>
                                    </div>
                                    {{-------------------Fishermen Id---------------------------------------}}
                                        <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                            <label>Fishermen Id</label>
                                            <input type="text" name="fishermen_id" value="{{$national_license->fishermen_id}}"  required data-msg="Please enter fishermen id" class="form-control">
                                            <small class="help-block-none"></small>
                                        </div>
                                 {{-------------------Boat No---------------------------------------}}
                                        <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                            <label>Boat No</label>
                                            <input type="text" name="boat_no" value="{{$national_license->boat_no}}"  required data-msg="Please enter boat no" class="form-control">
                                            <small class="help-block-none"></small>
                                        </div>


                                        {{-------------------Distric---------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label  >Distric</label>
                                        <select class="selectpicker "  name="distric"  required  title="Choose a distric...">

                                        <option >Colombo</option>
                                             <option >Galle</option>
                                             <option >Matara</option>
                                             <option >Negombo</option>
                                             <option >Trinco</option>
                                             <option>Hambanthita</option>
                                             <option>Puththalama</option>
                                             <option>Mannarama</option>
                                             <option>Jaffna</option>
                                             <option >kalutara</option>

                                         </select>
                                        <small class="help-block-none"></small>
                                    </div>

                                    {{-------------------landing side---------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label  >Landing side</label>
                                        <select class="selectpicker"   name="landing_side"  required  title="Choose a land...">

                                             <option >Beruvala harbour</option>
                                             <option >Colombo harbour</option>
                                             <option >Galle harbour</option>
                                             <option >Negombo harbour</option>
                                             <option >Trinco harbour</option>
                                             <option >batticaloa harbour</option>

                                         </select>
                                        <small class="help-block-none"></small>
                                    </div>
                                    {{-------------------costal area---------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label  >Costal Area</label>
                                        <select class="selectpicker"   name="costal_area"  required  title="Choose a area...">

                                             <option >Srilankan water</option>
                                             <option >International water</option>

                                         </select>
                                        <small class="help-block-none"></small>
                                    </div>
                                    {{-------------------Fish type---------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label  >Fish Type</label>
                                        <input type="text" name="fish_type" value="{{$national_license->fish_type}}"  required data-msg="Please enter fish type" class="form-control">


                                        <small class="help-block-none"></small>
                                    </div>
                                    {{-------------------Nets Type--------------------------------------}}
                                    <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label  >Nets Type</label>
                                        <select class="selectpicker"   name="nets_type"  required  title="Choose a nets...">

                                             <option >Long line</option>
                                             <option >Pursien net</option>
                                             <option >Line</option>

                                         </select>
                                        <small class="help-block-none"></small>
                                    </div>

                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group text-center">
                                        <input id="register" type="submit" value="Create"  class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>

@stop
@section('javaScripts')
    <script>

      //initialise select picker
      $('select').selectpicker();
        /**
         * notifications
         * getting error from session
         * getting success from session
         * if exists show using bootstrap notify
         */
        @if(\Session::has('success'))

            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{Session::get('success')}}",
                type:"success"});
        @elseif(\Session::has('error'))

            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{Session::get('error')}}",
                type:"error"});
        @endif

    </script>
@stop
