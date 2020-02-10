@extends('layouts.frontend')
@section('content');
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

<div class="site-section">
    <div class="container">
        <div class="row mb-3 align-items-stretch">
          	<div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            	<div class="h-entry">
              		<img src="{{ asset('images/TourImage') }}/{{ $details->image }}" alt="Image" class="img-fluid">
              		<h2 class="font-size-regular"><a href="#">{{ $details->title }}</a></h2>
              		<div class="meta mb-4">{{ $details->location }} <span class="mx-2">&bullet;</span>{{ $details->ex_date }}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              		<p><b>Per Person Price <strike><h6>{{ $details->pp_cost }}</h6></strike></b></p>
              		<p><b><em>Discount Price <h5> {{ $details->ppcost_discount }}</h5></em></b></p>
              		<p>{{ $details->description }}</p>
                  <a href="{{ route('package-booking', $details->id)}}"><button class="btn btn-primary">Booking</button></a>
            	</div>
        	</div>
    	</div>
  </div>
</div>
@endsection