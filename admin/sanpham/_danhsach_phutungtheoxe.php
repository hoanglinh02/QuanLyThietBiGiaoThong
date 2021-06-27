<?php
include '../../service/phutung.php';
?>
<?php
$nt = new SanPham();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Chọn thiết bị theo xe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <div class="modal-body">
            <div class="row">
                <table class="table table-bordered" id="tbl_baocao" style="width: 100%">
                    <thead>
                        <tr class="bg-info">
                            <th style="width: 5%;">STT</th>
                            <th style="width: 55%;">Tên thiết bị</th>
                            <th style="width: 40%;">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nguoidung = $nt->DanhSachSanPham();
                        if ($nguoidung) {
                            $i = 0;
                            while ($result = $nguoidung->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><input name="cbx" type="checkbox" class="cbx" value="<?php echo $result['SanPhamID'] ?>" /></td>
                                    <td><?php echo $result['TenSanPham'] ?></td>
                                    <td><input name="SoLuong"  type="text" class="form-control SoLuong"  /></td>
                                </tr>
                            <?php }
                        }  ?>
                    </tbody>
                </table>
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
        var arr = [] 
            $("#tbl_baocao tbody").find("tr").each(function() {
            var row = $(this);
            row.find("input:checked")
            arr.push({
                SanPhamID: row.find("input:checked").val(),
                SoLuong : row.find(".SoLuong").val()
            })
        })
        var arr_data = []
        for(var i = 0; i < arr.length; i++){
            if(arr[i].SanPhamID != ""){
                arr_data.push({
                SanPhamID : arr[i].SanPhamID,
                SoLuong : arr[i].SoLuong
            })
            }
        }
        var jsonString = JSON.stringify(arr_data);
        $form = $(e).closest('form')
        var formData = new FormData($form[0]);
        formData.append("arr", arr_data)
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: {
                phutungtheoxe: "OK",
                arr: jsonString,
                ID: '<?php echo $_GET['id'] ?>'
            },
            cache: false,
            success: function(data) {
                toastr.success("Đã cập nhật thiết bị theo phương tiện")
                $('#dialogPhuTungDiKem').modal('hide');
                load_danhsach_sanpham()
            },
            error: function() {
                console.log("bug")
            }
        });
    };
</script>