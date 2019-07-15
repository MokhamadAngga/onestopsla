@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman Rumah</h1>
            <a href="{{route('admin.rumah')}}"><i class="fa fa-caret-left"></i> Kembali ke daftar peminjaman </a>
        </div>
        @php
            if($detail->status == 'DIPROSES'){
                $status = 'primary';
            }elseif($detail->status == 'DISETUJUI'){
                $status = 'success';
            }else{
                $status = 'danger';
            }
        @endphp
        <label class="badge badge-{{$status}} py-3 px-4" style="font-size: 18px">{{$detail->status}}</label>
    </div>
       
    <!-- Earnings (Monthly) Card Example -->
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <style>
                            th{
                                width: 30%;
                            }
                        </style>
                        <tr>
                            <th>Nomor Pengajuan</th>
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
                            <th>Jumlah Orang</th>
                            <td>{{$detail->jumlah_orang}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>Tanggal Mulai Pinjam</th>
                            <td>{{$detail->tanggal_pinjam}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai Pinjam</th>
                            <td>{{$detail->tanggal_kembali}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{$detail->keterangan}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group">
                        <button href="{{route('admin.rumah.approval',['id' => encrypt($detail->id),
                                'status' => 'DISETUJUI'])}}" class="btn btn-success btn_setuju" {{$detail->status != 'DIPROSES' ? 'disabled' : ''}}>
                            <span class="text"><i class="fas fa-check"></i>&ensp;SETUJU</span>
                        </button>
                        <button href="{{route('admin.rumah.approval',['id' => encrypt($detail->id),
                                'status' => 'DITOLAK'])}}" class="btn btn-danger btn_tolak" {{$detail->status != 'DIPROSES' ? 'disabled' : ''}}>
                            <span class="text"><i class="fas fa-times"></i>&ensp;TOLAK</span>
                        </button>
                    </div>
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
