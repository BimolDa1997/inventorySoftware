<?php 
session_start();  
include "../lib/db/connection.php";
include ('../common/helper.php'); 

   $item_id       = $_POST['item_id'];
   $color       = $_POST['color'];
   $supplier      = $_POST['supplier_id'];
   $purchase_date = $_POST['purchase_date'];
   $entry_by      = $_SESSION['user_id'];
   $po_no         =$_SESSION['purchase_no'];

   $count = $conn->query("select count(*) as count from purchase_order where purchase_no='".$_SESSION['purchase_no']."' and item_id =".$item_id." and color = ".$color ." ")->fetch_object()->count;
	
   if($count>0){ echo json_encode(array("statusCode"=>200,"row"=>$count)); }else{ 
   $supplier_name = find_a_field('supplier_info','supplier_name','id="'.$supplier.'"');
   
  
   if($_SESSION['purchase_no']==''){
   $master =$conn->query("insert into purchase_master(`purchase_date`,`supplier_id`,`supplier_name`,`entry_by`,`group_for`) 
   Values('".$purchase_date."','".$supplier."','".$supplier_name."','".$entry_by."','".$_SESSION['group_for']."')");
   $_SESSION['purchase_no'] = mysqli_insert_id($conn);
   }
   else {
     $update =$conn->query("update purchase_master p,journal_item ji,journalj
	 
	  set p.purchase_date='".$purchase_date."',p.`supplier_id`=".$supplier.",p.supplier_name='".$supplier_name."',p.entry_by=".$entry_by.", 
     ji.`journal_date`='".$purchase_date."', ji.`tr_no`=".$po_no.",ji.`entry_by`".$entry_by.",ji.tr_from='Purchase', 
     j.`jv_date`='".$purchase_date."', j.`tr_no`=".$po_no.",j.`edit_by`".$entry_by.",j.tr_from='Purchase'

 where p.purchase_no=".$po_no." and p.purchase_no=ji.tr_no and p.ledger_id=j.ledger_id and ji.tr_no=j.tr_no");
	 
	
   }
   
  $details = $conn->query("INSERT INTO `purchase_order` (`purchase_no`,`item_id`,`purchase_date`,`group_for`,`color`)
  VALUES ('".$_SESSION['purchase_no']."','".$item_id."','".$purchase_date."','".$_SESSION['group_for']."','".$color."')"); 
  
  
  if ($details==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count));
	} else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
} 

?>

		
		