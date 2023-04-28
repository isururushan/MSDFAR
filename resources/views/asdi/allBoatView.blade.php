@extends('layouts.asdiApp')
@section('title')
   Boat
@stop
@section('pageHeader')
    View Boat
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('asdi')}}">Home</a></li>
        <li class="breadcrumb-item active">  View Boat </li>
    </ul>
@stop
@section('content')

    <div class="block">
        <div class="block-body">
            <div class="">
                <div id="classroom" class="dataTables_wrapper dt-bootstrap4 ">
                    <table id="boatTable" class="table dataTable no-footer"  aria-describedby="datatable1_info">
                        <thead>
                        <tr role="row">
                            <th >Boat Name</th>

                            <th >Boat No</th>
                            <th >Distric</th>
                            <th >Fishermen Id</th>
                            <th >Landing side</th>
                            <th >Update</th>
                            <th >Delete</th>
                            </tr>
                        </thead>
                    </tbody>
                        @foreach($boats as $boat)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$boat->boat_name}}
                                </td>

                                <td>
                                {{$boat->boat_no}}
                                </td>
                                <td>
                                {{$boat->distric}}
                                </td>
                                <td>
                                {{$boat->fishermen_id}}
                                </td>
                                <td>
                                {{$boat->landing_side}}
                                </td>
                                <td><a  href="{{route('asdi/boat/update/',$boat->id)}}"  class="btn btn-outline-success">Update</a></td>
                                <td><a  href="{{route('asdi/boat/delete/',$boat->id)}}" data-toggle="confirmation" data-title="Delete Boat?" class="btn btn-outline-danger">Delete</a></td>
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
            $('#boatTable').DataTable();
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
