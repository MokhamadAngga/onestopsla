@extends('layouts.admin_dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="h3 mb-0 text-gray-800">Jenis Pekerjaan Pemeliharaan Atas Beban Penghuni RDBI</h3>
            <h5 class="h5 mb-0 text-gray-800">(sesuai Lampiran SE No. 11/53/INTERN)</h5>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th style="width: 3%">1.</th>
                            <th style="width: 30%">Pekerjaan Halaman (depan/belakang/samping)</th>
                            <td>- Perawatan taman/tanaman hias <br/>
                                - Paprasan pohon/perantingan <br/>
                                - Pembersihan saluran terbuka <br/>
                                - Penambahan/perbaikan accessories pagar/pintu pagar (fiberglass, lampu pagar, kunci
                                &nbsp;&nbsp;pagar dan lain-lain) <br/>
                                - Perbaikan ramp garasi/carport di halaman luar dan halaman dalam <br/>
                                - Pembuatan/perbaikan/penggantian atap carport <br/>
                                - Perbaikan /pengecatan tiang bendera <br/>
                                - Penggantian tali tiang bendera <br/>
                                - Penggantian /perbaikan paving block <br/>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">2.</th>
                            <th style="width: 30%">Pekerjaan Dinding</th>
                            <td>- Penutupan lubang ventilasi akibat pemasangan AC milik PIHAK KEDUA
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">3.</th>
                            <th style="width: 30%">Pekerjaan kusen, pintu dan jendela</th>
                            <td>- Penggantian/perbaikan list kusein <br/>
                                - Penggantian/perbaikan engsel dan atau grendel pada pintu/jendela <br/>
                                - Penggantian/perbaikan kunci pintu, gembok, hak angin <br/>
                                - Penggantian kaca pintu/kaca jendela pecah <br/>
                                - Perbaikan sealent kaca <br/>
                                - Pemasangan pintu, jendela dan ventilasi dengan kasa/kawat nyamuk <br/>
                                - Penggantian/perbaikan kawat nyamuk
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">4.</th>
                            <th style="width: 30%">Pekerjaan Pengecatan</th>
                            <td>- Pengecatan kusen, pintu, jendela (kurang dari 3 tahun) <br/>
                                - Pelituran pintu, jendela dll (kurang dari 3 tahun) <br/>
                                - Pengecatan dinding (kurang dari 3 tahun) <br/>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">5.</th>
                            <th style="width: 30%">Pekerjaan Atap</th>
                            <td>- Pembersihan talang air hujan
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">6.</th>
                            <th style="width: 30%">Penggantian/perbaikan instalasi air/sanitair</th>
                            <td>- Penggantian/perbaikan kran tembok, washtafel, shower dan kran taman <br/>
                                - Penggantian/perbaikan kran sink <br/>
                                - Perbaikan instalasi pembuangan mapet di dapur dan washtafel <br/>
                                - Perbaikan/penggantian jet washer, mekanik closet dan floor drain <br/>
                                - Perbaikan washtafel, penggantian sifon, kran dan kaca <br/>
                                - Pembersihan/pengurasan bak penampungan air (watertorn, groundtank, bak mandi,
                                &nbsp;&nbsp;kolam ikan dll) <br/>
                                - Perbaikan bocoran bak mandi, kolam ikan <br/>
                                - Pembersihan kamar mandi
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">7.</th>
                            <th style="width: 30%">Penggantian/perbaikan listrik</th>
                            <td>- Penggantian bohlam pada rumah dan taman <br/>
                                - Penggantian/perbaikan fitting <br/>
                                - Penggantian/perbaikan saklar <br/>
                                - Penggantian/perbaikan/perbaikan stop kontak
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">8.</th>
                            <th style="width: 30%">Penggantian/perbaikan perabot</th>
                            <td>- Penggantian/perbaikan rel pintu garasi (kurang dari 8 tahun) <br/>
                                - Penggantian/perbaikan perabot (kurang dari 4 tahun) : <br/>
                                &nbsp;&nbsp; • gorden/vitrase, rel <br/>
                                &nbsp;&nbsp; • pembungkus/kulit sofa tamu/keluarga dan kursi makan <br/>
                                &nbsp;&nbsp; • kasur dan bantal guling <br/>
                                &nbsp;&nbsp; • kaca, engsel, handle, kunci lemari/credensa/meja/kitchen set <br/>
                                &nbsp;&nbsp; • Rak jemuran, rak piring, meja setrika
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">9.</th>
                            <th style="width: 30%">Penggantian/perbaikan mesin dan peralatan (kurang dari 8 tahun)
                            </th>
                            <td>- Penghisap asap
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 3%">10.</th>
                            <th style="width: 30%">Pekerjaan Lain-Lain</th>
                            <td>- Pembasmian hama (tikus, kecoak dll)
                            </td>
                        </tr>
                    </table>
                    *apabila anda telah memahami jenis pekerjaan pemeliharaan diatas silahkan klik Ajukan Komplain
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-3">
                    <a href="{{route('ajukan.komplain')}}" class="btn btn-success">Ajukan Komplain</a>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
@endsection

@section('script.ext')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection
