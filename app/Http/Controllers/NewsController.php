<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Partner\CreateNewsRequest;
use App\Http\Requests\Partner\UpdateNewsRequest;
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
        // return view('Partner.Pages.News.indexLan2');
        return view('Partner.Pages.News.index');
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


    public function storeAjax(CreateNewsRequest $request){
        $data = $request->all();
        $data['slug'] = Str::slug($request->tieuDe);

        News::create($data);

        return response()->json(['trangThai' => true]);

    }


    public function findTitle(Request $request)
    {
        $tieuDe = $request->tieuDe;
        $slug = Str::slug($tieuDe);

        $data =  News::where('slug', $slug)->first();

        if($data){
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
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


    public function editAjax($id)
    {
        $data = News::find($id);

        if($data){
            return response()->json(['trangThai' => true, 'data' => $data]);
        }else{
            return response()->json(['trangThai' => false]);
        }

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


    public function updateAjax(UpdateNewsRequest  $request)
    {
        $data = $request->all(); // data những gì người ta gửi lên
        $news = News::find($request->id); // news là tin tưc dựa vào id mà đã gửi lên

        $news->update($data);

        return response()->json(['trangThai' => true]);
        // dd($request->toArray() );

    }


    public function changeOpen($id)
    {
        $news = News::find($id);

        if($news){
            // cách 1
            // if($news->is_open == 1){
            //     $news->is_open = 0;
            // } else {
            //     $news->is_open = 1;
            // }

            // $news->save();


            // cách 2
            $news->is_open = !$news->is_open;

            $news->save();

            return response()->json(['trangThai' => true]);
        } else {
            return response()->json(['trangThai' => false]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);

        if($new){
            toastr()->success("Đã xoá tin tức thành công");
            $new->delete();
        }else {
            toatr()->error("Tin tức không tồn tại");
        }

        return redirect('/parnert/new/ajax');
    }

    public function destroyAjax($id)
    {
        $new = News::find($id);

        if($new){
            $new->delete();

            return response()->json(['trangThai' => true]);
        } else {
            return response()->json(['trangThai' => false]);
        }
    }

}
