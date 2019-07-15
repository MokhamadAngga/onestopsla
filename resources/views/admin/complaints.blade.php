@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Complaints</h1>        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Complaints</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <style>
                    td{
                        text-align: center;
                    }
                </style>
                <thead>
                    <tr>
                        <th style="width: 15%">No. Complaint</th>
                        <th>Nama Pengaju</th>
                        <th>Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th style="width: 15%">Pilihan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.Complaint</th>
                        <th>Nama Pengaju</th>
                        <th>Barang</th>
                        <th>Tanggal Pinjam</th>
                        <th>Pilihan</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($complaints as $keluhan)
                    <tr>
                        <td>{{$keluhan->id}}</td>
                        <td>{{$keluhan->getUser->name}}</td>
                        <td>{{$keluhan->getBarang->nama}}</td>
                        <td>{{$keluhan->tanggal_pinjam}}</td>
                        <td class="text-center">
                            <a href="{{route('admin.komplain.detail',['id' => $keluhan->id])}}" class="btn btn-primary btn-sm">
                                <span class="text"><i class="fas fa-search"></i>&ensp;DETAIL</span>
                            </a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
