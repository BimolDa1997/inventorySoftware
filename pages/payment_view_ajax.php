<?php 
  
include ('../common/library.php');  

   $s_no = $_POST['s_no'];
   $select = $conn->query("select sum(d.amount) as total_amt,m.dealer_name,m.sales_date from sales_order d,sales_master m where m.group_for=".$_SESSION['group_for']." and d.s_no=m.s_no and m.s_no='".$s_no."'");
   $data['sales_info']= $select->fetch_assoc();
   echo json_encode($data);
	

 
?>

		
		