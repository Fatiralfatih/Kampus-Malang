<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateFakultas;
use App\Action\CreateKampus;
use App\action\CreateKontak;
use App\Action\DeleteKampusBySlug;
use App\Action\RestoreKampusById;
use App\Action\UpdateKampusBySlug;
use App\Models\Kampus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\KampusStoreRequest;
use App\Http\Requests\KampusUpdateRequest;
use App\Models\Jurusan;

class KampusController extends Controller
{
    function index()
    {
        $kampus = Kampus::select(['id', 'nama', 'alamat', 'kategori', 'slug'])
            ->withCount(['Fakultas', 'jurusan'])
            ->orderBy('kategori', 'desc')
            ->paginate(10);

        return view('admin.kampus.index', [
            'kampuses' => $kampus
        ]);
    }

    function show(Kampus $kampus)
    {
        $dataKampus = $kampus->load(['kontak', 'gambar']);
        $fakultas = $kampus->Fakultas()->with(['jurusan'])->get();
        return view('admin.kampus.show', [
            'kampus' => $dataKampus,
            'fakultases' => $fakultas,
        ]);
    }

    function create()
    {
        return view('admin.kampus.create');
    }

    function store(KampusStoreRequest $request)
    {
        try {
            $kampus = app(CreateKampus::class)->execute($request);
            $fakultas = app(CreateKontak::class)->execute($request, $kampus);
            return $fakultas;
            app(CreateFakultas::class)->execute($request, $kampus);
            return redirect()->route('admin.kampus')->with('success', 'kampus berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: data gagal ditambahkan');
        }
    }

    function edit(Kampus $kampus)
    {
        return view('admin.kampus.edit', [
            'kampus' =>  $kampus,
        ]);
    }

    function update(KampusUpdateRequest $request, Kampus $kampus,)
    {
        try {
            app(UpdateKampusBySlug::class)->execute($request, $kampus);

            return redirect()->route('admin.kampus')->with('success', 'Kampus berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: data gagal diupdate');
        }
    }

    function delete(Kampus $kampus)
    {
        try {
            app(DeleteKampusBySlug::class)->execute($kampus);
            return redirect()->route('admin.kampus')->with('error', 'kampus ' . $kampus->nama . ' berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: data gagal dihapus');
        }
    }

    function history()
    {
        $kampus = Kampus::onlyTrashed()->paginate(10);
        return view('admin.kampus.history', [
            'kampuses' => $kampus
        ]);
    }

    function restore($id)
    {
        try {

            $kampusId = Kampus::where('id', $id)->withTrashed()->firstOrFail();
            app(RestoreKampusById::class)->execute($kampusId);

            return redirect()->back()->with('success', 'Data kampus' . $kampusId->nama . 'Berhasil di restore');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'error', 'Failed: data gagal direstore');
        }
    }

    function forceDelete($id)
    {
        try {
            $kampus = Kampus::where('id', $id)->withTrashed()->firstOrFail();
            if ($kampus->gambar) {
                foreach ($kampus->Gambar as $gambar) {
                    Storage::delete($gambar->gambar);
                }
            }
            $kampus->forceDelete();
            return redirect()->back()->with('error', 'kampus ' . $kampus->nama . ' berhasil dihapus permanen');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'error', 'Failed: data gagal dihapus permanen');
        }
    }
}
