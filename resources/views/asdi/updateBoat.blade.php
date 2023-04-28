@extends('layouts.asdiApp')
@section('title')
    Update Boat{{$boat->id}}

@stop
@section('pageHeader')
    Boat Update{{$boat->id}}
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('asdi')}}">Home</a></li>
        <li class="breadcrumb-item active"> Boat Updated {{$boat->id}} </li>
    </ul>
@stop
@section('content')
    <section class="no-padding-top">
    <div class="row">
        <div class="col-lg-8 offset-md-2 offset-lg-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Boat Update</h4>
                    </div>
                        <div class="form  ">
                            <div class="content">
                                <form class="text-left form-validate"  method="POST" action="{{route('asdi/boat/update/update')}}">
                                    <div class="card-body">
                                    @csrf
                                    <div class="row">
                                    <input type="hidden" name="id" value="{{$boat->id}}">

                                    {{------------------Boat Name---------------------------------------}}
                                        <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                        <label> Boat Name</label>
                                            <input type="text" name="boat_name" value="{{$boat->boat_name}}"  required data-msg="Please enter boat name" class="form-control">
                                            <small class="help-block-none"></small>
                                        </div>

                                    {{-------------------Boat No---------------------------------------}}
                                            <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                                <label>Boat No</label>
                                                <input type="text" name="boat_no" value="{{$boat->boat_no}}"  required data-msg="Please enter boat no" class="form-control">
                                                <small class="help-block-none"></small>
                                            </div>
                                            {{-------------------Fishermen Id---------------------------------------}}
                                            <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                                <label>Fishermen Id</label>
                                                <input type="text" name="fishermen_id" value="{{$boat->fishermen_id}}"  required data-msg="Please enter fishermen id" class="form-control">
                                                <small class="help-block-none"></small>
                                            </div>

                                            {{-------------------Distric---------------------------------------}}
                                        <div class="form-group-material col-md-6 col-sm-12 col-lg-6">
                                            <label  >Distric</label><br>
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
                                            <label  >Landing side</label><br>
                                            <select class="selectpicker"   name="landing_side"  required  title="Choose a land...">

                                                <option >batticaloa harbour</option>
                                                <option >Beruvala harbour</option>
                                                <option >Colombo harbour</option>
                                                <option >Galle harbour</option>
                                                <option >Negombo harbour</option>
                                                <option >Trinco harbour</option>


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
