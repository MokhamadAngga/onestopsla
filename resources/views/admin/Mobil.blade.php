@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Peminjaman Mobil</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <style>
                    td{
                        text-align: center;
                    }
                </style><thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengaju</th>
                        <th>Mobil</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengaju</th>
                        <th>Mobil</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($peminjaman_mobil as $mobil)
                    <tr>
                        <td>{{$mobil->id}}</td>
                        <td>{{$mobil->getUser->name}}</td>
                        <td>{{$mobil->getBarang->nama}}</td>
                        <td>{{$mobil->tanggal_pinjam}}</td>
                        <td>
                            @php
                                if($mobil->status == 'DIPROSES'){
                                    $status = 'primary';
                                }elseif($mobil->status == 'DISETUJUI'){
                                    $status = 'success';
                                }else{
                                    $status = 'danger';
                                }
                            @endphp
                            <label class="badge badge-{{$status}}">{{$mobil->status}}</label>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button href="{{route('admin.mobil.approval',['id' => encrypt($mobil->id),
                                'status' => 'DISETUJUI'])}}" class="btn btn-success btn-sm btn_setuju" {{$mobil->status !=
                                'DIPROSES' ? 'disabled' : ''}}>
                                    <span class="text"><i class="fas fa-check"></i>&ensp;SETUJU</span>
                                </button>
                                <button href="{{route('admin.mobil.approval',['id' => encrypt($mobil->id),
                                'status' => 'DITOLAK'])}}" class="btn btn-danger btn-sm btn_tolak" {{$mobil->status !=
                                'DIPROSES' ? 'disabled' : ''}}>
                                    <span class="text"><i class="fas fa-times"></i>&ensp;TOLAK</span>
                                </button>
                                <a href="{{route('admin.mobil.detail',['id' => $mobil->id])}}" class="btn btn-primary btn-sm">
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
