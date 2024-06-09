<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateLoaiSanPhamRequest;
use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiSanPhamController extends Controller
{
    public function index(){
        return view('Admin.Pages.LoaiSanPham.index');
    }

    public function store(CreateLoaiSanPhamRequest $request)
    {
        $data = $request->all();

        $data['slug_loai_san_pham'] = Str::slug($data['ten_loai_san_pham']);

        LoaiSanPham::create($data);

        return response()->json(['data' => true]);
    }

    public function listRoot()
    {
        $data = LoaiSanPham::where('loai_san_pham_id', 0)->get();

        return response()->json(['listRoot' => $data]);
    }


    //hiển thị ra table
    public function listAll()
    {
        $data = LoaiSanPham::leftJoin('loai_san_phams as new', 'loai_san_phams.loai_san_pham_id', '=', 'new.id')
                        ->select('loai_san_phams.*', 'new.ten_loai_san_pham as tenCha')
                        ->get();

        return response()->json(['listAll' => $data]);
    }

    public function destroy($id)
    {
        $data = LoaiSanPham::find($id);

        if($data) {
            $data->delete();

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }

    }

    public function edit($id) {
        $data = LoaiSanPham::find($id);

        if($data){
            return response()->json(['status' => true, 'data' => $data]);
        }else {
            return response()->json(['status' => false,'data' => $data]);
        }
    }



}
