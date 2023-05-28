<?php 
$page_name="Web Customers";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';


?>

		<div class="main-panel">
			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?php  echo $msg;?></h4>
										
									</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Customer Name</th>
													<th>Mobile</th>
													<th>Email</th>
													<th>Address</th>
													<th>Purchase Qty</th>
													<th>Purchased Amount</th>
													<th>Average Purchased Amount</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											  $select =$conn->query("select * from web_users where 1 ");
											  $i=1;
											 while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$i++;?></td>
													<td><?=$c_data['name']?></td>
													<td><?=$c_data['mobile']?></td>
													<td><?=$c_data['email']?></td>
													<td><?=$c_data['address']?></td>
													<td><?=$qty = find_a_field('carts','sum(quantity)','user_id='.$c_data['user_id'].' and order_id !="" ');?></td>
													
													
													<td><?=number_format($amt = find_a_field('carts','sum(amount)','user_id='.$c_data['user_id'].' and order_id !="" '),2);?></td>
													<td><?=number_format($amt/$qty,2);?></td>
													<td>
														<div class="form-button-action">
															<a href="web_customers_activities.php?user_id=<?=$c_data['user_id']?>">
																<button type="button" class="btn btn-info btn-primary btn-lg" >
																	view Activities
																</button>
															</a>
														</div>
													</td>
												</tr>
												<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>