<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Partner\CreateNewsRequest;
// use App\Http\Requests\Partner\UpdateCategoryRequest;
use Illuminate\Support\ServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = News::all();

        return view('Partner.Pages.News.indexLan1');
    }


    public function indexAjax(){
        return view('Partner.Pages.News.indexLan2');
    }

    public function showAjax(){
        $data = News::all();

        return response()->json(['data' => $data]);
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
    public function store(CreateNewsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->tieuDe);

        if ($request->hasFile('hinhAnh')) {
            $file = $request->file('hinhAnh');

            $duoiFile = $file->getClientOriginalExtension();

            $current_date_time = time(); // Sử dụng time() thay vì timestamp

            $tenFile = $data['slug'] . '-' . $current_date_time . '.' . $duoiFile; // Sửa từ data['slug'] thành $data['slug']

            $file->move('upload', $tenFile);

            $data['hinhAnh'] = '/upload/' . $tenFile;

            News::create($data);

            toastr()->success('Đã thêm mới thành công');

            return redirect('/partner/new');

        } else {
            toastr()->error('Yêu cầu upload file');
            return redirect('/partner/new');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
