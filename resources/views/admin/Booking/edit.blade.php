@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Booking Table Edit</h3>
                      @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aira-hidden="true">
                                        &times;
                                    </button>
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.Booking.update', $booking->id)}}">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Package Name</label>
                                <h5>{{$booking->package_id}}</h5>
                            </div>
                            <div class="form-group">
                                <label for="">Per Person Cost</label>
                                <h5>{{$booking->pp_cost}}</h5>
                            </div>
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <h5>{{$booking->member}}</h5>
                            </div>
                            <div class="form-group">
                                <label for="">Total Price</label>
                                 <h5>{{$booking->total_cost}}</h5>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" />
                                @if($booking->status == 0 )
                                    <option  value="0" selected="">Pending</option>
                                    <option  value="1">Accept</option>
                                    <option  value="2">Rejected</option>
                                    <option  value="3">Cancel</option>
                                @elseif($booking->status ==1) 
                                    <option  value="0">Pending</option>
                                    <option  value="1" selected="">Accept</option>
                                    <option  value="2">Rejected</option>
                                    <option  value="3">Cancel</option>
                                @elseif($booking->status ==2)
                                    <option  value="0">Pending</option>
                                    <option  value="1">Accept</option>
                                    <option  value="2" selected="">Rejected</option>
                                    <option  value="3">Cancel</option>
                                @else
                                    <option  value="0">Pending</option>
                                    <option  value="1">Accept</option>
                                    <option  value="2">Rejected</option>
                                    <option  value="3" selected="">Cancel</option>
                                @endif

                                </select>
                              </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
