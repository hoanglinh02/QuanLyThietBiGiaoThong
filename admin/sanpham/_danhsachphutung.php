<?php
include '../../service/phutung.php';
include '../../lib/session.php';
?>
<?php
$nt = new SanPham();
Session :: checkSession();

?>
<table  class="table table-bordered" id="tbl_nhacungcap" style="width: 100%">
    <thead>
        <tr class="bg-info">
            <th style="width: 5%;">STT</th>
            <th style="width: 15%;">Tên thiết bị</th>
            <th style="width: 10%;">Thuộc loại</th>
            <th style="width: 10%;">Nhà SX</th>
            <th style="width: 5%;">Số lượng</th>
            <th style="width: 10%;">Ảnh</th>
            <th style="width: 10%;">Đã bảo dưỡng</th>
            <th style="width: 10%;">Ngày bảo dưỡng</th>
            <th style="width: 10%;">Ngày hết BH</th>
            <th style="width: 10%;">Ngày tạo</th>
            <th style="width: 5%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sanpham = $nt->DanhSachSanPham();
        if ($sanpham) {
            $i = 0;
            while ($result = $sanpham->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenSanPham'] ?></td>
                    <td><?php echo $result['TenLoaiPhuTung'] ?></td>
                    <td><?php echo $result['TenNhaSanXuat'] ?></td>
                    <td><?php echo $result['SoLuong'] ?></td>
                    <td><img style="width:100px; height: 100px;" src="<?php echo $result['AnhDaiDien'] ?>" /></td>                   
                    <td style="cursor: pointer; text-align: center">
                        <?php 
                            if($result['TinhTrangBaoDuong'] == 1){
                        ?>
                        <i class="fas fa-check"></i>
                        <?php }else {?>
                            <i class="fas fa-times"></i>
                        <?php }?>
                    </td>
                    <td>
                    <?php 
                            if($result['NgayBaoDuong'] != null){
                        ?>
                        <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayBaoDuong']);
                            $formattedweddingdate = $myDateTime->format('d-m-Y');
                            echo $formattedweddingdate ?>
                        <?php }else {?>
                            
                        <?php }?>
                        
                    </td>
                    <td>
                    <?php 
                            if($result['DenNgay'] != null){
                        ?>
                        <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['DenNgay']);
                            $formattedweddingdate = $myDateTime->format('d-m-Y');
                            echo $formattedweddingdate ?>
                        <?php }else {?>
                            
                        <?php }?>
                       
                    </td>
                    <td>
                    <?php 
                    if($result['DenNgay'] != null){
                        ?>
                        <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                            $formattedweddingdate = $myDateTime->format('d-m-Y');
                            echo $formattedweddingdate ?>
                        <?php }else {?>
                            
                        <?php }?>
                      
                    </td>
                    <?php 
                    if($result['TinhTrangBaoDuong'] == 1){
                        ?>
                    <td> 
                    <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="ThemMoiSanPham(<?php echo $result['SanPhamID'] ?>)"><i class="fas fa-edit"></i> Sửa</a>
                                <?php if($_SESSION['QuyenTruyCap'] == "ADMIN") {
                                    ?>  
                                         <a class="dropdown-item" href="#" onclick="XoaSanPham(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-trash-alt"></i> Xóa</a>

                                    <?php }?>
                                <a class="dropdown-item" href="#" onclick="NhapKho(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-sign-in-alt"></i> Nhập kho</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-check"></i> Đã bảo dưỡng</a>

                            </div>
                        </div>   
                        </td> 

                    <?php }else {?>
                        <td>   <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="ThemMoiSanPham(<?php echo $result['SanPhamID'] ?>)"><i class="fas fa-edit"></i> Sửa</a>
                                <?php if($_SESSION['QuyenTruyCap'] == "ADMIN") {
                                    ?>  
                                         <a class="dropdown-item" href="#" onclick="XoaSanPham(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-trash-alt"></i> Xóa</a>

                                    <?php }?>                                <a class="dropdown-item" href="#" onclick="NhapKho(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-sign-in-alt"></i> Nhập kho</a>
                                <a class="dropdown-item" href="#" onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-exchange-alt"></i> Bảo dưỡng</a>

                            </div>
                        </div>   
                        </td> 
                            <?php }?>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>
<script>
    $("#tbl_nhacungcap").dataTable({
        "ordering": false,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
            "emptyTable": "Chưa có dữ liệu",
            "zeroRecords": "Nothing found - sorry",
            "info": "Hiển thị từ _PAGE_ bản ghi đến _PAGES_ bản ghi",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Tìm kiếm",
            "processing": "Đang tải ...",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Tiếp theo",
                "previous": "Quay lại",
                "zeroRecords": "Chưa có dữ liệu",
                "zeroRecords": "Chưa có bản ghi nào",


            }
        }
    })
</script>