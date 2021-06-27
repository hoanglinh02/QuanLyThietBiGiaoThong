<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Quản lý nhân viên</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info" onclick="ThemMoiNguoiDung(0)"><i class="fas fa-plus"></i> Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="nguoidung">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../inc/footer.php'
?>
<script>
    function load_danhsach_nguoidung() {
        $.ajax({
            url: "_danhsachnguoidung.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                $('#nguoidung').html(data);
            }
        });
    }
    load_danhsach_nguoidung();

    function ThemMoiNguoiDung(id) {
        $.ajax({
            url: "_themmoinguoidung.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogNguoiDung',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenDangNhap: {
                            required: "Vui lòng nhập tên đăng nhập"
                        },
                        MatKhau: {
                            required: "Vui lòng nhập mật khẩu"
                        },
                        HoTen: {
                            required: "Vui lòng nhập họ tên"
                        },
                        NgaySinh :{
                            required: "Vui lòng nhập ngày sinh"
                        }
                    },
                    rules: {
                        TenDangNhap: {
                            required: true
                        },
                        MatKhau: {
                            required: true
                        },
                        HoTen: {
                            required: true
                        },
                        NgaySinh :{
                            required: true
                        }
                    }
                })
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }

    function XoaNguoiDung(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa nhân viên này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    NguoiDung: "Remove"
                },
                success: function(data) {
                    toastr.success("Đã xóa nhân viên")
                    dialog.modal('hide');
                    load_danhsach_nguoidung();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
    function PhanQuyen(id) {
        $.ajax({
            url: "_phanquyen.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogPhanQuyen',
                    content: data,
                    width: 500
                });               
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function ThayDoiTrangThai(id, TrangThai) {
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            dataType: "html",
            type: "POST",
            data: {
                id: id,
                TrangThai : TrangThai,
                NguoiDung: "Change"
            },
            success: function(data) {
                toastr.success("Đã thay đổi trạng thái")
                load_danhsach_nguoidung();
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>