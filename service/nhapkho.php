<?php
include '../../lib/database.php';
?>
<?php
 class NhapKho{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function DanhSachLoaiXe($TuNgay, $DenNgay){
        $query = "SELECT  l.*, h.TenHangXe, ct.TenCongTy FROM log_loaixe as l  
                    INNER JOIN hangxe as h on l.HangXeID = h.HangXeID
                    INNER JOIN congtysudung as ct on ct.CongTySuDungID = l.CongTyID
                    ORDER BY l.log_loaixeID DESC; ";  
        if($TuNgay != null){
            $query = "SELECT  l.*, h.TenHangXe, ct.TenCongTy FROM log_loaixe as l  
            INNER JOIN hangxe as h on l.HangXeID = h.HangXeID
            INNER JOIN congtysudung as ct on ct.CongTySuDungID = l.CongTyID
            WHERE l.log_loaixe >= '$TuNgay' ORDER BY log_loaixeID DESC"; 
        }   
        if($DenNgay != null){
            $query = "SELECT  l.*, h.TenHangXe, ct.TenCongTy FROM log_loaixe as l  
            INNER JOIN hangxe as h on l.HangXeID = h.HangXeID
            INNER JOIN congtysudung as ct on ct.CongTySuDungID = l.CongTyID
             WHERE NgayNhap <= '$DenNgay' ORDER BY log_loaixeID DESC"; 
        }       
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachNhapKho($TuNgay, $DenNgay){
        $query = "SELECT  l.*, h.TenLoaiPhuTung, ct.TenNhaSanXuat FROM log_nhapkho as l  
                    INNER JOIN loaiphutung as h on l.LoaiPhuTungID = h.LoaiPhuTungID
                    INNER JOIN nhasanxuat as ct on ct.NhaSanXuatID = l.NhaSanXuatID
                    ORDER BY l.log_NhapKhoID DESC; ";  
        if($TuNgay != null){
            $query = "SELECT  l.*, h.TenLoaiPhuTung, ct.TenNhaSanXuat FROM log_nhapkho as l  
            INNER JOIN loaiphutung as h on l.LoaiPhuTungID = h.LoaiPhuTungID
            INNER JOIN nhasanxuat as ct on ct.NhaSanXuatID = l.NhaSanXuatID
            WHERE l.NgayNhap >= '$TuNgay' ORDER BY l.log_NhapKhoID DESC"; 
        }   
        if($DenNgay != null){
            $query = "SELECT  l.*, h.TenLoaiPhuTung, ct.TenNhaSanXuat FROM log_nhapkho as l  
            INNER JOIN loaiphutung as h on l.LoaiPhuTungID = h.LoaiPhuTungID
            INNER JOIN nhasanxuat as ct on ct.NhaSanXuatID = l.NhaSanXuatID
             WHERE NgayNhap <= '$DenNgay' ORDER BY l.log_NhapKhoID DESC"; 
        }       
        $result = $this->db->select($query);
        return $result;
    }  
    public function NguoiDung_GetSingle($id){
        $query = "SELECT * FROM NguoiDung WHERE DaXoa != 1 AND NguoiDungID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    
    public function DanhSachTheLoai(){
        $query = "SELECT * FROM theloai
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachKieuBan(){
        $query = "SELECT * FROM kieuban
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>