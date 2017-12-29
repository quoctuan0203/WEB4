
<?php 
  include "config/config.php";
  include ROOT."/include/autoload.php";
 
$obj = new hoadon();
    $data= $obj -> getAll_HD();
    $manxb= $_GET["mahd"];
	$obj->delHoaDon($manxb);
?>