@extends('layouts.front')

@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('Home') }}">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
	</section>
	
	<section class="ftco-menu">
    	<div class="container-fluid">
    		<div class="row d-md-flex">
	    		
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					  <a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">All products</a>
					  @foreach($categories as $category)
					  <a class="nav-link " id="v-pills-{{($category['id'])}}-tab" data-toggle="pill" href="#v-pills-{{$category['id']}}" role="tab" aria-controls="v-pills-{{$category['id']}}" 
						  aria-selected="true">{{$category['name']}}</a>
						@endforeach
		              
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

					<div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">
		              	<div class="row">
							  @foreach($products as $product)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url({{$product->image}});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.details',['id'=>$product->id]) }}">{{$product->name}}</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>{{$product->price}}MAD</span></p>
										  
										  <form action="{{ route('cart.store') }}" method="POST">
										   @csrf
										   <input type="hidden" name="product_id" value="{{$product->id}}">
										   <button type="submit" class="btn btn-white btn-outline-white">Add to cart</button>
                                          </form>
		              				</div>
		              			</div>
		              		</div>
		              		@endforeach
		              	</div>
					  </div>
					  
					  
		              <div class="tab-pane fade show " name="v-pills-1" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
						  @foreach($products as $product)
						  @if ($product->category_id == 1)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" id="pro_image" style="background-image: url({{$product->image}});"></a>
		              				<div class="text">
		              					<h3><a href="{{ route('product.details',['id'=>$product->id]) }}" id="pro_name">{{$product->name}}</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price" id="pro_price"><span>{{$product->price}}MAD</span></p>
										  
										  <form action="{{ route('cart.store') }}" method="POST">
										   @csrf
										   <input type="hidden" name="product_id" value="{{$product->id}}">
										   <button type="submit" class="btn btn-white btn-outline-white">Add to cart</button>
                                          </form>
		              				</div>
		              			</div>
							  </div>
							  @endif
		              		@endforeach
		              	</div>
					  </div>
					  <div class="tab-pane fade show " name="v-pills-2" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
						<div class="row">
						@foreach($products as $product)
						@if ($product->category_id == 2)
							<div class="col-md-4 text-center">
								<div class="menu-wrap">
									<a href="#" class="menu-img img mb-4" id="pro_image" style="background-image: url({{$product->image}});"></a>
									<div class="text">
										<h3><a href="{{ route('product.details',['id'=>$product->id]) }}" id="pro_name">{{$product->name}}</a></h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
										<p class="price" id="pro_price"><span>{{$product->price}}MAD</span></p>
										
										<form action="{{ route('cart.store') }}" method="POST">
										 @csrf
										 <input type="hidden" name="product_id" value="{{$product->id}}">
										 <button type="submit" class="btn btn-white btn-outline-white">Add to cart</button>
										</form>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade show " name="v-pills-3" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
						<div class="row">
						@foreach($products as $product)
						@if ($product->category_id == 3)
							<div class="col-md-4 text-center">
								<div class="menu-wrap">
									<a href="#" class="menu-img img mb-4" id="pro_image" style="background-image: url({{$product->image}});"></a>
									<div class="text">
										<h3><a href="{{ route('product.details',['id'=>$product->id]) }}" id="pro_name">{{$product->name}}</a></h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
										<p class="price" id="pro_price"><span>{{$product->price}}MAD</span></p>
										
										<form action="{{ route('cart.store') }}" method="POST">
										 @csrf
										 <input type="hidden" name="product_id" value="{{$product->id}}">
										 <button type="submit" class="btn btn-white btn-outline-white">Add to cart</button>
										</form>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade show " name="v-pills-4" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
						<div class="row">
						@foreach($products as $product)
						@if ($product->category_id == 4)
							<div class="col-md-4 text-center">
								<div class="menu-wrap">
									<a href="#" class="menu-img img mb-4" id="pro_image" style="background-image: url({{$product->image}});"></a>
									<div class="text">
										<h3><a href="{{ route('product.details',['id'=>$product->id]) }}" id="pro_name">{{$product->name}}</a></h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
										<p class="price" id="pro_price"><span>{{$product->price}}MAD</span></p>
										
										<form action="{{ route('cart.store') }}" method="POST">
										 @csrf
										 <input type="hidden" name="product_id" value="{{$product->id}}">
										 <button type="submit" class="btn btn-white btn-outline-white">Add to cart</button>
										</form>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
					  
		              

		              

		              
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
    
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Italian Pizza</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
        			</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-2.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Hawaiian Pizza</span></h3>
	        				<span class="price">$29.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-3.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Greek Pizza</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-4.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Bacon Crispy Thins</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        	</div>

        	<div class="col-md-6">
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-5.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Hawaiian Special</span></h3>
	        				<span class="price">$49.91</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-6.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Ultimate Overload</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-7.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Bacon Pizza</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pizza-8.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Ham &amp; Pineapple</span></h3>
	        				<span class="price">$20.00</span>
	        			</div>
	        			<div class="d-block">
	        				<p>A small river named Duden flows by their place and supplies</p>
	        			</div>
	        		</div>
        		</div>
        	</div>
        </div>
    	</div>
	</section>
	

	

    

	@endsection