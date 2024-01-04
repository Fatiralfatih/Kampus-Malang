<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Kampus;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    function dashboard()
    {
        $kampus = Kampus::with(['gambar'])->filter(request(['search', 'cari-jurusan']))->latest()->paginate(10);
        $kampusFavorit = Kampus::take(4)->get();
        return view('pengunjung.dashboard', [
            'kampuses' => $kampus,
            'kampusFavorit' => $kampusFavorit,
        ]);
    }

    function detailKampus(Kampus $kampus)
    {
        return view('pengunjung.kampus.detail', [
            'kampus' => $kampus,
        ]);
    }

    function notifikasi()
    {
        $pendaftaran = Pendaftaran::where('member_id', Auth::id())->with(['jurusan.fakultas.kampus', 'mahasiswa'])->latest()->get();
        // dd($pendaftaran->toArray());
        // $pendaftaran = Jurusan::with(['fakultas.kampus','pendaftaran' => function ($query) {
        //     $query->where('member_id', Auth::id());
        // }])->get();
        return view('pengunjung.notifikasi', [
            'pendaftarans' => $pendaftaran
        ]);
    }

    function detailFakultas(Fakultas $fakultas) {
        return view('pengunjung.fakultas.detail', [
            'fakultas' => $fakultas,
        ]);
    }
}
