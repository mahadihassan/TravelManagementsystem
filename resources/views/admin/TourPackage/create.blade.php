@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Tour Package Type Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.TourPackageClass.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Tour Package Title </label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter Tour Package Title">
                            </div>

                            <div class="form-group">
                                <label for="status">Division</label>
                                <select class="form-control" name="category">
                                    <option value="" selected>Select Division</option>
                                    @foreach($category as $categorys)
                                        <option  value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Tour Package Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter Tour Package Location">
                            </div>

                            <div class="form-group">
                                <label>Experied Date:</label>
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation" name="date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Tour Package Cost </label>
                                <input type="text" class="form-control" name="cost"  placeholder="Enter Tour Package Title">
                            </div>
                            <div class="form-group">
                                <label for="">Tour Package Description</label>
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter Tour Package description"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="status">Discount Type</label>
                                <select class="form-control" name="discount_id">
                                    <option value="" selected>Discount</option>
                                    @foreach($discount as $discounts)
                                        <option  value="{{$discounts->id}}">{{$discounts->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Discount value</label>
                                <input type="text" class="form-control" name="discount"  placeholder="Enter Your Discount value">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Tour Package file input</label>
                                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection





