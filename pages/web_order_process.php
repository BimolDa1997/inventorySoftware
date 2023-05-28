<?php 

$page_name ='Website Order Manage';  
session_start();
include ('../common/library.php');  
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');


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


if(isset($_POST['delivery'])){
	
	$delivery_no = new_delivery_no();
	$agency = $_POST['agency'];
	$delivery_date = $_POST['delivery_date'];
	$sql = "select o.*,c.*,i.item_name,c.id as uid from orders o, carts c, item_info i where i.item_id=c.product_id and c.order_id=o.order_id and c.status='PENDING'";

	$select =$conn->query($sql);
	while($data = $select->fetch_assoc()){
	  $to = $data['email'];
	  $subject = 'Delivery On The Way';
	  $toName = '';
	  $msg = 'Dear Sir,<br>Your Product Already Shifted To Delivery Agency.'; 
	  $cc = '';
	  $checked = $_POST['check'.$data['uid']];
	  if($checked=='checked'){
		  $insert = $conn->query('insert into delivery_info(`delivery_no`,`s_no`,`sales_order_id`,`delivery_date`,`agency`,`item_id`,`sales_qty`,`unit_price`,`amount`,`entry_by`,`entry_at`,`type`,`color`)
		  value("'.$delivery_no.'","'.$data['order_id'].'","'.$data['uid'].'","'.$delivery_date.'","'.$agency.'","'.$data['product_id'].'","'.$data['quantity'].'","'.$data['rate'].'","'.$data['amount'].'","'.$_SESSION['user_id'].'","'.date('Y-m-d H:i:s').'","EXTERNAL","'.$data['color'].'")');
		  
		  $item_last_price = find_a_field('journal_item','rate','item_id="'.$data['product_id'].'" and color="'.$data['color'].'" and item_in>0 order by id desc');
	$journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`,`color`) VALUES ('".$delivery_date."','".$data['product_id']."','".$item_last_price."','".$data['quantity']."','".$data['order_id']."','WebSales','".$_SESSION['user_id']."','1','".$data['color']."')");
	
		  $update = $conn->query('update carts set status="DELIVERED" where id="'.$data['uid'].'"');
		  }
		  if($update){
		      
			   mailer($to,$toName,$subject,$msg,$cc);
			  $msg = '<span style="color:green; font-weight:bold;">Selected Product Delivered</span>';
			  }else{
				  
				  $msg = '<span style="color:red; font-weight:bold;">Try Again!</span>';
				  }
	
	}
	
	}
	
	
	
	
	
	
if(isset($_POST['hold'])){
	
	$delivery_no = new_delivery_no();
	$agency = $_POST['agency'];
	$delivery_date = $_POST['delivery_date'];
	$sql = "select o.*,c.*,i.item_name,c.id as uid from orders o, carts c, item_info i where i.item_id=c.product_id and c.order_id=o.order_id and c.status='PENDING'";

	$select =$conn->query($sql);
	while($data = $select->fetch_assoc()){
	  
	  $checked = $_POST['check'.$data['uid']];
	  if($checked=='checked'){
		 
		  $update = $conn->query('update carts set status="HOLD" where id="'.$data['uid'].'"');
		  }
		  if($update){
			  $to = $data['email'];
	          $subject = 'Order Canceled';
	          $toName = '';
	          $msg = 'Dear Sir,<br>Your Order Canceled. For More Details Please Visit Your Account'; 
	          $cc = '';
			   mailer($to,$toName,$subject,$msg,$cc);
			  $msg = '<span style="color:green; font-weight:bold;">Selected Item Hold</span>';
			  }else{
				  
				  $msg = '<span style="color:red; font-weight:bold;">Try Again!</span>';
				  }
	
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



	



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>







		<div class="main-panel">
         <form name="" method="post">


			<div class="content">



                <div class="row">
                 

                  

					<div class="container">
                    
                    
                    
                    

                         <div class="row">
                                          
                                                 
                                             <div class="col-12">
                                             
                   
                   
                                              <div class="form-group row">
                                                 <label  class="col-sm-2 col-form-label"><?=$msg?></label>
                                                    <div class="col-sm-6">&nbsp;</div>
                                                          </div>
                                                     
                                                     <div class="form-group row">
                                                     <label  class="col-sm-2 col-form-label">&nbsp;</label>
                                                      <div class="col-sm-6">&nbsp;</div>
                                                       </div>
                                                       
                                                       
                                                     
                                                    </div>
                                                    </div>

<div class="row">
                                          
                                                 
                                             <div class="col-12">
                                             
                   
                   
                                              <div class="form-group row">
                                                 <label  class="col-sm-2 col-form-label"><?=$msg?>Enter Agency Name</label>
                                                    <div class="col-sm-6">
                                                    <input type="text" name="agency" id="agency" class="form-control form-control">
                                                     <!--<select name="agency"  class="form-control form-control" id="agency">
                                                       <option></option>
                                                       <option value="1">Sundorban</option>
                                                        <option value="2">S.A Paribahan</option>
                                                        </select>-->
                                                         </div>
                                                          </div>
                                                     
                                                     <div class="form-group row">
                                                     <label  class="col-sm-2 col-form-label">Delivery Date</label>
                                                      <div class="col-sm-6">
                                                       <input type="date" name="delivery_date" id="delivery_date" class="form-control form-control" value="<?=$_POST['delivery_date']?>">
                                                       
                                                        </div>
                                                       </div>
                                                       
                                                       
                                                     
                                                    </div>
                                                    </div>

						
								    
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



                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $msg;?></h5>
                </div>



                <div class="modal-body">



													<p class="small">&nbsp;</p>
													<div class="row">
													  <div class="col-md-6">
													    
													    
													    </div>



															



															



															



														</div>



													



												</div>



            </div>



        </div>



    </div>



	</form>



	



	<table id="add-row" class="display table table-striped table-hover" >



											<thead>



												<tr>

												<th>SL No</th>
                                                
                                                 <th>Check</th>



													<th>Order No</th>



													<th>Order Date</th>



													<th>Customer Name</th>

                                                    <th>Contact No.</th>

												    <th>Delivery Address</th>



													<th>Product name</th>



													<th>Qty</th>
                                                    
                                                    <th>Rate</th>



													<th>Order Amount</th>
                                                    
                                                    <th>Action</th>
                                                    
                                                    <th>View Logs</th>




												</tr>



											</thead>



											



											<tbody>



											<?php



											$sql = "select o.*,c.*,i.item_name,c.id as uid from orders o, carts c, item_info i where i.item_id=c.product_id and c.order_id=o.order_id and c.status='PENDING'";



											     $select =$conn->query($sql); $i=1;



											 while($c_data = $select->fetch_assoc()){

											 ?>







												<tr>

												 <td><?php echo $i++;?></td>
                                                 
                                                   <td><input type="hidden" name="id<?=$c_data['id']?>" id="id<?=$c_data['id']?>" value="<?=$c_data['id']?>">
                                                   <input type="hidden" name="order_id<?=$c_data['id']?>" id="order_id<?=$c_data['id']?>" value="<?=$c_data['order_id']?>">
                                                   <input type="checkbox" name="check<?=$c_data['uid']?>" id="check<?=$c_data['uid']?>" value="checked"></td>



												    <td><?php echo $c_data['order_id']?></td>



													<td><?php echo $c_data['order_date']?></td>



													<td><?php echo $c_data['name']?></td>

                                                   <td><input type="text" name="mobile_no<?=$c_data['id']?>" id="mobile_no<?=$c_data['id']?>" value="<?php echo $c_data['phone_no']?>"/></td>

												   <td><input type="text" name="shipping_address<?=$c_data['id']?>" id="shipping_address<?=$c_data['id']?>" value="<?php echo $c_data['shipping_address']?>"/></td>



													<td><input type="text" name="item_id<?=$c_data['id']?>" id="item_id<?=$c_data['id']?>" list="item" value="<?php echo $c_data['item_name']."#".$c_data['product_id']?>"/>
                                                     <datalist id="item">
                                                      <?php foreign_relation('item_info','concat(item_name,"#",item_id)','item_code',$_POST['item_id'],'1');?>
                                                     </datalist>
                                                    
                                                    </td>



													<td><input type="number" name="qty<?=$c_data['id']?>" id="qty<?=$c_data['id']?>" value="<?php echo $c_data['quantity']?>" onBlur="cal(<?=$c_data['id']?>)"/></td>
                                                    
                                                    <td><input type="number" name="rate<?=$c_data['id']?>" id="rate<?=$c_data['id']?>" value="<?php echo $c_data['rate']?>"  onBlur="cal(<?=$c_data['id']?>)"/></td>



													<td><input type="text" name="amount<?=$c_data['id']?>" id="amount<?=$c_data['id']?>" value="<?php echo $c_data['amount'];?>" readonly /></td>
                                                    
                                                    <td>
                                                     <div class="form-button-action">
                                                    <button type="button" id="mybutton<?=$c_data['id']?>" title="Confirm" class="btn btn-info" onClick="order_update(<?=$c_data['id']?>)">
																Edit
															</button><div class="loader2" id="load2<?=$c_data['id']?>" align="center" title="Internet maybe slow" style="margin-left:44%; display:none;"><i style=" font-size:40px; color:green;" class="fa fa-check"></i></div></div></td>
                                                            
                                                            <td><a href="order_logs_view.php?cart_id=<?=$c_data['id']?>&order_id=<?=$c_data['order_id']?>" target="_blank"><i class="fa fa-eye" style="font-size:30px;"></i></a></td>


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
                                                
                                                <tr>
                                                   <th><input type="submit" name="delivery" id="delivery" value="Deliver" class="btn btn-primary"></th>
                                                   <th><input type="submit" name="hold" id="hold" value="Hold" class="btn btn-warning"></th>
                                                </tr>
											</tfoot>

											</table>

											
					
                    </div>



				</div>

</form>

			</div>



 
<script>

 function order_update(id){
			 

		
        
        var id = $('#id'+id).val();



		var shipping_address = $('#shipping_address'+id).val();
		var qty = $('#qty'+id).val();
		var rate = $('#rate'+id).val();
		var item_id = $('#item_id'+id).val();
		var amount = $('#amount'+id).val();
		var order_id = $('#order_id'+id).val();
		var mobile_no = $('#mobile_no'+id).val();
		
		
		
		if(item_id!=""){


			if(qty !=""){
            /*$("#load2"+id).attr("style","display:");

            $("#mybutton"+id).attr("style","display:none");*/


			$.ajax({
				
				url: "order_update_ajax.php",
				type: "POST",

                data: {
					
					id: id,
					order_id : order_id,
					item_id:item_id,
					qty: qty,
					rate: rate,
					shipping_address: shipping_address,
					amount: amount,
					mobile_no : mobile_no


				},



				cache: false,



				success: function(dataResult){



					var dataResult = JSON.parse(dataResult);



					if(dataResult.statusCode==200){


						//$('#success').html('Order Updated!');
						$("#load2"+id).attr("style","display:");

                        $("#mybutton"+id).attr("style","display:none");


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


var rate = (document.getElementById('rate'+id).value)*1;



var qty = (document.getElementById('qty'+id).value)*1;



var total = rate*qty;



document.getElementById('amount'+id).value = total.toFixed(2);



}



	</script>











<?php include('../template/footer.php');?>



