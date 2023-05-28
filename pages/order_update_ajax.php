<?php 
  session_start();
include ('../common/library.php');  
include ('../common/helper.php'); 

   $id = $_POST['id'];
   $order_id = $_POST['order_id'];
   $item = explode("#",$_POST['item_id']);
   $item_id = $item[1];
   $qty = $_POST['qty'];
   $rate = $_POST['rate'];
   $amount = $_POST['amount'];
   $mobile = $_POST['mobile_no'];
   $shipping_address = $_POST['shipping_address'];
   $edit_by = $_SESSION['user_id'];
   $edit_at = date('Y-m-d H:i:s');
   
   $oldSql = $conn->query("select o.*,c.*,i.item_name,c.id as uid from orders o, carts c, item_info i where i.item_id=c.product_id and c.order_id=o.order_id and c.status='PENDING' and c.id=".$id."");
   $old_data = $oldSql->fetch_assoc();
   
   if($id>0){
   $cart_update = $conn->query("update carts set product_id='".$item_id."', quantity='".$qty."', rate='".$rate."', amount='".$amount."', edit_by='".$edit_by."', edit_at='".$edit_at."' where id=".$id."");
   }
   
   if($order_id>0){
	    $order_update = $conn->query("update orders set shipping_address='".$shipping_address."',phone_no='".$mobile."' where order_id='".$order_id."'");
	   }
	   
	   
	   
	   //Logs
	   
	   
	   if($old_data['product_id']!=$item_id){
		   $new_item_id = $item_id;
		   }else{
			   $new_item_id = '';
			   }
			   
		if($old_data['quantity']!=$qty){
		   $new_qty = $qty;
		   }else{
			   $new_qty = '';
			   }	
			      
		if($old_data['rate']!=$rate){
		   $new_rate = $rate;
		   }else{
			   $new_rate = '';
			   }
			   
			   
	    if($old_data['amount']!=$amount){
		   $new_amount = $amount;
		   }else{
			   $new_amount = '';
			   }	
			
	    if($old_data['phone_no']!=$mobile){
		   $new_mobile = $mobile;
		   }else{
			   $new_mobile = '';
			   }
			   
	     if($old_data['shipping_address']!=$shipping_address){
		   $new_shipping_address = $shipping_address;
		   }else{
			   $new_shipping_address = '';
			   }	
			   	      
	   $logs = $conn->query("insert into order_update_logs(`order_id`,`cart_id`,`item_id`,`qty`,`rate`,`amount`,`mobile_no`,`shipping_address`,`edit_by`,`edit_at`) value('".$order_id."','".$id."','".$new_item_id."','".$new_qty."','".$new_rate."','".$new_amount."','".$new_mobile."','".$new_shipping_address."','".$edit_by."','".$edit_at."')");
   
   
  if ($cart_update==true || $order_update==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count,"pawri"=>$confirm_date));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
  
 
?>
		
		