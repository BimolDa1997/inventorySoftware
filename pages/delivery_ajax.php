<?php 
  session_start();
include ('../common/library.php');  
include ('../common/helper.php'); 

   $id = $_POST['id'];
   $item_id = $_POST['item_id'];
   $order_no = $_POST['s_no'];
   $return_qty = $_POST['return_qty'];
   $damage_qty = $_POST['damage_qty'];
   $confirm_qty = $_POST['confirm_qty'];
   $confirm_date = $_POST['confirm_date'];
   $amount = $_POST['amount'];
   $type = $_POST['type'];
   $cash_ledger = 1000007;
   $damage_ledger = 1000014;
   $sales_ledger = 1000002;
   $sales_return_ledger = 1000013;
   $jv_no = find_a_field('journal','max(jv_no)+1','1');
   $jv_date = date('Y-m-d');
   $tr_no = $order_no;
   $status = 'Paid';
   if($jv_no==''){
	   $jv_no = date('Ymd');
	   }
   $entry_by = $_SESSION['user_id'];
   
   if($type=='INTERNAL'){
   $sql = $conn->query('select s.*,d.rate,d.item_id from sales_master s, sales_order d where s.s_no=d.s_no and d.item_id="'.$item_id.'" and s.s_no="'.$order_no.'"');
   $data = $sql->fetch_assoc();
   $color = $data['color'];
   $rate = $data['rate'];
   
   $update = $conn->query("update delivery_info set return_qty='".$return_qty."',damage_qty='".$damage_qty."',  confirm_qty='".$confirm_qty."', amount='".$amount."',status='CONFIRMED' where id='".$id."'");
   }else{
	   $cart_id = find_a_field('delivery_info','sales_order_id','id="'.$id.'"');
   $sql = $conn->query('select * from carts where id="'.$cart_id.'"');
   $data = $sql->fetch_assoc();
   $color = $data['color'];
   $rate = $data['rate'];
   
   $update = $conn->query("update delivery_info set return_qty='".$return_qty."',damage_qty='".$damage_qty."',  confirm_qty='".$confirm_qty."', amount='".$amount."',status='CONFIRMED' where id='".$id."'");
   $update2 = $conn->query("update carts set status='CONFIRMED' where id='".$cart_id."'");
	   
	   }
   if($confirm_qty>0){
   $tr_from = 'Receipt';
   $total_confirm_amt = $rate*$confirm_qty;
   $j_dr = "INSERT INTO `journal` (
   `jv_no`,
   `jv_date`,
   `ledger_id`,
   `dr_amt`,
   `cr_amt`,
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`,
   `warehouse`
	  ) VALUES (
	  '".$jv_no."',
	  '".$jv_date."',
	  '".$cash_ledger."',
	  '".$total_confirm_amt."',0,
	  '".$tr_from."',
	  '".$tr_no."',
	  '".$status."',
	  '".$entry_by."' ,
	  '".$_SESSION['group_for']."',
	  '".$_SESSION['warehouse']."'
	  )";
	  $journal_insert_dr =$conn->query($j_dr);


   $j_cr = "INSERT INTO `journal` (
   `jv_no`, 
   `jv_date`, 
   `ledger_id`,
   `dr_amt`,
   `cr_amt`, 
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`,
   `warehouse`)
    VALUES (
	'".$jv_no."',
	'".$jv_date."',
	'".$sales_ledger."',0,
	'".$total_confirm_amt."',
	'".$tr_from."',
	'".$tr_no."',
	'".$status."',
	'".$entry_by."' ,
	'".$_SESSION['group_for']."',
	'".$_SESSION['warehouse']."'
	)";
	$journal_insert_cr =$conn->query($j_cr); 
   }
   
   if($return_qty>0){
   $tr_from = 'SalesReturn';
   $journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_in`, `tr_no`, `tr_from`,`entry_by`,`warehouse`,`color`) VALUES ('".$jv_date."','".$item_id."','".$rate."','".$return_qty."','".$tr_no."','SalesReturn','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."','".$color."')");
   $total_return_amt = $rate*$return_qty;
   
  /* $j_dr = "INSERT INTO `journal` (
   `jv_no`,
   `jv_date`,
   `ledger_id`,
   `dr_amt`,
   `cr_amt`,
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`
	  ) VALUES (
	  '".$jv_no."',
	  '".$jv_date."',
	  '".$sales_return_ledger."',
	  '".$total_return_amt."',0,
	  '".$tr_from."',
	  '".$tr_no."',
	  '".$status."',
	  '".$entry_by."' ,
	  '".$_SESSION['group_for']."')";
	  $journal_insert_dr =$conn->query($j_dr);


   $j_cr = "INSERT INTO `journal` (
   `jv_no`, 
   `jv_date`, 
   `ledger_id`,
   `dr_amt`,
   `cr_amt`, 
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`)
    VALUES (
	'".$jv_no."',
	'".$jv_date."',
	'".$data['ledger_id']."',0,
	'".$total_return_amt."',
	'".$tr_from."',
	'".$tr_no."',
	'".$status."',
	'".$entry_by."' ,
	'".$_SESSION['group_for']."')";
	$journal_insert_cr =$conn->query($j_cr); */
   }
   
   if($damage_qty>0){
$damage_item = $conn->query("INSERT INTO `damage_item`(`journal_date`, `item_id`, `rate`, `item_in`, `tr_no`, `tr_from`,`entry_by`,`warehouse`,`color`) VALUES ('".$jv_date."','".$item_id."','".$rate."','".$damage_qty."','".$tr_no."','Damage','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."','".$color."')");
   $tr_from = 'Damage';
   $total_damage_amt = $rate*$damage_qty;
   /*$j_dr = "INSERT INTO `journal` (
   `jv_no`,
   `jv_date`,
   `ledger_id`,
   `dr_amt`,
   `cr_amt`,
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`
	  ) VALUES (
	  '".$jv_no."',
	  '".$jv_date."',
	  '".$damage_ledger."',
	  '".$total_damage_amt."',0,
	  '".$tr_from."',
	  '".$tr_no."',
	  '".$status."',
	  '".$entry_by."' ,
	  '".$_SESSION['group_for']."')";
	  $journal_insert_dr =$conn->query($j_dr);


   $j_cr = "INSERT INTO `journal` (
   `jv_no`, 
   `jv_date`, 
   `ledger_id`,
   `dr_amt`,
   `cr_amt`, 
   `tr_from`, 
   `tr_no`,
   `status`,
   `entry_by` ,
   `group_for`)
    VALUES (
	'".$jv_no."',
	'".$jv_date."',
	'".$data['ledger_id']."',0,
	'".$total_damage_amt."',
	'".$tr_from."',
	'".$tr_no."',
	'".$status."',
	'".$entry_by."' ,
	'".$_SESSION['group_for']."')";
	$journal_insert_cr =$conn->query($j_cr); */
   }
   
  
   
  
  if ($update==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count,"pawri"=>$confirm_date));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
  
 
?>
		
		