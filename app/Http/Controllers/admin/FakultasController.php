<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateFakultas;
use App\Action\GetFakultasBySlug;
use App\Action\GetHistoryFakultasBySlug;
use App\Action\GetKampusBySlug;
use App\Action\UpdateFakultas;
use App\Models\Kampus;
use App\Models\Fakultas;
use App\Http\Controllers\Controller;
use App\Http\Requests\FakultasStoreRequest;
use App\Http\Requests\FakultasUpdateRequest;

class FakultasController extends Controller
{

    function navItem($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        return view('admin.fakultas.navItem', [
            'kampus' => $kampus,
        ]);
    }

    function create($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        return view('admin.fakultas.create', [
            'kampus' => $kampus,
        ]);
    }

    function store($slug, FakultasStoreRequest $request)
    {
        try {

            $kampus = app(GetKampusBySlug::class)->execute($slug);

            app(CreateFakultas::class)->execute($request, $kampus);

            return redirect()
                ->route('admin.fakultas', $kampus->slug)
                ->with('success', 'kampus berhasil ditambahkan fakultas');
        } catch (\Exception $e) {
            return redirect()->back('error', $e->getMessage());
        }
    }

    function edit($slug)
    {
        $fakultas = app(GetFakultasBySlug::class)->execute($slug);

        return view('admin.fakultas.edit', [
            'fakultas' => $fakultas
        ]);
    }

    function update($slug, FakultasUpdateRequest $request)
    {
        try {
            $fakultas = app(GetFakultasBySlug::class)->execute($slug);

            app(UpdateFakultas::class)->execute($fakultas, $request);

            return redirect()
                ->route('admin.fakultas', $fakultas->kampus->slug)
                ->with('success', 'Fakultas ' . $fakultas->nama . ' Berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back('error', $e->getMessage());
        }
    }

    function delete($slug)
    {
        try {
            $fakultas = app(GetFakultasBySlug::class)->execute($slug);

            $data = $fakultas->delete();
            if ($data) {
                $fakultas->jurusan()->delete();
            }

            return redirect()
                ->route('admin.fakultas', $fakultas->kampus->slug)
                ->with('success', 'fakultas ' . $fakultas->nama . ' berhasil didelete');
        } catch (\Exception $e) {
            return redirect()->back('error', $e->getMessage());
        }
    }

    function history($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        $fakultas = $kampus->fakultas()->onlyTrashed()->get();

        return view('admin.fakultas.history', [
            'kampus' => $kampus,
            'fakultases' => $fakultas,
        ]);
    }

    function restore($slug)
    {
        try {
            $fakultas = app(GetHistoryFakultasBySlug::class)->execute($slug);

            if ($fakultas) {
                $fakultas->restore();
                $fakultas->Jurusan()->restore();
            }

            return redirect()
                ->back()
                ->with('success', 'Fakultas ' . $fakultas->nama . 'berhasil di restore');
        } catch (\Exception $e) {
            return redirect()->back('error', $e->getMessage());
        }
    }

    function forceDelete($slug)
    {
        try {
            $fakultas = app(GetHistoryFakultasBySlug::class)->execute($slug);

            if ($fakultas) {
                $fakultas->forceDelete();
                $fakultas->Jurusan()->forceDelete();
            }
            
            return redirect()
                ->back()
                ->with('success', 'Fakultas ' . $fakultas->nama . ' berhasil di hapus permanen');
        } catch (\Exception $e) {
            return redirect()->back('error', $e->getMessage());
        }
    }
}
