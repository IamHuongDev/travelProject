@extends('Partner.Master')

@section('content')
    <div class="row">
        <div class="col-md-3 col-12">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới bài viết</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" method="POST" action="/partner/new">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="tieuDe" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" disabled="" value="" name="slug">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" name="tomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="4" name="noiDung"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Chuyên mục</label>
                            <select class="form-control" name="chuyenMuc">
                                <option selected disabled>Vui lòng chọn chuyên mục</option>
                                <option value=1>Địa điểm</option>
                                <option value=2>Giới thiệu</option>
                                <option value=3>Quảng cáo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Is open</label>
                            <select class="form-control" name="is_open">
                                <option selected disabled>Vui lòng chọn tình trạng</option>
                                <option value=1>Hoạt động</option>
                                <option value=0>Dừng hoạt động</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control-file" name="hinhAnh">
                        </div>
                        <!-- Add New button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-block"><i class="ri-add-fill"></i><span
                                    class="pl-1">Thêm mới</span></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách bài viết</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div id="table" class="table-editable">
                        <table id="myTable" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    {{-- <th>Slug</th> --}}
                                    <th>Hình ảnh</th>
                                    <th>Tóm tắt</th>
                                    {{-- <th>Nội dung</th> --}}
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


                                <tr>
                                    <td contenteditable="true"></td>
                                    {{-- <td contenteditable="true"></td> --}}
                                    <td contenteditable="true"><img src=""></td>
                                    <td contenteditable="true"></td>
                                    {{-- <td contenteditable="true"></td> --}}
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td>
                                        <a href="/partner/category/edit/" class="btn btn-success btn-rounded btn-sm">Sửa</a>
                                        <a href="/partner/category/delete/"
                                            class="btn btn-danger btn-rounded btn-sm">Xóa</a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var arr = [];

            // function getData() {
            //     arr.push({'id' : 1, 'tieuDe': 'Tiêu đề 1', 'chuyenMuc' : 1, 'is_open' : 1, 'tomTat' : 'Đây là tóm tắt 01', 'hinhAnh' : '/upload/anh_1.jpg'});
            //     arr.push({'id' : 2, 'tieuDe': 'Tiêu đề 2', 'chuyenMuc' : 2, 'is_open' : 0, 'tomTat' : 'Đây là tóm tắt 02', 'hinhAnh' : '/upload/anh_1.jpg'});

            //     return arr;
            // }

            function loadData(x) {
                var textOpen = x.is_open == 1 ? 'Hiển thị' : 'Tắt';
                if (x.chuyenMuc == 1) {
                    textChuyenMuc = 'Địa điểm';
                } else if (x.chuyenMuc == 2) {
                    textChuyenMuc = 'Giới thiệu';
                } else {
                    textChuyenMuc = 'Quảng cáo';
                }
                var text = '';
                text += '<tr>'
                text += '<td contenteditable="true">' + x.id + '</td>'
                text += '<td contenteditable="true">' + x.tieuDe + '</td>'
                text += '<td contenteditable="true"><img src="' + x.hinhAnh + ' " style="width:100px"></td>'
                text += '<td contenteditable="true">' + x.tomTat + '</td>'
                text += '<td contenteditable="true">' + textChuyenMuc + '</td>'
                text += '<td contenteditable="true">' + textOpen + '</td>'
                text += '<td>'
                text += '<a href="" class="btn btn-success btn-rounded btn-sm">Sửa</a>'
                text += '<a href="" class="btn btn-danger btn-rounded btn-sm">Xóa</a>'
                text += '</td>'
                text += '</tr>'

                return text;
            }

            function getData() {
                $.ajax({
                    url: '/partner/new/getData',
                    type: 'get',
                    success: function($data) {
                        var text = '';
                        $.each($data.data, function(index, value) {
                            text += loadData(value);
                        });
                        $('#myTable tbody').html(text);
                    }
                });
            }

            getData();


            // function loadAllData(arr){
            //     var text = '';
            //     for(let value of arr){
            //         text += loadData(value);
            //     }
            //     $('#myTable tbody').html(text);
            // }
            // getData();
            // loadAllData(arr);
        });
    </script>
@endsection
