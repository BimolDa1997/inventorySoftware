<?php 



$page_name ='Sales Entry';  



session_start();



include ('../common/library.php');  



include ('../common/helper.php');  



include ('../template/header.php'); 



include ('../template/sidebar.php');


function new_order_no(){
	 
	 global $conn;
	 
	 $max_order_no = find_a_field('sales_master','max(s_no)','entry_by="'.$_SESSION['user_id'].'"');
	 if($max_order_no>0){
		  $order_no = $max_order_no+1;
		 }else{
			  $order_no = $_SESSION['user_id']+1;
			 }
	
	   return $order_no;
	}


function new_delivery_no(){
	 
	 global $conn;
	 
	 $max_order_no = find_a_field('delivery_info','max(delivery_no)','1');
	 if($max_order_no>0){
		  $order_no = $max_order_no+1;
		 }else{
			  $order_no = 1;
			 }
	
	   return $order_no;
	}


/*if($_REQUEST['clear']==1){



 $_SESSION['sale_no'] = '';



 header('location:sales_entry.php');



}*/



if($_GET['s_no']>0){



$_SESSION['sale_no'] = $_GET['s_no'];



}



if(isset($_POST['payment_save'])){



  $party = $_POST['party'];



  $sales_dates = $_POST['sales_dates'];



  $sales_amount = $_POST['sales_amount'];



  $collection = $_POST['collection'];



  $discount = $_POST['discount'];



  $payment_type = $_POST['payment_type'];



  $details = $_POST['details'];



  $total_collection = $_POST['total_collection'];



  $due = $_POST['due'];



  $status = 'PROCESSING';



  $entry_by = $_SESSION['user_id'];



  



 



  



  $payment =$conn->query("INSERT INTO `payment` (`s_no`, `s_date`, `party`, `sales_amount`, `payment_amount`,`discount_amount`, `due_amt`,`payment_types`, `status`, `entry_by` ,`group_for`) VALUES ('".$_SESSION['sale_no']."', '".$sales_dates."', '".$party."', '".$sales_amount."', '".$total_collection."', '".$discount."','".$due."', '".$payment_type."','".$status."' ,'".$entry_by."','".$_SESSION['group_for']."')");



  if($payment==true)



  {



  $insert_id = mysqli_insert_id($conn);



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Payment Collected. Payment No. - <a href="sales_print_view.php?sale_no='.$_SESSION['sale_no'].' target="_blank">'.$_SESSION['sale_no'].'</a></span>';



  



  //journal start



if($total_collection>0){



$ssql2 = "select sum(d.amount) as total_amount,m.s_no,m.sales_date,c.ledger_id from sales_master m,sales_order d,customer_info c where m.s_no=d.s_no and m.group_for='".$_SESSION['group_for']."' and m.dealer_code=c.id and m.s_no='".$_SESSION['sale_no']."'";



$sql = $conn->query($ssql2);



$j_data = $sql->fetch_assoc();



$max_jv = find_a_field('journal','max(jv_no)','1');



$tr_from = 'Sales';







if($_POST['customer_type']=="Registered"){







$jv_date = $_POST['r_sales_date'];



}else{



$jv_date = $_POST['c_sales_date'];



}







$cr_ledger = 1000002;







$status = 'Unpaid';



$entry_by = '';







if($max_jv=='' || $max_jv==0){



$max_jv = date('Ymd');



}else{



    $max_jv = $max_jv+1;



}



$payable_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."','".$j_data['total_amount']."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_dr =$conn->query($payable_dr);



$payable_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by`,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$j_data['total_amount']."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."','".$_SESSION['group_for']."')";



$journal_insert_cr =$conn->query($payable_cr); 







$rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."','".$total_collection."',0,'Receipt','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_dr =$conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."',0,'".$total_collection."','Receipt','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_cr =$conn->query($rcv_cr); 







if($discount>0){



  $rcv_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','1000004','".$discount."',0,'Discount','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_dr =$conn->query($rcv_dr);



$rcv_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."',0,'".$discount."','Discount','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_cr =$conn->query($rcv_cr); 



}


}



//journa end

$select = $conn->query("select * from sales_order where group_for = '".$_SESSION['group_for']."' and s_no='".$_SESSION['sale_no']."'");



 while( $item_data = $select->fetch_assoc()){ 

$journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$item_data['s_date']."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['qty']."','".$item_data['s_no']."','Sales','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."')");

}







  $_SESSION['sale_no'] = '';



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}







if(isset($_POST['sales_submit'])){



if($_SESSION['sale_no']>0){



$journal_del = $conn->query('delete from journal where tr_no="'.$_SESSION['sale_no'].'" and tr_from="Sales"');



$journal_item_del = $conn->query('delete from journal_item where tr_no="'.$_SESSION['sale_no'].'" and tr_from="Sales"');







if($_POST['customer_type']=="Registered"){







$jv_date = $_POST['r_sales_date'];



}else{



$jv_date = $_POST['c_sales_date'];



}











$upd="update sales_master set sales_date='".$jv_date."' where s_no='".$_SESSION['sale_no']."' ";



$conn->query($upd);







$ssql2 = "select sum(d.amount) as total_amount,m.s_no,m.sales_date,c.ledger_id,c.business_name,c.mobile_no from sales_master m,sales_order d,customer_info c where m.s_no=d.s_no and m.group_for='".$_SESSION['group_for']."' and m.dealer_code=c.id and m.s_no='".$_SESSION['sale_no']."'";



$sql = $conn->query($ssql2);



$j_data = $sql->fetch_assoc();







$max_jv = find_a_field('journal','max(jv_no)+1','1');







$tr_from = 'Sales';







$cr_ledger = 1000002;















$status = 'Unpaid';



$entry_by = '';







if($max_jv==''){



$max_jv = date('Ymd');



}



$j_dr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$j_data['ledger_id']."','".$j_data['total_amount']."',0,'".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_dr =$conn->query($j_dr);



$j_cr = "INSERT INTO `journal` (`jv_no`, `jv_date`, `ledger_id`,`dr_amt`,`cr_amt`, `tr_from`, `tr_no`,`status`,`entry_by` ,`group_for`) VALUES ('".$max_jv."','".$jv_date."','".$cr_ledger."',0,'".$j_data['total_amount']."','".$tr_from."','".$_SESSION['sale_no']."','".$status."','".$entry_by."' ,'".$_SESSION['group_for']."')";



$journal_insert_cr =$conn->query($j_cr); 















$select = $conn->query("select * from sales_order where group_for = '".$_SESSION['group_for']."' and s_no='".$_SESSION['sale_no']."'");



 while( $item_data = $select->fetch_assoc()){



  



$journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$item_data['s_date']."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['qty']."','".$item_data['s_no']."','Sales','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."')");







}

$items = $conn->query("select i.item_name , d.qty from item_info i, sales_order d where i.item_id=d.item_id and s_no =".$j_data['s_no']." ");







while( $it_data = $items->fetch_assoc()){



$massage .= " ".$it_data['item_name'].",".$it_data['qty']." Bags \r\n";



}


 }else{



  $msg = '<span style="color:red; font-weight:bold; font-size:18px;">No data found!</span>';



 }



}



/*if(isset($_POST['add'])){



  $dealer_type = $_POST['customer_type'];



  $dealer = $_POST['dealer'];



  $dealer_name = $_POST['dealer_name'];



  $sales_date = $_POST['sales_date'];



  $address = $_POST['address'];



  $contact = $_POST['contact'];



 



  



  $insert =$conn->query("insert into sales_master(`sales_date`,`dealer_type`,`dealer_code`,`dealer_name`,`dealer_address`,`contact`) Values('".$sales_date."','".$dealer_type."','".$dealer."','".$dealer_name."','".$address."','".$contact."')");



  if($insert==true)



  {



  $insert_id = mysqli_insert_id($conn);



  $_SESSION['sale_no'] =  $insert_id;



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">New Sales Order Created. Sales No. - '.$insert_id.'</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }







}*/







if(isset($_POST['update'])){







  $dealer_type = $_POST['customer_type'];



  $dealer = $_POST['dealer'];



  $dealer_name = $_POST['dealer_name'];



  $sales_date = $_POST['sales_date'];



  $address = $_POST['address'];



  $contact = $_POST['contact'];



  



  if($_SESSION['sale_no']>0){



  $update = $conn->query("update sales_master set sales_date='".$sales_date."',dealer_type='".$dealer_type."',dealer_code='".$dealer."',dealer_name='".$dealer_name."',dealer_address='".$address."',contact='".$contact."' where s_no='".$_SESSION['sale_no']."'");



  }



  



  if($update==true)



  {



 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/



  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Successfully Updated. Sales No. - '.$_SESSION['sale_no'].'</span>';



  



  }



  else



  {



  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';



 }



}





echo "select * from sales_master where s_no='".$_SESSION['sale_no']."'";

$select = $conn->query("select * from sales_master where s_no='".$_SESSION['sale_no']."'");



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



 



 if(isset($_POST['sales_delete'])){



  $del = $conn->query("delete from sales_master where s_no=".$_SESSION['sale_no']."");



  $del2 = $conn->query("delete from sales_order where s_no=".$_SESSION['sale_no']."");



  $del3 = $conn->query("delete from journal where tr_from like 'Sales' and tr_no=".$_SESSION['sale_no']."");



  $del4 = $conn->query("delete from journal_item where tr_from like 'Sales' and tr_no=".$_SESSION['sale_no']."");



  $_SESSION['sale_no'] = ''; 



  //header('location:sale_entry.php');



  echo '<script>window.location.replace("sale_entry.php")</script>'; 


 }
  
  
  
  if(isset($_POST['master_submit'])){
	  
		
		$filename=$_FILES["att_file"]["tmp_name"];
     	if($_FILES["att_file"]["size"] > 0){
           
		      $file = fopen($filename, "r");



			  $count = 0;


          	  while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)



           	  {
              


			  $count++; 
             
			  if($count>1)
        


			  {
        $delivery_no = new_delivery_no();
		$_SESSION['sale_no'] = $_POST['s_no'];
		$item_id = $getData[0];
		$color = find_a_field('color_list','id','color="'.$getData[1].'"');
		$customer = trim($getData[2]);
		$address = trim($getData[3]);
		$mobile_1 = trim($getData[4]);
		$mobile_2 = trim($getData[5]);
		$rate = $getData[6];
		$qty = $getData[7];
		$agent = $getData[8];
		$note = $getData[9];
		$delivery_fee = $getData[10];
		$payment_type = $getData[11];
		$amount = $qty*$rate;
		$address = str_replace( array( '\'', '"',"'" , ';', '<', '>' ), ' ', $address);
		
		$check_customer = find_a_field('customer_info','id','customer_name="'.$customer.'" and mobile_no in ("'.$mobile_1.'","'.$mobile_2.'")');
		if($check_customer=="" || $check_customer==0){
			 
			 $customer_sql = "insert into customer_info(`customer_name`,`mobile_no`,`mobile_no_2`,`email`,`customer_address`,`entry_at`,`entry_by`) value('".$customer."','".$mobile_1."','".$mobile_2."','".$email."','".$address."','".date('Y-m-d H:i:s')."','".$_SESSION['user_id']."')";
			 $customer_insert = $conn->query($customer_sql);
			 $check_customer = $conn->insert_id;
			
			}
		
		if($agent!=''){
			 
			 $status = 'DELIVERED';
			
			}else{
				 
				 $status = 'MANUAL';
				
				}

		 $master_insert = $conn->query('insert into sales_master(`s_no`,`sales_date`,`entry_at`,`entry_by`,`warehouse`) value("'.$_POST['s_no'].'","'.$_POST['order_date'].'","'.date('Y-m-d H:i:s').'","'.$_SESSION['user_id'].'","'.$_SESSION['warehouse'].'")');
         
		$sql = 'insert into sales_order(`s_no`,`s_date`,`customer`,`item_id`,`qty`,`rate`,`amount`,`address`,`mobile_1`,`mobile_2`,`note`,`agency`,`status`,`color`,`delivery_fee`,`payment_type`,`warehouse`,`customer_id`) value("'.$_POST['s_no'].'","'.$_POST['order_date'].'","'.$customer.'","'.$item_id.'","'.$qty.'","'.$rate.'","'.$amount.'","'.$address.'","'.$mobile_1.'","'.$mobile_2.'","'.$note.'","'.$agent.'","'.$status.'","'.$color.'","'.$delivery_fee.'","'.$payment_type.'","'.$_SESSION['warehouse'].'","'.$check_customer.'")';
		$details_insert = $conn->query($sql);
		$last_id = $conn->insert_id;
		
		if($agent!=''){
			 
			 $agent_insert = $conn->query('insert into delivery_info (`delivery_no`,`s_no`,`sales_order_id`,`delivery_date`,`agency`,`item_id`,`sales_qty`,`unit_price`,`status`,`entry_by`,`entry_at`,`delivery_fee`,`payment_type`,`warehouse`) value("'.$delivery_no.'","'.$_POST['s_no'].'","'.$last_id.'","'.$_POST['order_date'].'","'.$agent.'","'.$item_id.'","'.$qty.'","'.$rate.'","PENDING","'.$_SESSION['user_id'].'","'.date('Y-m-d H:i:s').'","'.$delivery_fee.'","'.$payment_type.'","'.$_SESSION['warehouse'].'")');
			
			}

		 $msg = '<span style="color:green;">New Order Created! Order No : '.$_POST['s_no'].'</span>';

			  } 

			  }

			  fclose($file);  

			  }

}



if(isset($_POST['final_confirm'])){
	
	$sql = $conn->query('select * from sales_order where s_no="'.$_SESSION['sale_no'].'"');
	while($data=$sql->fetch_assoc()){
		$item_last_price = find_a_field('journal_item','rate','item_id="'.$data['item_id'].'" and color="'.$data['color'].'" and item_in>0 order by id desc');
	$journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`,`color`) VALUES ('".$data['s_date']."','".$data['item_id']."','".$item_last_price."','".$data['qty']."','".$data['s_no']."','Sales','".$_SESSION['user_id']."','".$_SESSION['warehouse']."','".$data['color']."')");
	}
	$update = $conn->query('update sales_master set status="CHECKED" where s_no="'.$_SESSION['sale_no'].'"');
	 unset($_SESSION['sale_no']);
	}



if($_GET['sid']>0){
	
	 $del = $conn->query('delete from sales_order where id="'.$_GET['sid'].'" and s_no="'.$_SESSION['sale_no'].'"');
	 $count = find_a_field('sales_order','count(id)','s_no="'.$_SESSION['sale_no'].'"');
	 if($count==0 || $count==''){
		 $del = $conn->query('delete from sales_master where s_no="'.$_SESSION['sale_no'].'"');
		 unset($_SESSION['sale_no']);
		 }
		
	}

?>



<style>



 



 .loader {



  border: 10px solid #f3f3f3;



  border-radius: 50%;



  border-top: 10px solid blue;



  border-right: 10px solid green;



  border-bottom: 10px solid red;



  width: 40px;



  height: 40px;



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



	



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->







		<div class="main-panel">



			<div class="content">



                <div class="row">



					<div class="container">



						<div class="card">



								<div class="card-header">



									<div class="d-flex align-items-center">



										<h4 class="card-title">Order Entry. <?php echo $msg;?></h4>







									</div>



									



								</div>



								



								<div class="card-body">



								<div class="alert alert-success alert-dismissible" id="success" style="display:none;">



	                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×x</a>



	                                </div>



									



									



							      <form method="post" action="sale_entry.php" autocomplete="off" enctype="multipart/form-data">



								        <div class="row">



								        <div class="col-4">

        								        <div class="form-group row">

                                                 <label  class="col-sm-2 col-form-label">Order No:</label>



                                                    <div class="col-sm-6">


                                                        <input type="text" name="s_no" id="s_no" value="<?php if($_SESSION['sale_no']>0) echo $_SESSION['sale_no']; else echo new_order_no();?>" class="form-control" style="font-size:16px;font-weight:bold;" readonly>
                                                    </div>



                                                </div>



                                                 </div>
                                                 
                                                 <div class="col-4">

        								        <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Import</label>



                                                    <div class="col-sm-6">



                                                      <input type="file" name="att_file"  class="form-control form-control" id="att_file">


                                                    </div>
                                                    </div>
                                                   </div>
                                                   
                                                   <div class="col-4">

        								        <div class="form-group row"> 



                                                    <label  class="col-sm-2 col-form-label">Date</label>



                                                    <div class="col-sm-6">



                                                      <input type="date" name="order_date" class="form-control">


                                                    </div>
                                                    </div>
                                                   </div>



                                                 </div>
                                                 
                                                 
                                                 
                                                 <div class="row">



								        
                                                 
                                                 <div class="col-12">

        								        <div class="form-group row">

                                                      <div class="col-sm-6"><a href="../files/example/example.csv" download>Download Example File</a></div>
                                                    <div class="col-sm-6">
                                                       
                                                       <?php if($_SESSION['sale_no']>0){?>
                                                      
                                                      <input type="submit" name="final_confirm" value="Confirm" class="btn btn-primary">
                                                      <?php }else{?>
                                                      <input type="submit" name="master_submit" value="Submit"  class="btn btn-primary" id="master_submit">
                                                       <? } ?>
                                                    </div>
                                                    </div>
                                                   </div>
                                                   
                                                   



                                                 </div>
                                                 </form>
    
								   </div>



								



							</div>



							</form>



						</div>





	<table cellpadding="10" cellspacing="1" width="12%" style="float:left;">



		<tbody id="ajax-response">



		</tbody>



	</table>




	<?php if($_SESSION['sale_no']>0){?>

    

	<table id="add-row" class="display table table-striped table-hover" >



											<thead>



												<tr>

												<th>SL No</th>



													<th>Sales No</th>




													<th>Sales Date</th>



													<th>Customer Name</th>
                                                    
                                                    <th>Agency</th>



												    <th>Delivery Address</th>



													<th>Product name</th>



													<th>Qty</th>



													<th>Sales Amount</th>



								                    <th style="width: 10%">Action</th>



												</tr>



											</thead>



											



											<tbody>



											<?php



											 $sql = "select s.*,d.*,i.item_name



											 from sales_master s, item_info i ,sales_order d



											 where i.item_id=d.item_id and s.s_no = d.s_no and s.s_no='".$_SESSION['sale_no']."'";



											     $select =$conn->query($sql); $i=1;



											 while($c_data = $select->fetch_assoc()){

											 ?>







												<tr>

												 <td><?php echo $i++;?></td>



												    <td><?php echo $c_data['s_no']?></td>



													<td><?php echo $c_data['sales_date']?></td>



													<td><?php echo $c_data['customer']?></td>
                                                    
                                                    <td><?php echo $c_data['agency']?></td>
                                                    
                                                    <td><?php echo $c_data['address']?></td>



													<td><?php echo $c_data['item_name']?></td>



													<td><?php echo $c_data['qty']?></td>



													<td><?php echo $c_data['amount'];?></td>



													



													<td><a href="?sid=<?php echo $c_data['id']?>"><input type="submit" name="row_delete" id="addRowButton" value="Delete" class="btn btn-danger" /></a></td>

													</tr>

													<?php } ?>

													</tbody>

													<tfoot>

											        <tr>

													<th></th>

													<th></th>

													<th></th>

													<th></th>

													<th></th>

													<th></th>

												</tr>

											</tfoot>

											</table>
                                            
											<?php } ?>
					</div>



				</div>



			</div>



 

<?php include('../template/footer.php');?>



