<?php session_start();
include "config/config.php";
  include ROOT."/include/autoload.php";
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
	$obj = new khachhang();
	
?>
<?php
if (isset($_POST["ok"]))
	{
		$makh=isset($_POST["makh"])?$_POST["makh"]:false;
		$a=$obj->getKhachHang($makh);
		$tenkh=isset($_POST["tenkh"])?$_POST["tenkh"]:false;
		$mk=isset($_POST["mk"])?$_POST["mk"]:false;
		$sodt=isset($_POST["sodt"])?$_POST["sodt"]:'';
		$diachi=isset($_POST["diachi"])?$_POST["diachi"]:'';
		if($makh !=false && $tenkh!=false && $mk!=false)
		{$obj->insertKhachHang($makh,md5($mk),$tenkh,$diachi,$sodt);
		header("location:dmthanhvien.php");}
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
	var email    = $.trim($('#makh').val());
	var mk   = $.trim($('#mk').val());
	var flag = true;
	var tenkh    = $.trim($('#tenkh').val());
	var sodt    = $.trim($('#sodt').val());
	var diachi    = $.trim($('#diachi').val());
	$.post('SDT_TT.php', {'sdt': $("#makh").val()}, function(data){
		if(data=="true")
		{
			$("#email_error").text("Email trùng. Mời bạn nhập lại");
			flag=false;
			$("#submit").attr({"disabled": ''});
		}
		else
		{
			$("#email_error").text("");
			$("#submit").removeAttr("disabled");
		}
		});
	if( email=='')
		{
			 $('#email_error').text('Email không được trống');
			flag=false;
		}
		else  $('#email_error').text('');

	if(tenkh=='')
	{
		$('#ten_error').text('Tên thành viên không được trống');
		flag=false;
	}
	else  $('#ten_error').text('');
	if(sodt.length<10 || sodt.length>11)
	{
		$('#sodt_error').text('Số ĐT phải từ 10 đến 11 số!');
		
	}
	else  $('#sodt_error').text('');
	if(mk=='')
	{
		$('#mk_error').text('Mật khẩu không được trống');
		flag=false;
	}
	else  $('#mk_error').text('');
	return flag;
	});
	function checkSDT()
	{
		$.post('SDT_TT.php', {'sdt': $("#makh").val()}, function(data){
		if(data=="true")
		{
			$("#email_error").text("Email trùng. Mời bạn nhập lại");
			$("#submit").attr({"disabled": ''});
		}
		else
		{
			$("#email_error").text("");
			$("#submit").removeAttr("disabled");
		}
		});
	}
		});

</script>
<?php include "leftadmin.php"; ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h3>Thêm thành viên</h3>
		</div>
		
		
		
		<div class="clear"></div>
	</div>
</div>



<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
		<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="themthanhvien.php"  >
			<fieldset><div class="widget">
				<div class="title">
						<img src="images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Thành viên</h6>
					</div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="makh" id="makh" onchange ="checkSDT(this.value)" placeholder="Nhập email"  _autocheck="true" type="text" /></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="email_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên thành viên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tenkh" id="tenkh" placeholder="Nhập tên thành viên"  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="ten_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mật khẩu thành viên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="mk" id="mk" placeholder="Nhập mật khẩu"  _autocheck="true" type="text" /></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="mk_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Số ĐT thành viên:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="sodt" id="sodt" placeholder="Nhập số đt thành viên"  _autocheck="true" type="text" /></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id="sodt_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Địa chỉ thành viên:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="diachi" id="diachi" placeholder="Nhập địa chỉ thành viên"  _autocheck="true" type="text" /><label id="tentl_error" class="error"></label></span><br />
		<span name="name_autocheck" class="autocheck"></span>
		<div id"diachikh_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" name="ok" id="submit" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>


</html>
