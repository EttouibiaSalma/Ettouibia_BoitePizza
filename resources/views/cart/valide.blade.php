@extends('layouts.front')

@section('content')

<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
  
  <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Our Shopping cart</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('Home') }}">Home</a></span> <span>Menu</span></p>
        </div>
        
        
        
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-services">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <h3 class="mb-4" style="color: black"><b>Thank you for choosing us </b><i class="icon-heart" aria-hidden="true" style="color: darkred"></i></h3>
        
      </div>
    </div>
        <div class="row">
      
      <div class="col-md-4 ftco-animate" style="margin-left: 370px">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-bicycle"></span>
          </div>
          <div class="media-body">
            <h5 class="heading" style="color: black">You order is on its way</h5>
          </div>
        </div>      
      </div>
      
    </div>
    </div>
</section>

  @endsection


  