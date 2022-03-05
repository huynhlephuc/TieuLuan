<!DOCTYPE HTML>
<html>
<head>
<title>Web 2N.SHOP </title>
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
	@session_start();
	include("../db_driver.php");
	$DB = new DB_driver();
	//thực hiện chức năng đăng ký tài khoản
	if(isset($_GET['chucnang'])){
		if($_GET['chucnang'] == "dangkytaikhoan"){
			$tenkhachhang = $_POST['tenkhachhang'];
			$tencongty = $_POST['tencongty'];
			$email = $_POST['email'];
			$matKhau = $_POST['matKhau'];
			$diachi = $_POST['diachi'];
			$quocgia = $_POST['quocgia'];
			$thanhpho = $_POST['thanhpho'];
			$DB->insert('taikhoankhachhang', array(
				'tenkhachhang' => ''.$tenkhachhang,
				'tencongty' => ''.$tencongty,
				'email' => ''.$email,
				'matKhau' => ''.$matKhau,
				'diachi' => ''.$diachi,
				'quocgia' => ''.$quocgia,
				'thanhpho' => ''.$thanhpho
			));
			header("Location: login.php?thongbao=thaotacdangkythanhcong");
		}
	}
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
  <!-- start slider -->
    
    <!--/slider -->
 <div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Tạo tài khoản</h4>
    		   <form action="?chucnang=dangkytaikhoan" method="post">
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input type="text" name = "tenkhachhang" placeholder="Tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}"></div>
		    			<div><input type="text" name = "tencongty" placeholder="Tên công ty hoặc cơ quan đang tham gia" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tên công ty hoặc cơ quan đang tham gia';}"></div>
		    			<div><input type="text" name = "email" id = "email" placeholder="Nhập Email..."></div>
		    			<div><input type="text" name = "matKhau" id = "matKhau" placeholder="Nhập mật khẩu..."></div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	
		    		<div><input type="text" name = "diachi" placeholder="Địa chỉ" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Địa chỉ';}"></div>
		    		<div><select id="country" name="quocgia" onchange="change_country(this.value)" class="frm-field required">
		            <option value="null">Lựa chọn quốc gia</option>         
		            <option value="AX">Åland Islands</option>
		            <option value="AF">Afghanistan</option>
		            <option value="AL">Albania</option>
		            <option value="DZ">Algeria</option>
		            <option value="AS">American Samoa</option>
		            <option value="AD">Andorra</option>
		            <option value="AO">Angola</option>
		            <option value="AI">Anguilla</option>
		            <option value="AQ">Antarctica</option>
		            <option value="AG">Antigua And Barbuda</option>
		            <option value="AR">Argentina</option>
		            <option value="AM">Armenia</option>
		            <option value="AW">Aruba</option>
		            <option value="AU">Australia</option>
		            <option value="AT">Austria</option>
		            <option value="AZ">Azerbaijan</option>
		            <option value="BS">Bahamas</option>
		            <option value="BH">Bahrain</option>
		            <option value="BD">Bangladesh</option>
		            <option value="BB">Barbados</option>
		            <option value="BY">Belarus</option>
		            <option value="BE">Belgium</option>
		            <option value="BZ">Belize</option>
		            <option value="BJ">Benin</option>
		            <option value="BM">Bermuda</option>
		            <option value="BT">Bhutan</option>
		            <option value="BO">Bolivia</option>
		            <option value="BA">Bosnia and Herzegovina</option>
		            <option value="BW">Botswana</option>
		            <option value="BV">Bouvet Island</option>
		            <option value="BR">Brazil</option>
		            <option value="IO">British Indian Ocean Territory</option>
		            <option value="BN">Brunei</option>
		            <option value="BG">Bulgaria</option>
		            <option value="BF">Burkina Faso</option>
		            <option value="BI">Burundi</option>
		            <option value="KH">Cambodia</option>
		            <option value="CM">Cameroon</option>
		            <option value="CA">Canada</option>
		            <option value="CV">Cape Verde</option>
		            <option value="KY">Cayman Islands</option>
		            <option value="CF">Central African Republic</option>
		            <option value="TD">Chad</option>
		            <option value="CL">Chile</option>
		            <option value="CN">China</option>
		            <option value="CX">Christmas Island</option>
		            <option value="CC">Cocos (Keeling) Islands</option>
		            <option value="CO">Colombia</option>
		            <option value="KM">Comoros</option>
		            <option value="CG">Congo</option>
		            <option value="CD">Congo, Democractic Republic</option>
		            <option value="CK">Cook Islands</option>
		            <option value="CR">Costa Rica</option>
		            <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
		            <option value="HR">Croatia (Hrvatska)</option>
		            <option value="CU">Cuba</option>
		            <option value="CY">Cyprus</option>
		            <option value="CZ">Czech Republic</option>
		            <option value="DK">Denmark</option>
		            <option value="DJ">Djibouti</option>
		            <option value="DM">Dominica</option>
		            <option value="DO">Dominican Republic</option>
		            <option value="TP">East Timor</option>
		            <option value="EC">Ecuador</option>
		            <option value="EG">Egypt</option>
		            <option value="SV">El Salvador</option>
		            <option value="GQ">Equatorial Guinea</option>
		            <option value="ER">Eritrea</option>
		            <option value="EE">Estonia</option>
		            <option value="ET">Ethiopia</option>
		            <option value="FK">Falkland Islands (Islas Malvinas)</option>
		            <option value="FO">Faroe Islands</option>
		            <option value="FJ">Fiji Islands</option>
		            <option value="FI">Finland</option>
		            <option value="FR">France</option>
		            <option value="FX">France, Metropolitan</option>
		            <option value="GF">French Guiana</option>
		            <option value="PF">French Polynesia</option>
		            <option value="TF">French Southern Territories</option>
		            <option value="GA">Gabon</option>
		            <option value="GM">Gambia, The</option>
		            <option value="GE">Georgia</option>
		            <option value="DE">Germany</option>
		            <option value="GH">Ghana</option>
		            <option value="GI">Gibraltar</option>
		            <option value="GR">Greece</option>
		            <option value="GL">Greenland</option>
		            <option value="GD">Grenada</option>
		            <option value="GP">Guadeloupe</option>
		            <option value="GU">Guam</option>
		            <option value="GT">Guatemala</option>
		            <option value="GG">Guernsey</option>
		            <option value="GN">Guinea</option>
		            <option value="GW">Guinea-Bissau</option>
		            <option value="GY">Guyana</option>
		            <option value="HT">Haiti</option>
		            <option value="HM">Heard and McDonald Islands</option>
		            <option value="HN">Honduras</option>
		            <option value="HK">Hong Kong S.A.R.</option>
		            <option value="HU">Hungary</option>
		            <option value="IS">Iceland</option>
		            <option value="IN">India</option>
		            <option value="ID">Indonesia</option>
		            <option value="IR">Iran</option>
		            <option value="IQ">Iraq</option>
		            <option value="IE">Ireland</option>
		            <option value="IM">Isle of Man</option>
		            <option value="IL">Israel</option>
		            <option value="IT">Italy</option>
		            <option value="JM">Jamaica</option>
		            <option value="JP">Japan</option>
		            <option value="JE">Jersey</option>
		            <option value="JO">Jordan</option>
		            <option value="KZ">Kazakhstan</option>
		            <option value="KE">Kenya</option>
		            <option value="KI">Kiribati</option>
		            <option value="KR">Korea</option>
		            <option value="KP">Korea, North</option>
		            <option value="KW">Kuwait</option>
		            <option value="KG">Kyrgyzstan</option>
		            <option value="LA">Laos</option>
		            <option value="LV">Latvia</option>
		            <option value="LB">Lebanon</option>
		            <option value="LS">Lesotho</option>
		            <option value="LR">Liberia</option>
		            <option value="LY">Libya</option>
		            <option value="LI">Liechtenstein</option>
		            <option value="LT">Lithuania</option>
		            <option value="LU">Luxembourg</option>
		            <option value="MO">Macau S.A.R.</option>
		            <option value="MK">Macedonia</option>
		            <option value="MG">Madagascar</option>
		            <option value="MW">Malawi</option>
		            <option value="MY">Malaysia</option>
		            <option value="MV">Maldives</option>
		            <option value="ML">Mali</option>
		            <option value="MT">Malta</option>
		            <option value="MH">Marshall Islands</option>
		            <option value="MQ">Martinique</option>
		            <option value="MR">Mauritania</option>
		            <option value="MU">Mauritius</option>
		            <option value="YT">Mayotte</option>
		            <option value="MX">Mexico</option>
		            <option value="FM">Micronesia</option>
		            <option value="MD">Moldova</option>
		            <option value="MC">Monaco</option>
		            <option value="MN">Mongolia</option>
		            <option value="ME">Montenegro</option>
		            <option value="MS">Montserrat</option>
		            <option value="MA">Morocco</option>
		            <option value="MZ">Mozambique</option>
		            <option value="MM">Myanmar</option>
		            <option value="NA">Namibia</option>
		            <option value="NR">Nauru</option>
		            <option value="NP">Nepal</option>
		            <option value="NL">Netherlands</option>
		            <option value="AN">Netherlands Antilles</option>
		            <option value="NC">New Caledonia</option>
		            <option value="NZ">New Zealand</option>
		            <option value="NI">Nicaragua</option>
		            <option value="NE">Niger</option>
		            <option value="NG">Nigeria</option>
		            <option value="NU">Niue</option>
		            <option value="NF">Norfolk Island</option>
		            <option value="MP">Northern Mariana Islands</option>
		            <option value="NO">Norway</option>
		            <option value="OM">Oman</option>
		            <option value="PK">Pakistan</option>
		            <option value="PW">Palau</option>
		            <option value="PS">Palestinian Territory, Occupied</option>
		            <option value="PA">Panama</option>
		            <option value="PG">Papua new Guinea</option>
		            <option value="PY">Paraguay</option>
		            <option value="PE">Peru</option>
		            <option value="PH">Philippines</option>
		            <option value="PN">Pitcairn Island</option>
		            <option value="PL">Poland</option>
		            <option value="PT">Portugal</option>
		            <option value="PR">Puerto Rico</option>
		            <option value="QA">Qatar</option>
		            <option value="RE">Reunion</option>
		            <option value="RO">Romania</option>
		            <option value="RU">Russia</option>
		            <option value="RW">Rwanda</option>
		            <option value="SH">Saint Helena</option>
		            <option value="KN">Saint Kitts And Nevis</option>
		            <option value="LC">Saint Lucia</option>
		            <option value="PM">Saint Pierre and Miquelon</option>
		            <option value="VC">Saint Vincent And The Grenadines</option>
		            <option value="WS">Samoa</option>
		            <option value="SM">San Marino</option>
		            <option value="ST">Sao Tome and Principe</option>
		            <option value="SA">Saudi Arabia</option>
		            <option value="SN">Senegal</option>
		         </select></div>		        
		          <div><input name = "thanhpho" type="text" placeholder="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}"></div>
		           <div>
		          </div>
		          
		          </div>
		      <button class="grey" onClick="return kiemtrathongtin()">Đăng ký</button>
		    <p class="terms">Bằng cách nhấp vào 'Đăng ký' bạn đồng ý với <a href="#">2N.SHOP</a>.</p>
		    <div class="clear"></div>
            <script>
                function kiemtrathongtin(){
                    if(document.getElementById("email").value == ""){
                        alert("Hãy nhập emali để đăng nhập");
                        return false;
                    }else if(document.getElementById("matKhau").value == ""){
                        alert("Hãy nhập mật khẩu");
                        return false;
                    }else{
                        return true;
                    }
                } 
            </script>
		    </form>
		  
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
					 	 	<p>Email: <span>hiep.ctuet@gmail.comm</span></p>
					   		
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