<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$item= $_GET['ref'];
if($item!='' || $item>0){
	$con = ' and item_code="'.$item.'"';
	}
//mysqli_close($con);

 
?>
<div class="row">
 <?php
         $item_sql = $conn->query('select * from item_info where 1 '.$con.'');
		 while($item = $item_sql->fetch_assoc()){
			 $img = find_a_field('item_photo','item_photo','item_id="'.$item['item_id'].'"');
			 $overall_stock = find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$item['item_id'].'" and warehouse="'.$_SESSION['warehouse'].'"');
		?>
<div class="col-md-3">
	<figure class="card card-product">
		<span class="badge-new"> NEW </span>
		<div class="img-wrap"> 
			<img src="../files/item/<?=$img?>">
			<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
		</div>
		<figcaption class="info-wrap">
			<a href="#" class="title"><?=$item['item_name']?>-<?=$item['item_code']?></a>
			<div class="action-wrap">
				<?
           if($overall_stock>0){
		  ?>
            <button type="button" name="ctBtn" id="ctBtn" class="btn btn-primary btn-sm float-right" onClick="addItem(<?=$item['item_id']?>)" style="border:0px;"><i class="fa fa-cart-plus"></i></button>
            <? } else{?>
             <button type="button" name="ctBtn" id="ctBtn" class="btn btn-primary btn-sm float-right" style="border:0px;">Stock Out</button>
            <? } ?>
				<div class="price-wrap h5">
					<span class="price-new"><?=$item['price']?></span>
				</div> 
			</div> 
		</figcaption>
	</figure> 
</div> 
 
 <?php } ?>
</div>	
		