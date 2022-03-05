<?php
	include("../../db_driver.php");
	$DB = new DB_driver();
	if(isset($_GET['chucnang']))
	{
		//them toc moi
		if($_GET['chucnang'] == 'themloaisanpham'){
			$tenloaisanpham = $_POST['tenloaisanpham'];
			$thutu = $_POST['thutu'];
			$DB->insert('loaisanpham', array(
				'tenloaisanpham' => ''.$tenloaisanpham,
				'thutu' => ''.$thutu
			));
			header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachloaisanpham&page=1");
		}
		//cap nhat toc moi
		else if($_GET['chucnang'] == 'capnhatloaisanpham'){
				$tenloaisanpham = $_POST['tenloaisanpham'];
				$thutu = $_POST['thutu'];
				$DB->update('loaisanpham', array(
				'tenloaisanpham' => ''.$tenloaisanpham,
				'thutu' => ''.$thutu
			  ), 'id_loaisanpham = '.$_GET['id_loaisanpham']);
			  header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachloaisanpham&page=".$_GET['page']);	
		}
		else if($_GET['chucnang'] == 'xoaloaisanpham'){
			$DB->remove('loaisanpham', 'id_loaisanpham = '.$_GET['id_loaisanpham']);
			header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachloaisanpham&page=".$_GET['page']);
		}
	}
?>