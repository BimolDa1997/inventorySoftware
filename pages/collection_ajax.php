<?php 
session_start();  
include ('../common/library.php');  

      $data['c_list']='';
  if($_POST['c_type'] !=''){
            // $sql = "select * from customer_info where group_for = '".$_SESSION['group_for']."' and customer_type like '".$_POST['c_type']."' ";
       	$s = $conn->query("select * from customer_info where 1 and customer_type like '".$_POST['c_type']."' ");
				while($dealer = $s->fetch_assoc()){
               $data['c_list'] .= ' <option value="'.$dealer['id']."<#>".$dealer['customer_name']."<#>".$dealer['mobile_no'].'">';
            }
  }
  
   $customer = $_POST['c_no'];
   $select = $conn->query("select sum(j.dr_amt-j.cr_amt) as total_amt,c.business_name from journal j,customer_info c where j.group_for=".$_SESSION['group_for']." and j.ledger_id=c.ledger_id and c.business_name like '".$customer."'");
   $data['c_info']= $select->fetch_assoc();
   
   
   echo json_encode($data);
	

 
?>

		
		