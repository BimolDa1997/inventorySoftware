<?php 

$page_name="Cash Collection"; 
include ('../common/library.php'); 
include ('../common/helper.php'); 
include ('../template/header.php');
include ('../template/sidebar.php');
$page_name='customer_setup';

if(isset($_POST['payment_save'])){
  $customer_id = $_POST['customer_id'];
  $sales_amount = $_POST['sales_amount'.$customer_id];
  $collection = $_POST['collection'.$customer_id];
  $discount = $_POST['discount'.$customer_id];
  $payment_type = $_POST['payment_type'.$customer_id];
  $details = $_POST['details'.$customer_id];
  $total_collection = $_POST['total_collection'.$customer_id];
  $customer_ledger = $_POST['ledger_id'.$customer_id];
  $status = 'PROCESSING';

  $entry_by = $_SESSION['user_id'];
  //journal start

if($total_collection>0){
$max_jv = find_a_field('journal','max(jv_no)','1');
$tr_from = 'Receipt';
$cr_ledger = 1000002;
$jv_date = date('Y-m-d');
$status = 'Paid';
$entry_by = $_SESSION['user_id'];
$discount_ledger = 1000004;


if($max_jv=='' || $max_jv==0){
$max_jv = date('Ymd');

}else{
$max_jv = $max_jv+1;
}



if($discount>0){
$rest_amt = $total_collection-$discount;

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$rest_amt."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_dr =$conn->query($rcv_dr);


$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$rest_amt."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_cr =$conn->query($rcv_cr); 

$tr_from = 'Discount';
 $discount_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$discount_ledger."','".$discount."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_dr =$conn->query($discount_dr);

$discount_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$discount."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_cr =$conn->query($discount_cr); 

}else{

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$total_collection."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_dr =$conn->query($rcv_dr);

$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$total_collection."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";

$journal_insert_cr =$conn->query($rcv_cr); 


}


}
//journa end

  $_SESSION['sale_no'] = '';
  }


if(isset($_POST['update'])){
  $update_id = $_POST['update_id'];
  $business_name = $_POST['business_name1'];
  $propritor_name = $_POST['propritor_name1'];
  $mobile_no = $_POST['mobile_no1'];
  $customer_address = $_POST['customer_address1'];
  $credit_limit = $_POST['credit_limit1'];
  $previous_due = $_POST['business_name1'];
  $previous_advance = $_POST['business_name1'];
  $entry_by = $_SESSION['user_id'];



  if($update_id>0){
  $update = $conn->query("update customer_info set business_name='".$business_name."',propritor_name='".$propritor_name."',mobile_no='".$mobile_no."',customer_address='".$customer_address."',credit_limit='".$credit_limit."',entry_by='".$entry_by."' where id='".$update_id."'");

  }


  if($update==true){
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Customer Successfully Updated.</span>';

  } else{
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}

if(isset($_POST['advance_collect'])){
   $party = $_POST['party_name'];

   $data = explode("<#>", $party);
   $party_name = $data[1];
   $collection_date = $_POST['collection_date'];
   $payment_type = $_POST['payment_terms'];
   $advance = $_POST['final_amt'];
   $customer_type = $_POST['customer_type'];
   $details = $_POST['details'];
   $max_jv = find_a_field('journal','max(jv_no)','1');
   $tr_from = 'Receipt';

   $jv_date = $_POST['collection_date'];
   if($_POST['due']>0){ $status ='Received';}else{ $status = 'Advance'; }

   $entry_by = $_SESSION['user_id'];


   if($max_jv=='' || $max_jv==0){

   $max_jv = date('Ymd');
   }else{
   $max_jv = $max_jv+1;
   }

 $r_dealer = find_a_field('customer_info','id','business_name like "'.$party_name.'"');
   $ledger_id = find_a_field('customer_info','ledger_id','id="'.$r_dealer.'"');

   if($r_dealer=='' || $r_dealer==0){
   $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type` , `group_for`) VALUES ('".$dealer_name."', '1001', '".$_SESSION['group_for']."')"); 

   $ledger_id = mysqli_insert_id($conn);


   $insert =$conn->query("insert into customer_info(`business_name`,`propritor_name`,`ledger_id`,`customer_type`,`group_for`) Values('".$party_name."','".$party_name."','".$ledger_id."','".$customer_type."','".$_SESSION['group_for']."')");

   $r_dealer = mysqli_insert_id($conn);
   }



if($_POST['payment_terms']==1000007){ $payType='Cash'; }elseif($_POST['payment_terms']==1000008){ $payType='Bank';}elseif($_POST['payment_terms']==1000009){ $payType='Commission'; }else{ $payType=$_POST['payment_terms']; } 

    $narration = 'Payment type : '.$payType.' ##  Money receipt details : '.$_POST['details'];   




$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`,`narration`,`customer_type`,`money_receipt`,`customer_id`) VALUES ('".$max_jv."','".$jv_date."','".$payment_type."','".$advance."',0,'".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payType."' ,'".$narration."','".$customer_type."','".$details."','".$data[0]."')";

$journal_insert_dr =$conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`,`narration`,`customer_type`,`money_receipt`,`customer_id`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$advance."','".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payType."' ,'".$narration."','".$customer_type."','".$details."','".$data[0]."')";

$journal_insert_cr =$conn->query($rcv_cr); 





//Text Sms For Collection

$customer_mobile = find_a_field('customer_info','mobile_no','id='.$r_dealer);

if($customer_mobile != ''){
function sms($dest_addr,$sms_text){

//$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";



$fields = array(

    'Username'      => "mollik",

    'Password'      => "Mplaza@123",

    'From'          => "MollikPlaza",

    'To'            => $dest_addr,

    'Message'       => $sms_text

);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, count($fields));

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

$result = curl_exec($ch);

curl_close($ch);

}



$recipients ="88".$customer_mobile."";

$massage  = "Dear Sir,\r\nNew Collection Submitted. \r\n";

$massage .= " Date: ".$jv_date." \r\n";

$massage .= "Party Name : ".find_a_field('customer_info','concat(business_name,"-",customer_address)','ledger_id='.$ledger_id)." \r\n";

$massage .= " Details: ".$narration." \r\n";


$massage .= "Total Collection : ".$advance." Taka \r\n";

$massage .= "Current Balance: ".find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id='.$ledger_id)." Taka \r\n";

$sms_result=sms($recipients, $massage);

}


}











if($_POST['discount']>0){
$discount_ledger = 1000004;
$tr_from = 'Discount';

$discount_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$discount_ledger."','".$_POST['discount']."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$narration."','".$customer_type."','".$details."')";

$journal_insert_dr =$conn->query($discount_dr);



$discount_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$_POST['discount']."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$narration."','".$customer_type."','".$details."')";

$journal_insert_cr =$conn->query($discount_cr); 

}



if(isset($_POST['collection_update'])){
   $party = explode("<#>",$_POST['party_name_update']);
   $party_name = find_a_field('customer_info','business_name','business_name like "%'.$party[0].'%"');
   $collection_date = $_POST['collection_date_update'];
   $payment_type = $_POST['payment_terms_update'];
   $advance = $_POST['final_amt_update'];
   $customer_type = $_POST['customer_type_update'];
   $old_jv_no = $_POST['jv_no'];
   $details = $_POST['details_update'];
   $max_jv = find_a_field('journal','max(jv_no)','1');
   $tr_from = 'Receipt';

   $jv_date = $_POST['collection_date_update'];
   if($_POST['due_update']>0){ $status ='Received';}else{ $status = 'Advance'; }
   $entry_by = $_SESSION['user_id'];

   if($max_jv=='' || $max_jv==0){
   $max_jv = date('Ymd');
   }else{
   $max_jv = $max_jv+1;
   }



   $r_dealer = find_a_field('customer_info','id','business_name like "'.$party_name.'"');
   $ledger_id = find_a_field('customer_info','ledger_id','id="'.$r_dealer.'"');


   if($r_dealer=='' || $r_dealer==0){
   $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type` , `group_for`) VALUES ('".$dealer_name."', '1001', '".$_SESSION['group_for']."')"); 

   $ledger_id = mysqli_insert_id($conn);



   $insert =$conn->query("insert into customer_info(`business_name`,`propritor_name`,`ledger_id`,`customer_type`,`group_for`) Values('".$party_name."','".$party_name."','".$ledger_id."','".$customer_type."','".$_SESSION['group_for']."')");

   $r_dealer = mysqli_insert_id($conn);

   }



if($_POST['payment_terms_update']==1000007){ $payType='Cash'; }elseif($_POST['payment_terms_update']==1000008){ $payType='Bank';}elseif($_POST['payment_terms_update']==1000009){ $payType='Commission'; }else{ $payType=$_POST['payment_terms_update']; } 

    $narration = 'Payment type : '.$payType.' ##  Money receipt details : '.$_POST['details_update'];   

	$del = $conn->query("delete from journal where jv_no='".$old_jv_no."'");



$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$payment_type."','".$advance."',0,'".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payType."' ,'".$narration."','".$customer_type."','".$details."')";

$journal_insert_dr =$conn->query($rcv_dr);




$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$advance."','".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payType."' ,'".$narration."','".$customer_type."','".$details."')";

$journal_insert_cr =$conn->query($rcv_cr); 




if($_POST['discount_update']>0){
$discount_ledger = 1000004;
$tr_from = 'Discount';
$discount_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$discount_ledger."','".$_POST['discount_update']."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$narration."','".$customer_type."','".$details."')";

$journal_insert_dr =$conn->query($discount_dr);


$discount_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`,`customer_type`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$_POST['discount_update']."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$narration."','".$customer_type."','".$details."')";

$journal_insert_cr =$conn->query($discount_cr); 

}


//Text Sms For Collection

$customer_mobile = find_a_field('customer_info','mobile_no','id='.$r_dealer);

if($customer_mobile != ''){
function sms($dest_addr,$sms_text){

//$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";



$fields = array(

    'Username'      => "mollik",

    'Password'      => "Mplaza@123",

    'From'          => "MollikPlaza",

    'To'            => $dest_addr,

    'Message'       => $sms_text

);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, count($fields));

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

$result = curl_exec($ch);

curl_close($ch);

}



$recipients ="88".$customer_mobile."";

$massage  = "Dear Sir,\r\n Collection Updated. \r\n";

$massage .= "Date: ".$jv_date." \r\n";

$massage .= "Party Name : ".find_a_field('customer_info','concat(business_name,"-",customer_address)','ledger_id='.$ledger_id)." \r\n";

$massage .= "Details: ".$narration." \r\n";


$massage .= "Total Collection : ".$advance." Taka \r\n";

$massage .= "Current Balance: ".find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id='.$ledger_id)." Taka \r\n";

$sms_result=sms($recipients, $massage);

}
}


if(isset($_POST['collection_delete'])&&$_POST['jv_no']>0){
	$del = "DELETE FROM journal WHERE jv_no = ".$_POST['jv_no']."";
	$delCon = $conn->query($del); 
	if($delCon){
		$msg = "Successfully Deleted !";
	}
}?>

<style>
	.loader {
		border: 10px solid #f3f3f3;
		border-radius: 50%;
		border-top: 10px solid blue;
		border-right: 10px solid green;
		border-bottom: 10px solid red;
		width: 50px;
		height: 50px;
		-webkit-animation: spin 2s linear infinite;
		animation: spin 2s linear infinite;
	}


	@-webkit-keyframes spin {
		0% {
			-webkit-transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
		}
	}



	@keyframes spin {
		0% {
			transform: rotate(0deg);
		}
		100% {
			transform: rotate(360deg);
		}
	}
</style>




<div class="main-panel">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title"><?=$msg?></h4>
							<button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
								data-target="#withoutSales">
								<i class="fa fa-plus"></i>Add Collection</button>
						</div>
					</div>


					<div class="card-body">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>SL</th>
										<th>Business Name</th>
										<th>Date</th>
										<th>Narration</th>
										<th>Transaction type</th>
										<th>Amount</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>


								<tbody>
									<?php
									$sql = "select c.*,j.narration,j.jv_date,j.tr_from,j.jv_no,sum(j.cr_amt) as total,j.customer_type,j.payment_type,j.money_receipt from customer_info c, journal j where j.group_for=".$_SESSION['group_for']." and c.id=j.customer_id and j.tr_from in ('Receipt')  group by j.jv_no order by jv_date desc ";

									$select =$conn->query($sql); $i=1;
									while($c_data = $select->fetch_assoc()){ 
									$discount = find_a_field('journal','cr_amt','jv_no="'.$c_data['jv_no'].'" and tr_from="Discount" and cr_amt>0');
									?>
									<tr>
										<td><?=$i++;?></td>
										<td><?=$c_data['customer_name'].'<#>'.$c_data['mobile_no']?></td>
										<td><?=date('d-m-Y',strtotime($c_data['jv_date']));?></td>
										<td><?=$c_data['narration']?></td>
										<td><?=$c_data['tr_from']?></td>
										<td><?=$c_data['total']?></td>
										<td><button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
												data-target="#edit_collection<?=$c_data['jv_no']?>">

												<i class="fa fa-edit"></i>Edit Collection</button>


											<form method="post" enctype="multipart/form-data">
												<div class="modal fade" id="edit_collection<?=$c_data['jv_no']?>"
													tabindex="-1" role="dialog" aria-hidden="true">

													<div class="modal-dialog  modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header no-bd">
																<h5 class="modal-title">
																	<span class="fw-mediumbold">Customer</span>

																	<span class="fw-light">Collection Edit</span>
																</h5>

																<button type="button" class="close" data-dismiss="modal"
																	aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>

															<div class="modal-body">
																<p class="small">* Mendatory Field</p>

																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group form-group-default">
																			<label>Customer Type <span
																					style="color:#FF0000; font-size:15px;">*</span></label>
																			<select name="customer_type_update"
																				id="customer_type_update"
																				onblur="pay_update()"
																				class="form-control" required>
																				<option></option>
																				<option
																					<?=($c_data['customer_type']=='Corporate')? 'selected' : ''?>>
																					Corporate</option>
																				<option
																					<?=($c_data['customer_type']=='Registered')? 'selected' : ''?>>
																					Registered</option>
																			</select>
																		</div>
																	</div>



																	<div class="col-sm-6">
																		<div class="form-group form-group-default">

																			<label>Collection Date <span
																					style="color:#FF0000; font-size:15px;">*</span></label>

																			<input type="hidden" name="jv_no" id="jv_no"
																				value="<?=$c_data['jv_no']?>" />

																			<input type="date"
																				name="collection_date_update"
																				id="collection_date_update"
																				class="form-control"
																				value="<?=$c_data['jv_date'];?>"
																				required>
																		</div>
																	</div>



																	<div class="col-sm-4">
																		<div class="form-group form-group-default">
																			<label>Party <span
																					style="color:#FF0000; font-size:15px;">*</span></label>
																			<input type="text" name="party_name_update"
																				onblur="pay_update()" autocomplete="off"
																				value="<?=$c_data['business_name'].'<#>'.$c_data['customer_address']?>"
																				list="partylist_update"
																				class="form-control form-control-sm"
																				id="party_name_update" />


																			<datalist id="partylist_update">
																				<? 
																	  //$s = $conn->query("select business_name from customer_info where group_for = '".$_SESSION['group_for']."' ");
																	  //while($dealer = $s->fetch_assoc()){
																	 ?>
																				<!--<option value="<?=$dealer['business_name']?>">-->
																				<? //} ?>
																			</datalist>
																		</div>
																	</div>




																	<div class="col-sm-2">
																		<div class="form-group form-group-default">
																			<label>Amount Tk<span
																					style="color:#FF0000; font-size:15px;">*</span></label>

																			<input type="text" name="payment_amt"
																				id="payment_amt"
																				value="<?=$c_data['total']+$discount?>"
																				class="form-control"
																				onblur="paycal_update()"
																				style="font-size:15px; font-weight:bold;">
																		</div>
																	</div>





																	<div class="col-sm-2">

																		<div class="form-group form-group-default">

																			<label>Payment Type<span
																					style="color:#FF0000; font-size:15px;">*</span></label>
																			<select name="payment_terms_update"
																				id="payment_terms_update"
																				class="form-control">
																				<option></option>
																				<option
																					<?=($c_data['payment_type']=='Cash')? 'selected' : ''?>
																					value="1000007">Cash</option>

																				<option
																					<?=($c_data['payment_type']=='Bank')? 'selected' : ''?>
																					value="1000008">Bank</option>

																				<option
																					<?=($c_data['payment_type']=='Commission')? 'selected' : ''?>
																					value="1000009">Commission</option>

																				<option
																					<?=($c_data['payment_type']=='Discount')? 'selected' : ''?>
																					value="1000009">Discount</option>
																			</select>
																		</div>
																	</div>


																	<div class="col-sm-2">
																		<div class="form-group form-group-default">
																			<label>Details/Money receipt<span
																					style="color:#FF0000; font-size:15px;"></span></label>

																			<input type="text" name="details_update"
																				id="details_update" class="form-control"
																				value="<?=$c_data['money_receipt']?>"
																				style="font-size:15px; font-weight:bold;">
																		</div>
																	</div>



																	<div class="col-sm-2">
																		<div class="form-group form-group-default">
																			<label>Discount<span
																					style="color:#FF0000; font-size:15px;"></span></label>

																			<input type="text" name="discount_update"
																				id="discount_update"
																				onblur="paycal_update()"
																				class="form-control"
																				value="<?=$discount?>"
																				style="font-size:15px; font-weight:bold;">
																		</div>
																	</div>



																	<div class="col-6">
																		<div class="form-group form-group-default">
																			<label>In word : <span id="words_update">
																	<?php 
																		$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
																		echo $f->format(intval($c_data['total']))." Taka Only";
																	 ?>
																				</span></label>
																		</div>
																	</div>


																	<div class="col-3">
																		<div class="form-group form-group-default">
																			<label>Final Amount<span
																					style="color:#FF0000; font-size:15px;"></span></label>
																			<input type="text" name="final_amt_update"
																				id="final_amt_update"
																				class="form-control"
																				value="<?=$c_data['total']?>"
																				style="font-size:15px; font-weight:bold;">
																		</div>
																	</div>



																	<div class="col-3">
																		<div class="form-group form-group-default">
																			<label>Balance<span
																					style="color:#FF0000; font-size:15px;"></span></label>

																			<input type="text" name="due_update"
																				id="due_update" class="form-control"
																				value=""
																				style="font-size:15px; font-weight:bold;">
																		</div>
																	</div>
																</div>
															</div>


															<div class="modal-footer">
																<button type="button" class="btn btn-secondary"
																	data-dismiss="modal">Close</button>
																<input type="submit" name="collection_delete"
																	id="collection_delete" value="Delete"
																	class="btn btn-danger">
																<input type="submit" name="collection_update"
																	id="collection_update" class="btn btn-primary">
															</div>
														</div>
													</div>
												</div>
											</form>
										</td>
									</tr>
									<?php } //} ?>
								</tbody>
							</table>




							<!--For Without Sales Collection-->



							<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">
								<div class="modal fade" id="withoutSales" tabindex="-1" role="dialog"
									aria-hidden="true">
									<div class="modal-dialog  modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-title">
													<span class="fw-mediumbold">Advance </span><span
														class="fw-light">Collection</span>
												</h5>

												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<p class="small">* Mendatory Field</p>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group form-group-default">
															<label>Customer Type <span
																	style="color:#FF0000; font-size:15px;">*</span></label>
															<select name="customer_type" id="customer_type"
																onblur="pay()" class="form-control" required>
																
																<option>Registered</option>
																<option>Corporate</option>
															</select>
														</div>
													</div>



													<div class="col-sm-6">
														<div class="form-group form-group-default">
															<label>Collection Date <span
																	style="color:#FF0000; font-size:15px;">*</span></label>
															<input type="date" name="collection_date"
																id="collection_date" class="form-control"
																value="<?php echo date('Y-m-d'); ?>" required>
														</div>
													</div>


													<div class="col-sm-4">
														<div class="form-group form-group-default">
															<label>Customer <span
																	style="color:#FF0000; font-size:15px;">*</span></label>
															<input type="text" name="party_name" onblur="pay()"
																autocomplete="off" list="partylist"
																class="form-control form-control-sm" id="party_name" />
															<datalist id="partylist">

																<? 
																	  $s = $conn->query("select * from customer_info where 1 "); //group_for = '".$_SESSION['group_for']."'
																	  while($dealer = $s->fetch_assoc()){
																	 ?>
																		<option value="<?=$dealer['id']?><#><?=$dealer['customer_name']?><#><?=$dealer['mobile_no']?>">
																<? } ?>
															</datalist>
														</div>
													</div>

													<div class="col-sm-2">
														<div class="form-group form-group-default">
															<label>Amount Tk<span
																	style="color:#FF0000; font-size:15px;">*</span></label>
															<input type="text" name="amount" onblur="paycal()"
																id="amount" class="form-control" value=""
																style="font-size:15px; font-weight:bold;">
														</div>
													</div>


													<div class="col-sm-2">
														<div class="form-group form-group-default">
															<label>Payment Type<span
																	style="color:#FF0000; font-size:15px;">*</span></label>
															<select name="payment_terms" id="payment_terms"
																class="form-control">
																<option></option>
																<option value="1000007">Cash</option>
																<option value="1000008">Bank</option>
																<option value="1000009">Commission</option>
																<option value="1000009">Discount</option>
															</select>
														</div>
													</div>


													<div class="col-sm-4">
														<div class="form-group form-group-default">
															<label>Details/Money receipt<span
																	style="color:#FF0000; font-size:15px;"></span></label>
															<input type="text" name="details" id="details"
																class="form-control" value=""
																style="font-size:15px; font-weight:bold;">
															<input type="hidden" name="discount" id="discount"
																onkeyup="paycal()" class="form-control" value=""
																style="font-size:15px; font-weight:bold;">
														</div>
													</div>




													<div class="col-6">
														<div class="form-group form-group-default">
															<label>In word : <span id="words"></span></label>
														</div>
													</div>



													<div class="col-3">
														<div class="form-group form-group-default">
															<label>Final Amount<span
																	style="color:#FF0000; font-size:15px;"></span></label>
															<input type="text" name="final_amt" id="final_amt"
																class="form-control" value=""
																style="font-size:15px; font-weight:bold;">
														</div>
													</div>



													<div class="col-3">
														<div class="form-group form-group-default">
															<label>Balance<span
																	style="color:#FF0000; font-size:15px;"></span></label>
															<input type="text" name="due" id="due" class="form-control"
																value="" style="font-size:15px; font-weight:bold;">
														</div>
													</div>

												</div>

											</div>



											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Close</button>
												<input type="submit" name="advance_collect" id="advance_collect"
													class="btn btn-primary">
											</div>
										</div>
									</div>
								</div>

								<!--For Without Sales Collection-->
							</form>







							<!--edit modal end-->



















						</div>







					</div>



				</div>



			</div>



		</div>



	</div>











</div>



<script>
	// actual  conversion code starts here

	function pay() {
		//$(document).ready(function() {
		var cust = $("#party_name").val();

		var res = cust.split("<#>");

		$.ajax({
			url: "collection_ajax.php",
			method: "POST",
			dataType: "json",
			data: {
				c_no: res[0],
				c_type: $("#customer_type").val()
			},


			success: function (data) {
				console.log(data.c_info);
				$("#due").val(data.c_info.total_amt);
				$("#party").val(data.c_info.business_name);
				$("#load").attr("style", "display:none");
				$("#partylist").html(data.c_list);
			}
		})
		//});
	}


	function pay_update() {
		//$(document).ready(function() {
		$.ajax({
			url: "collection_update_ajax.php",
			method: "POST",
			dataType: "json",
			data: {
				c_no: $("#party_name_update").val(),
				c_type: $("#customer_type_update").val()
			},
			success: function (data) {
				$("#due_update").val(data.c_info.total_amt);
				$("#party_update").val(data.c_info.business_name);
				$("#load").attr("style", "display:none");
				$("#partylist_update").html(data.c_list);
			}
		})
		//});
	}


	function paycal() {
		var sales_amount = (document.getElementById('amount').value) * 1;
		var discount = (document.getElementById('discount').value) * 1;
		var due = sales_amount - discount;
		document.getElementById('final_amt').value = due.toFixed(2);
		document.getElementById('words').innerHTML = inWords(parseInt(document.getElementById('final_amt').value));
	}



	function paycal_update() {
		var sales_amount = (document.getElementById('payment_amt').value) * 1;
		var discount = (document.getElementById('discount_update').value) * 1;
		var due = sales_amount + discount;
		if (due < 0) {
			due = due * (1);
		} else {
			due = due;
		}

		document.getElementById('final_amt_update').value = due.toFixed(2);
		document.getElementById('words_update').innerHTML = inWords(parseInt(document.getElementById('final_amt_update')
			.value));
	}


	//window.onload = paycal_update;


	var a = ['', 'one ', 'two ', 'three ', 'four ', 'five ', 'six ', 'seven ', 'eight ', 'nine ', 'ten ', 'eleven ',
		'twelve ', 'thirteen ', 'fourteen ', 'fifteen ', 'sixteen ', 'seventeen ', 'eighteen ', 'nineteen '
	];
	var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];



	function inWords(num) {
		if ((num = num.toString()).length > 9) return 'overflow';
		n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		if (!n) return;
		var str = '';
		str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
		str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
		str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
		str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
		str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) +
			'taka only ' : '';
		return str;
	}

	document.getElementById('payment_amt').onkeyup = function () {
		document.getElementById('words_update').innerHTML = inWords(parseInt(document.getElementById('payment_amt')
			.value));
	};


	document.getElementById('amount').onkeyup = function () {
		document.getElementById('words').innerHTML = inWords(parseInt(document.getElementById('amount').value));
	};
</script>



<?php include('../template/footer.php');?>