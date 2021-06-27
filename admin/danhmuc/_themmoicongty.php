<?php
include '../../service/congtysudung.php';
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
        <h5 class="modal-title">Thêm mới công ty sử dụng</h5>
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
                    <label><b>Tên công ty</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenCongTy" name="TenCongTy" value="<?php echo $result['TenCongTy'] ?>" placeholder="Nhập tên công ty" />
                </div>
                <div class="col-12">
                    <label><b>Giấy phép kinh doanh</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="GiayPhepKinhDoanh" name="GiayPhepKinhDoanh" value="<?php echo $result['GiayPhepKinhDoanh'] ?>" placeholder="Nhập giấy phép kinh doanh" />
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="CongTySuDungID" name="CongTySuDungID"  value="<?php echo $result['CongTySuDungID']?>" hidden />
                    <input type="text" class="form-control" id="CongTy" name="CongTy" value="ThemCongTy" hidden />
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
                    <label><b>Tên công ty</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenCongTy" name="TenCongTy" placeholder="Nhập tên công ty" />
                </div> 
                <div class="col-12">
                    <label><b>Giấy phép kinh doanh</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="GiayPhepKinhDoanh" name="GiayPhepKinhDoanh" placeholder="Nhập giấy phép kinh doanh" />
                </div>     
                <div class="col-12">
                    <input type="text" class="form-control" id="CongTySuDungID" name="CongTySuDungID"  value="0" hidden />
                    <input type="text" class="form-control" id="CongTy" name="CongTy" value="ThemCongTy" hidden />
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
                toastr.success("Đã lưu công ty đang sử dụng")
                $('#dialogNhaCungCap').modal('hide');
                load_danhsach_ncc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>