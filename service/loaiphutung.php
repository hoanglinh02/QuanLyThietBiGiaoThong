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
    public function DanhSachLoaiPhuTung(){
        $query = "SELECT n.TenNhaSanXuat , l.* FROM loaiphutung as l INNER JOIN nhasanxuat as n  on l.NhaSanXuatID = n.NhaSanXuatID WHERE l.DaXoa != 1 ORDER BY l.LoaiPhuTungID DESC";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachNhaSanXuat(){
        $query = "SELECT * FROM nhasanxuat as n  WHERE n.DaXoa != 1 ORDER BY n.NgayTao DESC";        
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
    public function LoaiPhuTung_GetSingle($id){
        $query = "SELECT * FROM loaiphutung WHERE DaXoa != 1 AND LoaiPhuTungID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
 }
?>