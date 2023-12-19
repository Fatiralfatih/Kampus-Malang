<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KampusKontakStoreRequest;
use App\Http\Requests\KampusUpdateKontakRequest;
use App\Models\Kampus;

class KontakController extends Controller
{

    function navItem(Kampus $kampus) {
        return view('admin.kampus.kontak.navItem',[
            'kampus' => $kampus,
        ]);
    }

    function store( Kampus $kampus, KampusKontakStoreRequest $request)
    {
        $kampus->Kontak()->create([
            'email' => $request->email,
            'telepon' => $request->telepon,
            'whatsapp' => $request->whatsapp
        ]);

        return redirect()->back()->with('success', 'Kampus ' . $kampus->nama . ' berhasil di tambah kontak');
    }

    function update(Kampus $kampus, KampusUpdateKontakRequest $request)
    {
        $kampus->Kontak()->update([
            'email' => $request->email,
            'telepon' => $request->telepon,
            'whatsapp' => $request->whatsapp
        ]);

        return redirect()->back()->with('success', 'Kampus ' . $kampus->nama . ' berhasil di update kontak');
    }
}
