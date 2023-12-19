<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateFakultas;
use App\Action\UpdateFakultasBySlug;
use App\Models\Kampus;
use App\Models\Fakultas;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\FakultasStoreRequest;
use App\Http\Requests\FakultasUpdateRequest;

class FakultasController extends Controller
{

    function navItem(Kampus $kampus)
    {

        return view('admin.fakultas.navItem', [
            'kampus' => $kampus,
        ]);
    }

    function create(Kampus $kampus)
    {
        return view('admin.fakultas.create', [
            'kampus' => $kampus,
        ]);
    }

    function store(FakultasStoreRequest $request, Kampus $kampus)
    {
        try {
            app(CreateFakultas::class)->execute($request, $kampus);

            return redirect()->route('admin.fakultas', ['kampus' => $kampus->slug])->with('success', 'kampus ' . $kampus->nama . ' berhasil ditambahkan fakultas ' . $request->nama);
        } catch (\Exception $e) {
            return redirect()->back('error', 'failed: data gagal ditambahkan');
        }
    }

    function edit(Fakultas $fakultas)
    {
        return view('admin.fakultas.edit', [
            'fakultas' => $fakultas
        ]);
    }

    function update(FakultasUpdateRequest $request, Fakultas $fakultas)
    {
        try {
            app(UpdateFakultasBySlug::class)->execute($request, $fakultas);
            return redirect()->route('admin.fakultas', ['kampus' => $fakultas->kampus->slug])->with('success', 'Fakultas ' . $fakultas->nama .  ' kampus ' . $fakultas->kampus->nama . ' berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back('error', 'failed: data gagal diupdate');
        }
    }

    function delete(Fakultas $fakultas)
    {
        try {
            $data = $fakultas->delete();
            if ($data) {
                $fakultas->jurusan()->delete();
            }
            return redirect()->route('admin.fakultas', ['kampus' => $fakultas->kampus->slug])->with('success', 'fakultas ' . $fakultas->nama . ' dari kampus ' . $fakultas->Kampus->nama  . ' berhasil di delete');
        } catch (\Exception $e) {
            return redirect()->back('error', 'failed: data gagal didelete');
        }
    }

    function history(Kampus $kampus)
    {
        $fakultas = $kampus->fakultas()->onlyTrashed()->get();
        return view('admin.fakultas.history', [
            'fakultases' => $fakultas,
            'kampus' => $kampus,
        ]);
    }

    function restore($slug)
    {
        try {
            $fakultas = Fakultas::Where('slug', $slug)->withTrashed()->firstOrFail();
            if ($fakultas) {
                $fakultas->restore();
                $fakultas->Jurusan()->restore();
            }
            return redirect()->back()->with('success', 'Fakultas ' . $fakultas->nama . 'berhasil di restore');
        } catch (\Exception $e) {
            return redirect()->back('error', 'failed: data gagal direstore');
        }
    }

    function forceDelete($id)
    {
        try {
            $fakultas = Fakultas::where('id', $id)->withTrashed()->firstOrFail();
            if ($fakultas) {
                $fakultas->forceDelete();
                $fakultas->Jurusan()->forceDelete();
            }
            return redirect()->back()->with('success', 'Fakultas ' . $fakultas->nama . ' berhasil di hapus permanen');
        } catch (\Exception $e) {
            return redirect()->back('error', 'failed: data gagal dihapus permanen');
        }
    }
}
