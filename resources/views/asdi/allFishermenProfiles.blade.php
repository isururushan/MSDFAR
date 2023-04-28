@extends('layouts.asdiApp')
@section('title')
   Profiles
@stop
@section('pageHeader')
    Fishermen  Profile
@stop
@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('asdi')}}">Home</a></li>
        <li class="breadcrumb-item active"> Fishermen  Profiles </li>
    </ul>
@stop
@section('content')

    <div class="block">
        <div class="block-body">
            <div class="">
                <div id="classroom" class="dataTables_wrapper dt-bootstrap4 ">
                    <table id="userTable" class="table dataTable no-footer"  aria-describedby="datatable1_info">
                        <thead>
                        <tr role="row">
                        <th >Avatar</th>
                            <th >First Name</th>
                            <th >Last Name</th>
                            <th >Email</th>
                            <th >Nic</th>
                            <th >Address</th>
                            <th >DOB</th>
                            <th >Mobile No</th>
                            <th >Distric</th>

</tr>
</thead>
</tbody>
                        @foreach($fishermens as $fishermen)
                            <tr role="row" class="odd">
                            <td class="sorting_1">
                                    <div class="avatar">
                                        <img src="{{asset('Profilepic/'.$fishermen->user->avatar)}}" alt="avatar" class="img-fluid rounded-circle">
                                    </div>
                                <td>
                                    {{$fishermen->user->first_name}}
                                </td>
                                <td>
                                    {{$fishermen->user->last_name}}
                                </td>
                                <td>
                                    {{$fishermen->user->email}}
                                </td>
                                <td>
                                    {{$fishermen->nic}}
                                </td>
                                <td>
                                    {{$fishermen->address}}
                                </td>
                                <td>
                                    {{$fishermen->dob}}
                                </td>
                                <td>
                                    {{$fishermen->mobile_no}}
                                </td>
                                <td>
                                    {{$fishermen->distric}}
                                </td>

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
            $('#userTable').DataTable();
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
