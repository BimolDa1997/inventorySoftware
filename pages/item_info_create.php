<?php 
date_default_timezone_set("Asia/Dhaka");
$page_name="Product Info";  

include ('../common/library.php');

include ('../common/helper.php');

include ('../template/header.php'); 

include ('../template/sidebar.php');



if(isset($_POST['save'])){

  $item_name = $_POST['item_name'];
  $slug = $_POST['slug'];
  $uom = $_POST['uom'];
  $item_group = $_POST['item_group'];
  $status = $_POST['status'];
  $brand = $_POST['brand'];
  $group_for = $_POST['group_for'];
  $entry_by = $_SESSION['user_id'];
  $opening_date=date("Y-m-d");
  
  
  

  $category_id = $_POST['category_id'];
  $category = explode("#",$category_id);
  if($category[2]==1){
	  $cat_id = $category[1];
	  $sub_cat_id = '';
	  $sub_sub_cat_id = '';
	  }elseif($category[2]==2){
		  $cat_id = find_a_field('sub_category_info','category_id','id="'.$category[1].'"');
	      $sub_cat_id = $category[1];
	      $sub_sub_cat_id = '';
		  }
		  elseif($category[2]==3){
		     $cat_id = find_a_field('sub_sub_category_info','category_id','id="'.$category[1].'"');
	         $sub_cat_id = find_a_field('sub_sub_category_info','sub_category_id','id="'.$category[1].'"');
	         $sub_sub_cat_id = $category[1];
		  }
  $item_color = $_POST['item_color'];
  $size = $_POST['size'];
  $item_code = $_POST['item_code'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $featured = $_POST['featured'];
  //$description_t = base64_encode($_POST['video']);
  $description_t = $_POST['description_t'];
  $tags = $_POST['tags'];
 
  $insert =$conn->query("insert into item_info(`item_name`,`uom`,`item_group`,brand,`status`,`entry_by`,`group_for`,`category_id`,`sub_category_id`,`sub_sub_category_id`,`item_color`,`size`,`item_code`,`price`,`description`,`featured`, `description_t`, `slug`, `tags`) 
  Values('".$item_name."','".$uom."','".$item_group."','".$brand."','".$status."','".$entry_by."','".$group_for."','".$cat_id."','".$sub_cat_id."','".$sub_sub_cat_id."','".$item_color."','".$size."','".$item_code."','".$price."','".$description."','".$featured."', '".$description_t."', '".$slug."', '".$tags."')");
  
 // $insert_journal=$conn->query("INSERT INTO `journal_item` (`journal_date`, `warehouse`, `item_id`, `rate`, `item_in`, `item_ex`, `tr_no`, `tr_from`, `entry_at`, `entry_by`) VALUES ('".$opening_date."', '', '', '', '', '', '', '', current_timestamp(), '')");

  if($insert==true){
  $insert_id = mysqli_insert_id($conn);
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/



//Item photo

if($_FILES['item_file']['name']!=''){
	$i = 1;
	foreach($_FILES['item_file']['name'] as $key=>$val){
		$i++;
		$item_file_name=$_FILES['item_file']['name'][$key];
		$item_file_tmp_name=$_FILES['item_file']['tmp_name'][$key];
		$item_file_size=$_FILES['item_file']['size'][$key];
		$item_file_type=$_FILES['item_file']['type'][$key];
		$item_file_error=$_FILES['item_file']['error'][$key];
		$item_file_ext=explode('.',$item_file_name);
		$time = time();
		$item_file_ext=strtolower(end($item_file_ext));
		$item_file_name=$time.$i.'.'.$item_file_ext;
		$item_file_path='../files/item/'.$item_file_name;
		move_uploaded_file($item_file_tmp_name,$item_file_path);
		$insert_photo=$conn->query("insert into item_photo(`item_id`,`item_photo`) Values('".$insert_id."','".$item_file_name."')");
	}

}


	$r_file_name = $_FILES['docs']['name'];
	$r_file_size = $_FILES['docs']['size'];
	$r_file_temp = $_FILES['docs']['tmp_name'];
	$color_name = $_POST['color'];
	if($r_file_size>0){
		
	for($r=0; $r<count($r_file_name);$r++){

	$r_div[$r] = explode('.', $r_file_name[$r]);
	$r_file_ext = strtolower(end($r_div[$r]));
	$allowed = array('jpg', 'png', 'gif','jpeg','PNG');
	if(in_array($r_file_ext,$allowed)){
	$r_unique_image = uniqid().'.'.$r_file_ext;
	$r_uploaded_image = '../files/item/'.$r_unique_image;
	$dd = move_uploaded_file($r_file_temp[$r], $r_uploaded_image);
	$color = $color_name[$r];
	

	$ii_query = $conn->query('INSERT INTO `item_photo`(`item_id`, `item_photo`, `color`) VALUES ("'.$insert_id.'","'.$r_unique_image.'","'.$color.'")');
		
	
	}
	else{
	$type= 0;
	$msg='Invalid Attached Document Format';	    
	}
	}
	}
	
	

//Item photo end

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Item Successfully Inserted.</span>';

  }else{
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}





if(isset($_POST['update'])){

  $update_id = $_POST['update_item_id'];
  $item_name = $_POST['item_name'];
  $uom = $_POST['uom'];
  $item_group = $_POST['item_group'];
  $brand = $_POST['brand'];
  $status = $_POST['status'];
  $group_for = $_POST['group_for'];
  $slug = $_POST['slug'];

  $category_id = $_POST['category_id'];
  $category = explode("#",$category_id);
  if($category[2]==1){
	  $cat_id = $category[1];
	  $sub_cat_id = '';
	  $sub_sub_cat_id = '';
	  }elseif($category[2]==2){
		  $cat_id = find_a_field('sub_category_info','category_id','id="'.$category[1].'"');
	      $sub_cat_id = $category[1];
	      $sub_sub_cat_id = '';
		  }
		  elseif($category[2]==3){
		     $cat_id = find_a_field('sub_sub_category_info','category_id','id="'.$category[1].'"');
	         $sub_cat_id = find_a_field('sub_sub_category_info','sub_category_id','id="'.$category[1].'"');
	         $sub_sub_cat_id = $category[1];
		  }
		  
  $item_color = $_POST['item_color'];
  $size = $_POST['size'];
  $item_code = $_POST['item_code'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $featured = $_POST['featured'];
  $description_t = $_POST['description_t'];
  $updated_by = $_SESSION['user_id'];
  $updated_at = date('Y-m-d H:i:s');
  $tags = $_POST['tags'];

  
  if($update_id>0){

  $update = "update item_info set item_name='".$item_name."', slug='".$slug."',uom='".$uom."',item_group='".$item_group."',brand='".$brand."',status='".$status."'
  ,group_for='".$group_for."' ,category_id='".$cat_id."',item_color='".$item_color."',size='".$size."',item_code='".$item_code."'
  ,price='".$price."',description='".$description."',featured='".$featured."', description_t='".$description_t."', 
  sub_category_id='".$sub_cat_id."',sub_sub_category_id='".$sub_sub_cat_id."', updated_by='".$updated_by."', updated_at='".$updated_at."', tags='".$tags."' where item_id='".$update_id."'";
  
  //$update_jitem="UPDATE `journal_item` SET `id`=[value-1],`journal_date`=date("Y-m-d"),`warehouse`=[value-3],`item_id`='".$update_id."',`rate`=[value-5],`item_in`=[value-6],`item_ex`=[value-7],`tr_no`=[value-8],`tr_from`="Opening",`entry_at`=[value-10],`entry_by`='".$entry_by."' WHERE 1";

$conn->query($update);

  }
  
if($update==true){

 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/


 //Item photo
if($_FILES['item_file']['name']!=''){
	$i = 1;
	foreach($_FILES['item_file']['name'] as $key=>$val){
		$i++;
		$item_file_name=$_FILES['item_file']['name'][$key];
		$item_file_tmp_name=$_FILES['item_file']['tmp_name'][$key];
		$item_file_size=$_FILES['item_file']['size'][$key];
		$item_file_type=$_FILES['item_file']['type'][$key];
		$item_file_error=$_FILES['item_file']['error'][$key];
		$item_file_ext=explode('.',$item_file_name);
		$time = time();
		$item_file_ext=strtolower(end($item_file_ext));
		$item_file_name=$time.$i.'.'.$item_file_ext;
		$item_file_path='../files/item/'.$item_file_name;
		move_uploaded_file($item_file_tmp_name,$item_file_path);
		if($item_file_ext!=''){
		$insert_photo=$conn->query("insert into item_photo(`item_id`,`item_photo`) Values('".$update_id."','".$item_file_name."')");
		}
	}

}


    $r_file_name = $_FILES['docs']['name'];
	$r_file_size = $_FILES['docs']['size'];
	$r_file_temp = $_FILES['docs']['tmp_name'];
	$color_name = $_POST['color'];
	if($r_file_size>0 && $color_name!=''){
		
	for($r=0; $r<count($r_file_name);$r++){

	$r_div[$r] = explode('.', $r_file_name[$r]);
	$r_file_ext = strtolower(end($r_div[$r]));
	$allowed = array('jpg', 'png', 'gif','jpeg','PNG');
	if(in_array($r_file_ext,$allowed)){
	$r_unique_image = uniqid().'.'.$r_file_ext;
	$r_uploaded_image = '../files/item/'.$r_unique_image;
	$dd = move_uploaded_file($r_file_temp[$r], $r_uploaded_image);
	$color = $color_name[$r];
	

	$ii_query = $conn->query('INSERT INTO `item_photo`(`item_id`, `item_photo`, `color`) VALUES ("'.$update_id.'","'.$r_unique_image.'","'.$color.'")');
		
	
	}
	else{
	$type= 0;
	$msg='Invalid Attached Document Format';	    
	}
	}
	}

//Item photo end

// insert suggested items

if($_POST['suggested_item1']!=''){
	$suggested_item = $_POST['suggested_item1'];
		$insert_suggested_item = $conn->query("insert into suggested_item(`item_id`,`suggested_item_id`) Values('".$update_id."','".$suggested_item."')");	
}
if($_POST['suggested_item2']!=''){
	$suggested_item = $_POST['suggested_item2'];
		$insert_suggested_item = $conn->query("insert into suggested_item(`item_id`,`suggested_item_id`) Values('".$update_id."','".$suggested_item."')");	
}

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Item Successfully Updated.</span>';

  }else{
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';

 }
}
 



$max = $conn->query("select max(item_id)+1 as item_code from item_info where 1");
$c_data = $max->fetch_assoc();
$max_item_id = $c_data['item_code'];

// item info
if($_GET['id']!="")
{
	$id=$_GET['id'];
	$item_id=$_GET['id'];
	$sql = "SELECT * FROM item_info WHERE item_id='$id'";
	$result = mysqli_query($conn,$sql);
	$item_row = mysqli_fetch_object($result);
}

?>



		<div class="main-panel">

			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg; ?></h4>
									</div>
								</div>

<div class="card-body">

	<!-- Modal -->

	<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">
			<div class="modal-content">

				<div class="modal-header no-bd">

					<h5 class="modal-title">

						<span class="fw-mediumbold">Product</span> 

						<span class="fw-light">Information</span>

					</h5>

				</div>

				<div class="">
					<p class="small">Make Sure Fillup All Field</p>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Product Code <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="hidden" name="item_id"  id="item_id"  class="form-control" value="<?php if($item_row->item_id>0) echo $item_row->item_id; else echo $max_item_id;?>" readonly required>
                                    <input type="text" name="item_code"  id="item_code" value="<?=$item_row->item_code?>"  class="form-control" placeholder="Product Code" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Product Name <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="text" name="item_name"  id="item_name" onkeyup="slugGen(this.value)" value="<?=$item_row->item_name?>"  class="form-control" placeholder="Product Name" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Manual Link <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="text" name="slug"  id="slug" value="<?=$item_row->slug?>"  class="form-control" placeholder="Manual Link" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>UOM <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="text" name="uom"  id="uom" value="<?=$item_row->uom?>"  class="form-control" placeholder="Unit">
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Category <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="hidden" name="item_group" value="1">
									<input type="hidden" name="group_for" value="1">

									<?php
                                        if($c_data['sub_sub_category_id']>0){
											 $cat = find_a_field('sub_sub_category_info','category','id="'.$item_row->sub_sub_category_id.'"').'#'.$item_row->sub_sub_category_id.'#3';
											}elseif($c_data['sub_category_id']>0){
												$cat = find_a_field('sub_category_info','category','id="'.$item_row->sub_category_id.'"').'#'.$item_row->sub_category_id.'#2';
												}else{
													$cat = find_a_field('category_info','category','id="'.$item_row->category_id.'"').'#'.$item_row->category_id.'#1';
													}
									 ?>

									<input type="text" list="cat" name="category_id" id="category_id" value="<?php echo $cat;?>" class="form-control">
                                    <datalist id="cat">
                                      <?php
                                        $csql = $conn->query('select * from category_info where 1');
										while($cat=$csql->fetch_assoc()){
											echo '<option>'.$cat['category'].'#'.$cat['id'].'#1'.'</opition>';
											
											  $scsql = $conn->query('select * from sub_category_info where 1 and category_id="'.$cat['id'].'"');
										       while($scat=$scsql->fetch_assoc()){
											    echo '<option>---'.$scat['category'].'#'.$scat['id'].'#2'.'</opition>';
												
												 $sscsql = $conn->query('select * from sub_sub_category_info where 1 and sub_category_id="'.$scat['id'].'" and category_id="'.$cat['id'].'"');
										          while($sscat=$sscsql->fetch_assoc()){
											       echo '<option>------'.$sscat['category'].'#'.$sscat['id'].'#3'.'</opition>';
											}
											}
											}
									  ?>
								
									</datalist>
									
									</select>
								</div>
							</div>
                            
                           

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Price</label>
									<input type="text" name="price" required  id="price" value="<?=$item_row->price;?>"  class="form-control" placeholder="Price">
								</div>
							</div>
							

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Staus</label>
									<select name="status" id="status" class="form-control">
										<option <? if($item_row->status=='Active') echo 'selected';?> value="Active">Active</option>
										<option <? if($item_row->status=='Inactive') echo 'selected';?> value="Inactive">Inactive</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Featured</label>
									<select name="featured" id="featured" class="form-control">
										<option <? if($item_row->featured=='YES') echo 'selected';?> value="YES">YES</option>
										<option <? if($item_row->featured=='NO') echo 'selected';?> value="NO">NO</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Video Link</label>
									<textarea name="description_t" id="description_t" value="<?=$item_row->description_t;?>" class="form-control" placeholder="video"></textarea>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Product Tags</label>
									<input type="text" name="tags" class="form-control" value="<?=$item_row->tags;?>" placeholder=" tagts1, tags2 ">
									<small class="form-text text-muted">Separate keywords with a comma</small>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Description: </label>
									<textarea name="description" id="description" class="form-control" placeholder="Description"><?=$item_row->description;?></textarea>
								</div>
							</div>
						<script>
							CKEDITOR.replace( 'description' );
						</script>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Size</label>
									<input type="text" name="size"  id="size" value="<?=$item_row->size;?>"  class="form-control" placeholder="Size">
								</div>
							</div>

							<!-- <div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Item Stock</label>
									<input name="item_stock" id="item_stock" value="<?=$item_row->item_stock;?>" type="text" class="form-control">
								</div>
							</div> -->

							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Product Image</label>
									<!--<input name="item_file[]" id="item_file" type="file" class="form-control" multiple>-->
                                    
                                   
<span><input type="file" name="docs[]" id="docs" class="form-control" style="border:1px solid #ccc; width:15%;">

<select  name="color[]" id="color" value="" >
	<? foreign_relation('color_list','id','color',$color,'1 order by color asc');?>
</select>

<br>

<input type="button" id="increase" value="+" class="btn btn-primary" style="font-size:18px; font-weight:bold;" onClick="new_img()" ></span>

								</div>
							</div>
							<!-- show images and delete option -->
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Product Images</label>
                                    <div class="container">
                                     <div class="row">
									<?php
										 $image_sql = "select * from item_photo where item_id = '$item_id'";
										$image_result = $conn->query($image_sql);
										
										while($image_row = $image_result->fetch_object()){

											?>
											<div class="col-md-3">
												<img src="../files/item/<?=$image_row->item_photo;?>" style="width: 200px; height: 220px;">
                                                
												<a href="delete_item_image.php?item_id=<?=$item_id;?>&image_id=<?=$image_row->id;?>">Delete</a><br>
											</div>
											<?php
										}
									?>
                                    </div>
                                    </div>
								</div>
							</div>	

							<!-- suggested item add -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Suggested Product 1</label>
									<select name="suggested_item1" id="suggested_item1" class="form-control">
									<option value=""></option>
										<?php
											$suggested_sql = "select * from item_info where item_id not in (select suggested_item_id from suggested_item where item_id = '$item_id') 
											and status = 'Active' order by item_name asc";
											$suggested_result = $conn->query($suggested_sql);
											while($suggested_row = $suggested_result->fetch_object()){
												?>
												<option value="<?=$suggested_row->item_id;?>">(<?=$suggested_row->item_code;?>) <?=$suggested_row->item_name;?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Suggested Product 2</label>
									<select name="suggested_item2" id="suggested_item2" class="form-control">
										<option value=""></option>
										<?php
											$suggested_sql = "select * from item_info where item_id not in (select suggested_item_id from suggested_item where item_id = '$item_id') 
											and status = 'Active' order by item_name asc";
											$suggested_result = $conn->query($suggested_sql);
											while($suggested_row = $suggested_result->fetch_object()){
												?>
												<option value="<?=$suggested_row->item_id;?>">(<?=$suggested_row->item_code;?>) <?=$suggested_row->item_name;?></option>
												<?php
											}
										?>
									</select>
								</div>
							</div>

							<!-- show suggested item -->
							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Suggested Product</label>
									<?php
										 $suggested_sql = "select * from item_info where item_id in (select suggested_item_id from suggested_item where item_id = '$item_id')";
										$suggested_result = $conn->query($suggested_sql);
										while($suggested_row = $suggested_result->fetch_object()){

											?>
											<div class="col-md-3">
												<?=$suggested_row->item_name;?>
												<a href="delete_item_image.php?item_id=<?=$item_id;?>&suggested_item_id=<?=$suggested_row->item_id;?>">Delete</a>
											</div>
											<?php
										}
									?>
								</div>
							</div>	
							<!-- show item attribute -->
							<div class="col-md-12">
							
						</div>
				</div>

				<div class="modal-footer no-bd">
					<?php if($_GET['id']>0){?>
						<input type="hidden" name="update_item_id" id="update_item_id" value="<?php echo $_GET['id'];?>">
						<input type="submit" name="update"  value="Update" class="btn btn-primary" />
					<?php }else{?>
					<input type="submit" name="save"  value="Add" class="btn btn-primary" />
					<?php }?>
					<a href="./item_info.php">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</a>
				</div>
			</div>
	</form>
</div>

							</div>

						</div>

					</div>





			</div>


<script>
	// slug generate
	function slugGen(item_name){
		var item_name = item_name;
		var slug = item_name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
		$('#slug').val(slug);
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>

$(document).ready(function(e) {
	
	//function new_img(){
	//alert("Function Working..");
	$("#increase").click(function(){
		$("#increase").after('<span id="upload"><input class="docs" id="docs" name="docs[]" type="file" class="form-control" style="border:1px solid #ccc"><select name="color[]" id="color" ><? foreign_relation('color_list','id','color',$color,'1 order by color asc');?></select><input type="button" value="X" id="decreament" class="btn1" style="width:50px;height:31px; background:red; color:#fff"> </span>');
		$("#decreament").click(function(){
		$('#upload').remove();
		})
		
		});
	//}
	
	
		});



</script>


<?php include('../template/footer.php');?>