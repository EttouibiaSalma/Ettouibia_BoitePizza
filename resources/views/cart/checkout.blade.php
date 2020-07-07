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
  @if(count($errors) > 0)
  <div class="spacer"></div>
  <div class="alert alert-danger" style="width: 600px; margin-left: 80px;list-style-type:none">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{!! $error !!}</li>
          @endforeach
      </ul>
  </div>
@endif
  <!--Section: Block Content-->
  <section>
    <div class="container">
      <!--Grid row-->
      <div class="row">
        
        <!--Grid column-->
        <div class="col-lg-7">
          
          <!-- Card -->
          <div class="card wish-list mb-3">
            <div class="card-body">
                <h5 style="color: grey;">Your Order :</h5 >
              @foreach(Cart::content() as $product)
              <div class="row mb-4">
                <div class="col-md-5 col-lg-3 col-xl-3">
                  
                  
                  <a href="#!">
                    <div class="mask waves-effect waves-light">
                      <img class="img-fluid w-50"
                      src="{{ $product->model->image }}" style="border-radius: 20%;">
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
                        <div class="def-number-input number-input safari_only mb-0 w-50" width="50" style="text-align: center">
                          
                          <input disabled class="quantity" min="0" name="quantity" data-id="{{$product->rowId}}" value="{{$product->qty}}" type="number">
                        </div>
                      </div>
                    </div>
                    
                      <div class="row" style="margin-left:150px;"></div>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                @endforeach
                <h5 style="color: grey;">Supplements :</h5 >
                  <div class="col-lg-7 supp" style="margin-left: 220px">
                    <!-- List -->
                    <ul style="list-style-type:none">
                        @foreach ($supps as $item)
                        <li>- {{$item->nomIngred}} {{$item ->price}}MAD</li>
                        @endforeach
                    </ul>
                  </div>
                  
                </div>
              </div>
              <!-- Card -->
              
            </div>
            <!--Grid column-->
            
            <!--Grid column-->
            <div class="col-lg-5">
              
              <!-- Card -->
              <div class="card mb-3">
                <div class="card-body">
                    <h5 style="color: grey;">Payment details :</h5 >
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        <strong>Subtotal of products</strong>
                      <span>{{Cart::subtotal()}}MAD</span>
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Subtotal of supplements</strong>
                        
                      </div>
                      <span class="supplement-price"><strong> {{$totalsupp}} MAD</strong></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                          <strong>Tax</strong>
                          
                        </div>
                        <span class="supplement-price"><strong>{{Cart::tax()}}MAD</strong></span>
                    </li>
                  </ul>
                  
                    <div class="content">
                        <form method="post" id="payment-form" action=" {{route('checkout.validate')}} ">
                            @csrf
                            <section>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        
                                    <label for="amount" style="display:inline-flex; text-align:right">
                                        <div><strong>Total :</strong></div>
                                        <div class="input-wrapper amount-wrapper">
                                            <input id="amount" name="amount" type="tel" style="border:transparent;margin-left:50px; text-align:center" value="{{$newtotal}}">MAD
                                        </div>
                                    </label>  
                                </li>
                                <hr class="mb-4">
                                  <h5 style="color: grey;">Shipping details :</h5 >
                                
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <label for="addrLiv"> Shipping Address</label>
                                          <input type="text" style="border: solid 1px rgb(204, 200, 200)" class="form-control-plaintext" id="addrLiv" name="addrLiv">
                                      </div>
                                  </div>
          
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <label for="secteur">Sector</label>
                                          <input style="border: solid 1px rgb(204, 200, 200)" type="text" class="form-control-plaintext" id="secteur" name="secteur">
                                      </div>
                                  </div>
          
                              
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                            </section>
                            
        
                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Submit Payment</button>
                        </form>
                    </div>
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
  @section('js-content')
  <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
  @endsection

  