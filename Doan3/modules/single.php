<!DOCTYPE HTML>
<html>
<head>
<title>2N.SHOP </title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script src="../js/jquery1.min.js"></script>
<!-- start menu -->
<link rel="stylesheet" type="text/css" href="../css/megamenu.css">
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="../js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="../js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
<link rel="stylesheet" type="text/css" href="../css/etalage.css">
<script src="../js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 360,
					thumb_image_height: 360,
					source_image_width: 900,
					source_image_height: 900,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
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
					<!--<li class="active"><a href="login.php">Tài khoản</a></li> |-->
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
			<!--<li><a class="color4" href="#">Đồng Hồ Nữ</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Thương hiệu</h4>
								<ul>
									<li><a href="oplung.php">Casio</a></li>
									<li><a href="oplung.php">Citizen</a></li>
									<li><a href="oplung.php">Tissot </a></li>
									<li><a href="oplung.php">Elle</a></li>
                                    <li><a href="oplung.php">Seiko</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Chất liệu dây</h4>
								<ul>
                                	<li><a href="womesn.php">Inox</a></li>
									<li><a href="oplung.php">Da</a></li>			
								</ul>	
							</div>							
						</div>
						
					  </div>
					</div>
				</li>-->				
				<!--<li><a class="color5" href="#">Đồng Hồ Nam</a>
				<div class="megapanel">
					<div class="col1">
							<div class="h_nav">
								<h4>Thương hiệu</h4>
								<ul>
									<li><a href="phukienkhac.php">Casio</a></li>
									<li><a href="phukienkhac.php">Citizen</a></li>
									<li><a href="phukienkhac.php">OP </a></li>
									<li><a href="phukienkhac.php">Orient</a></li>
                                    <li><a href="phukienkhac.php">Seiko</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>Chất liệu dây</h4>
								<ul>
                                	<li><a href="phukienkhac.php">Inox</a></li>
									<li><a href="phukienkhac.php">Da</a></li>
									<li><a href="phukienkhac.php">Cao Su </a></li>
								</ul>	
							</div>												
						</div>
				  </div>
				</li>-->
                <li><a class="color4" href="oplung.php">Hải Sản</a>
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
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
        <!-- <div class="search">	  
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
					if(isset($_SESSION['giohang'])){
						foreach($_SESSION['giohang'] as $iteam ){
							$row = $DB->get_row('select * from sanpham where idsanpham = '.$iteam["id"]);
							$tongtien += $iteam["soluong"] * $row['giasanpham'];
						}
					}
				?>
					<li><h3><?php echo number_format($tongtien,0)." VNĐ" ?></h3><a href=""></a></li>
				</ul>
			</li>
		</ul>
	    <ul class="last">
	      <li><a href="checkout.php">Giỏ hàng (<?php if(isset($_SESSION['giohang'])) echo count($_SESSION['giohang']); else echo "0"?>)</a></li></ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
    </div>
	<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="../index.php">Trang chủ</a> /  Ốp lưng</ul>
		<div class="cont span_2_of_3">
        
        <!--hiển thị thông tin chi tiết sản phẩm-->
        	<?php
            if(isset($_GET['idsanpham'])){
				$row = $DB->get_row('select * from sanpham where idsanpham = '.$_GET['idsanpham']);
			?>
		  	<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="../<?php echo $row['anh']?>" class="img-responsive" />
									<img class="etalage_source_image" src="../<?php echo $row['anh']?>" class="img-responsive" title="" />
								</a>
							</li>
							
						</ul>
						 <div class="clearfix"></div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?php echo $row['tensanpham']?></h3>
		             <p class="m_5"><?php echo number_format($row['giasanpham'],0).' VNĐ'?><span class="reducedfrom"></span><!-- <a href="#">Nhấn để đặt hàng</a>--></p>
		         	 <div class="btn_form">
						<form action="../index.php?themgiohang=<?php echo $row['idsanpham']?>" method="post">
							<input type="submit" value="Thêm Vào giỏ" title="">
						</form>
					 </div>
					<span class="m_link"><a href="#">Đăng nhập để lưu vào giỏ hàng</a> </span>
				     <p class="m_text2"><?php echo $row['mota']?></p>
			     </div>
                <?php
			}
				?> 
              <!---->
              
			   <div class="clear"></div>
	      <div class="toogle">
	        
     <div class="toogle">
     	
     </div>
      </div><div class="clear"></div>
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
				   		  <p>SHOP ONLINE PT</p>
							   		<p>Cần Thơ</p>
					   		<p>Phone:0968691642</p>
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