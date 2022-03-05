<!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Thêm loại sản phẩm.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  <div class="w3-card-4">
  <div class="w3-container w3-brown">
    <h2>Nhập thông tin</h2>
  </div>
  <form class="w3-container" action="modules/qlloaisanpham/sulyloaisanpham.php?chucnang=themloaisanpham" method="post" enctype="multipart/form-data">
    <p>      
        <label class="w3-text-brown"><b>Tên loại:</b></label>
        <input class="w3-input w3-border w3-sand" name="tenloaisanpham" type="text">
    </p>
    <p>      
        <label class="w3-text-brown"><b>Thứ tự:</b></label>
        <input class="w3-input w3-border w3-sand" name="thutu" type="text">
    </p>
   	<p>
        <input type="submit" class="w3-btn w3-button w3-red" value="Thêm"><input type="reset" class="w3-btn w3-red" value="Hủy">
    </p>
  </form>
</div>