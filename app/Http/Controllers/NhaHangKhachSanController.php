<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateNhaHangKhachSanRequest;
use App\Models\DanhMuc;
use App\Models\NhaHangKhachSan;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NhaHangKhachSanController extends Controller
{

    public function index($slug)
    {
        $viTri = '';
        for ($i = strlen($slug) - 1; $i >= 0; $i--) {
            if ($slug[$i] == '-') {
                $viTri = $i;
                break;
            }
        }

        $id = Str::substr($slug, $viTri + 1, strlen($slug) - $viTri);

        $data = NhaHangKhachSan::find($id);

        $list_review = Review::where('nha_hang_khach_san_id', $id)->where('is_open', 1)->paginate(5);;

        return view('HomePage.Page.NhaHangKhachSan.index', compact('data', 'list_review'));
    }


    public function review(Request $request)
    {
        $customer = Auth::guard('customer')->user(); // lấy thông tin customer đang login

        if ($customer) {

            $data = $request->all();

            $data['customer_id'] = $customer->id;

            Review::create($data);

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }

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

    public function listNhaHang()
    {
        $list = NhaHangKhachSan::join('danh_mucs', 'nha_hang_khach_sans.danh_muc_id', '=', 'danh_mucs.id')
                        ->where('danh_mucs.loai_danh_muc', 1)
                        ->select('nha_hang_khach_sans.*', 'danh_mucs.loai_danh_muc')
                        ->paginate(21);
        return view('HomePage.Page.NhaHangKhachSan.list', compact('list'));
    }
    public function listKhachSan()
    {
        $list = NhaHangKhachSan::join('danh_mucs', 'nha_hang_khach_sans.danh_muc_id', '=', 'danh_mucs.id')
                        ->where('danh_mucs.loai_danh_muc', 2)
                        ->select('nha_hang_khach_sans.*', 'danh_mucs.loai_danh_muc')
                        ->paginate(21);
        return view('HomePage.Page.NhaHangKhachSan.list', compact('list'));
    }


}
