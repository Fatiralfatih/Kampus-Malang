<?php

namespace App\Http\Controllers\admin;

use App\Action\GetRoleMemberUser;
use App\Action\GetUserById;
use App\Action\UpdateMemberStatusById;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberStatusRequest;

class MemberController extends Controller
{
    function index()
    {
        $user = app(GetRoleMemberUser::class)->execute();
        return view('admin.member.index', [
            'users' => $user,
        ]);
    }

    function aktif(UpdateMemberStatusRequest $request, $id)
    {
        try {
            $user = app(GetUserById::class)->execute($id);
            app(UpdateMemberStatusById::class)->execute($request->status, $user);

            return redirect()->back()->with('success', 'member berhasil di diaktifkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: Data Gagal di ubah!!');
        }
    }

    function nonaktif(UpdateMemberStatusRequest $request, $id)
    {
        try {
            $user = app(GetUserById::class)->execute($id);
            app(UpdateMemberStatusById::class)->execute($request->status, $user);

            return redirect()->back()->with('success', 'member berhasil di nonaktifkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed: Data Gagal di ubah!!');
        }
    }
}
