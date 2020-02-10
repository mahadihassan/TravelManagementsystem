@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Tour Package Type Update</h3>
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
                    <form role="form" method="POST" action="{{route('admin.TourPackageClass.update', $TourPackage->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Tour Package Title </label>
                                <input type="text" class="form-control" name="title" value="{{$TourPackage->title}}">
                            </div>

                            <div class="form-group">
                                <label for="status">Select Division</label>
                                <select class="form-control" name="category" required/>
                                @switch($TourPackage->category_id)
                                    @case(1):
                                        <option  value="1" selected="">Dhaka</option>
                                        <option  value="2">Cumilla</option>
                                        <option  value="3">Cox's Bazar</option>
                                        <option  value="4">Sylhet</option>
                                        @break
                                    @case(2):
                                        <option  value="1">Dhaka</option>
                                        <option  value="2" selected="">Cumilla</option>
                                        <option  value="3">Cox's Bazar</option>
                                        <option  value="4">Sylhet</option>
                                        @break
                                    @case(3):
                                        <option  value="1">Dhaka</option>
                                        <option  value="2">Cumilla</option>
                                        <option  value="3" selected="">Cox's Bazar</option>
                                        <option  value="4">Sylhet</option>
                                        @break
                                    @case(4):
                                        <option  value="1">Dhaka</option>
                                        <option  value="2">Cumilla</option>
                                        <option  value="3">Cox's Bazar</option>
                                        <option  value="4" selected="">Sylhet</option>
                                        @break
                                @endswitch
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Tour Package Location</label>
                                <input type="text" class="form-control" name="location" value="{{$TourPackage->location}}">
                            </div>
                            <div class="form-group">
                                <label>Experied Date:</label>
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation" value="{{ $TourPackage->ex_date}}" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Tour Package Cost </label>
                                <input type="text" class="form-control" name="cost" value="{{$TourPackage->pp_cost}}">
                            </div>
                            <div class="form-group my-3">
                                <label for="">Tour Package Description</label>
                                <textarea rows="3" class="form-control" name="description">{{$TourPackage->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Discount Type</label>
                                <select class="form-control" name="discount_id" required/>
                                @switch($TourPackage->discount_id)
                                    @case(1):
                                        <option  value="1" selected="">Plain</option>
                                        <option  value="2">Percentage</option>
                                        <option  value="3">Coupon</option>
                                        @break
                                    @case(2):
                                        <option  value="1">Plain</option>
                                        <option  value="2" selected="">Percentage</option>
                                        <option  value="3">Coupon</option>
                                        @break
                                    @case(3):
                                        <option  value="1">Plain</option>
                                        <option  value="2">Percentage</option>
                                        <option  value="3" selected="">Coupon</option>
                                        @break
                                    @endswitch
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Discount value</label>
                                <input type="text" class="form-control" name="discount" value="{{$TourPackage->discount}}">
                            </div>
                            <img style="width:20%;" class="img-responsive" src="{{ asset('images/TourImage/'.$TourPackage->image )}}">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Tour Package file input</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection
