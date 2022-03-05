<?php
	session_start();
	include("../../db_driver.php");
	$DB = new DB_driver();
	if(isset($_GET['chucnang'])){
		if($_GET['chucnang']=='capnhatmatkhau'){
			//so sanh mat khau cu
			$taikhoan = $_SESSION["TaiKhoan"];
			$matkhau = $_POST['matkhaucu'];
			$matkhaumoi = $_POST['matkhaumoi'];
			$table = $DB->get_list("select * from taikhoan where tentaikhoan = '$taikhoan' and matkhau = '$matkhau'");
			if(count($table) > 0){
				$DB->update('taikhoan', array(
					'matkhau' => ''.$matkhaumoi
				  ), 'idtaikhoan = '.$table[0]['idtaikhoan']);
				  header("Location: ../../index.php?thongbao=thaotacthanhcong");
			}else{
				header("Location: ../../index.php?chucnang=doimatkhau&thongbao=matkhaukhongdung");
			}
		}
	}
?>