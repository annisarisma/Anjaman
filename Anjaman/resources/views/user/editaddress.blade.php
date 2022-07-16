@extends('layouts.profile')

@section('title')
Anjaman | Edit Address
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
                        <h1 class="h3 mb-0 text-black-800" style="font-weight: bold; padding-top: 30px;">Edit Address</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Address</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="/user/updateaddress/{{ $address->id }}" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" class="form-control" value="{{ $address->fullname }}" name="fullname" id="fullname" aria-describedby="Name" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" value="{{ $address->phone_number }}"name="phone_number" id="phone_number" placeholder="Phone Number" aria-label="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" value="{{ $address->address }}"name="address" id="address" placeholder="Address" aria-label="Address">
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-6 mb-3">
                                                <label for="province">Province</label>
                                                <input type="text" class="form-control" value="{{ $address->province }}" id="province" name="province" placeholder="Province" aria-label="Province">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="city">Regency</label>
                                                <input type="text" class="form-control" value="{{ $address->city }}" id="city" name="city" placeholder="Regency" aria-label="City">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="subdistrict">District</label>
                                                <input type="text" class="form-control" value="{{ $address->subdistrict }}" id="subdistrict" name="subdistrict" placeholder="District" aria-label="Subistrict">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="postal_code">Zip Code</label>
                                                <input type="text" class="form-control" value="{{ $address->postal_code }}" id="postal_code" name="postal_code" placeholder="Zip Code" aria-label="ZipCode">
                                            </div>
                                </div>
                                        <button type="submit" class="btn btn-primary" style="margin-top:30px; float: right;">Save Address</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection