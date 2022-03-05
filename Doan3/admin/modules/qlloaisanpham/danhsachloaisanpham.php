  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
  	<?php
    	if(isset($_GET['thongbao'])){
			if($_GET['thongbao'] == 'thaotacthanhcong'){
	?>
    <div id = "Thongbao1" class="w3-green" onClick="An('Thongbao1')">
        <p><b>Thành công! </b>Bạn cập nhật thành công</p>
    </div>	
    <?php
    		}else{
	?>
    <div id = "Thongbao2" class="w3-red an" style="margin:0px;" onClick = "An('Thongbao2');">
        <p><b>Chưa thành công! </b>Bạn chưa cập nhật thành công</p>
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
    <h1 class="w3-jumbo"><b>Hải Sản Việt - Trang quản lý</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Danh sách loại sản phẩm.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
  
  <!-- Photo grid (modal) -->
  <div class="w3-row-padding">
     <table class="w3-table w3-centered">
        <tr>
          <th>Tên loại sản phẩm</th>
          <th>thứ tự</th>
        </tr>
        <?php
			$result = $DB->get_row("SELECT count(id_loaisanpham) as counter from loaisanpham");
			$total_records = $result['counter'];
		 
			// Lấy trang hiện tại
			$current_page = input_get('page');
		 
			// Lấy limit
			$limit = 12;
		 
			// Lấy link
			$link = "?chucnang=xemdanhsachloaisanpham&page={page}";
	  
			// Thực hiện phân trang
			$paging = paging($link, $total_records, $current_page, $limit);
		 
			// Lấy danh sách User
			
			$member = $DB->get_list("SELECT * from loaisanpham LIMIT {$paging['start']}, {$paging['limit']}");
			foreach($member as $row){
		?>
        <tr>
          <td><?php echo $row['tenloaisanpham']?></td>
          <td><?php echo $row['thutu']?></td>
          <td><a href="?chucnang=capnhatloaisanpham&id_loaisanpham=<?php echo $row['id_loaisanpham'];?>&page=<?php if(isset($_GET['page'])) echo $_GET['page']; else echo '1';?>"><img src="../images/Save.png" style="width:32px; height:34px;"></a></td>
          <td><a href="modules/qlloaisanpham/sulyloaisanpham.php?chucnang=xoaloaisanpham&id_loaisanpham=<?php echo $row['id_loaisanpham']?>&page=<?php if(isset($_GET['page'])) echo $_GET['page']; else echo '1';?>"><img src="../images/delete-128.png" style="width:32px; height:34px;"></a></td>
        </tr>
        <?php
			}
		?>
      </table>
      <?php
			echo '<div class = "w3-bar">';
			echo $paging['html'];
			echo "</div>";
		?>
  </div>
