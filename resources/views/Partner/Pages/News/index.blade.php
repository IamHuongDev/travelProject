@extends('Partner.Master')

@section('content')
    <div class="row">
        <div class="col-md-4 col-12">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới bài viết</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="/partner/category">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 col-form-label">Tiêu đề</label>
                            <input type="text" name="tieuDe" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label >Slug</label>
                            <input type="text" class="form-control" disabled="" value="" name="slug">
                         </div>
                         <div class="form-group">
                            <label >Tóm tắt</label>
                            <textarea class="form-control" rows="5" name="tomTat"></textarea>
                         </div>
                         <div class="form-group">
                            <label >Nội dung</label>
                            <textarea class="form-control" rows="5" name="noiDung"></textarea>
                         </div>
                        <div class="form-group">
                            <label >Chuyên mục</label>
                            <select class="form-control" name="chuyenMuc">
                                <option selected disabled>Vui lòng chọn chuyên mục</option>
                                <option value=1>Địa điểm</option>
                                <option value=2>Giới thiệu</option>
                                <option value=3>Quảng cáo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Is open</label>
                            <select class="form-control" name="is_open">
                                <option selected disabled>Vui lòng chọn tình trạng</option>
                                <option value=1>Hoạt động</option>
                                <option value=0>Dừng hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Hình ảnh</label>
                            <input type="file" class="form-control-file" name="hinhAnh">
                         </div>
                        <!-- Add New button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-block"><i class="ri-add-fill"></i><span class="pl-1">Thêm mới</span></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách bài viết</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Slug</th>
                                    <th>Hình ảnh</th>
                                    <th>Tóm tắt</th>
                                    <th>Nội dung</th>
                                    <th>Chuyên mục</th>
                                    <th>Is open</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            {{-- @php
                                $arr = ['Nhà hàng','Khách sạn','Địa điểm','shopping'];
                                $arrCol = ['','text-primary','text-danger','text-success','text-warning'];
                            @endphp --}}
                            <tbody>
{{--
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td contenteditable="true">{{ $key + 1 }}</td>
                                        <td contenteditable="true">{{ $value->name }}</td>
                                        <td contenteditable="true">{{ $value->slug }}</td>
                                        <td contenteditable="true" class="{{$arrCol[$value->type]}}">
                                            {{$arr[$value->type]}}
                                        </td>
                                        <td contenteditable="true" >
                                            {{ $value->status == 0 ? 'Dừng hoạt động' : 'Hoạt động' }}</td>
                                        <td>
                                            <a href="/partner/category/edit/{{ $value->id }}"
                                                class="btn btn-success btn-rounded btn-sm">Sửa</a>
                                            <a href="/partner/category/delete/{{ $value->id }}" class="btn btn-danger btn-rounded btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Any JavaScript specific to this view can be included here -->
@endsection
