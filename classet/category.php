<?php
include '../lib/database.php';
include '../helper/format.php';
?>
<?php
if(isset($_POST["action"]))
{  
    $conn = mysqli_connect("localhost","root","","yensondbv2"); 
    if($_POST["action"] == "insert")
	{
        if(!empty($_POST['HienThi'])) {

            foreach($_POST['HienThi'] as $value){
                echo "value : ".$value.'<br/>';
            }
    
        }else{
            $value = 0;
        }
            $date = date('Y-m-d H:i:s');
            $Name = $_POST['TenSanPham'];
            $NoiDung =  $_POST['NoiDung'];
            $TheLoai =  $_POST['TheLoai'];
            $Gia =  $_POST['Gia'];
            $TieuDe =  $_POST['TieuDe'];
            $AnhDaiDien =  $_POST['AnhDaiDien'];
             $query = "INSERT INTO sanpham(TenSanPham, NoiDung, TheLoaiID, HienThi, NgayTao, Gia, TieuDe, AnhDaiDien) VALUES ('$Name', '$NoiDung', '$TheLoai','$value','$date','$Gia', '$TieuDe','$AnhDaiDien')";   
             $result = mysqli_query($conn, $query); 
    }
    if($_POST["action"] == "delete")
	{      
            $SanPhamID =  $_POST['SanPhamID'];
             $query = "UPDATE sanpham SET DaXoa = '1' WHERE SanPhamID = '$SanPhamID'";   
             $result = mysqli_query($conn, $query); 
    }
    if($_POST["action"] == "hidden")
	{      
            $SanPhamID =  $_POST['SanPhamID'];
            $HienThi =  $_POST['HienThi'];
            if($HienThi == 0){
                $query = "UPDATE sanpham SET HienThi  = 1 WHERE SanPhamID = '$SanPhamID'";

            }else{
                $query = "UPDATE sanpham SET HienThi  = 0 WHERE SanPhamID = '$SanPhamID'";

            }
            $result = mysqli_query($conn, $query); 

    }
    if($_POST["action"] == "update")
	{
        if(!empty($_POST['HienThi'])) {

            foreach($_POST['HienThi'] as $value){
                echo "value : ".$value.'<br/>';
            }
    
        }else{
            $value = 0;
        }
            $date = date('Y-m-d H:i:s');
            $Name = $_POST['TenSanPham'];
            $NoiDung =  $_POST['NoiDung'];
            $TheLoai =  $_POST['TheLoai'];
            $Gia =  $_POST['Gia'];
            $TieuDe =  $_POST['TieuDe'];
            $SanPhamID = $_POST['SanPhamID'];
            $AnhDaiDien = $_POST['AnhDaiDien'];
            $query = "UPDATE sanpham SET TenSanPham = '$Name'
            ,NoiDung = '$NoiDung', TheLoaiID = '$TheLoai', HienThi = '$value', NgayTao = '$date', Gia = '$Gia', TieuDe = '$TieuDe', AnhDaiDien = '$AnhDaiDien' WHERE SanPhamID = '$SanPhamID'";
            $result = mysqli_query($conn, $query); 
    }
}


    if(isset($_POST["themthongtin"]))
    {  
        $conn = mysqli_connect("localhost","root","","yensondbv2"); 
        if($_POST["themthongtin"] == "hidden"){
            $ThongTinID = $_POST['ThongTinID'];
            $HienThi = $_POST["HienThi"];
            if($HienThi == 1){
                $query = "UPDATE thongtindoanhnghiep SET HienThi = '0' WHERE ThongTinDoanhNghiepID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }else{
                $query = "UPDATE thongtindoanhnghiep SET HienThi = '1' WHERE ThongTinDoanhNghiepID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }
        }
        if($_POST["themthongtin"] == "delete"){
            $ThongTinID = $_POST["ThongTinID"];
                $query = "UPDATE thongtindoanhnghiep SET DaXoa = '1' WHERE ThongTinDoanhNghiepID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 
        }
              
        if($_POST["themthongtin"] == "insert")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
        
            }else{
                $value = 0;
            }
                $date = date('Y-m-d H:i:s');
                $Name = $_POST['TenDoanhNghiep'];
                $DiaChi =  $_POST['DiaChi'];
                $NguoiDaiDien =  $_POST['NguoiDaiDien'];
                $MaSoThue =  $_POST['MaSoThue'];
                $NgayHoatDong =  $_POST['NgayHoatDong'];
                $DienThoai =  $_POST['DienThoai'];
                $query = "INSERT INTO thongtindoanhnghiep(TenDoanhNghiep, DiaChi, NguoiDaiDien, MaSoThue, NgayHoatDong, DienThoai, HienThi)
                VALUES ('$Name', '$DiaChi', '$NguoiDaiDien','$MaSoThue','$NgayHoatDong','$DienThoai', '$value')";   
                $result = mysqli_query($conn, $query); 
        }
        if($_POST["themthongtin"] == "update")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
        
            }else{
                $value = 0;
            }
                $date = date('Y-m-d H:i:s');
                $Name = $_POST['TenDoanhNghiep'];
                $DiaChi =  $_POST['DiaChi'];
                $NguoiDaiDien =  $_POST['NguoiDaiDien'];
                $MaSoThue =  $_POST['MaSoThue'];
                $NgayHoatDong =  $_POST['NgayHoatDong'];
                $DienThoai =  $_POST['DienThoai'];
                $ThongTinDoanhNghiepID = $_POST['ThongTinDoanhNghiepID'];
                $query = "UPDATE sanpham SET TenDoanhNghiep = '$Name'
                ,DiaChi = '$DiaChi', NguoiDaiDien = '$NguoiDaiDien', MaSoThue = '$MaSoThue', NgayHoatDong = '$NgayHoatDong', DienThoai = '$DienThoai', HienThi = '$value', NgayCapNhatNoiDung = '$date' WHERE ThongTinDoanhNghiepID = '$ThongTinDoanhNghiepID'";
                $result = mysqli_query($conn, $query); 
                
    }
    
    }
    if(isset($_POST["themlichlamviec"]))
    {  
        $conn = mysqli_connect("localhost","root","","yensondbv2"); 
        if($_POST["themlichlamviec"] == "hidden"){
            $ThongTinID = $_POST['ThongTinID'];
            $HienThi = $_POST["HienThi"];
            if($HienThi == 1){
                $query = "UPDATE lichlamviec SET HienThi = '0' WHERE LichLamViecID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }else{
                $query = "UPDATE lichlamviec SET HienThi = '1' WHERE LichLamViecID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }
        }
        if($_POST["themlichlamviec"] == "delete"){
            $ThongTinID = $_POST["ThongTinID"];
                $query = "UPDATE lichlamviec SET DaXoa = '1' WHERE LichLamViecID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 
        }
            
        if($_POST["themlichlamviec"] == "insert")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
        
            }else{
                $value = 0;
            }
                $date = date('Y-m-d H:i:s');
                $Thu = $_POST['Thu'];
                $TuGio =  $_POST['TuGio'];
                $DenGio =  $_POST['DenGio'];
                $TuGioChieu =  $_POST['TuGioChieu'];
                $DenGioChieu =  $_POST['DenGioChieu'];
                $NgoaiGio =  $_POST['NgoaiGio'];               
                $query = "INSERT INTO lichlamviec(Thu, TuGio, DenGio, TuGioChieu, DenGioChieu, NgoaiGio, HienThi)
                VALUES ('$Thu', '$TuGio', '$DenGio','$TuGioChieu','$DenGioChieu','$NgoaiGio', '$value')";   
                $result = mysqli_query($conn, $query); 
        }
        if($_POST["themlichlamviec"] == "update")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
            }else{
                $value = 0;
            }
            $date = date('Y-m-d H:i:s');
            $Thu = $_POST['Thu'];
            $TuGio =  $_POST['TuGio'];
            $DenGio =  $_POST['DenGio'];
            $TuGioChieu =  $_POST['TuGioChieu'];
            $DenGioChieu =  $_POST['DenGioChieu'];
            $NgoaiGio =  $_POST['NgoaiGio'];  
                $query = "UPDATE lichlamviec SET Thu = '$Thu'
                ,TuGi = '$DiaChi', NguoiDaiDien = '$NguoiDaiDien', MaSoThue = '$MaSoThue', NgayHoatDong = '$NgayHoatDong', DienThoai = '$DienThoai', HienThi = '$value', NgayCapNhatNoiDung = '$date' WHERE ThongTinDoanhNghiepID = '$ThongTinDoanhNghiepID'";
                $result = mysqli_query($conn, $query); 
        }
    } 
    if(isset($_POST["themtuyendung"]))
    {  
        $conn = mysqli_connect("localhost","root","","yensondbv2"); 
        if($_POST["themtuyendung"] == "hidden"){
            $ThongTinID = $_POST['ThongTinID'];
            $HienThi = $_POST["HienThi"];
            if($HienThi == 1){
                $query = "UPDATE tuyendung SET HienThi = '0' WHERE TuyenDungID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }else{
                $query = "UPDATE tuyendung SET HienThi = '1' WHERE TuyenDungID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }
        }
        if($_POST["themtuyendung"] == "delete"){
            $ThongTinID = $_POST["ThongTinID"];
                $query = "UPDATE tuyendung SET DaXoa = '1' WHERE TuyenDungID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 
        }
            
        if($_POST["themtuyendung"] == "insert")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
        
            }else{
                $value = 0;
            }
                $date = date('Y-m-d H:i:s');
                $TenTuyenDung = $_POST['TenTuyenDung'];
                $SoLuong =  $_POST['SoLuong'];
                $ViTri =  $_POST['ViTri'];
                $MoTa =  $_POST['MoTa'];
                $KinhNghiem =  $_POST['KinhNghiem'];
                $DoTuoi =  $_POST['DoTuoi']; 
                $NgayHetHan =  $_POST['NgayHetHan'];      
                $NoiLamViec = $_POST['NoiLamViec'];         
                $query = "INSERT INTO tuyendung(TenTuyenDung, SoLuong, ViTri, MoTa, KinhNghiem, DoTuoi, NgayHetHan, NoiLamViec, HienThi)
                VALUES ('$TenTuyenDung', '$SoLuong', '$ViTri','$MoTa','$KinhNghiem','$DoTuoi','$NgayHetHan','$NoiLamViec', '$value')";   
                $result = mysqli_query($conn, $query); 
        }
        
        if($_POST["themtuyendung"] == "delete_lienhe")
        {
            $TuyenDungID =  $_POST['ThongTinID'];
                $query = "UPDATE lienhe SET DaXoa = 1
                WHERE LienHeID = '$TuyenDungID'";
                $result = mysqli_query($conn, $query); 
        }
        if($_POST["themtuyendung"] == "update")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
            }else{
                $value = 0;
            }
            $date = date('Y-m-d H:i:s');
            $TenTuyenDung = $_POST['TenTuyenDung'];
            $SoLuong =  $_POST['SoLuong'];
            $ViTri =  $_POST['ViTri'];
            $MoTa =  $_POST['MoTa'];
            $KinhNghiem =  $_POST['KinhNghiem'];
            $DoTuoi =  $_POST['DoTuoi']; 
            $NgayHetHan =  $_POST['NgayHetHan'];      
            $NoiLamViec =  $_POST['NoiLamViec'];   
            $TuyenDungID =  $_POST['TuyenDungID'];  
            
                $query = "UPDATE tuyendung SET TenTuyenDung = '$TenTuyenDung'
                ,SoLuong = '$SoLuong', ViTri = '$ViTri', MoTa = '$MoTa', KinhNghiem = '$KinhNghiem', DoTuoi = '$DoTuoi',
                HienThi = '$value', NgayHetHan = '$NgayHetHan', NoiLamViec = '$NoiLamViec' WHERE TuyenDungID = '$TuyenDungID'";
                $result = mysqli_query($conn, $query); 
        }
    } 
    if(isset($_POST["dangky"]))
    {  
        $conn = mysqli_connect("localhost","root","","yensondbv2");         
        if($_POST["dangky"] == "insert")
        {           
                $date = date('Y-m-d H:i:s');
                $Name = $_POST['HoVaTen'];
                $Email =  $_POST['Email'];
                $MatKhau = md5($_POST['MatKhau']);
                $DiaChi =  $_POST['DiaChi'];
                $DienThoai =  $_POST['DienThoai'];
                $query = "INSERT INTO khachhang(HoVaTen, DiaChi, Email, MatKhau, SoDienThoai, NgayTao)
                VALUES ('$Name', '$DiaChi', '$Email','$MatKhau','$DienThoai','$date')";   
                $result = mysqli_query($conn, $query); 
        }    
    }  
    if(isset($_POST["TinTuc"]))
    {  
        $conn = mysqli_connect("localhost","root","","yensondbv2"); 
        if($_POST["TinTuc"] == "hidden"){
            $ThongTinID = $_POST['TinTucID'];
            $HienThi = $_POST["HienThi"];
            if($HienThi == 1){
                $query = "UPDATE tintuc SET HienThi = '0' WHERE TinTucID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 

            }else{
                $query = "UPDATE tintuc SET HienThi = '1' WHERE TinTucID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 
            }
        }
        if($_POST["TinTuc"] == "delete"){
            $ThongTinID = $_POST["TinTucID"];
                $query = "UPDATE tintuc SET DaXoa = '1' WHERE TinTucID = '$ThongTinID'";
                $result = mysqli_query($conn, $query); 
        }
        if($_POST["TinTuc"] == "insert_TinTuc")
        {
            
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
        
            }else{
                $value = 0;
            }
                $date = date('Y-m-d H:i:s');
                $TenTinTuc = $_POST['TenTinTuc'];
                $TieuDe =  $_POST['TieuDe'];
                $NoiDung =  $_POST['NoiDung'];
                $AnhDaiDien =  $_POST['AnhDaiDien'];
                $file_name = $_FILES['AnhDaiDien']['name'];
                $file_temp = $_FILES['AnhDaiDien']['tmp_name'];
                $div =explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
                $uploaded_image = "admin/uploads/".$unique_image;
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tintuc(TenTinTuc, TieuDe, NoiDung, AnhDaiDien, HienThi, NgayTao)
                VALUES ('$TenTinTuc', '$TieuDe', '$NoiDung','$uploaded_image','$value','$date')";   
                $result = mysqli_query($conn, $query); 
        }
        if($_POST["TinTuc"] == "update")
        {
            if(!empty($_POST['HienThi'])) {

                foreach($_POST['HienThi'] as $value){
                    echo "value : ".$value.'<br/>';
                }
            }else{
                $value = 0;
            }
               $date = date('Y-m-d H:i:s');
                $TenTinTuc = $_POST['TenTinTuc'];
                $TieuDe =  $_POST['TieuDe'];
                $NoiDung =  $_POST['NoiDung'];
                $AnhDaiDien =  $_POST['AnhDaiDien'];
                $TinTucID = $_POST['TinTucID'];
                $query = "UPDATE tintuc SET
                 TenTinTuc = '$TenTinTuc',
                 TieuDe = '$TieuDe',
                 NoiDung = '$NoiDung',
                 AnhDaiDien = '$AnhDaiDien',
                 HienThi = '$value'
                WHERE TinTucID = '$TinTucID'";
                $result = mysqli_query($conn, $query); 
        
        }
    } 
?>
<?php
    class category {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function insert_category($catName, $catHienThi){
            $date = date('Y-m-d H:i:s');
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $catHienThi = mysqli_real_escape_string($this->db->link, $catHienThi);
            $catDate = mysqli_real_escape_string($this->db->link, $date);
            if(empty($catName)){
                $alert = "Chưa điền đủ thông tin tài khoản, mật khẩu";
                return $alert;
            }else{
                $query = "INSERT INTO theloai(TenTheLoai, HienThi, NgayTao) VALUES ('$catName', '$catHienThi', '$catDate')";
                $result = $this->db->insert($query);  
                if($result == true){
                    $alert = "<span class='text-success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Thêm không thành công</span>";
                    return $alert;
                }
            }
        }
        public function update_category($catName, $hienThi,$id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $catHienThi = mysqli_real_escape_string($this->db->link, $hienThi);
            if(empty($catName)){
                $alert = "Chưa điền đủ thông tin tài khoản, mật khẩu";
                return $alert;
            }else{
                $query = "UPDATE theloai SET TenTheLoai = '$catName', HienThi = '$catHienThi' WHERE TheLoaiID = '$id'";
                $result = $this->db->update($query);  
                if($result == true){
                    $alert = "<span class='text-success'>Sửa thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Sửa không thành công</span>";
                    return $alert;
                }
            }
        }
        function show_category(){
            $query = "SELECT * FROM TheLoai WHERE DaXoa != 1 ORDER BY TheLoaiID desc";
            $result = $this->db->select($query);
            return $result;
        }
        function show_tin_tuc(){
            $query = "SELECT * FROM tintuc WHERE DaXoa != 1 ORDER BY NgayTao desc LIMIT 3";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyID($id){
            $query = "SELECT * FROM TheLoai WHERE TheLoaiID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        function show_product($TenSanPham, $TheLoaiID){
            $query = "SELECT * FROM SanPham WHERE DaXoa != 1";
            if($TenSanPham != null){
                $query = "SELECT * FROM SanPham WHERE DaXoa != 1 && TenSanPham LIKE '$TenSanPham%'";
            }
            if($TheLoaiID != null){
                $query = "SELECT * FROM SanPham WHERE DaXoa != 1 && TheLoaiID = '$TheLoaiID'";
            }
            $result = $this->db->select($query);
            return $result;
        }
        
        public function insert_product($pdName, $pdNoiDung, $pdTheLoaiID, $HienThi){
            $date = date('Y-m-d H:i:s');
            $pdName = $this->fm->validation($pdName);
            $pdName = mysqli_real_escape_string($this->db->link, $pdName);
            $pdNoiDung = $this->fm->validation($pdNoiDung);
            $catDate = mysqli_real_escape_string($this->db->link, $date);
            $pdTheLoaiID = mysqli_real_escape_string($this->db->link, $pdTheLoaiID);
            $HienThi = mysqli_real_escape_string($this->db->link, $HienThi);
            if(empty($pdName) || empty($pdNoiDung)){
                $alert = "Chưa điền đủ thông tin.";
                return $alert;
            }else{
                $query = "INSERT INTO sanpham(TenSanPham, NoiDung, NgayTao, TheLoaiID, HienThi)
                 VALUES ('$pdName', '$pdNoiDung', '$catDate','$pdTheLoaiID', '$HienThi')";
                $result = $this->db->insert($query);  
                if($result == true){
                    $alert = "<span class='text-success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Thêm không thành công</span>";
                    return $alert;
                }
            }
        }
        function EditProduct($id){
            $query = "SELECT * FROM SanPham WHERE SanPhamID = '$id' && DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function show_thong_tin_doanh_nghiep(){
            $query = "SELECT * FROM ThongTinDoanhNghiep WHERE DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function EditDoanhNghiep($id){
            $query = "SELECT * FROM ThongTinDoanhNghiep WHERE ThongTinDoanhNghiepID = '$id' && DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function show_lich_lam_viec(){
            $query = "SELECT * FROM LichLamViec WHERE DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function Edit_Lich_Lam_Viec($id){
            $query = "SELECT * FROM LichLamViec WHERE LichLamViecID = '$id' && DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function show_thong_tin_tuyen_dung(){
            $query = "SELECT * FROM TuyenDung WHERE DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function show_all_tin_tuc(){
            $query = "SELECT * FROM TinTuc WHERE DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function Edit_Thong_Tin_Tuyen_Dung($id){
            $query = "SELECT * FROM TuyenDung WHERE TuyenDungID = '$id' && DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function show_thong_tin_lien_he(){
            $query = "SELECT * FROM LienHe WHERE DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
        function EditTinTuc($id){
            $query = "SELECT * FROM TinTuc WHERE TinTucID = '$id' && DaXoa != 1";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>