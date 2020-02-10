@extends('admin.master')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">User Type List</h3>

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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Nid Number</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>User Type</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $key=> $users)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->nid}}</td>
                        <td>{{$users->number}}</td>
                        <td>{{$users->address}}</td>
                        <td>
                            @if($users->user_role == 1)
                                <span class="label label-success">{{$users->role->name}}</span>
                            @else
                                <span class="label label-primary">{{$users->role->name}}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.user-edit', $users->id)}}" class="btn btn-primary fa fa-edit"></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.user-delete', $users->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
              {{ $user->links() }}
        </div>
    </div>
@endsection

