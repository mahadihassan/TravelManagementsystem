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
                    <form role="form" method="post" action="{{route('admin.Social.update', $socials->id)}}">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">FaceBook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $socials->fb }}">
                            </div>

                            <div class="form-group">
                                <label for="">Twitter</label>
                                <input type="text" class="form-control" name="twitter"  value="{{ $socials->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ $socials->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" value="{{ $socials->linkedin }}">
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
