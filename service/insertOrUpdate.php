<?php
   $conn = mysqli_connect("localhost", "root", "", "quanly_thietbi");

   if ($_POST["phutungtheoxe"] == "OK") {
      $arr = json_decode(stripslashes($_POST['arr']));
      $ID = $_POST["ID"];
      foreach($arr as $d){
         $query = "INSERT INTO phutungtheoxe(SanPhamID, PhuTungID,SoLuong) VALUES ('$ID', '$d->SanPhamID', '$d->SoLuong' )";
         $result = mysqli_query($conn, $query); 
      }
   }
   if ($_POST["PhuTung"] == "ThemPhuTung") {
      $date = date('Y-m-d H:i:s');
      $TenLoaiPhuTung = $_POST['TenLoaiPhuTung'];
      $LoaiPhuTungID = $_POST['LoaiPhuTungID'];
      $NhaSanXuatID = $_POST['NhaSanXuatID'];
      if($LoaiPhuTungID > 0){
         $query = "UPDATE loaiphutung SET TenLoaiPhuTung = '$TenLoaiPhuTung', NhaSanXuatID = '$NhaSanXuatID' WHERE LoaiPhuTungID = '$LoaiPhuTungID'";
         return $result = mysqli_query($conn, $query);
      }else{
         $query = "INSERT INTO loaiphutung (TenLoaiPhuTung, NhaSanXuatID,NgayTao,DaXoa) VALUES
         ('$TenLoaiPhuTung', '$NhaSanXuatID', '$date',0)";
         $result = mysqli_query($conn, $query);
      }
     
   }
   if ($_POST["PhuTung"] == "RemovePhuTung") {
      $LoaiPhuTungID = $_POST['id'];
      if($LoaiPhuTungID > 0){
         $query = "UPDATE loaiphutung SET  DaXoa = 1 WHERE LoaiPhuTungID = '$LoaiPhuTungID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["CongTy"] == "ThemCongTy") {
      $date = date('Y-m-d H:i:s');
      $TenCongTy = $_POST['TenCongTy'];
      $GiayPhepKinhDoanh = $_POST['GiayPhepKinhDoanh'];
      $CongTySuDungID = $_POST['CongTySuDungID'];
      if($CongTySuDungID > 0){
         $query = "UPDATE congtysudung SET TenCongTy = '$TenCongTy', GiayPhepKinhDoanh = '$GiayPhepKinhDoanh' WHERE CongTySuDungID = '$CongTySuDungID'";
         return $result = mysqli_query($conn, $query);
      }else{
         $query = "INSERT INTO congtysudung (TenCongTy, GiayPhepKinhDoanh,NgayTao,DaXoa) VALUES
         ('$TenCongTy', '$GiayPhepKinhDoanh', '$date',0)";
         $result = mysqli_query($conn, $query);
      }
     
   }
   if ($_POST["CongTy"] == "RemoveCongTy") {
      $CongTySuDungID = $_POST['id'];
      if($CongTySuDungID > 0){
         $query = "UPDATE congtysudung SET  DaXoa = 1 WHERE CongTySuDungID = '$CongTySuDungID'";
         return $result = mysqli_query($conn, $query);
      }
   }

   if ($_POST["HangXe"] == "ThemHangXe") {
      $date = date('Y-m-d H:i:s');
      $TenHangXe = $_POST['TenHangXe'];
      $NuocSanXuat = $_POST['NuocSanXuat'];
      $HangXeID = $_POST['HangXeID'];
      if($HangXeID > 0){
         $query = "UPDATE hangxe SET TenHangXe = '$TenHangXe', NuocSanXuat = '$NuocSanXuat' WHERE HangXeID = '$HangXeID'";
         return $result = mysqli_query($conn, $query);
      }else{
         $query = "INSERT INTO hangxe (TenHangXe, NuocSanXuat,NgayTao,DaXoa) VALUES
         ('$TenHangXe', '$NuocSanXuat', '$date',0)";
         $result = mysqli_query($conn, $query);
      }
     
   }
   if ($_POST["HangXe"] == "RemoveHangXe") {
      $HangSanXuatID = $_POST['id'];
      if($HangSanXuatID > 0){
         $query = "UPDATE hangxe SET  DaXoa = 1 WHERE HangXeID = '$HangSanXuatID'";
         return $result = mysqli_query($conn, $query);
      }
   }


   if ($_POST["NhaSanXuat"] == "ThemNhaSanXuat") {
      $date = date('Y-m-d H:i:s');
      $TenNhaSanXuat = $_POST['TenNhaSanXuat'];
      $DiaChi = $_POST['DiaChi'];
      $GiayPhepKinhDoanh = $_POST['GiayPhepKinhDoanh'];
      $MoTa = $_POST['MoTa'];
      $NhaSanXuatID = $_POST['NhaSanXuatID'];
      if($NhaSanXuatID > 0){
         $query = "UPDATE nhasanxuat SET TenNhaSanXuat = '$TenNhaSanXuat', DiaChi = '$DiaChi', GiayPhepKinhDoanh = '$GiayPhepKinhDoanh', MoTa = '$MoTa' WHERE NhaSanXuatID = '$NhaSanXuatID'";
         return $result = mysqli_query($conn, $query);
      }else{
         $query = "INSERT INTO nhasanxuat (TenNhaSanXuat, DiaChi, GiayPhepKinhDoanh, MoTa, NgayTao,DaXoa) VALUES
         ('$TenNhaSanXuat', '$DiaChi', '$GiayPhepKinhDoanh', '$MoTa', '$date',0)";
         $result = mysqli_query($conn, $query);
      }
     
   }
   if ($_POST["NhaSanXuat"] == "RemoveNhaSanXuat") {
      $NhaSanXuatID = $_POST['id'];
      if($NhaSanXuatID > 0){
         $query = "UPDATE nhasanxuat SET  DaXoa = 1 WHERE NhaSanXuatID = '$NhaSanXuatID'";
         return $result = mysqli_query($conn, $query);
      }
   }


   if ($_POST["SanPham"] == "SanPham") {
      $date = date('Y-m-d H:i:s');
      $TenSanPham = $_POST['TenSanPham'];
      $LoaiPhuTungID = $_POST['LoaiPhuTungID'];
      $NhaSanXuatID = $_POST['NhaSanXuatID'];
      $GiaNhap = $_POST['GiaNhap'];
      $ThoiGianBaoHanh = $_POST['ThoiGianBaoHanh'];
      $TuNgay = $_POST['TuNgay'];
      $DenNgay = $_POST['DenNgay'];
      $SoLuong = $_POST['SoLuong'];
      $ChiTiet = $_POST['ChiTiet'];
      $SanPhamID =  $_POST['SanPhamID'];
      $TongTien = (int)$GiaNhap * (int)$SoLuong;
      $query_nhapkho = "INSERT INTO log_nhapkho (TenSanPham, SoLuongNhap,DonGia, ThanhTien, NgayNhap, LoaiPhuTungID, NhaSanXuatID) 
       VALUES('$TenSanPham', '$SoLuong', '$TongTien','$GiaNhap', '$date','$LoaiPhuTungID','$NhaSanXuatID')";
       mysqli_query($conn, $query_nhapkho);
      if ($SanPhamID > 0) {
         $query = "UPDATE SanPham SET
          TenSanPham = '$TenSanPham',
          ChiTiet = '$ChiTiet',
          LoaiPhuTungID = '$LoaiPhuTungID',
          NhaSanXuatID = '$NhaSanXuatID',
          GiaNhap = '$GiaNhap',
          ThoiGianBaoHanh = '$ThoiGianBaoHanh',
          TuNgay = '$TuNgay',
          DenNgay = '$DenNgay'
         WHERE SanPhamID = '$SanPhamID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $AnhDaiDien = '../../uploads/' . $_FILES['file']['name'];
         if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);
        }
         $query = "INSERT INTO sanPham
          (
          TenSanPham,
          NgayTao,
          ChiTiet,
          AnhDaiDien,
          SoLuong,
          GiaNhap,
          TuNgay,
          DenNgay,
          ThoiGianBaoHanh,
          LoaiPhuTungID,
          NhaSanXuatID
          ) VALUES
         ('$TenSanPham',
          '$date',
           '$ChiTiet',
            '$AnhDaiDien',
             '$SoLuong',
             '$GiaNhap',
             '$TuNgay',
             '$DenNgay',
             '$ThoiGianBaoHanh',
             '$LoaiPhuTungID',
             '$NhaSanXuatID'
             )";      
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["LoaiXe"] == "LoaiXe") {
      $date = date('Y-m-d H:i:s');
      $LoaiXeID = $_POST['LoaiXeID'];
      $TenLoaiXe = $_POST['TenLoaiXe'];
      $BienKiemSoat = $_POST['BienKiemSoat'];
      $GiaBan = $_POST['GiaBan'];
      $HangXeID = $_POST['HangXeID'];
      $CongTyID = $_POST['CongTyID'];
      $ThoiGianBaoHanh = $_POST['ThoiGianBaoHanh'];
      $TuNgay = $_POST['TuNgay'];
      $DenNgay = $_POST['DenNgay'];  

      if ($LoaiXeID > 0) {
         $query = "UPDATE loaixe SET
          TenLoaiXe = '$TenLoaiXe',
          HangXeID = '$HangXeID',
          CongTyID = '$CongTyID',
          ThoiGianBaoHanh = '$ThoiGianBaoHanh',
          TuNgay = '$TuNgay',
          DenNgay = '$DenNgay',
          GiaBan = '$GiaBan',
          BienKiemSoat = '$BienKiemSoat'
         WHERE LoaiXeID = '$LoaiXeID'";
         return $result = mysqli_query($conn, $query);

      } else {
         $AnhDaiDien = '../../uploads/' . $_FILES['file']['name'];
         if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);
        }
        $query_nhapkho = "INSERT INTO log_loaixe(TenLoaiXe, AnhD, HangXeID, CongTyID, GiaBan, BienKiemSoat, NgayNhap) 
       VALUES('$TenLoaiXe', '$AnhDaiDien', '$HangXeID', '$CongTyID','$GiaBan','$BienKiemSoat', '$date')";
       mysqli_query($conn, $query_nhapkho);

         $query = "INSERT INTO loaixe
          (
         TenLoaiXe,
          AnhDaiDien,
          HangXeID,
          CongTyID,
          ThoiGianBaoHanh,
          TuNgay,
          DenNgay,
          GiaBan,
          BienKiemSoat,
          NgayTao,
          DaXoa
          ) VALUES
         ('$TenLoaiXe',
          '$AnhDaiDien',
           '$HangXeID',
            '$CongTyID',
             '$ThoiGianBaoHanh',
             '$TuNgay',
             '$DenNgay',
             '$GiaBan',
             '$BienKiemSoat',
             '$date',
             0
             )";      
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["PhuTung"] == "Remove") {
      $id = $_POST["id"];
      $query = "UPDATE sanpham SET DaXoa = 1 WHERE SanPhamID = '$id'";
      return  mysqli_query($conn, $query);
   }

   if ($_POST["KhachHangr"] == "RemoveKhachHang") {
      $id = $_POST["id"];
      $query = "UPDATE khachhang SET DaXoa = 1 WHERE khachhangID = '$id'";
      return  mysqli_query($conn, $query);
   }
   if ($_POST["KhachHang"] == "ThemKhachHang") {
      $date = date('Y-m-d H:i:s');
      $TenKhachHang = $_POST['TenKhachHang'];
      $SoDienThoai = $_POST['SoDienThoai'];
      $DiaChi = $_POST['DiaChi'];
      $NguoiTaoID = $_POST['NguoiTaoID'];
      $query = "INSERT INTO khachhang (TenKhachHang, SoDienThoai, DiaChi,NguoiTaoID,NgayTao,DaXoa) VALUES
         ('$TenKhachHang', '$SoDienThoai', '$DiaChi', '$NguoiTaoID', '$date',0)";
       $result = mysqli_query($conn, $query);
   }
   if ($_POST["DonHang"] == "TrangThaiDonHang") {
      $DonHangID =  $_POST['DonHangID'];
      $TrangThai =  $_POST['TrangThai'];
      $query = "UPDATE Order2 SET TrangThai = '$TrangThai' WHERE OrderID = '$DonHangID'";
      $result = mysqli_query($conn, $query);
      $select_query = "SELECT * FROM Order2 WHERE OrderID = '$DonHangID'";
      $kq = mysqli_query($conn, $select_query);
      $query_logdonhang = "UPDATE log_donhang SET TrangThai = '$TrangThai' WHERE OrderID = '$DonHangID'";
      mysqli_query($conn, $query_logdonhang);
      while ($a = $kq->fetch_assoc()) {        
         $TenSanPham = $a['MaDonHang'];
         $ThanhTien = $a['TongTien'];
         $NgayTao = $a['NgayTao'];
         $NguoiDungID = $a['NguoiTaoID'];
         $TenNguoiBan = $a['TenNguoiTao'];
         $TrangThai = $a['TrangThai'];
         if($TrangThai == 2){
            $query_donhang = "INSERT INTO log_doanhthu(TenSanPham,ThanhTien,NgayTao,NguoiDungID,TenNguoiBan,TrangThai)
            VALUES('$TenSanPham','$ThanhTien','$NgayTao','$NguoiDungID','$TenNguoiBan',$TrangThai)";
            return mysqli_query($conn, $query_donhang);
          }

      }
         
   }
   if ($_POST["NhaCungCap"] == "NhaCungCap") {
      $date = date('Y-m-d H:i:s');
      $TenNhaThuoc = $_POST['TenNhaThuoc'];
      $SoDangKy = $_POST['SoDangKy'];
      $NgayDangKy = $_POST['NgayDangKy'];
      $DiaChi = $_POST['DiaChi'];
      $NhaThuocID =  $_POST['NhaThuocID'];
      if ($NhaThuocID > 0) {
         $query = "UPDATE nhathuoc SET TenNhaThuoc = '$TenNhaThuoc', SoDangKy = '$SoDangKy', NgayDangKy = '$NgayDangKy', DiaChi = '$DiaChi' WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO nhathuoc (TenNhaThuoc, SoDangKy, NgayDangKy, DiaChi,NgayTao) VALUES
            ('$TenNhaThuoc', '$SoDangKy', '$NgayDangKy', '$DiaChi', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["NhaCungCap"] == "Remove") {
      $NhaThuocID =  $_POST['id'];
      $query = "UPDATE nhathuoc SET DaXoa = 1 WHERE NhaThuocID = '$NhaThuocID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["NhaCungCap"] == "Change") {
      $NhaThuocID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE nhathuoc SET TrangThai = 0 WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE nhathuoc SET TrangThai = 1 WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TheLoai"] == "TheLoai") {
      $date = date('Y-m-d H:i:s');
      $TenTheLoai = $_POST['TenTheLoai'];
      $TheLoaiID = $_POST['TheLoaiID'];       
      if ($TheLoaiID > 0) {
         $query = "UPDATE theloai SET TenTheLoai = '$TenTheLoai' WHERE TheLoaiID = '$TheLoaiID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO theloai (TenTheLoai,NgayTao) VALUES
            ('$TenTheLoai', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TheLoai"] == "RemoveTheLoai") {
      $TheLoaiID = $_POST['id'];       
      if ($TheLoaiID > 0) {
         $query = "UPDATE theloai SET DaXoa = 1 WHERE TheLoaiID = '$TheLoaiID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["KieuBan"] == "KieuBan") {
      $date = date('Y-m-d H:i:s');
      $TenKieuBan = $_POST['TenKieuBan'];
      $KieuBanID = $_POST['KieuBanID'];       
      if ($KieuBanID > 0) {
         $query = "UPDATE kieuban SET TenKieuBan = '$TenKieuBan' WHERE KieuBanID = '$KieuBanID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO kieuban (TenKieuBan,NgayTao) VALUES
            ('$TenKieuBan', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["KieuBan"] == "RemoveKieuBan") {
      $KieuBanID = $_POST['id'];       
      if ($KieuBanID > 0) {
         $query = "UPDATE kieuban SET DaXoa = 1 WHERE KieuBanId = '$KieuBanID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["SanPham"] == "SanPham") {
      $date = date('Y-m-d H:i:s');
      $TenSanPham = $_POST['TenSanPham'];
      $GiaNhap = $_POST['GiaNhap'];
      $GiaBan = $_POST['GiaBan'];
      $GiaKM = $_POST['GiaKM'];
      $SoLuong = $_POST['SoLuong'];
      $HanSuDung = $_POST['HanSuDung'];
      $TheLoaiID = $_POST['TheLoaiID'];
      $KieuBanID = $_POST['KieuBanID'];
      $NhaCungCapID = $_POST['NhaCungCapID'];
      $ChiTiet = $_POST['ChiTiet'];
      $SanPhamID =  $_POST['SanPhamID'];
      $ConNo =  $_POST['ConNo'];
      $DonGia = $_POST['GiaBan'];
      $NguoiDungID = $_POST['NguoiTao'];
      $TenNguoiNhap = $_POST['TenNguoiNhap'];
      $TongTien = (int)$GiaNhap * (int)$SoLuong;
      $query_nhapkho = "INSERT INTO log_nhapkho (TenSanPham, SoLuongNhap, ThanhTien, NgayNhap, NguoiNhapID,TenNguoiNhap) 
       VALUES('$TenSanPham', '$SoLuong', '$TongTien', '$date','$NguoiDungID','$TenNguoiNhap')";
       mysqli_query($conn, $query_nhapkho);
      if ($SanPhamID > 0) {
         $query = "UPDATE SanPham SET
          TenSanPham = '$TenSanPham',
          ChiTiet = '$ChiTiet',
         TheLoaiID = '$TheLoaiID',
         DonGia = '$DonGia',
         GiaKM = '$GiaKM',
         NhaThuocID = '$NhaCungCapID',
         GiaNhap = '$GiaNhap',
         KieuBanID = '$KieuBanID',
         HanSuDung = '$HanSuDung',
         ConNo = '$ConNo'
         WHERE SanPhamID = '$SanPhamID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $AnhDaiDien = '../../uploads/' . $_FILES['file']['name'];
         if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);
        }
         $query = "INSERT INTO SanPham
          (
          TenSanPham,
          NgayTao,
          ChiTiet,
          AnhDaiDien,
          TheLoaiID,
          SoLuong,
          DonGia,
          GiaKM,
          TrangThai,
          NhaThuocID,
          GiaNhap,
          KieuBanID,
          HanSuDung,
          ConNo,
          NguoiTao,
          TenNguoiNhap
          ) VALUES
         ('$TenSanPham',
          '$date',
           '$ChiTiet',
            '$AnhDaiDien',
             '$TheLoaiID',
             '$SoLuong',
             '$DonGia',
             '$GiaKM',
             0,
             '$NhaCungCapID',
             '$GiaNhap',
             '$KieuBanID',
             '$HanSuDung',
             '$ConNo',
             '$NguoiDungID',
             '$TenNguoiNhap'
             )";
       
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["SoLuong_"] == "SoLuong_") {
      $SoLuong = (int)$_POST['SoLuong'];
      $SanPhamID =  $_POST['SanPhamID'];
      $date = date('Y-m-d H:i:s');
      $que = "SELECT *  FROM SanPham WHERE SanPhamID = '$SanPhamID'";
      $res =  mysqli_query($conn, $que);
      while ($a = $res->fetch_assoc()) {
         $TongTien = $SoLuong * (int)$a['GiaNhap'];
         $TenSanPham = $a['TenSanPham'];
         $SoLuongSP = $a['SoLuong'];
         $DonGia = $a['GiaNhap'];
         $LoaiPhuTungID = $a['LoaiPhuTungID'];
         $NhaSanXuatID = $a['NhaSanXuatID'];
         $TongSoLuong = (int)$SoLuongSP + (int)$SoLuong;
         $query_nhapkho = "INSERT INTO log_nhapkho (TenSanPham, SoLuongNhap, ThanhTien, NgayNhap, DonGia, LoaiPhuTungID, NhaSanXuatID ) 
         VALUES('$TenSanPham', '$SoLuong', '$TongTien', '$date','$DonGia','$LoaiPhuTungID','$NhaSanXuatID')";
         mysqli_query($conn, $query_nhapkho);
         $query = "UPDATE SanPham SET SoLuong = '$TongSoLuong' WHERE SanPhamID = '$SanPhamID'";
         mysqli_query($conn, $query);
      }
      
   }
   if ($_POST["SanPham"] == "ThayDoiTrangThai") {     
      $SanPhamID =  $_POST['SanPhamID'];   
      $NgayBaoDuong =  $_POST['NgayBaoDuong'];
      $query = "UPDATE SanPham SET NgayBaoDuong = '$NgayBaoDuong', TinhTrangBaoDuong = 1 WHERE SanPhamID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   if ($_POST["BaoDuong"] == "BaoDuong") {     
      $SanPhamID =  $_POST['SanPhamID'];   
      $NgayBaoDuong =  $_POST['NgayBaoDuong'];
      $query = "UPDATE loaixe SET NgayBaoDuong = '$NgayBaoDuong', TinhTrangBaoDuong = 1 WHERE LoaiXeID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   
   if ($_POST["SanPham"] == "Remove") {     
      $SanPhamID =  $_POST['id'];   
      $query = "UPDATE SanPham SET DaXoa = 1 WHERE SanPhamID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   if ($_POST["LoaiXe"] == "Remove") {     
      $SanPhamID =  $_POST['id'];   
      $query = "UPDATE loaixe SET DaXoa = 1 WHERE LoaiXeID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   if ($_POST["NguoiDung"] == "NguoiDung") {
      $date = date('Y-m-d H:i:s');
      $NguoiDungID = $_POST['NguoiDungID'];
      $HoVaTen = $_POST['HoVaTen'];
      $TenDangNhap = $_POST['TenDangNhap'];
      $MatKhau = md5($_POST['MatKhau']);
      $QuyenTruyCap = $_POST['QuyenTruyCap'];
      $NgaySinh = $_POST['NgaySinh'];
      $Email = $_POST['Email'];
      $DiaChi = $_POST['DiaChi'];
      if ($NguoiDungID > 0) {
         $query = "UPDATE NguoiDung SET
          HoVaTen = '$HoVaTen',
          NgaySinh = '$NgaySinh',
          Email = '$Email',
          DiaChi = '$DiaChi'
         WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      } else {  
         $query = "INSERT INTO NguoiDung
          (
          TenDangNhap,
          MatKhau,
          HoVaTen,
          DiaChi,
          Email,
          NgaySinh,
          NgayTao,
          TrangThai,
          QuyenTruyCap
          ) VALUES
         ('$TenDangNhap',
          '$MatKhau',
           '$HoVaTen',
            '$DiaChi',
             '$Email',
             '$NgaySinh',
             '$date',
             0,
             '$QuyenTruyCap'
             )";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["NguoiDung"] == "PhanQuyen") {
      $NguoiDungID = $_POST['NguoiDungID'];
      $QuyenTruyCap = $_POST['QuyenTruyCap'];     
      $query = "UPDATE NguoiDung SET QuyenTruyCap = '$QuyenTruyCap' WHERE NguoiDungID = '$NguoiDungID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["NguoiDung"] == "Change") {
      $NguoiDungID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE nguoidung SET TrangThai = 0 WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE nguoidung SET TrangThai = 1 WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TinTuc"] == "TinTuc") {
      $TinTucID = $_POST['TinTucID'];
      $TenTinTuc = $_POST['TenTinTuc'];  
      $NoiDung = $_POST['NoiDung'];  
      $date = date('Y-m-d H:i:s');     
      if($TinTucID > 0){
         $query = "UPDATE TinTuc SET TenTinTuc = '$TenTinTuc', NoiDung = '$NoiDung' WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      } else{
         $query = "INSERT INTO TinTuc (TenTinTuc, NoiDung, NgayTao, HienThi) VALUES ('$TenTinTuc', '$NoiDung', '$date', 0)";
         return $result = mysqli_query($conn, $query);

      }
   }
   
   if ($_POST["CanhBao"] == "RemoveCanhBao") {
      $TinTucID = $_POST['id'];
      $query = "UPDATE TinTuc SET DaXoa = 1 WHERE TinTucID = '$TinTucID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["TinTuc"] == "Change") {
      $TinTucID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE tintuc SET HienThi = 0 WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE tintuc SET HienThi = 1 WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   
   if ($_POST["thanhtoan"] == "ThanhToan") {
      $MaDonHang = "DH" . rand();
      $NguoiTaoDon = $_POST['NguoiTaoDon'];
      $KhachHangID = $_POST['KhachHangID'];
      $NguoiTaoID = $_POST['NguoiTaoID'];
      $HoTen = $_POST['HoTen'];
      $SoDienThoai = $_POST['SoDienThoai'];
      $DiaChi = $_POST['DiaChi'];
      $TongTien = $_POST['TongTien'];    
      $MoTa = $_POST['MoTa'];  
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO order2 (MaDonHang,NguoiTaoID, HoTen, DiaChi, TongTien, SoDienThoai, TrangThai, TenNguoiTao, NgayTao,KhachHangID)
               VALUES('$MaDonHang','$NguoiTaoID', '$HoTen', '$DiaChi', '$TongTien', '$SoDienThoai',1, '$NguoiTaoDon','$date','$KhachHangID')";
      $result = mysqli_query($conn, $query);
      
      $que = "SELECT *  FROM order2 WHERE MaDonHang = '$MaDonHang' ORDER BY OrderID LIMIT 1";
      $res =  mysqli_query($conn, $que);
      while ($a = $res->fetch_assoc()) {
         $OrderID = $a['OrderID'];
         $arr = json_decode(stripslashes($_POST['arr']));
         foreach($arr as $d){
            $SanPhamID = $d->SanPhamID;
            $TenSanPham = $d->TenSanPham;
            $DonGia = $d->DonGia;
            $TenDonHang = $d->TenDonHang;
            $SoLuong = $d->SoLuong;
            $ThanhTien = (int)$DonGia * (int)$SoLuong;
            $query2 = "INSERT INTO order_detail(SanPhamID, SoLuong, Gia,ThanhTien,OrderID,TenSanPham, NgayTao)
            VALUES('$SanPhamID','$SoLuong','$DonGia','$ThanhTien','$OrderID','$TenSanPham','$date')";
            $order_detail = mysqli_query($conn, $query2);

            $query_donhang = "INSERT INTO log_donhang(TenSanPham, SoLuong,ThanhTien,NgayTao,NguoiDungID,TenNguoiBan, TrangThai, OrderID)
            VALUES('$TenSanPham','$SoLuong','$ThanhTien','$date','$NguoiTaoID','$NguoiTaoDon',1,'$OrderID')";
             mysqli_query($conn, $query_donhang);

            $SanPham = "SELECT *  FROM sanpham WHERE SanPhamID = '$SanPhamID' ORDER BY SanPhamID LIMIT 1";
            $resultSp =  mysqli_query($conn, $SanPham);
            while ($sp = $resultSp->fetch_assoc()) {
               $SoLuongKho = $sp['SoLuong'];
               $UpdateSL = (int)$SoLuongKho  - (int)$SoLuong;
               $query_sp = "UPDATE SanPham SET SoLuong = '$UpdateSL' WHERE SanPhamID = '$SanPhamID'";
               mysqli_query($conn, $query_sp);
            }
            
            }
      }
      
      
   }
