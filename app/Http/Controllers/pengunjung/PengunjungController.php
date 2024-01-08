<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranStoreRequest;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    function dashboard()
    {
        $kampus = Kampus::with(['gambar'])
            ->filter(request(['search', 'cari-jurusan']))
            ->latest()->paginate(10);
        $kampusFavorit = Kampus::where('isFavorit', 1)->with(['gambar'])->take(4)->get();

        return view('pengunjung.dashboard', [
            'kampuses' => $kampus,
            'kampusFavorit' => $kampusFavorit,
        ]);
    }

    function detailKampus($slug)
    {
        $kampus = Kampus::where('slug', $slug)
            ->with(['fakultas', 'gambar'])
            ->firstOrfail();

        return view('pengunjung.kampus.detail', [
            'kampus' => $kampus,
        ]);
    }

    function notifikasi()
    {
        $pendaftaran = Pendaftaran::where('member_id', Auth::id())
            ->with(['jurusan.fakultas.kampus', 'mahasiswa'])
            ->latest()
            ->get();

        return view('pengunjung.notifikasi', [
            'pendaftarans' => $pendaftaran
        ]);
    }

    function detailFakultas($slug)
    {
        $fakultas = Fakultas::where('slug', $slug)->firstOrFail();

        return view('pengunjung.fakultas.detail', [
            'fakultas' => $fakultas,
        ]);
    }

    function pendaftaran(PendaftaranStoreRequest $request)
    {
        $jurusan = Jurusan::where('slug', $request->slugJurusan)->firstOrFail();
        $jurusan->pendaftaran()->attach(Auth::id(), [
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Berhasil Mendaftar!');
    }
}
