<?php

namespace App\Http\Controllers\admin;

use App\Action\UpdateMemberStatusById;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberStatusRequest;
use App\Models\User;

class MemberController extends Controller
{
    function index()
    {
        $user = User::where('role', 'member')->get();
        return view('admin.member.index', [
            'users' => $user,
        ]);
    }

    function aktif(UpdateMemberStatusRequest $request, $id)
    {
        try {

            app(UpdateMemberStatusById::class)->execute($request->status, $id);

            return redirect()->back()->with('success', 'member berhasil di diaktifkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: Data Gagal di ubah!!');
        }
    }

    function nonaktif(UpdateMemberStatusRequest $request, $id)
    {
        try {

            app(UpdateMemberStatusById::class)->execute($request->status, $id);

            return redirect()->back()->with('success', 'member berhasil di nonaktifkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: Data Gagal di ubah!!');
        }
    }
}
