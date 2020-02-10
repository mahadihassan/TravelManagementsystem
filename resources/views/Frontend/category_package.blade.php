@extends('layouts.frontend')
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Tour Package</h2>
            <p class="color-black-opacity-5">Choose Your Next Destination</p>
          </div>
        </div>
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
      
        <div class="row">
        @foreach($tour_category as $tour_categorys)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="{{ route('package-details', $tour_categorys->id) }}" class="unit-1 text-center">
              <img src="{{ asset('images/TourImage') }}/{{ $tour_categorys->image }}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <strong class="text-primary mb-2 d-block">${{$tour_categorys->pp_cost}}</strong>
                <h3 class="unit-1-heading">{{$tour_categorys->title}}</h3>
              </div>
            </a>
          </div>
        @endforeach
        </div>
      </div>
</div>
@endsection