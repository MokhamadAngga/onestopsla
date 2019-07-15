@extends('layouts.admin_dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
        <a href="../admin_barang"><i class="fa fa-caret-left"></i> Kembali ke daftar barang </a>
    </div>
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
                        <th>Id Barang</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>Nama Barang 1</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Terpinjam</th>
                        <td>8</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>Deskripsi barang</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="admin_update_barang" class="btn btn-success btn-icon-split">
                    <span class="text"><i class="fas fa-recycle"></i> Update Barang?</span>
                </a>
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
