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
                            <b>Tour Package Title</b> <a class="pull-right">{{$TourPackage->title}}</a>
                        </li>
                        <li class="list-group">
                            <b>Tour Package Location</b> <a class="pull-right">{{$TourPackage->location}}</a>
                        </li>
                        <li class="list-group">
                            <b>Tour Package Per-Person</b> <a class="pull-right">{{$TourPackage->pp_cost}}</a>
                        </li>
                        <li class="list-group">
                            <b>Tour Package Discount Price</b> <a class="pull-right">{{$TourPackage->ppcost_discount}}</a>
                        </li>
                        <li class="list-group">
                            <b>Tour Package Expire Date</b> <a class="pull-right">{{$TourPackage->ex_date}}</a>
                        </li>
                        <p><b>Image</b></p>
                        <img style="width:20%;" class="img-responsive" src="{{ asset('images/TourImage/'.$TourPackage->image )}}">
                        <li class="list-group">
                            <b>Tour Package description</b> <a class="pull-right">{{$TourPackage->location}}</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>


@endsection





