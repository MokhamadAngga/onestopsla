@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Peminjaman</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengaju</th>
                    <th>Barang</th>
                    <th>Tanggal Mulai Pinjam</th>
                    <th>Tanggal Selesai Pinjam</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengaju</th>
                    <th>Barang</th>
                    <th>Tanggal Mulai Pinjam</th>
                    <th>Tangal Selesai Pinjam</th>
                    <th>Status</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($ruangs as $index=>$ruang)
                    @php $index = $index+1; @endphp
                    <tr>
                        <td>{{$index}}</td>
                        <td>{{$ruang->getUser->name}}</td>
                        <td>{{$ruang->getBarang->nama}}</td>
                        <td>{{$ruang->tanggal_pinjam}}</td>
                        <td>{{$ruang->tanggal_kembali}}</td>
                        <td>{{$ruang->status}}</td>
                    </tr>
                @endforeach
                @foreach($rumahs as $index=>$rumah)
                    @php $index = $index+1; @endphp
                    <tr>
                        <td>{{count($ruangs)+$index}}</td>
                        <td>{{$rumah->getUser->name}}</td>
                        <td>{{$rumah->getBarang->nama}}</td>
                        <td>{{$rumah->tanggal_pinjam}}</td>
                        <td>{{$rumah->tanggal_kembali}}</td>
                        <td>{{$rumah->status}}</td>
                    </tr>
                @endforeach
                @foreach($mobils as $index=>$mobil)
                    @php $index = $index+1; @endphp
                    <tr>
                        <td>{{count($ruangs)+count($rumahs)+$index}}</td>
                        <td>{{$mobil->getUser->name}}</td>
                        <td>{{$mobil->getBarang->nama}}</td>
                        <td>{{$mobil->tanggal_pinjam}}</td>
                        <td>{{$mobil->tanggal_kembali}}</td>
                        <td>{{$mobil->status}}</td>
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
