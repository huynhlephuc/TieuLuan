<!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Cập nhật thông sản phẩm.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  <?php
  	if(isset($_GET['idsanpham'])){
		$row = $DB->get_row('select * from sanpham where idsanpham = '.$_GET['idsanpham']);
  ?>
  <div class="w3-card-4">
  <div class="w3-container w3-brown">
    <h2>Mã sản phẩm số <?php echo $row['idsanpham']?></h2>
  </div>
  <form class="w3-container" action="modules/qlsanpham/sulysanpham.php?chucnang=capnhatsanpham&idsanpham=<?php echo $row['idsanpham']?>&page=<?php echo $_GET['page'];?>" method="post" enctype="multipart/form-data">
    <p>      
        <label class="w3-text-brown"><b>Tên sản phẩm:</b></label>
        <input class="w3-input w3-border w3-sand" name="tensanpham" type="text" value="<?php echo $row['tensanpham']; ?>">
    </p>
    <p>      
        <label class="w3-text-brown"><b>Loại sản phẩm</b></label>
        <select class="w3-select w3-border w3-sand" name="loaisanpham">
        	<?php
           	$member = $DB->get_list("SELECT * from loaisanpham");
			foreach($member as $row2){
			?>
            <option value="<?php echo $row2['id_loaisanpham']?>" <?php if($row['id_loaisanpham']== $row2['id_loaisanpham']) echo 'selected="selected"' ?>><?php echo $row2['tenloaisanpham']?></option>
            <?php
			}
			?>
          </select>
    </p>
    <p>      
    <label class="w3-text-brown"><b>Giá sản phẩm</b></label>
    <input class="w3-input w3-border w3-sand" name="giasanpham" type="text" value="<?php echo number_format($row['giasanpham'],0).' VNĐ'; ?>">
    </p> 
    <p>      
        <label class="w3-text-brown"><b>Mô tả sản phẩm</b></label>
        <p><textarea class="w3-input w3-border w3-sand" placeholder="Subject" name="mota"><?php echo $row['mota']; ?></textarea></p>
    </p> 
     <p>      
        <label class="w3-text-brown"><b>Ảnh</b></label></br>
  <img src="../<?php echo $row['anh']; ?>" class="w3-border" alt="Norway" style="padding:4px;width:50%">
    </p> 
    <p>      
        <label class="w3-text-brown"><b>chọn ảnh mới</b></label></br>
 		<input type="file" name="img">
    </p>
   	<p>
        <input type="submit" class="w3-btn w3-button w3-red" value="Cập nhật"></input><a class="w3-btn w3-red" href="?chucnang=xemdanhsachsanpham&page=<?php echo $_GET['page'];?>">Hủy cập nhật</a> 
    <?php
	}
	?>
    </p>
  </form>
</div>