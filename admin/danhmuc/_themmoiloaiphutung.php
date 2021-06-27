<?php
include '../../service/loaiphutung.php';
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
        <h5 class="modal-title">Thêm mới loại linh kiện</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->LoaiPhuTung_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc()) {
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên loại linh kiện</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenLoaiPhuTung" name="TenLoaiPhuTung" value="<?php echo $result['TenLoaiPhuTung'] ?>" placeholder="Nhập tên loại phụ tùng" />
                </div>
                <div class="col-12" id="NhaSanXuat">
                    <label><b>Nhà sản xuất</b><span class="text-danger"> (*)</span></label>
                        <select class="form-control" name="NhaSanXuatID">
                                <?php
                                $theloai = $nt->DanhSachNhaSanXuat();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['NhaSanXuatID'] ?>"><?php echo $res['TenNhaSanXuat'] ?></option>

                                <?php } ?>
                            </select> 
                </div>            
                <div class="col-12">
                    <input type="text" class="form-control" id="LoaiPhuTungID" name="LoaiPhuTungID"  value="<?php echo $result['LoaiPhuTungID']?>" hidden />
                    <input type="text" class="form-control" id="PhuTung" name="PhuTung" value="ThemPhuTung" hidden />
                </div>
            </div>
        </div>
        <script>
            $("#NhaSanXuat select").val('<?php echo $result['NhaSanXuatID']?>');
        </script>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên loại phụ tùng</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenLoaiPhuTung" name="TenLoaiPhuTung" placeholder="Nhập tên loại phụ tùng" />
                </div> 
                <div class="col-12">
                    <label><b>Nhà sản xuất</b><span class="text-danger"> (*)</span></label>
                        <select class="form-control" name="NhaSanXuatID">
                                <?php
                                $theloai = $nt->DanhSachNhaSanXuat();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['NhaSanXuatID'] ?>"><?php echo $res['TenNhaSanXuat'] ?></option>

                                <?php } ?>
                            </select> 
                </div>          
                <div class="col-12">
                    <input type="text" class="form-control" id="LoaiPhuTungID" name="LoaiPhuTungID"  value="0" hidden />
                    <input type="text" class="form-control" id="PhuTung" name="PhuTung" value="ThemPhuTung" hidden />
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
                toastr.success("Đã lưu loại phụ tùng")
                $('#dialogNhaCungCap').modal('hide');
                load_danhsach_ncc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>