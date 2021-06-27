<?php
include '../../inc/header.php';
?>
<?php
include '../../service/trangchu.php';
?>
<?php
$nt = new TrangChu();
$TongTienXe = 0;
$TongTienPhuTung = 0;
?>
<?php
$nhacungcap = $nt->TongTienSanPham();
if ($nhacungcap) {
  $i = 0;
  while ($result = $nhacungcap->fetch_assoc()) {

    $TongTienPhuTung += $result['GiaNhap'];
  }
}
?>
<?php
$nhacungcap = $nt->TongTienLoaiXe();
if ($nhacungcap) {
  $i = 0;
  while ($result = $nhacungcap->fetch_assoc()) {

    $TongTienXe += $result['GiaBan'];
  }
} 
?>
<div class="content-wrapper" style="min-height: 350px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo  $count = $nt->SanPhamTrongKho(); ?></h3>
              <p> Số lượng đối tượng thiết bị &nbsp;&nbsp;&nbsp;<i class="fas fa-cog fa-2x"></i></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/QuanLy_ThietBiVanTai/admin/sanpham/phutung.php" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo number_format($TongTienPhuTung) ?><sup style="font-size: 20px"></sup></h3>
              <p>Tổng tiền nhập thiết bị &nbsp;&nbsp;&nbsp;<i class="fas fa-comment-dollar fa-2x"></i></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $count = $nt->SoLuongXe(); ?></h3>
              <p>Số lượng xe  &nbsp;&nbsp;&nbsp;<i class="fas fa-car fa-2x"></i></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/QuanLy_ThietBiVanTai/admin/sanpham/loaixe.php" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo number_format($TongTienXe) ?></h3>
              <p>Tổng tiền nhập xe &nbsp;&nbsp;&nbsp;<i class="fas fa-comment-dollar fa-2x"></i></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">&nbsp;</a>

          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <canvas class="col-md-6" id="DaonhThu">

        </canvas>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
include '../../inc/footer.php';
?>
<script>
  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Min and Max Settings'
        }
      },
      scales: {
        y: {
          min: 10,
          max: 50,
        }
      }
    },
  };
  const DATA_COUNT = 7;
  const NUMBER_CFG = {
    count: DATA_COUNT,
    min: 0,
    max: 100
  };

  const labels = Utils.months({
    count: 7
  });
  const data = {
    labels: labels,
    datasets: [{
        label: 'Dataset 1',
        data: [10, 30, 50, 20, 25, 44, -10],
        borderColor: Utils.CHART_COLORS.red,
        backgroundColor: Utils.CHART_COLORS.red,
      },
      {
        label: 'Dataset 2',
        data: [100, 33, 22, 19, 11, 49, 30],
        borderColor: Utils.CHART_COLORS.blue,
        backgroundColor: Utils.CHART_COLORS.blue,
      }
    ]
  };
  module.exports = {
    config: config,
  };
  var myChart = new Chart(
    document.getElementById('DaonhThu'),
    config
  );
</script>