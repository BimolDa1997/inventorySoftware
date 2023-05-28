<?php 
$page_name="Multiple Categories";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

if(isset($_POST['save'])){
  $item = explode("#",$_POST['item_id']);
  $item_id = $item[1];
  $entry_by = $_SESSION['user_id'];
  $entry_at = date('Y-m-d H:i:s');
  
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

  $insert =$conn->query("insert into item_categories(`item_id`,`category`,`sub_category`,`sub_sub_category`) 
  
  Values('".$item_id."','".$cat_id."', '". $sub_cat_id."', '".$sub_sub_cat_id."')");
  if($insert==true)
  {
  $insert_id = mysqli_insert_id($conn);
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Insert Successfully.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
  }

}


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $item = explode("#",$_POST['item_id']);
  $item_id = $item[1];
  $edit_by = $_SESSION['user_id'];
  $edit_at = date('Y-m-d H:i:s');
  
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
  
  if($update_id>0){
  $update = $conn->query("update item_categories set item_id='".$item_id."',category='".$cat_id."',sub_category='".$sub_cat_id."',sub_sub_category='".$sub_sub_cat_id."' where id='".$update_id."'");
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
		
		/*$image = $conn->query("select pic from category_info where id='".$del_id."'");
		$image_data = $image->fetch_object();
		$image_path = $image_data->pic;
		unlink($image_path);*/
		$delete = $conn->query("delete from item_categories where id='".$del_id."'");
	
		if($delete==true){
			$msg = '<span style="color:green; font-weight:bold; font-size:18px;">Data Successfully Deleted.</span>';
		}else{
			$msg = '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
		}

		echo '<script>window.location.href = "item_categories.php";</script>';
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
														Multiple Category </span> 
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
																	<label>Product <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="item_id"  id="item_id" list="item" value=""  class="form-control" required>
                                                                    <datalist id="item">
                                                                      <? foreign_relation('item_info','concat(item_name,"#",item_id)','""','','1');?>
                                                                    </datalist>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Categories <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" list="cat" name="category_id" id="category_id" value="" class="form-control">
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
													<th>Product</th>
													<th>Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Sub Sub Category</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select ic.*,i.item_name,c.category as category_name,sc.category as sub_category_name,ssc.category as sub_sub_category_name from item_categories ic left join item_info i on i.item_id=ic.item_id left join category_info c on c.id=ic.category left join sub_category_info sc on sc.id=ic.sub_category left join sub_sub_category_info ssc on ssc.id=ic.sub_sub_category where 1");
											  $sl=1;
											 while($c_data = $select->fetch_assoc()){
											  if($c_data['sub_sub_category']>0){
											   $cat = find_a_field('sub_sub_category_info','category','id="'.$c_data['sub_sub_category'].'"').'#'.$c_data['sub_sub_category'].'#3';
											    }elseif($c_data['sub_category']>0){
												 $cat = find_a_field('sub_category_info','category','id="'.$c_data['sub_category'].'"').'#'.$c_data['sub_category'].'#2';
												  }else{
													$cat = find_a_field('category_info','category','id="'.$c_data['sub_category'].'"').'#'.$c_data['category'].'#1';
													 }
											 ?> 

												<tr>
												    <td><?=$sl++;?></td>
													<td><?=$c_data['item_name']?></td>
													<td><?=$c_data['category_name']?></td>
                                                    <td><?=$c_data['sub_category_name']?></td>
                                                    <td><?=$c_data['sub_sub_category_name']?></td>
													
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
														Multiple Categories </span> 
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
																	<label>Product <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" name="item_id"  id="item_id" list="item" value="<?=$c_data['item_name'].'#'.$c_data['item_id']?>"  class="form-control" required>
                                                                    <datalist id="item">
                                                                      <? foreign_relation('item_info','item_id','concat(item_name,"#",item_id)','','1');?>
                                                                    </datalist>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Categories <span style="color:#FF0000; font-size:15px;">*</span></label>
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