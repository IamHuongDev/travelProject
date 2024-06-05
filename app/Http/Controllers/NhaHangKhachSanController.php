<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateNhaHangKhachSanRequest;
use App\Models\DanhMuc;
use App\Models\NhaHangKhachSan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhaHangKhachSanController extends Controller
{


    public function create()
    {
        $danhMuc = DanhMuc::all();

        return view('Admin.Pages.NhaHangKhachSan.create', compact('danhMuc'));
    }


    public function store(CreateNhaHangKhachSanRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $res = NhaHangKhachSan::create($data);

        return response()->json(['status' => true]);
    }

       public function show(NhaHangKhachSan $nhaHangKhachSan)
    {
        //
    }

        public function edit(NhaHangKhachSan $nhaHangKhachSan)
    {
        //
    }

       public function update(Request $request, NhaHangKhachSan $nhaHangKhachSan)
    {
        //
    }

        public function destroy(NhaHangKhachSan $nhaHangKhachSan)
    {
        //
    }
}
