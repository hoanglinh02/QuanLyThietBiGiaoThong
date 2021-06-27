<?php
include '../lib/databasehome.php';
?>
<?php
    class count_Category {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
        }
        function count_Cat(){
            $query = "SELECT COUNT(*) c FROM TheLoai WHERE DaXoa != 1;";
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            return $row['c'];
        } 
        function count_Product(){
            $query = "SELECT COUNT(*) c FROM SanPham WHERE DaXoa != 1;";
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            return $row['c'];
        } 
        function count_Content(){
            $query = "SELECT COUNT(*) c FROM TinTuc WHERE DaXoa != 1;";
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            return $row['c'];
        } 
        function count_SuKien(){
            $query = "SELECT COUNT(*) c FROM SuKien WHERE DaXoa != 1;";
            $result = $this->db->select($query);
            $row = mysqli_fetch_assoc($result);
            return $row['c'];
        } 
    }
?>