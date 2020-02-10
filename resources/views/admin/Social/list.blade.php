@extends('admin.master')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">TourPackage List</h3>

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
                    <th>FaceBook</th>
                    <th>Twitter</th>
                    <th>Instagram</th>
                    <th>LinkedIn</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($social as $key => $socials)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$socials->fb}}</td>
                        <td>{{$socials->twitter}}</td>
                        <td>{{$socials->instagram}}</td>
                        <td>{{$socials->linkedin}}</td>
                        <td>
                            <a href="{{route('admin.Social.edit', $socials->id)}}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>




@endsection

