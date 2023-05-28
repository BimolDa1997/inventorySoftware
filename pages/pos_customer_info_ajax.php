<?php 
session_start();
include ('../common/library.php'); 
include ('../common/helper.php');  

   $dealer_id = $_POST['dealer_id'];
   $dealer = explode("#",$dealer_id);
   $select = $conn->query("select *  from customer_info where id='".$dealer[1]."'");
   $data['dealer_info']= $select->fetch_assoc();
   echo json_encode($data);
   
	

 
?>

		
		