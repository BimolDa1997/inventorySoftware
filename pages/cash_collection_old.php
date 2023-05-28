<?php 
$page_name="cash_collection";  
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
$page_name='customer_setup';

if(isset($_POST['payment_save'])){
  $customer_id = $_POST['customer_id'];
  $sales_amount = $_POST['sales_amount'.$customer_id];
  $collection = $_POST['collection'.$customer_id];
  $discount = $_POST['discount'.$customer_id];
  $payment_type = $_POST['payment_type'.$customer_id];
  $details = $_POST['details'.$customer_id];
  $total_collection = $_POST['total_collection'.$customer_id];
  $customer_ledger = $_POST['ledger_id'.$customer_id];
  $status = 'PROCESSING';
  $entry_by = $_SESSION['user_id'];
  
  //journal start
if($total_collection>0){
$max_jv = find_a_field('journal','max(jv_no)','1');
$tr_from = 'Receipt';
$cr_ledger = 1000002;
$jv_date = date('Y-m-d');
$status = 'Paid';
$entry_by = '';
$discount_ledger = 1000004;

if($max_jv=='' || $max_jv==0){
$max_jv = date('Ymd');
}else{
$max_jv = $max_jv+1;
}


if($discount>0){
$rest_amt = $total_collection-$discount;
$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$rest_amt."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_dr =$conn->query($rcv_dr);
$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$rest_amt."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_cr =$conn->query($rcv_cr); 

$tr_from = 'Discount';
 $discount_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$discount_ledger."','".$discount."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_dr =$conn->query($discount_dr);
$discount_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$discount."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_cr =$conn->query($discount_cr); 
}else{
 
 $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$total_collection."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_dr =$conn->query($rcv_dr);
$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."',0,'".$total_collection."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";
$journal_insert_cr =$conn->query($rcv_cr); 


}

}
//journa end

  $_SESSION['sale_no'] = '';
  }
  


if(isset($_POST['update'])){

  $update_id = $_POST['update_id'];
  $business_name = $_POST['business_name1'];
  $propritor_name = $_POST['propritor_name1'];
  $mobile_no = $_POST['mobile_no1'];
  $customer_address = $_POST['customer_address1'];
  $credit_limit = $_POST['credit_limit1'];
  $previous_due = $_POST['business_name1'];
  $previous_advance = $_POST['business_name1'];
  $entry_by = $_SESSION['user_id'];
  
  if($update_id>0){
  $update = $conn->query("update customer_info set business_name='".$business_name."',propritor_name='".$propritor_name."',mobile_no='".$mobile_no."',customer_address='".$customer_address."',credit_limit='".$credit_limit."',entry_by='".$entry_by."' where id='".$update_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Customer Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}

if(isset($_POST['advance_collect'])){
   
   $party_name = $_POST['party_name'];
   $collection_date = date('Ý-m-d');
   $payment_type = $_POST['payment_terms'];
   $advance = $_POST['advance_collection'];
   $customer_type = $_POST['customer_type'];
   
   $max_jv = find_a_field('journal','max(jv_no)','1');
   $tr_from = 'Advance';
   $cr_ledger = 1000002;
   $jv_date = date('Y-m-d');
   $status = 'Advance';
   $entry_by = '';
   

   if($max_jv=='' || $max_jv==0){
   $max_jv = date('Ymd');
   }else{
   $max_jv = $max_jv+1;
   }
 
 $r_dealer = find_a_field('customer_info','id','business_name like "%'.$party_name.'%"');
   $ledger_id = find_a_field('customer_info','ledger_id','id="'.$r_dealer.'"');
   if($r_dealer=='' || $r_dealer==0){
   $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type` , `group_for`) VALUES ('".$dealer_name."', '1001', '".$_SESSION['group_for']."')"); 
   $ledger_id = mysqli_insert_id($conn);
   $insert =$conn->query("insert into customer_info(`business_name`,`propritor_name`,`ledger_id`,`customer_type`,`group_for`) Values('".$party_name."','".$party_name."','".$ledger_id."','".$customer_type."','".$_SESSION['group_for']."')");
   $r_dealer = mysqli_insert_id($conn);
   }
   
   $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$advance."',0,'".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payment_type."')";
$journal_insert_dr =$conn->query($rcv_dr);
$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `status`,`entry_by`,`group_for`,`payment_type`) VALUES ('".$max_jv."','".$jv_date."','".$ledger_id."',0,'".$advance."','".$tr_from."','".$status."','".$entry_by."','".$_SESSION['group_for']."','".$payment_type."')";
$journal_insert_cr =$conn->query($rcv_cr); 
}


?>
<style>
 
 .loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid blue;
  border-right: 10px solid green;
  border-bottom: 10px solid red;
  width: 50px;
  height: 50px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  
}
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>
		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
							<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#withoutSales">
											<i class="fa fa-plus"></i>
											Advance Collection
										</button>
									</div>
								</div>
								
								<div class="card-body">
									
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Code</th>
													<th>Business Name</th>
													<th>Propritor Name</th>
													<th>Mobile No.</th>
													<th>Total Due</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
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
											 $sql = "select c.*,sum(j.dr_amt-j.cr_amt) as total_receivable from customer_info c, journal j where j.group_for=".$_SESSION['group_for']." and c.ledger_id=j.ledger_id and c.status='Active' group by j.ledger_id";
											  $select =$conn->query($sql);
											 while($c_data = $select->fetch_assoc()){ 
											  if($c_data['total_receivable']>0){
											 ?>
                                                 
												<tr>
												    <td><?=$c_data['id']?></td>
													<td><?=$c_data['business_name']?></td>
													<td><?=$c_data['propritor_name']?></td>
													<td><?=$c_data['mobile_no']?></td>
													<td><?=$c_data['total_receivable']?></td>
													<td>
														<div class="form-button-action">
															<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#editRowModal<?=$c_data['id']?>" id="pay" onclick="pay(<?=$c_data['id']?>);">
											
											Cash Collectoin
										</button>
									</div>
								</div>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Customer </span> 
														<span class="fw-light">
															Information
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="loader" id="load<?=$c_data['id']?>" align="center" title="Internet maybe slow" style="margin-left:44%;"></div>
												<div class="modal-body">
												
													<p class="small">* Mendatory Field</p>
													
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Party <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="hidden" name="c_no<?=$c_data['id']?>"  id="c_no<?=$c_data['id']?>"  class="form-control" value="<?=$c_data['id']?>">
																	<input type="hidden" name="customer_id"  id="customer_id"  class="form-control" value="<?=$c_data['id']?>">
																	<input type="hidden" name="ledger_id<?=$c_data['id']?>"  id="ledger_id<?=$c_data['id']?>"  class="form-control" value="<?=$c_data['ledger_id']?>">
																	
																	<input type="text" name="party<?=$c_data['id']?>"  id="party<?=$c_data['id']?>"  class="form-control" value="" style="font-size:15px; font-weight:bold;" readonly>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Collection Date <span style="color:#FF0000; font-size:15px;"></span></label>
																	
																	<input type="text" name="sales_dates<?=$c_data['id']?>"  id="sales_dates<?=$c_data['id']?>"  class="form-control" value="<?=date('Y-M-d')?>" readonly>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Total Due <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="text" name="sales_amount<?=$c_data['id']?>"  id="sales_amount<?=$c_data['id']?>"  class="form-control" value="" style="font-size:15px; font-weight:bold;" required readonly>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Collection<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="collection<?=$c_data['id']?>"  id="collection<?=$c_data['id']?>"  class="form-control" value="" onchange="paycal(<?=$c_data['id']?>)" required>
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Discount</label>
																	<input name="discount<?=$c_data['id']?>" id="discount<?=$c_data['id']?>" type="text" class="form-control" value="" onchange="paycal(<?=$c_data['id']?>)">
																</div>
															</div>
															
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Payment Type<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="payment_type<?=$c_data['id']?>"  id="payment_type<?=$c_data['id']?>"  class="form-control">
																	<option></option>
																	<option>Cash</option>
																	<option>Bank</option>
																	<option>Commision</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Details/Money Receipt<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="details<?=$c_data['id']?>" id="details<?=$c_data['id']?>" type="text" class="form-control" value="" required>
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Total Collection</label>
																	<input name="total_collection<?=$c_data['id']?>" id="total_collection<?=$c_data['id']?>" type="text" class="form-control" value="">
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Due</label>
																	<input name="due<?=$c_data['id']?>" id="due<?=$c_data['id']?>" type="text" class="form-control" value="">
																</div>
															</div>
															
															
															
														</div>
													
												</div>
												<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="payment_save" id="payment_save" class="btn btn-primary">
                </div>
											</div>
										</div>
									</div>
									
									</td>
												</tr>
												<?php } } ?>
												
											</tbody>
										</table>
										</form>
									
									<!--For Without Sales Collection-->
									<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">	
									<div class="modal fade" id="withoutSales" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Advance </span> 
														<span class="fw-light">
															Collection
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												
												<div class="modal-body">
												
													<p class="small">* Mendatory Field</p>
													
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Party <span style="color:#FF0000; font-size:15px;"></span></label>
																	
																	<input type="text" name="party_name"  list="partylist" class="form-control form-control-sm" id="party_name"  />
													               <datalist id="partylist">
																	 <? 
																	  $s = $conn->query("select business_name from customer_info where group_for = '".$_SESSION['group_for']."'");
																	  while($dealer = $s->fetch_assoc()){
																	 ?>
                                                                        <option value="<?=$dealer['business_name']?>">
                                                                       <? } ?>
                                                                     </datalist>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Customer Type <span style="color:#FF0000; font-size:15px;"></span></label>
																	
																	<select  name="customer_type"  id="customer_type"  class="form-control" required>
																	  <option></option>
																	  <option>Corporate</option>
																	  <option>Registered</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Collection Date <span style="color:#FF0000; font-size:15px;"></span></label>
																	
																	<input type="date" name="collection_date"  id="collection_date"  class="form-control" value="<?=date('Y-M-d')?>">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Total Advance Collection <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="text" name="advance_collection"  id="advance_collection"  class="form-control" value="" style="font-size:15px; font-weight:bold;" required>
																</div>
															</div>
															
															
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Payment Type<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="payment_terms"  id="payment_terms"  class="form-control">
																	<option></option>
																	<option>Cash</option>
																	<option>Bank</option>
																	
																	</select>
																</div>
															</div>
															
														</div>
													
												</div>
												<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="advance_collect" id="advance_collect" class="btn btn-primary">
                </div>
											</div>
										</div>
									</div>
									<!--For Without Sales Collection-->
								</form>
															
															<!--edit modal end-->
															
															
															
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>
<script>
function pay(id){
$(document).ready(function() {
    
		$.ajax({
		url: "collection_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
		c_no: $("#c_no"+id).val()
		},
		success: function(data){

		$("#sales_amount"+id).val(data.c_info.total_amt);
		$("#party"+id).val(data.c_info.business_name);
		$("#load"+id).attr("style","display:none");
		
		}
		})
		
		
});
}

function paycal(id){ 

var sales_amount = (document.getElementById('sales_amount'+id).value)*1;
var collectoin = (document.getElementById('collection'+id).value)*1;
var discount = (document.getElementById('discount'+id).value)*1;
var total = collectoin+discount;

var due = sales_amount-(collectoin+discount);
document.getElementById('total_collection'+id).value = total.toFixed(2);
document.getElementById('due'+id).value = due.toFixed(2);
}
</script>

<?php include('../template/footer.php');?>