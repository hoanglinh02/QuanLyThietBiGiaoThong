<?php
include '../../lib/database.php';
?>
<?php
 class ThanhToan{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachCanhBao(){
        $query = "SELECT * FROM tintuc WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function CanhBao_GetSingle($id){
        $query = "SELECT * FROM TinTuc WHERE DaXoa != 1 AND TinTucID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachTrangChu(){
        $query = "SELECT * FROM tintuc WHERE DaXoa != 1 AND HienThi != 0  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachSanPham_BanHang(){
        $query = "SELECT * FROM SanPham WHERE  DaXoa != 1 AND TrangThai = 1 ORDER BY NgayTao DESC;";        
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>