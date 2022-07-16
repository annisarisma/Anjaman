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
                ` <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 mt-4">Feedbacks</h1>
                        </div>

                    <div class="card shadow">
                            <div class="row justify-content-left" style="margin:50px 50px 50px 50px">
                                @foreach ($feedbacks as $feedback)
                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                        <div class="card card-testimonial text-center">
                                        <div class="testimonial-content" style="margin:20px 20px 20px 20px">
                                            <img src="{{asset('storage/images/' . $feedback->profile_picture)}}" onerror="this.src='{{asset('/images/' . $feedback->profile_picture)}}'" class="mb-4 rounded-circle"
                                            style="width: 150px; height: 150px;" />
                                            <h3 class="mb-4">{{$feedback->fullname}}</h3>
                                            <p class="testimonials">
                                            {{'“ '.$feedback->feedback. ' “'}}
                                            </p>
                                        </div>
                                        <hr />
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
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