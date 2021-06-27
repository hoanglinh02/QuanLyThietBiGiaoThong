<?php
include '../../lib/database.php';
?>
<?php
 class SanPham{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachSanPham(){
        $query = "SELECT s.*, n.TenNhaSanXuat, l.TenLoaiPhuTung FROM sanpham as s JOIN loaiphutung as l on s.LoaiPhuTungID = l.LoaiPhuTungID JOIN nhasanxuat as n on s.NhaSanXuatID = n.NhaSanXuatID WHERE s.DaXoa != 1 ORDER BY s.SanPhamID DESC";
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachPhuongTien(){
        $query = "SELECT s.*, n.TenCongTy, l.TenHangXe FROM loaixe as s
         JOIN hangxe as l on s.HangXeID = l.HangXeID JOIN congtysudung as n on s.CongTyID = n.CongTySuDungID WHERE s.DaXoa != 1 ORDER BY s.LoaiXeID DESC";
        $result = $this->db->select($query);
        return $result;
    } 
    
    public function SanPham_GetSingle($id){
        $query = "SELECT * FROM sanpham WHERE DaXoa != 1 AND SanPhamID = '$id'  ORDER BY SanPhamID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function LoaiXe_GetSingle($id){
        $query = "SELECT * FROM loaixe WHERE DaXoa != 1 AND LoaiXeID = '$id'  ORDER BY LoaiXeID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachLoaiPhuTung(){
        $query = "SELECT * FROM loaiphutung
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachNhaSanXuat(){
        $query = "SELECT * FROM nhasanxuat
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
    public function DanhhSachHangXe(){
        $query = "SELECT * FROM hangxe
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachCongTySD(){
        $query = "SELECT * FROM congtysudung
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSach_PhuTung(){
        $query = "SELECT * FROM phutungtheoxe
        WHERE DaXoa != 1 ";        
        $result = $this->db->select($query);
        return $result;
    } 
   
 }
?>