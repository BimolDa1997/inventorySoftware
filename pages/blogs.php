<?php 
$page_name="Manage Blogs";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $priority = $_POST['priority'];
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $entry_by = $_SESSION['user_id'];

  $insert =$conn->query("insert into blogs(`title`,`description`,`priority`,`entry_by`) 
  
  Values('".$title."','".$description."', '".$priority."','". $entry_by."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  

  
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/category/pic/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = time().'_'.rand(1000,9999).'.'.$imageFileType;
//$file_name = $insert_id.'.'.$imageFileType;
if ($_FILES["pic"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$file_name); 
$pic_update = $conn->query("update blogs set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
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
  $category = mysqli_real_escape_string($conn, $_POST['category1']);
  $description = mysqli_real_escape_string($conn, $_POST['description1']);
  $priority = $_POST['priority1'];
  $entry_by = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update blogs set category='".$category."',description='".$description."',priority='".$priority."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  
  
  //photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/category/pic/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = time().'_'.rand(1000,9999).'.'.$imageFileType;
if ($_FILES["pic"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$file_name); 
$pic_update = $conn->query("update blogs set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
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
		
		$image = $conn->query("select pic from blogs where id='".$del_id."'");
		$image_data = $image->fetch_object();
		$image_path = $image_data->pic;
		unlink($image_path);
		$delete = $conn->query("delete from blogs where id='".$del_id."'");
	
		if($delete==true){
			$msg = '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Deleted.</span>';
		}else{
			$msg = '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
		}

		// echo '<script>window.location.href = "categories.php";</script>';
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
										<a href="create_blog.php?clear=2"><button class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add New
										</button></a>
									</div>
								</div>
								<div class="card-body">
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SL</th>
													<th>Title</th>
													<th>Manual Link</th>
													<th>Priority</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select * from blogs where 1 ");
											  $sl=1;
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$sl++;?></td>
													<td><?=$c_data['title']?></td>
													<td><?=$c_data['manual_link']?></td>
													<td><?=$c_data['priority']?></td>
													
													<td>
														<div class="form-button-action">
															<a href="create_blog.php?id=<?=$c_data['id']?>"><button type="button"  data-toggle="modal" category="" class="btn btn-link btn-primary btn-lg" data-original-category="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
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