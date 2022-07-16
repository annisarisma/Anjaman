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
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Dashboard</h1>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pembelian Bulan Ini</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Stok Barang Per Kategori</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Dikemas
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Dikirim
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Selesai
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Item Per Kategori</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Best Seller -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Best Selling Products</h1>
                    </div>
                    <section class="row justify-content-center mt-4">
                    @foreach ($bestsellers->take(4) as $bestseller)
                        <div class="card mr-4 mb-4 shadow p-2 mb-5 bg-white" style="width: 16rem; border-radius: 12px;">
                            <img style="width:100%; object-fit: cover; height: 250px;" src="{{ asset('storage/images/' . $bestseller->image) }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="/user/details/{{ $bestseller->id }}" style="text-decoration: none; color: black;">
                                    <h5 class="card-text text-center font-weight-bold" style="font-size: 16px; height: 40px;">{{ $bestseller->name }}</h5>
                                </a>
                                <p class="text-center" style="font-size: 16px; margin-top: 4px;">Rp. {{ $bestseller->price }}</p>
                                <p class="text-center" style="font-size: 16px; margin-top: 4px; color:crimson">*Sold :  {{ $bestseller->qty }}</p>
                            </div>
                        </div>
                        @endforeach
                    </section>
                </div>
            
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
    <script src="{{url('assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script type="text/javascript">
      var yValues = <?php echo $items ?>;
    </script>
        <script type="text/javascript">
      var statusValues = <?php echo $status ?>;
    </script>
        </script>
    <script type="text/javascript">
      var stockValues = <?php echo $stock ?>;
    </script>
    <script type="text/javascript">
      var monthValues = <?php echo $purchased ?>;
    </script>
    <!-- Page level custom scripts -->
    <script src="{{url('assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{url('assets/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{url('assets/js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{url('assets/js/demo/chart-2-demo.js')}}"></script>


@endsection