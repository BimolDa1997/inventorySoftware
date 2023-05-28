<?php 
session_start();
//include ('../common/library.php');  
include "../lib/db/connection.php";
include ('../common/helper.php'); 

   $item_id       = $_POST['item_id'];
   $supplier      = $_POST['supplier_id'];
   $purchase_date = $_POST['purchase_date'];
   $entry_by      = $_SESSION['user_id'];
   $po_no         =$_SESSION['purchase_no'];
   $color        = $_POST['color'];
	
   $supplier_name = find_a_field('supplier_info','supplier_name','id="'.$supplier.'"');
   
  
   if($_SESSION['purchase_no']==''){
   $master =$conn->query("insert into purchase_return_master(`purchase_date`,`supplier_id`,`supplier_name`,`entry_by`,`group_for`) 
   Values('".$purchase_date."','".$supplier."','".$supplier_name."','".$entry_by."','".$_SESSION['group_for']."')");
   $_SESSION['purchase_no'] = mysqli_insert_id($conn);
   }
   else {
   $update =$conn->query("update purchase_return_master set purchase_date='".$purchase_date."',supplier_id='".$supplier."',supplier_name='".$supplier_name."',
   entry_by='".$entry_by."',group_for='".$_SESSION['group_for']."' where purchase_no='".$_SESSION['purchase_no']."'");
	 
	 // $journal_item_update = $conn->query("update `journal_item` set `journal_date`='".$purchase_date."', `tr_no`=".$po_no.",`entry_by`".$entry_by.",tr_from="Purchase"");
//	  
//	   $journal_item_update = $conn->query("update `journal` set `jv_date`='".$purchase_date."', `tr_no`=".$po_no.",`edit_by`".$entry_by.",tr_from="Purchase"");
   }
   
  $details = $conn->query("INSERT INTO `purchase_return_details` (`purchase_no`,`item_id`,`purchase_date`,`group_for`, `color`) 
  VALUES ('".$_SESSION['purchase_no']."','".$item_id."','".$purchase_date."','".$_SESSION['group_for']."','".$color."')"); 
  
  
	 // $journal_item_update = $conn->query("update `journal_item` set `journal_date`='".$purchase_date."', `tr_no`=".$po_no.",`entry_by`".$entry_by.",tr_from="Purchase"");
	  
	  // $journal_update = $conn->query("update `journal` set `jv_date`='".$purchase_date."', `tr_no`=".$po_no.",`edit_by`".$entry_by.",tr_from="Purchase"");
   
   //$count_sql = $conn->query("select count(purchase_no) as total_row from sales_order where purchase_no='".$_SESSION['purchase_no']."'");
   //$count_data = $count_sql->fetch_assoc();
   //$count = $count_data['total_row'];
   
  
  if ($details==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count));
	} //elseif($journal_item_update==true){
//	
//	echo json_encode(array("statusCode"=>200,"row"=>$count));
//	}
//	elseif($journal_update==true){
//	
//	echo json_encode(array("statusCode"=>200,"row"=>$count));
//	}
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
  

?>

		
		