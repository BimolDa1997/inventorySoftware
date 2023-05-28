<?php 
date_default_timezone_set("Asia/Dhaka");
$page_name="Product Info";  

include ('../common/library.php');

include ('../common/helper.php');

include ('../template/header.php'); 

include ('../template/sidebar.php');



if(isset($_POST['save'])){

  $item_name = $_POST['item_name'];
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
  $description_t = $_POST['description_t'];
 
  $insert =$conn->query("insert into item_info(`item_name`,`uom`,`item_group`,brand,`status`,`entry_by`,`group_for`,`category_id`,`sub_category_id`,`sub_sub_category_id`,`item_color`,`size`,`item_code`,`price`,`description`,`featured`, `description_t`) 
  Values('".$item_name."','".$uom."','".$item_group."','".$brand."','".$status."','".$entry_by."','".$group_for."','".$cat_id."','".$sub_cat_id."','".$sub_sub_cat_id."','".$item_color."','".$size."','".$item_code."','".$price."','".$description."','".$featured."', '".$description_t."')");
  
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

		// $target_dir = "../files/item/";
		// $target_file = $target_dir . basename($_FILES["item_file"]["name"]);
		// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// $file_name = $insert_id.'.'.$imageFileType;
		// if ($_FILES["item_file"]["size"] > 500000) {
		// $msg = "Sorry, your file is too large.";
		// }
		// elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		// && $imageFileType != "gif" ) {
		// $msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		// }else{
		// move_uploaded_file($_FILES["item_file"]["tmp_name"], $target_dir.$file_name); 
		// }

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

  
  if($update_id>0){

  $update = "update item_info set item_name='".$item_name."',uom='".$uom."',item_group='".$item_group."',brand='".$brand."',status='".$status."'
  ,group_for='".$group_for."' ,category_id='".$cat_id."',item_color='".$item_color."',size='".$size."',item_code='".$item_code."'
  ,price='".$price."',description='".$description."',featured='".$featured."', description_t='".$description_t."',sub_category_id='".$sub_cat_id."',sub_sub_category_id='".$sub_sub_cat_id."' where item_id='".$update_id."'";
  
  //$update_jitem="UPDATE `journal_item` SET `id`=[value-1],`journal_date`=date("Y-m-d"),`warehouse`=[value-3],`item_id`='".$update_id."',`rate`=[value-5],`item_in`=[value-6],`item_ex`=[value-7],`tr_no`=[value-8],`tr_from`="Opening",`entry_at`=[value-10],`entry_by`='".$entry_by."' WHERE 1";

$conn->query($update);

  }if($update==true){

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

//Item photo end
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Item Successfully Updated.</span>';

  }else{
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

*/ 

$max = $conn->query("select max(item_id)+1 as item_code from item_info where 1");

$c_data = $max->fetch_assoc();

$max_item_id = $c_data['item_code'];

?>

		<div class="main-panel">

			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center" style="float: right;">
										<h4 class="card-title"><?=$msg; ?></h4>
										<a href="./item_info_create.php" >
											<button class="btn btn-primary btn-round ml-auto"><i class="fa fa-plus"></i>Add New</button>
										</a>
										<a href="./product_bar_code.php">
											<button class="btn btn-primary btn-round ml-auto">Generate Barcode</button>
										</a>
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

						<span class="fw-mediumbold">Product</span> 

						<span class="fw-light">Information</span>

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
									<label>Item Code <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="hidden" name="item_id"  id="item_id"  class="form-control" value="<?=$max_item_id?>" readonly required>
                                    <input type="text" name="item_code"  id="item_code"  class="form-control" placeholder="Item Code" required>
								</div>

							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Item Name <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="text" name="item_name"  id="item_name"  class="form-control" placeholder="Item Name" required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>UOM <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="text" name="uom"  id="uom"  class="form-control" placeholder="Unit">
								</div>
							</div>

							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Category <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="hidden" name="item_group" value="1">
									<input type="hidden" name="group_for" value="1">

									<input type="text" list="cat" name="category_id" id="category_id" class="form-control">
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
									<input type="text" name="price"  id="price"  class="form-control" placeholder="Price">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Color</label>
									<input type="text" name="item_color"  id="item_color"  class="form-control" placeholder="Color">
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

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Featured</label>
									<select name="featured" id="featured" class="form-control">
										<option value="YES">YES</option>
										<option value="NO">NO</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Video Link</label>
									<textarea name="video" id="video" class="form-control" placeholder="video"></textarea>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Description: </label>
									<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
								</div>
							</div>
			
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Size</label>
									<input type="text" name="size"  id="size"  class="form-control" placeholder="Size">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Item Stock</label>
									<input name="item_stock" id="item_stock" type="text" class="form-control">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Item Image</label>
									<input name="item_file[]" id="item_file" type="file" class="form-control" multiple>
								</div>
							</div>
							
							<!-- <div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Item Brand <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input name="brand" id="brand" class="form-control" list="item_brand" />
							
									<datalist id="item_brand">

									<? //foreign_relation('supplier_info','supplier_name','supplier_name',$brand,' id>0 group by id');?>
									</datalist>
								</div>
							</div> -->
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
	</form>



	<div class="table-responsive">

		<table id="add-row" class="display table table-striped table-hover basic-datatables" >

			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product code</th>
					<th>Product Name</th>
					<th>UOM</th>
					<th>Category</th>
                    <th>Sub Category</th>
                    <th>Sub Sub Category</th>
					<!--<th>Item Group</th>-->
					<!--<th>Company name</th>-->
					<th>Status</th>
					<th style="width: 10%">Action</th>
				</tr>
			</thead>

			<tbody>
			<?php

				$select =$conn->query("select i.*,c.category as main_category,sc.category as s_category,ssc.category as ss_category from item_info i left join category_info c on c.id=i.category_id 
				left join sub_category_info sc on sc.id=i.sub_category_id left join sub_sub_category_info ssc on ssc.id=i.sub_sub_category_id  where 1  order by i.item_id desc ");

				while($c_data = $select->fetch_assoc()){ ?>



				<tr>
					<td><?=$c_data['item_id']?></td>
					<td><?=$c_data['item_code']?></td>

					<td><?=$c_data['item_name']?></td>

					<td><?=$c_data['uom']?></td>
					
					<td><?=$c_data['main_category']?></td>
                    <td><?=$c_data['s_category']?></td>
                    <td><?=$c_data['ss_category']?></td>
					<td><?=$c_data['status']?></td>
					<td>
						<div class="form-button-action">
							<a href="./item_info_create.php?id=<?=$c_data['item_id']?>">
								<button type="button"   class="btn btn-link btn-primary btn-lg" >
									<i class="fa fa-edit"></i>
								</button>
							</a>
							<!--edit modal end-->
							<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
								<i class="fa fa-times"></i>
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