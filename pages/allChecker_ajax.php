<?php 
session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$pure_amt = find_a_field('pos_sale_detail','sum(pure_amt)','sale_no="'.$_SESSION['pos_sale_no'].'"');
$discount = find_a_field('pos_sale_detail','sum(discount)','sale_no="'.$_SESSION['pos_sale_no'].'"');
$vat_amt = find_a_field('pos_discount_vat','sum(vat_amt)','sale_no="'.$_SESSION['pos_sale_no'].'"');
$grand_total = find_a_field('pos_sale_detail','sum(grand_total)','sale_no="'.$_SESSION['pos_sale_no'].'" and color>0');
$color_check = find_a_field('pos_sale_detail','item_id','sale_no="'.$_SESSION['pos_sale_no'].'" and color=""');
$customer = find_a_field('pos_sale_detail','customer','sale_no="'.$_SESSION['pos_sale_no'].'"');
$customer_name = find_a_field('customer_info','customer_name','id="'.$customer.'"');
$grand_total = ($grand_total+$vat_amt);
echo $pure_amt.'#'.$grand_total.'#'.$discount.'#'.$vat_amt.'#'.$customer_name.'#'.$_SESSION['pos_sale_no'].'#'.$color_check;
?>

