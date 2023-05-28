<?php 
$page_name="Stock Report";  
include ('../common/library.php'); 
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');

$msg ='';


 ?>

		
		<div class="main-panel">
			<div class="content">
                     <div class="row">
						<div class="col-md-10" style="margin:5px auto;">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-category"><?php  echo $msg;?></h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Sl</th>
													<th>Product Code</th>
													<th>Product Name</th>
													<th>Color</th>
													<th><div class="center">Stock Qty</div></th>
													<th><div class="center">Rate</div></th>
													<th><div class="center">Amount</div></th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											   $trSql = "select sum(j.item_in-j.item_ex) as final_stock, i.item_name,i.uom, i.item_code,c.color, j.color clr, i.item_id 
											   from journal_item j, item_info i, color_list c 
											   where c.id=j.color ".$con." and i.item_id=j.item_id  group by j.item_id,j.color"; 
						  
											  $trsl =$conn->query($trSql);
											  $total = 0;
											  while($tr_data = $trsl->fetch_assoc()){ 
											  //if($tr_data['final_stock']<=0) continue;
											 
											  $rate = find_a_field2('journal_item','avg(rate) as rate','item_id='.$tr_data['item_id'].' 
											  and color='.$tr_data['clr'].' and tr_from in ("Purchase","Opening") ');
											 ?>

												<tr>
													<td><?=++$sl; ?></td>
													<td><?=$tr_data['item_code']; ?></td>
													<td><?=$tr_data['item_name'];?></td>
													<td><?=$tr_data['color'];?></td>
													<td class="right"><strong><?=$tr_data['final_stock']; $total_stk +=$tr_data['final_stock']; ?></strong></td>
													<td class="right"><strong><?=number_format($rate,2);?></strong></td>
													<td class="right"><strong><?=number_format($amount = $tr_data['final_stock']*$rate,2);?></strong></td>
												</tr>
											<?php
											$total+= $amount; } ?>
											</tbody>
											<tfoot>
											<tr>
												<td>&nbsp</td>
												<td>&nbsp</td>
												<td>&nbsp</td>
												<td class="right"><strong>Total</strong></td>
												<td><?=number_format($total_stk,2)?></td>
												<td>&nbsp</td>
												<td class="right"><strong><?=number_format($total,2);?></strong></td>
											</tr>
											</tfoot>
											
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>