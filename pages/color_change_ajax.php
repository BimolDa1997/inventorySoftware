<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$id= intval($_GET['lineId']);
$color= $_GET['color'];
$item_id = find_a_field('pos_sale_detail','item_id','id="'.$id.'"');
$rate = find_a_field('pos_sale_detail','rate','id="'.$id.'"');
$qty = find_a_field('pos_sale_detail','qty','id="'.$id.'"');
$stock = find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'" and color="'.$color.'"');
if($stock>=$qty){
$amt = $rate*$qty;
$update = $conn->query('update pos_sale_detail set color="'.$color.'",pure_amt="'.$amt.'",grand_total="'.$amt.'" where id="'.$id.'"');

echo $stock;
}else{
	echo 'Empty!';
	}
?>

