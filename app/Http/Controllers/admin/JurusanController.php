<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateJurusan;
use App\Action\UpdateJurusanBySlug;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanStoreRequest;
use App\Http\Requests\JurusanUpdateRequest;
use App\Models\Jurusan;
use App\Models\Kampus;

class JurusanController extends Controller
{

    function navItem(Kampus $kampus)
    {
        $jurusan = $kampus->Jurusan()->with(['pembayaran', 'pelaksanaan'])->latest()->get();
        return view('admin.jurusan.navItem', [
            'kampus' => $kampus,
            'jurusans' => $jurusan,
        ]);
    }

    function create(Kampus $kampus)
    {
        return view('admin.jurusan.create', [
            'kampus' => $kampus,
        ]);
    }

    function store(JurusanStoreRequest $request, Kampus $kampus)
    {
        try {
            app(CreateJurusan::class)->execute($request, $kampus);
            return redirect()
                ->route('admin.jurusan', $kampus->slug)
                ->with('success', 'kampus ' . $kampus->nama . ' berhasil ditambahkan jurusan ' . $request->namaJurusan);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed: data gagal di tambahkan');
        }
    }

    function edit(Jurusan $jurusan)
    {
        $jurusans = $jurusan->load(['fakultas', 'pembayaran', 'pelaksanaan']);
        $fakultas = Fakultas::where('kampus_id', $jurusan->fakultas->kampus->id)->get();
        return view('admin.jurusan.edit', [
            'jurusan' => $jurusans,
            'fakultases' => $fakultas,
        ]);
    }

    function update(JurusanUpdateRequest $request, Jurusan $jurusan)
    {
        try {
            app(UpdateJurusanBySlug::class)->execute($request, $jurusan);

            return redirect()
                ->route('admin.jurusan', $jurusan->fakultas->kampus->slug)
                ->with('success', 'berhasil update jurusan');
                
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function delete(Jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->back()->with('success', 'jurusan ' . $jurusan->nama .  ' fakultas ' . $jurusan->fakultas->nama  . ' berhasil di delete');
    }

    function history(Kampus $kampus)
    {

        $jurusan = $kampus->Jurusan()->onlyTrashed()->get();

        return view('admin.jurusan.history', [
            'jurusans' => $jurusan,
            'kampus' => $kampus,
        ]);
    }

    function restore($id)
    {
        $jurusan = Jurusan::where('id', $id)->withTrashed()->firstOrFail();
        $jurusan->restore();
        return redirect()->back()->with('success', 'Jurusan ' . $jurusan->nama . ' Berhasil di restore');
    }

    function forceDelete($id)
    {
        $jurusan = Jurusan::where('id', $id)->withTrashed()->firstOrfail();
        $jurusan->forceDelete();

        return redirect()->back()->with('success', 'jurusan ' . $jurusan->nama . ' Berhasil dihapus');
    }
}
