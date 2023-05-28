<?php 
$page_name="Transection History";  
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
$page_name='customer_setup';

if(isset($_POST['save']) || isset($_POST['update'])){


  $expense_head = $_POST['expense_head'];
  $details = $_POST['details'];
  $expense_date = $_POST['expense_date'];
  $expense_amount = $_POST['expense_amount'];
  $payment_type = explode("#",$_POST['payment_type']);
  $previous_due = $_POST['business_name'];
  $previous_advance = $_POST['business_name'];
  $entry_by = $_SESSION['user_id'];
  $ledger_group = 1002; //income
  $check_ledger = find_a_field('ledger','ledger_id','group_for='.$_SESSION['group_for'].' and ledger_name like "%'.$expense_head.'%"');
  if($check_ledger==''){
  $head_type = 'Expense';
  $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type`,`head_type`,`group_for`) VALUES ('".$expense_head."', '".$ledger_group."','".$head_type."','".$_SESSION['group_for']."')"); 
  $ledger_id = mysqli_insert_id($conn);
  }else{
  $ledger_id = $check_ledger ;
  }
  
$max_jv = find_a_field('journal','max(jv_no)','1');
$tr_from = 'Expense';
$cr_ledger = $payment_type[0];
$jv_date = $_POST['expense_date'];
$status = 'Paid';
$entry_by = '';
$discount_ledger = 1000004;
$tr_no = '';

if($_POST['jv_no']>0){
  $delquery = "DELETE FROM journal WHERE jv_no =".$_POST['jv_no'];
  $conn->query($delquery);
  
  $max_jv = $_POST['jv_no'];
}else{


if($max_jv=='' || $max_jv==0){
$max_jv = date('Ymd');
}else{
$max_jv = $max_jv+1;
}

}

$expense_dr_sql = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`,`narration`, `tr_from`, `tr_no`,`tr_type`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."','".$expense_amount."',0,'".$details."','".$tr_from."','".$tr_no."','".$payment_type[1]."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$expenses_dr =$conn->query($expense_dr_sql);
$expense_cr_sql = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`,`narration`, `tr_from`, `tr_no`,`tr_type`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$expense_amount."','".$details."','".$tr_from."','".$tr_no."','".$payment_type[1]."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$expenses_cr =$conn->query($expense_cr_sql); 
  if($expenses_dr==true && expenses_cr==true)
  {
  
//photo
if($_FILES['att_file']['name']!=''){
$target_dir = "../files/journal/";
$target_file = $target_dir . basename($_FILES["att_file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$file_name = $max_jv.'.'.$imageFileType;
if ($_FILES["att_file"]["size"] > 500000) {
$msg = "Sorry, your file is too large.";
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}else{
move_uploaded_file($_FILES["att_file"]["tmp_name"], $target_dir.$file_name); 
}
}
//photo end
 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Expense Inserted.</span>';
  
  }
  else
  {
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
*/ ?>

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?></h4>
										
									</div>
									<div class="row">
									   <div class="col-12 center">
									   <form action="" method="post">
									     <div class="row">
									      <div class="col-4">
										     <input type="date" class="form-control" name="fdate" value="<? if($_POST['fdate'] !='') echo $_POST['fdate']; else echo date('Y-m-01');?>"  />
										  </div>
										  <div class="col-4">
										     <input type="date" class="form-control" name="tdate" value="<? if($_POST['tdate'] !='') echo $_POST['tdate']; else echo date('Y-m-d');?>"  />
										  </div>
										   <div class="col-2">
										     <button class="btn btn-info" name="show">Show</button>
										   </div>
										 </div> 
									   </form> 
									   </div>
									   
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									

									<div class="table-responsive">
						<?php if(isset($_POST['show'])) { ?>			
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SL</th>
													<th>Account Name</th>
													<th>Details</th>
													<th>Amount IN</th>
													<th>Amount OUT</th>
													<th>Balance</th>
													<th>Date</th>
													<th>Tr Type</th>
													<th>Added By</th>
													
												</tr>
											</thead>
											
											<tbody>
											<?php

											$select =$conn->query("select j.*,a.ledger_name, j.dr_amt ,j.cr_amt  
											  from journal j, ledger a 
											  where 1 and a.head_type='cashBank' and j.group_for=".$_SESSION['group_for']."  and a.ledger_id=j.ledger_id and j.jv_date between '".$_POST['fdate']."' and '".$_POST['tdate']."' group by j.jv_no,j.ledger_id order by j.jv_date desc ");
											 while($c_data = $select->fetch_assoc()){
												$balance = $c_data['dr_amt'] - $c_data['cr_amt'];
												$restAmount = $restAmount + $balance;
												$added_by = $conn->query("select name from users where user_id=".$c_data['entry_by'])->fetch_assoc();
											?>

												<tr>
												    <td><?=++$i?></td>
													<td><?=$c_data['ledger_name']?></td>
													<td><?=$c_data['narration']?></td>
													<td><?=$c_data['dr_amt']?></td>
													<td><?=$c_data['cr_amt']?></td>
													<td><?php echo $restAmount; ?></td>
													<td><?=$c_data['jv_date']?></td>
													<td><?=$c_data['tr_from']?></td>
													<td><?=$added_by['name']?></td>
													
												</tr>
												<?php } ?>
												
											</tbody>
										</table>
									<?php  } ?>	
										
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>