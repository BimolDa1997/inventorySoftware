<?php 

$page_name='cash_payment';

 

include ('../common/library.php');  

include ('../common/helper.php');  

include ('../template/header.php'); 

include ('../template/sidebar.php');





if(isset($_POST['payment_save']) || isset($_POST['payment_update'])){

  $customer_id = $_POST['supplier_id'];

  $total_collection = $_POST['amount'];

  

  $str =  $_POST['ledger_id'];

  $data = explode("::",$str);

  

  $customer_ledger = $data[0];

  $status = 'PROCESSING';

  $entry_by = $_SESSION['user_id'];

  if($_POST['payment_type']==1000007){ $payType='Cash'; }elseif($_POST['payment_type']==1000008){ $payType='Bank';}elseif($_POST['payment_type']==1000009){ $payType='Commission'; }   else{ $payType=$_POST['payment_type']; } 

  $narration = 'Payment type : '.$payType.' ##  Money receipt details : '.$_POST['money_receipt'];

  

  //journal start

if($total_collection>0){

$max_jv = find_a_field('journal','max(jv_no)','1');

$tr_from = 'Payment';

$cr_ledger = $_POST['payment_type'];

$jv_date = $_POST['jv_date'];

$status = 'Paid';

$entry_by = $_SESSION['user_id'];

$discount_ledger = 1000004;



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



 $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`) VALUES ('".$max_jv."','".$jv_date."','".$customer_ledger."','".$total_collection."',0,'".$tr_from."','','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."','".$narration."' )";

$journal_insert_dr =$conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`,`narration`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$total_collection."','".$tr_from."','','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."','".$narration."')";

$journal_insert_cr =$conn->query($rcv_cr); 





}

//journa end



  $_SESSION['purchase_no'] = '';

  }

  

//============>>>>>     Delete    <<<<<<<<<=============\\



if(isset($_POST['payment_delete'])&&$_POST['jv_no']>0){

	$del = "DELETE FROM journal WHERE jv_no = ".$_POST['jv_no']."";

	$delCon = $conn->query($del); 



	if($delCon){

		$msg = "Successfully Deleted !";

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

				

                                 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">	

									<div class="modal fade" id="withoutSales" tabindex="-1" role="dialog" aria-hidden="true">

										<div class="modal-dialog modal-lg" role="document">

											<div class="modal-content">

												<div class="modal-header no-bd">

													<h5 class="modal-title">

														<span class="fw-mediumbold">

														Supplier Payment </span> 

														<span class="fw-light">

															

														</span>

													</h5>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close">

														<span aria-hidden="true">&times;</span>

													</button>

												</div>

												

												<div class="modal-body">

												

													<p class="small">* Mendatory Field </p>

													

														<div class="row">

															<div class="col-8">

																<div class="form-group form-group-default">

																	<label>Select Supplier <span style="color:#FF0000; font-size:15px;">*</span></label>

																	

																	<input type="text" onchange="pay()" autocomplete="off" name="ledger_id"  list="partylist" class="form-control form-control-sm" id="ledger_id"  />

													               <datalist id="partylist">

																	 <?php 

																	  $s = $conn->query("select supplier_name,ledger_id from supplier_info where status like 'Active' and group_for = '".$_SESSION['group_for']."'");

																	  while($dealer = $s->fetch_assoc()){

																	 ?>

                                                                        <option value="<?=$dealer['ledger_id']?> :: <?=$dealer['supplier_name']?>"></option>

                                                                       <?php } ?>

                                                                     </datalist>

																</div>

															</div>

															

															<div class="col-4">

																<div class="form-group form-group-default">

																	<label>Date <span style="color:#FF0000; font-size:15px;">*</span></label>

																	<input type="date"  autocomplete="off" name="jv_date" value="<?php echo date('Y-m-d'); ?>" required  class="form-control form-control-sm" id="jv_date"  />

																</div>

															</div>

															

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Amount Tk<span style="color:#FF0000; font-size:15px;">*</span></label>

																	

																	<input type="text" autocomplete="off" name="amount" id="amount" class="form-control" value="" onblur="paycal()"  required />

																</div>

															</div>

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Payment type <span style="color:#FF0000; font-size:15px;">*</span></label>

																	

															<select name="payment_type<?=$c_data['id']?>"  id="payment_type<?=$c_data['id']?>"  class="form-control" required>

																	<option></option>

																	<option value="1000007">Cash</option>

																	<option value="1000008">Bank</option>

																	<option value="1000009">Commision</option>

																	</select>

																</div>

															</div>

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Money receipt details <span style="color:#FF0000; font-size:15px;"></span></label>

																	<input type="text" name="money_receipt"  id="money_receipt"  class="form-control" value="" style="font-size:15px; font-weight:bold;" >

																</div>

															</div>

															

															

															<div class="col-sm-3">

																<div class="form-group form-group-default">

																	<label>Current due</label>

																	<input type="text" name="due" id="due" class="form-control" value="" readonly="" />

																</div>

															</div>

															

															<div class="col-12">

																<div class="form-group form-group-default">

																	<label>In word : <span id="words"></span></label>

																	

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

									<!--For Without Sales Collection-->

								</form>

								



                     <div class="row">

						<div class="col-md-12">

							<div class="card">

								<div class="card-header">

									<div class="d-flex align-items-center">

										<h4 class="card-title">Supplier payment list <?=$msg?></h4>

										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#withoutSales">

											<i class="fa fa-plus"></i>

											Add Payment

										</button>

									</div>

								</div>

								<div class="card-body">

									

									<div class="table-responsive">

										<table id="add-row" class="display table table-striped table-hover" >

											<thead>

												<tr>

													<th>Sl</th>

													<th>Supplier Name</th>

													<th>Date</th>

													<th>Details</th>

													<th>Mobile No.</th>

													<th>Amount</th>

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

													<th></th>

												</tr>

											</tfoot>

											<tbody>

											<?php

											 $sql = "select c.*,j.narration,j.jv_no ,j.jv_date,sum(j.dr_amt) as total_payable from supplier_info c, journal j where j.group_for=".$_SESSION['group_for']." and c.ledger_id=j.ledger_id and j.tr_from like 'Payment' and c.status='Active' group by j.jv_no order by jv_no desc";

											  $select =$conn->query($sql);$i=1;

											 while($c_data = $select->fetch_assoc()){ 

											 ?>

                                                 

												<tr>

												    <td><?=$i++?></td>

													<td><?=$c_data['supplier_name']?></td>

													<td><?=date('d-m-Y', strtotime($c_data['jv_date']));?></td>

													<td><?=$c_data['narration']?></td>

													<td><?=$c_data['phone_no']?></td>

													<td><?=$c_data['total_payable']?></td>

													<td><button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#editPayment<?=$c_data['jv_no']?>">

											              <i class="fa fa-edit"></i>

											                   Edit Payment

										                </button></td>

													

						

									<div class="modal fade" id="editPayment<?=$c_data['jv_no']?>" tabindex="-1" role="dialog" aria-hidden="true">

										<div class="modal-dialog modal-lg" role="document">

											<div class="modal-content">

												<div class="modal-header no-bd">

													<h5 class="modal-title">

														<span class="fw-mediumbold">

														Update Supplier Payment </span> 

														<span class="fw-light">

															

														</span>

													</h5>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close">

														<span aria-hidden="true">&times;</span>

													</button>

												</div>

												

												<div class="modal-body">

												

													<p class="small">* Mendatory Field </p>

											<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			

														<div class="row">

															<div class="col-8">

																<div class="form-group form-group-default">

																	<label>Select Supplier <span style="color:#FF0000; font-size:15px;">*</span></label>

																	

																	<input type="text" onchange="payId(<?=$c_data['jv_no'];?>)" autocomplete="off" name="ledger_id" value="<?=$c_data['ledger_id'].' :: '.$c_data['supplier_name']?>"  list="partylist" class="form-control form-control-sm" id="ledger_id<?=$c_data['jv_no'];?>"  />

													               <datalist id="partylist">

																	 <? 

																	  $s = $conn->query("select supplier_name,ledger_id from supplier_info where status like 'Active' and group_for = '".$_SESSION['group_for']."'");

																	  while($dealer = $s->fetch_assoc()){

																	 ?>

                                                                        <option value="<?=$dealer['ledger_id']?> :: <?=$dealer['supplier_name']?>"></option>

                                                                       <? } ?>

                                                                     </datalist>

																</div>

															</div>

															

															<div class="col-4">

																<div class="form-group form-group-default">

																	<label>Date <span style="color:#FF0000; font-size:15px;">*</span></label>

																	<input type="hidden" name="jv_no" id="jv_no<?=$c_data['jv_no'];?>" value="<?=$c_data['jv_no'];?>"  />

																	<input type="date"  autocomplete="off" name="jv_date" value="<?=$c_data['jv_date'];?>" required  class="form-control form-control-sm" id="jv_date"  />

																</div>

															</div>

															

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Amount Tk<span style="color:#FF0000; font-size:15px;">*</span></label>

																	

																	<input type="text" autocomplete="off" name="amount" id="amount<?=$c_data['jv_no']; ?>" value="<?=$c_data['total_payable']; ?>"  class="form-control" value="" onblur="paycalId(<?=$c_data['jv_no'];?>)"  required />

																</div>

															</div>

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Payment type <span style="color:#FF0000; font-size:15px;">*</span></label>

																	

															<select name="payment_type"  id="payment_type<?=$c_data['jv_no'];?>"  class="form-control" required>

																	<option></option>

																	<?php $cashLedger = find_a_field('journal','ledger_id','cr_amt > 0 and jv_no ='.$c_data['jv_no']);?>

																	<option <?php if($cashLedger==1000007) echo 'selected'; ?> value="1000007">Cash</option>

																	<option <?php if($cashLedger==1000008) echo 'selected'; ?>  value="1000008">Bank</option>

																	<option <?php if($cashLedger==1000009) echo 'selected'; ?>  value="1000009">Commision</option>

																	</select>

																</div>

															</div>

															<div class="col-3">

																<div class="form-group form-group-default">

																	<label>Money receipt details <span style="color:#FF0000; font-size:15px;"></span></label>

																	<?php $money = explode(":",$c_data['narration']);?>

																	<input type="text" name="money_receipt"  id="money_receipt<?=$c_data['jv_no'];?>"  class="form-control" value="<?=$money[2];?>" style="font-size:15px; font-weight:bold;" >

																</div>

															</div>

															

															

															<div class="col-sm-3">

																<div class="form-group form-group-default">

																	<label>Current due</label>

																	<?php $duee = find_a_field('journal','sum(cr_amt-dr_amt)','group_for = '.$_SESSION['group_for'].' and ledger_id='.$c_data['ledger_id']);?>

																	<input type="hidden" name="due" id="dueHidden<?=$c_data['jv_no'];?>" class="form-control" value="<?=$duee+$c_data['total_payable'];?>" />

																	<input type="text" name="due" id="due<?=$c_data['jv_no'];?>" class="form-control" value="<?=$duee;?>" readonly="" />

																</div>

															</div>

															

															<!--<div class="col-12">

																<div class="form-group form-group-default">

																	<label>In word : <span id="words"></span></label>

																	

																</div>

															</div>-->

															

														</div>

														<div class="modal-footer" style="float:right">

                   												 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    											 <input type="submit" name="payment_delete" id="payment_delete" value="Delete" class="btn btn-danger">

																 <button type="submit" name="payment_update" class="btn btn-primary">Update</button>

                										</div>

													</form>

												</div>

				

											</div>

										</div>

									</div>

									<!--For Without Sales Collection-->

															

												</tr>

												<?php  } ?>

												

											</tbody>

										</table>

									</div>

								</div>

							</div>

						</div>

					</div>





			</div>

<script>

function pay(){

$(document).ready(function() {

    

		$.ajax({

		url: "cash_payment_ajax.php",

		method: "POST",

		dataType:"json",

		data:{

		c_no: $("#ledger_id").val()

		},

		success: function(data){



		$("#due").val(data.c_info.total_amt);

		$("#party"+id).val(data.c_info.supplier_name);

		$("#load"+id).attr("style","display:none");

		

		}

		})

		

		

});

}



function payId(id){

$(document).ready(function() {

    

		$.ajax({

		url: "cash_payment_ajax.php",

		method: "POST",

		dataType:"json",

		data:{

		c_no: $("#ledger_id"+id).val()

		},

		success: function(data){



		$("#due"+id).val(data.c_info.total_amt);

		$("#dueHidden"+id).val(data.c_info.total_amt);

		$("#party"+id).val(data.c_info.supplier_name);

		$("#load"+id).attr("style","display:none");

		

		}

		})

		

		

});

}



function paycal(){ 



var sales_amount = (document.getElementById('amount').value)*1;

var due   = (document.getElementById('due').value)*1;



var total = due-sales_amount;



document.getElementById('due').value = total.toFixed(2);

}



function paycalId(id){ 



var sales_amount = (document.getElementById('amount'+id).value)*1;

var due   = (document.getElementById('dueHidden'+id).value)*1;



var total = due-sales_amount;



document.getElementById('due'+id).value = total.toFixed(2);

}







// actual  conversion code starts here

var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];

var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];



function inWords (num) {

    if ((num = num.toString()).length > 9) return 'overflow';

    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);

    if (!n) return; var str = '';

    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';

    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';

    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';

    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';

    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'taka only ' : '';

    return str;

}



document.getElementById('amount').onkeyup = function () { 

    document.getElementById('words').innerHTML = inWords(parseInt(document.getElementById('amount').value));

};

</script>



<?php include('../template/footer.php');?>