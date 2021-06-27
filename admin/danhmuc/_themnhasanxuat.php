<?php
include '../../service/nhasanxuat.php';
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
        <h5 class="modal-title">Thêm mới nhà sản xuất</h5>
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
                    <label><b>Tên nhà sản xuất</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenNhaSanXuat" name="TenNhaSanXuat" value="<?php echo $result['TenNhaSanXuat'] ?>" placeholder="Nhập tên nhà sản xuất" />
                </div>
                <div class="col-12">
                    <label><b>Giấy phép kinh doanh</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="GiayPhepKinhDoanh" name="GiayPhepKinhDoanh" value="<?php echo $result['GiayPhepKinhDoanh'] ?>" placeholder="Nhập giấy phép kinh doanh" />
                </div>  
                <div class="col-12">
                    <label><b>Địa chỉ</b><span class="text-danger"> (*)</span></label>
                    <textarea type="text" class="form-control" id="DiaChi" name="DiaChi" value="sds" placeholder="Nhập địa chỉ" ><?php echo $result['DiaChi'] ?></textarea>
                </div>
                <div class="col-12">
                    <label><b>Mô tả</b></label>
                    <textarea type="text" class="form-control" id="MoTa" name="MoTa" value="" placeholder="Mô tả" ><?php echo $result['MoTa'] ?></textarea>
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="NhaSanXuatID" name="NhaSanXuatID"  value="<?php echo $result['NhaSanXuatID']?>" hidden />
                    <input type="text" class="form-control" id="NhaSanXuat" name="NhaSanXuat" value="ThemNhaSanXuat" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
            <div class="col-12">
                    <label><b>Tên nhà sản xuất</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenNhaSanXuat" name="TenNhaSanXuat"  placeholder="Nhập tên nhà sản xuất" />
                </div>
                <div class="col-12">
                    <label><b>Giấy phép kinh doanh</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="GiayPhepKinhDoanh" name="GiayPhepKinhDoanh"  placeholder="Nhập giấy phép kinh doanh" />
                </div>  
                <div class="col-12">
                    <label><b>Địa chỉ</b><span class="text-danger"> (*)</span></label>
                    <textarea type="text" class="form-control" id="DiaChi" name="DiaChi"  placeholder="Nhập địa chỉ" ></textarea>
                </div>
                <div class="col-12">
                    <label><b>Mô tả</b></label>
                    <textarea type="text" class="form-control" id="MoTa" name="MoTa" placeholder="Mô tả" ></textarea>
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="NhaSanXuatID" name="NhaSanXuatID"  hidden />
                    <input type="text" class="form-control" id="NhaSanXuat" name="NhaSanXuat" value="ThemNhaSanXuat" hidden />
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
                toastr.success("Đã lưu nhà sản xuất")
                $('#dialogNhaCungCap').modal('hide');
                load_danhsach_ncc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>