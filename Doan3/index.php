<!DOCTYPE HTML>
<php>
<head>
<title>WELCOM TO Hải Sản Việt</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>

<!-- Link css sửa cái footer -->
<link href="css/phuccss.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="css/StylePhuc.css" rel="stylesheet">

<!-- Kết thúc css cái footer -->



<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>
<link rel="stylesheet" href="modules/w3.css">
</head>
<!--sử lý đăng nhập-->
<?php
include("db_driver.php");
$DB = new DB_driver();
@session_start();
  if(isset($_GET['chucnang'])){
	  if($_GET['chucnang']=="dangnhap"){
		  $taikhoan = $_POST['email'];
		  $makhau = $_POST['password'];
		  $sql = "select * from taikhoankhachhang where email = '$taikhoan' and matKhau = '$makhau'";
		  $ketqua = $DB->get_list($sql);
		  if(count($ketqua) > 0){
			  //session_register('txtTaiKhoan');
			  $_SESSION["TaiKhoankhachhang"] = $taikhoan;
			  header("location: index.php");
		  }
		  else{
			  header("location: modules/login.php?thongbao=matkhaukhongdung");
		  }
	  }
  }
?>
<!--sử lý giỏ hàng-->
<?php 
		 
	  if(isset($_GET['themgiohang'])){
		  $id = $_GET['themgiohang'];
		  if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
			  $count = count($_SESSION['giohang']);
			  $flag = false;
			  for($i = 0 ; $i < $count; $i++){
				  if($_SESSION['giohang'][$i]["id"] == $id){
					  $_SESSION['giohang'][$i]["soluong"]++ ;
					  $flag = true;
					  break; 
				  }
			  }
			  if($flag == false){
				  $_SESSION['giohang'][$count]["id"] = $id;
				  $_SESSION['giohang'][$count]["soluong"] = 1;
			  }
		  }
		  else{
			  $_SESSION['gioihang'] = array();
			  $_SESSION['giohang'][0]["id"] = $id;
			  $_SESSION['giohang'][0]["soluong"] = 1;
		  }
		 header("location: index.php");
	  }
  ?>
<body>
<?php
	
?>
     <div class="header-top">
	   <div class="wrap">
	     <div class="cssmenu">
			<ul>
				<!--	<li class="active"><a href="modules/login.php">Tài khoản</a></li> |-->
					<li><a href="modules/checkout.php">Danh sách sản phẩm</a></li> |
					<li><a href="modules/checkout.php">Thanh toán</a></li> |
					<li><a href="modules/login.php"><?php if(isset($_SESSION['TaiKhoankhachhang'])) echo $_SESSION['TaiKhoankhachhang']; else echo "Đăng nhập" ?></a></li> |
					<li><a href="modules/register.php">Đăng ký</a></li>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" width="136" height="47"/></a>
			</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="active grid"><a href="index.php">Trang chủ</a></li>
			<li><a class="color4" href="modules/oplung.php">Hải Sản</a>
				<!--<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>Thương hiệu</h4>
								<ul>
									<li><a href="modules/oplung.php">APPLE</a></li>
									<li><a href="modules/oplung.php">SAMSUNG</a></li>
									<li><a href="modules/oplung.php">OPPO</a></li>
									<li><a href="modules/oplung.php">VIVO</a></li>
                                    <li><a href="modules/oplung.php">HTC</a></li>
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
									<li><a href="modules/phukienkhac.php">Tai nghe</a></li>
									<li><a href="modules/phukienkhac.php">Cục sạt</a></li>
									<li><a href="modules/phukienkhac.php">Pin dự phòng</a></li>
									<li><a href="modules/phukienkhac.php">Cường lực</a></li>
                                    <li><a href="modules/phukienkhac.php">Thẻ nhớ</a></li>
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
        <!-- <div class="search">	  
				<input type="text" name="s" class="textbox" value="Tìm kiếm" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>-->
	  <div class="tag-list">
	    <ul class="icon1 sub-icon1 profile_img">
		</ul>
		<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="modules/checkout.php"> </a>
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
	      <li><a href="modules/checkout.php">Giỏ hàng (<?php if(isset($_SESSION['giohang'])) echo count($_SESSION['giohang']); else echo "0"?>)</a></li></ul>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>
    
     <!--Hiển thị thông báo-->
    <?php 
		  if(isset($_GET['thongbao'])){
			  if($_GET['thongbao'] == 'muahangthanhcong'){
		  ?>
		  <div id = "Thongbao1" class="w3-green" onClick="An('Thongbao1')">
			  <p><b>Thành công! </b>Bạn đã mua hàm thành công</p>
		  </div>	
		  </a>
          <?php
			  }else if($_GET['thongbao'] == 'thaotackhongthanhcong'){
		  ?>
          <div id = "Thongbao3" class="w3-red" onClick="An('Thongbao3')">
			  <p><b>Mua hàng không thành công! </b>Hãy đăng nhập hoặc thêm sản phẩm vào giỏ</p>
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
    
  <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                <!-- Slide image -->
                    <img src="images/silehaisan.jpg" width="100%" height="500px" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h4  class="title" >THẾ GIỚI HẢI SẢN </h4>
                        <!-- /Text title -->
                        
                        <!-- Text description -->
                        <p class="description">HẢI SẢN TƯƠI MỚI NHẤT</p>
                        <!-- /Text description -->
                    </div>
                </div>
                 <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="images/hinh-nen-hai-san.jpg" width="100%" height="500px" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">Tươi - Sống</h4>	
                        <p class="description">Chỉ Có Thể Là 2N.SHOP</p>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->



	<!-- Bắt đầu chỉnh code footer <phuc> -->

 <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4 " style="background-color: rgba(122, 204, 236, 0.9);padding: 5px; border-radius: 5px;margin-bottom: -15px; ">Các công ty hợp tác cùng chúng tôi</h1>
            </div>
            <hr>
            <div class="col-12">
                <p></p>
            </div>
        </div>
    </div>

<!--Logo công ty quảng cáo-->
<div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-md-4 ">
                <i class="fab fa-react"></i>
                <h3>Thiên Nam</h3>
                <p>Công ty tôm giống miền nam</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="fab fa-angular"></i>
                <h3>Đại Tiến </h3>
                <p>Nhà phân phối tôm thành phẩm</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <i class="fab fa-css3"></i>
                <h3>Hương Việt</h3>
                <p>Công ty thương hiệu</p>
            </div>
        </div>
        <hr class="my-4">
    </div>


<!-- Phần giới thiệu về công ty chúng tôi -->
<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-12 col-lg-6">
			<h2>Giới thiệu về các công ty</h2>
			<p>Thành lập năm 2001, Công ty TNHH Việt – Úc nhanh chóng trở thành một trong những công ty cung cấp tôm giống và tôm bố mẹ uy tín, chất lượng nhất nước.</p>
			<p>Công ty Việt – Úc nhập tôm bố mẹ từ Mỹ và Úc đạt tiêu chuẩn quốc tế quy trình sản xuất tôm giống áp dụng tiêu chuẩn GlobalGAP. Năm 2012, Công ty Việt – Úc đưa ra thị trường 4 tỷ con giống, vượt kế hoạch 0,5 tỷ con.</p>
			<p>Trong đó bán cho các vùng nuôi 3,6 tỷ con, doanh thu 280 tỷ đồng; hỗ trợ vùng nuôi thiệt hại do dịch bệnh 0,4 tỷ con, trị giá trên 3,2 tỷ đồng. Năm 2013, Việt – Úc sẽ tăng sản lượng giống lên 6,4 tỷ con (bằng 160% so năm 2012), giá bán
				bình quân 80 đồng/con. Để hoàn thành kế hoạch, năm 2012 Công ty đã đầu tư thêm 40 tỷ đồng, lấp bớt ao nuôi tôm thịt để lập thêm 31 trại sản xuất giống, cùng các hạ tầng kỹ thuật khác.</p>
			<br>
		</div>
		<div class="col-lg-6">
			<img src="./Images/congty.jpg" class="img-fluid">
		</div>
	</div>
</div>
<!-- Kết thúc phần giới thiệu công ty chúng tôi -->


<!-- Kết thúc thêm code footer </Phuc> -->









<div class="main">
	<div class="wrap">
		<div class="section group">
		  <div class="cont span_2_of_3">
		  	<h2 class="head">Sản phẩm nổi bật</h2>
			<div class="top-box">
            
            <!--Hiển thị thông tin sản phẩm-->
            <?php
			$result = $DB->get_row("SELECT count(idsanpham) as counter from sanpham");
			$total_records = $result['counter'];
		 
			// Lấy trang hiện tại
			$current_page = input_get('page');
		 
			// Lấy limit
			$limit = 12;
		 
			// Lấy link
			$link = "?chucnang=xemdanhsachsanpham&page={page}";
	  
			// Thực hiện phân trang
			$paging = paging($link, $total_records, $current_page, $limit);
		 
			// Lấy danh sách User
			
			$member = $DB->get_list("SELECT * from sanpham LIMIT {$paging['start']}, {$paging['limit']}");
			foreach($member as $row){
		?>
			<div class="col_1_of_3 span_1_of_3">
			   <a href="modules/single.php?idsanpham=<?php echo $row['idsanpham']?>">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="<?php echo $row['anh']?>" width="100%" height="250"/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title"><?php echo $row['tensanpham']?></p>
							<div class="price1">
							  <span class="actual"><?php echo number_format($row['giasanpham'],0).' VNĐ'?></span>
							</div>
						</div>
						<div class="cart-right"></div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
                <?php
			}
				?>
                <!---->
			   <!--<div class="col_1_of_3 span_1_of_3">
			   	 <a href="modules/single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N02.jpg" width="100%" height="250" alt=""/>
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng Iphone 6</p>
							<div class="price1">
							  <span class="actual">150.000Đ</span>
							</div>

						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
                
				<div class="col_1_of_3 span_1_of_3">
				 <a href="modules/single.php">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N03.JPG" width="100%" height="250" alt=""/>
					</div>
                    <div class="sale-box1"><span class="on_sale title_shop">Giảm giá</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title"> Ốp lưng SamSung J7Prime</p>
							<div class="price1">
							  <span class="reducedfrom">160.000Đ</span>
							  <span class="actual">150.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div>	
			<div class="top-box">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N04.jpg" width="100%" height="250" alt=""/>
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng SamSung S8</p>
							<div class="price1">
							  <span class="actual">180.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<a href="modules/single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N05.jpg" width="100%" height="250" alt=""/>
					</div>
					 <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng OPPO F1S</p>
							<div class="price1">
							  <span class="actual">120.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N06.png" width="100%" height="250" alt=""/>
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng F3</p>
							<div class="price1">
							  <span class="actual">160.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
				<div class="clear"></div>
			</div>	
			<div class="top-box1">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N07.png" width="100%" height="250" alt=""/>
					</div>
                     <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng SamSung S7</p>
							<div class="price1">
							  <span class="actual">150.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="modules/single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N08.jpg" width="100%" height="250" alt=""/>
					</div>
					 <div class="sale-box1"><span class="on_sale title_shop">Giảm giá</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng SamSung J5Prime</p>
							<div class="price1">
							  <span class="reducedfrom">150.000Đ</span>
							  <span class="actual">120.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				  <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N09.jpg" width="100%" height="250" alt=""/>
					</div>
                   	 <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng VIVO V5</p>
							<div class="price1">
							  <span class="actual">120.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div>	
		  <h2 class="head">Sản phẩm mới</h2>	
		    <div class="section group">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N10.jpg" width="100%" height="250" alt=""/>
					</div>
                     <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng HTC M8</p>
							<div class="price1">
							  <span class="actual">120.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<a href="modules/single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N11.jpg" width="100%" height="250" alt=""/>
					</div>
					 <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng Iphone 7</p>
							<div class="price1">
							  <span class="actual">150.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="col_1_of_3 span_1_of_3">
				 <a href="modules/single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="images/N12.jpg" width="100%" height="250" alt=""/>
					</div>
                   	 <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title">Ốp lưng Iphone 7Plus</p>
							<div class="price1">
							  <span class="actual">200.000Đ</span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<div class="clear"></div>
			</div>	-->		 						 			    
		  </div>
		  <div class="clear"></div>
	</div>
	</div>
	</div>
   <div class="footer">
		<div class="footer-top">
			<div class="wrap">
			  <div class="section group example">
				<!-- <div class="col_1_of_2 span_1_of_2" style="background:#39a0b9">
					<ul class="f-list">
					  <li><img src="images/2.png"><span class="f-text">Free ship với hóa đơn trên 300.000đ</span>
				        <div class="clear"></div></li>
					</ul>
				</div>
				<div class="col_1_of_2 span_1_of_2" style="background:#069">
					<ul class="f-list">
					  <li><img src="images/3.png"><span class="f-text">Hãy gọi cho chúng tôi !</span>
		                <div class="clear"></div></li>
					</ul>
				</div> -->
				<div class="clear"></div>
		      </div>
			</div>
		</div>
		<!-- <div class="footer-middle">
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
					<li class="active"><a href="modules/about.php">Giới thiệu</a></li> |
					<li><a href="modules/delivery.php">Giao hàng và hoàn trả</a></li>
					<li><a href="modules/contact.php">Liên hệ với chúng tôi</a></li> 
				 </ul>
			    </div>
			    <div class="clear"></div>
		      </div>
	     </div> -->

		<!--Thẻ tầm nhìn-->
        <div class="row padding">
				<div class="col-md-12 col-lg-6">
					<h2>Tầm nhìn</h2>
					<p>Tầm nhìn: Cung cấp đầy đủ truy nguyên nguồn gốc, tính bền vững và nâng cao hiệu suất cho ngành công nghiệp nuôi tôm sú toàn cầu.</p>
					<p>Sứ mệnh: Là nhà sản xuất và cung cấp giống lai chọn lọc hàng đầu đã được thuần hoá và thông qua, cải tiến về mặt di truyền và được chứng nhận SPF giống tôm bố mẹ.</p>
					<p class="left ">Sứ mệnh thương mại: Cung cấp cho ngành công nghiệp thủy sản Tôm Sú những giải pháp cần thiết cho các vấn đề hiện tại của: – Truy nguồn gốc xuất xứ,cung cấp nguyên liêu thô liên tục và bền vững (Hậu ấu trùng Bố Mẹ PPL/ Bố Mẹ giống) – Chứng
						nhận giống Sạch Mầm Bệnh – Những đặc điểm được cải thiện (tăng trưởng, …) – Chứng nhận xuất xứ (Giống gia hóa)</p>
					<br>

					<br>
				</div>
				<div class="col-lg-6">
					<img src="./Images/nuoi-tom-sieu-tham-canh-trong-be-noi-1.jpg" class="img-fluid">
				</div>
			</div>
			<hr class="my-4">
		</div>
    <!--ĐÓNG TẦM NHÌN-->
	 <!--THẺ CÁC THÔNG TIN LIÊN QUAN-->
	 <div class="container-fluid padding">
        <div class="row text-center padding">
            <!-- Logo nhỏ-->
            <div class="col-12 social padding mt-1">
                <a href="https://www.facebook.com/0376223350T"><i class="fab fa-facebook"></i></a>
                <a href="https://www.w3schools.com/bootstrap/bootstrap_carousel.asp"><i class="fab fa-twitter"></i></a>
                <a href="https://mail.google.com/mail/u/0/#inbox"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://getbootstrap.com/docs/4.3/components/carousel/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/watch?v=1TkAo4Y0Wls"><i class="fab fa-youtube"></i></a>
            </div>
            <!--...-->
        </div>
    </div>
    <!--ĐÓNG THẺ-->

    <!--THẺ FOOTER-->
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <hr class="light">

                    <img src="./Images/logo.png" height="40px ">
                    <hr class="light">

                    <p>111-222-3333</p>
                    <p>mymail@gmail.com</p>
                    <p>Nguyen Van Cu street, Can Tho, Vietnam</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">

                    <h5>Working hours</h5>
                    <hr class="light">

                    <p>Monday-Friday: 8am - 5pm</p>
                    <p>Weekend: 8am - 12am</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">

                    <h5>Viết tạm coi sao</h5>
                    <hr class="light">

                    <p>Outsourcing</p>
                    <p>Website chưa nghĩ ra tên</p>
                    <p>Mobile applications</p>
                </div>
                <div class="col-12">
                    <hr class="light-100">
                    <h5 class="h5build">&copy; WebProChua</h5>
                </div>
            </div>
        </div>
    </footer>
    <!--ĐÓNG THẺ-->

	</div>
</body>
</php>