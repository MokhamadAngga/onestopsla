@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Manage User</h1>
        </div>
        <a href="{{route('userT')}}" class="btn btn-primary btn-icon-split">
            <span class="text"><i class="fas fa-plus"></i> Tambah User</span>
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
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
                        <th style="width: 10%">Id User</th>
                        <th style="width: 20%">Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th style="width: 12%">Admin</th>
                        <th style="width: 15%">Pilihan</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id User</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Pilihan</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($user as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->admin}}</td>
                        <td class="text-center">
                            <a href="{{route('deluser',[$data->id])}}" class="btn btn-danger btn-icon-split">
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
