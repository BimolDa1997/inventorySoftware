<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$vat_percent= $_GET['vat_percent'];

$pure_amt = find_a_field('pos_sale_detail','sum(pure_amt)','sale_no="'.$_SESSION['pos_sale_no'].'"');
$vat_amt = ($pure_amt*$vat_percent)/100;
$check = find_a_field('pos_discount_vat','sale_no','sale_no="'.$_SESSION['pos_sale_no'].'"');
if($check>0){
	$update = $conn->query('update pos_discount_vat set vat_percent="'.$vat_percent.'",vat_amt="'.$vat_amt.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
	}else{
    $nsert = $conn->query('insert into pos_discount_vat set sale_no="'.$_SESSION['pos_sale_no'].'",vat_percent="'.$vat_percent.'",vat_amt="'.$vat_amt.'"');
	}
?>

