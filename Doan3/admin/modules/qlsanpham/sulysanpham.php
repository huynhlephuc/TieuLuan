<?php
	include("../../db_driver.php");
	include('../../phpqrcode/qrlib.php');

	$DB = new DB_driver();
	if(isset($_GET['chucnang']))
	{
		//Thêm
		if($_GET['chucnang'] == 'themsanpham'){
			$tensanpham = $_POST['tensanpham'];
			$id_loaisanpham = $_POST['loaisanpham'];
			$giasanpham = str_replace(',','',($_POST['giasanpham']));
			$mota = $_POST['mota'];

			//Sử lý ảnh
			$filetenanh = $_FILES["img"]["name"];
	
			if($filetenanh != ""){
				$time = date("Ymdhis");
				$filetenanh = $time . $filetenanh;
				$anh = "../../../update/" . $filetenanh;
				
				copy($_FILES["img"]["tmp_name"], $anh);
				
				$anh = substr($anh, 9);

				// Thêm sản phẩm vào bảng và lấy ra ID
				$idsp = $DB->insert('sanpham', array(
					'tensanpham' => ''.$tensanpham,
					'id_loaisanpham' => ''.$id_loaisanpham,
					'giasanpham' => ''.$giasanpham,
					'mota' => ''.$mota,
					'anh' => ''.$anh,
				));

				// Tạo image QR với ID dc gọi ra sau khi thêm sản phẩm
				$dd = 'https://doanmoi.000webhostapp.com/Web/Doan3/modules/single.php?idsanpham='.$idsp;

				// Sử lý QR vừa tạo
				$tempDir = "../../qrcode/";
				$codeContents = $dd ;
				$fileName = '005_file_'.md5($codeContents).'.png';
				
				$pngAbsoluteFilePath = $tempDir.$fileName;
				$urlRelativeFilePath = $tempDir.$fileName; 
				
				// generating
				if (!file_exists($pngAbsoluteFilePath)) {
					QRcode::png($codeContents, $pngAbsoluteFilePath);
					echo 'File generated!';
					echo '<hr />';
				} else {
					echo 'File already generated! We can use this cached file to speed up site on common codes!';
					echo '<hr />';
				}
				
				echo 'Server PNG File: '.$pngAbsoluteFilePath;
				echo '<hr />';
				
				// displaying
				echo '<img src="'.$urlRelativeFilePath.'" />';
				echo $urlRelativeFilePath;

				//
				$length = strlen($urlRelativeFilePath);

				$dd_qr = substr($urlRelativeFilePath, 4, $length);


				// Update lại bảng thêm image QR
				$DB->update('sanpham',array(
					'qr' => $dd_qr,
				), "idsanpham=".$idsp);

				header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachsanpham&page=". $_GET['page']);
			}

	
		
		}


		// cap nhat toc moi
		else if($_GET['chucnang'] == 'capnhatsanpham'){
				$tensanpham = $_POST['tensanpham'];
				$id_loaisanpham = $_POST['loaisanpham'];	
				$giasanpham = str_replace(',','',($_POST['giasanpham']));
				$mota = $_POST['mota'];
				//kiem tra co thay doi anh khong
			if($_FILES['img']['name'] == ""){
				$DB->update('sanpham', array(
					'tensanpham' => ''.$tensanpham,
					'id_loaisanpham' => ''.$id_loaisanpham,
					'giasanpham' => ''.$giasanpham,
					'mota' => ''.$mota,
				  ), 'idsanpham = '.$_GET['idsanpham']);
				  header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachsanpham&page=".$_GET['page']);	
			}else{ 
				//su ly anh
				//xóa ảnh củ
				$row = $DB->get_row('select * from sanpham where idsanpham = '.$_GET['idsanpham']);	
				unlink('../../../'.$row['anh']);	
				//thêm cập nhật ảnh mới
				$filetenanh = $_FILES["img"]["name"];
				$time = date("Ymdhis");
				$filetenanh = $time . $filetenanh;
				$anh = "../../../update/" . $filetenanh;
				copy($_FILES["img"]["tmp_name"], $anh);
				$anh = substr($anh, 9);
				//cap nhat
				$DB->update('sanpham', array(
					'tensanpham' => ''.$tensanpham,
					'id_loaisanpham' => ''.$id_loaisanpham,
					'giasanpham' => ''.$giasanpham,
					'mota' => ''.$mota,
					'anh' => ''.$anh
				  ), 'idsanpham = '.$_GET['idsanpham']);
				header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachsanpham&page=".$_GET['page']);
			  }
		}
		else if($_GET['chucnang'] == 'xoasanpham'){
			//xóa ảnh củ
			$row = $DB->get_row('select * from sanpham where idsanpham = '.$_GET['idsanpham']);	
			unlink('../../../'.$row['anh']);	
			$DB->remove('sanpham', 'idsanpham = '.$_GET['idsanpham']);
			header("Location: ../../index.php?thongbao=thaotacthanhcong&chucnang=xemdanhsachsanpham&page=".$_GET['page']);
		}
	}
?>