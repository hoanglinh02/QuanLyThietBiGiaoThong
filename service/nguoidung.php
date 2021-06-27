<?php
include '../../lib/database.php';
?>
<?php
 class NguoiDung{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachNguoiDung(){
        $query = "SELECT * FROM NguoiDung WHERE DaXoa != 1 AND LaQuanLy != 1; ";        
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