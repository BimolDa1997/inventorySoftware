<?php 
  
include ('../common/library.php');  

   $dealer_id = $_POST['dealer_id'];
   $dlr1 = explode("#",$_POST['dealer_id']);
   $select = $conn->query("select *  from customer_info where id='".$dlr1[1]."'");
   $data['dealer_info']= $select->fetch_assoc();
   echo json_encode($data);
	

 
?>

		
		