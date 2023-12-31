<?php

namespace App\Http\Controllers\admin;

use App\Action\GetJurusanBySlug;
use App\Action\GetPelaksanaanById;
use App\Http\Controllers\Controller;
use App\Http\Requests\PelaksanaanRequest;
use App\Models\Jurusan;
use App\Models\Pelaksanaan;
use Illuminate\Http\Request;

class PelaksanaanController extends Controller
{
    function create($slug)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);

        return view('admin.jurusan.pelaksanaan.create', [
            'jurusan' => $jurusan,
        ]);
    }

    function store($slug, PelaksanaanRequest $request)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);

        $jurusan->pelaksanaan()->create([
            'nama' => $request->nama,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()
            ->route('admin.jurusan', $jurusan->fakultas->kampus->slug)
            ->with('success', 'berhasil tambah pelaksanaan di jurusan ' . $jurusan->nama);
    }

    function update($id, PelaksanaanRequest $request)
    {

       $pelaksanaan = app(GetPelaksanaanById::class)->execute($id);

        $pelaksanaan->update([
            'nama' => $request->nama,
            'jadwal' => $request->jadwal,
        ]);

        return redirect()
            ->back()
            ->with('success', 'pembayaran berhasil di update' . $pelaksanaan->jurusan->nama);
    }

    function delete($id)
    {
        $pelaksanaan = app(GetPelaksanaanById::class)->execute($id);

        $pelaksanaan->delete();

        return redirect()->back()->with('success', 'jadwal ' . $pelaksanaan->nama . ' berhasil di hapus');
    }
}
