@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman</h1>
            <a href="../listpinjam"><i class="fa fa-caret-left"></i> Kembali ke daftar peminjaman </a>
        </div>
        <button href="#" class="btn btn-danger btn-icon-split ml-1" disabled>
            <span class="text"> Status: Belum diterima</span>
        </button>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <style>
                            th{
                                width: 30%;
                            }
                        </style>
                        <tr>
                            <th>Nomor Pengajuan</th>
                            <td>11111</td>
                        </tr>
                        <tr>
                            <th>Nama Pengaju</th>
                            <td>Nama Pengaju 1</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>1 Juni 2019</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>Deskripsi</td>
                        </tr>
                        <tr>
                            <th>Jumlah Orang</th>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th>Tipe Penggunaan</th>
                            <td>Penggunaan</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai Pinjam</th>
                            <td>1 Juni 2019</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai Pinjam</th>
                            <td>10 Juni 2019</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
