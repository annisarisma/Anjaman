{{-- harga total dan berat total seluruh produk --}}
@php
$totalItem = 0;
$totalWeight = 0;
$totalPrice = 0;
$ShipCost = 0;
if (count($suppliers) != 0) {
    foreach ($suppliers as $supplier) {
        foreach ($supplier['products'] as $product) {
            $totalItem += $product['quantity'];
            $totalPrice += $product['quantity'] * $product['price'];
        }
    }
}
$ShipCost = $ShipCost;
if ( $ShipCost == '20000' ){
    $totalPrice += 20000;
} elseif ( $ShipCost == '12000' ){
    $totalPrice += 12000;
} elseif ( $ShipCost == '12000' ){
    $totalPrice += 8000;
}
@endphp

@extends('layouts.app')

@section('title')
Anjaman | Details
@endsection

@section('content')
<form action="/order/store" method="post">
    <div class="main-checkouts">
        <div class="container">
            <h5 style="margin-top: 20px;">Checkout</h5>
            <div class="row" style="margin-top: 40px;">
                <!-- Section Left -->
                @php $i = 0; @endphp
                <div class="col-md-8">
                    <div class="shipment-method">
                        <h6>1. Choose Your Shipping Method</h6>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Instant</div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" onclick="selectShipper('Instant')" type="radio" name="orders[{{ $i }}][shipper]" value="20000" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rp. 20000
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Same Day</div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" onclick="selectShipper('Same Day')" type="radio" name="orders[{{ $i }}][shipper]" value="12000" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rp. 12000
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">Reguler</div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" checked="checked" onclick="selectShipper('Reguler')" type="radio" name="orders[{{ $i }}][shipper]" value="8000" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rp. 8000
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shipment-address">
                        <h6>2. Address Information</h6>
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $addresses->fullname }}</h6>
                                <p class="card-text">{{ $addresses->address . ', '
                                    . $addresses->subdistrict . ', '
                                    . $addresses->city . ', '
                                    . $addresses->province}}
                                <br>
                                {{ $addresses->postal_code }}
                                <br>
                                {{ $addresses->phone_number }}
                                </p>
                            <a href="/user/editaddress/{{ $addresses->id }}" class="card-link">Edit Address</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cart --}}
                <div class="col-2 col-md-4">
                    @csrf
                    @php
                        $j = 0;
                        $subtotalPrice = 0;
                        $subtotalQuantity = 0;
                    @endphp
                    <div class="card">
                        <h5 class="card-header">Order Summary</h5>
                        <div class="card-body">
                            <div class="card-sub row g-2" style="width: 100%;">
                                <p class="card-text col-md-6 mb-3">Items</p>
                                <p class="card-text-sub col-md-6 mb-3" style="text-align: right;">{{ $totalItem }}</p>

                                <p class="card-text col-md-6 mb-3">Subtotal</p>
                                <p class="card-text-sub col-md-6 mb-3" style="text-align: right;">Rp. {{$totalPrice}} </p>

                                <p class="card-text col-md-6 mb-3">Shipping Fee</p>
                                <p class="card-text-sub col-md-6 mb-3" id="shipping" style="text-align: right;">Rp. 8000 </p>

                                <p class="card-text col-md-6 mb-3">Total Price</p>
                                <p class="card-text-sub col-md-6 mb-3" id="total" style="text-align: right;">Rp. {{$totalPrice}} </p>
                            </div>
                            <div class="card-footer bg-transparent border-black">
                            @foreach ($supplier['products'] as $product)
                                <div class="card-product">
                                    <div class="kiri">
                                        <img src="{{ asset('storage/images/' . $product['image']) }}" alt="">
                                    </div>
                                    <div class="kanan" style="width: 90%;">
                                        <h6 class="title-product">
                                            {{ $product['name'] }}
                                        </h6>

                                        <div class="qty-price">
                                            <h6>x{{ $product['quantity'] }}</h6>
                                            <h6>Rp. {{ $product['price'] * (int) $product['quantity'] }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden"
                                    name="orders[{{ $i }}][address_id]"
                                    value="{{ $addresses->id }}">
                                <input type="hidden"
                                    name="orders[{{ $i }}][username]"
                                    value="{{ auth()->user()->username }}">
                                <input type="hidden"
                                    name="orders[{{ $i }}][order_details][{{ $j }}][product_id]"
                                    value="{{ $product['id'] }}">
                                <input type="hidden"
                                    name="orders[{{ $i }}][order_details][{{ $j }}][quantity]"
                                    value="{{ $product['quantity'] }}">
                                @php
                                    $j = $j + 1;
                                    $subtotalPrice += (int) $product['price'] * (int) $product['quantity'];
                                    $subtotalQuantity += (int) $product['quantity'];
                                @endphp
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-purchase">
                <button type="submit" class="btn btn-dark card-text col-md-2 mb-12" role="button">Confirm Purchase</button>
                <a href="#" class="btn btn-light card-text col-md-2 mb-12" style="border-style: solid; border-width: 2px; border-color: black;">Back to Cart</a>
            </div>
        </div>
    </div>
</form>
@endsection
<script>

    function selectShipper(type) {
    var total = <?php echo $totalPrice; ?>;
    let fee;
    if(type === 'Instant') {
      fee = 20000;
    }
    if(type === 'Same Day') {
      fee = 12000;
    }
    if(type === 'Reguler') {
      fee = 8000;
    }
    document.getElementById('shipping').innerHTML = 'Rp. ' + (fee);
    document.getElementById('total').innerHTML = 'Rp. ' + (fee+total);
  }
</script>

