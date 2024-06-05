@extends('Admin.Master')

@section('content')
    <div class="row">
        <div class="col">
            <!-- Editable Table -->
            <div class="iq-card">
                <div class="iq-card-header">
                    <h4 class="card-title">Danh sách nhà hàng khách sạn</h4>
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
                    <h4 class="card-title">Thêm mới nhà hàng khách sạn</h4>
                </div>
                <div class="iq-card-body">
                    <!-- Form -->
                    <form id="them_moi">
                        <div id="row_data">
                            <div class="form-group ">
                                <label class="col-form-label">Tên nhà hàng / Khách sạn:</label>
                                <div>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nhập tên nhà hàng - khách sạn">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Slug muốn tạo:</label>
                                <div>
                                    <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Địa chỉ:</label>
                                <div>
                                    <input type="text" name="dia_chi" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Số điện thoại:</label>
                                <div>
                                    <input type="text" name="so_dien_thoai" class="form-control"
                                        placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Mô tả ngắn:</label>
                                <div>
                                    <textarea name="mo_ta_ngan" rows="4" class="form-control" placeholder="Nhập mô tả ngắn"></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Mô tả chi tiết:</label>
                                <div>
                                    <textarea name="mo_ta_chi_tiet" rows="4" class="form-control" placeholder="Nhập mô tả chi tiết"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Website</label>
                                    <input name="website" type="text" class="form-control" placeholder="Nhập website">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Facebook</label>
                                    <input name="facebook" type="text" class="form-control" placeholder="Nhập facebook">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Instagram</label>
                                    <input name="instagram" type="text" class="form-control"
                                        placeholder="Nhập instagram">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Twiter</label>
                                    <input name="twiter" type="text" class="form-control" placeholder="Nhập twiter">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Nhập email">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Loại danh mục</label>
                                    <div>
                                        <select class="form-control mt-1" name="danh_muc_id">
                                            @foreach ($danhMuc as $value)
                                                <option value={{ $value->id }}>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Mức giá</label>
                                    <input name="muc_gia" type="text" class="form-control" placeholder="Nhập mức giá">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Rate</label>
                                    <input name="rate" type="text" class="form-control" placeholder="Nhập số sao">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Video</label>
                                    <input name="video" type="text" class="form-control"
                                        placeholder="Nhập link video">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Banner</label>
                                    <div class="input-group mt-1">
                                        <div class="custom-file">
                                            <input id="thumbnail" type="text" class="form-control" name="banner">
                                            <span class="input-group-append">
                                                <a data-input="thumbnail" data-preview="holder"
                                                    class=" btn btn-primary text-white uploadimage"
                                                    type="button">Chọn</a>
                                            </span>
                                        </div>

                                    </div>
                                    <div class="image-preview mt-2">
                                        <img id="holder" class="img-fluid" style="max-height: 100px;">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-form-label">Thuộc tính:</label>
                                <div>
                                    <textarea name="thuoc_tinh" rows="4" class="form-control" placeholder="Nhập thuoc tinh"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                @for ($i = 2; $i <= 8; $i++)
                                    <div class="col-md-3 mb-3">
                                        <label>Giờ làm việc thứ {{ $i == 8 ? 'Chủ Nhật' : $i }}</label>
                                        <input name="gio_lam_viec_thu_{{ $i }}" type="text"
                                            class="form-control" placeholder="Nhập giờ làm việc">
                                    </div>
                                @endfor


                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="col-md-3 md-3">
                                    <div class="form-group mt-1">
                                        <label>Hình ảnh</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input id="image_1" type="text" class="form-control"
                                                    name="danh_sach_hinh_anh">
                                                <span class="input-group-append">
                                                    <a data-input="image_1" data-preview="imageview_1"
                                                        class="btn btn-primary text-white uploadimage"
                                                        type="button">Chọn</a>
                                                    <button type="button" class="btn btn-danger them_anh">Thêm
                                                        image</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <img id="imageview_1" class="img-fluid" style="max-height: 100px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="offset-sm-3">
                                <button type="submit" class="btn btn-sm btn-success"><i class="ri-add-fill"></i><span
                                        class="pl-1">Thêm
                                        mới</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('.uploadimage').filemanager('image');
    </script>
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mo_ta_chi_tiet');
        CKEDITOR.replace('thuoc_tinh');
    </script>
    <script>
        $(document).ready(function(e) {
            var total = 1;

            $("#them_moi").submit(function(event) {
                event.preventDefault();
                console.log("Đã click được!!");

                const payload = window.getFormData($(this));

                payload["thuoc_tinh"] = CKEDITOR.instances["thuoc_tinh"].getData();
                payload["mo_ta_chi_tiet"] = CKEDITOR.instances["mo_ta_chi_tiet"].getData();

                axios.post('/admin/nha-hang-khach-san/create', payload)
                    .then(function(res) {
                        if (res.data) {
                            toastr.success("Đã thêm mới thành công");
                            $("#them_moi").trigger("reset");
                            CKEDITOR.instances["thuoc_tinh"].setData('');
                            CKEDITOR.instances["mo_ta_chi_tiet"].setData('');
                        }
                    })
                    .catch(function(res) {
                        var errors = res.response.data.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        });
                    });

            });

            $('body').on('click', '.them_anh', function() {
                event.preventDefault();
                console.log("Đã click được thêm ảnh!!");

                total++;

                var html =
                    "<div class='col-md-3 md-3'> <div class='form-group mt-1'> <label >Hình ảnh</label> <div class='input-group'> <div class='custom-file'> <input id='image_" +
                    total + "' type='text' class='form-control' name='image_" + total +
                    "'> <span class='input-group-append'> <a data-input='image_" + total +
                    "' data-preview='imageview_" + total +
                    "' class='btn btn-primary text-white uploadimage' type='button'>Chọn</a> <button type='button' class='btn btn-danger them_anh'>Thêm image</button> </span> </div> </div> </div> <img id='imageview_" +
                    total + "' class='img-fluid' style='max-height: 100px;'> </div>";
                $("#row_data .d-flex").append(html);
            });
        });
    </script>
@endsection
