<?php 
$page_name="customer_setup";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
$page_name='customer_setup';

if(isset($_POST['save'])){
  $business_name = $_POST['business_name'];
  $propritor_name = $_POST['propritor_name'];
  $mobile_no = $_POST['mobile_no'];
  $customer_address = $_POST['customer_address'];
  $credit_limit = $_POST['credit_limit'];
  $previous_due = $_POST['previous_due'];
  $previous_advance = $_POST['previous_advance'];
  $group_for = $_POST['group_for'];
  $entry_by = $_SESSION['user_id'];
  $ledger_group = 1001; //income
  $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`, `group_for`) VALUES ('".$business_name."', '".$ledger_group."', '".$group_for."')"); 
  $ledger_id = mysqli_insert_id($conn);
  
  $insert =$conn->query("insert into customer_info(`business_name`,`propritor_name`,`mobile_no`,`customer_address`,`ledger_id`,`credit_limit`,`entry_by`,`customer_type`,`previous_due`,`previous_advance`, `group_for`) Values('".$business_name."','".$propritor_name."','".$mobile_no."','".$customer_address."','".$ledger_id."','".$credit_limit."','". $entry_by."','Registered','".$previous_due."','".$previous_advance."', '".$group_for."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  
  if($previous_due>0){
$max_jv = find_a_field('journal','max(jv_no)','1');
$tr_from = 'Opening';
$cr_ledger = 1000002;
$jv_date = date('Y-m-d');
$status = 'Paid';
$entry_by = '';


if($max_jv=='' || $max_jv==0){
$max_jv = date('Ymd');
}else{
$max_jv = $max_jv+1; 
}
    
$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$previous_due."','".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";
$journal_insert_dr =$conn->query($rcv_dr);

$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."','".$previous_due."',0,'".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";
$journal_insert_cr =$conn->query($rcv_cr); 
	
  }
  
  if($previous_advance>0){
  
$max_jv = find_a_field('journal','max(jv_no)','1');
$tr_from = 'Opening';
$cr_ledger = 1000002;
$jv_date = date('Y-m-d');
$status = 'Paid';
$entry_by = '';


if($max_jv=='' || $max_jv==0){
$max_jv = date('Ymd');
}else{
$max_jv = $max_jv+1;
}
    
$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$previous_advance."',0,'".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";
$journal_insert_dr =$conn->query($rcv_dr);

$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$previous_advance."','".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";
$journal_insert_cr =$conn->query($rcv_cr); 
	
  }
  
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['c_photo']['name']!=''){
$target_dir = "../files/customer/pic/";
$target_file = $target_dir . basename($_FILES["c_photo"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["c_photo"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["c_photo"]["tmp_name"], $target_dir.$file_name); 
$pic_update = $conn->query("update customer_info set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//photo end
 
//nid Start
if($_FILES['c_nid']['name']!=''){
$target_dir = "../files/customer/nid/";
$target_file = $target_dir . basename($_FILES["c_nid"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["c_nid"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["c_nid"]["tmp_name"], $target_dir.$file_name);
$nid_update = $conn->query("update customer_info set nid='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//nid end

//form Start
if($_FILES['c_form']['name']!=''){
$target_dir = "../files/customer/form/";
$target_file = $target_dir . basename($_FILES["c_form"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["c_form"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["c_form"]["tmp_name"], $target_dir.$file_name); 
$form_update = $conn->query("update customer_info set form='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//form end

//check Start
if($_FILES['c_check']['name']!=''){
$target_dir = "../files/customer/check/";
$target_file = $target_dir . basename($_FILES["c_check"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["c_check"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["c_check"]["tmp_name"], $target_dir.$file_name); 
$check_update = $conn->query("update customer_info set check_file='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//check end
 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Customer Successfully Registered.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $business_name = $_POST['business_name1'];
  $propritor_name = $_POST['propritor_name1'];
  $mobile_no = $_POST['mobile_no1'];
  $customer_address = $_POST['customer_address1'];
  $credit_limit = $_POST['credit_limit1'];
  $previous_due = $_POST['previous_due1'];
  $previous_advance = $_POST['previous_advance1'];
  $group_for = $_POST['group_for'];
  $entry_by = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update customer_info set business_name='".$business_name."',propritor_name='".$propritor_name."',mobile_no='".$mobile_no."',customer_address='".$customer_address."',credit_limit='".$credit_limit."',entry_by='".$entry_by."',previous_due='".$previous_due."',previous_advance='".$previous_advance."',group_for='".$group_for."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  $ledger = find_a_field('customer_info','ledger_id','id="'.$update_id.'"');
  $found_opening = find_a_field('journal','jv_no','ledger_id="'.$ledger.'" and tr_from="Opening"');
  
  if($found_opening>0){
    $del = $conn->query("delete from journal where jv_no='".$found_opening."' and tr_from='Opening'");
	$max_jv = find_a_field('journal','max(jv_no)','1');
    $tr_from = 'Opening';
    $cr_ledger = 1000002;
    $jv_date = date('Y-m-d');
    $status = 'Paid';
    $entry_by = '';
	if($max_jv=='' || $max_jv==0){
    $max_jv = date('Ymd');
    }else{
    $max_jv = $max_jv+1; 
    }
	
	if($previous_due>0){

$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$previous_due."','".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";
$journal_insert_dr =$conn->query($rcv_dr);

$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger."','".$previous_due."',0,'".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";
$journal_insert_cr =$conn->query($rcv_cr); 
	
  }
  
  if($previous_advance>0){
   
$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$previous_advance."',0,'".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";
$journal_insert_dr =$conn->query($rcv_dr);

$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger."',0,'".$previous_advance."','".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";
$journal_insert_cr =$conn->query($rcv_cr); 
	
  }
     /*if($previous_due>0){
	echo $sql = "update journal set dr_amt='".$previous_due."',cr_amt=0 where jv_no='".$found_opening."' and tr_from='Opening' and dr_amt>0";
    $up = $conn->query("update journal set dr_amt='".$previous_due."',cr_amt=0 where jv_no='".$found_opening."' and tr_from='Opening' and dr_amt>0");
	$up = $conn->query("update journal set dr_amt=0,cr_amt='".$previous_due."' where jv_no='".$found_opening."' and tr_from='Opening' and cr_amt>0");
	}elseif($previous_advance>0){
	$up = $conn->query("update journal set dr_amt=0,cr_amt='".$previous_advance."' where jv_no='".$found_opening."' and tr_from='Opening' and cr_amt>0");
	$up = $conn->query("update journal set dr_amt='".$previous_advance."',cr_amt=0 where jv_no='".$found_opening."' and tr_from='Opening' and dr_amt>0");
	}*/
  }
  //photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/customer/pic/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["pic"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$file_name); 
$pic_update = $conn->query("update customer_info set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//photo end
 
//nid Start
if($_FILES['nid']['name']!=''){
$target_dir = "../files/customer/nid/";
$target_file = $target_dir . basename($_FILES["nid"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["nid"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["nid"]["tmp_name"], $target_dir.$file_name);
$nid_update = $conn->query("update customer_info set nid='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//nid end

//form Start
if($_FILES['form_file']['name']!=''){
$target_dir = "../files/customer/form/";
$target_file = $target_dir . basename($_FILES["form_file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["form_file"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["form_file"]["tmp_name"], $target_dir.$file_name); 
$form_update = $conn->query("update customer_info set form='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//form end

//check Start
if($_FILES['check_file']['name']!=''){
$target_dir = "../files/customer/check/";
$target_file = $target_dir . basename($_FILES["check_file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["check_file"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["check_file"]["tmp_name"], $target_dir.$file_name); 
$check_update = $conn->query("update customer_info set check_file='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//check end
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Customer Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}
/*while($c_data = $select->fetch_assoc()){
 $p++;
 $code[$p] = $c_data['id'];
 $business_name[$p] = $c_data['business_name'];
 $propritor_name[$p] = $c_data['propritor_name'];
 $mobile_no[$p] = $c_data['mobile_no'];
 $credit_limit[$p] = $c_data['credit_limit'];
 $entry_by[$p] = $c_data['entry_by'];
} 
*/ ?>

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add New
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Customer</span> 
														<span class="fw-light">
															Information
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Make Sure Fillup All Field</p>
													
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Business Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="business_name"  id="business_name"  class="form-control" placeholder="Business Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Propritor Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="propritor_name"  id="propritor_name"  class="form-control" placeholder="Propritor Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="customer_address"  id="customer_address"  class="form-control" placeholder="Address" required>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group form-group-default">
																	<label>Company name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="group_for" id="group_for" class="form-control" required>
																	  <?php foreign_relation('company_info','id','company_name','','1 and status ="Active"');?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Mobile No. <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="mobile_no" id="mobile_no" type="text" class="form-control" placeholder="Mobile No." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Credit limit</label>
																	<input name="credit_limit" id="credit_limit" type="text" class="form-control" placeholder="Credit Limit">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Previous Due</label>
																	<input name="previous_due" id="previous_due" type="text" class="form-control" placeholder="Previous Due">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Previous Advance</label>
																	<input name="previous_advance" id="previous_advance" type="text" class="form-control" placeholder="Previous Advance">
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Photo</label>
																	<input name="c_photo" id="c_photo" type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add NID</label>
																	<input name="c_nid" id="c_nid" type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Form</label>
																	<input name="c_form" id="c_form" type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Check</label>
																	<input name="c_check" id="c_check" type="file" class="form-control">
																</div>
															</div>
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<!--<button type="button" id="addRowButton" class="btn btn-primary">Add</button>-->
													<input type="submit" name="save" id="addRowButton" value="Add" class="btn btn-primary" />
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								  </form>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Code</th>
													<th>Business Name</th>
													<th>Propritor Name</th>
													<th>Company Name</th>
													<th>Address</th>
													<th>Mobile No.</th>
													<th>Credit Limit</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
											<tbody>
											<?php
											  $select =$conn->query("select * from customer_info where 1 and status='Active'");
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$c_data['id']?></td>
													<td><?=$c_data['business_name']?></td>
													<td><?=$c_data['propritor_name']?></td>
													<td><?=find_a_field('company_info','company_name','id='.$c_data['group_for']);?></td>
													<td><?=$c_data['customer_address']?></td>
													<td><?=$c_data['mobile_no']?></td>
													<td><?=$c_data['credit_limit']?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Customer </span> 
														<span class="fw-light">
															Information
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Make Sure Fillup All Field</p>
													
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Business Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" name="business_name1"  id="business_name1" value="<?=$c_data['business_name']?>"  class="form-control" placeholder="Business Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Propritor Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="propritor_name1"  id="propritor_name1" value="<?=$c_data['propritor_name']?>"  class="form-control" placeholder="Propritor Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="customer_address1"  id="customer_address1" value="<?=$c_data['customer_address']?>"  class="form-control" placeholder="Address" required>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group form-group-default">
																	<label>Company name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="group_for" id="group_for" class="form-control" required>
																	  <?php foreign_relation('company_info','id','company_name',$c_data['group_for'],'1 and status ="Active"');?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Mobile No. <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="mobile_no1" id="mobile_no1" type="text" value="<?=$c_data['mobile_no']?>" class="form-control" placeholder="Mobile No." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Credit limit</label>
																	<input name="credit_limit1" id="credit_limit1" value="<?=$c_data['credit_limit']?>" type="text" class="form-control" placeholder="Credit Limit">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Previous Due</label>
																	<input name="previous_due1" id="previous_due1" value="<?=$c_data['previous_due']?>" type="text" class="form-control" placeholder="Previous Due">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Previous Advance</label>
																	<input name="previous_advance1" id="previous_advance1" value="<?=$c_data['previous_advance']?>" type="text" class="form-control" placeholder="Previous Advance">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Photo</label>
																	<input name="pic" id="pic"  type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<img src="<?=$c_data['pic']?>" style=" width:100%; height:100px;">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>NID</label>
																	<input name="nid" id="nid"  type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<img src="<?=$c_data['nid']?>" style=" width:100%; height:100px;">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Form</label>
																	<input name="form_file" id="form_file"  type="file" class="form-control">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<img src="<?=$c_data['form']?>" style=" width:100%; height:100px;">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Check</label>
																	<input name="check_file" id="check_file" type="file" class="form-control" >
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<img src="<?=$c_data['check_file']?>" style=" width:100%; height:100px;">
																</div>
															</div>
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<!--<button type="button" id="addRowButton" class="btn btn-primary">Add</button>-->
													<input type="submit" name="update" id="addRowButton" value="Update" class="btn btn-primary" />
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
															
															<!--edit modal end-->
															
															
															
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
												<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>