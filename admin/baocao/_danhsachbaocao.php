<?php
include '../../service/nhapkho.php';
?>
<?php
$nt = new NhapKho();
?>
<div class="col-md-3">
                    <button class="btn btn-info" style="margin-top: 13%;" type="button" onclick="XuatExcel()"><i class="fas fa-file-excel"></i>  Xuất excel</button>
</div>
<table class="table table-bordered" id="tbl_baocao" style="width: 100%">
    <thead>
        <tr class="bg-info">
            <th style="width: 5%;">STT</th>
            <th style="width: 35%;">Tên thiết bị</th>
            <th style="width: 10%;">Loại thiết bị</th>
            <th style="width: 10%;">Nhà sản xuất</th>
            <th style="width: 10%;">Số lượng nhập</th>
            <th style="width: 10%;">Đơn giá</th>
            <th style="width: 10%;">Thành tiền</th>
            <th style="width: 10%;">Ngày nhập</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nguoidung = $nt->DanhSachNhapKho($_GET['TuNgay'], $_GET['DenNgay'], $_GET['NguoiDungID']);
        if ($nguoidung) {
            $i = 0;
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenSanPham'] ?></td>
                    <td><?php echo $result['TenLoaiPhuTung'] ?></td>
                    <td><?php echo $result['TenNhaSanXuat'] ?></td>
                    <td><?php echo $result['SoLuongNhap'] ?></td>
                    <td><?php echo number_format($result['ThanhTien'])?></td>
                    <td><?php echo number_format($result['DonGia']) ?></td>

                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayNhap']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?></td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>
<script>
    $("#tbl_baocao").dataTable({
        "ordering": false,
        "info": true,
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
        },
        buttons: [
            {
                text: '<i class="fas fa-chart-bar"></i> Thống kê',
                className: 'btn btn-outline-primary rounded btn-sm  mr-2',
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary buttons-excel buttons-html5')
                },
                action: function (e, dt, node, config) {
                    ThongKeSoLuongCanBoTheoNam();
                }
            }
        ]
    })
</script>