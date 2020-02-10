@extends('admin.master')
@section('content')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">User Type Update</h3>
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
                    <form role="form" method="POST" action="{{route('admin.user-store', $users->id)}}">
                       @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" name="name" value="{{$users->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">User Email</label>
                                <input type="email" class="form-control" name="email" value="{{$users->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">User Nid</label>
                                <input type="text" class="form-control" name="nid" value="{{$users->nid}}">
                            </div>
                            <div class="form-group">
                                <label for="">Number</label>
                                <input type="text" class="form-control" name="number" value="{{$users->number}}">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$users->address}}">
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
