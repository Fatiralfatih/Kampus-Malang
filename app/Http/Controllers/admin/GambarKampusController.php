<?php

namespace App\Http\Controllers\admin;

use App\Action\CreateGambarKampus;
use App\Action\CreateThumbnailKampus;
use App\Action\GetGambarKampusById;
use App\Action\GetKampusBySlug;
use App\Http\Controllers\Controller;
use App\Http\Requests\GambarKampusRequest;
use App\Models\GambarKampus;
use App\Models\Kampus;
use Illuminate\Support\Facades\Storage;

class GambarKampusController extends Controller
{

    function navItem($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);
        return view('admin.kampus.gambar.navItem', [
            'kampus' => $kampus,
        ]);
    }

    // function thumbnail($slug, GambarKampusRequest $request)
    // {
    //     $kampus = app(GetKampusBySlug::class)->execute($slug);

    //     app(CreateThumbnailKampus::class)->execute($kampus, $request['thumbnail_id']);

    //     return redirect()->back()->with('success', 'berhasil jadikan thumbnail');
    // }

    function store($slug, GambarKampusRequest $request)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        app(CreateGambarKampus::class)->execute($request['gambar'], $kampus);

        return redirect()->back()->with('success', 'Gambar Berhasil di tambahkan');
    }

    function update($id, GambarKampusRequest $request)
    {
        $gambar = app(GetGambarKampusById::class)->execute($id);


        if ($gambar) {
            Storage::delete($gambar->gambar);
            $gambar->update([
                'gambar' => $request->gambar->store('gambar/kampus')
            ]);
        }

        return redirect()->back()->with('success', 'Gambar Berhasil di update');
    }

    function delete($id)
    {
        $gambar = app(GetGambarKampusById::class)->execute($id);

        $gambar->delete();

        return redirect()->back()->with('success', 'Gambar Berhasil dihapus');
    }

    function history($slug)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        $gambar = $kampus->gambar()->onlyTrashed()->get();

        return view('admin.kampus.gambar.history', [
            'kampus' => $kampus,
            'gambars' => $gambar
        ]);
    }

    function restore($id)
    {
        $gambar = GambarKampus::where('id', $id)->onlyTrashed()->firstOrFail();

        $gambar->restore();

        return redirect()->back()->with('success', 'gambar berhasil direstore');
    }

    function forceDelete($id)
    {
        $gambar = GambarKampus::where("id", $id)->onlyTrashed()->firstOrfail();
        if ($gambar) {
            Storage::delete($gambar->gambar);
        }
        $gambar->forceDelete();

        return redirect()->back()->with('success', 'gambar berhasil dihapus permanen');
    }
}
