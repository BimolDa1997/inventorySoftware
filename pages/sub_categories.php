<?php 
$page_name="Sub Category";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $priority = $_POST['priority'];
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $entry_by = $_SESSION['user_id'];
  $category_id = $_POST['category_id'];

  $insert =$conn->query("insert into sub_category_info(`category`,`priority`,`entry_by`, `group_for`, `category_id`) 
  
  Values('".$category."', '".$priority."','". $entry_by."', '".$group_for."', '".$category_id."')");
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
  $category = mysqli_real_escape_string($conn, $_POST['category1']);
  $description = mysqli_real_escape_string($conn, $_POST['description1']);
  $priority = $_POST['priority1'];
  $entry_by = $_SESSION['user_id'];
  $category_id = $_POST['category_id'];
  
  if($update_id>0){
  $update = $conn->query("update sub_category_info set category='".$category."',priority='".$priority."',category_id = '".$category_id."'
    where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Updated.</span>';
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}


	if(isset($_GET['del'])){
		$del_id = $_GET['del'];

		$delete = $conn->query("delete from sub_category_info where id='".$del_id."'");
	
		if($delete==true){
			$msg = '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Deleted.</span>';
		}else{
			$msg = '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
		}

		echo '<script>window.location.href = "sub_categories.php";</script>';
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
														Sub Category</span> 
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
																	<label>Sub Category <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="category"  id="category"  class="form-control" placeholder="category" required>
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
																	<label>Category <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="category_id" id="category_id" required>
																		<?php
																			foreign_relation('category_info','id','category','','1 order by category asc');
																		?>
																	</select>
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
													<th>Sub category</th>
													<th>Priority</th>
													<th>Category</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select s.*,c.category as category_name from sub_category_info s, category_info c where s.category_id=c.id order by s.priority asc");
											  $sl=1;
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$sl++;?></td>
													<td><?=$c_data['category']?></td>
													<td><?=$c_data['priority']?></td>
													<td><?=$c_data['category_name']?></td>
													
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
														Sub Category </span> 
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
																	<label>Sub category <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" name="category1"  id="category1" value="<?=$c_data['category']?>"  class="form-control" placeholder="category" required>
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
																	<label>Category <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="category_id" id="category_id" required>
																		<?php
																			foreign_relation('category_info','id','category',$c_data['category_id'],' 1 order by category asc');
																		?>
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