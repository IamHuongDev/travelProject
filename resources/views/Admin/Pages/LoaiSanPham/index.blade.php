@extends('Admin.Master')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Thêm mới loại sản phẩm</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form class="form-horizontal" id="createLoaiSanPham">
                        <div class="form-group">
                            <label class="col-form-label">Tên loại sản phẩm:</label>
                            <div>
                                <input type="text" name="ten_loai_san_pham" class="form-control"
                                    placeholder="Nhập tên loại sản phẩm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tình trạng:</label>
                            <div>
                                <select class="form-control" name="is_open">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1>Hiển thị</option>
                                    <option value=0>Không hiển thị</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Loại sản phẩm cha:</label>
                            <div>
                                <select id="listRoot" class="form-control" name="loai_san_pham_id">
                                    <option value=0>Root</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="offset-sm-3">
                                <button class="btn btn-sm btn-success">
                                    <i class="ri-add-fill"></i>
                                    <span class="pl-1">Thêm mới</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách loại sản phẩm</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Table -->
                    <div class="table-editable">
                        <table id="table" class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên loại sản phẩm</th>
                                    <th class="text-center">Danh mục cha</th>
                                    <th class="text-center">Tình trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table rows will be dynamically generated -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="edit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa loại sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateLoaiSanPham">
                    <input type="hidden" id="id" name="id_update">
                    <div class="modal-body">

                        <div class="form-group ">
                            <label class="col-form-label">Tên loại sản phẩm:</label>
                            <div>
                                <input type="text" name="ten_loai_san_pham" id="ten_loai_san_pham" class="form-control"
                                    placeholder="Nhập tên loại sản phẩm">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Tình trạng:</label>
                            <div>
                                <select class="form-control" name="is_open" id="is_open">
                                    <option selected disabled>Vui lòng chọn tình trạng</option>
                                    <option value=1>Hiển thị</option>
                                    <option value=0>Không hiển thị</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label">Loại sản phẩm cha:</label>
                            <div>
                                <select class="form-control" name="loai_san_pham_id" id="edit_listRoot">
                                    <option value=0>Root</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="delete" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa loại sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_id">
                    <p>Bạn chắc chắn muốn xóa loại sản phẩm này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="acceptDelete" class="btn btn-primary"
                        data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            function loadListRoot() {
                axios.get('/admin/loai-san-pham/list-root')
                    .then(function(res) {
                        var data = res.data.listRoot;
                        var html = '<option value=0>Root</option>';
                        $.each(data, function(key, value) {
                            html += '<option value=' + value.id + '>' + value.ten_loai_san_pham +
                                '</option>';
                        });
                        $("#listRoot").html(html);
                    });
            }

            function loadTable() {
                axios.get('/admin/loai-san-pham/list-all')
                    .then(function(res) {
                        var data = res.data.listAll;
                        var html = '';
                        $.each(data, function(key, value) {
                            key++;
                            html += '<tr>';
                            html += '<td class="text-center">' + key + '</td>';
                            html += '<td class="text-center">' + value.ten_loai_san_pham + '</td>';
                            if (value.tenCha) {
                                html += '<td class="text-center">' + value.tenCha + '</td>';
                            } else {
                                html += '<td class="text-center">Root</td>';
                            }
                            html += '<td class="text-nowrap text-center">';
                            if (value.is_open) {
                                html +=
                                    '<button class="btn btn-success btn-rounded btn-block">Hiển thị</button>';
                            } else {
                                html +=
                                    '<button class="btn btn-danger btn-rounded btn-block">Không hiển thị</button>';
                            }
                            html += '</td>';
                            html += '<td class="text-nowrap text-center">';
                            html += '<button data-id="' + value.id +
                                '" class="btn btn-primary btn-rounded btn-sm mr-2 edit" data-toggle="modal" data-target="#edit">Sửa</button>';
                            html += '<button data-id="' + value.id +
                                '" class="btn btn-danger btn-rounded btn-sm delete" data-toggle="modal" data-target="#delete">Xóa</button>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $("#table tbody").html(html);
                    })
                    .catch(function(error) {
                        console.error("Error loading table data:", error);
                    });
            }

            loadListRoot();
            loadTable();

            var row;

            $('body').on('click', '.delete', function() {
                $("#delete_id").val($(this).data('id'));
                row = $(this).closest('tr');
            });

            $("#acceptDelete").click(function(e) {
                axios.get('/admin/loai-san-pham/delete/' + $("#delete_id").val())
                    .then(function(res) {
                        if (res.data.status) {
                            toastr.success("Đã xóa danh mục thành công");
                            row.remove();

                        } else {
                            toastr.error("Lỗi hệ thống");
                        }
                    });
            });

            $('body').on('click', '.edit', function() {
                var id = $(this).data('id');
                var id_cha;
                axios.get('/admin/loai-san-pham/edit/' + id)
                    .then(function(res) {
                        if (res.data.status) {
                            $("#id_update").val(res.data.data.id);
                            $("#ten_loai_san_pham").val(res.data.data
                                .ten_loai_san_pham);
                            $("#is_open").val(res.data.data.is_open);
                            id_cha = res.data.data.loai_san_pham_id;
                        } else {
                            toastr.error("Lỗi hệ thống");
                        }
                    })
                    axios.get('/admin/loai-san-pham/list-root')
                    .then(function(res) {
                        var data = res.data.listRoot;
                        var html = '<option value=0>Root</option>';
                        $.each(data, function(key, value) {
                           if(value.id == id_cha){
                            html += '<option value=' + value.id + ' selected>' + value.ten_loai_san_pham +
                                '</option>';
                           } else {
                            html += '<option value=' + value.id + '>' + value.ten_loai_san_pham +
                                '</option>';
                           }
                        });
                        $("#edit_listRoot").html(html);
                    });

            });

            $("#updateLoaiSanPham").submit(function(event) {
                event.preventDefault();

                const payload = window.getFormData($(this));

                console.log( payload );
            });

            $("#createLoaiSanPham").submit(function(event) {
                event.preventDefault();

                const payload = window.getFormData($(this));

                axios.post('/admin/loai-san-pham/create', payload)
                    .then(function(res) {
                        if (res.data.data) {
                            toastr.success("Đã thêm mới thành công");
                            $("#createLoaiSanPham").trigger("reset");
                            loadTable();
                        }
                    })
                    .catch(function(res) {
                        var errors = res.response.data.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        });
                    });
            });


        });
    </script>
@endsection
