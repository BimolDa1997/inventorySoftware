<?php 



$page_name="suppliers";  



include ('../common/library.php');



include ('../common/helper.php');  



include ('../template/header.php'); 



include ('../template/sidebar.php');







if(isset($_POST['save'])){



  $supplier_name = $_POST['supplier_name'];



  $address = $_POST['address'];



  $phone_no = $_POST['phone_no'];



  $status = $_POST['status'];



  $group_for = $_POST['group_for'];



  $entry_by = $_SESSION['user_id'];

  

   $due = $_POST['previous_due'];

   

    $advance = $_POST['advance'];



  



  $ledger_group = 1003; //liabilities



  $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`, `group_for`) VALUES ('".$supplier_name."', '".$ledger_group."', '".$group_for."')"); 



  $ledger_id = mysqli_insert_id($conn);



 



  $insert =$conn->query("insert into supplier_info(`supplier_name`,`address`,`phone_no`,`group_for`,`status`,`entry_by`,`ledger_id`,previous_due,advance) Values('".$supplier_name."','".$address."','".$phone_no."','".$group_for."','".$status."','".$entry_by."','".$ledger_id."','".$due."','".$advance."')");



  if($insert==true)



  {



  $insert_id = mysqli_insert_id($conn);

  

  

  

  //<!--Update Journal Table-->

  

  

   if($due>0){



$max_jv = find_a_field('journal','max(jv_no)','1');

$advance=0;

$tr_from = 'Opening due';



$cr_ledger = 1000005;



$jv_date = date('Y-m-d');



$status = 'Paid';



$entry_by = $_SESSION['user_id'];;




if($max_jv=='' || $max_jv==0){



$max_jv = date('Ymd');



}else{



$max_jv = $max_jv+1; 



}



    



echo $rcv_dr1 = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$due."',0,'".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";



$journal_insert_dr1 =$conn->query($rcv_dr1);







$msg = $rcv_cr1 = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$due."','".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";



$journal_insert_cr1 =$conn->query($rcv_cr1); 



	



  }



  echo $advance;



  if($advance>0){



  



$max_jv = find_a_field('journal','max(jv_no)','1');



$tr_from = 'Opening';



$cr_ledger = 1000005;



$jv_date = date('Y-m-d');



$status = 'Paid';



$entry_by = '';











if($max_jv=='' || $max_jv==0){



$max_jv = date('Ymd');



}else{



$max_jv = $max_jv+1;



}



    



echo $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$advance."',0,'".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";



$journal_insert_dr =$conn->query($rcv_dr);







echo $rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`, `group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$advance."','".$tr_from."','".$insert_id."', '".$group_for."','".$status."','".$entry_by."')";



$journal_insert_cr =$conn->query($rcv_cr); 



	



  }

  

  



 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/



 







 



 // $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Item Successfully Inserted.</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}











if(isset($_POST['update'])){



    







  







  $update_id = $_POST['update_id'];



  $supplier_name = $_POST['supplier_name'];



  $address = $_POST['address'];



  $phone_no = $_POST['phone_no'];



  $status = $_POST['status'];



  $group_for = $_POST['group_for'];

  

   $due = $_POST['previous_due'];

   

    $advance = $_POST['advance'];



  $updated_by = $_SESSION['user_id'];



  $timeNow    = date("Y-m-d H:i:s");;



  



  



  if($update_id>0){



  



  



  $update = $conn->query("update supplier_info set supplier_name='".$supplier_name."',address='".$address."',phone_no='".$phone_no."',previous_due='".$due."',advance='".$advance."',status='".$status."',group_for='".$group_for."',updated_by='".$updated_by."',updated_at='".$timeNow."' where id='".$update_id."'");



  }



  



  if($update==true)



  {







$insert_id = $update_id;



  $ledger = find_a_field('supplier_info','ledger_id','id="'.$update_id.'"');



  $found_opening = find_a_field('journal','jv_no','ledger_id="'.$ledger.'" and tr_from="Opening"');

  

  

   if($ledger>0){



    $del = $conn->query("delete from journal where jv_no='".$found_opening."' and tr_from='Opening'");



	$max_jv = find_a_field('journal','max(jv_no)','1');



    $tr_from = 'Opening';



    $cr_ledger = 1000005;



    $jv_date = date('Y-m-d');



    $status = 'Paid';



    $entry_by = $_SESSION['user_id'];;



	if($max_jv=='' || $max_jv==0){



    $max_jv = date('Ymd');



    }else{



    $max_jv = $max_jv+1; 



    }



	



	if($due>0){







 $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$due."',0,'".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";



$journal_insert_dr =$conn->query($rcv_dr);







$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger."',0'".$due."',,'".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";



$journal_insert_cr =$conn->query($rcv_cr); 



	



  }



  



  if($advance>0){



   



$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$advance."','".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";



$journal_insert_dr =$conn->query($rcv_dr);







$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`group_for`,`status`,`entry_by`) VALUES ('".$max_jv."','".$jv_date."','".$ledger."','".$advance."',0,'".$tr_from."','".$insert_id."','".$group_for."','".$status."','".$entry_by."')";



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

 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/







  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Item Successfully Updated.</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}











if(isset($_POST['delete'])){







  $delete_id  = $_POST['delete_id'];







  



  if($delete_id>0){



  $update = $conn->query("DELETE FROM `supplier_info` WHERE id='".$delete_id."'");



  }



  



  if($update==true)



  {



 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">supplier Successfully Deleted.</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }



}







?>







		



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



														Item</span> 



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



																	<label>Supplier Name <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="supplier_name"  id="supplier_name"  class="form-control" placeholder="Supplier Name" required>



																</div>



															</div>



															<div class="col-sm-12">



																<div class="form-group form-group-default">



																	<label>Address <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="address"  id="address"  class="form-control" placeholder="Address">



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

															

															

															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Previous Due. <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="previous_due"  id="previous_due"  class="form-control" placeholder="Previous Due">



																	



																</div>



															</div>

															

															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Advance <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="advance"  id="advance"  class="form-control" placeholder="Advance">



																	



																</div>



															</div>



															<div class="col-md-6 pr-0">



																<div class="form-group form-group-default">



																	<label>Phone no. <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="phone_no"  id="phone_no"  class="form-control" placeholder="phone no">



																	



																</div>



															</div>



															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Staus</label>



																	<select name="status" id="status" class="form-control">



																	 <option value="Active">Active</option>



																	 <option value="Inactive">Inactive</option>



																	</select>



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



													<th>Sl</th>



													<th>Supplier Name</th>



													<th>Address</th>



													<th>Company name</th>



													<th>Phone No</th>



													<th>Status</th>



													<th style="width:10%">Action</th>



												</tr>



											</thead>



											<tfoot>



											      <tr>



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



											  $select =$conn->query("select * from supplier_info where 1 ");



											  $i=1;



											 while($c_data = $select->fetch_assoc()){ ?>







												<tr>



												    <td><?=$i++;?></td>



													<td><?=$c_data['supplier_name']?></td>



													<td><?=$c_data['address']?></td>



													<td><?=find_a_field('company_info','company_name','id='.$c_data['group_for']);?></td>



													<td><?=$c_data['phone_no'];?></td>



													<td><?=$c_data['status']?></td>



													<td>



														<div class="form-button-action">



															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">



																<i class="fa fa-edit"></i>



															</button>



															



							<!--- edit modal -->			



								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			



									<div class="modal fade" id="editRowModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">



										<div class="modal-dialog" role="document">



											<div class="modal-content">



												<div class="modal-header no-bd">



													<h5 class="modal-title">



														<span class="fw-mediumbold">



														Supplier </span> 



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



															



															<input type="hidden" name="update_id"  id="update_id"  class="form-control" value="<?=$c_data['id']?>" readonly="readonly" required>



																



															<div class="col-sm-12">



																<div class="form-group form-group-default">



																	<label>Supplier Name <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="supplier_name"  id="supplier_name"  class="form-control" value="<?=$c_data['supplier_name']?>" required>



																</div>



															</div>



															<div class="col-sm-12">



																<div class="form-group form-group-default">



																	<label>address <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="address"  id="address"  class="form-control" value="<?=$c_data['address']?>">



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

															

															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Previous Due <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="previous_due"  id="previous_due"  class="form-control" value="<?=$c_data['previous_due']?>">



																</div>



															</div>

															

															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Advance <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="advance"  id="advance"  class="form-control" value="<?=$c_data['advance']?>">



																</div>



															</div>



															<div class="col-md-6 pr-0">



																<div class="form-group form-group-default">



																	<label>Phone no. <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="phone_no"  id="phone_no"  class="form-control" value="<?=$c_data['phone_no']?>">



																</div>



															</div>



															<div class="col-md-6">



																<div class="form-group form-group-default">



																	<label>Staus</label>



																	<select name="status" id="status" class="form-control">



																	 <option <?=($c_data['status']=="Active")? "selected" : ""?> value="Active">Active</option>



																	 <option <?=($c_data['status']=="Inactive")? "selected" : ""?> value="Inactive">Inactive</option>



																	 



																	</select>



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



															



															<button type="button" data-toggle="modal" data-target="#viewModal<?=$c_data['id']?>" title="" class="btn btn-link btn-danger" data-original-title="Remove">



																<i class="fa fa-times"></i>



															</button>



															



															



	<!--delete modal -->	



  <form action="" method="post">				



	<div class="modal fade show" id="viewModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-labelledby=""aria-modal="true">



        <div class="modal-dialog modal-dialog-centered">



		 



            <div class="modal-content">



                <div class="modal-header">



                    <h5 class="modal-title" id="exampleModalLongTitle">User Information</h5>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                        <span aria-hidden="true">×</span>



                    </button>



                </div>



                <div class="modal-body">







                   Do you want to delete this?



                        



                    



                </div>



                <div class="modal-footer">



				    <input type="hidden" name="delete_id" value="<?=$c_data['id']?>"  />



                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>



                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>



                </div>



            </div>



		 	



        </div>



    </div>



</form>	



	<!--delete modal End-->														



															



															



															



															



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