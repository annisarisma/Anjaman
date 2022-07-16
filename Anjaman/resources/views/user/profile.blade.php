@extends('layouts.profile')

@section('title')
Anjaman | Profile
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="container-fluid" id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-black-800" style="font-weight: bold; padding-top: 30px;">My Account</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#8E654E">Contact Information</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <center><img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}" onerror="this.src='{{asset('/images/' . Auth::user()->profile_picture)}}'" width="100" height="100" class="rounded-circle me-2" style="object-fit: cover;"></center>
                                    <center style="margin-bottom: 20px; margin-top: 20px;"><a style="color:#8E654E" href="#UploadImage" data-toggle="modal">Edit Profile Picture</a></center>
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $user->fullname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ $user->username }}</td>
                                        </tr>    
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr> 
                                        <tr>
                                            <th>Phone </th>
                                            <td>{{ $user->phone_number }}</td>
                                        </tr> 
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modal HTML -->
                        <form action="/user/upload_image/{{$user->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="UploadImage" class="modal fade">
                                <div class="modal-dialog modal-confirm modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <div class="modal-body text-center">
                                                @csrf
                                                <div class="form-group-cover">
                                                    <label for="image">Upload Your Picture</label>
                                                    <div class="container-images-cover">
                                                        <div id="second-input-thumbnail" onclick="mainInputActiveThumbnail()" class="form-group-images-gallery">
                                                            <div class="image-placeholder">
                                                                <img id="image-thumbnail" alt="">
                                                            </div>
                                                            <div class="file-placeholder">
                                                                <div class="content-image-upload">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                    <p>Click to upload image!</p>
                                                                </div>
                                                                <div class="close-btn">
                                                                    <i class="fas fa-times"></i>
                                                                </div>
                                                            </div>
                                                            <div class="image-choose-btn">
                                                                <input id="main-input-thumbnail" type="file" name="profile_picture" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success" style="margin-top: -40px;" type="submit">Submit!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>     
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#8E654E">Address</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <address>
                                    <p class="fw-bold">{{ $addresses->fullname }}</p>
                                    <p>T: {{ $addresses->phone_number }}</p>
                                    <p>{{ $addresses->address}}</p>
                                    <p>{{ $addresses->subdistrict . ', ' . $addresses->city . ', ' . $addresses->province }}
                                    <p>Zip Code : {{ $addresses->postal_code }}</p>
                                    </address>
                                    <a style="color:#8E654E" href="/user/editaddress/{{ $addresses->id }}">Edit Address</a>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#8E654E">My Orders</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Ship To</th>
                                                <th>Date/Time</th>
                                                <th>Status</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Review</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="table-active">
                                                <td colspan="9" style="font-weight: 600;">Invoice No. {{$order->id}}</td>
                                            </tr>
                                            @foreach ($order_details as $order_detail)
                                                @if ($order_detail->order_id == $order->id)
                                                    <tr>
                                                        <td>{{$addresses->fullname}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>{{$order->status}}</td>
                                                        <td>{{$order_detail->name}}</td>
                                                        <td>{{$order_detail->price}}</td>
                                                        <td> x {{$order_detail->quantity}}<br> </td>
                                                        <td>{{($order_detail->price * $order_detail->quantity)}}</td>
                                                        <td>
                                                            @if ($order->status == "Selesai" && $order_detail->status_review == true)
                                                                <button href="#exampleModal" class="btn btn-sm btn-success shadow-sm" data-toggle="modal" disabled>
                                                                    <i class="fas fa-pencil fa-sm text-white-50"></i> Review
                                                                </button>
                                                            @endif

                                                            @if ($order->status != "Selesai")
                                                                <button href="#exampleModal" class="btn btn-sm btn-dark shadow-sm" data-toggle="modal" disabled>
                                                                    <i class="fas fa-pencil fa-sm text-white-50"></i> Review
                                                                </button>
                                                            @endif

                                                            @if ($order->status == "Selesai" && $order_detail->status_review == false)
                                                                <a href="#exampleModal" class="btn btn-sm btn-success shadow-sm" data-toggle="modal">
                                                                    <i class="fas fa-pencil fa-sm text-white-50"></i> Review
                                                                </a>
                                                                <form action="/user/addreviews/{{ $order_detail->id }}" method="post">
                                                                @csrf
                                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Review Product</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-container">
                                                                                    <div class="img-product">
                                                                                        <img src="{{asset('storage/images/' . $order_detail->image)}}" alt="">
                                                                                    </div>
                                                                                    <div class="container-kanan">
                                                                                        <div class="name-star">
                                                                                            <h1>{{$order_detail->name}}</h1>
                                                                                            <div class="rating-css">
                                                                                                <div class="star-icon">
                                                                                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                                                                    <label for="rating1" class="fa fa-star"></label>
                                                                                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                                                                                    <label for="rating2" class="fa fa-star"></label>
                                                                                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                                                                                    <label for="rating3" class="fa fa-star"></label>
                                                                                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                                                                                    <label for="rating4" class="fa fa-star"></label>
                                                                                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                                                                                    <label for="rating5" class="fa fa-star"></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="textarea">
                                                                                            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                            
                                                @endif
                                            @endforeach
                                            @php
                                            $subtotal = 0;
                                                foreach ($order_details as $order_detail) {
                                                    if ($order_detail->order_id == $order->id)
                                                        $subtotal += $order_detail->quantity * $order_detail->price;
                                                }
                                            @endphp
                                            <tr class="table">
                                                <td style="font-size:large; font-weight:bold" colspan="9" style="font-weight: 600;">
                                                Subtotal &#x3164 &#x3164 &#x2009 :&#10240 {{$subtotal}} <br>
                                                Shipping Fee &#10240:&#10240 {{$order->shipper}} <br>
                                                Total Order &#10240 &#10240:&#10240 {{($subtotal + $order->shipper)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- End of Main Content -->

    </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script>
        const mainInputThumbnail = document.querySelector("#main-input-thumbnail");
        const secondInputThumbnail = document.querySelector("#second-input-thumbnail");
        const imgthumbnail = document.querySelector("#image-thumbnail");

        function mainInputActiveThumbnail() {
            mainInputThumbnail.click();
        }
        mainInputThumbnail.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    imgthumbnail.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection