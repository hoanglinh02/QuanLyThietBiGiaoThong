<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Báo cáo  phương tiện</h3>
            </div>
            <div class="row mb-2">
               <div class="col-md-5">
               <label><b>Từ ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="TuNgay" placeholder="dd-mm-yyyy">                   
                    </div>
               </div>
               <div class="col-md-5">
                <label><b>Đến ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="DenNgay" placeholder="Đến ngày" >                       
                    </div>
               </div>
               <div class="col-md-2">
                    <button class="btn btn-info" style="margin-top: 13%;" type="button" onclick="load_danhsach_nhapkho()"><i class="fas fa-eye"></i>  Xem</button>
               </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="baocao">

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
    function load_danhsach_nhapkho() {
        $.ajax({
            url: "_danhsachloaixe.php",
            data: {
                TuNgay: $("#TuNgay").val(),
                DenNgay: $("#DenNgay").val(),
                NguoiDungID : null
            },
            method: "GET",
            success: function(data) {
                debugger
                $('#baocao').html(data);
            }
        });
    }
    function ThemMoiNguoiDung(id) {
        $.ajax({
            url: "_themmoinguoidung.php",
            dataType: "html",
            data: {
                id: id
            },
            method: "GET",
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogNguoiDung',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenNhaThuoc: {
                            required: "Vui lòng nhập tên nhà thuốc"
                        }
                    },
                    rules: {
                        TenNhaThuoc: {
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
    function XuatExcel() {  
            $("#tbl_baocao").table2excel({  
                exclude: ".excludeThisClass",
                name: "Báo cáo tổng hợp",  
                filename: "Báo cáo tổng hợp nhập kho",  
                fileext: ".xls" ,
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: false
            });  
        }   
</script>