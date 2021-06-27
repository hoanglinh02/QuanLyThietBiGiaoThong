<?php
include '../../service/nguoidung.php';
?>
<?php
$nt = new NguoiDung();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới người dùng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">      
            <div class="modal-body">
            <div class="row">           
                <div class="col-12">
                    <label><b>Quyền sử dụng</b><span class="text-danger"> (*)</span></label>
                    <select class="form-control" name="QuyenTruyCap" id="QuyenTruyCap">
                        <option value="ADMIN">Quản trị</option>
                        <option value="USER">Nhân viên</option>
                    </select>
                </div> 
                <div class="col-12">
                    <input type="text" class="form-control" id="NguoiDungID" name="NguoiDungID"  value="<?php echo  $_GET['id']?>" hidden />
                    <input type="text" class="form-control" id="NguoiDung" name="NguoiDung" value="PhanQuyen" hidden />
                </div>
            </div>
        </div>      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" onclick="GhiLai(this)">Ghi lại</button>
        </div>
    </form>
</div>
<script>
 function GhiLai(e) {
        $form = $(e).closest('form')        
        if (!$form.valid())
            return false;       
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: $form.serialize(),
            success: function(data) {
                toastr.success("Phân quyền thành công")
                $('#dialogPhanQuyen').modal('hide');
                load_danhsach_nguoidung();   
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>