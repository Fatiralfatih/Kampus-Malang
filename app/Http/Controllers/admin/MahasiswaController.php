<?php

namespace App\Http\Controllers\admin;

use App\Action\UpdateMahasiswaStatusById;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMahasiswaStatusRequest;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    function index()
    {
        $jurusan = Jurusan::with(['fakultas.kampus', 'pendaftaran'])->get();
        return view('admin.mahasiswa.index', [
            'jurusans' => $jurusan,
        ]);
    }

    function terima(UpdateMahasiswaStatusRequest $request, $id)
    {
        try {
            app(UpdateMahasiswaStatusById::class)->execute($request->status, $id);

            return redirect()->back()->with('success', 'berhasil menerima mahasiswa');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: data tidak valid!!');
        }
    }

    function tolak(UpdateMahasiswaStatusRequest $request, $id)
    {
        try {

            app(UpdateMahasiswaStatusById::class)->execute($request->status, $id);

            return redirect()->back()->with('success', 'berhasil menolak mahasiswa');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: data tidak valid!!');
        }
    }
}
