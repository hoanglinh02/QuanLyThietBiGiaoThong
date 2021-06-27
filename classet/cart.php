<?php
include 'lib/database_cart.php';
include 'helper/format.php';
?>
<?php ob_start();
	/**
	* 
	*/
	class cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new DatabasCe();
			$this->fm = new Format();
		}
		public function add_to_cart($quantity, $id)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$query = "SELECT * FROM sanpham WHERE SanPhamID = '$id' ";
			$result = $this->db->select($query)->fetch_assoc();
			$productName = $result['TenSanPham'];
			$price = $result['Gia'];
			$image = $result['AnhDaiDien'];
			
			 // $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId' ";
			 // if ($check_cart) {
				// $msg = "Sản phẩm có trong giỏ hàng!";
				// return $msg;
			 // }else{
				$query_insert = "INSERT INTO cart(SanPhamID,TenDonHang,SoLuong,ssID,Gia,AnhDaiDien)
                VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
				$insert_cart = $this->db->insert($query_insert);
				if($result){
					header('Location:cart.php');
				}else {
						header('Location:404.php');
				}
			 // }

		}
		public function get_product_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE ssID = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_quantity_Cart($quantity, $cartId)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);

			$query = "UPDATE cart SET

			SoLuong = '$quantity'

			WHERE CartID = '$cartId'";

			$result = $this->db->update($query);
			if ($result) {
				header('Location:cart.php');
			}else {
				$msg = "<span class='error'> Cập nhật thất bại</span> ";
				return $msg;
			}
			

		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM cart WHERE CartID = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				header('Location:cart.php');
			}else{
				$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
				return $msg;
			}
		}

		public function check_cart()
		{
			$sId = session_id();
			$query = "SELECT * FROM cart WHERE ssID = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function check_order($customer_id)
		{
			$sId = session_id();
			$query = "SELECT * FROM order WHERE KhachHangID = '$customer_id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart()
		{
			$sId = session_id();
			$query = "DELETE FROM cart WHERE ssID = '$sId' ";
			$result = $this->db->select($query);
			return $result;
		}
		// public function del_compare($customer_id){
		// 	$sId = session_id();
		// 	$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
		// 	$result = $this->db->delete($query);
		// 	return $result;
		// }
		public function insertOrder($customer_id)
		{
			$sId = session_id();
			$date = date('Y-m-d H:i:s');
			$query = "SELECT TenDonHang, Gia, SoLuong, AnhDaiDien, SanPhamID FROM cart WHERE ssID = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product){
				while($result = $get_product->fetch_assoc()){
					$productid =  $result['SanPhamID'];
					$productName = $result['TenDonHang'];
					$quantity = $result['SoLuong'];
					$price = $result['Gia'] * $quantity;
					$image = $result['AnhDaiDien'];
					$customer_id = $customer_id;
					$catName = mysqli_real_escape_string($this->db->link, $productid);
					$query_order = "INSERT INTO order(SanPhamID)
					VALUES('$catName')";
					$result2 = $this->db->insert($query_order);
					if($result2 == true){
						$alert = "<span class='text-success'>Thêm thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='text-danger'>Thêm không thành công</span>";
						return $alert;
					}
				}
			}
		}
		public function getAmountPrice($customer_id)
		{
			$query = "SELECT Gia FROM order WHERE KhachHangID = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM order WHERE KhachHangID = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM order ";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
			
		public function shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);

			$query = "UPDATE order SET

				TrangThai = '1'

				WHERE OrderID = '$id' AND NgayTao='$time' AND Gia='$price'";

				$result = $this->db->update($query);
				if ($result) {
					$msg = "<span class='success'> Cập nhật thành công</span> ";
					return $msg;
				}else {
					$msg = "<span class='error'> Cập nhật thất bại</span> ";
					return $msg;
				}
			
		}
		public function del_shifted($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "DELETE FROM order 
					  WHERE OrderID = '$id' AND NgayTao = '$time' AND Gia = '$price' ";

			$result = $this->db->update($query);
			if ($result) {
				$msg = "<span class='success'> Xóa thành công</span> ";
				return $msg;
			}else {
				$msg = "<span class='erorr'> Xóa thất bại</span> ";
				return $msg;
			}
		}
		public function shifted_confirm($id,$time,$price)
		{
			$id = mysqli_real_escape_string($this->db->link, $id);
			$time = mysqli_real_escape_string($this->db->link, $time);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$query = "UPDATE order SET

			status = '2'

			WHERE KhachHangID = '$id' AND NgayTao = '$time' AND Gia = '$price' ";

			$result = $this->db->update($query);
			return $result;
		}
	}
	?>