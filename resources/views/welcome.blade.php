@extends('layouts.frontend')
@section('content')

<!-- Slider Section -->
 <div class="slide-one-item home-slider owl-carousel">
  @foreach($slider as $sliders)
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('images/Slider') }}/{{ $sliders->image }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8" data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-white font-weight-light">{{ $sliders->title }}</h1>
                <p class="mb-5">{{ $sliders->sub_title }}</p>
                <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Book Now!</a></p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>


<!-- Site Section -->
    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-airplane"></span></div>
              <div>
                <h3>Air Ticketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ship"></span></div>
              <div>
                <h3>Cruises</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-route"></span></div>
              <div>
                <h3>Tour Packages</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


<!--Testimonials Section -->

<div class="site-section block-13 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7">
            <h2 class="font-weight-light text-black text-center">Testimonials</h2>
          </div>
        </div>

        <div class="nonloop-block-13 owl-carousel">

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{asset('frontend/images/img_1.jpg')}}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{asset('frontend/images/img_2.jpg')}}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>Clair Augustin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mb-5">
                  <img src="{{asset('frontend/images/img_4.jpg')}}" alt="Image" class="img-md-fluid">
                </div>
                <div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
                  <p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
                  <p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--Toure Package Section -->

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Tour Package</h2>
            <p class="color-black-opacity-5">Choose Your Next Destination</p>
          </div>
        </div>
        <div class="row">
        @foreach($TourPackage as $TourPackages)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="#" class="unit-1 text-center">
              <img src="{{ asset('images/TourImage') }}/{{ $TourPackages->image }}" alt="Image" class="img-fluid">
              <div class="unit-1-text">
                <strong class="text-primary mb-2 d-block">${{$TourPackages->pp_cost}}</strong>
                <h3 class="unit-1-heading">{{$TourPackages->title}}</h3>
              </div>
            </a>
          </div>
        @endforeach
        </div>
      </div>
    {{ $TourPackage->links() }}
</div>
@endsection
