@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Peminjaman</h1>        
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
                        <th>No. Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Barang</th>
                        <th>Status</th>
                        <th style="width: 20%">Pilihan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No. Pengajuan</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Barang</th>
                        <th>Status</th>
                        <th>Pilihan</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach($peminjaman_ruang as $ruang)
                    <tr>
                        <td>{{$ruang->ID}}</td>
                        <td>{{$ruang->Nama}}</td>
                        <td>{{$ruang->Tanggal_Pinjam}}</td>
                        <td>{{$ruang->Ruang}}</td>
                        <td>{{$ruang->Status}}</td>
                        <td class="text-center">
                            <a href="../admin_detail_peminjaman" class="btn btn-primary btn-icon-split">
                                <span class="text"> <i class="fas fa-search"></i> Lihat Detail</span>
                            </a>
                            <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#acceptModal">
                                <span class="text"><i class="fas fa-check"></i> Terima</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split ml-1" data-toggle="modal" data-target="#declineModal">
                                <span class="text"><i class="fas fa-times"></i> Tolak</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @foreach($peminjaman_rumah as $rumah)
                    <tr>
                        <td>{{$rumah->ID}}</td>
                        <td>{{$rumah->Nama}}</td>
                        <td>{{$rumah->Tanggal_pinjam}}</td>
                        <td>Rumah Dinas</td>
                        <td>{{$rumah->Status}}</td>
                        <td class="text-center">
                            <a href="../admin_detail_peminjaman" class="btn btn-primary btn-icon-split">
                                <span class="text"> <i class="fas fa-search"></i> Lihat Detail</span>
                            </a>
                            <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#acceptModal">
                                <span class="text"><i class="fas fa-check"></i> Terima</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split ml-1" data-toggle="modal" data-target="#declineModal">
                                <span class="text"><i class="fas fa-times"></i> Tolak</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @foreach($peminjaman_mobil as $mobil)
                    <tr>
                        <td>{{$mobil->ID}}</td>
                        <td>{{$mobil->Nama}}</td>
                        <td>{{$mobil->Tanggal_Pinjam}}</td>
                        <td>{{$mobil->Mobil}}</td>
                        <td>{{$mobil->Status}}</td>
                        <td class="text-center">
                            <a href="../admin_detail_peminjaman" class="btn btn-primary btn-icon-split">
                                <span class="text"> <i class="fas fa-search"></i> Lihat Detail</span>
                            </a>
                            <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#acceptModal">
                                <span class="text"><i class="fas fa-check"></i> Terima</span>
                            </a>
                            <a href="#" class="btn btn-danger btn-icon-split ml-1" data-toggle="modal" data-target="#declineModal">
                                <span class="text"><i class="fas fa-times"></i> Tolak</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!--modal terima-->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menerima permintaan peminjaman ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="../admin_peminjaman">Terima</a>
                </div>
            </div>
        </div>
    </div>
    <!--modal tolak-->
    <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menolak permintaan peminjaman ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Jika permintaan ditolak, silahkan masukkan alasan penolakan:</label>
                        <input type="text" class="form-control" id="alasan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../admin_peminjaman">Tolak</a>
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
