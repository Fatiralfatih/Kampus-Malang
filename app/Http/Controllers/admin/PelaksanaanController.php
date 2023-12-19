<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PelaksanaanRequest;
use App\Models\Jurusan;
use App\Models\Pelaksanaan;
use Illuminate\Http\Request;

class PelaksanaanController extends Controller
{
    function create(Jurusan $jurusan)
    {
        return view('admin.jurusan.pelaksanaan.create', [
            'jurusan' => $jurusan,
        ]);
    }

    function store(Jurusan $jurusan, PelaksanaanRequest $request)
    {
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

        $pelaksanaan = Pelaksanaan::where('id', $id)->firstOrFail();

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
        $pelaksanaan = Pelaksanaan::where("id", $id)->firstOrFail();

        $pelaksanaan->delete();

        return redirect()->back()->with('success', 'jadwal ' . $pelaksanaan->nama . ' berhasil di hapus');
    }
}
