@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">Slider Update</h3>
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
                    <form role="form" method="POST" action="{{route('admin.Slider.update', $sliders->id)}}" enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Slider Title </label>
                                <input type="text" class="form-control" name="title" value="{{$sliders->title}}">
                            </div>

                            <div class="form-group my-3">
                                <label for="">Tour Package Description</label>
                                <textarea rows="3" class="form-control" name="sub_title">{{$sliders->sub_title}}</textarea>
                            </div>

                            <img style="width:20%;" class="img-responsive" src="{{ asset('images/Slider/'.$sliders->image )}}">
                            <div class="form-group">
                                <label for="">Tour Package Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection
