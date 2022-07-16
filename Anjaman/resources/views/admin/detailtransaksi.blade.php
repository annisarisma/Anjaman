@extends('layouts.admin')
<link rel="icon" href="{{ url('images/Anjaman_Logo.png') }}">
@section('title')
Anjaman | Transaksi
@endsection

    <!-- Page Wrapper -->
    <div id="wrapper">
    @section('content')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="flex-column" style="padding-left: 300px;">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Transaksi</h1>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Invoice ID</th>
                                    <td>{{$order->id}}</td>
                                </tr>  
                                <tr>
                                    <th>Customer</th>
                                    <td>{{$order->username}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Pengiriman</th>
                                    <td>@foreach ($detail as $order_detail) 
                                            @if ($order_detail->order_id == $order->id and $loop->first)
                                                {{ $order_detail->fullname }}<br>
                                                {{ $order_detail->address }}<br>
                                                {{ $order_detail->subdistrict . ', ' . $order_detail->city . ', ' . $order_detail->province }}<br>
                                                {{$order_detail->postal_code .' | T : ' .  $order_detail->phone_number}}
                                            @endif 
                                        @endforeach</td>
                                </tr>
                                <tr>
                                    <th>Product</th>
                                    <td>@foreach ($detail as $order_detail) 
                                            @if ($order_detail->order_id == $order->id)
                                                {{ $order_detail->name }} x {{ $order_detail->quantity }}<br> 
                                            @endif 
                                        @endforeach
                                    </td>
                                </tr>
                                @php
                                $subtotal = 0;
                                    foreach ($detail as $order_detail) {
                                        if ($order_detail->order_id == $order->id)
                                            $subtotal += $order_detail->quantity * $order_detail->price ;
                                    }
                                @endphp
                                <tr>
                                    <th>Subtotal Produk</th>
                                    <td>{{$subtotal}}</td>
                                </tr>
                                <tr>
                                    <th>Biaya Pengiriman</th>
                                    <td>{{$order->shipper}}</td>
                                </tr>   
                                <tr>
                                    <th>Total Harga</th>
                                    <td>{{$subtotal + $order->shipper}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{$order->status}}</td>
                                </tr>
                            </table>
                        </div>    
                    </div>    
                </div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2022 Copyright • All rights reserved • Made by Capstone Project Team A</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

</body>
@endsection