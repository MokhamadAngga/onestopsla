@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detail Complaint</h1> 
            <a href="{{route('admin.komplain')}}"><i class="fa fa-caret-left"></i> Kembali ke daftar complaint </a>
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
                                width: 20%;
                            }
                        </style> 
                        <tr>
                            <th>Nomor Complaint</th>
                            <td>{{$detail->id}}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>{{$detail->getUser->nip}}</td>
                        </tr>
                        <tr>
                            <th>Nama Pengaju</th>
                            <td>{{$detail->getUser->name}}</td>
                        </tr>
                        <tr>
                            <th>Barang</th>
                            <td>{{$detail->getBarang->nama}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td>{{$detail->tanggal_pinjam}}</td>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <td>{{$detail->keluhan}}</td>
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
