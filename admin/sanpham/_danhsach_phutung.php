<?php
include '../../service/sanpham.php';
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
            <h5 class="modal-title">Thiết bị theo xe: <b><?php echo $_GET['TenXe'] ?></b> - BKS : <b><?php echo $_GET['BienKS'] ?></b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered" id="tbl_baocao" style="width: 100%">
        <thead>
        <tr class="bg-info">
            <th style="width: 5%;">STT</th>
            <th style="width: 75%;">Tên thiết bị</th>
            <th style="width: 20%;">Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nguoidung = $nt->DanhSachPhuTungTheoXe($_GET['id']);
        if ($nguoidung) {
            $i = 0;
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenSanPham'] ?></td>
                    <td><?php echo $result['SoLuong'] ?></td>
                </tr>
        <?php }
        } else{?>    
                <tr>
                    <td colspan="3">Chưa có thiết bị</td>
                </tr>
        <?php }?>
    </tbody>
</table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
</div>

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