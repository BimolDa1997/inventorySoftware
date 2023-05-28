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

										     <input type="date" class="form-control" name="fdate" value="<? if($_POST['fdate'] !='') echo $_POST['fdate']; else echo date('Y-m-01');?>"  />

										  </div>

										  <div class="col-4">

										     <input type="date" class="form-control" name="tdate" value="<? if($_POST['fdate'] !='') echo $_POST['fdate']; else echo date('Y-m-d');?>"  />

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

													<th>Item name</th>

													<th>Date</th>

													<th>Damage Qty</th>

													<th>Amount</th>

												</tr>

											</thead>

											

											<tbody>

											<?php

											 echo $sql = "select  sum(d.item_in-d.item_ex) as qty, d.rate, i.item_name ,d.journal_date 

											from damage_item d , item_info i

											where   d.journal_date between '".$_POST['fdate']."' 

											and '".$_POST['tdate']."' and i.item_id=d.item_id group by d.item_id order by d.journal_date desc ";

											  $select =$conn->query($sql);

											 while($c_data = $select->fetch_assoc()){
											 if(c_data['qty']>0){ ?>
												<tr>

												    <td><?=++$i?></td>

													<td><?=$c_data['item_name']?></td>

													<td><?=$c_data['journal_date']?></td>

													<td><?=$c_data['qty']?></td>

													<td><?=($c_data['qty']*c_data['rate']);?></td>


												</tr>

												<?php } } ?>

												

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