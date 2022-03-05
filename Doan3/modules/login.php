
<!DOCTYPE HTML>
<html>
<head>
<title>WELCOM TO 2N.SHOP </title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/jquery1.min.js"></script>
<!-- start menu -->
<link rel="stylesheet" type="text/css" href="../css/megamenu.css">
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" type="text/css" href="../css/fwslider.css">
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/css3-mediaqueries.js"></script>
    <script src="../js/fwslider.js"></script>
<!--end slider -->
<script src="../js/jquery.easydropdown.js"></script>
<link rel="stylesheet" href="w3.css">
</head>
<?php
include("../db_driver.php");
$DB = new DB_driver();
@session_start();
?>
<body>
    <div class="header-top">
	   <div class="wrap">
	     <div class="cssmenu">
			<ul>
<!--					<li class="active"><a href="login.php">Tài khoản</a></li> |-->
					<li><a href="checkout.php">Danh sách sản phẩm</a></li> |
					<li><a href="checkout.php">Thanh toán</a></li> |
					<li><a href="login.php"><?php if(isset($_SESSION['TaiKhoankhachhang'])) echo $_SESSION['TaiKhoankhachhang']; else echo "Đăng nhập" ?></a></li> |
					<li><a href="register.php">Đăng ký</a></li>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
                <a href="../index.php"><img src="../images/logo.png" alt="" width="136" height="47"/></a>
</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="active grid"><a href="../index.php">Trang chủ</a></li>
			<li><a class="color4" href="#">Hải Sản</a>
				<!--<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Thương hiệu</h4>
								<ul>
									<li><a href="oplung.php">APPLE</a></li>
									<li><a href="oplung.php">SAMSUNG</a></li>
									<li><a href="oplung.php">OPPO</a></li>
									<li><a href="oplung.php">VIVO</a></li>
                                    <li><a href="oplung.php">HTC</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								
						  </div>							
						</div>
						
					  </div>
					</div>-->
				</li>				
				<!--<li><a class="color5" href="#">Phụ Kiện Khác</a>
				<div class="megapanel">
					<div class="col1">
							<div class="h_nav">
								
								<ul>
									<li><a href="phukienkhac.php">Tai nghe</a></li>
									<li><a href="phukienkhac.php">Cục sạt</a></li>
									<li><a href="phukienkhac.php">Pin dự phòng</a></li>
									<li><a href="phukienkhac.php">Cường lực</a></li>
                                    <li><a href="phukienkhac.php">Thẻ nhớ</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
							</div>												
						</div>
				  </div>
				</li>-->
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
         <!--<div class="search">	  
				<input type="text" name="s" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>-->
	  <div class="tag-list">
	    <ul class="icon1 sub-icon1 profile_img">
		</ul>
		<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="checkout.php"> </a>
				<ul class="sub-icon1 list">
                <?php
					$tongtien = 0;
					$count_giohang = 0;
					if(isset($_SESSION['giohang'])){
						foreach($_SESSION['giohang'] as $iteam){
							$row = $DB->get_row('select * from sanpham where idsanpham = '.$iteam["id"]);
							$tongtien += $iteam["soluong"] * $row['giasanpham'];
						}
					$count_giohang = count($_SESSION['giohang']);
					}
				?>
					<li><h3>Tổng tiền: <?php echo number_format($tongtien,0)." VNĐ"?></h3><a href=""></a></li>
				</ul>
			</li>
		</ul>
	    <ul class="last">
	      <li><a href="checkout.php">Giỏ hàng (<?php echo $count_giohang?>)</a></li></ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
    <!--Hiển thị thông báo-->
    <?php 
		  if(isset($_GET['thongbao'])){
			  if($_GET['thongbao'] == 'thaotacdangkythanhcong'){
		  ?>
		  <div id = "Thongbao1" class="w3-green" onClick="An('Thongbao1')">
			  <p><b>Thành công! </b>Bạn đã đăng ký thành công hãy đăng nhập</p>
		  </div>	
		  </a>
          <?php
			  }else if($_GET['thongbao'] == 'matkhaukhongdung'){
		  ?>
          <div id = "Thongbao3" class="w3-red" onClick="An('Thongbao3')">
			  <p><b>Đăng nhập không thành công! </b>Sai tài khoản hoặc mật khẩu hãy thử lại</p>
		  </div>
		  <?php
			  }else{
		  ?>		
		  <div id = "Thongbao2" class="w3-red an" style="margin:0px;" onClick = "An('Thongbao2');">
			  <p><b>Chưa thành công! </b>Bạn đăng ký chưa thành công</p>
		  </div>	
		  <?php
			  }
		  }
		  ?>
		  <script>
			  function An(elemet){
				  document.getElementById(elemet).style.display = "none";
			  }
		  </script>
    </div>
	<div class="login">
          	<div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">Khách hàng mới </h4>
					<p>Bạn chưa có tài khoản,hãy đăng ký làm thành viên của chúng tôi để được nhận được những ưu đãi,khuyến mãi,những lợi ích mà chỉ có thành viên của 2N.SHOP mới có.Cám ơn</p>
					<div class="button1">
					   <a href="register.php"><input type="submit" name="Submit" value="Tạo tài khoản"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Đã đăng ký</h4>
					<div id="loginbox" class="loginbox">
						<form action="../index.php?chucnang=dangnhap" method="post" name="login" id="login-form">
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Email</label>
						      <input id="modlgn_username" type="text" name="email" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Mật khẩu</label>
						      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Quên mật khẩu ? </a></label>
							   </p>
							    <input type="submit" name="Submit" class="button" value="Đăng nhập"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
			    </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="footer-middle">
			<div class="wrap">				   		   		   
		   <div class="section group example">
			  <div class="col_1_of_f_1 span_1_of_f_1">
				 <div class="section group example">
				   <div class="clear"></div>
		      </div>
 			 </div>
			 <div class="col_1_of_f_1 span_1_of_f_1">
			   <div class="section group example">
			     <div class="col_1_of_f_2 span_1_of_f_2">
				   <h3>Liên hệ</h3>
						<div class="company_address">				  
				   		  <p>SHOP ONLINE 2N.SHOP</p>
							   		<p>Cần Thơ</p>
					   		<p>Phone:0964929124</p>
					   		<p>Fax: (000) 000 00 00 0</p>
					 	 	<p>Email: <span>hiep.ctuet@gmail.com</span></p>
					   		
					   </div>
					   <div class="social-media">
						     <ul>
						        <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="Google+"><a href="https://plus.google.com/u/0/118040402168267571712" target="_blank"> </a></span></li>
						        <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Facebook"><a href="https://www.facebook.com/nhunghong2607" target="_blank"> </a></span></li>
						    </ul>
					   </div>
				</div>
				<div class="clear"></div>
		    </div>
		   </div>
		  <div class="clear"></div>
		    </div>
		  </div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
			  <div class="f-list2">
			    <ul>
					<li class="active"><a href="about.php">Giới thiệu</a></li> |
					<li><a href="delivery.php">Giao hàng và hoàn trả</a></li>
					<li><a href="contact.php">Liên hệ với chúng tôi</a></li> 
				 </ul>
			    </div>
			    <div class="clear"></div>
		      </div>
	     </div>
	</div>
</body>
</html>