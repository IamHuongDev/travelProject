<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateDanhMucRequest;
use App\Http\Requests\Admin\UpdateDanhMucRequest;
use App\Models\DanhMuc;
use App\Models\ThanhPho;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DanhMucController extends Controller
{

    public function index()
    {
        $thanhPho = ThanhPho::where('is_open',1 )->get();

        $danhMuc = DanhMuc::all();

        return view('Admin.Pages.DanhMuc.index',compact('thanhPho','danhMuc'));
    }


    public function store(CreateDanhMucRequest $request)
    {
        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        DanhMuc::create($data);

        toastr()->success('Đã thêm mới danh mục thành công');

        return redirect('/admin/danh-muc');
    }

    public function update(UpdateDanhMucRequest $request)
    {
        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $danhMuc = DanhMuc::find($data['id']);
        $danhMuc->update($data);

        toastr()->success('Đã cập nhật danh mục thành công');

        return redirect('/admin/danh-muc');
    }

    public function destroy(DanhMuc $danhMuc)
    {

    }
}
