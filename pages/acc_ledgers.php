<?php 
$page_name="Create Account";  
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
$page_name='customer_setup';

if(isset($_POST['save'])){


  $expense_head = $_POST['expense_head'];
  $details = $_POST['details'];
  $opening = $_POST['opening'];
  
  $entry_by = $_SESSION['user_id'];
  $ledger_group = 1004; //assets
  $check_ledger = find_a_field('ledger','ledger_id','group_for='.$_SESSION['group_for'].' and ledger_name like "%'.$expense_head.'%"');
  if($check_ledger==''){
  $head_type = 'cashBank';
  $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`,`head_type`,`group_for`, entry_by) VALUES ('".$expense_head."', '".$ledger_group."','".$head_type."','".$_SESSION['group_for']."', '".$entry_by."')"); 
  $ledger_id = mysqli_insert_id($conn);
  if($ledger_id>0){

	if($opening>0){
		$max_jv = find_a_field('journal','max(jv_no)','1');
		$tr_from = 'Opening';
		$jv_date = date('Y-m-d');
		$entry_by = $_SESSION['user_id'];

		if($max_jv=='' || $max_jv==0){
			$max_jv = date('Ymd');
		}else{
			$max_jv = $max_jv+1;
		}

		$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `entry_by`,`group_for`) 
		VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."','".$opening."',0,'".$tr_from."','".$entry_by."','".$_SESSION['group_for']."')";
		$journal_insert_dr =$conn->query($rcv_dr);
	}

  	$msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Success</span>';
  }else{
	$msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
  }

  }else{
  $ledger_id = $check_ledger ;
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Already exist!</span>';
  }
 
}

if(isset($_POST['update']) && $_POST['update_id']>0){
  $expense_head = $_POST['expense_head'];
  $entry_by = $_SESSION['user_id'];
  $edit_at = date('Y-m-d H:i:s');
  $details = $_POST['details'];
  $opening = $_POST['opening'];
 
  $ledger =$conn->query("UPDATE `ledger` SET `ledger_name` = '".$expense_head."', edit_by = '".$entry_by."', edit_at = '".$edit_at."' WHERE `ledger_id` = '".$_POST['update_id']."'"); 
	if($ledger){
		if($opening>0){
			//delete old opening
			$del_opening = $conn->query("DELETE FROM `journal` WHERE `ledger_id` = '".$_POST['update_id']."' and `tr_from`='Opening'");
			//insert new opening
			$max_jv = find_a_field('journal','max(jv_no)','1');
			$tr_from = 'Opening';
			$jv_date = date('Y-m-d');
			$entry_by = $_SESSION['user_id'];

			if($max_jv=='' || $max_jv==0){
				$max_jv = date('Ymd');
			}else{
				$max_jv = $max_jv+1;
			}

			$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `entry_by`,`group_for`)
			VALUES ('".$max_jv."','".$jv_date."','".$_POST['update_id']."','".$opening."',0,'".$tr_from."','".$entry_by."','".$_SESSION['group_for']."')";
			$journal_insert_dr =$conn->query($rcv_dr);
			
		}
		$msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Success</span>';
	}else{
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
										<h4 class="card-title"><?=$msg?></h4>
										<button class="btn btn-primary btn-round ml-auto" 
										data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>
											Add New
										</button></a>
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
														Accounts</span> 
														<span class="fw-light">
															Information
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Try to fillup all field</p>
													
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Account Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="expense_head"  id="expense_head" value=""  class="form-control" placeholder="Account Name" required>
																</div>
															</div>

															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Current Balance <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="opening"  id="opening" value=""  class="form-control" placeholder="Current Balance" required>
																</div>
															</div>
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<!--<button type="button" id="" class="btn btn-primary">Add</button>-->
													<input type="submit" name="save" id="" value="Add" class="btn btn-primary" />
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								  </form>

									
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SL</th>
													<th>Account Name</th>
													<th>Current Balance</th>
													<th>Added By</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $total = 0;
											  $select =$conn->query("select * from ledger  where 1 and head_type='cashBank' and group_for=".$_SESSION['group_for']." ");
											 while($c_data = $select->fetch_assoc()){
											 $cur_bal = find_a_field2('journal','sum(dr_amt)-sum(cr_amt)','ledger_id='.$c_data['ledger_id']);
											 $total += $cur_bal;
											 $added_by = find_a_field2('users','name','user_id='.$c_data['entry_by']);	
											 $opening_balance = find_a_field2('journal','sum(dr_amt)','ledger_id='.$c_data['ledger_id']);
											?>

												<tr>
												    <td><?=++$i?></td>
													<td><?=$c_data['ledger_name']?></td>
													<td><?=number_format($cur_bal,2)?></td>
													<td><?=$added_by?></td>
													<td>
														<div class="form-button-action">
															<button type="button"  data-toggle="modal" data-target="#editRowModal<?=$c_data['ledger_id']?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['ledger_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Accounts Information </span> 
														<span class="fw-light">
															Information
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Try to fillup all field</p>
													
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Account Name <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['ledger_id']?>" />
																	<input type="text" list="browsers" name="expense_head"  id="expense_head" value="<?=$c_data['ledger_name']?>"  class="form-control" placeholder="Account Name" required>
																	
																</div>
															</div>
															
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Current Balance <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="opening"  id="opening" value="<?=$opening_balance?>"  class="form-control" placeholder="Current Balance" required>
																</div>
															</div>
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<input type="submit" name="update" id="" value="Update" class="btn btn-primary" />
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</form>
														
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<th></th>
													<th>Total</th>
													<th><?=number_format($total,2)?></th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>