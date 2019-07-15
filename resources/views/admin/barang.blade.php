@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Manage Barang</h1>
        </div>
        <a href="{{route('tambarang')}}" class="btn btn-primary btn-icon-split">
            <span class="text"><i class="fas fa-plus"></i> Tambah Barang</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Pilihan</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Pilihan</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($barang as $subbarang)
                    <tr>
                        <td>{{$subbarang->kode}}</td>
                        <td>{{$subbarang->nama}}</td>
                        <td>{{$subbarang->kategori}}</td>
                        <td class="text-center">
                            <a href="{{route('barangU',[$subbarang->id])}}" class="btn btn-success btn-icon-split">
                                <span class="text"><i class="fas fa-book"></i> Edit</span>
                            </a>
                            <a href="{{route('delbarang',[$subbarang->id])}}" class="btn btn-danger btn-icon-split">
                                <span class="text"><i class="fas fa-times"></i> Hapus</span>
                            </a>
                        </td>
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
