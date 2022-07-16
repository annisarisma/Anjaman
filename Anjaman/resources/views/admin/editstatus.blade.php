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
                            <h1 class="h3 mb-0 text-gray-800 mt-4">Transaksi</h1>
                        </div>

                    <div class="card shadow">
                            <div class="card-body">
                                <form action="/admin/updatestatus/{{ $order->id }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="status" value="{{ old('status', $order->status) }}" class="form-control">
                                        <option value="Dikemas">Dikemas</option>
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                    
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Ubah
                                    </button>
                                </form>    
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