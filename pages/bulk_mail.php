<?php 

$page_name="Bulk Mail Send";  

include ('../common/library.php');  

include ('../common/helper.php');  

include ('../template/header.php'); 

include ('../template/sidebar.php');



//Text Sms For Manual SMS
if(isset($_POST['send']))
{
$msg ='';
$message  = "".$_POST['sms']."";

echo $subject = "Greetings From RBD";
$toName = "";
$cc = "";
print_r($_POST['selected_inv']);
$count = 0;
 foreach($_POST['selected_inv'] as $key) {
	if($key !=''){ 
	    $count++;
		echo $to = $key;
        
		mailer($to,$toName,$subject,$message,$cc);
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

									      <div class="col-12">

										    <label for=""><strong>Type Message:</strong></label>

										<textarea id="sms" name="sms" required class="form-control"></textarea>
<script>
							CKEDITOR.replace( 'sms' );
						</script>
										  </div>

										  

										   

										 </div> 
                                         
                                         
                                         <div class="row">

										   <div class="col-12">

										     <input type="submit" class="btn btn-info" name="send" value="Send SMS" />

										   </div>

										 </div>

									  

									   </div>

									   

									</div>

								</div>

								<div class="card-body">

									<!-- Modal -->

									



									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >

											<thead>

												<tr>
												<th>Check Box</th>

													<th>SL</th>
													
													<th>Customer Name</th>
													
													<th>E-Mail</th>
													
													<th>Phone Number</th>

									

												</tr>

											</thead>

											

											<tbody>

											<?php
											
											
											
											
											//INSERT INTO `manual_sms` (`id`, `date`, `type`, `receiver_id`, `receiver_number`, `sms`, `entry_by`) VALUES (NULL, '', '', '', '', '', '')
											//INSERT INTO `customer_info` (`id`, `business_name`, `propritor_name`, `mobile_no`, `customer_address`, `credit_limit`, `ledger_id`, `group_for`, `customer_type`, `previous_due`, `previous_advance`, `entry_at`, `entry_by`, `status`, `pic`, `nid`, `form`, `check_file`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')
											  $sql = "select d.*  

											from  customer_info d 

											where email!=''  order by d.customer_name asc ";

											  $select =$conn->query($sql);

											 while($c_data = $select->fetch_assoc()){ ?>

												<tr>
												<td> <input  type="checkbox"  name="selected_inv[]" value="<?=$c_data['email']?>" class="form-control"/></td>

												    <td><?=++$i?></td>
													<td><?=$c_data['customer_name']?></td>
													<td><?=$c_data['email']?></td>
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