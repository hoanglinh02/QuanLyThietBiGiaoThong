<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Danh mục hãng xe</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-info" onclick="ThemMoiLoaiPhuTung(0)"><i class="fas fa-plus"></i> Thêm mới</button>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="nhacungcap">

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
    function load_danhsach_ncc() {
        $.ajax({
            url: "_danhsachhangxe.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#nhacungcap').html(data);
            }
        });
    }
   load_danhsach_ncc();
    function ThemMoiLoaiPhuTung(id) {
        $.ajax({
            url: "_themhangxe.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogNhaCungCap',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenHangXe: {
                            required: "Vui lòng nhập tên hãng xe"
                        },
                        NuocSanXuat: {
                            required: "Vui lòng nhập nước sản xuất"
                        }
                       
                    },
                    rules: {
                        TenHangXe: {
                            required: true
                        },
                        NuocSanXuat: {
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
    function XoaLoaiPhuTung(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa hãng xe này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    HangXe: "RemoveHangXe"
                },
                success: function(data) {
                    toastr.success("Đã xóa hãng xe")
                    dialog.modal('hide');
                    load_danhsach_ncc();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }

</script>