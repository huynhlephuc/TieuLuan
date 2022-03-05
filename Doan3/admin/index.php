<?php
	session_start();
	if($_SESSION["TaiKhoan"] == ""){
		header("location: modules/qltaikhoan/dangnhap.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>Hải Sản Việt - admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}

#qrimage:hover{
	width: 200px !important;
	height: 200px !important;
	position: absolute !important;
	right: -15px;
	top: 300px;
	z-index: 99 !important;
	cursor: pointer;

}

</style>

<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topleft"></i>
    <h3 class="w3-wide"><b>Hải Sản Việt</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  	<div class="w3-dropdown-hover" style="background-color: rgb(255, 255, 255); color:#757575">
    	<a href="index.php">
        <button class="w3-button">Trang chủ
          <!--<i class="fa fa-caret-down"></i>-->
        </button>
        </a>
        <div class="w3-dropdown-content w3-bar-block">
    	</div>
    </div>
  	<div class="w3-dropdown-hover" style="background-color: rgb(255, 255, 255); color:#757575">
        <button class="w3-button">Quản lý tài khoản
          <!-- <i class="fa fa-caret-down"></i> -->
        </button>
        <div class="w3-dropdown-content w3-bar-block">
          <a href="?chucnang=doimatkhau" class="w3-bar-item w3-button">Đổi mật khẩu</a>
          <a href="modules/qltaikhoan/dangnhap.php?chucnang=thoat" class="w3-bar-item w3-button">Thoát</a>
    	</div>
    </div>
    <div class="w3-dropdown-hover">
    <button class="w3-button">Quản lý sản phẩm
      <!-- <i class="fa fa-caret-down"></i> -->
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="?chucnang=themsanphammoi" class="w3-bar-item w3-button">Thêm sản phẩm mới</a><!--Ok-->
      <a href="?chucnang=xemdanhsachsanpham" class="w3-bar-item w3-button">Danh sách sản phẩm</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Quản lý loại sản phẩm          <!--OK-->
      <!-- <i class="fa fa-caret-down"></i> -->
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="?chucnang=themloaisanphammoi" class="w3-bar-item w3-button">Thêm loại sản phẩm</a>
      <a href="?chucnang=xemdanhsachloaisanpham" class="w3-bar-item w3-button">Danh sách loại sản phẩm</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Quản lý hóa đơn<!--ok-->
      <!-- <i class="fa fa-caret-down"></i> -->
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="?chucnang=xemdanhsachdondathang" class="w3-bar-item w3-button">Danh sách hóa đơn</a>
    </div>
  </div> 
</div> 
  <div style="margin:5px;"><a href="../index.php" class="w3-button w3-red">Trở về trang chính</a></div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>2N.SHOP</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
	<?php 
		include("db_driver.php");
		$DB = new DB_driver();
		if(isset($_GET['chucnang'])){
			//quản lý loại sản phẩm
			if($_GET['chucnang'] == 'themloaisanphammoi'){
				include("modules/qlloaisanpham/themloaisanpham.php");
			}
			else if($_GET['chucnang'] == 'xemdanhsachloaisanpham'){
				include("modules/qlloaisanpham/danhsachloaisanpham.php");
			}
			else if($_GET['chucnang'] == 'capnhatloaisanpham'){
				include("modules/qlloaisanpham/capnhatloaisanpham.php");
			}
			// quản lý sản phẩm
			else if($_GET['chucnang'] == 'themsanphammoi'){
				include("modules/qlsanpham/themsanpham.php");
			}
			else if($_GET['chucnang'] == 'xemdanhsachsanpham'){
				include("modules/qlsanpham/danhsachsanpham.php");
			}else if($_GET['chucnang'] == 'capnhatsanpham'){
				include("modules/qlsanpham/capnhatsanpham.php");
			//chứ năng thay đổi tài khoản + xem,cập nhật trạng thái hóa đơn + chức năng quản lý danh sách tài khoản khách hàng
			// quản lý hóa đơn
			}else if($_GET['chucnang'] == 'xemdanhsachdondathang'){
				include("modules/qlhoadon/danhsachdondathang.php");
			}else if($_GET['chucnang'] == 'capnhatgiohang'){
				include("modules/qlhoadon/capnhatdondathang.php");
			}else if($_GET['chucnang'] == 'doimatkhau'){
				include("modules/qltaikhoan/doimatkhau.php");
			}
		}else{
			include("trangchu.php");
		}
	?>
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div style="width:1px;">
</div>
<!-- <footer class="w3-center w3-black w3-padding-16" style="margin-top:10px;">
  <p></p>
</footer> -->

<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("Acc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

  // Click on the "Jeans" link on page load to open the accordion for demo purposes
  document.getElementById("myBtn").click();


// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
