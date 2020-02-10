@extends('admin.master')
@section('content')

    <div class="box">
        <div class="box-header" style="text-align: center">
            <h3 class="box-title">Slider List</h3>

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
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($slider as $key => $sliders)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$sliders->title}}</td>
                        <td>{{$sliders->sub_title}}</td>
                        <td>
                            <img style="width:20%;" class="img-responsive" src="{{ asset('images/Slider') }}/{{ $sliders->image }}">
                        </td>
                        <td>
                            <a href="{{route('admin.Slider.show', $sliders->id)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('admin.Slider.edit', $sliders->id)}}" class="btn btn-info">Edit</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.Slider.destroy',$sliders->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

