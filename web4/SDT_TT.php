<?php
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new khachhang();
	$sdt_TT 	= isset($_POST['sdt'])  ? $_POST['sdt'] : false;
	$results = $obj->getKhachHang($sdt_TT);
	$sdt_exist = count($results); 
	if($sdt_exist) {
		echo "true";
	}
	else{
		echo "false";
	}
	
?>