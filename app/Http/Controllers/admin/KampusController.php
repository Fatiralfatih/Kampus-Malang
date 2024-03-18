<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateFakultas;
use App\Action\CreateGambarKampus;
use App\Action\CreateKampus;
use App\action\CreateKontak;
use App\Action\DeleteKampus;
use App\Action\GetHistoryKampusBySlug;
use App\Action\GetKampusBySlug;
use App\Action\GetPaginatedKampus;
use App\Action\RestoreKampus;
use App\Action\UpdateKampus;
use App\Models\Kampus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\KampusStoreRequest;
use App\Http\Requests\KampusUpdateRequest;

class KampusController extends Controller
{
    function index()
    {
        $kampus = app(GetPaginatedKampus::class)->execute();

        return view('admin.kampus.index', [
            'kampuses' => $kampus
        ]);
    }

    function favorit($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);
        $kampus->update([
            'isFavorit' => 1
        ]);

        return redirect()->back()->with('success', 'Berhasil jadikan kampus terfavorit dan terpopuler');
    }

    function nonFavorit($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        $kampus->update([
            'isFavorit' => 0
        ]);

        return redirect()->back()->with('success', 'Berhasil menghapus kampus terfavorit dan terpopuler');
    }

    function create()
    {
        return view('admin.kampus.create');
    }

    function store(KampusStoreRequest $request)
    {
        try {
            $kampus = app(CreateKampus::class)->execute($request);

            app(CreateKontak::class)->execute($request, $kampus);

            app(CreateFakultas::class)->execute($request, $kampus);

            app(CreateGambarKampus::class)->execute($request['gambar']->store('gambar/kampus'), $kampus);

            return redirect()->route('admin.kampus')->with('success', 'kampus berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function edit($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        return view('admin.kampus.edit', [
            'kampus' => $kampus,
        ]);
    }

    function update($slug, KampusUpdateRequest $request)
    {
        try {
            $kampus = app(GetKampusBySlug::class)->execute($slug);

            app(UpdateKampus::class)->execute($request, $kampus);

            return redirect()->route('admin.kampus')->with('success', 'Kampus berhasil di update');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function delete($slug)
    {
        try {
            $kampus = app(GetKampusBySlug::class)->execute($slug);

            app(DeleteKampus::class)->execute($kampus);

            return redirect()->route('admin.kampus')->with('success', 'kampus ' . $kampus->nama . ' berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function history()
    {
        $kampus = Kampus::onlyTrashed()->paginate(10);

        return view('admin.kampus.history', [
            'kampuses' => $kampus
        ]);
    }

    function restore($slug)
    {
        try {

            $slugKampus = app(GetHistoryKampusBySlug::class)->execute($slug);

            app(RestoreKampus::class)->execute($slugKampus);

            return redirect()->back()->with('success', 'Data kampus' . $slugKampus->nama . 'Berhasil di restore');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function forceDelete($slug)
    {
        try {
            $kampus = app(GetHistoryKampusBySlug::class)->execute($slug);

            if ($kampus->gambar) {
                foreach ($kampus->Gambar as $gambar) {
                    Storage::delete($gambar->gambar);
                }
            }
            $kampus->forceDelete();

            return redirect()->back()->with('success', 'kampus ' . $kampus->nama . ' berhasil dihapus permanen');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
