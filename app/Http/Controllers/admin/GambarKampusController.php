<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GambarKampusRequest;
use App\Models\GambarKampus;
use App\Models\Kampus;
use Illuminate\Support\Facades\Storage;

class GambarKampusController extends Controller
{

    function navItem(Kampus $kampus)
    {
        return view('admin.kampus.gambar.navItem', [
            'kampus' => $kampus,
        ]);
    }

    function store(GambarKampusRequest $request, Kampus $kampus)
    {
        foreach ($request->gambar as $gambar) {
            $kampus->Gambar()->create([
                'gambar' => $gambar->store('gambar/kampus')
            ]);
        }

        return redirect()->back()->with('success', 'Gambar ' . $kampus->nama . ' Berhasil di tambahkan');
    }

    function update(GambarKampusRequest $request, $id)
    {
        $gambar = GambarKampus::where('id', $id)->firstOrFail();
        if ($gambar) {
            Storage::delete($gambar->gambar);
            $gambar->update([
                'gambar' => $request->gambar->store('gambar/kampus')
            ]);
        }


        return redirect()->back()->with('success', 'Gambar ' . $gambar->kampus->nama . ' Berhasil di update');
    }

    function delete($id)
    {
        $gambar = GambarKampus::where('id', $id)->firstOrFail();
        $gambar->delete();

        return redirect()->back()->with('success', 'Gambar ' . $gambar->kampus->nama . ' Berhasil dihapus');
    }

    function history(Kampus $kampus)
    {
        $historyGambar = $kampus->Gambar()->onlyTrashed()->get();
        return view('admin.kampus.gambar.history', [
            'gambars' => $historyGambar,
            'kampus' => $kampus,
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
