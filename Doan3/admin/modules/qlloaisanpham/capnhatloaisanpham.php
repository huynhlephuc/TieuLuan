<!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Cập nhật thông tin loại sản phẩm.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  <?php
  	if(isset($_GET['id_loaisanpham'])){
		$row = $DB->get_row('select * from loaisanpham where id_loaisanpham = '.$_GET['id_loaisanpham']);
  ?>
  <div class="w3-card-4">
  <div class="w3-container w3-brown">
    <h2>Loại sản phẩm mã số: <?php echo $row['id_loaisanpham']?></h2>
  </div>
  <form class="w3-container" action="modules/qlloaisanpham/sulyloaisanpham.php?chucnang=capnhatloaisanpham&id_loaisanpham=<?php echo $row['id_loaisanpham']?>&page=<?php echo $_GET['page'];?>" method="post" enctype="multipart/form-data">
    <p>      
        <label class="w3-text-brown"><b>Tên loại sản phẩm:</b></label>
        <input class="w3-input w3-border w3-sand" name="tenloaisanpham" type="text" value="<?php echo $row['tenloaisanpham']; ?>">
    </p>
     <p>      
        <label class="w3-text-brown"><b>Thứ tự:</b></label>
        <input class="w3-input w3-border w3-sand" name="thutu" type="text" value="<?php echo $row['thutu']; ?>">
    </p>
   	<p>
        <input type="submit" class="w3-btn w3-button w3-red" value="Cập nhật"></input><a class="w3-btn w3-red" href="?chucnang=xemdanhsachloaisanpham&page=<?php echo $_GET['page'];?>">Hủy cập nhật</a> 
    <?php
	}
	?>
    </p>
  </form>
</div>