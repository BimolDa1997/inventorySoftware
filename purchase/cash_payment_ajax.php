<?php 
session_start();  
include ('../common/library.php');  

   $customer = $_POST['c_no'];
   $select = $conn->query("select sum(j.cr_amt-j.dr_amt) as total_amt,c.supplier_name from journal j,supplier_info c where j.group_for=".$_SESSION['group_for']." and j.ledger_id=c.ledger_id and c.ledger_id='".$customer."'");
   $data['c_info']= $select->fetch_assoc();
   echo json_encode($data);
	

 
?>

		
		