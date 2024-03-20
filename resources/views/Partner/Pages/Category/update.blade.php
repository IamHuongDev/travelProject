@extends('Partner.Master')

@section('content')

    <div class="row">
        <div class="col-md-4 col-12">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">chỉnh sửa Danh Mục</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="/partner/category/update">
                        @csrf
                        <input type="text" name="id">
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
                                <button type="submit" class="btn btn-sm btn-success"><span class="pl-1">Cập
                                        nhật</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $(document).ready(function(e) {

            toastr.error('Hiển thị lỗi cho vui');
        });


    </script>
@endsection
