<?php 
  session_start();
//include ('../common/library.php');  
include "../lib/db/connection.php";
include ('../common/helper.php');

   $item_id = $_POST['item_id'];
   $unit = $_POST['unit_name'];
   $qty = $_POST['qty'];
   $damage_qty = $_POST['damage_qty'];
   $rate = $_POST['rate'];
   $amount = $_POST['amount'];
   $update_id = $_POST['update_id'];
   $color = $_POST['color'];
   
   
  
   
    $master =$conn->query("update purchase_return_details set item_id='".$item_id."',unit='".$unit."',rate='".$rate."',qty='".$qty."', 
    damage_qty='".$damage_qty."',amount='".$amount."', color = '".$color."' where id='".$update_id."'");
   
  
   
  if ($master==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$update_id));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$update_id));
	}
  

 
?>

		
		