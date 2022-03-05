  <!-- Header -->
  	<!--thông báo đã đặt tóc thành công-->
  <div class="w3-container" style="margin-top:80px" id="showcase">
   	<h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Đổi mật khẩu mới.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <?php 
	if(isset($_GET['thongbao'])){
		if($_GET['thongbao'] == 'matkhaukhongdung'){
	?>
	<div id = "Thongbao1" class="w3-red" onClick="An('Thongbao1')">
		<p><b>Không thành công! </b>Mật khẩu củ không đúng</p>
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
  </div>
<div class="w3-card-4" style="width:60%">
  <div class="w3-container w3-teal">
    <h2>Hãy nhập thông tin</h2>
  </div>
  <form class="w3-container" action="modules/qltaikhoan/sulytaikhoan.php?chucnang=capnhatmatkhau" method="post"	>
    <p>      
    <label class="w3-text-brown"><b>Mật khẩu củ:</b></label>
    <input class="w3-input w3-border w3-sand" id="matkhaucu" type="password" placeholder="Mật khẩu củ..." name = "matkhaucu"></p>
    <p>      
    <label class="w3-text-brown"><b>Last Name</b></label>
    <input class="w3-input w3-border w3-sand" id="matkhaumoi" type="password" placeholder="Mật khẩu mới..." name = "matkhaumoi"></p>
    <p>
    <p>      
    <label class="w3-text-brown"><b>Last Name</b></label>
    <input class="w3-input w3-border w3-sand" id="xacnhanmatkhau" type="password" placeholder="Xác nhận mật khẩu..." name = "xacnhanmatkhau"></p>
    <p>
    <button class="w3-btn w3-brown" onClick="return kiemtrathongtin()">Lưu lại</button><input type="reset" class="w3-btn w3-brown" value="Hủy"></p>
  </form>
  <script>
	  function kiemtrathongtin(){
		  if(document.getElementById("matkhaucu").value == ""){
			  alert("hãy nhập mật khẩu củ");
			  return false;
		  }else if(document.getElementById("matkhaumoi").value == ""){
			  alert("hãy nhập mật khẩu mới");
			  return false;
		  }else if(document.getElementById("xacnhanmatkhau").value == ""){
			  alert("hãy nhập mật khẩu xác nhận");
			  return false;
		  }else if(document.getElementById("matkhaumoi").value != document.getElementById("xacnhanmatkhau").value){
			  alert("Xác nhận mật khẩu không đúng hãy nhập lại mật khẩu xác nhận");
			  return false;
		  }else{
			  return true;
		  }
	  } 
  </script>
</div>