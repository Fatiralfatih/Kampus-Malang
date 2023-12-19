<?php

namespace App\Http\Controllers\pengunjung;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kampus;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
    function dashboard()
    {
        $kampus = Kampus::with(['gambar'])->filter(request(['search', 'cari-jurusan']))->latest()->paginate(10);

        $jurusans = Jurusan::with(['fakultas.kampus', 'pendaftaran' => function ($query) {
            $query->where('member_id', Auth::id());
        }])->latest()->get();
        return view('pengunjung.dashboard', [
            'kampuses' => $kampus,
            'jurusans' => $jurusans,
        ]);
    }

    function detail(Kampus $kampus)
    {
        $jurusans = Jurusan::with(['fakultas.kampus', 'pendaftaran' => function ($query) {
            $query->where('member_id', Auth::id());
        }])->latest()->get();
        return view('pengunjung.kampus.detail', [
            'kampus' => $kampus,
            'jurusans' => $jurusans,
        ]);
    }

    function notifikasi()
    {
        $jurusans = Jurusan::with(['fakultas.kampus', 'pendaftaran' => function ($query) {
            $query->where('member_id', Auth::id());
        }])->latest()->get();
        return view('pengunjung.notifikasi', [
            'jurusans' => $jurusans
        ]);
    }
}
