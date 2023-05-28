<?php 
$page_name="Category";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $priority = $_POST['priority'];
  $description =$_POST['description'];
  $entry_by = $_SESSION['user_id'];
  $manual_link = mysqli_real_escape_string($conn, $_POST['manual_link']);

  $insert =$conn->query("insert into blogs(`title`,`description`,`priority`,`entry_by`,`manual_link`) 
  
  Values('".$title."','".$description."', '".$priority."','". $entry_by."', '".$manual_link."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  

  
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
 
//photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/category/pic/";
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
$pic_update = $conn->query("update blogs set pic='".$target_dir.$file_name."' where id='".$insert_id."'");
}
}
//photo end
 

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Insert Successfully.</span>';
   echo '<script>window.location.href = "blogs.php";</script>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = $_POST['description'];
  $priority = $_POST['priority'];
  $entry_by = $_SESSION['user_id'];
  $manual_link = mysqli_real_escape_string($conn, $_POST['manual_link']);
  
  if($update_id>0){
  $update = $conn->query("update blogs set title='".$title."',description='".$description."',priority='".$priority."', manual_link = '".$manual_link."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
  $insert_id = $update_id;
  
  
  //photo
if($_FILES['pic']['name']!=''){
$target_dir = "../files/category/pic/";
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

		echo '<script>window.location.href = "categories.php";</script>';
	}


	$blog_id = 0;
	if($_GET['id']){
		$blog_id = $_GET['id'];
		$blog = $conn->query("select * from blogs where id='".$blog_id."'");
		$blog_data = $blog->fetch_object();
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
									</div>
								</div>
								<div class="card-body">
								<form action=" " method="post" enctype="multipart/form-data">
									
									<div >
										<div class="modal-content">
											<div class="modal-header no-bd">
												<h5 class="modal-category">
													<span class="fw-mediumbold">
													Blog</span> 
													<span class="fw-light">
														Post
													</span>
												</h5>
												
											</div>
											<div class="modal-body">
												<p class="small">Make Sure Fillup All Field</p>
												
													<div class="row">
														<div class="col-sm-12">
															<div class="form-group form-group-default">
																<label>Title <span style="color:#FF0000; font-size:15px;">*</span></label>
																<input type="hidden" class="form-control" name="update_id" value="<?php echo $blog_id;?>" >
																<input type="text" name="title"  id="title" value="<?php echo $blog_data->title;?>"
																class="form-control" placeholder="title" onkeyup="slugGen(this.value)" required>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group form-group-default">
																<label>Manual Link <span style="color:#FF0000; font-size:15px;">*</span></label>
																<input type="text" name="manual_link" value="<?php echo $blog_data->manual_link;?>"  id="manual_link"  class="form-control" placeholder="Manual Link" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group form-group-default">
																<label>Image <span style="color:#FF0000; font-size:15px;">*</span></label>
																<input type="file" name="pic"  id="pic"  class="form-control" placeholder="Blog Title Image." required>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group form-group-default">
																<label>Description: </label>
																<textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo $blog_data->description;?></textarea>
															</div>
														</div>

														<script>
															CKEDITOR.replace( 'description' );
														</script>

														<div class="col-sm-12">
															<div class="form-group form-group-default">
																<label>Priority</label>
																<input type="number" name="priority" value="<?php echo $blog_data->priority;?>"  id="priority"  class="form-control" placeholder="Priority" required>
															</div>
														</div>
														
											<div class="modal-footer no-bd">
												<?php if($blog_id>0){?>
												<input type="submit" name="update" value="Update" class="btn btn-primary">
												<?php }else{?>
												<input type="submit" name="save"  value="Save" class="btn btn-primary" />
												<?php }?>
												<a href="blogs.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></a>
											</div>
										</div>
									
									</div>
								</form>
									
									
								</div>
							</div>
						</div>
					</div>


			</div>
		</div>
<script>
	// slug generator
	function slugGen(val){
		var slug = val.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
		$('#manual_link').val(slug);
	}
</script>

<?php include('../template/footer.php');?>