<?php 
$page_name="company_setup"; 
include ('../common/library.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
 


if(isset($_POST['save'])){
  $company_name    = $_POST['company_name'];
  $address         = $_POST['address'];
  $contact_person  = $_POST['contact_person'];
  $title           = $_POST['title'];
  $mobile          = $_POST['mobile'];
  $note            = $_POST['note'];
  $entry_by        = $_SESSION['user_id'];
  
  $insert =$conn->query("insert into company_info(`company_name`,`address`,`contact_person`,`title`,`mobile`,`note`,`entry_by`) Values('".$company_name."','".$address."','".$contact_person."','".$title."','".$mobile."','".$note."','".$entry_by."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['c_photo']['name']!=''){
$target_dir = "../files/company/logo/";
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
}
}
//photo end

 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Company Successfully Registered.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id      = $_POST['update_id'];
  $company_name   = $_POST['company_name'];
  $address        = $_POST['address'];
  $contact_person = $_POST['contact_person'];
  $title          = $_POST['title'];
  $mobile         = $_POST['mobile'];
  $note           = $_POST['note'];
  $timeNow        = date("Y-m-d H:i:s");
  $entry_by       = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update company_info set company_name='".$company_name."',address='".$address."',contact_person='".$contact_person."',title='".$title."',mobile='".$mobile."',updated_by='".$entry_by."',updated_at='".$timeNow."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Company Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}



if(isset($_POST['delete'])){

  $delete_id  = $_POST['delete_id'];

  
  if($delete_id>0){
  $update = $conn->query("update company_info set status='Inactive' where id='".$delete_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Company Successfully Deleted.</span>';
  
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
														Company</span> 
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
																	<label>Company name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="company_name"  id="company_name"  class="form-control" placeholder="company name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="address" name="address"  id="address"  class="form-control" placeholder="address" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Contact Person</label>
																	<input name="contact_person" id="contact_person" type="text" class="form-control" placeholder="contact person">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Mobile No. <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile No." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Note</label>
																	<textarea name="note" id="note" class="form-control" placeholder="Note"></textarea>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Title <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="title"  id="title"  class="form-control" placeholder="Enter Software Title" required>
																</div>
															</div>
															
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Logo <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="c_photo" id="c_photo" type="file" required class="form-control">
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
													<th>Company Name</th>
													<th>Contact Person Name</th>
													<th>Mobile No.</th>
													<th>address</th>
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
												</tr>
											</tfoot>
											<tbody>
											<?php
											 $select =$conn->query("select * from company_info where 1 and status = 'Active'");
											 while($c_data = $select->fetch_assoc()){ ?>

												<tr>
												    <td><?=$c_data['id']?></td>
													<td><?=$c_data['company_name']?></td>
													<td><?=$c_data['contact_person']?></td>
													<td><?=$c_data['mobile']?></td>
													<td><?=$c_data['address']?></td>
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
														Company </span> 
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
																	<label>Company Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" name="company_name"  id="company_name" value="<?=$c_data['company_name']?>"  class="form-control" placeholder="company_name" required>
																</div>
															</div>
															
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="address" name="address"  id="address" value="<?=$c_data['address']?>"  class="form-control" placeholder="address" required>
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Contact Person</label>
																	<input name="contact_person" id="contact_person" value="<?=$c_data['contact_person']?>" type="contact_person" class="form-control" placeholder="contact_person">
																</div>
															</div>
															
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Mobile No. <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="mobile" id="mobile" type="text" value="<?=$c_data['mobile']?>" class="form-control" placeholder="Mobile No." required>
																</div>
															</div>
															
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Title<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="title"  id="title" value="<?=$c_data['title']?>"  class="form-control" placeholder="title" required>
																</div>
															</div>
															
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Note</label>
																	<textarea name="note" id="note" value="" class="form-control" placeholder="Note"><?=$c_data['note']?></textarea>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Company Information</h5>
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