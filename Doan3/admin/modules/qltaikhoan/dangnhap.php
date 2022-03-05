<?php 
	include("../../db_driver.php");
	$DB = new DB_driver();
	session_start();
	if(isset($_GET['chucnang'])){
		if(isset($_POST["DangNhap"])){
			$taikhoan = $_POST['txtTaiKhoan'];
			$makhau = $_POST['txtMatKhau'];
			$sql = "select * from taikhoan where tentaikhoan = '$taikhoan' and matkhau = '$makhau'";
			$ketqua = $DB->get_list($sql);
			if(count($ketqua) > 0){
				//session_register('txtTaiKhoan');
				$_SESSION["TaiKhoan"] = $taikhoan;
				header("location: ../../index.php");
			}else{
				header("location: ?thongbao=matkhaukhongdung");
			}
		}else if(isset($_POST["Huy"])){
			session_destroy();
			header("location: dangnhap.php");	
		}else if($_GET['chucnang']=="thoat"){
			session_destroy();
			header("location: dangnhap.php");	
		}
	}
?>
<!DOCTYPE html>
<html>
<title>2n.shop - admin</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../../w3.css">
<style>
</style>
<body>
<div class="w3-container w3-blue">
  <h2 style="text-align:center">2N.SHOP</h2>
</div>
<?php 
	if(isset($_GET['thongbao'])){
		if($_GET['thongbao'] == 'matkhaukhongdung'){
	?>
	<div id = "Thongbao1" class="w3-red" onClick="An('Thongbao1')">
		<p class="w3-center"><b>Không thành công! </b>Mật khẩu hoặc tài khoản không đúng</p>
	</div>	
	</a>
	<?php
		}
	}
	?>		
	<script>
		function An(elemet){
			document.getElementById(elemet).style.display = "none";
		}
	</script>
<form class="w3-container w3-display-middle w3-card-4" action="?chucnang=DangNhap" method="post">
<h2>Đăng nhập</h2>
  <p>
  <label>Tài khoản</label>
  <input class="w3-input" type="text" placeholder="Nhập tài khoản..." name  = "txtTaiKhoan"></p>
  <p>
  <label>mật khẩu</label>
  <input class="w3-input" type="password" placeholder="Nhập mật khẩu..." name = "txtMatKhau"></p>
  <p>
   <p><input type="submit" class="w3-button  w3-blue" value="Đăng nhập" name = "DangNhap"><input type="reset" class="w3-button  w3-blue" value="Hủy"></p>	
</form>

</body>
</html>
