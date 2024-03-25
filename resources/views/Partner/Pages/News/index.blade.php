@extends('Partner.Master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-12">
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

                            <tbody>


                                <tr>
                                    <td ></td>
                                    {{-- <td ></td> --}}
                                    <td ><img src=""></td>
                                    <td ></td>
                                    {{-- <td ></td> --}}
                                    <td ></td>
                                    <td ></td>
                                    <td ></td>
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
        <div class="col-md-12 col-12">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới bài viết</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" id="formAddNews">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" id="tieuDe" name="tieuDe" class="form-control"
                                placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" disabled id="slug" name="slug">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" rows="3" id="tomTat" name="tomTat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" rows="4" id="noiDung" name="noiDung"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Chuyên mục</label>
                            <select class="form-control" id="chuyenMuc" name="chuyenMuc">
                                <option selected disabled>Vui lòng chọn chuyên mục</option>
                                <option value=1>Địa điểm</option>
                                <option value=2>Giới thiệu</option>
                                <option value=3>Quảng cáo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Is open</label>
                            <select class="form-control" id="is_open" name="is_open">
                                <option selected disabled>Vui lòng chọn tình trạng</option>
                                <option value=1>Hoạt động</option>
                                <option value=0>Dừng hoạt động</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="thumbnail" type="text" class="form-control" name="hinhAnh">
                                    <span class="input-group-append">
                                        <a data-input="thumbnail" data-preview="holder"
                                            class=" btn btn-primary text-white uploadimage" type="button">Chọn</a>
                                    </span>
                                </div>

                            </div>
                            <div class="image-preview mt-2">
                                <img id="holder" class="img-fluid" style="max-height: 100px;">

                            </div>
                        </div>

                        <!-- Add New button -->
                        <div class="form-group">
                            <button type="button" id="addNews" class="btn btn-sm btn-success " disabled><i
                                    class="ri-add-fill"></i><span class="pl-1">Thêm mới</span></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- modal --}}

        <div class="modal fade" id="editNewsModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa tin tức</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form class="form-horizontal" id="formeditNews">
                            <input type="hidden" id="news_id">
                            <div class="form-group">
                                <label for="tieuDe">Tiêu đề</label>
                                <input type="text" id="tieuDe_edit" name="tieuDe" class="form-control"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" disabled="" value="" id="slug_edit"
                                    name="slug">
                            </div>
                            <div class="form-group">
                                <label for="tomTat">Tóm tắt</label>
                                <textarea class="form-control" rows="3" id="tomTat_edit" name="tomTat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="noiDung">Nội dung</label>
                                <textarea class="form-control" rows="4" id="noiDung_edit" name="noiDung"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="chuyenMuc">Chuyên mục</label>
                                <select class="form-control" id="chuyenMuc_edit" name="chuyenMuc">
                                    <option selected disabled>Vui lòng chọn chuyên mục</option>
                                    <option value=1>Địa điểm</option>
                                    <option value=2>Giới thiệu</option>
                                    <option value=3>Quảng cáo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="is_open">Is open</label>
                                <select class="form-control" id="is_open_edit" name="is_open">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1>Hoạt động</option>
                                    <option value=0>Dừng hoạt động</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Hình ảnh</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="thumbnail_edit" type="text" class="form-control" name="hinhAnh">
                                        <span class="input-group-append">
                                            <a data-input="thumbnail_edit" data-preview="holder_edit"
                                                class="btn btn-primary text-white uploadimage" type="button">Chọn</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="image-preview mt-2">
                                    <img id="holder_edit" class="img-fluid" style="max-height: 100px;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="editNews" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {

            function slugify(string) {
                const a = 'àáäâãåăæąçćčđďèéěėëêęğǵḧìíïîįłḿǹńňñòóöôœøṕŕřßşśšșťțùúüûǘůűūųẃẍÿýźžż·/_,:;'
                const b = 'aaaaaaaaacccddeeeeeeegghiiiiilmnnnnooooooprrsssssttuuuuuuuuuwxyyzzz------'
                const p = new RegExp(a.split('').join('|'), 'g')
                return string.toString().toLowerCase()
                    .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
                    .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
                    .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
                    .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
                    .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
                    .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
                    .replace(/đ/gi, 'd')
                    .replace(/\s+/g, '-')
                    .replace(p, c => b.charAt(a.indexOf(c)))
                    .replace(/&/g, '-and-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '')
            }

            var arr = [];

            function loadData(x) {
                // var textOpen = x.is_open == 1 ? 'Hiển thị' : 'Tắt';

                if(x.is_open == 1) {
                    var textOpen = '<span class="bg-primary btn-rounded btn-sm changeOpen" data-id="' + x.id + '">Hiển Thị</span>'
                } else {
                    var textOpen = '<span class="bg-danger btn-rounded btn-sm changeOpen" data-id="' + x.id + '">Tắt hiển thị</span>'
                }

                if (x.chuyenMuc == 1) {
                    textChuyenMuc = 'Địa điểm';
                } else if (x.chuyenMuc == 2) {
                    textChuyenMuc = 'Giới thiệu';
                } else {
                    textChuyenMuc = 'Quảng cáo';
                }
                var text = '';
                text += '<tr>'
                text += '<td >' + x.id + '</td>'
                text += '<td >' + x.tieuDe + '</td>'
                text += '<td ><img src="' + x.hinhAnh + ' " style="width:100px"></td>'
                text += '<td >' + x.tomTat + '</td>'
                text += '<td >' + textChuyenMuc + '</td>'
                text += '<td >' + textOpen + '</td>'
                text += '<td>'
                text +=
                    '<a class="btn btn-success btn-rounded btn-sm edit mx-2"" data-toggle="modal" data-target="#editNewsModal" data-id="' +
                    x.id + '">Sửa</a>'
                text += '<a class="btn btn-danger btn-rounded btn-sm delete" data-id="' + x.id + '">Xóa</a>'
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

            $('body').on('click', '.delete', function() {
                var getId = $(this).data('id');
                console.log("cần xoá id =" + getId);
                $.ajax({
                    url: '/partner/new/deleteAjax/' + getId,
                    type: 'get',
                    success: function($res) {
                        if ($res.trangThai == true) {
                            toastr.success('Đã xoá tin tức thành công');
                            getData();
                        } else {
                            toastr.error('Tin tức không tồn tại');
                        }
                    },
                });
            });

            $('body').on('click', '.edit', function() {
                var getId = $(this).data('id');
                console.log("cần update id =" + getId);
                $.ajax({
                    url: '/partner/new/editAjax/' + getId,
                    type: 'get',
                    success: function($res) {
                        // console.log( $res );
                        if ($res.trangThai == true) {
                            // console.log( $res.data );
                            $("#news_id").val($res.data.id);
                            $("#tieuDe_edit").val($res.data.tieuDe);
                            $("#slug_edit").val($res.data.slug);
                            $("#chuyenMuc_edit").val($res.data.chuyenMuc).change();
                            $("#is_open_edit").val($res.data.is_open).change();
                            CKEDITOR.instances['tomTat_edit'].setData($res.data.tomTat);
                            CKEDITOR.instances['noiDung_edit'].setData($res.data.noiDung);
                            $("#thumbnail_edit").val($res.data.hinhAnh);
                            $("#holder_edit").attr("src", $res.data.hinhAnh);


                        } else {
                            toastr.warning('vui lòng không can thiệp hệ thống');
                        }
                    },
                });
            });

            $('body').on('click', '.changeOpen', function() {
                var getId = $(this).data('id');
                console.log( 'đã click được ' + getId );
                $.ajax({
                    url: '/partner/new/changeOpen/' + getId,
                    type: 'get',
                    success: function($res) {
                        // console.log( $res );
                        if($res.trangThai ==  true) {
                            toastr.success('Đã thay đổi trạng thái thành công');
                            getData();
                        }else{
                            toastr.error('Thay đổi trạng thái không thành công');
                        }
                    },
                });
            });


            $("#editNews").click(function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định của nút
                console.log("di edit thôi");
                var id = $("#news_id").val();
                var tieuDe = $("#tieuDe_edit").val();
                var chuyenMuc = $("#chuyenMuc_edit").val();
                var is_open = $("#is_open_edit").val();
                var tomTat = CKEDITOR.instances['tomTat_edit'].getData();
                var noiDung = CKEDITOR.instances['noiDung_edit'].getData();
                var hinhAnh = $("#thumbnail_edit").val();

                var tinTuc = {
                    'id': id,
                    'tieuDe': tieuDe,
                    'chuyenMuc': chuyenMuc,
                    'is_open': is_open,
                    'tomTat': tomTat,
                    'noiDung': noiDung,
                    'hinhAnh': hinhAnh,
                };

                $.ajax({
                    url: '/partner/new/updateAjax',
                    type: 'post',
                    data: tinTuc,
                    success: function($res) {
                        if ($res.trangThai == true) {
                            toastr.success('Đã cập nhật tin tức thành công');
                            getData();

                            $('#formeditNews').trigger("reset");
                            $('#holder_edit').removeAttr('src');
                            $('#editNewsModal').modal("toggle"); // Đóng modal sau khi cập nhật thành công
                        }
                    },
                    error: function($err) {
                        var listError = $err.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });

            });



            $("#addNews").click(function(e) {
                e.preventDefault();
                var tieuDe = $("#tieuDe").val();
                var chuyenMuc = $("#chuyenMuc").val();
                var is_open = $("#is_open").val();
                var tomTat = CKEDITOR.instances['tomTat'].getData();
                var noiDung = CKEDITOR.instances['noiDung'].getData();
                var hinhAnh = $("#thumbnail").val();

                var tinTuc = {
                    'tieuDe': tieuDe,
                    'chuyenMuc': chuyenMuc,
                    'is_open': is_open,
                    'tomTat': tomTat,
                    'noiDung': noiDung,
                    'hinhAnh': hinhAnh,
                };
                $.ajax({
                    url: '/partner/new/ajax',
                    type: 'post',
                    data: tinTuc,
                    success: function($res) {
                        if ($res.trangThai == true) {
                            toastr.success('Đã thêm tin tức thành công');
                            getData();

                            $('#formAddNews').trigger("reset");
                            $('#holder').removeAttr('src');
                        }
                    },
                    error: function($err) {
                        var listError = $err.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $("#tieuDe").keyup(function(e) {
                var tieuDe = $(this).val(); // Sử dụng $(this) để lấy giá trị của ô nhập tiêu đề
                $("#slug").val(slugify(tieuDe));
            });

            $('#tieuDe').blur(function(e) {
                var payload = {
                    'tieuDe': $("#tieuDe").val(),
                };

                $.ajax({
                    url: '/partner/new/find/title',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            toastr.error('Tiêu đề đã tồn tại');
                            $("#addNews").prop("disabled",
                                true); // Sử dụng prop để thiết lập thuộc tính disabled
                        } else {
                            toastr.success('Tiêu đề hợp lệ!');
                            $("#addNews").prop("disabled", false);
                        }
                    },
                    error: function(err) {
                        console.error('Có lỗi xảy ra:', err);
                    }
                });
            });


        });
    </script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('.uploadimage').filemanager('image');
    </script>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('noiDung');
        CKEDITOR.replace('tomTat');
        CKEDITOR.replace('noiDung_edit');
        CKEDITOR.replace('tomTat_edit');
    </script>

@endsection
