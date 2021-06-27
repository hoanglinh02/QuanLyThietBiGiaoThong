<?php
include '../../service/nguoidung.php';
?>
<?php
$nt = new NguoiDung();
?>
<table class="table table-bordered" id="tbl_nhacungcap" style="width: 100%">
    <thead>
    <tr class="bg-info">
            <th style="width: 5%;">STT</th>
            <th style="width: 15%;">Họ tên</th>
            <th style="width: 10%;">Tên đăng nhập</th>
            <th style="width: 10%;">Ngày sinh</th>
            <th style="width: 15%;">Email</th>
            <th style="width: 15%;">Trạng thái</th>
            <th style="width: 25%;">Địa chỉ</th>
            <th style="width: 5%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nguoidung = $nt->DanhSachNguoiDung();
        if ($nguoidung) {
            $i = 0;
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['HoVaTen'] ?></td>
                    <td><?php echo $result['TenDangNhap'] ?></td>
                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgaySinh']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?></td>
                    <td><?php echo $result['Email'] ?></td>
                    <td style="cursor: pointer;">
                        <?php 
                            if($result['TrangThai'] == 1){
                        ?>
                        <span><i class="fas fa-lock-open" onclick="ThayDoiTrangThai(<?php echo $result['NguoiDungID'] ?>,<?php echo $result['TrangThai'] ?>)"></i> Đang hoạt động</span>
                        <?php }else{?>
                            <span><i class="fas fa-lock" onclick="ThayDoiTrangThai(<?php echo $result['NguoiDungID'] ?>,<?php echo $result['TrangThai'] ?>)"></i> Tạm khoá</span>
                        <?php }?>
                    </td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td>
                            <div class="dropdown">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="ThemMoiNguoiDung(<?php echo $result['NguoiDungID'] ?>)"><i class="fas fa-edit"></i> Sửa</a>
                                <a class="dropdown-item" href="#" onclick="XoaNguoiDung(<?php echo $result['NguoiDungID'] ?>)" ><i class="fas fa-trash-alt"></i> Xóa</a>
                                <a class="dropdown-item" href="#" onclick="PhanQuyen(<?php echo $result['NguoiDungID'] ?>)" ><i class="fas fa-user"></i> Phân quyền</a>

                            </div>
                        </div>     
                    </td>
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