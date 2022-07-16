{{-- harga total satuan produk --}}
@php
$totalPrice = 0;
if (count($products) != 0) {
    foreach ($products as $product) {
        $totalPrice += $product->price;
    }
}
@endphp

@extends('layouts.app')

@section('title')
Anjaman | Profile
@endsection

@section('content')
  <div class="main-keranjang">
    <form action="/user/checkout" method="post" class="cart-show" enctype="multipart/form-data">
      @csrf
      <div class="container">
        <h5>Shopping Cart</h5>
        <div class="row">
          <!-- Section Left -->
          <div class="col-md-8">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>

              {{-- intro --}}
              @if (count($products) == 0)
                <tbody>
                  <tr>
                    <th colspan="4">
                      <div class="container-empty" style="display: flex; justify-content: center;">
                          <div class="empty" style="width: 280px; text-align: center;">
                              <img src="{{ asset('/images/5e53539b550b7634d6f2aade_peep-25.png') }}" alt="" style="width: 100%;">
                              <h5 style="margin-top: -40px; font-weight: bold;">No product here, Lets add some product!</h5>
                          </div>
                      </div>
                    </th>
                  </tr>
                </tbody>
              @endif

              {{-- suppliers --}}
              @for ($i = 0; $i < 1; $i++)
                @php $supplier = $suppliers[$i]; @endphp
                
                {{-- products --}}
                @for ($j = 0; $j < count($products); $j++)
                  @php
                    $product = $products[$j];
                    $total = $product->price;
                  @endphp
                  <tbody>
                    <tr>
                      <th scope="row">
                        <div class="container-product">
                          <img src="{{ asset('storage/images/' . $product->image) }}" class="mg-fluid rounded" alt="{{ $product->image }}">
                          <div>
                            <h6>{{ $product->name }}</h6>
                            <p>Remaining: {{ $product->stock }}</p>
                          </div>
                        </div>
                      </th>
                      
                      <!-- Product Price -->
                      <td>
                        Rp. <span class='product-price'>{{ $product->price }}
                          <input type="hidden" class='product-price2' value='{{ $product->price }}'>
                      </span>
                      </td>
                      <!-- End of Product Price -->

                      <!-- Quantity -->
                      <td>
                        <div class="quantity-wrapper">
                          <label
                              for="quantity-{{ $j }}"></label>
                          <input type="number"
                              name="suppliers[{{ $i }}][products][{{ $j }}][quantity]"
                              id="quantity-{{ $j }}"
                              class="product-quantity" onchange="SubTotal()" value="1" min="1" max="{{ $product->stock }}">
                        </div>
                      </td>
                      <!-- End of Quantity -->
                      <td>
                        Rp. <span class="summary-total">{{$total}}</span>
                      </td>
                      <input type="hidden"
                        name="suppliers[{{ $i }}][products][{{ $j }}][image]"
                        value="{{ $product->image }}">
                      <input type="hidden"
                        name="suppliers[{{ $i }}][products][{{ $j }}][id]"
                        value="{{ $product->id }}">
                      <input type="hidden"
                        name="suppliers[{{ $i }}][products][{{ $j }}][name]"
                        value="{{ $product->name }}">
                      <input type="hidden"
                        name="suppliers[{{ $i }}][products][{{ $j }}][price]"
                        value="{{ $product->price }}">
                      <input type="hidden"
                        name="suppliers[{{ $i }}][products][{{ $j }}][stock]"
                        value="{{ $product->stock }}">

                      <td>
                        <div class="col-1">
                          <a href="/cart/destroy/{{ $product->cart_id }}" class="delete-cart-item__btn" onclick="return confirm('Are You Sure?')" style="color: black;">
                            <i class="fa fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                @endfor
              @endfor
            </table>
          </div>

          {{-- summary --}}
          @if (count($products) != 0)
            <div class="col-2 col-md-4">
              <div class="card">
                <h5 class="card-header" style="margin-top: 0;">Order Summary</h5>
                <div class="card-body">
                  <div class="card-sub row g-2">
                    <p class="card-text col-md-6 mb-3">Items</p>
                    <p class="card-text-sub col-md-6 mb-3 summary-item">{{ count($products) }}</p>
                    <p class="card-text col-md-6 mb-3">Total Price</p>
                    <p class="card-text-sub col-md-6 mb-3 summary-price">Rp. {{ $totalPrice }}</p>
                  </div>
                  <div class="card-footer bg-transparent border-black">
                    <button type="submit" class="btn btn-dark card-text col-md-12 mb-12" role="button">Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
        <a href="/user/market">Back to Market List</a>
      </div>
    </form>
  </div>
@endsection

<script>

  var productPrices=document.getElementsByClassName('product-price2');
  var productQuantities=document.getElementsByClassName('product-quantity');
  var summaryTotal=document.getElementsByClassName('summary-total');

  function SubTotal() {
    {
      for(i=0;i<productPrices.length;i++)
        {
          summaryTotal[i].innerText=(productPrices[i].value)*(productQuantities[i].value);
        }
    }
    SubTotal();
    };

</script>