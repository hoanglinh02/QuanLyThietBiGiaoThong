
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">       
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Ngày bảo dưỡng</b><span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" id="NgayBaoDuong" name="NgayBaoDuong"  />

                    <input type="text" class="form-control" id="BaoDuong" name="BaoDuong" value="BaoDuong" hidden />
                    <input type="text" class="form-control" value="<?php echo $_GET['id'] ?>" id="SanPhamID" name="SanPhamID" hidden />
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
                toastr.success("Đã cập nhật trạng thái bảo dưỡng")
                $('#dialogTrangThai').modal('hide');
                load_danhsach_sanpham()
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>