<?php 
$page_name="Accounts";  
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
													<th>Accounts Name</th>
													<th><div class="center">Amount</div></th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											   $trSql = "select sum(j.dr_amt-j.cr_amt) as final_amt, i.ledger_name 
											   from journal j, ledger i
											   where  i.ledger_id=j.ledger_id and j.ledger_id in (1000007,1000008,1000267,1000268)  group by j.ledger_id"; 
						  
											  $trsl =$conn->query($trSql);
											  $total = 0;
											  while($tr_data = $trsl->fetch_assoc()){ 
											 ?>

												<tr>
													<td><?=++$sl; ?></td>
													<td><?=$tr_data['ledger_name']; ?></td>
													<td class="right"><strong><?=number_format($amount = $tr_data['final_amt'],2);?></strong></td>
												</tr>
											<?php
											$total+= $amount; } ?>
											<tr>
												<td colspan="2" class="right"><strong>Total</strong></td>
												<td class="right"><strong><?=number_format($total,2);?></strong></td>
											</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>