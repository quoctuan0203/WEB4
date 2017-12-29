<?php 
  $ma1 =isset($_GET['manxb']) ? $_GET['manxb'] : "";
  $ma =isset($_GET['matheloai']) ? $_GET['matheloai'] : "";
  $tl_obj = new theloai();
  $nxb_obj = new nhaxuatban();
  $tl_data= $tl_obj -> gettentl($ma);
  $nxb_data= $nxb_obj -> gettennxb($ma1);
?>
<div class="category-title">
      <?php foreach($tl_data as $arr){ ?>
      <h1><?php echo $arr['tentheloai']; } ?></h1>
      <?php foreach($nxb_data as $arr){ ?>
      <h1><?php echo $arr['tennxb']; } ?></h1>
    </div>
    
    <div class="category-products">
      <div class="toolbar">
        
           </div>
      
      <ul class="products-grid" >
        <?php include "list-sach.php"; ?>
      </ul>
    </div>