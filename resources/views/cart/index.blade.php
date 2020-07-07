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
  @if(session()->has('error_message'))
  <div class="alert alert-danger" style="width: 400px; margin-left: 80px">
      {{ session()->get('error_message') }}
  </div>
@endif
  
  
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
                        <div class="def-number-input number-input safari_only mb-0 w-100" style="text-align: center">
                          <h6 ><strong>Quantity :</strong></h6>
                          <input class="quantity" min="0" name="quantity" data-id="{{$product->rowId}}" value="{{$product->qty}}" type="number">
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center" style="padding-top:30px">
                      <div>
                        <form action="{{ route('cart.delete', $product->rowId) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          
                          <button type="submit" class="btn btn-primary btn-block waves-effect waves-light"><i
                            class="icon-trash mr-1"></i>Remove item</button>
                          </form>
                          
                          <a href="#!" type="button" class="card-link-secondary small text-uppercase"><i class="icon-heart" aria-hidden="true"></i> Move to wish list </a>
                        </div>
                      </div>
                      <div class="row" style="margin-left:150px;">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                @endforeach
                @if (Cart::content()->count() !=0)
                    
                
                <h5 style="color: grey;">Add supplements :</h5 >
                  <div class="col-lg-7 supp" style="margin-left: 220px">
                    <label class="card-link-secondary text-warning"><strong>Supplements</strong></label>
                    <!-- Multiselect dropdown -->
                    
                    <select multiple data-style="bg-white rounded-pill px-12 py-3 shadow-lg" class="selectpicker w-100 box-shadow-demo z-depth-2 suppclass" style="border:black 1px solid">
                      @foreach ($supps as $supplement)
                      <option class="prc" data-id="{{$supplement->id}}"value="{{$supplement->price}}">{{$supplement ->nomIngred}} {{$supplement ->price}}MAD</option> 
                      @endforeach
                    </select><!-- End -->
                    
                  </div>
                  @endif
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
                  
                  
                  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Subtotal of products
                      <span>{{Cart::subtotal()}}MAD</span>
                    </li>
                    
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total price of supplements</strong>
                        
                      </div>
                      <span id="supplement-price" name="supplement-price"><strong>MAD</strong></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Tax</strong>
                        
                      </div>
                      <span class="tax"><strong>{{Cart::tax()}}MAD</strong></span>
                  </li>
                  
                  </ul>
                  <div style="display: inline-flex;list-style-type:none ">
                    The total is :<li class="mb-3" id="totalprice" value="{{Cart::total()}}" name="totalprice"><strong>{{Cart::total()}} MAD</strong></li>
                  </div>
                  
                  <form action="{{route('checkout')}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Go to checkout</button>
                    </form>
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
  <script src="{{ asset('js/app.js') }}"></script>
  <script type="text/javascript">
    (function(){
      
      const className = document.querySelectorAll('.quantity');
      Array.from(className).forEach(function(element){
        element.addEventListener('change', function(){
          const id = element.getAttribute('data-id');
        axios.patch(`/cart/${id}`, {
          quantity: this.value
        })
        .then(function (response) {
          console.log(response);
          window.location.href = '{{route('shopping-cart')}}';
        })
        .catch(function (error) {
          alert('ERROR: ', error);
        });
      })
      })
    })();
  </script>
  <script>
    var totalSupp = 0;
    var total = $("#totalprice").val();
    $(document).ready(function(){
    $("select.suppclass").change(function(){
        var selectedSupp = $(this).children("option:selected").val();
        totalSupp = parseFloat(selectedSupp) + parseFloat(totalSupp);
        total = parseFloat(total) + parseFloat(totalSupp);
        //alert("Total is - " + totalSupp);
        document.getElementById('supplement-price').innerHTML = totalSupp + "MAD";
        document.getElementById('totalprice').innerHTML =total + " MAD";
    });
});
  </script>
  @endsection
  