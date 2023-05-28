<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$id= intval($_GET['lineId']);
$color = $_GET['color'];
$base_qty = 1;
$item_id = find_a_field('pos_sale_detail','item_id','id="'.$id.'"');
$last_rate = find_a_field('pos_sale_detail','rate','id="'.$id.'"');
$last_qty = find_a_field('pos_sale_detail','qty','id="'.$id.'"');
$discount = find_a_field('pos_sale_detail','discount','id="'.$id.'"');
$vat_amount = find_a_field('pos_sale_detail','tax_amount','id="'.$id.'"');

$un_del_stock = find_a_field('pos_sale_detail','sum(qty)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'" and status in ("MANUAL","HOLD","PENDING") and color="'.$color.'"');
$overall_in = find_a_field('journal_item','sum(item_in)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'" and color="'.$color.'"');
$overall_out_j = find_a_field('journal_item','sum(item_ex)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'" and color="'.$color.'"');
$overall_out = $overall_out_j+$un_del_stock;
$overall_stock = $overall_in-$overall_out;

if($overall_stock>0){
$last_qty_increment = $last_qty+1;
$last_pure_amt = ($last_qty_increment*$last_rate);
$grand_total = ($last_pure_amt+$vat_amount)-$discount;
$update = $conn->query('update pos_sale_detail set qty="'.$last_qty_increment.'",pure_amt="'.$last_pure_amt.'",grand_total="'.$grand_total.'" where id="'.$id.'"');
$msg = 0;
}else{
	$last_qty_increment = $last_qty;
	$msg = 1;
	}
$un_del_stock = find_a_field('pos_sale_detail','sum(qty)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'" and status in ("MANUAL","HOLD","PENDING") and color="'.$color.'"');
$overall_out = $overall_out_j+$un_del_stock;
$overall_stock = $overall_in-$overall_out;



echo $last_qty_increment.'#'.$msg.'#'.$overall_stock;
?>

