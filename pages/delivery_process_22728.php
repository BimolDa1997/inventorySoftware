<?php 

$page_name ='delivery';  
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
	echo $sql = "select s.*,d.id as uid,d.item_id as item,d.qty,d.rate,d.amount,c.business_name,c.customer_type,c.customer_address, i.item_name , d.qty from sales_master s, customer_info c, item_info i ,sales_order d 
	where i.item_id=d.item_id and c.id=s.dealer_code and s.s_no = d.s_no and s.status='CHECKED' and d.status='MANUAL' order by s.s_no desc";
	$select =$conn->query($sql);
	while($data = $select->fetch_assoc()){
	  
	  $checked = $_POST['check'.$data['uid']];
	  if($checked=='checked'){
		  $insert = $conn->query('insert into delivery_info(`delivery_no`,`s_no`,`delivery_date`,`agency`,`item_id`,`sales_qty`,`unit_price`,`amount`,`entry_by`,`entry_at`)
		  value("'.$delivery_no.'","'.$data['s_no'].'","'.$delivery_date.'","'.$agency.'","'.$data['item'].'","'.$data['qty'].'","'.$data['rate'].'","'.$data['amount'].'","'.$_SESSION['user_id'].'","'.date('Y-m-d H:i:s').'")');
		  $update = $conn->query('update sales_order set status="DELIVERED" where s_no='.$data['s_no'].' and item_id='.$data['item'].'');
		  }
		  if($update){
			  
			  $msg = '<span style="color:green; font-weight:bold;">Selected Item Delivered</span>';
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
                                                 <label  class="col-sm-2 col-form-label"><?=$msg?>Select Agency</label>
                                                    <div class="col-sm-6">
                                                     <select name="agency"  class="form-control form-control" id="agency">
                                                       <option></option>
                                                       <option value="1">Sundorban</option>
                                                        <option value="2">S.A Paribahan</option>
                                                        </select>
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



	<?php if($_SESSION['sale_no']==''){?>



	<table id="add-row" class="display table table-striped table-hover" >



											<thead>



												<tr>

												<th>SL No</th>
                                                
                                                 <th>Check</th>



													<th>Sales No</th>



													<th>Sales Date</th>



													<th><?php echo $_SESSION['user_id']; echo 'bimol';?>Party Name</th>



														<th>Party Address</th>



													<th>Item name</th>



													<th>Qty</th>



													<th>Sales Amount</th>



								                    <th style="width: 10%">Action</th>



												</tr>



											</thead>



											



											<tbody>



											<?php



											$sql = "select s.*,d.id as uid,d.item_id as item,d.qty,d.rate,d.amount,c.business_name,c.customer_type,c.customer_address, i.item_name , d.qty from sales_master s,customer_info c, item_info i ,sales_order d where i.item_id=d.item_id and c.id=s.dealer_code and s.s_no = d.s_no and s.status='CHECKED' and d.status='MANUAL' order by s.s_no desc";



											     $select =$conn->query($sql); $i=1;



											 while($c_data = $select->fetch_assoc()){

											 ?>







												<tr>

												 <td><?php echo $i++;?></td>
                                                 
                                                   <td><input type="checkbox" name="check<?=$c_data['uid']?>" id="check<?=$c_data['uid']?>" value="checked"></td>



												    <td><?php echo $c_data['s_no']?></td>



													<td><?php echo $c_data['sales_date']?></td>



													<td><?php echo $c_data['business_name']?></td>



														<td><?php echo $c_data['customer_address']?></td>



													<td><?php echo $c_data['item_name']?></td>



													<td><?php echo $c_data['qty']?></td>



													<td><?php echo find_a_field('sales_order','sum(amount)','s_no='.$c_data['s_no']);?></td>



													



													<td><!--<a href="?s_no=<?php echo $c_data['s_no']?>"><input type="submit" name="update" id="addRowButton" value="Update" class="btn btn-primary" /></a>--></td>

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
                                                   <th><input type="submit" name="delivery" id="delivery" class="btn btn-primary"></th>
                                                </tr>
											</tfoot>

											</table>

											<?php } ?>
					
                    </div>



				</div>

</form>

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



		var co_party = $('#co_party_'+id).val();



		



		



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



					co_party : co_party



									



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



