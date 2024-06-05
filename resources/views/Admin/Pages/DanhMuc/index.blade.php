@extends('Admin.Master')

@section('content')
    <div class="row">
        <div class="col">
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
                                    <th>Tên tên danh mục</th>
                                    <th>Slug</th>
                                    <th>Loại danh mục</th>
                                    <th>Thành phố</th>
                                    <th>Chế độ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @php
                                $arr = ['','Nhà hàng', 'Shopping', 'Hotels', 'Địa điểm'];
                            @endphp
                            <tbody>
                                @foreach ($danhMuc as $key => $value)
                                    <tr>
                                        <td contenteditable="true">{{ $key + 1 }}</td>
                                        <td contenteditable="true">{{ $value->name }}</td>
                                        <td contenteditable="true">{{ $value->slug }}</td>
                                        <td contenteditable="true">{{ $arr[$value->loai_danh_muc] }}</td>
                                        <td contenteditable="true">{{ $value->tenThanhPho->name }}</td>
                                        <td contenteditable="true">
                                            {{ $value->is_open == 1 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                        <td class="text-nowrap">
                                            <a href="/admin/danh-muc?id={{ $value->id }}"
                                                class="btn btn-primary btn-rounded btn-sm">Sửa</a>
                                            <a href="/admin/danh-muc/delete/{{ $value->id }}"
                                                class="btn btn-danger btn-rounded btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới danh mục</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" action="/admin/danh-muc/create" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label class="col-form-label">Tên danh mục:</label>
                            <div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nhập tên tên danh mục">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Slug muốn tạo:</label>
                            <div>
                                <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Chế độ:</label>
                            <div>
                                <select class="form-control" name="is_open">
                                    <option selected disabled>Vui lòng chọn chế độ</option>
                                    <option value=1>Hiển thị</option>
                                    <option value=0>Không hiển thị</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Loại danh mục:</label>
                            <div>
                                <select class="form-control" name="loai_danh_muc">
                                    <option selected disabled>Vui lòng chọn danh mục</option>
                                    <option value=1>Nhà Hàng</option>
                                    <option value=2>Shopping</option>
                                    <option value=3>Hotels</option>
                                    <option value=4>Địa điểm</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Chọn thành phố:</label>
                            <div>
                                <select class="form-control" name="thanh_pho_id">
                                    <option selected disabled>Vui lòng chọn thành phố</option>
                                    @foreach ($thanhPho as $key => $value)
                                        <option value={{ $value->id }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Add New button -->
                        <div class="form-group ">
                            <div class="offset-sm-3">
                                <button type="submit" class="btn btn-sm btn-success"><i class="ri-add-fill"></i><span
                                        class="pl-1">Thêm mới</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Chỉnh sửa danh mục</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" action="/admin/danh-muc/update" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label class="col-form-label">Tên danh mục:</label>
                            <div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nhập tên tên danh mục">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Slug muốn tạo:</label>
                            <div>
                                <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Chế độ:</label>
                            <div>
                                <select class="form-control" name="is_open">
                                    <option selected disabled>Vui lòng chọn chế độ</option>
                                    <option value=1>Hiển thị</option>
                                    <option value=0>Không hiển thị</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Loại danh mục:</label>
                            <div>
                                <select class="form-control" name="loai_danh_muc">
                                    <option selected disabled>Vui lòng chọn danh mục</option>
                                    <option value=1>Nhà Hàng</option>
                                    <option value=2>Shopping</option>
                                    <option value=3>Hotels</option>
                                    <option value=4>Địa điểm</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Chọn thành phố:</label>
                            <div>
                                <select class="form-control" name="thanh_pho_id">
                                    <option selected disabled>Vui lòng chọn thành phố</option>
                                    @foreach ($thanhPho as $key => $value)
                                        <option value={{ $value->id }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Add New button -->
                        <div class="form-group ">
                            <div class="offset-sm-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="ri-add-fill"></i><span
                                        class="pl-1">Cập nhật</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Any JavaScript specific to this view can be included here -->
@endsection
