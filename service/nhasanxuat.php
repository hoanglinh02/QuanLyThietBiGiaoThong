<?php
include '../../lib/database.php';
?>
<?php
 class NhaThuoc{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachCongTy(){
        $query = "SELECT  l.* FROM nhasanxuat as l WHERE l.DaXoa != 1 ORDER BY l.NhaSanXuatID DESC";        
        $result = $this->db->select($query);
        return $result;
    }
    public function CongTy_GetSingle($id){
        $query = "SELECT * FROM nhasanxuat WHERE DaXoa != 1 AND NhaSanXuatID = '$id'  ORDER BY NhaSanXuatID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function InsertOrUpdate(){
        $date = date('Y-m-d H:i:s');   
        $TenNhaThuoc = $_POST['TenNhaThuoc'];
        $SoDangKy = $_POST['SoDangKy'];
        $NgayDangKy = $_POST['NgayDangKy'];
        $DiaChi = $_POST['DiaChi'];
        $query = "INSERT INTO nhathuoc (TenNhaThuoc, SoDangKy, NgayDangKy, DiaChi,NgayTao) VALUES
        ('$TenNhaThuoc', '$SoDangKy', '$NgayDangKy', '$DiaChi', '$date')";
        $result = $this->db->insert($query);
        return $result;
    }
   
 }
?>