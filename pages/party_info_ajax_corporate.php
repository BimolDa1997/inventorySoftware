<?php 
session_start();
include ('../common/library.php'); 
include ('../common/helper.php');  

   $dealer_id = $_POST['dealer_id'];
   $dealer = explode("<#>",$dealer_id);
   
   /*if($_SESSION['sale_no']>0){
   $pre_dealer = find_a_field('sales_master','dealer_name','s_no="'.$_SESSION['sale_no'].'"');
   if($dealer[0]!=$pre_dealer){
   $r_dealer = find_a_field('customer_info','id','business_name like "%'.$dealer[0].'%"');
   $address = find_a_field('customer_info','customer_address','business_name like "%'.$dealer[0].'%"');
   $update = $conn->query("update sales_master set dealer_code='".$r_dealer."', dealer_name='".$dealer[0]."',dealer_address='".$address."' where s_no='".$_SESSION['sale_no']."'");
   $data['msg'] = 'Click Refresh Button To Change Party !';
   }
   }*/
   
   $select = $conn->query("select *  from customer_info where business_name='".$dealer[0]."' and customer_type='Corporate'");
   $data['dealer_info']= $select->fetch_assoc();
   echo json_encode($data);
   
	

 
?>

		
		