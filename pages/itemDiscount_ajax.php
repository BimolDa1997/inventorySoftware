<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$id= intval($_GET['lineId']);
$discount= $_GET['discount'];

$pure_amt = find_a_field('pos_sale_detail','pure_amt','id="'.$id.'"');
$grand_total = $pure_amt-$discount;
$update = $conn->query('update pos_sale_detail set discount="'.$discount.'",grand_total="'.$grand_total.'" where id="'.$id.'"');
?>

