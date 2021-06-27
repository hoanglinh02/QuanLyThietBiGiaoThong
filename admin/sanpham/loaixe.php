<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Quản lý phương tiện</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info" onclick="ThemMoiSanPham(0)"><i class="fas fa-plus"></i> Thêm mới</button>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="sanpham">

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
    function load_danhsach_sanpham() {
        $.ajax({
            url: "_danhsachsanpham.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                $('#sanpham').html(data);
            }
        });
    }
    load_danhsach_sanpham();

    function ThemMoiSanPham(id) {
        $.ajax({
            url: "_themmoisanpham.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogSanPham',
                    content: data,
                    width: 1000
                });
                $popup.find("form").validate({
                    messages: {
                        TenSanPham: {
                            required: "Vui lòng nhập tên sản phẩm"
                        },
                        GiaNhap: {
                            required: "Vui lòng nhập giá nhập"
                        },
                        GiaBan: {
                            required: "Vui lòng nhập giá bán"
                        },
                        SoLuong: {
                            required: "Vui lòng nhập số lượng",
                            number: "Số lượng phải là các kí tự số"
                        }
                    },
                    rules: {
                        TenSanPham: {
                            required: true
                        },
                        GiaNhap: {
                            required: true
                                                },
                        GiaBan: {
                            required: true                        },
                        SoLuong: {
                            required: true,
                            number: true
                        }
                    }
                })
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function NhapKho(id){
        $.ajax({
            url: "_nhapkho.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogNhapKho',
                    content: data,
                    width: 500
                });
                $popup.find("form").validate({
                    messages: {
                        SoLuong: {
                            required: "Vui lòng nhập số lượng",
                            number: "Số lượng là các kí tự số"
                        }
                    },
                    rules: {
                        SoLuong: {
                            required: true,
                            number: true
                        }
                    }
                })
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function XoaSanPham(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa sản phẩm này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    LoaiXe: "Remove"
                },
                success: function(data) {
                    toastr.success("Đã xóa sản phẩm")
                    dialog.modal('hide');
                    load_danhsach_sanpham();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
    
    function ChonPhuTungTheoXe(id) {
        $.ajax({
            url: "_danhsach_phutungtheoxe.php",
            dataType: "html",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogPhuTungDiKem',
                    content: data,
                    width: 800
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function ThayDoiTrangThai(id) {
        $.ajax({
            url: "baoduong.php",
            dataType: "html",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogTrangThai',
                    content: data,
                    width: 500
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function ThongTinPhuTungTheoXe(id, BienKS, TenXe) {
        $.ajax({
            url: "_danhsach_phutung.php",
            dataType: "html",
            type: "GET",
            data: {
                id: id,
                BienKS : BienKS,
                TenXe : TenXe
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogTrangThai',
                    content: data,
                    width: 500
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>