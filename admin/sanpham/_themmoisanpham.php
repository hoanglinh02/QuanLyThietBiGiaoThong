<?php
include '../../service/phutung.php';
include '../../lib/session.php';
?>
<?php
$nt = new SanPham();
Session :: checkSession();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
        if ($_GET['id'] > 0) {
            $sanpham = $nt->LoaiXe_GetSingle($_GET['id']);
            while ($result = $sanpham->fetch_assoc()) {
        ?>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-12">
                            <label><b>Tên loại xe</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="TenLoaiXe" name="TenLoaiXe" value="<?php echo $result['TenLoaiXe'] ?>" placeholder="Nhập tên loại xe" />
                        </div>
                        <div class="col-6">
                            <label><b>Biển kiểm soát</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="BienKiemSoat" name="BienKiemSoat" value="<?php echo $result['BienKiemSoat'] ?>" placeholder="Nhập biểm kiểm soát"  />
                        </div>
                        <div class="col-6"></label>
                            <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="GiaBan" name="GiaBan" value="<?php echo $result['GiaBan'] ?>" placeholder="Nhập giá nhập" />
                        </div>
                        <div class="col-6">
                            <label><b>Ảnh đại diện</b><span class="text-danger"> (*)</span></label>
                            <input type="file" class="form-control" id="AnhDaiDien" name="AnhDaiDien" value="<?php echo $result['AnhDaiDien'] ?>" />
                        </div>
                        <div class="col-6" id="hangsx">
                            <label><b>Hãng sản xuất</b></label>
                            <select class="form-control" name="HangXeID">
                                <?php
                                $theloai = $nt->DanhhSachHangXe();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['HangXeID'] ?>"><?php echo $res['TenHangXe'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6" id="congtysd">
                            <label><b>Công ty sử dụng</b></label>
                            <select class="form-control" name="CongTyID">
                                <?php
                                $theloai = $nt->DanhSachCongTySD();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['CongTySuDungID'] ?>"><?php echo $res['TenCongTy'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label><b>Thời gian BH</b></label>
                            <input type="text" class="form-control" id="ThoiGianBaoHanh" name="ThoiGianBaoHanh" value="<?php echo $result['ThoiGianBaoHanh'] ?>" placeholder="Nhập hạn sử dụng" />
                        </div>
                        <div class="col-6">
                            <label><b>Bảo hành từ ngày</b></label>
                            <input type="date" class="form-control" id="TuNgay" name="TuNgay" value="<?php echo $result['TuNgay'] ?>"  />
                        </div>
                        <div class="col-6">
                            <label><b>Đến ngày</b></label>
                            <input type="date" class="form-control" id="DenNgay" name="DenNgay" value="<?php echo $result['DenNgay'] ?>"  />
                        </div>
                        <div class="col-12" style="padding: 5%;">
                            <img style="width: 100%; height: 200px" src="<?php echo $result['AnhDaiDien'] ?>" alt="abc_xyz">
                        </div>
                        <input type="text" class="form-control" id="LoaiXeID" name="LoaiXeID" value="<?php echo $result['LoaiXeID'] ?>" hidden />
                        <input type="text" class="form-control" id="LoaiXe" name="LoaiXe" value="LoaiXe" hidden />
                </div>
                <script>
                        $("#hangsx select").val('<?php echo $result['HangXeID']?>');
                        $("#congtysd select").val('<?php echo $result['CongTySuDungID']?>');

            </script>
            <?php }
        } else { ?>
            <div class="modal-body">
                <div class="row">
                <div class="col-12">
                            <label><b>Tên loại xe</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="TenLoaiXe" name="TenLoaiXe" placeholder="Nhập tên loại xe" />
                        </div>
                        <div class="col-6">
                            <label><b>Biển kiểm soát</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="BienKiemSoat" name="BienKiemSoat" placeholder="Nhập biểm kiểm soát"  />
                        </div>
                        <div class="col-6"></label>
                            <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="GiaBan" name="GiaBan"  placeholder="Nhập giá nhập" />
                        </div>
                        <div class="col-6">
                            <label><b>Ảnh đại diện</b><span class="text-danger"> (*)</span></label>
                            <input type="file" class="form-control" id="AnhDaiDien" name="AnhDaiDien"  />
                        </div>
                        <div class="col-6" id="hangsx">
                            <label><b>Hãng sản xuất</b></label>
                            <select class="form-control" name="HangXeID">
                                <?php
                                $theloai = $nt->DanhhSachHangXe();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['HangXeID'] ?>"><?php echo $res['TenHangXe'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6" id="congtysd">
                            <label><b>Công ty sử dụng</b></label>
                            <select class="form-control" name="CongTyID">
                                <?php
                                $theloai = $nt->DanhSachCongTySD();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['CongTySuDungID'] ?>"><?php echo $res['TenCongTy'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label><b>Thời gian BH</b></label>
                            <input type="text" class="form-control" id="ThoiGianBaoHanh" name="ThoiGianBaoHanh"  placeholder="Nhập thời gian bảo hành" />
                        </div>
                        <div class="col-6">
                            <label><b>Bảo hành từ ngày</b></label>
                            <input type="date" class="form-control" id="TuNgay" name="TuNgay"   />
                        </div>
                        <div class="col-6">
                            <label><b>Đến ngày</b></label>
                            <input type="date" class="form-control" id="DenNgay" name="DenNgay"  />
                        </div>
                        <div class="col-12" style="padding: 5%;">
                            <img style="width: 100%; height: 200px" src="../image/defaul.png" id="link"  alt="abc_xyz">
                        </div>
                        <input type="text" class="form-control" id="LoaiXeID" name="LoaiXeID" hidden />
                        <input type="text" class="form-control" id="LoaiXe" name="LoaiXe" value="LoaiXe" hidden />
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
        $("#GiaBan").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });
       
    function GhiLai(e) {
        $form = $(e).closest('form')
        if($form.valid()){
        
        var form_data = new FormData($form[0]);   
        if($('#AnhDaiDien').val() != ""){
            var file_data = $('#AnhDaiDien').prop('files')[0];                
            form_data.append('file', file_data);
        }
        form_data.append('GiaBan',parseInt($("#GiaBan").val().replace(/\D/g,''),10));
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: form_data,
            dataType: 'text',
            contentType: false,
            processData: false,
            success: function(data) {
                debugger
                toastr.success("Đã lưu phương tiện")
                $('#dialogSanPham').modal('hide');
                load_danhsach_sanpham();
                console.log(data);
            },
            error: function() {
                console.log("bug")
            }
        });
        }
        
    };
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#link').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#AnhDaiDien").change(function() {
  readURL(this);
});

</script>