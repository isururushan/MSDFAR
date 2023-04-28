@extends('layouts.asdiApp')
@section('title')
   License
@stop
@section('pageHeader')
    View National license
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('asdi')}}">Home</a></li>
        <li class="breadcrumb-item active">  View National license </li>
    </ul>
@stop
@section('content')

    <div class="block">
        <div class="block-body">
            <div class="">
                <div id="classroom" class="dataTables_wrapper dt-bootstrap4 ">
                    <table id="national_licenseTable" class="table dataTable no-footer"  aria-describedby="datatable1_info">
                        <thead>
                        <tr role="row">
                            <th >EEZ_NO</th>
                            <th >F_Id</th>
                            <th >Boat No</th>
                            <th >Distric</th>
                            <th >Landing side</th>
                            <th >Costal Area</th>
                            <th >Fish Type</th>
                            <th >Nets Type</th>
                            <th >Update</th>
                            <th >Delete</th>
                            </tr>
                        </thead>
                    </tbody>
                        @foreach($national_licenses as $national_license)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$national_license->eez_license_number}}
                                </td>
                                <td>
                                {{$national_license->fishermen_id}}
                                </td>
                                <td>
                                {{$national_license->boat_no}}
                                </td>
                                <td>
                                {{$national_license->distric}}
                                </td>
                                <td>
                                {{$national_license->landing_side}}
                                </td>
                                <td>
                                {{$national_license->costal_area}}
                                </td>
                                <td>
                                {{$national_license->fish_type}}
                                </td>
                                <td>
                                {{$national_license->nets_type}}
                                </td>
                                <td><a  href="{{route('asdi/national_license/update/',$national_license->id)}}"  class="btn btn-outline-success">Update</a></td>
                                <td><a  href="{{route('asdi/national_license/delete/',$national_license->id)}}" data-toggle="confirmation" data-title="Delete National_license?" class="btn btn-outline-danger">Delete</a></td>
                              </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
@section('javaScripts')
    <script>

        $(document).ready(function(){
            $('#national_licenseTable').DataTable();
        });

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
