<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranStoreRequest;
use App\Models\Kampus;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    function daftar(Kampus $kampus)
    {
        return view('pengunjung.pendaftaran', [
            'kampus' => $kampus
        ]);
    }

    function store(Kampus $kampus, PendaftaranStoreRequest $request)
    {
        $jurusan = $kampus->Jurusan()->firstOrFail();
        $jurusan->pendaftaran()->attach(Auth::id(), [
            'jurusan_id' => $request->jurusan_id,
        ]);
        return redirect()
            ->route('pengunjung.fakultas.detail', $jurusan->fakultas->slug)
            ->with('success', 'Berhasil Mendaftar!');
    }
}
