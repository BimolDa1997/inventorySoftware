<?php 



$page_name="User Permission";  



include ('../common/library.php');



include ('../common/helper.php');  



include ('../template/header.php'); 



include ('../template/sidebar.php');


if(isset($_POST['set_menu'])){
	$user = $_GET['user'];
	$del = $conn->query('delete from menu_permission where user_id="'.$user.'"');
	//echo "select m.id,m.menu_name,f.feature_name from menu m, feature f where f.id=m.feature";
	$select =$conn->query("select m.id,m.menu_name,f.feature_name from menu m, feature f where f.id=m.feature");
	while($data=$select->fetch_assoc()){
		$checked = $_POST['get_menu'.$data['id']];
		if($checked=='checked'){
		 $insert =$conn->query("insert into menu_permission(`user_id`,`menu_id`,`status`) Values('".$user."','".$data['id']."','ACTIVE')");
		}
		}
		if($insert==true)
		 {
			  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Permission Assigned!</span>';
			   }
			    else
				{
					$msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
					}
					}




if(isset($_POST['save'])){



  $menu = $_POST['menu'];
  $user = $_POST['user'];
  $status = $_POST['status'];


  $insert =$conn->query("insert into menu_permission(`user_id`,`menu_id`,`status`) Values('".$user."','".$menu."','".$status."')");



  if($insert==true)



  {



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Permission Assigned!</span>';

  
  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}











if(isset($_POST['update'])){



  $update_id = $_POST['update_id'];
  $status = $_POST['status'];

  if($update_id>0){

  $update = $conn->query("update menu_permission set status='".$status."' where id=".$update_id."");



  }


  if($update==true)



  {



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Item Successfully Updated.</span>';


  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }


}





if(isset($_POST['delete'])){







  $delete_id  = $_POST['delete_id'];







  



  if($delete_id>0){



  $update = $conn->query("DELETE FROM `menu_permission` WHERE id='".$delete_id."'");



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



									<div class="d-flex align-items-center" align="center">



										<h4 class="card-title">Set Menu Permission For <strong><?=$_REQUEST['username']?> &nbsp;&nbsp;<?=$msg; ?></strong></h4>



									</div>



								</div>


<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">
								<div class="card-body">



				<div align="center">					


<input type="submit" name="set_menu" id="set_menu" class="btn btn-primary btn-round ml-auto" value="Click Here To Save">
</div>





									<div class="table-responsive">


                                       
										<table id="add-row" class="display table table-striped table-hover" >



											<thead>



												<tr>



													<th>Sl</th>
                                                    
                                                    <th>Check</th>



													<th>Feature</th>



													<th>Menu Name</th>



													<th>User</th>



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



													<th></th>



												</tr>



											</tfoot>



											<tbody>



											<?php



											  $select =$conn->query("select m.id,m.menu_name,f.feature_name from menu m, feature f where f.id=m.feature");



											  $i=1;



											 while($c_data = $select->fetch_assoc()){
												 
												 $user_check = find_a_field('menu_permission','user_id','menu_id="'.$c_data['id'].'" and user_id="'.$_GET['user'].'"');
												 ?>







												<tr>



												    <td><?=$i++;?></td>
                                                    
                                                    <td><input type="checkbox" name="get_menu<?=$c_data['id']?>" id="get_menu<?=$c_data['id']?>" value="checked" style="transform: scale(1.5);" <? if($user_check==$_GET['user']) echo 'checked';?>/></td>



													<td><?=$c_data['feature_name']?></td>



													<td><?=$c_data['menu_name']?></td>



													<td><?=$c_data['username']?></td>



													<td><?=$c_data['status'];?></td>



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



														User </span> 



														<span class="fw-light">



															Permission



														</span>



													</h5>



													<button type="button" class="close" data-dismiss="modal" aria-label="Close">



														<span aria-hidden="true">&times;</span>



													</button>



												</div>



												<div class="modal-body">



													<p class="small">Make Sure Fillup All Field</p>



													



														<div class="row">



															



															<input type="hidden" name="update_id"  id="update_id"  class="form-control" value="<?=$c_data['id']?>" readonly required>



																



															<div class="col-md-12">



																<div class="form-group form-group-default">



																	<label>User <span style="color:#FF0000; font-size:15px;">*</span></label>



																	<select name="status" id="status" class="form-control" required>


                                                                       <option <?=($c_data['status']=='ACTIVE')?'selected':''?>>ACTIVE</option>
                                                                       <option <?=($c_data['status']=='DEACTIVE')?'selected':''?>>DEACTIVE</option>



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



															



															<button type="button" data-toggle="modal" data-target="#viewModal<?=$c_data['id']?>" title="" class="btn btn-link btn-danger" data-original-title="Remove">



																<i class="fa fa-times"></i>



															</button>



															



															



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
                                        </form>



									</div>



								</div>



							</div>



						</div>



					</div>











			</div>











<?php include('../template/footer.php');?>