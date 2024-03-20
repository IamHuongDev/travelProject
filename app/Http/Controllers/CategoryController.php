<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Partner\CreateCategoryRequest;
use App\Http\Requests\Partner\UpdateCategoryRequest;
use Illuminate\Support\ServiceProvider;
use Brian2694\Toastr\Facades\Toastr;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

        return view('Partner.Pages.Category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {

        // CÁCH 1
        // $name       = $request->name;
        // $slug       = Str::slug($request->name);
        // $type       = $request->type;
        // $status     = $request->status;

        // Category::create([
        //     'name'          => $name,
        //     'slug'          => $slug,
        //     'type'          => $type,
        //     'status'        => $status,
        // ]);


        $data = $request->all();  // nếu lấy tất cả các dữ liệu trong request
        $data['slug'] = Str::slug($request->name);

        Category::create($data);
        toastr()->success("Đã thêm thành công");
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);

        if($data) {
            toastr()->success("chỉnh sửa loại sản phẩm");
            return view('Partner.Pages.Category.update',compact('data'));
        } else {
            toastr()->error("Mã sản phẩm không tồn tại, không thể update");
            // return redirect()->back(); // để lùi về
            // return $this->index(); // đỡ khỏi compact lại
            return redirect('/partner/category');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request)
    {
        $index = Category::find($request->id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $index->update($data);

        toastr()->success("Đã cập nhật thành công");
        return redirect('/partner/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $index = Category::find($id);

        if($index) {
            $index->delete();
            toastr()->success("Đã xoá sản phẩm thành công");
        } else {
            toastr()->error("Mã sản phẩm không tồn tại, không thể delete");
        }
        return redirect('/partner/category');
    }
}
