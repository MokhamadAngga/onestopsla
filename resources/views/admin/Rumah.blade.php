@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Peminjaman Rumah</h1>        
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
                        <th>Barang</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengaju</th>
                        <th>Barang</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($peminjaman_rumah as $rumah)
                    <tr>
                        <td>{{$rumah->id}}</td>
                        <td>{{$rumah->getUser->name}}</td>
                        <td>{{$rumah->getBarang->nama}}</td>
                        <td>{{$rumah->tanggal_pinjam}}</td>
                        <td>
                            @php
                                if($rumah->status == 'DIPROSES'){
                                    $status = 'primary';
                                }elseif($rumah->status == 'DISETUJUI'){
                                    $status = 'success';
                                }else{
                                    $status = 'danger';
                                }
                            @endphp
                            <label class="badge badge-{{$status}}">{{$rumah->status}}</label>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button href="{{route('admin.rumah.approval',['id' => encrypt($rumah->id),
                                'status' => 'DISETUJUI'])}}" class="btn btn-success btn-sm btn_setuju" {{$rumah->status !=
                                'DIPROSES' ? 'disabled' : ''}}>
                                    <span class="text"><i class="fas fa-check"></i>&ensp;SETUJU</span>
                                </button>
                                <button href="{{route('admin.rumah.approval',['id' => encrypt($rumah->id),
                                'status' => 'DITOLAK'])}}" class="btn btn-danger btn-sm btn_tolak" {{$rumah->status !=
                                'DIPROSES' ? 'disabled' : ''}}>
                                    <span class="text"><i class="fas fa-times"></i>&ensp;TOLAK</span>
                                </button>
                                <a href="{{route('admin.rumah.detail',['id' => $rumah->id])}}" class="btn btn-primary btn-sm">
                                    <span class="text"><i class="fas fa-search"></i>&ensp;DETAIL</span>
                                </a>
                            </div>
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
