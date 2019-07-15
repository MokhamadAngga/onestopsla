@extends('layouts.admin_dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="h3 mb-0 text-gray-800">Halaman Utama</h3>
        </div>
    </div>

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Diri</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th style="width: 30%">NIP</th>
                            <td>
                                {{Auth::user()->nip}}
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">Nama</th>
                            <td>
                                {{Auth::user()->name}}
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 30%">E-mail</th>
                            <td>
                                {{Auth::user()->email}}
                            </td>
                        </tr>
                    </table>
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
