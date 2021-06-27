<?php
include '../../lib/database.php';
?>
<?php
 class TrangChu{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function SanPhamTrongKho(){
        
        $query = "SELECT COUNT(*) total_Product FROM SanPham WHERE DaXoa != 1 ";   
        $result = $this->db->select($query);
        $total_Product = mysqli_fetch_assoc($result);
        return $total_Product['total_Product'];
    }  
    public function TongTienSanPham(){
        
        $query = "SELECT * FROM SanPham WHERE DaXoa != 1 ";   
        $result = $this->db->select($query);
        return $result;
    }  
    public function SoLuongXe(){      
        $query = "SELECT COUNT(*) total_LoaiXe FROM LoaiXe WHERE DaXoa != 1 ";
        $result = $this->db->select($query);
        $total_Product = mysqli_fetch_assoc($result);
        return $total_Product['total_LoaiXe'];
    } 
    public function TongTienLoaiXe(){
        
        $query = "SELECT * FROM LoaiXe WHERE DaXoa != 1 ";
        $result = $this->db->select($query);
        return $result;
    } 
     
 }
?>