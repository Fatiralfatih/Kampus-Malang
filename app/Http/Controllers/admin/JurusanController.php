<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateJurusan;
use App\Action\GetFakultasBySlug;
use App\Action\GetHistoryJurusanBySlug;
use App\Action\GetJurusanBySlug;
use App\Action\GetKampusBySlug;
use App\Action\UpdateJurusan;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanStoreRequest;
use App\Http\Requests\JurusanUpdateRequest;
use App\Models\Jurusan;
use App\Models\Kampus;

class JurusanController extends Controller
{

    function navItem($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        $jurusan = $kampus->Jurusan()->with(['pembayaran', 'pelaksanaan'])->latest()->paginate(4);

        return view('admin.jurusan.navItem', [
            'kampus' => $kampus,
            'jurusans' => $jurusan,
        ]);
    }

    function create($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        return view('admin.jurusan.create', [
            'kampus' => $kampus,
        ]);
    }

    function store($slug, JurusanStoreRequest $request)
    {
        try {
            $kampus = app(GetKampusBySlug::class)->execute($slug);

            app(CreateJurusan::class)->execute($kampus, $request);

            return redirect()
                ->route('admin.jurusan', $kampus->slug)
                ->with('success', 'kampus ' . $kampus->nama . ' berhasil ditambahkan jurusan ');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function edit($slug)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);

        $fakultases = Fakultas::where('kampus_id', $jurusan->fakultas->kampus->id)->get();

        return view('admin.jurusan.edit', [
            'jurusan' => $jurusan,
            'fakultases' => $fakultases,
        ]);
    }

    function update($slug, JurusanUpdateRequest $request)
    {
        try {
            $jurusan = app(GetJurusanBySlug::class)->execute($slug);

            app(UpdateJurusan::class)->execute($request, $jurusan);

            return redirect()
                ->route('admin.jurusan', $jurusan->fakultas->kampus->slug)
                ->with('success', 'berhasil update jurusan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function delete($slug)
    {
        $jurusan = app(GetJurusanBySlug::class)->execute($slug);

        $jurusan->delete();

        return redirect()
            ->back()
            ->with('success', 'jurusan ' . $jurusan->nama . ' berhasil di delete');
    }

    function history($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        $jurusan = $kampus->Jurusan()->onlyTrashed()->get();

        return view('admin.jurusan.history', [
            'kampus' => $kampus,
            'jurusans' => $jurusan,
        ]);
    }

    function restore($slug)
    {
        try {
            $jurusan = app(GetHistoryJurusanBySlug::class)->execute($slug);
            $jurusan->restore();

            return redirect()
                ->back()
                ->with('success', 'Jurusan ' . $jurusan->nama . ' Berhasil di restore');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function forceDelete($slug)
    {
        try {

            $jurusan = app(GetHistoryJurusanBySlug::class)->execute($slug);

            $jurusan->forceDelete();

            return redirect()
                ->back()
                ->with('success', 'jurusan ' . $jurusan->nama . ' Berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
