<?php
	include("../../db_driver.php");
	$DB = new DB_driver();
	if(isset($_GET['chucnang']))
	{
		//cap nhat hoa don
		if($_GET['chucnang'] == 'capnhattrangthai'){
				$idgiohang = $_GET['idgiohang'];
				$trangthai = $_POST['trangthai'];
				$DB->update('giohang', array(
					'trangthai' => ''.$trangthai
				  ), 'idgiohang = '.$idgiohang);
				  header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachdondathang&page=".$_GET['page']);
			}
			//xoa hoa don
			else if($_GET['chucnang'] == 'xoadondathang'){
				$idgiohang = $_GET['idgiohang'];
				$DB->remove('giohang','idgiohang = '.$idgiohang);
				header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachdondathang&page=".$_GET['page']);	
			}
		}
?>