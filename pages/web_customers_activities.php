<?php 
$page_name="Web Customers";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';

$user_id = $_GET['user_id'];
?>

		<div class="main-panel">
			<div class="content">
                     <div class="row">
						<div class="col-md-12">

							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?php  echo $msg;?></h4>
										 <h1 > [Customer Name:<?=find_a_field('web_users','name','user_id='.$user_id);?>]</h1>
									</div>
									<h2>Ordered Products</h2> <br>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Order No</th>
													<th>Order Date</th>
													<th>Product Name</th>
													<th>Color</th>
													<th>Rate</th>
													<th>Qty</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
											  $Osql = "select sum(c.quantity) as quantity, c.product_id, c.color, c.rate, sum(c.amount) as amount ,o.* from carts c, orders o where c.order_id=o.order_id and c.user_id=".$user_id." group by c.product_id";
											  $select =$conn->query($Osql);								  
											  $i=1;
											  while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$i++;?></td>
													<td><?=$c_data['order_id']?></td>
													<td><?=$c_data['order_date']?></td>
													<td><?=$qty = find_a_field('item_info','concat(item_name,"-",item_code)','item_id='.$c_data['product_id'].' ');?></td>
													<td><?=$qty = find_a_field('color_list','color','id='.$c_data['color'].' ');?></td>
													<td><?=number_format($c_data['rate'],2);?></td>
													<td><?=$c_data['quantity']?></td>
													<td><?=number_format($c_data['amount'],2);?></td>
												</tr>
												<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>


							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?php  echo $msg;?></h4>
									</div>
									<h2>Carts Products</h2> <br>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Product Name</th>
													<th>Color</th>
													<th>Rate</th>
													<th>Qty</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
											<?php
											  $Osql = "select sum(c.quantity) as quantity, c.product_id, c.color, c.rate, sum(c.amount) as amount from carts c where   c.user_id=".$user_id." and c.order_id is null group by c.product_id";
											  $select =$conn->query($Osql);								  
											  $i=1;
											  while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$i++;?></td>
													<td><?=$qty = find_a_field('item_info','concat(item_name,"-",item_code)','item_id='.$c_data['product_id'].' ');?></td>
													<td><?=$qty = find_a_field('color_list','color','id='.$c_data['color'].' ');?></td>
													<td><?=number_format($c_data['rate'],2);?></td>
													<td><?=$c_data['quantity']?></td>
													<td><?=number_format($c_data['amount'],2);?></td>
												</tr>
												<?php } ?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>


							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?php  echo $msg;?></h4>
									</div>
									<h2>Last Visited Products</h2> <br>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Product Name</th>
													<th>Rate</th>
													<th>Qty</th>
													<th>Visited Date</th>
												</tr>
											</thead>
											<tbody>
											<?php
											  $Osql = "select  i.price, i.item_name,i.item_code,v.count, v.visited_date  from web_visitors v, item_info i where i.item_id=v.item_id and  v.user_id=".$user_id."  ";
											  $select =$conn->query($Osql);								  
											  $i=1;
											  while($c_data = $select->fetch_assoc()){
											  
											 ?>

												<tr>
												    <td><?=$i++;?></td>
													<td><?=$c_data['item_name']?> - <?=$c_data['item_code']?></td>
													<td><?=number_format($c_data['price'],2);?></td>
													<td><?=$c_data['count']?></td>
													<td><?=$c_data['visited_date'];?></td>
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