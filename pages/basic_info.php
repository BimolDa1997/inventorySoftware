<?php 
$page_name="Employee Information"; 
include ('../common/library.php');
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
 
 $max_emp_id = find_a_field('employee_info','max(emp_id)+1','1');
 if($max_emp_id==''){
	 $max_emp_id = 100001;
	 }

if(isset($_POST['save'])){
	$emp_id   = $_POST['emp_id'];
	
	if($_FILES['picture']['name']!=''){
$target_dir = "../files/employee/pic/";
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $emp_id.'.'.$imageFileType;
if ($_FILES["picture"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir.$file_name); 
$picture   = $target_dir.$file_name;
}
}


  
  $emp_name   = $_POST['emp_name'];
  $designation      = $_POST['designation'];
  $department   = $_POST['department'];
  $joining_date       = $_POST['joining_date'];
  $nid_no     = $_POST['nid_no'];
  $mobile_no       = $_POST['mobile_no'];
  $email  = $_POST['email'];
  $present_address  = $_POST['present_address'];
  $permanent_address   = $_POST['permanent_address'];
  $mother_name   = $_POST['mother_name'];
  $father_name   = $_POST['father_name'];
  $gross_salary   = $_POST['gross_salary'];
  $basic_salary   = $_POST['basic_salary'];
  $house_rent   = $_POST['house_rent'];
  $conveyance   = $_POST['conveyance'];
  $medical   = $_POST['medical'];
  $mobile_bill   = $_POST['mobile_bill'];
  $password   = $_POST['password'];
  
  $entry_by   = $_POST['entry_by'];
  $entry_at   = $_POST['entry_at'];
  
  $insert =$conn->query("insert into employee_info
  (`emp_name`,
  `designation`,
  `department`,
  `joining_date`,
  `nid_no`,
  `mobile_no`,
  `email`,
  `present_address`,
  `permanent_address`,
  `mother_name`,
  `father_name`,
  `gross_salary`,
  `basic_salary`,
  `house_rent`,
  `medical`,
  `conveyance`,
  `mobile_bill`,
  `password`,
  `picture`,
  `entry_by`,
  `entry_at`) 
  
  Values
  
  ('".$emp_name."',
  '".$designation."',
  '".$department."',
  '".$joining_date."',
  '".$nid_no."',
  '".$mobile_no."',
  '".$email."',
  '".$present_address."',
  '".$permanent_address."',
  '".$mother_name."',
  '".$father_name."',
  '".$gross_salary."',
  '".$basic_salary."',
  '".$house_rent."',
  '".$medical."',
  '".$conveyance."',
  '".$mobile_bill."',
  '".$password."',
  '".$picture."',
  '".$entry_by."',
  '".$entry_at."')");
  
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
 
//photo

//photo end

 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Employee Successfully Inserted.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id   = $_POST['update_id'];
  $emp_name   = $_POST['emp_name'];
  $designation      = $_POST['designation'];
  $department   = $_POST['department'];
  $joining_date       = $_POST['joining_date'];
  $nid_no     = $_POST['nid_no'];
  $mobile_no       = $_POST['mobile_no'];
  $email  = $_POST['email'];
  $present_address  = $_POST['present_address'];
  $permanent_address   = $_POST['permanent_address'];
  $mother_name   = $_POST['mother_name'];
  $father_name   = $_POST['father_name'];
  $gross_salary   = $_POST['gross_salary'];
  $basic_salary   = $_POST['basic_salary'];
  $house_rent   = $_POST['house_rent'];
  $conveyance   = $_POST['conveyance'];
  $medical   = $_POST['medical'];
  $mobile_bill   = $_POST['mobile_bill'];
  $password   = $_POST['password'];
  
  $entry_by   = $_SESSION['user_id'];
  $entry_at   = date('Y-m-d H:i:s');
  
  if($update_id>0){
  $update = $conn->query("update employee_info set emp_name='".$emp_name."',designation='".$designation."',department='".$department."',joining_date='".$joining_date."',nid_no='".$nid_no."',mobile_no='".$mobile_no."',email='".$email."',present_address='".$present_address."',permanent_address='".$permanent_address."',mother_name='".$mother_name."',father_name='".$father_name."',gross_salary='".$gross_salary."',basic_salary='".$basic_salary."',house_rent='".$house_rent."',conveyance='".$conveyance."',medical='".$medical."',mobile_bill='".$mobile_bill."',password='".$password."',edit_by='".$entry_by."',edit_at='".$entry_at."' where emp_id='".$update_id."'");
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
														Employee</span> 
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
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Emp ID <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="emp_id"  id="emp_id" value="<?=$max_emp_id?>"  class="form-control" placeholder="" readonly required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="emp_name"  id="emp_name"  class="form-control" placeholder="Enter Your Name" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Joining Date <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="date" name="joining_date"  id="joining_date"  class="form-control" placeholder="Joining Date" required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Mobile No <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="mobile_no"  id="mobile_no"  class="form-control" placeholder="Mobile No" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>NID No <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="nid_no"  id="nid_no"  class="form-control" placeholder="NID" required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Email <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="email" name="email"  id="email"  class="form-control" placeholder="Email" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Designation <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="designation" id="designation" list="desg" class="form-control">
                                                                    <datalist id="desg">
                                                                      <?php foreign_relation('employee_info','designation','designation','','1 group by designation');?>
																	</datalist>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Department <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="department" id="department" list="desg" class="form-control">
                                                                    <datalist id="desg">
                                                                      <?php foreign_relation('employee_info','department','department','','1 group by department');?>
																	</datalist>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Present Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="present_address" id="present_address" type="text" class="form-control" placeholder="Present Address." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Permanent Address</label>
																	<input name="permanent_address" id="permanent_address" type="text" class="form-control" placeholder="Permanent Address.">
																</div>
															</div>
                                                            
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Fater's Name</label>
																	<input name="father_name" id="father_name" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mother's name</label>
																	<input name="mother_name" id="mother_name" type="text" class="form-control">
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
																	<input name="picture" id="picture" type="file" class="form-control">
																</div>
															</div>
                                                            
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Gross Salary</label>
																	<input name="gross_salary" id="gross_salary" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Basic Salary</label>
																	<input name="basic_salary" id="basic_salary" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>House Rent</label>
																	<input name="house_rent" id="house_rent" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Medical Allowance</label>
																	<input name="medical" id="medical" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Conveyance</label>
																	<input name="conveyance" id="conveyance" type="text" class="form-control">
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mobile Bill</label>
																	<input name="mobile_bill" id="mobile_bill" type="text" class="form-control">
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
													<th>Emp ID</th>
													<th>Name</th>
													<th>Designation</th>
													<th>Department</th>
													<th>Mobile No</th>
													<th>Nid No</th>
													<th>Joining Date</th>
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
											 $select =$conn->query("select * from employee_info where 1");
											 while($c_data = $select->fetch_assoc()){ ?>

												<tr>
												    <td><?=$c_data['emp_id']?></td>
													<td><?=$c_data['emp_name']?></td>
													<td><?=$c_data['designation']?></td>
													<td><?=$c_data['department']?></td>
													<td><?=$c_data['mobile_no']?></td>
													<td><?=$c_data['nid_no']?></td>
													<td><?=$c_data['joining_date']?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['emp_id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['emp_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
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
															
															<div class="row">
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Emp ID <span style="color:#FF0000; font-size:15px;">*</span></label>
                                                                    <input type="hidden" name="update_id" id="update_id" value="<?=$c_data['emp_id']?>" />
																	<input type="text" name="emp_id"  id="emp_id" value="<?=$c_data['emp_id']?>"  class="form-control" placeholder="" readonly required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="emp_name"  id="emp_name" value="<?=$c_data['emp_name']?>"  class="form-control" placeholder="Enter Your Name" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Joining Date <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="date" name="joining_date"  id="joining_date" value="<?=$c_data['joining_date']?>"   class="form-control" placeholder="Joining Date" required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Mobile No <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="mobile_no"  id="mobile_no" value="<?=$c_data['mobile_no']?>"   class="form-control" placeholder="Mobile No" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>NID No <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="nid_no"  id="nid_no" value="<?=$c_data['nid_no']?>"   class="form-control" placeholder="NID" required>
																</div>
															</div>
                                                            <div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Email <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="email" name="email"  id="email" value="<?=$c_data['email']?>"   class="form-control" placeholder="Email" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Designation <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="designation" id="designation" list="desg" class="form-control" value="<?=$c_data['designation']?>" >
                                                                    <datalist id="desg">
                                                                      <?php foreign_relation('employee_info','designation','designation','','1 group by designation');?>
																	</datalist>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Department <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="department" id="department" list="desg" class="form-control" value="<?=$c_data['department']?>" >
                                                                    <datalist id="desg">
                                                                      <?php foreign_relation('employee_info','department','department','','1 group by department');?>
																	</datalist>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Present Address <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="present_address" id="present_address" type="text" value="<?=$c_data['present_address']?>"  class="form-control" placeholder="Present Address." required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Permanent Address</label>
																	<input name="permanent_address" id="permanent_address" type="text" value="<?=$c_data['permanent_address']?>"  class="form-control" placeholder="Permanent Address.">
																</div>
															</div>
                                                            
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Fater's Name</label>
																	<input name="father_name" id="father_name" type="text" class="form-control" value="<?=$c_data['father_name']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mother's name</label>
																	<input name="mother_name" id="mother_name" type="text" class="form-control" value="<?=$c_data['mother_name']?>" >
																</div>
															</div>
                                                            
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input name="password" id="password" type="password" class="form-control" value="<?=$c_data['password']?>"  placeholder="Password">
																</div>
															</div>
															
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Photo</label>
																	<input name="picture" id="picture" type="file" class="form-control" value="<?=$c_data['picture']?>" >
																</div>
															</div>
                                                            
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Gross Salary</label>
																	<input name="gross_salary" id="gross_salary" type="text" class="form-control" value="<?=$c_data['gross_salary']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Basic Salary</label>
																	<input name="basic_salary" id="basic_salary" type="text" class="form-control" value="<?=$c_data['basic_salary']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>House Rent</label>
																	<input name="house_rent" id="house_rent" type="text" class="form-control" value="<?=$c_data['house_rent']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Medical Allowance</label>
																	<input name="medical" id="medical" type="text" class="form-control" value="<?=$c_data['medical']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Conveyance</label>
																	<input name="conveyance" id="conveyance" type="text" class="form-control" value="<?=$c_data['conveyance']?>" >
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Mobile Bill</label>
																	<input name="mobile_bill" id="mobile_bill" type="text" class="form-control" value="<?=$c_data['mobile_bill']?>" >
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


<?php include('../template/footer.php');?>