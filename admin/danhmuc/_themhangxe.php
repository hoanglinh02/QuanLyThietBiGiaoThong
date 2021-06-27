<?php
include '../../service/hangxe.php';
?>
<?php
$nt = new NhaThuoc();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới hãng xe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->CongTy_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc()) {
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên hãng xe</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenHangXe" name="TenHangXe" value="<?php echo $result['TenHangXe'] ?>" placeholder="Nhập tên hãng xe" />
                </div>
                <div class="col-12">
                    <label><b>Nước sản xuất</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="NuocSanXuat" name="NuocSanXuat" value="<?php echo $result['NuocSanXuat'] ?>" placeholder="Nhập nước sản xuất" />
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="HangXeID" name="HangXeID"  value="<?php echo $result['HangXeID']?>" hidden />
                    <input type="text" class="form-control" id="HangXe" name="HangXe" value="ThemHangXe" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên hãng xe</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenHangXe" name="TenHangXe"  placeholder="Nhập tên hãng xe" />
                </div>
                <div class="col-12">
                    <label><b>Nước sản xuất</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="NuocSanXuat" name="NuocSanXuat" placeholder="Nhập nước sản xuất" />
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="HangXeID" name="HangXeID"  value="0" hidden />
                    <input type="text" class="form-control" id="HangXe" name="HangXe" value="ThemHangXe" hidden />
                </div>
            </div>
        </div>
        <?php } ?>        
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
                toastr.success("Đã lưu hãng xe")
                $('#dialogNhaCungCap').modal('hide');
                load_danhsach_ncc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>