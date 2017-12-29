<?php session_start();
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
?>
<?php 
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new sach();
  if (isset($_POST["ok"]))
	{
		$masach=isset($_POST["masach"])?$_POST["masach"]:false;
		$tensach=isset($_POST["tensach"])?$_POST["tensach"]:false;
		$mota=isset($_POST["mota"])?$_POST["mota"]:false;
		$giagoc=isset($_POST["giagoc"])?$_POST["giagoc"]:false;
		$giagiam=isset($_POST["giagiam"])?$_POST["giagiam"]:false;
		$urlhinh=$_FILES['hinh']['name'];
		$temp = $_FILES["hinh"]["tmp_name"];
		move_uploaded_file($temp, "products-images/".$urlhinh);
		$manxb=isset($_POST["listnxb"])?$_POST["listnxb"]:false;
		$matheloai=isset($_POST["listtheloai"])?$_POST["listtheloai"]:false;
		if( $urlhinh!=false ){
		$obj->updateSach($masach,$tensach,$mota,$giagoc,$giagiam,$urlhinh,$manxb,$matheloai);
		header("location:dmsach.php");
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
<?php 
  
 
$obj = new sach();
   
    $masach= isset($_GET["masach"])?$_GET["masach"]:0;
	$data=$obj->getSach($masach);
	foreach ($data as $row) { ?>

<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Sách</h5>
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
	<div class="widget">
			<form method="post" id="Test" name="Test" enctype="multipart/form-data" action="suasach.php"  > 
			<div class="formRow">
	<label class="formLeft" for="param_name">Mã sách:<span class="req"></span></label>
	<div class="formRight">
		<span class="oneTwo"><input  name="masach" value="<?php echo $masach;?>" _autocheck="true" type="hidden" /><?php echo $masach;?></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error"></div>
	</div><div class="clear"></div></div>	
	<div class="formRow">
	<label class="formLeft" for="param_name">Tên sách:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input name="tensach" id="tensach" value="<?php echo $row["tensach"];?>"  placeholder="Nhập tên sách"  _autocheck="true" type="text" size="50" /><label id="tensach_error" class="error"></label></span>
		<span name="name_autocheck" class="autocheck"></span>
		<div id="email_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
	<label class="formLeft" for="param_name">Mô tả:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><textarea name="mota" id="mota" value=""  size="50" placeholder="Nhập mô tả" rows="5" cols="62" maxlength="200"><?php echo $row["mota"];?></textarea> <label id="mota_error" class="error"></label></span>
		<div id="email_error" class="clear error"></div>
	</div><div class="clear"></div></div>
	<div class="formRow">
				<label class="formLeft" for="param_name">Giá gốc:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="giagoc" id="giagoc" _autocheck="true" type="text" value="<?php echo $row["giagoc"];?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" id="giagoc_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Giá giảm:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo"><input name="giagiam" id="giagiam" _autocheck="true" type="text" value="<?php echo $row["giagiam"];?>" /></span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" id="giagiam_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã nhà xuất bản:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
						<?php
							$c= new nhaxuatban();
							$d=$c->getAll_NXB(); ?>
					<select name="listnxb">
						<?php
							foreach ($d as $v) { ?>
								<option  value="<?php echo $row['manxb']; ?>" <?php if($row['manxb']==$v['manxb']) echo "selected"; ?>> <?php echo $v['manxb'].'-'.$v['tennxb']; ?></option>
							<?php } ?>
						?>
					</select>
					</span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="formRow">
				<label class="formLeft" for="param_name">Mã thể loại:<span class="req">*</span></label>
				<div class="formRight">
					<span class="oneTwo">
						<?php $a= new theloai();
			$b=$a->getAll_TL();?>
						<select name="listtheloai">
							<?php
								foreach ($b as $value) { ?>
									<option value="<?php echo $row['matheloai']; ?>" <?php if($row['matheloai']==$value['matheloai']) echo "selected"; ?>> <?php echo $value['matheloai']; ?></option>
								<?php } ?>
							?>
						</select>
					</span>
					<span name="name_autocheck" class="autocheck"></span>
					<div name="name_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>

	
	<div class="formRow">
				<label class="formLeft">Hình ảnh:<span class="req"></span></label>
				<div class="formRight">
					<div class="left"><input type="file"  id="hinh" name="hinh"  /></div><br>
					<?php echo "<br><img src='products-images/".$row['urlhinh']."' width='200' /><br>"; ?>
					<div name="image_error" class="clear error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="formSubmit">
       			<input type="submit" name="ok" value="Cập nhật" class="redB" />
       		</div>
    		<div class="clear"></div>
</form>
		<?php } ?>
		
			
			
	        	
	        </div>
	     </div>
	</div>
	<div class="clear"></div>
</body>
</html>