<?php 
$page_name="Loan Give";  
include ('../common/library.php');  
include ('../common/helper.php'); 
include ('../template/header.php'); 
include ('../template/sidebar.php');


$page_name='loan_donar';


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

$tr_from = 'Loan';

$cr_ledger = 1000002;

$jv_date = date('Y-m-d');

$status = 'Paid';

$entry_by = $_SESSION['user_id'];





//INSERT INTO `loan_history` (`id`, `jv_no`, `jv_date`, `donar_id`, `loan_amt`, `paid_amt`, `final_amt`, `narration`, `tr_from`, `tr_no`, `tr_type`, `tr_id`, `payment_type`, `group_for`, `status`, `entry_at`, `entry_by`, `edit_at`, `edit_by`, `customer_type`, `money_receipt`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', current_timestamp(), '', '0000-00-00 00:00:00.000000', '', '', '');





//INSERT INTO `donar_info` (`donar_id`, `donar_name`, `mobile_no`, `donar_address`, `credit_limit`, `ledger_id`, `group_for`, `customer_type`, `previous_due`, `previous_advance`, `entry_at`, `entry_by`, `status`, `pic`, `nid`, `form`, `check_file`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')







if($discount>0){}else{



 $rcv_dr = "INSERT INTO `loan_info` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$total_collection."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";



$journal_insert_dr =$conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `loan_info` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$total_collection."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$details."')";







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

  }

  else

  {

  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';

 }



}







//loan_return



if(isset($_POST['loan_return'])){



   $donar_name = $_POST['donar_name'];

   $collection_date = $_POST['collection_date'];

   $details = $_POST['details'];

   

   $jv_date = $_POST['collection_date'];

   $amount = $_POST['amount'];

   $entry_by = $_SESSION['user_id'];

	$ledger_id = find_a_field('donar_info','ledger_id','donar_name like "'.$donar_name.'"');



   if($ledger_id =='' || $ledger_id==0){

   

   

   $ledger = $conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`,`head_type`,`group_for`) VALUES ('".$donar_name."', '1003','Loan','".$_SESSION['group_for']."')"); 

  $ledger_id = mysqli_insert_id($conn);

  

  $insert = $conn->query("insert into donar_info(`donar_name`,`group_for`,`ledger_id`,`donar_type`) values('".$donar_name."','".$_SESSION['group_for']."' ,'".$ledger_id."' , 'Give Loan')");

   $r_dealer = mysqli_insert_id($conn);

   }

$max_jv = find_a_field('journal','max(jv_no)+1','1');
if($max_jv==''){

$max_jv = date('Y-m-d');

}

if($_POST['type'] =="Loan Take"){

 $tr_from = 'Give Loan';

 

 

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '".$ledger_id."' , '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`cr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '1000007' , '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_cr);



}else{

 $tr_from = 'Give Loan';

 

 

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '1000007' , '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`cr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '".$ledger_id."' , '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_cr);

 }


}






if(isset($_POST['advance_collect'])){

   $donar_name = $_POST['donar_name'];

   $collection_date = $_POST['collection_date'];

   $details = $_POST['details'];

  







   $jv_date = $_POST['collection_date'];

   $amount = $_POST['amount'];

   $entry_by = $_SESSION['user_id'];



   $max_jv = find_a_field('journal','max(jv_no)','1')+1;

 	$ledger_id = find_a_field('donar_info','ledger_id','donar_name like "'.$donar_name.'"');



   if($ledger_id =='' || $ledger_id==0){

   

   

   $ledger = $conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`,`head_type`,`group_for`) VALUES ('".$donar_name."', '1003','Loan','".$_SESSION['group_for']."')"); 

  $ledger_id = mysqli_insert_id($conn);

  

   $insert = $conn->query("insert into donar_info(`donar_name`,`group_for`,`ledger_id`,`donar_type`) values('".$donar_name."','".$_SESSION['group_for']."' ,'".$ledger_id."' , 'Give Loan')");

   $r_dealer = mysqli_insert_id($conn);

   }

$max_jv = find_a_field('journal','max(jv_no)+1','1');
if($max_jv==''){

$max_jv = date('Y-m-d');

}

if($_POST['type'] =="Loan Take"){

 $tr_from = 'Give Loan';

 

 

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '".$ledger_id."', '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`cr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '1000007' , '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_cr);



}else{

 $tr_from = 'Give Loan';

 

 

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '".$ledger_id."', '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`cr_amt`, `tr_from`,`entry_by`,`group_for`,`narration`,`money_receipt`) VALUES ('".$max_jv."','".$jv_date."', '1000007', '".$amount."','".$tr_from."','".$entry_by."','".$_SESSION['group_for']."','".$details."','".$details."')";



$journal_insert_dr = $conn->query($rcv_cr);

 }





 }















if(isset($_POST['collection_update'])&&$_POST['id']>0){











    $donar_name = $_POST['donar_name'];

   $collection_date = $_POST['collection_date'];



   $details = $_POST['details'];

   $tr_from = 'Loan';

   $jv_date = $_POST['collection_date'];

   $amount = $_POST['amount'];

  // if($_POST['due']>0){ $status ='Received';}else{ $status = 'Advance'; }

   $entry_by = $_SESSION['user_id'];

   //$max_jv = find_a_field('journal','max(jv_no)','1')+1;

   

   

 	$ledger_id = find_a_field('donar_info','ledger_id','donar_name like "'.$donar_name.'"');



   if($ledger_id =='' || $ledger_id==0){

   

   $ledger = $conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`,`head_type`,`group_for`) VALUES ('".$donar_name."', '1003','Loan','".$_SESSION['group_for']."')"); 

   $ledger_id = mysqli_insert_id($conn);

  

   $insert = $conn->query("insert into donar_info(`donar_name`,`group_for`,`ledger_id`) values('".$donar_name."','".$_SESSION['group_for']."' ,'".$ledger_id."')");

   $r_dealer = mysqli_insert_id($conn);

   }





	if($_POST['tr_from'] == "Loan" || $_POST['tr_from'] == "Loan Receive"){ 	

	$msg = $rcv_dr = "UPDATE `loan_history` set jv_no = '".$max_jv."', jv_date = '".$jv_date."', donar_id = '".$r_dealer."', loan_amt = '".$amount."', entry_by = '".$entry_by."', narration = '".$details."', money_receipt = '".$details."' where id = ".$_POST['id'];



	$journal_insert_dr =$conn->query($rcv_dr);



	}else{



	$msg = $rcv_dr = "UPDATE `loan_history` set jv_no = '".$max_jv."', jv_date = '".$jv_date."', donar_id = '".$r_dealer."', paid_amt = '".$amount."', entry_by = '".$entry_by."', narration = '".$details."', money_receipt = '".$details."' where id = ".$_POST['id'];



	$journal_insert_dr =$conn->query($rcv_dr);



	}



	if($journal_insert_dr){



		$msg = "Successfully Updated !";



	}	



}



if(isset($_POST['collection_delete'])&&$_POST['id']>0){

	$del = "DELETE FROM loan_history WHERE id = ".$_POST['id']."";



	$delCon = $conn->query($del); 

	if($delCon){



		$msg = "Successfully Deleted !";



	}



}



?>



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

  0% { -webkit-transform: rotate(0deg); }

  100% { -webkit-transform: rotate(360deg); }

}



@keyframes spin {

  0% { transform: rotate(0deg); }

  100% { transform: rotate(360deg); }



}

</style>

		<div class="main-panel">

			<div class="content">

                     <div class="row">







						<div class="col-md-12">



                          



							 <div class="card">



							 <div class="card-header">



						<div class="row">



						    <div class="col-md-6">	 



									<div class="d-flex align-items-right">



										<h4 class="card-title"><?=$msg?></h4>



									</div>	



							</div>				



                            <div class="col-md-6 align-items-right">



										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#withoutSales">



											(<i class="fa fa-plus"></i>) Loan Receive



										</button>



										



										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#LoanReturn">



										(<i class="fa fa-minus"></i>) Loan Give </button>

										

										

										

										



                            </div>



									</div>







								</div>



							</div>	



								<div class="card-body">

									<div class="table-responsive">



										<table id="add-row" class="display table table-striped table-hover" >



											<thead>

												<tr>

													<th>SL</th>

													<th>Donar  Name</th>

													<th>Date</th>

													<th>Narration</th>

													<th>Transaction type</th>

													<th>Amount</th>

													<th style="width: 10%">Action</th>

												</tr>

											</thead>



											<tbody>

											<?php

											   $sql = "select l.id, l.jv_date , l.narration , l.tr_from, sum(dr_amt-cr_amt) as total, d.ledger_name as donar_name,d.ledger_id from journal l, ledger d where l.ledger_id !=1000007 and l.ledger_id=d.ledger_id and tr_from like 'Give Loan' GROUP BY l.ledger_id order by l.id desc ";



											  $select =$conn->query($sql); $i=1;

											 while($c_data = $select->fetch_assoc()){ 



                                                if($c_data['tr_from']=="Give Loan" || $c_data['tr_from']=="Loan Receive"){



													$total_amt = $c_data['total'];



												}else{



													$total_amt = $c_data['paid_amt'];



												}



											 ?>


												<tr>

												    <td><?=$i++;?></td>
													<td><?=$c_data['donar_name'];?></td>

													<td><?=date('d-m-Y',strtotime($c_data['jv_date']));?></td>

													<td><?=$c_data['narration']?></td>

													<td><?=$c_data['tr_from']?></td>
													<td><?=$total_amt?></td>







													<td><!--<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#edit_collection<?=$c_data['id']?>">

											              <i class="fa fa-edit"></i>

											                   Edit Loan

										                </button>-->

									<form method="post" enctype="multipart/form-data">	

									  <div class="modal fade" id="edit_collection<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">

										<div class="modal-dialog  modal-lg" role="document">

											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">







														<span class="fw-mediumbold">Loan </span> 







														<span class="fw-light">Modify </span>







													</h5>







													<button type="button" class="close" data-dismiss="modal" aria-label="Close">







														<span aria-hidden="true">&times;</span>







													</button>







												</div>







												







												<div class="modal-body">







												







													<p class="small">* Mendatory Field</p>







													







														<div class="row">







															<div class="col-sm-4">







																<div class="form-group form-group-default">



																   <input type="hidden" name="id"  id="id"  class="form-control" value="<?php echo $c_data['id']; ?>" required>



																    <input type="hidden" name="tr_from"  id="tr_from"  class="form-control" value="<?php echo $c_data['tr_from']; ?>" required>







																	<label>Donar <span style="color:#FF0000; font-size:15px;">*</span></label>







																	



																	



																	<input type="text" name="donar_name" value="<?=$c_data['donar_name']?>" onblur="pay()"  autocomplete="off" list="partylist" class="form-control form-control-sm" id="donar_name"  />







													               <datalist id="partylist">







																	 <? 







																	  $s = $conn->query("select donar_name from donar_info where group_for = '".$_SESSION['group_for']."' ");







																	  while($dealer = $s->fetch_assoc()){







																	 ?>







                                                                        <option value="<?=$dealer['donar_name']?>">







                                                                       <? } ?>







                                                                     </datalist>







																</div>







															</div>







															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Date <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="date" name="collection_date"  id="collection_date"  class="form-control" value="<?php echo $c_data['jv_date']; ?>" required>



																</div>



															</div>







															<div class="col-sm-2">



																<div class="form-group form-group-default">



																	<label>Amount Tk<span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="amount" onblur="paycal()" id="amount"  class="form-control" value="<?=$total_amt;?>" style="font-size:15px; font-weight:bold;" required>



																</div>



															</div>



															



															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Details/Money receipt<span style="color:#FF0000; font-size:15px;"></span></label>



																	<input type="text" name="details"  id="details"  class="form-control" value="<?=$c_data['narration']?>" style="font-size:15px; font-weight:bold;" >



																</div>



															</div>







															<div class="col-6">



																<div class="form-group form-group-default">



																	<label>In word : <span id="words"></span></label>



																</div>



															</div>







															<div class="col-3">



															</div>







															<div class="col-3">



															</div>







														</div>







													







												</div>







												<div class="modal-footer">







                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>







                    <input type="submit" value="Update" name="collection_update" id="collection_update" class="btn btn-primary">



					



					<input type="submit" value="Delete" name="collection_delete" id="collection_delete" class="btn btn-danger">







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







									<div class="modal fade" id="withoutSales" tabindex="-1" role="dialog" aria-hidden="true">







										<div class="modal-dialog  modal-lg" role="document">







											<div class="modal-content">







												<div class="modal-header no-bd">







													<h5 class="modal-title">







														<span class="fw-mediumbold">Loan </span> 







														<span class="fw-light">Entry </span>







													</h5>







													<button type="button" class="close" data-dismiss="modal" aria-label="Close">







														<span aria-hidden="true">&times;</span>







													</button>







												</div>







												







												<div class="modal-body">







												







													<p class="small">* Mendatory Field</p>







													<div class="row">

														<div col-sm-4>

															<label>Type <span style="color:#FF0000; font-size:15px;">*</span></label>

															<select name="type" class="form-control" >

																<option value="Loan Receive">Loan Receive</option>

																

															</select>

														</div>

													</div>







														<div class="row">







															<div class="col-sm-4">







																<div class="form-group form-group-default">







																	<label>Donar <span style="color:#FF0000; font-size:15px;">*</span></label>

																	<input type="text" name="donar_name" onblur="pay()"  autocomplete="off" list="partylist" class="form-control form-control-sm" id="donar_name2"  />







													               <datalist id="partylist">







																	 <? 







																	  $s = $conn->query("select donar_name from donar_info where group_for = '".$_SESSION['group_for']."' ");







																	  while($dealer = $s->fetch_assoc()){







																	 ?>







                                                                        <option value="<?=$dealer['donar_name']?>">







                                                                       <? } ?>







                                                                     </datalist>







																</div>







															</div>







															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Date <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="date" name="collection_date"  id="collection_date"  class="form-control" value="<?php echo date('Y-m-d'); ?>" required>



																</div>



															</div>







															<div class="col-sm-2">



																<div class="form-group form-group-default">



																	<label>Amount Tk<span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="amount" onblur="paycal()" onkeyup="amtWord(this.value)" id="amount_loan"  class="form-control" value="" style="font-size:15px; font-weight:bold;" required>



																</div>



															</div>



															



															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Details/Money receipt<span style="color:#FF0000; font-size:15px;"></span></label>



																	<input type="text" name="details"  id="details"  class="form-control" value="" style="font-size:15px; font-weight:bold;" >



																</div>



															</div>







															<div class="col-6">



																<div class="form-group form-group-default">



																	<label>In word : <span id="words1"></span></label>



																</div>



															</div>







															<div class="col-3">



																<div class="form-group form-group-default">



																	<label>Due </label>



																	<input type="text" name="due"  id="due"  class="form-control" value="" readonly="" style="font-size:15px; font-weight:bold;" >



																</div>



															</div>







															<div class="col-3">



															</div>







														</div>







													







												</div>







												<div class="modal-footer">







                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>







                    <input type="submit" name="loan_return" id="loan_return" class="btn btn-primary">







                </div>







											</div>







										</div>







									</div>







									<!--For Without Sales Collection-->







								</form>



								



								



			<!-------------  Loan Return -------------------------->



			



			<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">	







									<div class="modal fade" id="LoanReturn" tabindex="-1" role="dialog" aria-hidden="true">







										<div class="modal-dialog  modal-lg" role="document">







											<div class="modal-content">







												<div class="modal-header no-bd">







													<h5 class="modal-title">







														<span class="fw-mediumbold">Loan Return</span> 







														<span class="fw-light">Entry </span>







													</h5>







													<button type="button" class="close" data-dismiss="modal" aria-label="Close">







														<span aria-hidden="true">&times;</span>







													</button>







												</div>







												







												<div class="modal-body">







												







													<p class="small">* Mendatory Field</p>

													

														<div class="row">

														<div col-sm-4>

															<label>Type <span style="color:#FF0000; font-size:15px;">*</span></label>
														    <select name="type1" id="type1" class="form-control" >
                                                              <option value="Loan Give">Loan Give</option>
                                                            </select>
														</div>

													</div>



														<div class="row">



															<div class="col-sm-4">



																<div class="form-group form-group-default">



																	<label>Donar <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="donar_name" onblur="pay2()"  autocomplete="off" list="partylist" class="form-control form-control-sm" id="donar_name1"  />



													               <datalist id="partylist">







																	 <? 







																	  $s = $conn->query("select donar_name from donar_info where group_for = '".$_SESSION['group_for']."' ");







																	  while($dealer = $s->fetch_assoc()){







																	 ?>







                                                                        <option value="<?=$dealer['donar_name']?>">







                                                                       <? } ?>







                                                                     </datalist>







																</div>







															</div>







															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Date <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="date" name="collection_date"  id="collection_date"  class="form-control" value="<?php echo date('Y-m-d'); ?>" required>



																</div>



															</div>







															<div class="col-sm-2">



																<div class="form-group form-group-default">



																	<label>Amount Tk<span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="amount" onkeyup="amtWord1(this.value)"  onblur="paycal()" id="amount_return"  class="form-control" value="" style="font-size:15px; font-weight:bold;" required>



																</div>



															</div>



															



															<div class="col-sm-3">



																<div class="form-group form-group-default">



																	<label>Details<span style="color:#FF0000; font-size:15px;"></span></label>



																	<input type="text" name="details"  id="details"  class="form-control" value="" style="font-size:15px; font-weight:bold;" >



																</div>



															</div>







															<div class="col-6">



																<div class="form-group form-group-default">



																	<label>In word : <span id="words2"></span></label>



																</div>



															</div>







															<div class="col-3">



																<div class="form-group form-group-default">



																	<label>Due </label>



																	<input type="text" name="due"  id="due1"  class="form-control" value="" readonly="" style="font-size:15px; font-weight:bold;" >



																</div>



															</div>







															<div class="col-3">



															</div>







														</div>







													







												</div>







												<div class="modal-footer">







                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>







                    <input type="submit" name="advance_collect" id="advance_collect" class="btn btn-primary">







                </div>







											</div>







										</div>







									</div>







									<!--For Without Sales Collection-->







								</form>



			



			



			<!------------- Loan Return End-------------->					







															







															<!--edit modal end-->







															



		



															







															







															







														</div>







													







									</div>







								</div>







							</div>







						</div>







					</div>







<script>















// actual  conversion code starts here































function pay(){



		var cust = $("#donar_name2").val();



		$("#due").val("0");



		$("#due1").val(" ");







		$.ajax({



		url: "loan_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
		c_no: cust,
		tr_from: "Loan Give"

		},







		success: function(data){



		$("#due").val(data.due);



		$("#load").attr("style","display:none");



		}







		})



}







function pay2(){



		var cust = $("#donar_name1").val();
		$("#due").val("");
		$("#due1").val("");



		$.ajax({
		url: "loan_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
		c_no: cust,
		tr_from: "Give Loan"
		},


		success: function(data){
		$("#due1").val(data.due);
		$("#load").attr("style","display:none");
		}

		})
}


function pay_update(){
//$(document).ready(function() {

		$.ajax({







		url: "collection_update_ajax.php",







		method: "POST",







		dataType:"json",







		data:{







		c_no: $("#party_name_update").val(),







		c_type: $("#customer_type_update").val()







		},







		success: function(data){















		$("#due_update").val(data.c_info.total_amt);







		$("#party_update").val(data.c_info.business_name);







		$("#load").attr("style","display:none");







		$("#partylist_update").html(data.c_list);







		







		}







		})







		







		







//});







}















function paycal(){ 















var sales_amount = (document.getElementById('amount').value)*1;







var discount = (document.getElementById('discount').value)*1;















var due = sales_amount-discount;







document.getElementById('final_amt').value = due.toFixed(2);







document.getElementById('words').innerHTML = inWords(parseInt(document.getElementById('final_amt').value));







}







function paycal_update(){ 















var sales_amount = (document.getElementById('payment_amt').value)*1;







var discount = (document.getElementById('discount_update').value)*1;















var due = sales_amount-discount;







document.getElementById('final_amt_update').value = due.toFixed(2);







document.getElementById('words_update').innerHTML = inWords(parseInt(document.getElementById('final_amt_update').value));







}















//window.onload = paycal_update;























var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];







var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];















function inWords(num){







    if ((num = num.toString()).length > 9) return 'overflow';







    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);







    if (!n) return; var str = '';







    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';







    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';







    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';







    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';







    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'taka only ' : '';







    return str;







}















































 document.getElementById('payment_amt').onkeyup = function () { 







 document.getElementById('words_update').innerHTML = inWords(parseInt(document.getElementById('payment_amt').value));







};







function amtWord(val) { 



 document.getElementById('words1').innerHTML = inWords(parseInt(val));



};







function amtWord1(val) { 



 document.getElementById('words2').innerHTML = inWords(parseInt(val));



};







</script>















<?php include('../template/footer.php');?>