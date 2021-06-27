<?php
include 'lib/session.php';
Session :: checkLogin();
include 'lib/database_login.php';
?>
<?php
    class login {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }
        public function login_admin($adminUser, $adminPass){

            if(empty($adminUser) || empty($adminPass)){
                $alert = "Chưa điền đủ thông tin tài khoản, mật khẩu";
                return $alert;
            }else{
                $query = "SELECT * FROM NguoiDung WHERE TenDangNhap = '$adminUser' AND MatKhau = '$adminPass' AND DaXoa != 1 AND TrangThai != 0 LIMIT 1";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('login', true);
                    Session::set('NguoiDungID', $value['NguoiDungID']);
                    Session::set('TenDangNhap', $value['TenDangNhap']);
                    Session::set('DiaChi', $value['DiaChi']);
                    Session::set('HoTen', $value['HoVaTen']);
                    Session::set('QuyenTruyCap', $value['QuyenTruyCap']);
                    header('Location:/QuanLy_ThietBiVanTai/admin/trangchu/index.php');
                }else{
                    $alert = "Tên tài khoản hoặc mật khẩu chưa chính xác";
                    return $alert;
                }
            }
        }
    }
?> 