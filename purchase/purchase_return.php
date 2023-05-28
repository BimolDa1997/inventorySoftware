<?php 
$page_name ='purchase_return';

include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php');  
include ('../template/sidebar.php');


if($_GET['purchase_no']>0){
	$_SESSION['purchase_no']=$_GET['purchase_no'];
}



if($_REQUEST['clear']==1){
 $_SESSION['sale_no'] = '';
 header('location:purchase_return.php');
}


//$select = $conn->query("select * from purchase_return_master where group_for = ".$_SESSION['group_for']."  and purchase_no='".$_SESSION['purchase_no']."'");
//
//$data = $select->fetch_assoc(); 


if(isset($_POST['payment_save'])){

  $party = $_POST['supplier'];

  $sales_dates = $_POST['purchase_date'];

  $sales_amount = $_POST['purchase_amount'];

  $collection = $_POST['paid'];

  $discount = $_POST['discount'];

  $payment_type = $_POST['payment_type'];

  $details = $_POST['details'];

  $total_collection = $_POST['total_paid'];

  $due = $_POST['due'];

  $status = 'PROCESSING';

  $entry_by = $_SESSION['user_id'];




  $payment =$conn->query("INSERT INTO `purchase_payment` (`purchase_no`, `purchase_date`, `supplier`, `purchase_amount`, `payment_amount`,`discount_amount`, `due_amt`,`payment_types`, `status`, `entry_by`, `entry_by`) VALUES ('".$_SESSION['purchase_no']."', '".$sales_dates."', '".$party."', '".$sales_amount."', '".$total_collection."', '".$discount."','".$due."', '".$payment_type."','".$status."','".$entry_by."','".$_SESSION['group_for']."')");


  if($payment==true){
  $select = $conn->query("select * from purchase_return_details where group_for='".$_SESSION['group_for']."' and  purchase_no='".$_SESSION['purchase_no']."'");

   while( $item_data = $select->fetch_assoc()){

        $journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_in`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$item_data['purchase_date']."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['qty']."','".$item_data['purchase_no']."','Purchase','".$_SESSION['user_id']."','".$_SESSION['warehouse']."')");

 }


//journal start
if($total_collection>0){

 $ssql2 = "select sum(d.amount) as total_amount,m.purchase_no,m.purchase_date,c.ledger_id 

 from purchase_return_master m,purchase_return_details d,supplier_info c 

 where m.purchase_no=d.purchase_no and m.supplier_id=c.id and m.group_for =".$_SESSION['group_for']." and m.purchase_no='".$_SESSION['purchase_no']."'";

$sql = $conn->query($ssql2);

$j_data = $sql->fetch_assoc();

$max_jv = find_a_field('journal','max(jv_no)','1');

$tr_from = 'Purchase Return';

//$jv_date = date('Y-m-d');

$cr_ledger = 1000005;

$jv_date = $_POST['purchase_date'];

$status = 'Unpaid';

$entry_by = '';


if($max_jv=='' || $max_jv==0){

$max_jv = date('Ymd');

}else{
    $max_jv = $max_jv+1;
}


$payable_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."',0,'".$j_data['total_amount']."','".$tr_from."','".$_SESSION['purchase_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";

$journal_insert_dr =$conn->query($payable_dr);


$payable_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$j_data['total_amount']."',0,'".$tr_from."','".$_SESSION['purchase_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";

$journal_insert_cr =$conn->query($payable_cr); 


$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."','".$total_collection."',0,'Payment','".$_SESSION['purchase_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";

$journal_insert_dr =$conn->query($rcv_dr);


$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$payment_type."',0,'".$total_collection."','Payment','".$_SESSION['purchase_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";

$journal_insert_cr =$conn->query($rcv_cr); 

}
//journa end


  $insert_id = mysqli_insert_id($conn);
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Payment Gived. Payment No. - '.$insert_id.'</span>';
  $_SESSION['purchase_no'] = '';
  
  }else{
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }

}



if(isset($_POST['purchase_submit']) && $_SESSION['purchase_no']>0){
//$find = find_a_field('journal','count(id)','tr_from like "Purchase" and tr_no='.$_SESSION['purchase_no']);
//if($find>0){ $_SESSION['purchase_no'] = ''; }else{

$journal_del = $conn->query('delete from journal where tr_no="'.$_SESSION['purchase_no'].'" and tr_from="Purchase Return"');
$journal_item_del = $conn->query('delete from journal_item where tr_no="'.$_SESSION['purchase_no'].'" and tr_from="Purchase Return"');
$journal_item_del2 = $conn->query('delete from damage_item where tr_no="'.$_SESSION['purchase_no'].'" and tr_from="Purchase Return"');

$jv_date = $_POST['purchase_date'];


$upd="update purchase_return_master set purchase_date='".$jv_date."' where purchase_no='".$_SESSION['purchase_no']."' ";
$conn->query($upd);

$ssql2 = "select sum(d.amount) as total_amount,m.purchase_no,m.purchase_date,c.ledger_id,c.supplier_name,c.phone_no from purchase_return_master m,purchase_return_details d,supplier_info c where m.purchase_no=d.purchase_no and m.supplier_id=c.id and m.group_for =".$_SESSION['group_for']." and m.purchase_no='".$_SESSION['purchase_no']."'";

$sql = $conn->query($ssql2);

$j_data = $sql->fetch_assoc();

$tr_from = 'Purchase Return';

//echo $jv_date = date('Y-m-d');
$cr_ledger = 1000005;

$status = 'Unpaid';

$entry_by = $_SESSION['user_id'];

$max_jv = find_a_field('journal','max(jv_no)+1','1');

if($max_jv==''){
$max_jv = date('Y-m-d');
}


$payable_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$j_data['total_amount']."','".$tr_from."','".$_SESSION['purchase_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";

$journal_insert_dr =$conn->query($payable_dr);


$payable_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."','".$j_data['total_amount']."',0,'".$tr_from."','".$_SESSION['purchase_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";

$journal_insert_cr =$conn->query($payable_cr); 




$select = $conn->query("select * from purchase_return_details where  group_for =".$_SESSION['group_for']." and purchase_no='".$_SESSION['purchase_no']."'");
 while( $item_data = $select->fetch_assoc()){

$journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$jv_date."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['qty']."','".$item_data['purchase_no']."','Purchase Return','".$_SESSION['user_id']."','".$_SESSION['warehouse']."')");

$damage_journal_item = $conn->query("INSERT INTO `damage_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$jv_date."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['damage_qty']."','".$item_data['purchase_no']."','Purchase Return','".$_SESSION['user_id']."','".$_SESSION['warehouse']."')");

}


$conn->query("update purchase_return_master set status='COMPLETED' where purchase_no='".$_SESSION['purchase_no']."'");

//Text Sms
//function sms($dest_addr,$sms_text){
//$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";
//$fields = array(

//    'Username'      => "mollik",
//    'Password'      => "Mplaza@123",
//    'From'          => "MollikPlaza",
//    'To'            => $dest_addr,
//    'Message'       => $sms_text

//);

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, count($fields));
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
//$result = curl_exec($ch);
//curl_close($ch);

//}

//$recipients ="88".$j_data['phone_no']."";
//$massage  = "Dear Sir,\r\nNew Purchase Order Submitted. \r\n";
//$massage .= "PO No. ".$j_data['purchase_no']." \r\n";
//$massage .= "Party Name : ".$j_data['supplier_name']." \r\n";
//$massage .= "Total Amount : ".$j_data['total_amount']." Taka \r\n";
//$sms_result=sms($recipients, $massage);

//$api =  'https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza&To=8801737174415&Message=testmessage';

//Text Sms

 $_SESSION['purchase_no'] = '';

//}

}




if(isset($_POST['delete_submit'])){ 
	$purchase_return_master = $conn->query("DELETE FROM purchase_return_master WHERE purchase_no=".$_POST['delete_id']." ");
	
	$purchase_return_details = $conn->query("DELETE FROM purchase_return_details WHERE purchase_no=".$_POST['delete_id']." ");
	
	$journal = $conn->query("DELETE FROM journal WHERE tr_from like 'Purchase' and tr_no=".$_POST['delete_id']." ");
	
	$journal_item = $conn->query("DELETE FROM journal_item WHERE tr_from like 'Purchase' and tr_no=".$_POST['delete_id']." ");

	$msg = "Data deleted successfully !";


}


if(isset($_POST['update'])){}

$select = $conn->query("select * from purchase_return_master where group_for = ".$_SESSION['group_for']."  and purchase_no='".$_SESSION['purchase_no']."'");

$data = $select->fetch_assoc(); 

/*function find_a_field($table_name,$field,$unique_id){

    global $conn;

  $sql = "select ".$field." from ".$table_name." where ".$unique_id." limit 1";

 if(mysqli_num_rows($sql)>0){

$select = $conn->query($sql);

$data = $select->fetch_assoc();

echo $data[0];

}

 }*/

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<div class="main-panel">
			<div class="content">
                <div class="row">
					<div class="container">
						<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Purchase Return Entry. <?=$msg;?></h4>
									</div>
								</div>

								<div class="card-body">
								<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×x</a>
	                                </div>
								    <form method="post" id="sales">
								        <!-- Registered Customer Start-->
								        <div class="row" id="rc" >

                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Supplier: </label>
                                                    <div class="col-sm-10">
                                                     <select name="supplier_id"  class="form-control form-control" id="supplier_id">
													  <option></option>
													  <?php //foreign_relation($table,$field1,$field2,$value,$condition);
													     foreign_relation('supplier_info','id','supplier_name',$data['supplier_id'],'group_for="'.$_SESSION['group_for'].'" and status="Active"');
													   ?>
													  </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Date:</label>
                                                    <div class="col-sm-10">
                                                      <input type="date" name="purchase_date" required class="form-control form-control-sm" 
													  id="purchase_date" value="<? if($data['purchase_date'] !='') echo $data['purchase_date']; else echo date('Y-m-d');?>" placeholder="dd/mm/yyyy" min="1997-01-01" max="2030-12-31" />
                                                    </div>
                                                </div>
                                            </div>

											<div class="col-6">
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Purchse Inv: </label>
                                                    <div class="col-sm-10">
                                                     <select name="po_no"  class="form-control form-control" id="po_no">
													  <option></option>
													  </select>
                                                    </div>
                                                </div>
                                            </div>



											<div class="col-6">
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Product:</label>
                                                    <div class="col-sm-10">
                                                      <select name="item_id"  class="form-control form-control" id="item_id">
													  <option></option>
													  <?php //foreign_relation($table,$field1,$field2,$value,$condition);
													     foreign_relation('item_info','item_id','item_name',$data['item_id'],'group_for="'.$_SESSION['group_for'].'" and status="Active"');
													   ?>
													  </select>
                                                    </div>
                                                </div>
                                            </div>

											<div class="col-6">
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Color:</label>
                                                    <div class="col-sm-10">
                                                      <select name="color"  class="form-control form-control" id="color">
													  <option></option>
													  <?php //foreign_relation($table,$field1,$field2,$value,$condition);
													     foreign_relation('color_list','color','color',$data['color'],'1');
													   ?>
													  </select>
                                                    </div>
                                                </div>
                                            </div>

								        </div>
								</div>
							</div>



						<div class="card">
					        <div class="card-body">
						        <table class="text-center" style="width:100%">
							            <thead>
    							            <th>Product Name</th>
 											<th>Color</th>	
    							            <th>Stock</th>
											<th>Damage Stock</th>
    							            <th>Unit</th>
    							            <th>Rate</th>
    							            <th>Qty</th>
											<th>Damage Qty</th>
    							            <th>Amount</th>
											<th colspan="2">Action</th>
							            </thead>

							            <tbody>
										<tbody id="show"> 

										<?php
										 $select = $conn->query("select * from purchase_return_details where group_for=".$_SESSION['group_for']." and purchase_no='".$_SESSION['purchase_no']."'");
                                         while( $item_data = $select->fetch_assoc()){
										 		$stock = find_a_field('journal_item','sum(item_in-item_ex)','1 and warehouse="'.$_SESSION['warehouse'].'" and item_id ='.$item_data['item_id']);
												$damage_stock = find_a_field('damage_item','sum(item_in-item_ex)',' warehouse="'.$_SESSION['warehouse'].'" and item_id ='.$item_data['item_id']);
		                                        $uom   = find_a_field('item_info','uom','item_id='.$item_data['item_id']);
												$srate = find_a_field('journal_item','rate',' warehouse="'.$_SESSION['warehouse'].'" and tr_from in ("Opening","Purchase")  and item_id ='.$item_data['item_id'].' order by journal_date desc');
										?>

			<tr>
				<td><select name="item_name_<?=$item_data['id'];?>"  class="form-control form-control" id="item_name_<?=$item_data['id'];?>" onchange="edit(<?=$item_data['id'];?>)">
					 <option></option>
					<?php
					foreign_relation('item_info','item_id','item_name',$item_data['item_id'],'group_for="'.$_SESSION['group_for'].'" and status="Active"');
					?>
					</select>
					<input type="hidden" name="update_id_<?=$item_data['id'];?>" id="update_id_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>)" value="<?=$item_data['id'];?>" /></td>

				<td>
					<input type="hidden"  name="color_<?=$item_data['id'];?>"  class="form-control" id="color_<?=$item_data['id'];?>" value="<?=$item_data['color'];?>" />
					<input type="text"   class="form-control" value="<?=find_a_field('color_list','color','id='.$item_data['color']);?>" readonly>
				</td>	
	
				<td><input type="text"  name="stock_<?=$item_data['id'];?>"  class="form-control form-control" id="stock_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>)" value="<?=$stock?>" required></td>
				
				<td><input type="text"  name="damage_stock_<?=$item_data['id'];?>"  class="form-control form-control" id="damage_stock_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>)" value="<?=$damage_stock?>" required></td>
	
				<td><input type="text"  name="unit_<?=$item_data['id'];?>"  class="form-control form-control" id="unit_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>)" value="<?=$uom?>" required></td>
	
				<td><input type="text"  name="rate_<?=$item_data['id'];?>"  class="form-control form-control" id="rate_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>);cal(<?=$item_data['id'];?>);" value="<? if($item_data['rate']>0) echo $item_data['rate']; else echo $srate;?>" required></td>
	
				<td><input type="text"  name="qty_<?=$item_data['id'];?>"  class="form-control form-control" id="qty_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>);cal(<?=$item_data['id'];?>);" value="<?=$item_data['qty'];?>" required></td>
				<td><input type="text"  name="damage_qty_<?=$item_data['id'];?>"  class="form-control form-control" id="damage_qty_<?=$item_data['id'];?>" onkeyup="edit(<?=$item_data['id'];?>);cal(<?=$item_data['id'];?>);" value="<? if($item_data['damage_qty']>0) echo $item_data['damage_qty']; else echo $damage_stock; ?>" required></td>
	
				<td><input type="text"  name="amount_<?=$item_data['id'];?>" class="form-control form-control" id="amount_<?=$item_data['id'];?>" value="<? if($item_data['amount']>0) echo $item_data['amount']; else echo ($srate*$damage_stock);?>" required></td>
	
				<td><input type="button" name="edit_<?=$item_data['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?=$item_data['id'];?>"></td>
	
				<td><button onclick="deleteData(<?=$item_data['id'];?>)" id="del_<?=$item_data['id'];?>" class="btn btn-danger">X</button></td>
			</tr>

			<?php } ?>

							            </tbody>
							        </table>
						    </div>
						    <!--<div class="card-footer text-center">
						        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal" id="pay" onclick="pay();">Payment</button>
						    </div>-->

							<div class="card-footer text-center">
                                <input type="submit" name="purchase_submit" class="btn btn-secondary">
							 <?php if($_GET['purchase_no']){ ?>	
								<input type="hidden" name="delete_id" id="delete_id" value="<?php echo $_SESSION['purchase_no']; ?>">
								<input type="submit" name="delete_submit" value="Delete" class="btn btn-danger">
							 <?php } ?>	

						    </div>
							</form>
						</div>



	<table cellpadding="10" cellspacing="1" width="12%" style="float:left;">
		<tbody id="ajax-response">
		</tbody>
	</table>
						<form method="post" id="payment">
	<div class="modal fade show" id="viewModal" tabindex="-1" role="dialog" aria-labelledby=""aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Product Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
													<p class="small">Cash Payment</p>
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Supplier <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="hidden" name="purchase_no"  id="purchase_no"  class="form-control" value="<?=$_SESSION['purchase_no']?>">
																	<input type="text" name="supplier"  id="supplier"  class="form-control" value="" readonly>
																</div>
															</div>


															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Purchase Date <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="text" name="purchase_dates"  id="purchase_dates"  class="form-control" value="" readonly>
																</div>
															</div>



															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Purchase Amount <span style="color:#FF0000; font-size:15px;"></span></label>
																	<input type="text" name="purchase_amount"  id="purchase_amount"  class="form-control" value="" required readonly>
																</div>
															</div>


															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Paid<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input type="text" name="paid"  id="paid"  class="form-control" value="" onchange="paycal()" required>
																</div>
															</div>

															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Discount</label>
																	<input name="discount" id="discount" type="text" class="form-control" value="" onchange="paycal()">
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group form-group-default">
																	<label>Payment Type<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<select name="payment_type"  id="payment_type"  class="form-control">
																	<option></option>
																	<option value="1000007">Cash</option>
																	<option value="1000008">Bank</option>
																	<option value="1000009">Commision</option>
																	</select>
																</div>
															</div>

															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Details/Money Receipt<span style="color:#FF0000; font-size:15px;">*</span></label>
																	<input name="details" id="details" type="text" class="form-control" value="" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Total Paid</label>
																	<input name="total_paid" id="total_paid" type="text" class="form-control" value="">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Due</label>
																	<input name="due" id="due" type="text" class="form-control" value="">
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
	</form>
					</div>
				</div>
			</div>
		</div>
<script>



$(document).ready(function() {
	$("#color").change(function(){

		$("#item_id").attr("disabled", "disabled");
		var item_id  = $('#item_id').val();
		var supplier_id = $('#supplier_id').val();
		var purchase_date = $('#purchase_date').val();
		var color = $('#color').val();

		if(item_id!="" && purchase_date !="" && color !=""){
			$.ajax({
				url: "purchase_return_ajax.php",
				type: "POST",
				data: {
					item_id: item_id,
					supplier_id : supplier_id,
					purchase_date : purchase_date,
					color : color
				},

				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#save").removeAttr("disabled");
						$('#sales').find('input:text').val('');
						$("#success").show();
						$('#success').html(dataResult.row+' Item added successfully !');
						$('#show').load('purchase_return_view_ajax.php');
						$("#item_id").removeAttr("disabled");
						$("#color").removeAttr("selected");
					}

					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
				}
			});
		}else{
			alert('Please fill all the field !');
		}
	});
});

$(document).ready(function() {});

$("#color").change(function(){
	var purchase_date = $('#purchase_date').val();
		if(purchase_date !=""){
		$('#show').load('purchase_return_view_ajax.php');
	}

		});

$("#c_item_id").change(function(){
		var purchase_date = $('#purchase_date').val();
		if(purchase_date !=""){	
		$('#show').load('purchase_return_view_ajax.php');
		}
		});




function edit(id){
$(document).ready(function() {
	    //$('#edit').on('click', function(){
		$("#edit_"+id).attr("value", "W...");
		$("#del_"+id).attr("disabled", "disabled");
		var item_id = $('#item_name_'+id).val();
		var unit_name = $('#unit_'+id).val();
		var rate = $('#rate_'+id).val();
		var qty = $('#qty_'+id).val();
		var damage_qty = $('#damage_qty_'+id).val();
		var amount = $('#amount_'+id).val();
		var update_id = $('#update_id_'+id).val();

		if(item_id!=""){
			$.ajax({
				url: "purchase_return_edit_ajax.php",
				type: "POST",
				data: {
					item_id: item_id,
					unit_name: unit_name,
					rate: rate,
					qty: qty,
					damage_qty: damage_qty,
					amount: amount,
					update_id : update_id

				},

				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#save").removeAttr("disabled");
						$('#sales').find('input:text').val('');
						$("#success").show();
						$('#success').html(' Item Update successfully !'); 	
						$("#edit_"+id).attr("value", "Updated");
						$("#del_"+id).removeAttr("disabled");

					}
					else if(dataResult.statusCode==201){
						console.log(dataResult.row);
					   alert("Error occured !");
					}
				}
			});
			
		}else{
			alert('Please fill all the field !');
		}

});

}



function deleteData(str){
  var id = str;
  $.ajax({
	type:"GET",
	url:"purchase_return_delete_ajax.php?p=del",
	data: "id="+id,
	success: function(dataResult){
	var dataResult = JSON.parse(dataResult);
	if(dataResult.statusCode==200){
		//alert('deleted');
		$('#sales').find('input:text').val('');
		$("#success").show();
		$('#success').html(' Line Deleted !'); 
		$('#show').load('purchase_return_view_ajax.php');	
	}

	}

  });
}


function pay(id){
$(document).ready(function() {
		$.ajax({
		url: "payment_view_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
		purchase_no: $("#purchase_no").val()

		},
		success: function(data){
		$("#purchase_amount").val(data.sales_info.total_amt);
		$("#supplier").val(data.sales_info.supplier_name);
		$("#purchase_dates").val(data.sales_info.purchase_date);

		}

		})

});
}



function cal(id){
var rate = (document.getElementById('rate_'+id).value)*1;
var qty = (document.getElementById('qty_'+id).value)*1;
var damage_qty = (document.getElementById('damage_qty_'+id).value)*1;
var total = rate*(qty+damage_qty);
document.getElementById('amount_'+id).value = total.toFixed(2);
}



function paycal(){ 
var sales_amount = (document.getElementById('purchase_amount').value)*1;
var collectoin = (document.getElementById('paid').value)*1;
var discount = (document.getElementById('discount').value)*1;
var total = collectoin+discount;
var due = sales_amount-(collectoin+discount);
document.getElementById('total_paid').value = total.toFixed(2);
document.getElementById('due').value = due.toFixed(2);
}

// on change supplier_id send a get request to get purchase list
$("#supplier_id").change(function(){
	var supplier_id = $('#supplier_id').val();
		if(supplier_id !=""){
		$.ajax({
			url: "purchase_list_ajax.php",
			type: "GET",
			data: {
				supplier_id: supplier_id
			},
			success: function(dataResult){
				$('#po_no').html(dataResult);
			}
		});
	}
});

// on change po_no send a get request to get item list
$("#po_no").change(function(){
	var po_no = $('#po_no').val();
		if(po_no !=""){
		$.ajax({
			url: "purchase_list_ajax.php",
			type: "GET",
			data: {
				po_no: po_no
			},
			success: function(dataResult){
				$('#item_id').html(dataResult);
			}
		});
	}
});

// on change item_id send a get request to get color list
$("#item_id").change(function(){
	var item_id = $('#item_id').val();
	var po_no = $('#po_no').val();
		if(item_id !="" && po_no !=""){
		$.ajax({
			url: "purchase_list_ajax.php",
			type: "GET",
			data: {
				item_id: item_id ,
				old_po_no: po_no
			},
			success: function(dataResult){
				$('#color').html(dataResult);
			}
		});
	}
});

</script>


<?php include('../template/footer.php');?>



