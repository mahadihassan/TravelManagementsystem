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
              		<img src="{{ asset('images/TourImage') }}/{{ $packageBooking->image }}" alt="Image" class="img-fluid">
              		<h2 class="font-size-regular"><a href="#">{{ $packageBooking->title }}</a></h2>
              		<div class="meta mb-4">{{ $packageBooking->location }} <span class="mx-2">&bullet;</span>{{ $packageBooking->ex_date }}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              		<p><b>Per Person Price <strike><h6>{{ $packageBooking->pp_cost }}</h6></strike></b></p>
              		<p><b><em>Discount Price <h5> {{ $packageBooking->ppcost_discount }}</h5></em></b></p>
              		<p>{{ $packageBooking->description }}</p>
            	</div>
        	</div>
    	</div>
  	<form class="col-md-6 my-2" method="post" action="{{route('booking-store', $packageBooking->id)}}">
  		@csrf
  		@method('POST')
  		  <input type="hidden" value="{{Auth::user()->id}}"  name="user_id">
  		  <input type="hidden" value="{{$packageBooking->id}}" name="package_id">
  		  <input type="hidden" value="{{$packageBooking->pp_cost}}" name="cost">
  		  <div class="form-group">
  		    <label for="title">Member</label>
  		    	<select class="form-control" name="member">
  		      		<option id="member" value="" selected>Please Select Total Member</option>
  		        		<option value="1">1</option>
  		        		<option value="2">2</option>
  		        		<option value="3">3</option>
  		        		<option value="4">4</option>
  		        		<option value="5">5</option>
  		        		<option value="6">6</option>
  		        		<option value="7">7</option>
  		        		<option value="8">8</option>
  						    <option value="8">9</option>
  		        		<option value="8">10</option>
  		    	</select>
  		  	</div>
  		  	<button type="submit" class="btn btn-primary">Submit</button>
  		</form>
  </div>
</div>
@endsection