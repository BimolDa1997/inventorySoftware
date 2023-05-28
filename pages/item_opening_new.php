<?php 
$page_name="item_opening";  
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
 
//$page_name='customer_setup';


/*$to = 'bcd364854@gmail.com';
$toName = 'Bimol';
$subject = 'This is Bimol';
$msg = 'Hi, there how are you?';
mailer($to,$toName,$subject,$msg,$cc);*/

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
								<!--<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?><span id="success" style="color:green;"></span></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add New
										</button>
									</div>
								</div>-->
								<div class="card-body">
									<!-- Modal -->
									<form action="<?=$_POST['PHP_SELF']?>" method="post" enctype="multipart/form-data">
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Expense</span> 
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
																	
																	<input type="text" list="browsers" name="expense_head"  id="expense_head" value=""  class="form-control" placeholder="Expense Head" required>
																	<datalist id="browsers">
																	 <? 
																	  $s = $conn->query("select ledger_name from ledger where head_type='Expense'");
																	  while($expense_head = $s->fetch_assoc()){
																	 ?>
                                                                        <option value="<?=$expense_head['ledger_name']?>">
                                                                       <? } ?>
                                                                     </datalist> 
																	
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Details <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="details"  id="details" value=""  class="form-control" placeholder="Details" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Expense Date <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="date" name="expense_date"  id="expense_date" value=""  class="form-control" required>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Payment Type <span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="payment_type" id="payment_type"  class="form-control"  required>
																	<option></option>
																	<option value="1000007#cash">Cash</option>
																	<option value="1000008#bank">Bank</option>
																	<option value="1000010#wire transfer">Wire Transfer</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Amount</label>
																	<input name="expense_amount" id="expense_amount" value="" type="text" class="form-control" placeholder="Amount">
																</div>
															</div>
															
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Attachment</label>
																	<input name="att_file" id="att_file" value="" type="file" class="form-control">
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
													<th>Product Code</th>
                                                    <th>Product Name</th>
													<th>Unit</th>
                                                    <th>Color</th>
                                                    <th>Opening Qty</th>
                                                    <th>Rate</th>
                                                    <th>Action</th>
													
												</tr>
											</thead>
											
											<tbody>
											<?php
											  $select =$conn->query("select * from item_info where 1 order by item_name asc");
											 while($c_data = $select->fetch_assoc()){ ?>

												<tr>
												    <td><?=++$i?></td>
													<td><input type="hidden" name="item_id<?=$c_data['item_id']?>" id="item_id<?=$c_data['item_id']?>" value="<?=$c_data['item_id']?>">
                                                    <?=$c_data['item_code']?></td>
													<td><?=$c_data['item_name']?></td>
													<td><?=$c_data['uom']?></td>
													<td><select name="color<?=$c_data['item_id']?>" id="color<?=$c_data['item_id']?>">
                                                    <option></option>
                                                   <?  $item_id = $c_data['item_id'];
												   	   $sql = "SELECT c.id, c.color FROM item_photo p, color_list c WHERE c.id=p.color and p.item_id = '$item_id' group by c.id order by c.color asc";
													   $query = mysqli_query($conn, $sql);
													   $count = mysqli_num_rows($query);
													   while($row = mysqli_fetch_array($query)){
														  
														  echo "<option value='".$row['id']."'>".$row['color']."</option>";
													   }
												   ?>
                                                    </select></td>
                                                    <td><input type="text" name="qty<?=$c_data['item_id']?>" id="qty<?=$c_data['item_id']?>"></td>
                                                    <td><input type="text" name="rate<?=$c_data['item_id']?>" id="rate<?=$c_data['item_id']?>"></td>
                                                    <td>
														<div class="form-button-action">
															<button type="button" id="mybutton<?=$c_data['item_id']?>" title="Confirm" class="btn btn-info" onClick="opening(<?=$c_data['item_id']?>)">
																Confirm
															</button><div class="loader2" id="load2<?=$c_data['item_id']?>" align="center" title="Status" style="margin-left:44%; display:none;"><i style=" font-size:40px; color:green;" class="fa fa-check"></i></div><div id="fail_loader<?=$c_data['item_id']?>"></div>
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
             function opening(id){
			 
				var item_id = id;
				//var id = $('#id'+id).val();
				var color = $('#color'+id).val();
				var qty = $('#qty'+id).val();
				var rate = $('#rate'+id).val();

				if(item_id!=""){
					if(qty !="" || color!=""){
					
					$("#mybutton"+id).attr("style","display:none");
					$.ajax({
						url: "item_opening_ajax.php",
						type: "POST",
						data: {
							item_id:item_id,
							color: color,
							qty: qty,
							rate: rate
						},
						cache: false,
						success: function(dataResult){
							var dataResult = JSON.parse(dataResult);
							if(dataResult.statusCode==200){
								
								if(dataResult.row>0){
									$("#load2"+id).attr("style","display:");
									}else{
										$("#fail_loader"+id).html(dataResult.msg);
										}
								
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