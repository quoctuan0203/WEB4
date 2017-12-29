<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new khachhang();
	if(isset($_POST['sua'])){
$matv = isset($_POST["matv"])?$_POST["matv"]:0;
$sdt = isset($_POST["sdt"])?$_POST["sdt"]:0;
$tentv = isset($_POST["tentv"])?$_POST["tentv"]:0;
$mk=isset($_POST["mk"])?$_POST["mk"]:0;
$diachi=isset($_POST["dc"])?$_POST["dc"]:0;
$a=$obj->updateKH($matv,$mk,$tentv,$diachi,$sdt);
//print_r($a);
header("location: dmthanhvien.php");	
}
?>
<script src="jquery-3.2.1.min.js"></script>
<style type="text/css">
	.label{
	color: #0431B4;
	font-weight:bold;
	font-size:19px;	}
	.error{
	color:#F00;
}

</style>
<script type="text/javascript" language="javascript">
$(document).ready(function()
	{
	$('#Test').submit(function(){
	var flag = true;
	var tentv   = $.trim($('#tentv').val());
	var mk   = $.trim($('#mk').val());
	if(tentv=='')
	{
		$('#tentv_error').text('Tên thành viên không được trống');
		flag=false;
	}
	else  $('#tentv_error').text('');
	if(mk=='')
	{
		$('#mk_error').text('Mật khẩu không được trống');
		flag=false;
	}
	else  $('#mk_error').text('');
	return flag;
	});
		});

</script>
<?php include "leftadmin.php"; ?>
<?php 
  
 

    $matv= isset($_GET["matv"])?$_GET["matv"]:0;echo $matv;
	$data=$obj->getKhachHang($matv);
	foreach ($data as $row) { ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Thông tin thành viên</h5>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="admin/product/add.html">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form action="suathanhvien.php" method="post" id="Test" name="Test">
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật thành viên</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="matv" value="<?php echo $matv;?>" _autocheck="true" type="hidden" /><?php echo $matv;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên thành viên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input id="tentv" name="tentv" value="<?php echo $row["tenkhachhang"];?>" _autocheck="true" type="text" /><label id="tentv_error" class="error"></label><br /></span><br />
		<span name="name_autocheck" class="autocheck"></span>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="mk" id="mk" value="<?php echo $row["matkhau"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="mk_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Địa chỉ:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="dc" value="<?php echo $row["diachi"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="dc_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Số ĐT:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="sdt" value="<?php echo $row["sodt"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="sdt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	
	<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" name="sua" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
<?php }

?>
	        	
	        </div>
	     </div>
	<div class="clear"></div>
</body>
</html>