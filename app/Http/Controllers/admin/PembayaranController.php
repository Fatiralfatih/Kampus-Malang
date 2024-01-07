<?php

namespace App\Http\Controllers\admin;

use App\Action\GetJurusanBySlug;
use App\Action\GetPembayaranById;
use App\Action\UpdatePembayaran;
use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Jurusan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{

    function create($slug)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);
        return view('admin.jurusan.pembayaran.create', [
            'jurusan' => $jurusan,
        ]);
    }

    function store($slug, PembayaranRequest $request)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);

        $jurusan->pembayaran()->create([
            'kategori' => $request->kategori,
            'biaya' => $request->biaya,
        ]);

        return redirect()
            ->route('admin.jurusan', $jurusan->fakultas->kampus->slug)
            ->with('success', 'Berhasil tambah pembayaran jurusan ' . $jurusan->nama);
    }

    function update($id, PembayaranRequest $request)
    {
        $pembayaran = app(GetPembayaranById::class)->execute($id);

        app(UpdatePembayaran::class)->execute($pembayaran, $request);

        return redirect()->back()->with('success', 'pembayaran berhasil di update');
    }

    function delete($id)
    {
        $pembayaran = app(GetPembayaranById::class)->execute($id);
        $pembayaran->delete();

        return redirect()->back()->with('success', 'pembayaran ' . $pembayaran->kategori . ' berhasil di hapus');
    }
}
