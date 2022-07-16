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
            @include('layouts.flash-message')
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 style="font-weight: bold;" class="h3 mb-0 text-gray-800 mt-4">Transaksi</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No. Invoice</th>
                                            <th>Customer</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td style="display: flex; gap: 8px;">
                                                <div class="detail">
                                                    <a href="/admin/detailtransaksi/{{ $item->id }}" class="btn btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="edit">
                                                    <a href="/admin/editstatus/{{ $item->id }}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="hapus">
                                                    <form action="/admin/deleteorder/{{$item->id}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" href="/admin/deleteorder/{{$item->id}} " class="btn btn-danger" onclick="return confirm('Are You Sure?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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