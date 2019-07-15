@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Ajukan Komplain</h1>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <form action="{{route('ajukan.komplain.submit')}}" method="POST">
        @csrf
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>NIP</th>
                                <td><input type="number" value="{{Auth::user()->nip}}" disabled class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><input type="text" value="{{Auth::user()->name}}" disabled class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pinjam</th>
                                <td><input size="16" name="tanggal_pinjam" type="date" value=""></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Barang</th>
                                <td><select name="barang_id" class="form-control">
                                        @foreach(\App\Models\Barang::where('kategori','!=','Ruang')->get() as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <td><textarea name="keluhan" class="form-control"></textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-success" value="Tambah" data-toggle="modal"
                               data-target="#acceptModal">
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </form>
    <!--modal terima-->
    <div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Komplain Telah Terkirim. Terima Kasih.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
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
