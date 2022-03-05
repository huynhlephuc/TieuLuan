<!-- Header -->
<link href="modules/qlhoadon/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="modules/qlhoadon/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Thông tin đơn hàng.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  <?php
  if(isset( $_GET['idgiohang'])){
  	$idgiohang = $_GET['idgiohang'];
  	$row1 = $DB->get_row("SELECT * from giohang where idgiohang = '".$idgiohang."'");
	$row2 = $DB->get_row("SELECT * from taikhoankhachhang where idtaikhoan = '".$row1['idtaikhoan']."'");
  ?>
  <table class="w3-table w3-striped w3-bordered w3-border w3-xlarge">
    <tr>
    	<th colspan="2">Thông tin người mua</th>
    </tr>
    <tr>
      <td>Tên khách hàng</td>
      <td><?php echo $row2['tenkhachhang']?></td>
    </tr>
    <tr>
      <td>Tên công ty</td>
      <td><?php echo $row2['tencongty']?></td>
     </tr>
     <tr>
      <td>Email</td>
      <td><?php echo $row2['email']?></td>
    </tr>
    <tr>
      <td>Địa chỉ</td>
      <td><?php echo $row2['diachi']?></td>
    </tr>
    <tr>
      <td>Quốc gia</td>
      <td><?php echo $row2['quocgia']?></td>
    </tr>
    <tr>
      <td>Thành phố</td>
      <td><?php echo $row2['thanhpho']?></td>
   	</tr>
  </table>
  </br>
  <table class="w3-table w3-striped w3-bordered w3-border w3-xlarge">
    <tr>
    	<th colspan="2">Thông tin đơn hàng</th>
    </tr>
    <tr>
      <td>Ngày lập</td>
      <td><?php echo $row1['ngaylap']?></td>
    </tr>
  </table>
 </br>
  <table class="w3-table w3-striped w3-bordered w3-border w3-xlarge">
    <tr>
    	<th colspan="3">Thông tin các sản phẩm của đơn hàng</th>
    </tr>
    <tr>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Giá</th>
    </tr>
    <!--Thông tin chi tiết hóa đơn-->
    <?php
    	$row3 = $DB->get_list("SELECT * from  chitietgiohang where idgiohang = '".$idgiohang."'");
		$tongtien = 0;
	foreach($row3 as $item){
		$row4 = $DB->get_row("SELECT * from  sanpham where idsanpham = '".$item['idsanpham']."'");
	?>
    <tr>
      <td><?php echo $row4['tensanpham']?></td>
      <td><?php echo $item['soluong']?></td>
      <td><?php echo number_format($item['gia'],0).' VNĐ'?></td>
      <?php
      $tongtien += $item['soluong'] * $item['gia'];
	  ?>
    </tr>
    <?php
	}
	?>
    <tr>
    <th colspan="2">Tổng tiền</th>
    <th colspan="1"><?php echo number_format($tongtien,0).' VNĐ'?></th>
    </tr>
  </table>
  </br>
  <form class="w3-container w3-card-4" action="modules/qlhoadon/sulydondathang.php?chucnang=capnhattrangthai&idgiohang=<?php echo $idgiohang?>&page=<?php if(isset($_GET['page'])) echo $_GET['page']; else echo '1';?>" method="post">
    <h1>Cập nhật trạng thái của đơn hàng</h1>
    <select class="w3-select w3-border" name="trangthai">
      <option value="Chưa xác nhận" <?php if($row1['trangthai'] == "Chưa xác nhận") echo 'selected = "selected"'?>>Chưa xác nhận</option>
      <option value="Đã xác nhận" <?php if($row1['trangthai'] == "Đã xác nhận") echo 'selected = "selected"'?>>Đã xác nhận</option>
      <option value="Đã nhận hàng" <?php if($row1['trangthai'] == "Đã nhận hàng") echo 'selected = "selected"'?>>Đã nhận hàng</option>
      <option value="Đã hủy" <?php if($row1['trangthai'] == "Đã hủy") echo 'selected = "selected"'?>>Đã hủy</option>
    </select>
    <p><button class="w3-btn w3-teal">Lưu</button></p>
  </form>
</div>
<?php
  }
?>