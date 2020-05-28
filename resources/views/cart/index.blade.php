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



        <!--Section: Block Content-->
<section>
<div class="container">
<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-lg-8">
      
    <!-- Card -->
    <div class="card wish-list mb-3">
      <div class="card-body">
      @foreach(Cart::content() as $product)
        <div class="row mb-4">
          <div class="col-md-5 col-lg-3 col-xl-3">
            
              
              <a href="#!">
                <div class="mask waves-effect waves-light">
                  <img class="img-fluid w-100"
                    src="{{ $product->model->image }}">
                  <div class="mask rgba-black-slight waves-effect waves-light"></div>
                </div>
              </a>
          </div>
          <div class="col-md-7 col-lg-9 col-xl-9">
            <div>
              <div class="d-flex justify-content-between">
                <div>
                  <h6><strong>{{ $product->model->name }}</strong></h6>
                  <p class="mb-3 "></p>
                  <p class="mb-0"><span><strong>{{ $product->model->price }}MAD</strong></span></p>
                </div>
                <div>
                  <div class="def-number-input number-input safari_only mb-0 w-100">
                    <button onclick=""
                      class="icon-minus"></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick=""
                      class="icon-plus"></button>
                  </div>
                  
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                <form action="{{ route('cart.delete', $product->rowId) }}" method="POST">
										   @csrf
										   @method('DELETE')
										   <button type="submit" class="card-link-secondary small text-uppercase"><i
                      class="icon-trash mr-1"></i> Remove item </button>
                                          </form>
                  
                  <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="icon-heart" aria-hidden="true"></i> Move to wish list </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <hr class="mb-4">
        @endforeach

      </div>
    </div>
    <!-- Card -->

  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-lg-4">

    <!-- Card -->
    <div class="card mb-3">
      <div class="card-body">

        <p class="mb-3"><strong>The total amount of</strong></p>

        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Temporary amount
            <span>$25.98</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Shipping
            <span>Gratis</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>The total amount of</strong>
              <strong>
                <p class="mb-0">(including VAT)</p>
              </strong>
            </div>
            <span><strong>$53.98</strong></span>
          </li>
        </ul>

        <button type="button" class="btn btn-primary btn-block waves-effect waves-light">go to checkout</button>

      </div>
    </div>
    <!-- Card -->

    

  </div>
  <!--Grid column-->

</div>
<!--Grid row-->
</div>
</section>
<!--Section: Block Content-->
        
    	
    	</div>
    </section>
	

	

    

    @endsection
