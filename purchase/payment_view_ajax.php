<?php 
session_start();  
//include ('../common/library.php'); 
 include "../lib/db/connection.php";
 include ('../common/helper.php'); 

   $s_no = $_POST['purchase_no'];
   $select = $conn->query("select sum(d.amount) as total_amt,m.supplier_name,m.purchase_date,d.color from purchase_order d,purchase_master m 
   where m.group_for = ".$_SESSION['group_for']." and d.purchase_no=m.purchase_no and m.purchase_no='".$s_no."'");
   $data['sales_info']= $select->fetch_assoc();
   echo json_encode($data);
	

 
?>

		
		