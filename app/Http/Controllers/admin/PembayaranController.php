<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Jurusan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{

    function create(Jurusan $jurusan)
    {
        return view('admin.jurusan.pembayaran.create', [
            'jurusan' => $jurusan,
        ]);
    }

    function store(Jurusan $jurusan, PembayaranRequest $request)
    {
        $jurusan->pembayaran()->create([
            'kategori' => $request->kategori,
            'biaya' => $request->biaya,
        ]);

        return redirect()->route('admin.jurusan', $jurusan->fakultas->kampus->slug)->with('success', 'Berhasil tambah pembayaran jurusan ' . $jurusan->nama);
    }

    function update($id, PembayaranRequest $request)
    {
        $pembayaran = Pembayaran::where('id', $id)->firstOrFail();

        $pembayaran->update([
            'kategori' => $request->kategori,
            'biaya' => $request->biaya,
        ]);

        return redirect()->back()->with('success', 'pembayaran berhasil di update');
    }

    function delete($id)
    {
        $pembayaran = Pembayaran::where("id", $id)->firstOrFail();
        $pembayaran->delete();

        return redirect()->back()->with('success', 'pembayaran ' . $pembayaran->kategori . ' berhasil di hapus');
    }
}
