<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$cname= $_GET['cname'];
$cphone= $_GET['cphone'];
$cid = $_GET['cid'];
$customers = explode("|",$cname);
if($customers[0]==''){
	$customer= $cname;
	}else{
		$customer = $customers[0];
		}
$cphone_validity = preg_match('/^[0-9]{11}+$/', $cphone);
$old_cid = find_a_field('customer_info','id','customer_name="'.$customer.'" and mobile_no="'.$customers[1].'"');

if($customer=='Walk-in Customer'){
	$update = $conn->query('update pos_sale_detail set customer="73" where sale_no="'.$_SESSION['pos_sale_no'].'"');
	$cid = 73;
	$customerName = 'Walk-in Customer';
	$phone = '';
	$msg = '';
	
	}elseif($old_cid>0){
		if($_SESSION['pos_sale_no']>0){
		 $update = $conn->query('update pos_sale_detail set customer="'.$old_cid.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		}
		 $cid = $old_cid;
	     $customerName = $customer;
	     $phone = $customers[1];
	     $msg = '';
		}elseif($old_cid=='' && $cphone_validity>0){
			$insert = $conn->query('insert into customer_info set customer_name="'.$customer.'", mobile_no="'.$cphone.'"');
			$cid = $conn->insert_id;
			$update = $conn->query('update pos_sale_detail set customer="'.$cid.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
			$cid = $cid;
	        $customerName = $customer;
	        $phone = $cphone;
	        $msg = '';
			}else{
				$cid = '';
	            $customerName = 'Number Invalid';
	            $phone = '';
	            $msg = '';
				}
				
				echo $cid.'::'.$customerName.'::'.$phone.'::'.$msg;

/*if($customer[0]=='Walk-in Customer'){
	$update = $conn->query('update pos_sale_detail set customer="73" where sale_no="'.$_SESSION['pos_sale_no'].'"');
	$cid = 73;
	$customer= "Walk-in Customer";
	$phone = '';
	$msg = '';
	echo $cid.'#'.$customer.'#'.$phone.'#'.$msg;
	}else{
  
  if($cid>0 && $cid!='73'){
	 $phone = find_a_field('customer_info','mobile_no','id="'.$cid.'"');
	 $update = $conn->query('update pos_sale_detail set customer="'.$cid.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
	 $customerName = 'update';
	 echo $cid.'#'.$customerName.'#'.$phone.'#'.$msg;
	 
	 }else{
		 
		if($cphone_validity>0){
	    $phone = $cphone;
	    $update = $conn->query('insert into customer_info set customer_name="'.$customer[0].'", mobile_no="'.$cphone.'"');
		$cid = $conn->insert_id;
		$update = $conn->query('update pos_sale_detail set customer="'.$cid.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		$customerName= 'insert';
		echo $cid.'#'.$customerName.'#'.$phone.'#'.$msg;
		
	}
	}

}*/
?>

