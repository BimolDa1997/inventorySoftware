<?php 



$page_name="Color Setup";  



include ('../common/library.php');



include ('../common/helper.php');  



include ('../template/header.php'); 



include ('../template/sidebar.php');







if(isset($_POST['save'])){



  $cupon = $_POST['cupon_code'];
  $type = $_POST['type'];
  $discount = $_POST['discount'];
  $limit = $_POST['cupon_limit'];
  $expire = $_POST['expire'];
  if($type=='Discount Amount'){
	  $amount = $discount;
	  $percent = 0;
	  }elseif($type=='Discount Percentage'){
		  $percent = $discount;
		  $amount = 0;
		  }else{
			  $percent = 0;
		      $amount = 0;
			  }
 
  $insert =$conn->query("insert into cu_pons(`cupon_code`,`type`,`cupon_limit`,`amount`,`discount_percent`,`expire`,`entry_by`,`entry_at`) Values('".$cupon."','".$type."','".$limit."','".$amount."','".$percent."','".$expire."','".$_SESSION['user_id']."','".date('Y-m-d H:i:s')."')");



  if($insert==true)



  {



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Cupon Added!</span>';

  
  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}











if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $cupon = $_POST['cupon_code'];
  $type = $_POST['type'];
  $discount = $_POST['discount'];
  $limit = $_POST['cupon_limit'];
  $expire = $_POST['expire'];
  $status = $_POST['status'];
  if($type=='Discount Amount'){
	  $amount = $discount;
	  $percent = 0;
	  }elseif($type=='Discount Percentage'){
		  $percent = $discount;
		  $amount = 0;
		  }else{
			  $percent = 0;
		      $amount = 0;
			  }
  
  if($update_id>0){

  $update = $conn->query("update cu_pons set cupon_code='".$cupon."',type='".$type."',cupon_limit='".$limit."',expire='".$expire."',amount='".$amount."',discount_percent='".$percent."',status='".$status."',edit_by='".$_SESSION['user_id']."',edit_at='".date('Y-m-d H:i:s')."' where id=".$update_id."");



  }


  if($update==true)



  {



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Cupon Successfully Updated.</span>';


  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }


}





if(isset($_POST['delete'])){







  $delete_id  = $_POST['delete_id'];







  



  if($delete_id>0){



  $update = $conn->query("DELETE FROM `color` WHERE id='".$delete_id."'");



  }



  



  if($update==true)



  {



 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Permission Successfully Deleted.</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }



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



														Color</span> 



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





															<div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Cupon Code</label>



																	<input type="cupon_code" name="cupon_code" id="color" class="form-control">


                                                                  
																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Cupon Type</label>



																	<select name="type" id="type" class="form-control" required>
                                                                    <option></option>
                                                                    <option>Discount Amount</option>
                                                                    <option>Discount Percentage</option>
                                                                    <option>Free Delivery</option>
                                                                    </select>


                                                                  
																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Discount</label>



																	<input type="type" name="discount" id="discount" class="form-control">


                                                                  
																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Limit</label>



																	<input type="type" name="cupon_limit" id="cupon_limit" class="form-control">


                                                                  
																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Expire Date</label>



																	<input type="date" name="expire" id="expire" class="form-control">


                                                                  
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



													<th>Sl</th>



													<th>Cupon Code</th>
                                                    <th>Type</th>
                                                    <th>Discount Amount</th>
                                                    <th>Discount Percentage</th>
                                                    <th>Limit</th>
                                                    <th>Expire</th>
                                                    <th>Status</th>



													<th style="width:10%">Action</th>



												</tr>



											</thead>



											<tfoot>



											      <tr>



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



											  $select =$conn->query("select * from cu_pons where 1");



											  $i=1;



											 while($c_data = $select->fetch_assoc()){ ?>







												<tr>



												    <td><?=$i++;?></td>



													<td><?=$c_data['cupon_code']?></td>
                                                    <td><?=$c_data['type']?></td>
                                                    <td><?=$c_data['amount']?></td>
                                                    <td><?=$c_data['discount_percent']?></td>
                                                    <td><?=$c_data['cupon_limit']?></td>
                                                    <td><?=$c_data['expire']?></td>
                                                    <td><?=$c_data['status']?></td>



													<td>



														<div class="form-button-action">



															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">



																<i class="fa fa-edit"></i>



															</button>



															



							<!--- edit modal -->			



								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			



									<div class="modal fade" id="editRowModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">



										<div class="modal-dialog" role="document">



											<div class="modal-content">



												<div class="modal-header no-bd">



													<h5 class="modal-title">



														<span class="fw-mediumbold">



														Cupon </span> 



														<span class="fw-light">



															Update



														</span>



													</h5>



													<button type="button" class="close" data-dismiss="modal" aria-label="Close">



														<span aria-hidden="true">&times;</span>



													</button>



												</div>



												<div class="modal-body">



													<p class="small"></p>



													



														<div class="row">



															



															<input type="hidden" name="update_id"  id="update_id"  class="form-control" value="<?=$c_data['id']?>" readonly required>



																



															<div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Cupon Code <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="cupon_code" id="cupon_code" class="form-control" value="<?=$c_data['cupon_code']?>" required>


																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Cupon Type <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<select name="type" id="type" class="form-control" required>
                                                                    <option></option>
                                                                    <option <?=($c_data['type']=='Discount Amount')?'selected':''?>>Discount Amount</option>
                                                                    <option <?=($c_data['type']=='Discount Percentage')?'selected':''?>>Discount Percentage</option>
                                                                    <option <?=($c_data['type']=='Free Delivery')?'selected':''?>>Free Delivery</option>
                                                                    </select>


																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Discount <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="discount" id="discount" class="form-control" value="<?=($c_data['amount']>0)?$c_data['amount']:$c_data['discount_percent']?>" required>
                                                                    

																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Expire <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="date" name="expire" id="expire" class="form-control" value="<?=$c_data['expire']; ?>" required>
                                                                    

																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Limit <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="cupon_limit" id="cupon_limit" class="form-control" value="<?=$c_data['cupon_limit']; ?>" required>
                                                                    

																</div>



															</div>
                                                            
                                                            <div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>Status <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<select name="status" id="status" class="form-control" required>
                                                                    <option></option>
                                                                    <option <?=($c_data['status']=='Active')?'selected':''?>>Active</option>
                                                                    <option <?=($c_data['status']=='Inactive')?'selected':''?>>Inactive</option>
                                                                    <option <?=($c_data['status']=='Cancel')?'selected':''?>>Cancel</option>
                                                                    
                                                                    </select>


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



															


<!--<button type="button" data-toggle="modal" data-target="#viewModal<?=$c_data['id']?>" title="" class="btn btn-link btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></button>-->



															



															



	<!--delete modal -->	



  <form action="" method="post">				



	<div class="modal fade show" id="viewModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-labelledby=""aria-modal="true">



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



				    <input type="hidden" name="delete_id" value="<?=$c_data['id']?>"  />



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