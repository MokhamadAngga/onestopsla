@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">List Peminjaman Ruang</h1>
            <a href="{{route('ruang')}}"><i class="fa fa-caret-left"></i> Kembali ke Ajukan Peminjaman Ruang </a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengaju</th>
                        <th>Ruang</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengaju</th>
                        <th>Ruang</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($peminjaman_ruang as $ruang)
                    <tr>
                        <td>{{$ruang->id}}</td>
                        <td>{{$ruang->getUser->name}}</td>
                        <td>{{$ruang->getBarang->nama}}</td>
                        <td>{{$ruang->tanggal_pinjam}}</td>
                        <td>{{$ruang->tanggal_kembali}}</td>
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
