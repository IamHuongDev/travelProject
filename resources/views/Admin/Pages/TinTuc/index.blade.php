@extends('Admin.Master')

@section('content')
    <div class="row">
        <div class="col">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách tin tức</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
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
                                    <td contenteditable="true">1</td>
                                    <td contenteditable="true">1</td>
                                    <td contenteditable="true">1</td>
                                    <td contenteditable="true">1</td>
                                    <td contenteditable="true">1</td>
                                    <td contenteditable="true">
                                        1
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="#" class="btn btn-primary btn-rounded btn-sm">Sửa</a>
                                        <a href="#" class="btn btn-danger btn-rounded btn-sm">Xóa</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 ">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới tin tức</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form id="them_moi">
                        <div id="row_data">
                            <div class="form-group ">
                                <label class="col-form-label">Tiêu đề</label>
                                <div>
                                    <input type="text" name="tieuDe" id="tieuDe" class="form-control"
                                        placeholder="Nhập tiêu đề">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Slug</label>
                                <div>
                                    <input type="text" name="slug" name="slug" disabled class="form-control">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Tóm tắt</label>
                                <div>
                                    <textarea name="tomTat" id="tomTat" rows="4" class="form-control" placeholder="Nhập tóm tắt"></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Nội dung</label>
                                <div>
                                    <textarea name="noiDung" id="noiDung" rows="4" class="form-control" placeholder="Nhập nội dung"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chuyên mục</label>
                                <div>
                                    <select class="form-control mt-1" id="chuyenMuc" name="chuyenMuc">
                                        <option selected disabled>Vui lòng chọn chuyên mục</option>
                                        <option value=1>Địa điểm</option>
                                        <option value=2>Giới thiệu</option>
                                        <option value=3>Quảng cáo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Is open</label>
                                <select class="form-control" id="is_open" name="is_open">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1>Hoạt động</option>
                                    <option value=0>Dừng hoạt động</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="col">
                                <div class="form-group mt-1">
                                    <label>Hình ảnh</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary text-white uploadimage">
                                                <i class="fa fa-picture-o"></i> Choose </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" style="height:35px;" type="text"
                                            name="hinhAnh">
                                    </div>
                                </div>
                                <div class="image-preview mt-2">
                                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group mt-3 ">
                            <div class="offset-sm-3">
                                <button type="button" id="addNews" class="btn btn-sm btn-success " disabled><i
                                    class="ri-add-fill"></i><span class="pl-1">Thêm mới</span></button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>

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

                if (x.is_open == 1) {
                    var textOpen = '<span class="bg-primary btn-rounded btn-sm changeOpen" data-id="' + x.id +
                        '">Hiển Thị</span>'
                } else {
                    var textOpen = '<span class="bg-danger btn-rounded btn-sm changeOpen" data-id="' + x.id +
                        '">Tắt hiển thị</span>'
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

            function loadData_2(x) {
                if (x.is_open == 1) {
                    var textOpen = '<span class="bg-primary btn-rounded btn-sm changeOpen" data-id="' + x.id +
                        '">Hiển Thị</span>'
                } else {
                    var textOpen = '<span class="bg-danger btn-rounded btn-sm changeOpen" data-id="' + x.id +
                        '">Tắt hiển thị</span>'
                }

                if (x.chuyenMuc == 1) {
                    textChuyenMuc = 'Địa điểm';
                } else if (x.chuyenMuc == 2) {
                    textChuyenMuc = 'Giới thiệu';
                } else {
                    textChuyenMuc = 'Quảng cáo';
                }
                var text = '';

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


                return text;
            }

            function getData() {
                $.ajax({
                    url: '/admin/new/getData',
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
                    url: '/admin/new/deleteAjax/' + getId,
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
                    url: '/admin/new/editAjax/' + getId,
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
                // console.log( 'đã click được ' + getId );
                // row thể hiện dòng nào mình đang click
                var $row = $(this).closest("tr");

                $.ajax({
                    url: '/admin/new/changeOpen/' + getId,
                    type: 'get',
                    success: function($res) {
                        // console.log( $res );
                        if ($res.trangThai == true) {
                            toastr.success('Đã thay đổi trạng thái thành công');
                            var text = loadData_2($res.tinTuc);
                            $row.html(text);
                        } else {
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
                    url: '/admin/new/updateAjax',
                    type: 'post',
                    data: tinTuc,
                    success: function($res) {
                        if ($res.trangThai == true) {
                            toastr.success('Đã cập nhật tin tức thành công');
                            getData();

                            $('#formeditNews').trigger("reset");
                            $('#holder_edit').removeAttr('src');
                            $('#editNewsModal').modal(
                            "toggle"); // Đóng modal sau khi cập nhật thành công
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
                    url: '/admin/new/',
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
                    url: '/admin/new/find/title',
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


    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    </script>
    <script>
        $('.uploadimage').filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('noiDung');
        CKEDITOR.replace('tomTat');
        // CKEDITOR.replace('noiDung_edit');
        // CKEDITOR.replace('tomTat_edit');
    </script>
@endsection
