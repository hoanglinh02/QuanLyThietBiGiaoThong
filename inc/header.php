<?php
include '../../lib/session.php';
Session :: checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Lý Phương Tiện</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../asset/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/plugins/input_picker/jquery.inputpicker.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/dev/dx.common.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/dev/dx.light.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/20.1.7/css/dx.light.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../../asset/AdminLTE/site.css">
    
    

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<style>
  .effect-1 ~ .focus-border{position: absolute; bottom: 0; left: 0; width: 0; height: 2px; background-color: #3399FF; transition: 0.4s;}
.effect-1:focus ~ .focus-border{width: 100%; transition: 0.4s;}
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../asset/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $_SESSION['HoTen'] ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="/QuanLy_ThietBiVanTai/logout.php" class="dropdown-item dropdown-footer"><i class="fas fa-reply"></i> Đăng xuất</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #362d86;">
    <!-- Brand Logo -->
    <a href="/QuanLy_ThietBiVanTai/admin/trangchu/index.php" class="brand-link">
      <img src="../../login/images/xebuyt.jfif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="    font-size: 18px;">Quản Lý Phương Tiện </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../asset/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['HoTen'] ?></a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->          
          <li class="nav-item">
            <a href="/QuanLy_ThietBiVanTai/admin/trangchu/index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Trang chủ
              </p>
            </a>
          </li>
          <?php if($_SESSION['QuyenTruyCap'] == "ADMIN") {
          ?>  <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-caret-square-right"></i>
                    <p>
              Danh mục
              <i class="nav-icon fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="/QuanLy_ThietBiVanTai/admin/danhmuc/congtysudung.php" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>Công ty sử dụng xe</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="/QuanLy_ThietBiVanTai/admin/danhmuc/hangxe.php" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>Hãng xe</p>
              </a>
            </li>  
            <li class="nav-item">
              <a href="/QuanLy_ThietBiVanTai/admin/danhmuc/nhasanxuat.php" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>Nhà phân phối thiết bị</p>
              </a>
            </li>     
            <li class="nav-item">
              <a href="/QuanLy_ThietBiVanTai/admin/danhmuc/loaiphutung.php" class="nav-link">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>Loại thiết bị</p>
              </a>
            </li>                                                                
          </ul>                     
        </li>    

          <?php }?>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-car"></i>
                      <p>
                Sản phẩm
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/sanpham/loaixe.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Phương tiện</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/sanpham/phutung.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Thiết bị</p>
                </a>
              </li>    
                                                                                           
            </ul>                     
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-warehouse"></i>
                      <p>
                      Báo cáo
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/baocao/loaixe.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Phương tiện</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/baocao/nhapkho.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Thiết bị</p>
                </a>
              </li>    
                                                                                           
            </ul>                     
          </li>   
          <?php if($_SESSION['QuyenTruyCap'] == "ADMIN") {
          ?>  
            <li class="nav-item">
              <a href="/QuanLy_ThietBiVanTai/admin/nguoidung/index.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Người dùng
                  
                </p>
              </a>
                        
            </li>
          <?php } ?>
          
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Quản lý đơn hàng
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/donhang/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Danh sách đơn hàng</p>
                </a>
              </li>                                      
            </ul>
          </li>
          <?php if($_SESSION['QuyenTruyCap'] == "ADMIN") {
          ?>  
             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Quản lý kho
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/sanpham/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Nhập kho</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/nhacungcap/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Nhà cung cấp</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/loaithuoc/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Thể loại</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/kieuban/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Kiểu bán</p>
                </a>
              </li>                         
            </ul>
          </li>      
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Người dùng
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/nguoidung/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Nhân viên</p>
                </a>
              </li>     
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/khachhang/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>                                                      
            </ul>            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>    
                      <p>
                Báo cáo
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/baocao/doanhthu.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Doanh thu</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/baocao/nhapkho.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Nhập kho</p>
                </a>
              </li>      
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/baocao/donhang.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Đơn hàng</p>
                </a>
              </li>                                                 
            </ul>                     
          </li>  
         <?php } ?>           -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-exclamation-circle"></i>    
                      <p>
                Cảnh báo
                <i class="nav-icon fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/QuanLy_ThietBiVanTai/admin/canhbao/index.php" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <p>Cảnh báo</p>
                </a>
              </li>                                                                   
            </ul>                     
          </li>     -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <!-- /.content-header -->