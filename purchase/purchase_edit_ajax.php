<?php 
  session_start();
//include ('../common/library.php');  
include "../lib/db/connection.php";
include ('../common/helper.php');

   $item_id = $_POST['item_id'];
   $color = $_POST['color'];
   $unit = $_POST['unit_name'];
   $qty = $_POST['qty'];
   $rate = $_POST['rate'];
   $amount = $_POST['amount'];
   $update_id = $_POST['update_id'];
   
   
  
   
   $master =$conn->query("update purchase_order set item_id='".$item_id."',unit='".$unit."',rate='".$rate."',qty='".$qty."',amount='".$amount."', color='".$color."' where id='".$update_id."'");
   
  
   
  if ($master==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$update_id));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$update_id));
	}
  

 
?>

		
		