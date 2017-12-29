<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new hoadon();
	if(isset($_POST['sua'])){
		$mahdon=isset($_POST["mahd"])?$_POST["mahd"]:0;
$ngaylap=isset($_POST["ngaylap"])?$_POST["ngaylap"]:false;
		$ten=isset($_POST["ten"])?$_POST["ten"]:false;
		$diachi=isset($_POST["dc"])?$_POST["dc"]:false;
		$sdt=isset($_POST["sdt"])?$_POST["sdt"]:false;
		$ngaynhan=isset($_POST["ngaynhan"])?$_POST["ngaynhan"]:false;
		$ngaydat=isset($_POST["ngaydat"])?$_POST["ngaydat"]:false;
		$email=isset($_POST["listemail"])?$_POST["listemail"]:false;
		//echo $mahdon;
$a=$obj->updateHD($mahdon,$ngaylap,$ten,$diachi,$sdt,$ngaydat,$ngaynhan,$email);
//print_r($a);
header("location: dmhoadon.php");	
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
  
 

    $mahd= isset($_GET["mahd"])?$_GET["mahd"]:0;
	$data=$obj->getHoaDon($mahd);
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
		<form action="suahoadon.php" method="post" id="Test" name="Test">
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Cập nhật hóa đơn</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mã HD:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="mahd" value="<?php echo $mahd;?>" _autocheck="true" type="hidden" /><?php echo $mahd;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày lập hd:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input id="tentv" name="ngaylap" value="<?php echo $row["ngaylaphoadon"];?>" _autocheck="true" type="text" /><label id="tentv_error" class="error"></label><br /></span><br />
		<span name="name_autocheck" class="autocheck"></span>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên người nhận:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="ten" id="mk" value="<?php echo $row["tennguoinhan"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="mk_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Địa chỉ:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="dc" value="<?php echo $row["diachinguoinhan"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="dc_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Số ĐT:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="sdt" value="<?php echo $row["sdtnguoinhan"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="sdt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày đặt hàng:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="ngaydat" value="<?php echo $row["ngaydathang"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="sdt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày nhận hàng:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="ngaynhan" value="<?php echo $row["ngaynhanhang"];?>" _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="sdt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Email:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><?php
			$a= new khachhang();
			$b=$a->getAll_KH(); ?>
	<select name="listemail">
		<?php
			foreach ($b as $value) { ?>
				<option value="<?php echo $value['email']; ?>"> <?php echo $value['email']; ?></option>
			<?php } ?>
		?>
	</select><label id="tentl_error" class="error"></label></span><br /></span>
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