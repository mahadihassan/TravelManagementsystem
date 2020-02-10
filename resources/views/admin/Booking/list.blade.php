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
                    <th>User Name</th>
                    <th>Package Name</th>
                    <th>Per Cost</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($booking as $key => $bookings)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$bookings->user->name}}</td>
                        <td>{{$bookings->package->title}}</td>
                        <td>{{$bookings->pp_cost}}</td>
                        <td>{{$bookings->member}}</td>
                        <td>{{$bookings->total_cost}}</td>
                        <td>
                            @if($bookings->status ==0)
                                <span class="label label-info">
                                    <i class="fa fa-arrows-h"></i>Pending
                                </span>
                            @elseif($bookings->status ==1)
                                <span class="label label-success">
                                    <i class="fa fa-check"></i> Accept
                                </span>
                            @elseif($bookings->status ==2)
                                <span class="label label-danger">
                                    <i class="fa fa-trash"></i> Rejected
                                </span>
                            @else
                                <span class="label label-warning">
                                    <i class="fa fa-scissors"></i> Cancel
                                </span>
                            @endif
                        </td>
                        @if($bookings->status ==2)

                        @else
                            <td>
                                <a href="{{route('admin.Booking.edit', $bookings->id)}}" type="submit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.Booking.destroy',$bookings->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary alert-danger fa fa-trash" onclick="return confirm('Are you sure?')"  type="submit"></button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $booking->links() }}
        </div>
    </div>
@endsection

