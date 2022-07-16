@extends('layouts.app')

@section('title')
Anjaman | Details
@endsection

@section('content')
    <section class="section-details">
        <div class="container">
            <div class="row g-2">
                <div class="col-7">
              
                    <div class="main-img">
                        <img src="{{ asset('storage/images/' . $product->image) }}" class="img-fluid w-100 pb-1" id="MainImg" alt="">
                    </div>

                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="{{ asset('storage/images/' . $product->image) }}" width="100%" class="small-img" alt="">
                        </div>
                        @foreach ($galleries as $gallery) 
                            @if ($gallery->product_id == $product->id)
                                <div class="small-img-col">
                                    <img src="{{ asset('storage/images/' . $gallery->images) }}" width="100%" class="small-img" alt="">
                                </div>
                            @endif 
                        @endforeach
                    </div>
                </div>
                <div class="col-5">
                    <div class="card-details">
                        <div class="title">
                            <h2>{{ $product->name }}</h2>
                            <div class="icon">
                                <a href="" style="color: black;">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                                <a href="" style="color: black;">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </a>
                            </div>
                        </div>
                        <div class="star-remaining">
                            <div class="icon-star">
                            @if($review)
                                @for ($i =1; $i<= $review->avgrate; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                            @else
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            @endif
                            </div>
                            <div class="remaining">
                                <p>Remaining: {{ $product->stock }}</p>
                            </div>
                        </div>
                        <p>{{ $product->description }}</p>
        
                        <div class="category">
                            <h5>Category</h5>
                            <a href="#" class="btn btn-info btn-md disabled" tabindex="-1" role="button" aria-disabled="true">{{ $product->category }}</a>
                        </div>
        
                        <h6 class="price">Rp. {{ $product->price }}</h6>
                        <a href="/cart/store/{{ $product->id }}" class="btn btn-dark card-text col-md-12 mb-12">Add to Cart</a>
        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-best-seller">
      <h1>Checkout Our Best Selling Products!</h1>
      <div class="container-bestseller">
        @foreach ($bestsellers->take(4) as $bestseller)
        <div class="card">
          <div class="container-image">
            <img src="{{ asset('storage/images/' . $bestseller->image) }}" alt="">
          </div>

          <div class="container-content">
            <div class="star-remaining">
                <div class="icon-star">
                @if($review_all)
                    @for ($i =1; $i<= $review_all->avgrate; $i++)
                        <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                        <label for="rating{{$i}}" class="fa fa-star"></label>
                    @endfor
                @else
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                @endif
                </div>
            </div>
            <a href="/user/details/{{ $bestseller->id }}" style="text-decoration: none; color: black;">
                <h4 class="title-product">{{ $bestseller->name }}</h4>
            </a>
            <h4>Sold:  {{ $bestseller->qty }}</h4>
            <h4>Rp. {{ $bestseller->price }}</h4>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <section class="section-reviews">
      <h1>Rate and Reviews</h1>
        @if (count($reviews) == 0)
            <div class="container-empty" style="width: 100%; display: flex; justify-content: center; margin-left: -70;">
                <div class="empty" style="width: 280px; text-align: center;">
                    <img src="{{ asset('/images/peep-90.png') }}" alt="" style="width: 100%;">
                    <h5 style="margin-top: -40px; font-weight: bold;">Order and be the first to review this product!</h5>
                </div>
            </div>
        @endif
        @foreach ($reviews->take(8) as $r)
            <div class="container-review" style="margin-bottom: 40px;">
                <div class="container-image-content">
                <div class="image">
                    <img src="{{ asset('storage/images/' . $r->profile_picture) }}" alt="">
                </div>
                <div class="username-rate">
                    <h4>{{ $r->username }}</h4>
                    <div class="star-remaining">
                        <div class="icon-star">
                            @if($review)
                                @for ($i =1; $i<= $r->rating; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                            @else
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            @endif
                        </div>
                    </div>
                </div>
                </div>

                <div class="container-comment-tanggal">
                <div class="comment">
                    <p>{{ $r->comment }}</p>
                </div>
                <div class="tanggal">
                    <p>{{ $r->created_at }}</p>
                </div>
                </div>
            </div>
        @endforeach
    </section>

    <script>
        var MainImg = document.getElementById('MainImg');
        var smallImg = document.getElementsByClassName('small-img');
        
        smallImg[0].onclick = function(){
        MainImg.src = smallImg[0].src;
        }

        smallImg[1].onclick = function(){
        MainImg.src = smallImg[1].src;
        }

        smallImg[2].onclick = function(){
        MainImg.src = smallImg[2].src;
        }

        smallImg[3].onclick = function(){
        MainImg.src = smallImg[3].src;
        }
    </script>
@endsection

