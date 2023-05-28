<?php 
$page_name="Theme Settings";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $theme_color = $_POST['theme_color'];
  $icon_color = $_POST['icon_color'];
  $text_color = $_POST['text_color'];
  $entry_by = $_SESSION['user_id'];

  $insert =$conn->query("insert into theme_settings(`title`,`theme_color`,`icon_color`,`text_color`, `entry_by`) 
  
  Values('".$title."','".$theme_color."', '".$icon_color."','". $text_color."', '".$entry_by."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Insert Successfully.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $theme_color = $_POST['theme_color'];
  $icon_color = $_POST['icon_color'];
  $text_color = $_POST['text_color'];
  $status = $_POST['status'];
  $entry_by = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update theme_settings set title='".$title."',theme_color='".$theme_color."',icon_color='".$icon_color."',text_color='".$text_color."',entry_by='".$entry_by."',status='".$status."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  
  
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
		$delete = $conn->query("delete from theme_settings where id='".$del_id."'");
	
		if($delete==true){
			$msg = '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Deleted.</span>';
		}else{
			$msg = '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
		}

		echo '<script>window.location.href = "categories.php";</script>';
	}
 ?>

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-category"><?php  echo $msg;?></h4>
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
													<h5 class="modal-category">
														<span class="fw-mediumbold">
														Theme</span> 
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
																	<input type="text" name="title"  id="title"  class="form-control" placeholder="title" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Theme Color </label>
																	<input type="text" name="theme_color"  id="theme_color"  class="form-control" placeholder="theme_color" >
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Icon Color</label>
																	<input type="text" name="icon_color"  id="icon_color"  class="form-control" placeholder="icon_color" required>
																</div>
															</div>

															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Text Color</label>
																	<input type="text" name="text_color"  id="text_color"  class="form-control" placeholder="text_color" required>
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
													<th>Theme Color</th>
													<th>Icon Color</th>
													<th>Text Color</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select * from theme_settings where 1 ");
											  $sl=1;
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$sl++;?></td>
													<td><?=$c_data['title']?></td>
													<td><div style="background-color:<?=$c_data['theme_color']?>"><?=$c_data['theme_color']?></div></td>
													<td><div style="background-color:<?=$c_data['icon_color']?>"><?=$c_data['icon_color']?></div></td>
													<td><div style="background-color:<?=$c_data['text_color']?>"><?=$c_data['text_color']?></div></td>
													<td><?=$c_data['status']?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" category="" class="btn btn-link btn-primary btn-lg" data-original-category="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?php echo $c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-category">
														<span class="fw-mediumbold">
														Theme </span> 
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
																	<input type="text" name="title"  id="title" value="<?=$c_data['title']?>"  class="form-control" placeholder="title" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Theme Color Code</label>
																	<input type="text" name="theme_color"  id="theme_color" value="<?=$c_data['theme_color']?>"  class="form-control" placeholder="theme color" >
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Icon Color Code</label>
																	<input type="text" name="icon_color"   value="<?=$c_data['icon_color']?>"  class="form-control" placeholder="icon color" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Text Color Code</label>
																	<input type="text" name="text_color"   value="<?=$c_data['text_color']?>"  class="form-control" placeholder="text color" required>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Status</label>
																	<select name="status" id="status" class="form-control">
																		<option value=""></option>
																		<option value="Active" <?php if($c_data['status']=='Active'){ echo "selected"; } ?>>Active</option>
																	</select>
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
															
															
															
															<button type="button" data-toggle="tooltip" category="" class="btn btn-link btn-danger" data-original-category="Remove">
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