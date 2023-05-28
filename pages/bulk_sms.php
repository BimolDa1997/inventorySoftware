<?php 

$page_name="Bulk Sms Send";  

include ('../common/library.php');  

include ('../common/helper.php');  

include ('../template/header.php'); 

include ('../template/sidebar.php');

$page_name='manual_list';





//Text Sms For Manual SMS
if(isset($_POST['send']))
{
$msg ='';
function sms($dest_addr,$sms_text){

//$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";

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

$count = 0;
 foreach($_POST['selected_inv'] as $key) {
	if($key !=''){ $count++;
		$recipients ="88".$key."";
		
		$massage  = "".$_POST['sms']."";
		//$sms_result=sms($recipients, $massage);
	  }	
  }

  $msg = 'Successfuly sent message to '.$count.' people.';
}

 ?>



		

		<div class="main-panel">

			<div class="content">

				



                     <div class="row">

						<div class="col-md-12">

							<div class="card">

								<div class="card-header">

									<div class="d-flex align-items-center">

										<h4 class="card-title" style="color:green"><?=$msg?></h4>

						<form action="" method="post">				

									</div>

									<div class="row">

									   <div class="col-12 center">

									   

									     <div class="row">

									      <div class="col-4">

										    <label for="">Type SMS:</label>

										<textarea id="sms" name="sms" rows="10" required cols="50" class="form-control"></textarea>

										  </div>

										  <div class="col-4">
										   <label for="">Sent To:</label>

										     <select name="type" id="type" class="form-control" required >
											 
											 <option value="Customer">Customer</option>
											
											 
											 
											 </select>

										  </div>

										   <div class="col-2">

										     <input type="submit" class="btn btn-info" name="send" value="Send SMS" />

										   </div>

										 </div> 

									  

									   </div>

									   

									</div>

								</div>

								<div class="card-body">

									<!-- Modal -->

									



									<div class="table-responsive">

								

										<table id="add-row123" class="display table table-striped table-hover" >

											<thead>

												<tr>
												<th>Check Box</th>

													<th>SL</th>
													
													<th>Customer Name</th>
													
													<th>Address</th>
													
													<th>Customer Type</th>

													<th>Phone Number</th>

									

												</tr>

											</thead>

											

											<tbody>

											<?php
											
											
											
											
											//INSERT INTO `manual_sms` (`id`, `date`, `type`, `receiver_id`, `receiver_number`, `sms`, `entry_by`) VALUES (NULL, '', '', '', '', '', '')
											//INSERT INTO `customer_info` (`id`, `business_name`, `propritor_name`, `mobile_no`, `customer_address`, `credit_limit`, `ledger_id`, `group_for`, `customer_type`, `previous_due`, `previous_advance`, `entry_at`, `entry_by`, `status`, `pic`, `nid`, `form`, `check_file`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')
											  $sql = "select d.*  

											from  customer_info d 

											where 1  order by d.business_name asc ";

											  $select =$conn->query($sql);

											 while($c_data = $select->fetch_assoc()){ ?>



												<tr>
												<td> <input  type="checkbox"  name="selected_inv[]" value="<?=$c_data['mobile_no']?>"/></td>

												    <td><?=++$i?></td>

													<td><?=$c_data['business_name']?></td>

													<td><?=$c_data['customer_address']?></td>

													<td><?=$c_data['customer_type']?></td>

													<td><?=$c_data['mobile_no']?></td>

													

												</tr>

												<?php } ?>
												
												

											</tbody>

										</table>


									</div>
                                    
								</div>

							</div>

						</div>

					</div>

 </form> 



			</div>





<?php include('../template/footer.php');?>