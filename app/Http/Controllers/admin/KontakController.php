<?php

namespace App\Http\Controllers\admin;

use App\action\CreateKontak;
use App\Action\GetKampusBySlug;
use App\Action\UpdateKontak;
use App\Http\Controllers\Controller;
use App\Http\Requests\KampusKontakStoreRequest;
use App\Http\Requests\KampusUpdateKontakRequest;
class KontakController extends Controller
{

    function navItem($slug)
    {

        $kampus = app(GetKampusBySlug::class)->execute($slug);

        return view('admin.kampus.kontak.navItem', [
            'kampus' => $kampus,
        ]);
    }

    function store($slug, KampusKontakStoreRequest $request)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        app(CreateKontak::class)->execute($request, $kampus);

        return redirect()->back()->with('success', 'Kampus berhasil di tambah kontak');
    }

    function update($slug, KampusUpdateKontakRequest $request)
    {
        $kampus = app(GetKampusBySlug::class)->execute($slug);

        app(UpdateKontak::class)->execute($kampus, $request);

        return redirect()->back()->with('success', 'Kampus berhasil di update kontak');
    }
}
