<?php session_start();
	if(isset($_GET['ac'])=='logout'){
		unset($_SESSION['admin']);
		 header("location:index.php");
	}
?>
<?php 
	include "config/config.php";
  include ROOT."/include/autoload.php";
  $obj=new tacgia();
include "leftadmin.php";
$data=$obj->getAll_TG();
$kq=isset($_GET["loc"]) ? $_GET["loc"] :false;
$tim=$obj->timtg($kq);
$page=1;//khởi tạo trang ban đầu
  $limit=5;//số bản ghi trên 1 trang (2 bản ghi trên 1 trang)
  $total_record=count($data);
  $total_page=ceil($total_record/$limit);//tính tổng số trang sẽ chia
  if(isset($_GET["page"]))
      $page=$_GET["page"];//nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
    if($page<1) $page=1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
    if($page>$total_page) $page=$total_page;//nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
 
    //tính start (vị trí bản ghi sẽ bắt đầu lấy):

    $start=($page-1)*$limit;
    $arrs =$obj->getAll_TGPT($start,$limit);
   	$search=$obj->search($kq,$start,$limit);//var_dump($search);echo count($search);
  ?>


<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Tác giả</h5>
			<span>Quản lý tác giả</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="themtacgia.php">
					<img src="images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

 
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách tác giả		</h6>
		 	<div class="num f12">Số lượng: <b><?php echo count($data);?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="dmtacgia.php" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="loc" value="" id="filter_iname" type="text" style="width:155px;" /></td>	
							<td style='width:550px'>
							<input type="submit" class="button blueB" name="submit" value="Lọc" />
							</td>
							
							
					    
						</tr>
					</tbody></table>
				</form>
			</tr></thead>
			
			<thead>
				
				<tr>
					
					<td style="width:60px;">Mã tác giả</td>
					<td>Tên tác giả</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
							
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
			<?php if(isset($_GET['submit'])){?>
			<tbody class="list_item">
				<?php foreach ($search as $value) {
		$m=$value['matacgia']; ?>
		
			      			       <tr class='row_9' align="center">
					
					
					<td class="textC"><?php echo $value["matacgia"];?></td>
					
					<td>
					
					
					
					<b><?php echo $value["tentacgia"];?></b>
					</a>
					</td>
					
					
					
					<td class="option textC">
											   						
						 <a href="suatacgia.php?matacgia=<?php echo $m;?>" title="Chỉnh sửa" class="tipS">
							<img src="images/icons/color/edit.png" />
						</a>
						
						<a href="xoatacgia.php?matg=<?php echo $m;?>" title="Xóa" class="tipS verify_action" >
						    <img src="images/icons/color/delete.png" />
						</a>
					</td>
				</tr>	

		        			</tbody>
			<?php } ?>

		</table> <div class="pager" style="margin-left:300px;">
          <div class="pages">
            <ul class="pagination" >
              <?php
              $total_record=count($tim);
  $total_page=ceil($total_record/$limit);
               for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo "class='active'"; ?> ><a href="dmtacgia.php?page=<?php echo $i; ?>&loc=<?php echo $kq; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            </ul>
          </div>
        </div><?php }else{?><tbody class="list_item">
				<?php foreach ($arrs as $value) {
		$m=$value['matacgia']; ?>
		
			      			       <tr class='row_9' align="center">
					
					
					<td class="textC"><?php echo $value["matacgia"];?></td>
					
					<td>
					
					
					
					<b><?php echo $value["tentacgia"];?></b>
					</a>
					</td>
					
					
					
					<td class="option textC">
											   						
						 <a href="suatacgia.php?matacgia=<?php echo $m;?>" title="Chỉnh sửa" class="tipS">
							<img src="images/icons/color/edit.png" />
						</a>
						
						<a href="xoatacgia.php?matg=<?php echo $m;?>" title="Xóa" class="tipS verify_action" >
						    <img src="images/icons/color/delete.png" />
						</a>
					</td>
				</tr>	

		        			</tbody>
			<?php } ?>

		</table> <div class="pager" style="margin-left:300px;">
          <div class="pages">
            <ul class="pagination" >
              <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li <?php if($page == $i) echo "class='active'"; ?> ><a href="dmtacgia.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            </ul>
          </div>
        </div><?php } ?>

	
</div>		<div class="clear mt30"></div>
		
	    <!-- Footer -->
	    <div id="footer">
	    		        <div class="wrapper">
	        	
	        </div>
	     </div>
	</div>
	<div class="clear"></div>
</body>
</html>