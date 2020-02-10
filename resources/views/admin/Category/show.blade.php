@extends('admin.master')
@section('content')
    <div class="content">

        <div class="col-md-6" {{--style="padding: 0 0 0 280px"--}}>
            @csrf
            <div class="box box-primary">
                <div class="box-body box-profile">
                    {{--<img class="profile-user-img img-responsive img-circle" src="{{asset('images/hostImage/'.$host->image)}}" alt="User profile picture">--}}

                    {{--<h3 class="profile-username text-center">{{$host->name}}</h3>

                    <p class="text-muted text-center">{{$host->certification}}</p>--}}

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group">
                            <b>Slider Title</b> <a class="pull-right">{{$slider->title}}</a>
                        </li>
                        <li class="list-group">
                            <b>Slider Sub Title</b> <a class="pull-right">{{$slider->sub_title}}</a>
                        </li>
                        <p><b>Image</b></p>
                        <img style="width:20%;" class="img-responsive" src="{{ asset('images/Slider/'.$slider->image )}}">
                    </ul>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>


@endsection





