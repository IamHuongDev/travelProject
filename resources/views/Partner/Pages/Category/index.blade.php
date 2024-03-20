@extends('Partner.Master')

@section('content')
    <div class="row">
        <div class="col-md-4 col-12">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới Danh Mục</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="/partner/category">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên danh mục:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Icon:</label>
                            <div class="col-sm-9">
                                <input type="text" name="icon" class="form-control" placeholder="Nhập icon">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Thể loại:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type">
                                    <option selected disabled>Vui lòng chọn thể loại</option>
                                    <option value=1>Nhà hàng</option>
                                    <option value=2>Khách sạn</option>
                                    <option value=3>Địa điểm</option>
                                    <option value=4>Shopping</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tình trạng:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1>Hoạt động</option>
                                    <option value=0>Dừng hoạt động</option>
                                </select>
                            </div>
                        </div>

                        <!-- Add New button -->
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-sm btn-success"><i class="ri-add-fill"></i><span
                                        class="pl-1">Thêm mới</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách danh mục</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Slug</th>
                                    <th>Thể loại</th>
                                    <th>Tình trạng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            @php
                                $arr = ['Nhà hàng','Khách sạn','Địa điểm','shopping'];
                                $arrCol = ['','text-primary','text-danger','text-success','text-warning'];
                            @endphp
                            <tbody>

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
                                @endforeach


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
