<?php 



$page_name ='Pos Sales Entry';  



session_start();

if($_GET['clear']>0){
	unset($_SESSION['sale_no']);
	header('location:sale_entry_pos.php');
	}

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







//Text Sms







function sms($dest_addr,$sms_text){



$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";







$fields = array(



    'Username'      => "mollik",



    'Password'      => "Mplaza@123",



    'From'          => "MollikPlaza",



    'To'            => $dest_addr,



    'Message'       => $sms_text



);



$ch = curl_init();



curl_setopt($ch, CURLOPT_URL, $url);



curl_setopt($ch, CURLOPT_POST, count($fields));



curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));



$result = curl_exec($ch);



curl_close($ch);



}







$recipients ="88".$j_data['mobile_no']."";



$massage  = "Dear Sir,\r\nNew Sales Submitted. \r\n";



$massage .= "Sales No. ".$j_data['s_no']." Date: ".$j_data['sales_date']." \r\n";



$massage .= "Party Name : ".$j_data['business_name']." \r\n";







$items = $conn->query("select i.item_name , d.qty from item_info i, sales_order d where i.item_id=d.item_id and s_no =".$j_data['s_no']." ");







while( $it_data = $items->fetch_assoc()){



$massage .= " ".$it_data['item_name'].",".$it_data['qty']." Bags \r\n";



}







$massage .= "Total Amount : ".$j_data['total_amount']." Taka \r\n";



$massage .= "Current Balance: ".find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id='.$j_data['ledger_id'])." Taka \r\n";



$sms_result=sms($recipients, $massage);



//$api =  'https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza&To=8801737174415&Message=testmessage';



//Text Sms







 $msg .= '<span style="color:green; font-weight:bold; font-size:18px;">Order Entry Successful</span>';



 $_SESSION['sale_no'] = '';



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



	



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>







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



									



									



								    <form method="post" id="sales" autocomplete="off">



								        <div class="row">



								        <div class="col-4">

        								        <div class="form-group row">



        								            <div class="col-sm-2"><div class="loader" id="load" align="center" title="Internet maybe slow" style="margin-left:44%; display:none;"></div></div>



                                                    <label  class="col-sm-2 col-form-label">Order No:</label>



                                                    <div class="col-sm-6">


                                                        <input type="text" name="s_no" id="s_no" value="<?php if($_SESSION['sale_no']>0) echo $_SESSION['sale_no']; else echo new_order_no();?>" class="form-control" style="font-size:16px;font-weight:bold;" readonly>
                                                    </div>



                                                  



                                                </div>



                                                 </div>
                                                 
                                                 <div class="col-8">

        								        <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Customer Type</label>



                                                    <div class="col-sm-6">



                                                      <select name="customer_type"  class="form-control form-control" id="customer" onchange="ctype()">



													  <option></option>



													  <option <?php echo ($data['dealer_type']=="Registered")? 'selected':''?> value="Registered">Registered</option>



                                                      <option <?php echo($data['dealer_type']=="Corporate")? 'selected':''?> value="Corporate">Corporate</option>



													  



													  </select>



                                                    </div>



                                                  



                                                </div>



                                                 </div>



                                                 </div>



								        <!-- Registered Customer Start-->



								        <div class="row" id="rc" style="display:none;">



    								        



                                                 <div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Select Party:</label>



                                                    <div class="col-sm-10">



                                                     <input name="r_dealer_id"  class="form-control form-control" id="r_dealer_id" onchange="party()" list="party" value="<?php if($data['dealer_name']!='') echo $data['dealer_name'].'#'.$data['dealer_code'];?>"/>

													 

													<datalist id="party">



													  <?php $d_s = $conn->query("select * from customer_info where group_for = '".$_SESSION['group_for']."' and status='Active' and customer_type='Registered'");



                                                           while($dealer = $d_s->fetch_assoc()){



														   



														   ?>



													  <option <?php echo ($data['dealer_code']==$r_dealer['id'])? 'selected':''?> value="<?php echo $dealer['business_name']."#".$dealer['id'];?>"><?php echo $dealer['business_name']."-".$dealer['customer_address'];?></option>



                                                      



													  <?php } ?>



													  </datalist>



                                                    </div>



                                                    



                                                </div>



                                            </div>



											<div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Date:</label>



                                                    <div class="col-sm-10">



                                                      <input type="date" name="r_sales_date"  class="form-control form-control-sm" id="r_sales_date" value="<?php echo $data['sales_date']?>" required>



                                                    </div>



                                                </div>



                                                



                                               



                                            </div>



											



											<div class="col-12">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Address:</label>



                                                    <div class="col-sm-10">



                                                      <input type="text" name="r_address"  class="form-control form-control-sm" id="r_address"  value="<?php echo find_a_field('customer_info','customer_address','id="'.$data['dealer_code'].'"');?>" readonly>



                                                    </div>



                                                   



                                                </div>



                                            </div>



											<div class="col-12">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Delivery Mode:</label>



                                                    <div class="col-sm-10">



                                                      <select name="delivery_mode"  class="form-control form-control" id="delivery_mode">



													  <option></option>
                                                      <option <?=($data['delivery_mode']=='H2H')? 'selected' : ''?>>H2h</option>
                                                      <option <?=($data['delivery_mode']=='Courier')? 'selected' : ''?>>Courier</option>
                                                      <option <?=($data['delivery_mode']=='Pathao')? 'selected' : ''?>>Pathao</option>



													  </select>



                                                    </div>



                                                    



                                                </div>



                                            </div>



                                            



											



											<div class="col-12">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Item:</label>



                                                    <div class="col-sm-10">



                                                      <select name="item_id"  class="form-control form-control" id="item_id">



													  <option></option>



													  <?php $itm = $conn->query("select * from item_info where group_for = '".$_SESSION['group_for']."' and status='Active'");



                                                           while($item = $itm->fetch_assoc()){



														   

														   ?>



													  <option <?php echo ($data['item_id']==$item['item_id'])? 'selected':''?> value="<?php echo $item['item_id']?>"><?php echo $item['item_name']?></option>



                                                      



													  <?php } ?>



													  



													  </select>



                                                    </div>



                                                    



                                                </div>



                                            </div>



                                            



								        </div>



								        <!--  Registered Customer End-->



								        



								         <!--  Corporate Customer Start-->



								        <div class="row" id="cc" style="display:none;">



    								        



                                                 <div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Party Name:</label>



                                                    <div class="col-sm-10">



													



                                                      <input type="text" name="c_dealer_name"  list="partylist" class="form-control custom-select custom-select-sm" id="c_dealer_name"  value="<?php if($data['dealer_name']!='') echo $data['dealer_name'].'<#>'.$data['dealer_address'];?>" onchange="c_party()">



													  <datalist id="partylist">



																	 <?php 



																	  $s = $conn->query("select * from customer_info where group_for = '".$_SESSION['group_for']."' and customer_type='Corporate'");



																	  while($dealer = $s->fetch_assoc()){



																	 ?>



                                                                        <option value="<?php echo $dealer['business_name'].'<#>'.$dealer['customer_address'];?>">



                                                                       <?php } ?>



                                                                     </datalist> 



																	 

                                                    </div>



													



                                                   



                                                </div>



                                            </div>



                                            <div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Date:</label>



                                                    <div class="col-sm-10">



                                                      <input type="date" name="c_sales_date" class="form-control form-control-sm" id="c_sales_date" value="<?php echo $data['sales_date']?>">



                                                    </div>



                                                </div>



                                                



                                               



                                            </div>



                                            <div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Address:</label>



                                                    <div class="col-sm-10">



                                                      <input type="text" name="c_address"  class="form-control form-control-sm" id="c_address"  value="<?php echo $data['dealer_address']?>">



                                                    </div>



                                                   



                                                </div>



                                            </div>



                                            <div class="col-6">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Phone:</label>



                                                    <div class="col-sm-10">



                                                      <input type="text" name="c_contact"  class="form-control form-control-sm" id="c_contact" value="<?php echo $data['contact']?>">



                                                    </div>



                                                </div>



                                                



                                               



                                            </div>



                                            



                                            <div class="col-12">



                                                <div class="form-group row">



                                                    <label  class="col-sm-2 col-form-label">Item:</label>



                                                    <div class="col-sm-10">



                                                      <select name="c_item_id"  class="form-control form-control" id="c_item_id">



													  <option></option>



													  <?php $itm = $conn->query("select * from item_info where group_for = '".$_SESSION['group_for']."' and status='Active'");



                                                           while($item = $itm->fetch_assoc()){



														   



														   ?>



													  <option <?php echo ($data['item_id']==$item['item_id'])? 'selected':''?> value="<?php echo $item['item_id']?>"><?php echo $item['item_name']?></option>



                                                      



													  <?php } ?>



													  



													  </select>



                                                    </div>



                                                    



                                                </div>



                                            </div>



								        </div>



								         <!--  Corporate Customer End-->



										<!--



										 <input type="submit" name="update" value="Update" id="btnSaveAction" class="btn btn-warning">



										



										 <input type="submit" name="add" value="Add" id="btnSaveAction" class="btn btn-success">-->



										



								    



								</div>



								



							</div>



							



						<!--<div class="card">



					        <div class="card-body">



						        <table class="text-center">



							            <thead>



    							            <th>Item Name</th>



    							            <th>Stock</th>



    							            <th>Unit</th>



    							            <th>Rate</th>



    							            <th>Qty</th>



    							            <th>Amount</th>



											<th>Action</th>



							            </thead>



							            <tbody>



										



										



							                <tr>



							                    <td><select name="item_name"  class="form-control form-control" id="item_name">



													  <option></option>



													  <option value="1">Mobile</option>



													  <option value="2">Laptop</option>



													  



													  </select>



												<input type="hidden" id="s_date" value="<?php echo $data['sales_date']?>" /></td>



							                    <td><input type="text" list="items" name="stock"  class="form-control form-control" id="stock" value="" required></td>



							                    <td><input type="text" list="items" name="unit"  class="form-control form-control" id="unit" value="" required></td>



							                    <td><input type="text" list="items" name="rate"  class="form-control form-control" id="rate" value="" required></td>



							                    <td><input type="text" list="items" name="qty"  class="form-control form-control" id="qty" value="" required></td>



							                    <td><input type="text" list="items" name="amount" class="form-control form-control" id="amount" value="" required></td>



							                    <td><input type="button" name="save" class="btn btn-primary" value="Add Item" id="save"></td>



							                </tr>



							            </tbody>



							        </table>



						    </div>



						    



						</div>-->



						



						<div class="card" >



					        <div class="card-body">



						        <table class="text-center" style="width:100%">



							            <thead>



    							            <th>Item Name</th>



    							            <th>Stock</th>



    							            <th>Unit</th>



    							            <th>Rate</th>



    							            <th>Qty</th>



    							            <th>Amount</th>



											<th colspan="2">Action </th>



							            </thead>



							            <tbody>



										<tbody id="show"> 



										<?php


                                         $sql = "select * from sales_order where s_no='".$_SESSION['sale_no']."' ";
										 $select = $conn->query($sql);



                                         while( $item_data = $select->fetch_assoc()){



										 $unit = find_a_field('item_info','uom','item_id="'.$item_data['item_id'].'"');



										 $dealer_id = find_a_field('sales_master','dealer_code','s_no="'.$_SESSION['sale_no'].'"');



                                         $dealer_name = find_a_field('customer_info','business_name','id="'.$dealer_id.'"');



										 $customer_address = find_a_field('customer_info','customer_address','id="'.$dealer_id.'"');



										



										?>



										<tr>



			



			<td><input type="hidden" name="cdealername" id="cdealername" value="<?php if($dealer_name!='') echo $dealer_name.'<#>'.$customer_address;?>" /><select name="item_name_<?php echo $item_data['id'];?>"  class="form-control form-control" id="item_name_<?php echo $item_data['id'];?>" onchange="edit(<?php echo $item_data['id'];?>)">
			  
			  
			  
			  <option></option>
			  
			  
			  
			  <?php $itm = $conn->query("select * from item_info where group_for = '".$_SESSION['group_for']."' and status='Active'");



                    while($item = $itm->fetch_assoc()){



					?>
			  
			  
			  
			  <option <?php echo ($item_data['item_id']==$item['item_id'])? 'selected':''?> value="<?php echo $item['item_id']?>"><?php echo $item['item_name']?></option>
			  
			  
			  
			  <?php } ?>
			  
			  
			  
			  </select><input type="hidden" name="update_id_<?php echo $item_data['id'];?>" id="update_id_<?php echo $item_data['id'];?>" onkeyup="edit(<?php echo $item_data['id'];?>)" value="<?php echo $item_data['id'];?>" /></td>



			<td><input type="text"  name="stock_<?php echo $item_data['id'];?>"  class="form-control form-control" id="stock_<?php echo $item_data['id'];?>" onkeyup="edit(<?php echo $item_data['id'];?>)" value="<?php echo find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$item_data['item_id'].'"')?>" required></td>



			<td><input type="text"  name="unit_<?php echo $item_data['id'];?>" list="new_unit_<?php echo $item_data['id'];?>"  class="form-control form-control" id="unit_<?php echo $item_data['id'];?>" onkeyup="edit(<?php echo $item_data['id'];?>)" value="<?php if($item_data['unit']!='') echo $item_data['unit']; else  echo $unit;?>" required>



			 <datalist id="new_unit_<?php echo $item_data['id'];?>">




																	 <?php 
																	  $s = $conn->query("select unit  as unit_name from sales_order where 1 group by unit");
																	  while($unit = $s->fetch_assoc()){

																	 ?>



                                                                        <option value="<?php echo $unit['unit_name']?>">



                                                                       <?php } ?>



                                                                     </datalist> 



			</td>



			<td><input type="text"  name="rate_<?php echo $item_data['id'];?>"  class="form-control" id="rate_<?php echo $item_data['id'];?>" onblur="cal(<?php echo $item_data['id'];?>);" value="<?php echo $item_data['rate'];?>" required></td>



			<td><input type="text"  name="qty_<?php echo $item_data['id'];?>"  class="form-control form-control" id="qty_<?php echo $item_data['id'];?>" onblur="edit(<?php echo $item_data['id'];?>);cal(<?php echo $item_data['id'];?>);" value="<?php echo $item_data['qty'];?>" required></td>



			<td><input type="text"  name="amount_<?php echo $item_data['id'];?>" class="form-control form-control" id="amount_<?php echo $item_data['id'];?>" value="<?php echo $item_data['amount'];?>" required></td>



			



			<td><button onclick="deleteData(<?php echo $item_data['id'];?>)" id="del_<?php echo $item_data['id'];?>" class="btn btn-danger">X</button></td>



			<td><div class="loader" id="updateload_<?php echo $item_data['id'];?>" align="center" title="Internet maybe slow" style="display:none;"></div><!--<input type="button" name="edit_<?php echo $item_data['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?php echo $item_data['id'];?>">--></td>



			



			</tr>



			<?php } ?>

							            </tbody>



							        </table>



						    </div>

							

							</div>



							



						    <!--<div class="card-footer text-center">



						        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal" id="pay" onclick="pay();">Collection</button>



								



						    </div>-->



							



							<div class="card-footer text-center">



						       



								



                                <input type="submit" name="sales_submit" class="btn btn-secondary">



								<?php if($_SESSION['sale_no']>0){?>



								<input type="submit" name="sales_delete" value="Delete" class="btn btn-warning">



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



                    <h5 class="modal-title" id="exampleModalLongTitle">Item Information</h5>



                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                        <span aria-hidden="true">×</span>



                    </button>



                </div>



                <div class="modal-body">



													<p class="small">Cash Collection</p>



													



														<div class="row">



															<div class="col-sm-6">



																<div class="form-group form-group-default">



																	<label>Party <span style="color:#FF0000; font-size:15px;"></span></label>



																	<input type="hidden" name="s_no"  id="s_no"  class="form-control" value="<?php echo $_SESSION['sale_no']?>">



																	



																	<input type="text" name="party"  id="party"  class="form-control" value="" readonly>



																</div>



															</div>



															<div class="col-sm-6">



																<div class="form-group form-group-default">



																	<label>Sales Date <span style="color:#FF0000; font-size:15px;"></span></label>



																	



																	<input type="text" name="sales_dates"  id="sales_dates"  class="form-control" value="" readonly>



																</div>



															</div>



															<div class="col-sm-12">



																<div class="form-group form-group-default">



																	<label>Sales Amount <span style="color:#FF0000; font-size:15px;"></span></label>



																	<input type="text" name="sales_amount"  id="sales_amount"  class="form-control" value="" required readonly>



																</div>



															</div>



															<div class="col-sm-6">



																<div class="form-group form-group-default">



																	<label>Collection<span style="color:#FF0000; font-size:15px;">*</span></label>



																	<input type="text" name="collection"  id="collection"  class="form-control" value="" onchange="paycal()" required>



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



																	<option>Cash</option>



																	<option>Bank</option>



																	<option>Commision</option>



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



																	<label>Total Collection</label>



																	<input name="total_collection" id="total_collection" type="text" class="form-control" value="">



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



	<?php if($_SESSION['sale_no']==''){?>



	<table id="add-row" class="display table table-striped table-hover" >



											<thead>



												<tr>

												<th>SL No</th>



													<th>Sales No</th>



													<th>Sales Date</th>



													<th><?php echo $_SESSION['user_id'];
echo 'bimol';?>Party Name</th>



														<th>Party Address</th>



													<th>Item name</th>



													<th>Qty</th>



													<th>Sales Amount</th>



								                    <th style="width: 10%">Action</th>



												</tr>



											</thead>



											



											<tbody>



											<?php



											 $sql = "select s.*,c.business_name,c.customer_type,c.customer_address, i.item_name , d.qty



											 from sales_master s, customer_info c, item_info i ,sales_order d



											 where i.item_id=d.item_id and c.id=s.dealer_code and s.s_no = d.s_no 

											 

											 group by s.s_no , s.sales_date 

											 

											 order by s.s_no desc";



											     $select =$conn->query($sql); $i=1;



											 while($c_data = $select->fetch_assoc()){

											 ?>







												<tr>

												 <td><?php echo $i++;?></td>



												    <td><?php echo $c_data['s_no']?></td>



													<td><?php echo $c_data['sales_date']?></td>



													<td><?php echo $c_data['business_name']?></td>



														<td><?php echo $c_data['customer_address']?></td>



													<td><?php echo $c_data['item_name']?></td>



													<td><?php echo $c_data['qty']?></td>



													<td><?php echo find_a_field('sales_order','sum(amount)','s_no='.$c_data['s_no']);?></td>



													



													<td><a href="?s_no=<?php echo $c_data['s_no']?>"><input type="submit" name="update" id="addRowButton" value="Update" class="btn btn-primary" /></a></td>

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



 <script>
	function ctype(){
    var type = document.getElementById('customer').value;

    if(type=='Registered'){

        document.getElementById('rc').style.display="";



        document.getElementById('cc').style.display="none";



    }else if(type=='Corporate'){
        document.getElementById('cc').style.display="";

        document.getElementById('rc').style.display="none";
    }

	}


	window.onload = ctype;



</script>











<script>



$(document).ready(function() {



	$("#item_id").change(function(){



		$("#item_id").attr("disabled", "disabled");



		$("#load").attr("style","display:");



		var s_no = $('#s_no').val();
        
        var item_id = $('#item_id').val();



		var customer_type = $('#customer').val();



		var dealer_name = $('#c_dealer_name').val();



		var c_sales_date = $('#c_sales_date').val();



		var address = $('#c_address').val();



		var contact = $('#c_contact').val();
        
        var delivery_mode = $('#delivery_mode').val();
		
		var r_dealer = $('#r_dealer_id').val();



		var r_sales_date = $('#r_sales_date').val();




		if(item_id!=""){


			if(r_sales_date !="" || c_sales_date!=""){



			$.ajax({



				url: "sales_ajax.php",



				type: "POST",



				data: {



					item_id: item_id,
                    
                    s_no: s_no,



					customer_type: customer_type,



					dealer_name: dealer_name,



					c_sales_date: c_sales_date,



					address: address,



					contact : contact,
                    
                    delivery_mode : delivery_mode,


					r_dealer : r_dealer,



					r_sales_date : r_sales_date



									



				},



				cache: false,



				success: function(dataResult){



					var dataResult = JSON.parse(dataResult);



					if(dataResult.statusCode==200){



						$("#save").removeAttr("disabled");



						$('#sales').find('input:text').val('');



						$("#success").show();



						$('#success').html(dataResult.row+' Item added successfully !');



						



						$('#show').load('sales_view_ajax.php');



						$("#item_id").removeAttr("disabled");



						$("#load").attr("style","display:none");

						

						location.reload();



						party();



						



						



						



											



					}



					else if(dataResult.statusCode==201){



					   alert("Error occured !");



					}



					



				}



			});



		}else{ alert('Please fill Date field properly !'); }



		}else{



			alert('Please fill all the field !');



		}



	});



});











$(document).ready(function() {



	$("#c_item_id").change(function(){



	    $("#c_item_id").attr("disabled", "disabled");



		$("#load").attr("style","display:");



		var item_id = $('#c_item_id').val();



		var customer_type = $('#customer').val();



		var dealer_name = $('#c_dealer_name').val();



		var c_sales_date = $('#c_sales_date').val();



		var address = $('#c_address').val();



		var contact = $('#c_contact').val();
        var delivery_mode = $('#delivery_mode').val();


		



		var r_dealer = $('#r_dealer_id').val();



		var r_sales_date = $('#r_sales_date').val();



		



		



		if(item_id!=""){



			$.ajax({



				url: "sales_ajax.php",



				type: "POST",



				data: {



					item_id: item_id,



					customer_type: customer_type,



					dealer_name: dealer_name,



					c_sales_date: c_sales_date,



					address: address,



					contact : contact,
                    
                    delivery_mode : delivery_mode,


					r_dealer : r_dealer,



					r_sales_date : r_sales_date



									



				},



				cache: false,



				success: function(dataResult){



					var dataResult = JSON.parse(dataResult);



					if(dataResult.statusCode==200){



						$("#save").removeAttr("disabled");



						$('#sales').find('input:text').val('');



						$("#success").show();



						$('#success').html(dataResult.row+' Item added successfully !');



						$('#success').html(dataResult.msg);



						$('#show').load('sales_view_ajax.php');



						$("#c_item_id").removeAttr("disabled");



						$("#load").attr("style","display:none");



						//$("#c_dealer_name").attr("value",dataResult.pawri);



						document.getElementById("c_dealer_name").value =dataResult.pawri;



						



						c_party();

                        location.reload();

											



					}



					else if(dataResult.statusCode==201){



					   alert("Error occured !");



					}



					



				}



			});



		}



		else{



			alert('Please fill all the field !');



		}



	});



});







$("#item_id").change(function(){



		$('#show').load('sales_view_ajax.php');



		$("#r_address").attr("value", "address"); 



		party();



		



		});



		



		$("#c_item_id").change(function(){



		$('#show').load('sales_view_ajax.php');



		document.getElementById("c_dealer_name").value = document.getElementById("cdealername").value;



		c_party();



		



		});



		











function edit(id){



$(document).ready(function() {



    



	    //$('#edit').on('click', function(){



		



		$("#edit_"+id).attr("value", "W...");



		$("#del_"+id).attr("disabled", "disabled");



		$("#updateload_"+id).attr("style","display:");



		var item_id = $('#item_name_'+id).val();



		var unit_name = $('#unit_'+id).val();



		var rate = $('#rate_'+id).val();



		var qty = $('#qty_'+id).val();



		var amount = $('#amount_'+id).val();



		var update_id = $('#update_id_'+id).val();



		if(item_id!=""){



			$.ajax({



				url: "sales_edit_ajax.php",



				type: "POST",



				data: {



					item_id: item_id,



					unit_name: unit_name,



					rate: rate,



					qty: qty,



					amount: amount,



					update_id : update_id,



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



						$("#updateload_"+id).attr("style","display:none");



						document.getElementById("c_dealer_name").value = $('#cdealername').val();



						



						 //party();



						 //c_party();

						 location.reload();



						



									



					}



					else if(dataResult.statusCode==201){



					   alert("Error occured !");



					}



					



				}



			});



		}



		else{



			alert('Please fill all the field !');



		}



	



});



}











	function deleteData(str){



	  var id = str;



	  $("#updateload_"+id).attr("style","display:");



	  $.ajax({



	    type:"GET",



		url:"delete_ajax.php?p=del",



		data: "id="+id,



		success: function(dataResult){



		var dataResult = JSON.parse(dataResult);



					if(dataResult.statusCode==200){



					    alert('deleted');



						$('#sales').find('input:text').val('');



						$("#success").show();



						$('#success').html(' Line Deleted !'); 



						$('#show').load('sales_view_ajax.php');	



						$("#updateload_"+id).attr("style","display:none");



						document.getElementById("c_dealer_name").value = $('#cdealername').val();



						//party();



						//c_party();

						

						location.reload();



									



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



		s_no: $("#s_no").val()



		},



		success: function(data){







		$("#sales_amount").val(data.sales_info.total_amt);



		$("#party").val(data.sales_info.dealer_name);



		$("#sales_dates").val(data.sales_info.sales_date);



		



		}



		})



		



		



});



}







function party(){







$(document).ready(function() {



    



		$.ajax({



		url: "party_info_ajax.php",



		method: "POST",



		dataType:"json",



		data:{



		dealer_id: $("#r_dealer_id").val()



		},



		success: function(data){







		$("#r_address").val(data.dealer_info.customer_address);



		



		}



		})



		



		



});



}







function c_party(){



$(document).ready(function() {



    



		$.ajax({



		url: "party_info_ajax_corporate.php",



		method: "POST",



		dataType:"json",



		data:{



		dealer_id: $("#c_dealer_name").val()



		},



		success: function(data){







		$("#c_address").val(data.dealer_info.customer_address);



		$("#c_contact").val(data.dealer_info.mobile_no);



		$("#c_address").attr("readonly","readonly");



		$("#c_contact").attr("readonly","readonly");



		



		



		



		}



		})



		



		



});



}















function cal(id){







var rate = (document.getElementById('rate_'+id).value)*1;



var qty = (document.getElementById('qty_'+id).value)*1;



var total = rate*qty;



document.getElementById('amount_'+id).value = total.toFixed(2);



}







function paycal(){ 







var sales_amount = (document.getElementById('sales_amount').value)*1;



var collectoin = (document.getElementById('collection').value)*1;



var discount = (document.getElementById('discount').value)*1;



var total = collectoin+discount;







var due = sales_amount-(collectoin+discount);



document.getElementById('total_collection').value = total.toFixed(2);



document.getElementById('due').value = due.toFixed(2);



}



	</script>











<?php include('../template/footer.php');?>



