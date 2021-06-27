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
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->NguoiDung_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc()) {
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label><b>Tên đăng nhập</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="<?php echo $result['TenDangNhap'] ?>" placeholder="Tên đăng nhập" disabled />
                </div>  
                <div class="col-6">
                    <label><b>Họ tên</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="HoVaTen" name="HoVaTen" value="<?php echo $result['HoVaTen'] ?>" placeholder="Họ tên" />
                </div>  
                <div class="col-6">
                    <label><b>Ngày sinh</b><span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?php echo $result['NgaySinh'] ?>" placeholder="Ngày sinh" />
                </div>  
                <div class="col-6">
                    <label><b>Email</b></label>
                    <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $result['Email'] ?>" placeholder="Email" />
                </div>   
                <div class="col-12">
                    <label><b>Địa chỉ</b></label>
                    <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="<?php echo $result['DiaChi'] ?>" placeholder="Địa chỉ" />
                </div>                  
                <div class="col-12">
                    <input type="text" class="form-control" id="NguoiDungID" name="NguoiDungID"  value="<?php echo $result['NguoiDungID']?>" hidden />
                    <input type="text" class="form-control" id="NguoiDung" name="NguoiDung" value="NguoiDung" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
            <div class="col-6">
                    <label><b>Tên đăng nhập</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap"  placeholder="Tên đăng nhập" />
                </div>  
                <div class="col-6">
                    <label><b>Mật khẩu</b><span class="text-danger"> (*)</span></label>
                    <input type="password" class="form-control" id="MatKhau" name="MatKhau"  placeholder="Mật khẩu" />
                </div>  
                <div class="col-6">
                    <label><b>Quyền sử dụng</b></label>
                    <select class="form-control" name="QuyenTruyCap" id="QuyenTruyCap">
                        <option value="ADMIN">Quản trị</option>
                        <option value="USER">Nhân viên</option>
                    </select>
                </div> 
                <div class="col-6">
                    <label><b>Họ tên</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="HoVaTen" name="HoVaTen" placeholder="Họ tên" />
                </div>  
                <div class="col-6">
                    <label><b>Ngày sinh</b><span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" id="NgaySinh" name="NgaySinh"  placeholder="Ngày sinh" />
                </div>  
                <div class="col-6">
                    <label><b>Email</b></label>
                    <input type="text" class="form-control" id="Email" name="Email"  placeholder="Email" />
                </div>   
                <div class="col-12">
                    <label><b>Địa chỉ</b></label>
                    <input type="text" class="form-control" id="DiaChi" name="DiaChi"  placeholder="Địa chỉ" />
                </div>                  
                <div class="col-12">
                    <input type="text" class="form-control" id="NguoiDung" name="NguoiDung" value="NguoiDung" hidden />
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
                toastr.success("Đã lưu thông tin ngườI dùng")
                $('#dialogNguoiDung').modal('hide');
                load_danhsach_nguoidung();   
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>