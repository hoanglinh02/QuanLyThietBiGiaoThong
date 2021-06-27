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
        $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia, sanpham.GiaKM, sanpham.NgayTao,
        sanpham.TrangThai, sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo,
        nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID
        WHERE sanpham.DaXoa != 1  ORDER BY sanpham.NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function SanPham_GetSingle($id){
        $query = "SELECT * FROM sanpham WHERE DaXoa != 1 AND SanPhamID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachNhaCungCap(){
        $query = "SELECT * FROM nhathuoc
        WHERE DaXoa != 1 AND TrangThai = 1 ORDER BY NgayTao DESC; ";        
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
    public function DanhSachPhuTungTheoXe($LoaiXeID){
        if($LoaiXeID > 0){
            $query = "SELECT p.*, s.TenSanPham, l.TenLoaiXe FROM phutungtheoxe as p INNER JOIN sanpham as s on p.PhuTungID = s.SanPhamID INNER JOIN loaixe as l on l.LoaiXeID = p.SanPhamID WHERE p.DaXoa != 1 AND p.SanPhamID = '$LoaiXeID'";        
            $result = $this->db->select($query);
            return $result;
        }
    } 
   
 }
?>