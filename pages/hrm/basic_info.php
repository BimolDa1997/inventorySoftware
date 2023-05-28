<?php 
$page_name="basic_info"; 
include ('../../common/library_hrm.php');
include ('../../common/helper_hrm.php');  
include ('../../template/header_hrm.php'); 
include ('../../template/sidebar.php');
 


if(isset($_POST['save'])){
  $username   = $_POST['username'];
  $email      = $_POST['email'];
  $password   = $_POST['password'];
  $name       = $_POST['name'];
  $mobile     = $_POST['mobile'];
  $note       = $_POST['note'];
  $group_for  = $_POST['group_for'];
  $warehouse  = $_POST['warehouse'];
  $entry_by   = $_SESSION['user_id'];
  
  $insert =$conn->query("insert into users(`username`,`email`,`password`,`name`,`mobile`,`note`,`entry_by`,`group_for`,`warehouse`) Values('".$username."','".$email."','".$password."','".$name."','".$mobile."','".$note."','".$entry_by."','".$group_for."','".$warehouse."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['c_photo']['name']!=''){
$target_dir = "../files/user/pic/";
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

 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New User Successfully Registered.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id  = $_POST['update_id'];
  $username   = $_POST['username'];
  $email      = $_POST['email'];
  $password   = $_POST['password'];
  $name       = $_POST['name'];
  $mobile     = $_POST['mobile'];
  $note       = $_POST['note'];
  $timeNow    = date("Y-m-d H:i:s");
  $group_for  = $_POST['group_for'];
  $warehouse  = $_POST['warehouse'];
  $entry_by   = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update users set username='".$username."',email='".$email."',password='".$password."',name='".$name."',group_for='".$group_for."',warehouse='".$warehouse."',mobile='".$mobile."',updated_by='".$entry_by."',updated_at='".$timeNow."' where user_id='".$update_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">User Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}



if(isset($_POST['delete'])){

  $delete_id  = $_POST['delete_id'];

  
  if($delete_id>0){
  $update = $conn->query("update users set del='1' where user_id='".$delete_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">User Successfully Deleted.</span>';
  
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
														User</span> 
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
																	<label>Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="name"  id="name"  class="form-control" placeholder="Enter Your Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Username <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="username"  id="username"  class="form-control" placeholder="Username" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Email <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="email" name="email"  id="email"  class="form-control" placeholder="Email" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Company name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="group_for" id="group_for" class="form-control" required>
																	  <?php foreign_relation('company_info','id','company_name','','1 and status ="Active"');?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Warehouse name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="warehouse" id="warehouse" class="form-control" required>
																	  <?php foreign_relation('warehouse_info','id','warehouse_name','','1 and status ="Active"');?>
																	</select>
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
																	<input name="note" id="note" type="text" class="form-control" placeholder="Note">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input name="password" id="password" type="password" class="form-control" placeholder="Password">
																</div>
															</div>
															
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Photo</label>
																	<input name="c_photo" id="c_photo" type="file" class="form-control">
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
													<th>Name</th>
													<th>Username</th>
													<th>Company name</th>
													<th>warehouse name</th>
													<th>Mobile No.</th>
													<th>Email</th>
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
												</tr>
											</tfoot>
											<tbody>
											<?php
											 $select =$conn->query("select * from users where 1 and del='0'");
											 while($c_data = $select->fetch_assoc()){ ?>

												<tr>
												    <td><?=$c_data['user_id']?></td>
													<td><?=$c_data['name']?></td>
													<td><?=$c_data['username']?></td>
													<td><?=find_a_field('company_info','company_name','id='.$c_data['group_for']);?></td>
													<td><?=find_a_field('warehouse_info','warehouse_name','id='.$c_data['warehouse']);?></td>
													<td><?=$c_data['mobile']?></td>
													<td><?=$c_data['email']?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['user_id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['user_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['user_id']?>" />
																	<input type="text" name="name"  id="name" value="<?=$c_data['name']?>"  class="form-control" placeholder="Name" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>User Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="username"  id="username" value="<?=$c_data['username']?>"  class="form-control" placeholder="username" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Email <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="email" name="email"  id="email" value="<?=$c_data['email']?>"  class="form-control" placeholder="email" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Company name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="group_for" id="group_for" class="form-control">
																	  <?php foreign_relation('company_info','id','company_name',$c_data['group_for'],'1 and status ="Active"');?>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>warehouse name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="warehouse" id="warehouse" class="form-control">
																	  <?php foreign_relation('warehouse_info','id','warehouse_name',$c_data['warehouse'],'1 and status ="Active"');?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Mobile No. <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="mobile" id="mobile" type="text" value="<?=$c_data['mobile']?>" class="form-control" placeholder="Mobile No." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Note</label>
																	<input name="note" id="note" value="<?=$c_data['note']?>" type="text" class="form-control" placeholder="Note">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input name="password" id="password" value="<?=$c_data['password']?>" type="password" class="form-control" placeholder="Password">
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
															
															
															
															<button type="button" data-toggle="modal" data-target="#viewModal<?=$c_data['user_id']?>" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
															
<!--delete modal -->	
  <form action="" method="post">				
	<div class="modal fade show" id="viewModal<?=$c_data['user_id']?>" tabindex="-1" role="dialog" aria-labelledby=""aria-modal="true">
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
				    <input type="hidden" name="delete_id" value="<?=$c_data['user_id']?>"  />
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


<?php include('../../template/footer_hrm.php');?>