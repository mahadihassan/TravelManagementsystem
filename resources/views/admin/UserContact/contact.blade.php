@extends('admin.master')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">TourPackage Type List</h3>

            @if(count($errors)>0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
            @endif


            @if(session()->has('message'))
                <div class="">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                            &times;
                        </button>
                        {{session()->get('message')}}
                    </div>

                </div>
            @endif

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contact as $key => $contacts)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$contacts->first_name}}</td>
                        <td>{{$contacts->last_name}}</td>
                        <td>{{$contacts->email}}</td>
                        <td>{{$contacts->subject}}</td>
                        <td>{{$contacts->message}}</td>
                        <td>
                        	<form action="{{ route('admin.contact-delete',$contacts->id)}}" method="post">
                            	@csrf
                            	@method('DELETE')
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $contact->links() }}
        </div>
    </div>
@endsection

