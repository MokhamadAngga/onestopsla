<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Barang;
use App\Models\Komplain;
use App\Models\PeminjamanMobil;
use App\Models\peminjamanRuang;
use App\Models\PeminjamanRumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.dashboard');
        }
        return redirect('/user_dashboard');
    }

    public function peminjaman()
    {
        if (Auth::user()->isAdmin()) {
            $peminjaman_rumah = PeminjamanRumah::all();
            $peminjaman_mobil = PeminjamanMobil::all();
            $peminjaman_ruang = peminjamanRuang::all();
            return view('admin.peminjaman')->with('peminjaman_ruang', $peminjaman_ruang)->with('peminjaman_rumah', $peminjaman_rumah)->with('peminjaman_mobil', $peminjaman_mobil);
        }
        return redirect('/user_dashboard');
    }

    public function Ruang()
    {
        $peminjaman_ruang = peminjamanRuang::all();
        return view('admin.Ruang')->with('peminjaman_ruang', $peminjaman_ruang);
    }

    public function approvalRuang($id, $status)
    {
        $detail = peminjamanRuang::find(decrypt($id));
        $detail->update(['status' => $status]);
        return back();
    }

    public function detailRuang($id)
    {
        $detail = peminjamanRuang::find($id);
        return view('admin.detail_Ruang')->with(compact('detail'));
    }

    public function Rumah()
    {
        $peminjaman_rumah = PeminjamanRumah::all();
        return view('admin.Rumah')->with('peminjaman_rumah', $peminjaman_rumah);
    }

    public function approvalRumah($id, $status)
    {
        $detail = PeminjamanRumah::find(decrypt($id));
        $detail->update(['status' => $status]);
        return back();
    }

    public function detailRumah($id)
    {
        $detail = PeminjamanRumah::find($id);
        return view('admin.detail_Rumah')->with(compact('detail'));
    }

    public function Mobil()
    {
        $peminjaman_mobil = PeminjamanMobil::all();
        return view('admin.Mobil')->with('peminjaman_mobil', $peminjaman_mobil);
    }

    public function approvalMobil($id, $status)
    {
        $detail = PeminjamanMobil::find(decrypt($id));
        $detail->update(['status' => $status]);
        return back();
    }

    public function detailMobil($id)
    {
        $detail = PeminjamanMobil::find($id);
        return view('admin.detail_Mobil')->with(compact('detail'));
    }

    public function komplain()
    {
            $complaints = Komplain::all();

            return view('admin.complaints', ['complaints' => $complaints]);
    }

    public function detailkomplain($id)
    {
            $detail = Komplain::where(['id' => $id])->first();
            return view('admin.detail_complaint')->with(compact('detail'));
    }

    public function barang()
    {
        if (Auth::user()->isAdmin()) {
            $barang = Barang::all();

            return view('admin.barang', ['barang' => $barang]);
        }
        return redirect('/user_dashboard');
    }

    public function updatebarang()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.update_barang');
        }
        return redirect('/user_dashboard');
    }

    public function tambahbarang()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.tambah_barang');
        }
        return redirect('/user_dashboard');
    }

    public function addbarang(Request $request)
    {
        if (Auth::user()->isAdmin()) {

            $this->validate($request, [
                'kode' => 'required',
                'nama' => 'required',
                'kategori' => 'required'
            ]);

            Barang::create(
                ['kode' => $request->kode,
                    'nama' => $request->nama,
                    'kategori' => $request->kategori]
            );
            return redirect('/admin/barang');
        }
        return redirect('/user_dashboard');
    }

    public function barangU(Request $request, $id = null)
    {
        if (Auth::user()->isAdmin()) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                Barang::where(['id' => $id])->update(['nama' => $data['nama'], 'kategori' => $data['kategori']]);

                return redirect('/admin/barang');
            }
            $barang = Barang::where(['id' => $id])->first();
            return view('admin.update_barang')->with(compact('barang'));
        }
        return redirect('/user_dashboard');
    }

    public function delbarang($id)
    {
        if (Auth::user()->isAdmin()) {
            Barang::where('id', $id)->delete();
            return redirect('/admin/barang');
        }
        return redirect('/user_dashboard');
    }

    public function user()
    {
        if (Auth::user()->isAdmin()) {
            $user = User::all();
            return view('admin.user', ['user' => $user]);
        }
        return redirect('/user_dashboard');
    }

    public function userT()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.tambah_user');
        }
        return redirect('/user_dashboard');
    }

    public function adduser(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $this->validate($request, [
                'name' => 'required',
                'nip' => 'required',
                'email' => 'required',
                'password' => 'required',
                'admin' => 'required'
            ]);

            User::create(
                ['name' => $request->name,
                    'nip' => $request->nip,
                    'email' => $request->email,
                    'password' => bcrypt($request['password']),
                    'admin' => $request->admin]
            );
            return redirect('/admin/user');
        }
        return redirect('/user_dashboard');
    }

    public function deluser($id)
    {
        if (Auth::user()->isAdmin()) {
            User::where('id', $id)->delete();
            return back();
        }
        return redirect('/user_dashboard');
    }

}
