@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Update Barang</h1>
            <a href="{{route('barang')}}"><i class="fa fa-caret-left"></i> Kembali ke daftar barang</a>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <form action="{{route('barangU',[$barang->id])}}" method="POST">
        @csrf
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
                            <th>Kode Barang</th>
                            <td><input type="text" name="kode" class="text" value="{{$barang->kode}}" placeholder="">
                                @if($errors->has('kode'))
                                    <div class="text-danger">
                                        {{ $errors->first('kode')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td><input type="text" name="nama" class="text" value="{{$barang->nama}}" placeholder="">
                                @if($errors->has('nama'))
                                    <div class="text-danger">
                                        {{ $errors->first('nama')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><input type="text" name="kategori" class="text" value="{{$barang->kategori}}" placeholder="">
                                @if($errors->has('kategori'))
                                    <div class="text-danger">
                                        {{ $errors->first('kategori')}}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-success" value="Simpan">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
