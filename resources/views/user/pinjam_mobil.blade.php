@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Ajukan Peminjaman Mobil</h1>
            <a href="{{route('ajukanpinjam')}}"><i class="fa fa-caret-left"></i> Kembali ke Ajukan Peminjaman </a>
        </div>
        <a href="{{route('listmobil')}}" class="btn btn-primary btn-icon-split">
            <span class="text"><i class="fas fa-book"></i> List Peminjaman Mobil</span>
        </a>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <form action="{{route('addmobil')}}" method="POST">
        @csrf
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <style>
                                th {
                                    width: 39%;
                                }
                            </style>
                            <tr>
                                <th>NIP</th>
                                <td><input value="{{Auth::user()->nip}}" disabled class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><input value="{{Auth::user()->name}}" disabled class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Mobil</th>
                                <td>
                                    <select name="barang_id" class="form-control">
                                        @foreach(\App\Models\Barang::where('kategori','=','Mobil')->get() as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                        @endforeach
                                    </select></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Tanggal Mulai Pinjam</th>
                                <td><input size="16" name="tanggal_pinjam" type="datetime-local" value=""></td>
                            </tr>
                            <tr>
                                <th>Tanggal Selesai Pinjam</th>
                                <td><input size="16" name="tanggal_kembali" type="date" value=""></td>
                            </tr>
                            <tr>
                                <th>Jumlah Orang</th>
                                <td><input type="number" name="jumlah_orang" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>Keterangan Penggunaan</th>
                                <td><textarea name="keterangan_penggunaan" class="form-control"></textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-success" value="Ajukan" data-toggle="modal"
                               data-target="#app">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--modal terima-->
        <div id="app">
            @include('flash-message')

            @yield('content')
        </div>
@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
