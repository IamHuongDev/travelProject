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
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên danh mục:</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" value="{{$data->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Icon:</label>
                            <div class="col-sm-9">
                                <input type="text" name="icon" class="form-control" placeholder="Nhập icon" value="{{$data->icon}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Thể loại:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="type">
                                    <option selected disabled>Vui lòng chọn thể loại</option>
                                    <option value=1 {{$data->type == 1 ? 'selected' : ''}}>Nhà hàng</option>
                                    <option value=2 {{$data->type == 2 ? 'selected' : ''}}>Khách sạn</option>
                                    <option value=3 {{$data->type == 3 ? 'selected' : ''}}>Địa điểm</option>
                                    <option value=4 {{$data->type == 4 ? 'selected' : ''}}>Shopping</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tình trạng:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1 {{$data->status == 1 ? 'selected' : ''}}>Hoạt động</option>
                                    <option value=0 {{$data->status == 0 ? 'selected' : ''}}>Dừng hoạt động</option>
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
    {{-- <script>

        $(document).ready(function(e) {

            toastr.error('Hiển thị lỗi cho vui');
        });


    </script> --}}
@endsection
