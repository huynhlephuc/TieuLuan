<!DOCTYPE HTML>
<html>
<head>
<title>WELCOM TO Hải Sản Việt </title>
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
	<div class="mens">    
  <div class="main">
     <div class="wrap">
		<!--<div class="cont span_2_of_3">-->
		  	<h2 class="head">Hải Sản </h2>
		  	<div class="mens-toolbar">
             <!-- <div class="sort">
               	<div class="sort-by">
		            <label>Sắp xếp theo</label>
		            <select>
		                            <option value="">
		                    Vị trí                </option>
		                            <option value="">
		                    Tên                </option>
		                            <option value="">
		                    Giá                </option>
		            </select>
		            <a href=""><img src="../images/arrow2.gif" alt="" class="v-middle"></a>
               </div>
    		</div>-->
        <div class="pager">   
        	<!--<div class="limiter visible-desktop">
            <label>Hiển thị</label>
            <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                        </select> sản phẩm        
             </div>-->
       		<!--<ul class="dc_pagination dc_paginationA dc_paginationA06">
			    <li><a href="#" class="previous">Trang</a></li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
		  	</ul>
	   		<div class="clear"></div>
    	</div>-->
     	<div class="clear"></div>
		</div>
		<!--<div class="top-box">
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="single.php">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N01.jpg" width="100%" height="250"/>
					</div>
                    <div class="sale-box"><span class="on_sale title_shop">Mới</span></div>	
                    <div class="price">
					   <div class="cart-left">
							<p class="title"> Ốp lưng Iphone 7Plus </p>
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
			   	 <a href="single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N02.jpg" width="100%" height="250" alt=""/>
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
				 <a href="single.php">
				  <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N03.JPG" width="100%" height="250" alt=""/>
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
			</div>	-->
           
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
			<div class="top-box">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.php?idsanpham=<?php echo $row['idsanpham']?>">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../<?php echo $row['anh']?>" width="100%" height="250" alt=""/>
					</div>
                    <div class="price">
					   <div class="cart-left">
							<p class="title"><?php echo $row['tensanpham']?></p>
							<div class="price1">
							  <span class="actual"><?php echo number_format($row['giasanpham'],0). 'VNĐ'?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                   </a>
				</div>
				<!--<div class="col_1_of_3 span_1_of_3">
					<a href="single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N05.jpg" width="100%" height="250" alt=""/>
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
				 <a href="single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N06.png" width="100%" height="250" alt=""/>
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
				</div>-->
                <?php
				}
				?>
				<div class="clear"></div>
			</div>
            	
			<!--<div class="top-box1">
			  <div class="col_1_of_3 span_1_of_3">
			  	 <a href="single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N07.png" width="100%" height="250" alt=""/>
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
				 <a href="single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N08.jpg" width="100%" height="250" alt=""/>
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
				  <a href="single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N09.jpg" width="100%" height="250" alt=""/>
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
			  	 <a href="single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N10.jpg" width="100%" height="250" alt=""/>
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
					<a href="single.php">
					<div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N11.jpg" width="100%" height="250" alt=""/>
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
				 <a href="single.php">
				 <div class="inner_content clearfix">
					<div class="product_image">
						<img src="../images/N12.jpg" width="100%" height="250" alt=""/>
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
			</div>			 						 			    
		  </div>-->
          
          <!---->
          
		  <!--<div class="clear"></div>-->
            <div class="pager">   
        	<!--<div class="limiter visible-desktop">
            <label>Hiển thị</label>
            <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                        </select> sản phẩm        
             </div>-->
       		<ul class="dc_pagination dc_paginationA dc_paginationA06">
			    <!--<li><a href="#" class="previous">Trang</a></li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>-->
                <?php
                echo $paging['html'];
				?>
		  	</ul>
	   		<div class="clear"></div>
    	</div>
        
        <!-- -->
        
	</div>
	</div>
	</div>

		<script src="../js/jquery.easydropdown.js"></script>
	 <div class="footer">
		<div class="footer-top">
			<div class="wrap">
			  <div class="section group example">
				<div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
					  <li><img src="../images/2.png"><span class="f-text">Free ship với hóa đơn trên $100</span>
				        <div class="clear"></div></li>
					</ul>
				</div>
				<div class="col_1_of_2 span_1_of_2">
					<ul class="f-list">
					  <li><img src="../images/3.png"><span class="f-text">Hãy gọi cho chúng tôi !</span>
		                <div class="clear"></div></li>
					</ul>
				</div>
				<div class="clear"></div>
		      </div>
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