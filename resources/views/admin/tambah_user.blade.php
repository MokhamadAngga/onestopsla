@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
            <a href="{{route('user')}}"><i class="fa fa-caret-left"></i> Kembali ke daftar user</a>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <form action="{{route('adduser')}}" method="post">
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
                            <th>Nama</th>
                            <td><input type="text" name="name" class="text" value=""></td>
                        </tr>
                        <tr>
                            <th>N I P</th>
                            <td><input type="z" name="nip" class="text" value=""></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="text" name="email" class="email" value=""></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="text" name="password" class="password" value=""></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td><select name="admin">
                                    <option>0</option>
                                    <option>1</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-success" value="Tambah">
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
