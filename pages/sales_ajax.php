<?php 
  session_start();
include ('../common/library.php');  
include ('../common/helper.php'); 

   $item_id = $_POST['item_id'];
   $order_no = $_POST['s_no'];
   $customer_type = $_POST['customer_type'];
   $address = $_POST['address'];
   $r_dealer = $_POST['r_dealer'];
   $contact = $_POST['contact'];
   $delivery_mode = $_POST['delivery_mode'];
   
   if($customer_type=="Registered"){
    $sales_date = $_POST['r_sales_date'];
	$dlr1 = explode("#",$_POST['r_dealer']);
    $dealer_name = $dlr1[0];//find_a_field('customer_info','business_name','id="'.$r_dealer.'"');
	$r_dealer = $dlr1[1];
   }else{
   $sales_date = $_POST['c_sales_date'];
   $dlr = explode("<#>",$_POST['dealer_name']);
   $dealer_name = $dlr[0];
   
   $r_dealer = find_a_field('customer_info','id','customer_name like "%'.$dealer_name.'%"');
   $ledger_id = find_a_field('customer_info','ledger_id','id="'.$r_dealer.'"');
   if($r_dealer=='' || $r_dealer==0){
   $ledger =$conn->query("INSERT INTO `ledger` (`ledger_name`, `ledger_type` , `group_for`) VALUES ('".$dealer_name."', '1001', '".$_SESSION['group_for']."')"); 
   $ledger_id = mysqli_insert_id($conn);
   $insert =$conn->query("insert into customer_info(`customer_name`,`propritor_name`,`mobile_no`,`customer_address`,`ledger_id`,`customer_type`,`group_for`) Values('".$dealer_name."','".$dealer_name."','".$contact."','".$address."','".$ledger_id."','Corporate','".$_SESSION['group_for']."')");
   $r_dealer = mysqli_insert_id($conn);
   }
   
   
   }
  
   if($_SESSION['sale_no']==''){
   $master =$conn->query("insert into sales_master(`s_no`,`sales_date`,`dealer_type`,`dealer_code`,`dealer_name`,`dealer_address`,`delivery_mode`,`contact`,`group_for`,`entry_by`) Values('".$order_no."','".$sales_date."','".$customer_type."','".$r_dealer."','".$dealer_name."','".$address."','".$delivery_mode."','". $contact."','".$_SESSION['group_for']."','".$_SESSION['user_id']."')");
   $_SESSION['sale_no'] = $order_no;
   }
   $update = $conn->query("update sales_master set sales_date='".$sales_date."',dealer_type='".$customer_type."',  dealer_code='".$r_dealer."', dealer_name='".$dealer_name."',dealer_address='".$address."',contact='".$contact."',delivery_mode='".$delivery_mode."' where s_no='".$_SESSION['sale_no']."'");
   $details = $conn->query("INSERT INTO `sales_order` (`s_no`,`item_id`,`s_date`,`group_for`) VALUES ('".$_SESSION['sale_no']."','".$item_id."','".$sales_date."','".$_SESSION['group_for']."')");
   $check_party = find_a_field('sales_master','dealer_code','s_no="'.$_SESSION['sale_no'].'"');
   
    
   $count_sql = $conn->query("select count(s_no) as total_row from sales_order
    where s_no='".$_SESSION['sale_no']."'");
   $count_data = $count_sql->fetch_assoc();
   $count = $count_data['total_row'];
   $corporate_party = $_POST['dealer_name'];
   
  
  if ($details==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count,"pawri"=>$corporate_party));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
  



/*
//include 'database.php';
	$sql = $conn->query("SELECT * FROM sales_order where s_no=".$_SESSION['sale_no']."");
	//$result = $conn->query($sql);
	
		while($dt = $sql->fetch_assoc()) {
?>	
		<tr>
			<!--<td><?=$dt['item_id'];?></td>
			<td>&nbsp;</td>
			<td><?=$dt['unit'];?></td>
			<td><?=$dt['qty'];?></td>
			<td><?=$dt['rate'];?></td>
			<td><?=$dt['amount'];?></td>
			<td colspan="2"><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>-->
			
			
			<td><select name="item_name_<?=$dt['id'];?>"  class="form-control form-control" id="item_name_<?=$dt['id'];?>">
				 <option></option>
				<option <?=($dt['item_id']==1)? 'selected':''?> value="1">Mobile</option>
				<option <?=($dt['item_id']==2)? 'selected':''?> value="2">Laptop</option>
				</select><input type="hidden" name="update_id_<?=$dt['id'];?>" id="update_id_<?=$dt['id'];?>" value="<?=$dt['id'];?>" /></td>
			<td><input type="text"  name="stock_<?=$dt['id'];?>"  class="form-control form-control" id="stock_<?=$dt['id'];?>" value="" required></td>
			<td><input type="text"  name="unit_<?=$dt['id'];?>"  class="form-control form-control" id="unit_<?=$dt['id'];?>" value="<?=$dt['unit'];?>" required></td>
			<td><input type="text"  name="rate_<?=$dt['id'];?>"  class="form-control form-control" id="rate_<?=$dt['id'];?>" value="<?=$dt['rate'];?>" required></td>
			<td><input type="text"  name="qty_<?=$dt['id'];?>"  class="form-control form-control" id="qty_<?=$dt['id'];?>" value="<?=$dt['qty'];?>" required></td>
			<td><input type="text"  name="amount_<?=$dt['id'];?>" class="form-control form-control" id="amount_<?=$dt['id'];?>" value="<?=$dt['amount'];?>" required></td>
			<td><input type="button" name="edit_<?=$dt['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?=$dt['id'];?>" onclick="edit(<?=$dt['id'];?>)"></td>
			<td><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>
			
			
			
				
			
		</tr>
<?php	
	}
 */
 
 
?>
		
		