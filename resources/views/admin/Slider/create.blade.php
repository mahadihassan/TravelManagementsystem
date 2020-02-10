@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Slider Create</h3>
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
                    <form role="form" method="post" action="{{route('admin.Slider.store')}}" enctype="multipart/form-data">
                       @csrf
                        @method('POST')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Slider Title </label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter Slider Title">
                            </div>


                            <div class="form-group">
                                <label for="">Slider Sub Title</label>
                                <textarea rows="3" class="form-control" name="sub_title" placeholder="Enter Slider Sub Title"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Slider file input</label>
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
