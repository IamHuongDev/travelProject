<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateThanhPhoRequest;
use App\Http\Requests\Admin\UpdateThanhPhoRequest;
use App\Models\ThanhPho;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThanhPhoController extends Controller
{

    public function index(Request $request)
    {
        $list = ThanhPho::all();

        $thanhPho = null;

        if (!empty($request->id)) {
            $thanhPho = ThanhPho::find($request->id);
        }

        return view('Admin.Pages.ThanhPho.index', compact('list', 'thanhPho'));
    }

    public function store(CreateThanhPhoRequest $request)
    {
        $data = $request->all(); // trả vể 1 array $data['name']

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        ThanhPho::create($data);

        toastr()->success('Đã thêm mới thành phố thành công');

        return redirect('/admin/thanh-pho');
    }


    public function show(ThanhPho $thanhPho)
    {

    }


    public function edit(ThanhPho $thanhPho)
    {
        //
    }


    public function update(UpdateThanhPhoRequest $request)
    {
        $data = $request->all();

        $thanhPho = ThanhPho::find($request->id);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $thanhPho->update($data);

        toastr()->success('Đã cập nhật thành phố thành công');

        return redirect('/admin/thanh-pho');

    }


    public function destroy($id)
    {
        $thanhPho = ThanhPho::find($id);

        if ($thanhPho) {
            $thanhPho->delete();

            toastr()->success('Đã xóa thành phố thành công');
        } else {
            toastr()->error('Thành phố không tồn tại');
        }

        return redirect('/admin/thanh-pho');
    }
}
