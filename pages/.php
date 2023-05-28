<?php 
$page_name="Banner Image";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $priority = $_POST['priority'];
  $entry_by = $_SESSION['user_id'];

  $insert =$conn->query("insert into banner_info(`title`,`description`,`priority`,`entry_by`, `group_for`) 
  
  Values('".$title."','".$description."', '".$priority."','". $entry_by."', '".$group_for."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  

  
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/banner/pic/";
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
$pic_update = $conn->query("update banner_info set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//photo end
 

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Insert Successfully.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $title = $_POST['title1'];
  $description = $_POST['description1'];
  $priority = $_POST['priority1'];
  $entry_by = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update banner_info set title='".$title."',description='".$description."',priority='".$priority."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  
  
  //photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/banner/pic/";
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
$pic_update = $conn->query("update banner_info set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//photo end
 

 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}


	if(isset($_GET['del'])){
		$del_id = $_GET['del'];
		
		$image = $conn->query("select pic from banner_info where id='".$del_id."'");
		$image_data = $image->fetch_object();
		$image_path = $image_data->pic;
		unlink($image_path);
		$delete = $conn->query("delete from banner_info where id='".$del_id."'");
	
		if($delete==true){
			$msg = '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Deleted.</span>';
		}else{
			$msg = '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
		}

		echo '<script>window.location.href = "banner_image.php";</script>';
	}
 ?>

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?php  echo $msg;?></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add New
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<form action=" " method="post" enctype="multipart/form-data">
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Banner</span> 
														<span class="fw-light">
															Setup
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
																	<label>Title <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="title"  id="title"  class="form-control" placeholder="Title" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Description </label>
																	<input type="text" name="description"  id="description"  class="form-control" placeholder="Description" >
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Priority</label>
																	<input type="number" name="priority"  id="priority"  class="form-control" placeholder="Priority" required>
																</div>
															</div>
															
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Add Photo <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="pic" id="pic" type="file" class="form-control" required>
																</div>
															</div>
															
												<div class="modal-footer no-bd">
													<!--<button type="button" id="addRowButton" class="btn btn-primary">Add</button>-->
													<input type="submit" name="save"  value="Add" class="btn btn-primary" />
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									</div></div>
								  </form>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SL</th>
													<th>Title</th>
													<th>Description</th>
													<th>Priority</th>
													<th>Image</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select * from banner_info where 1 ");
											  $sl=1;
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$sl++;?></td>
													<td><?=$c_data['title']?></td>
													<td><?=$c_data['description']?></td>
													<td><?=$c_data['priority']?></td>
													<td><img src="<?=$c_data['pic']?>" style=" width:150px; height:100px;"></td>
													
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?php echo $c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Banner </span> 
														<span class="fw-light">
															Setup
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
																	<label>Title <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" name="title1"  id="title1" value="<?=$c_data['title']?>"  class="form-control" placeholder="Title" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Description </label>
																	<input type="text" name="description1"  id="description1" value="<?=$c_data['description']?>"  class="form-control" placeholder="Description" >
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Priority</label>
																	<input type="number" name="priority1"   value="<?=$c_data['priority']?>"  class="form-control" placeholder="Priority" required>
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Photo <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="pic" id="pic"  type="file" class="form-control" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<img src="<?=$c_data['pic']?>" style=" width:200px; height:100px;">
																</div>
															</div>
															
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<!--<button type="button" id="addRowButton" class="btn btn-primary">Add</button>-->
													<input type="submit" name="update"  value="Update" class="btn btn-primary" />
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
															
															<!--edit modal end-->
															
															
															
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<a href="?del=<?=$c_data['id']?>"><i class="fa fa-times"></i></a>
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