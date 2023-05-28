<?php 
session_start();  
include "../lib/db/connection.php";
include ('../common/helper.php'); 

   $supplier_id = $_GET['supplier_id'];
   $po_no = $_GET['po_no'];
   $item_id = $_GET['item_id'];
   $old_po = $_GET['old_po_no'];
   
  if($supplier_id != 0){
    echo '<option value="">Select Purchase Order</option>';
    foreign_relation('purchase_master','purchase_no','concat(purchase_no," #> ",purchase_date)',$po_no,'supplier_id='.$supplier_id); 
  }

  if($po_no != 0){
    echo '<option value="">Select Product</option>';
    // foreign_relation('item_info i, purchase_order o','item_id','item_name',$item_ids,'i.group_for="'.$_SESSION['group_for'].'"  
    // and i.item_id=o.item_id and o.purchase_no='.$po_no.' ');
    $sql = "SELECT i.item_id, i.item_code, o.color, i.item_name FROM item_info i, purchase_order o WHERE i.group_for='".$_SESSION['group_for']."' AND i.item_id=o.item_id 
    AND o.purchase_no=".$po_no." ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="'.$row['item_id'].'">'.$row['item_code'].' #> '.$row['item_name'].'</option>';
    }
  }

  if($item_id != 0 && $old_po != 0){
    $sql = "SELECT c.id,c.color FROM purchase_order o, color_list c WHERE o.color=c.id and o.purchase_no=".$old_po." AND o.item_id=".$item_id." ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="">Select Color</option>';
      echo '<option value="'.$row['id'].'">'.$row['color'].'</option>';
    }
  }

?>

		
		