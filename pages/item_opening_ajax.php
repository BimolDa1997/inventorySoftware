<?php 
  session_start();
include ('../common/library.php');  
include ('../common/helper.php'); 

   
   $item_id = $_POST['item_id'];
   $color = $_POST['color'];
   $qty = $_POST['qty'];
   $rate = $_POST['rate'];
   $opening = 1000254;
   $inventory = 1000259;
   $jv_no = find_a_field('journal','max(jv_no)+1','1');
   $jv_date = date('Y-m-d');
   $tr_no = $order_no;
   
   if($jv_no==''){
	   $jv_no = date('Ymd');
	   }
   $entry_by = $_SESSION['user_id'];
   $amount = $rate*$qty;
   
  
  
   if($qty>0){
	   $opening_check = find_a_field('journal_item','sum(item_in)','tr_from="Opening" and item_id="'.$item_id.'" and color="'.$color.'"');
	   $opening_rate = find_a_field('journal_item','rate','tr_from="Opening" and item_id="'.$item_id.'" and color="'.$color.'"');
	   if($opening_check>0){
		   $return_txt = '<span style="color:red;">Already Set, Qty='.$opening_check.', Rate='.$opening_rate.'</span>';
		   echo json_encode(array("statusCode"=>200,"row"=>0,"msg"=>$return_txt));
	   }else{
   $journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_in`, `tr_no`, `tr_from`,`entry_by`,`warehouse`,`color`) VALUES ('".$jv_date."','".$item_id."','".$rate."','".$qty."','1','Opening','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."','".$color."')");
   
   
   $tr_from = 'ItemOpening';
   $total_confirm_amt = $rate*$confirm_qty;
   $j_dr = "INSERT INTO `journal` (
   `jv_no`,
   `jv_date`,
   `ledger_id`,
   `dr_amt`,
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`
	  ) VALUES (
	  '".$jv_no."',
	  '".$jv_date."',
	  '".$inventory."',
	  '".$amount."',
	  '".$tr_from."',
	  '1',
	  '".$status."',
	  '".$entry_by."' ,
	  '".$_SESSION['group_for']."')";
	  $journal_insert_dr =$conn->query($j_dr);


   $j_cr = "INSERT INTO `journal` (
   `jv_no`, 
   `jv_date`, 
   `ledger_id`,
   `cr_amt`, 
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`)
    VALUES (
	'".$jv_no."',
	'".$jv_date."',
	'".$opening."',
	'".$amount."',
	'".$tr_from."',
	'1',
	'".$status."',
	'".$entry_by."' ,
	'".$_SESSION['group_for']."')";
	$journal_insert_cr =$conn->query($j_cr); 
	
	if ($journal_item==true) {
		echo json_encode(array("statusCode"=>200,"row"=>1,"msg"=>$confirm_date));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
	
   }
   
   
   
	
	
   }
   
   
  
  
 
?>
		
		