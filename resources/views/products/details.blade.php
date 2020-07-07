@extends('layouts.front')

@section('content')


	
<section class="ftco-section ftco-services">
        <div class="overlay"></div>



        <!--Section: Block Content-->
<section>
<div class="container" style="margin-left: 180px;">
<!--Grid row-->
<div class="row">

  <!--Grid column-->
  <div class="col-lg-8">
      
    <!-- Card -->
    <div class="card wish-list mb-7">
      <div class="card-body">
      
        <div class="row mb-8">
          <div class="col-md-8 col-lg-4 col-xl-4">
              <a href="#!">
                <div class="mask waves-effect waves-light">
                  <img  width="250" height="250"
                    src="{{ asset($product->image) }}"style="border-radius: 50%;">
                  <div class="mask rgba-black-slight waves-effect waves-light"></div>
                </div>
              </a>
          </div>
          <div class="col-md-7 col-lg-4 col-xl-4" style="padding:40px 60px">
            <div>
              <div class="d-flex justify-content-between">
                <div>
                  <h6><strong>{{ $product->name }}</strong></h6>
                  <p class="mb-3 "> {{ $product->category->name }}</p>
                  <p class="mb-1"><span><strong>{{ $product->price }}MAD</strong></span></p>
                </div>
                <div>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center" style="padding-top:20px">
                <div>
                <form action="{{ route('cart.store') }}" method="POST">
										   @csrf
										   <input type="hidden" name="product_id" value="{{$product->id}}">
										   <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Order</button>
                                          </form>
                </div>
                
              </div>
              
            </div>
          </div>
          <div class="col-md-7 col-lg-4 col-xl-4">
              <div class="sidebar-box ftco-animate">
              <div class="categories" style="padding-top:40px">
              <h5><span class="badge badge-info" >{{$product->discount}} Discount</span></h5>
              <span><i class="icon-hourglass-half"></i> Until {{$product->end_date}}</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
    <!-- Card -->

  </div>
  <!--Grid column-->

  <!--Grid column-->
  
  <!--Grid column-->

</div>

<!--Grid row-->
</div>
<br>
<div class="container" style="margin-left: 180px;">
<div class="row">
    <div class="col-lg-8">
    <div class="card wish-list mb-3">
        <div class="card-body">
        <div class="comment-form-wrap pt-5">
                <h3 class="mb-3" style="color:black">Leave a comment</h3>
                <form action="{{ route('comment.store',['id'=>$product->id]) }}" method="Post">
                @csrf
                  <div class="form-group" style="color:black;">
                    <label for="message">Message</label><br>
                    <textarea name="message" id="message" cols="30" rows="2" class="form-comment"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="productCode" value="{{$product->id}}">
                    <button type="submit" class="btn py-3 px-4 btn-primary">Post Comment</button>
                  </div>

                </form>
              </div>
            <div class="pt-5 mt-5">
              <h3 class="mb-5" style="color:black;">{{$comments->count()}} Comments</h3>
              <ul class="comment-list">
              @foreach ($comments as $comment)
                <li class="comment">
                  <div class="vcard bio">
                    <img src="{{asset($comment->client->imagePath)}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3 style="color:black;">{{$comment->client->first_name}} {{$comment->client->last_name}}</h3>
                    <div class="meta">{{$comment->pub_date}}</div>
                    <p>{{$comment->message}}</p>
                    @if (auth()->id() == $comment->clientNum)
                    <a href="" onclick="$(this).next('div').slideToggle(1000); return false;" class="on-default edit-row"><i class="fa fa-pencil"></i> Edit</a>
                    <div style="display: none">
                    <form action="{{ route('comment.update',['id'=>$product->id]) }}" method="Post">
                @csrf
                  <div class="form-group">
                    <label for="editmessage">Message</label><br>
                    <textarea name="editmessage" id="editmessage" cols="30" rows="2" class="form-comment">{{$comment->message}}</textarea>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="productCode" value="{{$product->id}}">
                    <button type="submit" class="btn py-2 px-3 btn-primary">Edit</button>
                  </div>
                </form>
                    </div>
									<a href="{{route('comment.delete',['id'=>$comment->id])}}" class="on-default remove-row"><i class="fa fa-trash-o">Delete</i></a>
                  @endif  
                </div>
                  
                </li>
                @endforeach
              </ul>
              <!-- END comment-list -->
            </div>

        </div>
    </div>
    </div>
</div>
</div>
</section>
<!--Section: Block Content-->
        
    	
    	</div>
    </section>
	

	

    

    @endsection




