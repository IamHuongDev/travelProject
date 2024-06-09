<?php

namespace App\Http\Controllers;

use App\Models\NhaHangKhachSan;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('HomePage.Page.Index.index');
    }

    public function viewSearch(Request $request)
    {
        $list = NhaHangKhachSan::join('danh_mucs', 'nha_hang_khach_sans.danh_muc_id', '=', 'danh_mucs.id')
            ->where(function ($query) use ($request) {
                $query->where('nha_hang_khach_sans.name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('nha_hang_khach_sans.mo_ta_ngan', 'like', '%' . $request->keyword . '%')
                    ->orWhere('nha_hang_khach_sans.dia_chi', 'like', '%' . $request->keyword . '%');
            })
            ->select('nha_hang_khach_sans.*', 'danh_mucs.loai_danh_muc')
            ->paginate(21);

        return view('HomePage.Page.NhaHangKhachSan.list', compact('list'));


    }


}
