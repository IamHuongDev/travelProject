<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateNhaHangKhachSanRequest;
use App\Models\DanhMuc;
use App\Models\NhaHangKhachSan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhaHangKhachSanController extends Controller
{

    public function index($slug)
    {
        $viTri = '';
        for($i = strlen($slug) - 1 ; $i >= 0; $i--){
            if($slug[$i] == '-'){
                $viTri = $i;
                break;
            }
        }

        $id = Str::substr($slug, $viTri + 1, strlen($slug) - $viTri);

        $data = NhaHangKhachSan::find($id);

        return view('HomePage.Page.NhaHangKhachSan.index', compact('data'));


    }

    public function review(Request $request)
    {
        $data = $request->all();

        Review::create($data);

        return response()->json(['status' => true]);
    }

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
