@extends('layouts.admin_dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Ajukan Peminjaman</h1>
        </div>
    </div>
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <style>
                            td{
                                width: 100%;
                            }
                        </style>
                        <tr>
                            <td class="text-center">
                                <a href="{{route('mobil')}}" class="btn btn-success btn-icon-split">
                                    <span class="text"><i class="fas fa-car"></i> Peminjaman Mobil</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="{{route('ruang')}}" class="btn btn-success btn-icon-split">
                                    <span class="text"><i class="fas fa-building"></i> Peminjaman Ruangan</span>
                                </a></td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="{{route('rumah')}}" class="btn btn-success btn-icon-split">
                                    <span class="text"><i class="fas fa-home"></i> Peminjaman Rumah Istirahat</span>
                                </a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
