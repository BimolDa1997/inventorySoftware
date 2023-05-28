<?php 

$page_name="purchase_list";  

include ('../common/library.php');  

include ('../common/helper.php');  

include ('../template/header.php'); 

include ('../template/sidebar.php');

$page_name='purchase_list';





 ?>



		

		<div class="main-panel">

			<div class="content">

				



                     <div class="row">

						<div class="col-md-12">

							<div class="card">

								<div class="card-header">

									<div class="d-flex align-items-center">

										<h4 class="card-title"><?=$msg?></h4>

										

									</div>

									<div class="row">

									   <div class="col-12 center">

									   <form action="" method="post">

									     <div class="row">

									      <div class="col-4">

										     <input type="date" class="form-control" name="fdate" value="<? if(isset($_POST['fdate'])){ echo $_POST['fdate']; }else{ echo date('Y-m-01'); } ?>"  />

										  </div>

										  <div class="col-4">

										     <input type="date" class="form-control" name="tdate" value="<? if(isset($_POST['tdate'])){ echo $_POST['tdate']; }else{ echo date('Y-m-d'); } ?>"  />

										  </div>

										   <div class="col-2">

										     <button class="btn btn-info" name="show">Show</button>

										   </div>

										 </div> 

									   </form> 

									   </div>

									   

									</div>

								</div>

								<div class="card-body">

									<!-- Modal -->

									



									<div class="table-responsive">

						<?php if(isset($_POST['show'])) { ?>			

										<table id="add-row" class="display table table-striped table-hover" >

											<thead>

												<tr>

													<th>SL</th>
													<th>PO NO</th>
													<th>Supplier name</th>
													<th>Product name</th>
													<th>Date</th>
													<th>Qty</th>
													<th>Rate</th>
													<th>Amount</th>
													<th style="width: 10%">Action</th>
												</tr>

											</thead>

											

											<tbody>

											<?php

											  $sql = "select m.*, sum(d.amount) as amount, sum(d.qty) as qty, i.item_name,i.item_code, d.rate  

											from purchase_master m, purchase_order d , item_info i

											where m.purchase_no = d.purchase_no  and m.group_for=".$_SESSION['group_for']."  and m.purchase_date between '".$_POST['fdate']."' 

											and '".$_POST['tdate']."' and i.item_id=d.item_id group by m.purchase_no,d.item_id order by m.purchase_no desc ";

											  $select =$conn->query($sql);

											 while($c_data = $select->fetch_assoc()){ ?>



												<tr>

												    <td><?=++$i?></td>
													<td><?=$c_data['purchase_no']?></td>

													<td><?=$c_data['supplier_name']?></td>

													<td><?=$c_data['item_code']?> - <?=$c_data['item_name']?></td>

													<td><?=$c_data['purchase_date']?></td>

													<td><?=$c_data['qty']?></td>
													<td><?=$c_data['rate']?></td>

													<td><?=$c_data['amount']?></td>

													<td>

														<div class="form-button-action">

														<a href="purchase_entry.php?purchase_no=<?php echo $c_data['purchase_no']?>" target="blank"><button type="button"   class="btn btn-link btn-primary btn-lg" data-original-title="Edit Purchase">

																<i class="fa fa-edit"></i>

															</button></a>

															

												

														</div>

													</td>

												</tr>

												<?php } ?>

												

											</tbody>

										</table>

									<?php  } ?>	

										

									</div>

								</div>

							</div>

						</div>

					</div>





			</div>





<?php include('../template/footer.php');?>