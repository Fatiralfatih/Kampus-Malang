<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kampus;
use App\Models\User;

class DashboardController extends Controller
{
    function dashboard()
    {
        $userCount = User::where('role', 'member')->with('pendaftaran')->get();
        $kampusCount = Kampus::count();
        foreach ($userCount->flatMap->pendaftaran as $pendaftaran) {
            $mahasiswaCount = $pendaftaran->pivot->count();
        }
        return view('admin.dashboard', [
            'usersCount' => $userCount,
            'kampusCount' => $kampusCount,
            'mahasiswaCount' => $mahasiswaCount,
        ]);
    }
}
