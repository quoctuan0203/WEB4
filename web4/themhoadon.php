<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new hoadon();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$ngaylap=isset($_POST["ngaylap"])?$_POST["ngaylap"]:false;
		$ten=isset($_POST["ten"])?$_POST["ten"]:false;
		$diachi=isset($_POST["dc"])?$_POST["dc"]:false;
		$sdt=isset($_POST["sodt"])?$_POST["sodt"]:false;
		$ngaynhan=isset($_POST["ngaynhan"])?$_POST["ngaynhan"]:false;
		$ngaydat=isset($_POST["ngaydat"])?$_POST["ngaydat"]:false;
		$email=isset($_POST["listemail"])?$_POST["listemail"]:false;
		if($ngaylap!=false && $ten!=false && $diachi!=false && $sdt!=false && $ngaynhan!=false && $ngaydat!=false  ){
		$obj->insertHoaDon($ngaylap,$ten,$diachi,$sdt,$ngaynhan,$ngaydat,$email);
		header("location:dmhoadon.php");
		}
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
	var tensach    = $.trim($('#tensach').val());
	var giagoc    = eval($.trim($('#giagoc').val()));
	var giagiam    = eval($.trim($('#giagiam').val()));
	var urlhinh    = $.trim($('#hinh').val());
	var mota    = $.trim($('#mota').val());
	var extension = $('#hinh').val().split('.').pop().toLowerCase();
	
	if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','']) == -1)
 			  {
   				 $('#hinh_error').text('Không phải file hình!');
   				 flag=false;
  			 }
  	else  $('#hinh_error').text('');
	if( tensach=='')
		{
			 $('#tensach_error').text('Tên sách không được trống');
			flag=false;
		}
		else  $('#tensach_error').text('');
	if(mota=='')
	{
		$('#mota_error').text('Mô tả không được trống');
		flag=false;
	}
	else  $('#mota_error').text('');
	if(giagoc=='')
	{
		$('#giagoc_error').text('Giá gốc không được trống');
		flag=false;
	}
	else  $('#giagoc_error').text('');
	if(giagiam=='')
	{
		$('#giagiam_error').text('Giá giảm không được trống');
		flag=false;
	}
	else  $('#giagiam_error').text('');
	if(giagiam>=giagoc)
	{
		$('#giagiam_error').text('Giá giảm phải nhỏ hơn giá gốc');
		flag=false;
	}
	else  $('#giagiam_error').text('');
	if(urlhinh=='')
	{
		$('#hinh_error').text('Chưa chọn hình!');
		flag=false;
	}
	else  $('#hinh_error').text('');
	return flag;
	//$('#Test').load('capnhatsach.php');
	});
	
	});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm hóa đơn</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	
	
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themhoadon.php"  >
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới hóa đơn</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày lập HĐ:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="ngaylap" id="ngaylap" onchange ="checkSDT(this.value)" placeholder="Nhập ngày lập hđ"  _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="email_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên người nhận:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="ten" id="ten" placeholder="Nhập tên "  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="ten_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Địa chỉ người nhận:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="dc" id="dc" placeholder="Nhập địa chỉ"  _autocheck="true" type="text" /></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="mk_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Số ĐT người nhận:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="sodt" id="sodt" placeholder="Nhập số đt "  _autocheck="true" type="text" /></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="sodt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày nhận hàng:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="ngaynhan" id="ngaynhan" placeholder="Nhập ngày nhận"  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="diachikh_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Ngày đặt hàng:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="ngaydat" id="ngaydat" placeholder="Nhập ngày đặt"  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="diachikh_error" class="clear error"></div>
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
	</select><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="diachikh_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" name="ok" id="submit" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>

	        	
	        </div>
	     </div>
	<div class="clear"></div>
</body>
</html>
