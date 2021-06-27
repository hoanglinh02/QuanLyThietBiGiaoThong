
<?php
        $conn = mysqli_connect("localhost", "root", "", "nhathuoc_mac");
        $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia, sanpham.GiaKM, sanpham.NgayTao, sanpham.TrangThai, kieuban.TenKieuBan ,sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo, nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID INNER JOIN kieuban on kieuban.KieuBanId = sanpham.KieuBanID WHERE sanpham.DaXoa != 1 AND sanpham.TrangThai = 1 ORDER BY sanpham.NgayTao DESC";   
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $id = $row['SanPhamID'];
            $TenSanPham = $row['TenSanPham'];
            $DonGia = $row['DonGia'];
            $KieuBan = $row['TenKieuBan'];
            $TonKho = $row['SoLuong'];
            $AnhDaiDien = $row['AnhDaiDien'];
            $GiaKM = $row['GiaKM'];
            $return_arr[] = array(
                "id" => $id,
                "TenSanPham" => $TenSanPham,
                "DonGia" => $DonGia,
                "GiaKM" => $GiaKM,
                "KieuBan" => $KieuBan,
                "TonKho" => $TonKho,
                "AnhDaiDien" => $AnhDaiDien
        );                                 
        }
        echo json_encode($return_arr);
?>