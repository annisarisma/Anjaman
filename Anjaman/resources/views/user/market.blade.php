@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@section('title')
Anjaman | Market
@endsection

@section('content')
    @include('layouts.flash-message')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/Banner3.png" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Temukan Keranjangmu</h5>
                    <p>Find and buy what u looking for with Anjaman</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/Banner2.png" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tas Anyaman Terbaik</h5>
                    <p>Find and buy what u looking for with Anjaman</p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="/images/Banner1.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    <h1 class="h3 mb-0 text-black-600" style="font-weight: bold; margin-top: 30px; margin-left: 70px; font-size: 24px;">Market</h1>

    <div class="container-search-category">
        <!-- Category -->
        <div class="container-category">
            <ul class="tags">
                <li class="tag" style="--color: #efd81d;">
                    <a class="btn btn-outline-dark {{ ($showing == "all") ? 'active' : '' }}""" href="/user/market"
                    style="font-weight:bold">All</a>
                </li>
                <li class="tag" style="--color: #41b883;">
                    <a class="btn btn-outline-dark {{ ($showing == "tas") ? 'active' : '' }}""" href="/user/market/category=tas"
                    style="font-weight:bold">Tas</a>
                </li>
                <li class="tag" style="--color: #61dafb;">
                    <a class="btn btn-outline-dark {{ ($showing == "keranjang") ? 'active' : '' }}""" href="/user/market/category=keranjang"
                    style="font-weight:bold">Keranjang</a>
                </li>
                <li class="tag" style="--color: #ff3e00;">
                    <a class="btn btn-outline-dark {{ ($showing == "topi") ? 'active' : '' }}""" href="/user/market/category=topi"
                    style="font-weight:bold">Topi</a>
                </li>
                <li class="tag" style="--color: orange;">
                    <a class="btn btn-outline-dark {{ ($showing == "pot") ? 'active' : '' }}""" href="/user/market/category=pot"
                    style="font-weight:bold">Pot</a>
                </li>
            </ul>
        </div>

        <!-- Search -->
        <div class="container-serach">
            <form action="{{ route('web.find') }}" method="GET">
                <div class="search_wrap ">
                    <div class="search_box shadow p-3 mb-5 bg-white">
                        <div class="form-group">
                            <input type="text" name="query" class="input" placeholder="Search Product ...">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" type=submit>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Card -->
    <section class="row justify-content-left mt-4" style="margin: 0; padding: 0; margin-left: 70px;">
    @if (count($products) == 0)
        <div class="container-empty" style="width: 100%; display: flex; justify-content: center; margin-left: -70;">
            <div class="empty" style="width: 280px; text-align: center;">
                <img src="{{ asset('/images/5e5358e38e249322cc0675e2_peep-62.png') }}" alt="" style="width: 100%;">
                <h5 style="margin-top: -40px; font-weight: bold;">Sorry, no Product Found</h5>
            </div>
        </div>
    @endif
    @if(isset($products))
        @if(count(array($products)) > 0)
            @foreach ($products as $product)
            <div class="card mr-4 mb-4 shadow p-2 mb-5 bg-white" style="width: 16rem; border-radius: 12px;">
                <img style="width:100%" src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="">
                <div class="card-body">
                    <a href="/user/details/{{ $product->id }}" style="text-decoration: none; color: black;">
                        <h5 class="card-text text-center font-weight-bold" style="font-size: 16px; height: 40px;">{{ $product->name }}</h5>
                    </a>
                    <p class="text-center" style="font-size: 16px; margin-top: 4px;">Rp. {{ $product->price }}</p>
                    <div class="card-body row justify-content-center">
                        <a href="/cart/store/{{ $product->id }}" class="btn btn-dark col-md-8 text-light" style="border: none; font-size: 12px; font-weight: 600;">
                        Add To Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </section>
    @endif
@endsection