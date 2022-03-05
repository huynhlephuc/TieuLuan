<!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Thêm sản phẩm mới.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  <div class="w3-card-4">
  <div class="w3-container w3-brown">
    <h2>Nhập thông tin</h2>
  </div>
  <form class="w3-container" action="modules/qlsanpham/sulysanpham.php?chucnang=themsanpham" method="post" enctype="multipart/form-data">
    <p>      
        <label class="w3-text-brown"><b>Tên sản phẩm:</b></label>
        <input class="w3-input w3-border w3-sand" name="tensanpham" type="text">
    </p>
    <p>      
        <label class="w3-text-brown"><b>Loại sản phẩm</b></label>
        <select class="w3-select" name="loaisanpham" class="loaisanpham">
            <option value="" disabled selected>Chọn loại sản phẩm</option>
            <!--hiển thị danh sách loại sản phẩm-->
            <?php
            $member = $DB->get_list("SELECT * from loaisanpham");
			foreach($member as $row){
            	echo  "<option value='" .$row["id_loaisanpham"]. "'>" .$row["tenloaisanpham"]. "</option>";
			}
            ?>
          </select>
    </p>
    <p>      
    <label class="w3-text-brown"><b>Giá sản phẩm:</b></label>
    <input class="w3-input w3-border w3-sand" name="giasanpham" type="text">
    </p> 
    <p>      
        <label class="w3-text-brown"><b>Mô tả</b></label>
        <p><textarea class="w3-input w3-border w3-sand" placeholder="Subject" name = "mota"></textarea></p>
    </p> 
    <p>      
        <label class="w3-text-brown"><b>Chọn ảnh mới</b></label></br>
 		<input type="file" name="img">
    </p>
	

	
   	<p>
        <input type="submit" class="w3-btn w3-button w3-red" value="Thêm"><input type="reset" class="w3-btn w3-red" value="Hủy">
    </p>
  </form>
</div>