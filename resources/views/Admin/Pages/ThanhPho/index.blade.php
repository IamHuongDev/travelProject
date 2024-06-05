@extends('Admin.Master')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới thành phố</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" action="/admin/thanh-pho/create" method="POST">
                        @csrf
                        <div class="form-group ">
                            <label class="col-form-label">Tên thành phố:</label>
                            <div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nhập tên tên thành phố">
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
        <div class="col-md-3">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Chỉnh sửa thành phố</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" action="/admin/thanh-pho/update" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{isset($thanhPho->id) ? $thanhPho->id : ''}}">
                        <div class="form-group ">
                            <label class="col-form-label">Tên thành phố:</label>
                            <div>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Nhập tên tên thành phố" value="{{isset($thanhPho->name) ? $thanhPho->name : ''}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Slug muốn tạo:</label>
                            <div>
                                <input type="text" name="slug" class="form-control" placeholder="Nhập slug" value="{{isset($thanhPho->slug) ? $thanhPho->slug : ''}}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Chế độ:</label>
                            <div>
                                <select class="form-control" name="is_open">
                                    <option selected disabled>Vui lòng chọn chế độ</option>
                                    <option value=1 {{(isset($thanhPho) && $thanhPho->is_open == 1) ? 'selected' : ''}}>Hiển thị</option>
                                    <option value=0 {{(isset($thanhPho) && $thanhPho->is_open == 0) ? 'selected' : ''}}>Không hiển thị</option>
                                </select>
                            </div>
                        </div>

                        <!-- Add New button -->
                        <div class="form-group ">
                            <div class="offset-sm-3">
                                <button type="submit" class="btn btn-sm btn-primary" {{isset($thanhPho) ? '' : 'disabled'}}><i class="ri-add-fill"></i><span
                                        class="pl-1" >Cập nhật</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách thành phố</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thành phố</th>
                                    <th>Slug</th>
                                    <th>Chế độ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td contenteditable="true">{{ $key + 1 }}</td>
                                        <td contenteditable="true">{{ $value->name }}</td>
                                        <td contenteditable="true">{{ $value->slug }}</td>
                                        <td contenteditable="true">{{ $value->is_open == 1 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                                        <td class="text-nowrap">
                                            <a href="/admin/thanh-pho?id={{$value->id}}" class="btn btn-primary btn-rounded btn-sm">Sửa</a>
                                            <a href="/admin/thanh-pho/delete/{{$value->id}}" class="btn btn-danger btn-rounded btn-sm">Xóa</a>
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
    </div>
@endsection

@section('js')
    <!-- Any JavaScript specific to this view can be included here -->
@endsection
