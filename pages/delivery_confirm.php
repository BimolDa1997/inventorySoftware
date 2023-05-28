<?php 
$page_name="Delivery Confirmation";  
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
//$page_name='customer_setup';

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
 
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Success</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}



//=========>>>>>> Delete <<<<<<<<<<=======\\\\\\

if(isset($_POST['expense_delete'])&&$_POST['jv_no']>0){
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

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?><span id="success" style="color:green;"></span></h4>
									</div>
								</div>
								<div class="card-body">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SL</th>
													<th>Sales No.</th>
                                                    <th>Customer Phone</th>
													<th>Product Name</th>
                                                    <th>Color</th>
													<th>Sales Qty</th>
                                                    <th>Return Qty</th>
                                                    <th>Damage Qty</th>
                                                    <th>Confirm Qty</th>
													<th>Rate</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
													
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select d.*,i.item_name,c.color as color_name from delivery_info d, item_info i, color_list c where c.id=d.color and d.item_id=i.item_id and d.status='PENDING'");
											 while($c_data = $select->fetch_assoc()){
												 if($c_data['type']=='INTERNAL'){
												   $customer_phone = find_a_field('sales_order','mobile_1','id="'.$c_data['sales_order_id'].'"');
												 }elseif($c_data['type']=='EXTERNAL'){
													 $customer_phone = find_a_field('orders','phone_no','order_id="'.$c_data['s_no'].'"');
													 }
												  ?>
                                                    
												<tr>
												    <td><?=++$i?></td>
													<td><input type="hidden" name="id<?=$c_data['id']?>" id="id<?=$c_data['id']?>" value="<?=$c_data['id']?>">
                                                    <input type="hidden" name="s_no<?=$c_data['id']?>" id="s_no<?=$c_data['id']?>" value="<?=$c_data['s_no']?>">
                                                    <input type="hidden" name="item_id<?=$c_data['id']?>" id="item_id<?=$c_data['id']?>" value="<?=$c_data['item_id']?>">
                                                    <input type="hidden" name="type<?=$c_data['id']?>" id="type<?=$c_data['id']?>" value="<?=$c_data['type']?>">
													<?=$c_data['s_no']?></td>
                                                    <td><?=$customer_phone?></td>
													<td><?=$c_data['item_name']?></td>
                                                    <td><?=$c_data['color_name']?></td>
													<td><?=$c_data['sales_qty']?></td>
													<td><input type="text" name="return_qty<?=$c_data['id']?>" id="return_qty<?=$c_data['id']?>"></td>
                                                    <td><input type="text" name="damage_qty<?=$c_data['id']?>" id="damage_qty<?=$c_data['id']?>"></td>
                                                    <td><input type="text" name="confirm_qty<?=$c_data['id']?>" id="confirm_qty<?=$c_data['id']?>" onKeyUp="cal(<?=$c_data['id']?>)"></td>
                                                    <td><input type="hidden" name="unit_price<?=$c_data['id']?>" id="unit_price<?=$c_data['id']?>" value="<?=$c_data['unit_price']?>"><?=$c_data['unit_price']?></td>
                                                    <td><input type="text" name="amount<?=$c_data['id']?>" id="amount<?=$c_data['id']?>" value="<?=$amount?>" readonly></td>
													<td>
														<div class="form-button-action">
															<button type="button" id="mybutton<?=$c_data['id']?>" title="Confirm" class="btn btn-info" onClick="deliver(<?=$c_data['id']?>)">
																Confirm
															</button><div class="loader2" id="load2<?=$c_data['id']?>" align="center" title="Internet maybe slow" style="margin-left:44%; display:none;"><i style=" font-size:40px; color:green;" class="fa fa-check"></i></div>
															
												
								 <form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">			<!--- edit modal -->
									<div class="modal fade" id="editRowModal<?=$c_data['jv_no']?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Expense Information </span> 
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
																	<label>Expense Head <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="hidden" name="jv_no" id="jv_no<?=$c_data['jv_no'];?>" value="<?=$c_data['jv_no'];?>"  />
																	<input type="hidden" name="update_id" id="update_id" value="<?=$c_data['id']?>" />
																	<input type="text" list="browsers" name="expense_head"  id="expense_head" value="<?=$c_data['ledger_name']?>"  class="form-control" placeholder="Expense Head" required>
																	<datalist id="browsers">
																	 <? 
																	  $s = $conn->query("select ledger_name from ledger where head_type='Expense'");
																	  while($expense_head = $s->fetch_assoc()){
																	 ?>
                                                                        <option <? if($c_data['ledger_name'] == $expense_head['ledger_name']) echo 'selected'; ?> value="<?=$expense_head['ledger_name']?>">
                                                                       <? } ?>
                                                                     </datalist> 
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Details <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="details"  id="details1" value="<?=$c_data['narration']?>"  class="form-control" placeholder="Details" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Expense Date <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="expense_date"  id="expense_date1" value="<?=$c_data['jv_date']?>"  class="form-control"  required>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Payment Type <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="payment_type" id="payment_type"  class="form-control"  required>
																	<option></option>
																	<option <?=($c_data['tr_type']=='cash')? 'selected':''?> value="1000007#cash">Cash</option>
																	<option <?=($c_data['tr_type']=='bank')? 'selected':''?> value="1000008#bank">Bank</option>
																	<option <?=($c_data['tr_type']=='wire transfer')? 'selected':''?> value="1000010#wire transfer">Wire Transfer</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Amount</label>
																	<input name="expense_amount" id="expense_amount" value="<?=$c_data['dr_amt']?>" type="text" class="form-control" >
																</div>
															</div>
															
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<!--<button type="button" id="" class="btn btn-primary">Add</button>-->
													<input type="submit" name="save" id="" value="Update" class="btn btn-primary" />
													<input type="submit" name="expense_delete" id="expense_delete" value="Delete" class="btn btn-danger" />
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
													<th></th>
													<th></th>
													<th></th>
													<th></th>
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
            
            <script>
             function deliver(id){
			 

		



		

		var s_no = $('#s_no'+id).val();
        
        var id = $('#id'+id).val();



		var item_id = $('#item_id'+id).val();
		var return_qty = $('#return_qty'+id).val();



		var damage_qty = $('#damage_qty'+id).val();



		var confirm_qty = $('#confirm_qty'+id).val();
		
		var amount = $('#amount'+id).val();
		
		var type = $('#type'+id).val();



		
		if(s_no!=""){


			if(confirm_qty !="" || damage_qty!="" || return_qty!=""){
            $("#load2"+id).attr("style","display:");

            $("#mybutton"+id).attr("style","display:none");


			$.ajax({



				url: "delivery_ajax.php",



				type: "POST",



				data: {



					id: id,
                    
                    s_no: s_no,
					item_id:item_id,



					return_qty: return_qty,



					damage_qty: damage_qty,



					confirm_qty: confirm_qty,
					
					amount: amount,
					
					type: type


				},



				cache: false,



				success: function(dataResult){



					var dataResult = JSON.parse(dataResult);



					if(dataResult.statusCode==200){



						//$("#disabled").removeAttr("disabled");



						//$('#mybutton').find('disabled:text').val('disabled');



						//$("#success").show();



						$('#success').html('Delivery Confirmed!');


						//$("#load").attr("style","display:none");

						
					}



					else if(dataResult.statusCode==201){



					   alert("Error occured !");



					}


				}



			});



		}else{ alert('Qty Should Not Be Empty !'); }



		}else{



			alert('Please fill all the field !');



		}


 }
 
 
 function cal(id){
	  //var id = id;
	  
	  var unit_price = document.getElementById('unit_price'+id).value;
	  
	  var confirm_qty = document.getElementById('confirm_qty'+id).value;
	  
	  var total_amt = unit_price*confirm_qty;
	  document.getElementById('amount'+id).value = total_amt;
	  
	 }
            </script>


<?php include('../template/footer.php');?>