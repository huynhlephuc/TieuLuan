<?php
	@session_start();
	require('../db_driver.php');
	$DB = new DB_driver();
	if(isset($_GET['chucnang'])){
		if($_GET['chucnang']=="themcheckout"){
			if(isset($_GET['TaiKhoankhachhang'])){
				if($_GET['TaiKhoankhachhang'] != "Đăng nhập" && isset($_SESSION['giohang'])){
					//thêm hóa đơn mới
					//lấy id tài khoản
					echo 'select * from taikhoankhachhang where email = '.$_GET['TaiKhoankhachhang'];
					$row1 = $DB->get_row("select * from taikhoankhachhang where email = '".$_GET['TaiKhoankhachhang']."'");
					$idtaikhoan = $row1['idtaikhoan'];
					$DB->insert('giohang', array(
						'idtaikhoan' => ''.$idtaikhoan
					));
					foreach($_SESSION['giohang'] as $iteam){
						  $row2 = $DB->get_row('select max(idgiohang) as idgiohang from  giohang');
						  $row3 = $DB->get_row('select * from sanpham where idsanpham = '.$iteam["id"]);
						  $idgiohang = $row2['idgiohang'];
						  $idsanpham = $iteam["id"];
						  $gia = $row3['giasanpham'];
						  $soluong = $iteam["soluong"];
						  $DB->insert('chitietgiohang', array(
							  	'idgiohang' => ''.$idgiohang,
							  	'idsanpham' => ''.$idsanpham,
							 	'gia' => ''.$gia,
								'soluong' => ''.$soluong
							));		
					}
					unset($_SESSION['giohang']);
					header("Location: ../index.php?thongbao=muahangthanhcong");
				}else{
					header("Location: checkout.php?thongbao=thaotackhongthanhcong");
				}
			}
		}
	}
?>