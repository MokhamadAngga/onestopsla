<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Komplain;
use App\Models\PeminjamanMobil;
use App\Models\peminjamanRuang;
use App\Models\PeminjamanRumah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.dashboard');
        }

        return view('admin.dashboard');
    }

    public function list()
    {
        if (!Auth::user()->isAdmin()) {
            $rumahs = PeminjamanRumah::where('user_id', Auth::id())->get();
            $mobils = PeminjamanMobil::where('user_id', Auth::id())->get();
            $ruangs = peminjamanRuang::where('user_id', Auth::id())->get();

            return view('user.list_pinjam', compact('rumahs', 'mobils', 'ruangs'));
        }
        return view('admin.dashboard');
    }

    public function listD()
    {
        if (!Auth::user()->isAdmin()) {
            return view('user.detail_pinjam');
        }
        return view('admin.dashboard');
    }

    public function infokomplain()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.info_komplain');
        }
        return view('admin.dashboard');
    }

    public function komplain()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.komplain');
        }
        return view('admin.dashboard');
    }

    public function addkomplain(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            Komplain::create(
                ['user_id' => Auth::id(),
                    'tanggal_pinjam' => $request->tanggal_pinjam,
                    'barang_id' => $request->barang_id,
                    'keluhan' => $request->keluhan,
                ]);
            return redirect('komplain/ajukan');
        }
        return view('admin.dashboard');
    }

    public function ajukan()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.ajukan_pinjam');
        }
        return view('admin.dashboard');
    }

    public function mobil()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.pinjam_mobil');
        }
        return view('admin.dashboard');
    }

    public function addmobil(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            $this->validate($request, [
                'barang_id' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'keterangan_penggunaan' => 'required',
                'jumlah_orang' => 'required',
            ]);

            $allData = PeminjamanMobil::where('barang_id',$request->barang_id)->orderBy('tanggal_pinjam', 'asc')->get();
            $tgl_kembali = Carbon::parse($request->tanggal_kembali);
            $tgl_pinjam = Carbon::parse($request->tanggal_pinjam);

            if($tgl_pinjam->greaterThan($tgl_kembali)){
                return back()->with('error','Tanggal yang anda masukan tidak sesuai');
            }
            if ($countData=count($allData)) {
                if ($allData[0]->tanggal_pinjam->subDay()->lessThan($tgl_kembali)&& $allData[0]->tanggal_pinjam->greaterThan($tgl_pinjam)) {
                    return back()->with('error','Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Mobil.');
                } elseif ($allData[0]->tanggal_kembali->greaterThanOrEqualTo($tgl_pinjam)&&
                    $allData[0]->tanggal_kembali->lessThanOrEqualTo($tgl_kembali)) {
                    return back()->with('error','Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Mobil.');
                }
                else {
                    $a='';
                    foreach ($allData as $i=>$row) {
                        if ($row->tanggal_kembali->addDay()->lessThanOrEqualTo($tgl_pinjam)) {
                            if (($countData-1)>=($index=$i+1)){

                                if ($allData[$index]->tanggal_pinjam->lessThanOrEqualTo($tgl_kembali)){
                                   $a=1;
                                }
                                if (!$allData[$index]->tanggal_kembali->addDay()->lessThanOrEqualTo($tgl_pinjam)){
                                    break;
                                }
                                $a='';
                            }
                        }
                    }
                    if ($a){
                        return 'error - Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Mobil.';
                    }
                }
            }
            PeminjamanMobil::create(
                ['user_id' => Auth::id(),
                    'barang_id' => $request->barang_id,
                    'tanggal_pinjam' => $request->tanggal_pinjam,
                    'tanggal_kembali' => $request->tanggal_kembali,
                    'keterangan_penggunaan' => $request->keterangan_penggunaan,
                    'jumlah_orang' => $request->jumlah_orang,
                ]);
            return redirect('/listpinjam');
        }
        return view('admin.dashboard');
    }

    public function ruang()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.pinjam_ruang');
        }
        return view('admin.dashboard');
    }

    public function addruang(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            $this->validate($request, [
                'barang_id' => 'required',
                'keterangan_penggunaan' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'bentuk_meja' => 'required',
                'custom_request' => 'required',
            ]);

            $allData = peminjamanRuang::where('barang_id',$request->barang_id)->orderBy('tanggal_pinjam', 'asc')->get();
            $tgl_kembali = Carbon::parse($request->tanggal_kembali);
            $tgl_pinjam = Carbon::parse($request->tanggal_pinjam);

            if($tgl_pinjam->greaterThan($tgl_kembali)){
                return back()->with('error','Tanggal dan jam yang anda masukan tidak sesuai');
            }
            if ($countData=count($allData)) {
                if ($allData[0]->tanggal_pinjam->subHour()->lessThan($tgl_kembali)&& $allData[0]->tanggal_pinjam->greaterThan($tgl_pinjam)) {
                    return back()->with('error','Barang pada tanggal dan jam tersebut telah terpinjam.  Silahkan cek List Peminjaman Ruang.');
                } elseif ($allData[0]->tanggal_kembali->greaterThanOrEqualTo($tgl_pinjam)&&
                    $allData[0]->tanggal_kembali->lessThanOrEqualTo($tgl_kembali)) {
                    return back()->with('error','Barang pada tanggal dan jam tersebut telah terpinjam.  Silahkan cek List Peminjaman Ruang.');
                }
                else {
                    $a='';
                    foreach ($allData as $i=>$row) {
                        if ($row->tanggal_kembali->addHour()->lessThanOrEqualTo($tgl_pinjam)) {
                            if (($countData-1)>=($index=$i+1)){
                                if ($allData[$index]->tanggal_pinjam->lessThanOrEqualTo($tgl_kembali)){
                                    $a=1;
                                }
                                if (!$allData[$index]->tanggal_kembali->addHour()->lessThanOrEqualTo($tgl_pinjam)){
                                    break;
                                }
                                $a='';
                            }
                        }
                    }
                    if ($a){
                        return back()->with('error','Barang pada tanggal dan jam tersebut telah terpinjam.  Silahkan cek List Peminjaman Ruang.');
                    }
                }
            }
            peminjamanRuang::create(
                ['user_id' => Auth::id(),
                    'barang_id' => $request->barang_id,
                    'keterangan_penggunaan' => $request->keterangan_penggunaan,
                    'tanggal_pinjam' => $request->tanggal_pinjam,
                    'tanggal_kembali' => $request->tanggal_kembali,
                    'bentuk_meja' => $request->bentuk_meja,
                    'custom_request' => $request->custom_request,]
            );
            return redirect('/listpinjam');
        }
        return view('admin.dashboard');
    }

    public function rumah()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.pinjam_rumah');
        }
        return view('admin.dashboard');
    }

    public function addrumah(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            $this->validate($request, [
                'jumlah_orang' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'keterangan' => 'required',
            ]);

            $allData = PeminjamanRumah::where('barang_id',$request->barang_id)->orderBy('tanggal_pinjam', 'asc')->get();
            $tgl_kembali = Carbon::parse($request->tanggal_kembali);
            $tgl_pinjam = Carbon::parse($request->tanggal_pinjam);

            if($tgl_pinjam->greaterThan($tgl_kembali)){
                return back()->with('error','Tanggal yang anda masukan tidak sesuai');
            }
            if ($countData=count($allData)) {
                if ($allData[0]->tanggal_pinjam->subDay()->lessThan($tgl_kembali)&& $allData[0]->tanggal_pinjam->greaterThan($tgl_pinjam)) {
                    return back()->with('error','Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Rumah.');
                } elseif ($allData[0]->tanggal_kembali->greaterThanOrEqualTo($tgl_pinjam)&&
                    $allData[0]->tanggal_kembali->lessThanOrEqualTo($tgl_kembali)) {
                    return back()->with('error','Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Rumah.');
                }
                else {
                    $a='';
                    foreach ($allData as $i=>$row) {
                        if ($row->tanggal_kembali->addDay()->lessThanOrEqualTo($tgl_pinjam)) {
                            if (($countData-1)>=($index=$i+1)){

                                if ($allData[$index]->tanggal_pinjam->lessThanOrEqualTo($tgl_kembali)){
                                    $a=1;
                                }
                                if (!$allData[$index]->tanggal_kembali->addDay()->lessThanOrEqualTo($tgl_pinjam)){
                                    break;
                                }
                                $a='';
                            }
                        }
                    }
                    if ($a){
                        return back()->with('error','Barang pada tanggal tersebut telah terpinjam.  Silahkan cek List Peminjaman Rumah.');
                    }
                }
            }
            PeminjamanRumah::create(
                ['user_id' => Auth::id(),
                    'barang_id' => $request->barang_id,
                    'jumlah_orang' => $request->jumlah_orang,
                    'tanggal_pinjam' => $request->tanggal_pinjam,
                    'tanggal_kembali' => $request->tanggal_kembali,
                    'keterangan' => $request->keterangan,
                ]);
            return redirect('/listpinjam');
        }
        return view('admin.dashboard');
    }

    public function barang()
    {
        if (!Auth::user()->isAdmin()) {
            $barang = Barang::all();

            return view('user.barang', ['barang' => $barang]);
        }
        return view('admin.dashboard');
    }

    public function list_mobil()
    {
        $peminjaman_mobil = PeminjamanMobil::all();
        return view('user.list_mobil')->with('peminjaman_mobil', $peminjaman_mobil);
    }

    public function list_ruang()
    {
        $peminjaman_ruang = PeminjamanRuang::all();
        return view('user.list_ruang')->with('peminjaman_ruang', $peminjaman_ruang);
    }

    public function list_rumah()
    {
        $peminjaman_rumah = PeminjamanRumah::all();
        return view('user.list_rumah')->with('peminjaman_rumah', $peminjaman_rumah);
    }

    public function vidcon()
    {
        if (!Auth::user()->isAdmin()) {

            return view('user.pinjam_vidcon');
        }
        return view('admin.dashboard');
    }
}
