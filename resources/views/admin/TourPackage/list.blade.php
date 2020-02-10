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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Descripation</th>
                    <th>Expire Date</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($TourPackage as $key => $TourPackages)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$TourPackages->title}}</td>
                        <td>{{$TourPackages->categorys->category_name}}</td>
                        <td>{{$TourPackages->location}}</td>
                        <td>{{$TourPackages->description}}</td>
                        <td>{{$TourPackages->ex_date}}</td>
                        <td><strike>{{$TourPackages->pp_cost}}</strike>
                            <p>{{$TourPackages->ppcost_discount}}</p>
                        </td>
                        <td>
                            <img style="width:20%;" class="img-responsive" src="{{ asset('images/TourImage') }}/{{ $TourPackages->image }}">
                        </td>
                        <td>
                            <a href="{{route('admin.TourPackageClass.show', $TourPackages->id)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('admin.TourPackageClass.edit', $TourPackages->id)}}" class="btn btn-info">Edit</a>
                        </td>

                        <td>
                            <form action="{{ route('admin.TourPackageClass.destroy',$TourPackages->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $TourPackage->links() }}
        </div>
        <!-- /.box-body -->
    </div>




@endsection

