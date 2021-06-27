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
        <h5 class="modal-title">THÊM MỚI THIẾT BỊ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
        if ($_GET['id'] > 0) {
            $sanpham = $nt->SanPham_GetSingle($_GET['id']);
            while ($result = $sanpham->fetch_assoc()) {
        ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label><b>Tên Thiết Bị</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" value="<?php echo $result['TenSanPham'] ?>" placeholder="Nhập tên sản phẩm" />
                        </div>
                        <div class="col-6"></label>
                            <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="GiaNhap" name="GiaNhap" value="<?php echo $result['GiaNhap'] ?>" placeholder="Nhập giá nhập" />
                        </div>
                        <div class="col-6">
                            <label><b>Số lượng</b><span class="text-danger"> (*)</span></label>
                            <input type="number" class="form-control" id="SoLuong" name="SoLuong" value="<?php echo $result['SoLuong'] ?>" placeholder="Nhập số lượng"  />
                        </div>
                        <div class="col-12">
                            <label><b>Thời gian BH</b></label>
                            <input type="text" class="form-control" id="ThoiGianBaoHanh" name="ThoiGianBaoHanh" value="<?php echo $result['ThoiGianBaoHanh'] ?>" placeholder="Nhập hạn sử dụng" />
                        </div>
                        <div class="col-6">
                            <label><b>Bảo hành từ ngày</b></label>
                            <input type="date" class="form-control" id="ThoiGianBaoHanh" name="ThoiGianBaoHanh" value="<?php echo $result['TuNgay'] ?>"  />
                        </div>
                        <div class="col-6">
                            <label><b>Đến ngày</b></label>
                            <input type="date" class="form-control" id="DenNgay" name="DenNgay" value="<?php echo $result['DenNgay'] ?>"  />
                        </div>
                        <div class="col-12" style="padding: 5%;">
                            <img style="width: 100%; height: 200px" src="<?php echo $result['AnhDaiDien'] ?>" alt="abc_xyz">
                        </div>
                        <div class="col-6" id="LoaiPhuTung">
                            <label><b>Loại phụ tùng</b></label>
                            <select class="form-control" name="LoaiPhuTungID">
                                <?php
                                $theloai = $nt->DanhSachLoaiPhuTung();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['LoaiPhuTungID'] ?>"><?php echo $res['TenLoaiPhuTung'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6" id="NhaSanXuat">
                            <label><b>Nhà sản xuất</b></label>
                            <select class="form-control" name="NhaSanXuatID">
                                <?php
                                $kieuban = $nt->DanhSachNhaSanXuat();
                                while ($res_kb = $kieuban->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res_kb['NhaSanXuatID'] ?>"><?php echo $res_kb['TenNhaSanXuat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label><b>Chi tiết</b></label>
                            <textarea class="form-control" name="ChiTiet"><?php echo $result['ChiTiet'] ?>
                            </textarea>
                        </div>
                        <input type="text" class="form-control" id="SanPhamID" name="SanPhamID" value="<?php echo $result['SanPhamID'] ?>" hidden />
                        <input type="text" class="form-control" id="SanPham" name="SanPham" value="SanPham" hidden />
                        <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" value="1" hidden />
                    </div>
                </div>
                <script>
                     $("#LoaiPhuTung select").val('<?php echo $result['LoaiPhuTungID']?>');
                     $("#NhaSanXuat select").val('<?php echo $result['NhaSanXuatID']?>');
                </script>
            <?php }
        } else { ?>
            <div class="modal-body">
            <div class="row">
                        <div class="col-12">
                            <label><b>Tên thiết bị</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="TenSanPham" name="TenSanPham"  placeholder="Nhập tên sản phẩm" />
                        </div>
                        <div class="col-6"></label>
                            <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                            <input type="text" class="form-control" id="GiaNhap" name="GiaNhap"  placeholder="Nhập giá nhập" />
                        </div>
                        <div class="col-6">
                            <label><b>Số lượng</b><span class="text-danger"> (*)</span></label>
                            <input type="number" class="form-control" id="SoLuong" name="SoLuong"  placeholder="Nhập số lượng" />
                        </div>
                        <div class="col-6">
                            <label><b>Ảnh đại diện</b><span class="text-danger"> (*)</span></label>
                            <input type="file" class="form-control" id="AnhDaiDien" name="AnhDaiDien"  />
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
                            <input type="date" class="form-control" id="DenNgay" name="DenNgay"   />
                        </div>
                        <div class="col-12" style="padding: 5%;">
                        <img style="width: 100%; height: 300px" src="../image/defaul.png" id="link" alt="">
                            </div>
                        <div class="col-6" id="loaiphutung">
                            <label><b>Loại thiết bị</b></label>
                            <select class="form-control" name="LoaiPhuTungID">
                                <?php
                                $theloai = $nt->DanhSachLoaiPhuTung();
                                while ($res = $theloai->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res['LoaiPhuTungID'] ?>"><?php echo $res['TenLoaiPhuTung'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6" id="nhasanxuat">
                            <label><b>Nhà sản xuất</b></label>
                            <select class="form-control" name="NhaSanXuatID">
                                <?php
                                $kieuban = $nt->DanhSachNhaSanXuat();
                                while ($res_kb = $kieuban->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $res_kb['NhaSanXuatID'] ?>"><?php echo $res_kb['TenNhaSanXuat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label><b>Chi tiết</b></label>
                            <textarea class="form-control" name="ChiTiet">
                            </textarea>
                        </div>
                        <input type="text" class="form-control" id="SanPhamID" name="SanPhamID" value="0" hidden />
                        <input type="text" class="form-control" id="SanPham" name="SanPham" value="SanPham" hidden />
                        <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" value="1" hidden />
                    </div>
            </div>
            <script>
                        $("#nhasanxuat select").val('<?php echo $result['NhaSanXuatID']?>');
                        $("#loaiphutung select").val('<?php echo $result['LoaiPhuTungID']?>');
            </script>
<?php } ?>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    <button type="button" class="btn btn-primary" onclick="GhiLai(this)">Ghi lại</button>
</div>
</form>
</div>
<script>
        $("#GiaNhap").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });
    function GhiLai(e) {
        $form = $(e).closest('form')
        if($form.valid()){
        var form_data = new FormData($form[0]);   
        if($('#AnhDaiDien').val() != "" && $('#AnhDaiDien').val() != undefined){
            var file_data = $('#AnhDaiDien').prop('files')[0];                
            form_data.append('file', file_data);
        }else if($("#SanPhamID").val() <= 0){
            toastr.error("Vui lòng chọn ảnh")
            return false;
        }
        form_data.append('ChiTiet',CKEDITOR.instances['ChiTiet'].getData());
        form_data.append('GiaNhap',parseInt($("#GiaNhap").val().replace(/\D/g,''),10));
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: form_data,
            dataType: 'text',
            contentType: false,
            processData: false,
            success: function(data) {
                debugger
                toastr.success("Đã lưu thông tin phụ tùng")
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
CKEDITOR.replace('ChiTiet');

</script>