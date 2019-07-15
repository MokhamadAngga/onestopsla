@extends('layouts.admin_dashboard')

@section('sidebar')
    <title>User | Ajukan Peminjaman</title>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ml-0 mr-0 " style="width:100%">
            <img src="{{asset('img/logoBI2.png')}}" style="width: 30%">                
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="../listpinjam">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link" href="../listpinjam">
            <i class="fas fa-fw fa-table"></i>
            <span>List Peminjaman</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="../ajukanpinjam">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ajukan Peminjaman</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../komplain">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Ajukan Komplain</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Ajukan Peminjaman Ruang</h1>
            <a href="../ajukanpinjam"><i class="fa fa-caret-left"></i> Kembali ke Ajukan Peminjaman </a>
        </div>              
    </div>
       
    <!-- Earnings (Monthly) Card Example -->
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>Nomor Pengajuan</th>
                            <td>11111</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><input type="text" id="lname" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td><input type="text" id="lname" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>
                                <select name="keterangan" id="lname" class="form-control">
                                    <option>SINGOSARI</option>
                                    <option>KAHURIPAN</option>
                                    <option>SLA</option>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th>Tanggal Mulai Pinjam</th>
                            <td><input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai Pinjam</th>
                            <td><input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime"></td>
                        </tr>
                        <tr>
                            <th>Susunan Meja</th>
                            <td><select name="keterangan" id="lname" class="form-control">
                                    <option>U-Shape</option>
                                    <option>Round Table</option>
                                </select></td></td>
                        </tr>
                        <tr>
                            <th>Custom Request</th>
                            <td><textarea name="Custom"  id="lname" class="form-control"></textarea></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#acceptModal">
                        <span class="text"><i class="fas fa-check"></i> Ajukan</span>
                    </a>
                    <a href="#" class="btn btn-danger btn-icon-split ml-1" data-toggle="modal" data-target="#declineModal">
                        <span class="text"><i class="fas fa-times"></i> Hapus Data</span>
                    </a> 
                </div>
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
                    <a class="btn btn-success" href="login.html">Terima</a>
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
                    <a class="btn btn-danger" href="login.html">Tolak</a>
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

/*https://www.twilio.com/video/pricing*/