<?php
     $page_name='Dashboard';
	 include ('../common/library.php'); 
     include ('../template/header.php');

      include ('../template/sidebar.php');

	  include ('../common/helper.php');
	  
	  $total_in = find_a_field('journal_item','sum(item_in)','1');
	  $total_ex = find_a_field('journal_item','sum(item_ex)','1');
	  $total_in_value = find_a_field('journal_item','sum(item_in*rate)','1');
	  $total_ex_value = find_a_field('journal_item','sum(item_ex*rate)','1');
	  $current_stock = $total_in-$total_ex;
	  $current_stock_value = $total_in_value-$total_ex_value;
	  
 ?>



		

		<div class="main-panel">

			<div class="content">

				<div class="page-inner">

					<!-- Card -->

					<h4 class="page-title">Dashboard</h4>

					<div class="jumbotron">

					<div class="row mb-3 "><h6 class="card-title">Today reports</h6></div>

					<div class="row">

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-primary card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Current Stock : <?php echo number_format($current_stock,2);?></p>

												<h4 class="card-title">Stock Value : <?php echo number_format($current_stock_value,2);?></h4>
												
											

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-info card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Purchase : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Purchase" and jv_date="'.date('Y-m-d').'" '),2);?></p>

												<h4 class="card-title">Payment : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Payment" and jv_date="'.date('Y-m-d').'" '),2);?></h4>
												

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-success card-round">

								<div class="card-body ">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Expense</p>

												<h4 class="card-title"><?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Expense" and jv_date="'.date('Y-m-d').'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-secondary card-round">

								<div class="card-body ">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Current Cash : </p>

												<h4 class="card-title"><?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id in (1000007,1000008)'),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						

					</div>
                    
                   

					<!-- Card With Icon States Color -->

					<div class="row mb-3"><h6 class="card-title">Current Loan Status (<?php //echo $weekend = date('Y-m-d', strtotime('-7 days')); ?> Till: <?php echo $c_date=date('Y-m-d'); ?> )</h6></div>

					<div class="row">

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body ">

									<div class="row">

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Loan Take : <?php echo number_format(find_a_field('journal j,ledger l','sum(j.cr_amt-j.dr_amt)','j.tr_from in ("Loan","Loan Receive") and j.jv_date <="'.$c_date.'" and j.ledger_id !=1000007  and j.ledger_id=l.ledger_id'),2);?></p>

												<?php /*?><h4 class="card-title">Collection : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Receipt" and jv_date >= "'.$weekend.'" '),2);?></h4><?php */?>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body ">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Give Loan : <?php echo number_format(find_a_field('journal j,ledger l','sum(j.dr_amt-j.cr_amt)','j.tr_from in ("Give Loan","Loan Receive") and j.jv_date <="'.$c_date.'" and j.ledger_id !=1000007 and j.ledger_id=l.ledger_id'),2);?></p>

												<?php /*?><h4 class="card-title">Payment : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Payment" and jv_date >="'.$weekend.'" '),2);?></h4><?php */?>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<?php /*?><div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Expense</p>

												<h4 class="card-title"><?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Expense" and jv_date >="'.$weekend.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div><?php */?>

						<!--<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Cash : <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000007 and jv_date >="'.$weekend.'" '),2);?></p>

												<h4 class="card-title">Bank : <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000008 and jv_date >="'.$weekend.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>-->

					</div>

					<!-- Card With Icon States Background -->

					<div class="row mb-3"><h6 class="card-title">This month(<?php  $current_date=date('Y-m-d', time()); $month = date('m', strtotime($current_date)); echo date('F'); ?> )</h6></div>

					<div class="row">

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body ">

									<div class="row">

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Sales : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Sales" and month(jv_date)="'.$month.'" '),2);?></p>

												<h4 class="card-title">Collection : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Receipt" and month(jv_date)="'.$month.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Purchase : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Purchase" and month(jv_date)="'.$month.'" '),2);?></p>

												<h4 class="card-title">Payment :<?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "payment" and month(jv_date)="'.$month.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Expense</p>

												<h4 class="card-title"><?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Expense" and month(jv_date)="'.$month.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						<!--<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Cash :  <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000007 and month(jv_date) ="'.$month.'" '),2);?></p>

												<h4 class="card-title">Bank :  <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000008 and month(jv_date) ="'.$month.'" '),2);?></h4>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>-->

						
					</div>

				    

					<div class="row mb-3"><h6 class="card-title">This year(<?php  $current_date=date('Y-m-d', time()); $year = date('Y', strtotime($current_date)); echo date('Y'); ?> )</h6></div>

					<div class="row">

						<div class="col-sm-6 col-lg-3">

							<div class="card p-3">

								<div class="row">

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Sales : <?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Sales" and year(jv_date)="'.$year.'" '),2);?></p>

												<h4 class="card-title">Collection : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Receipt" and year(jv_date)="'.$year.'" '),2);?></h4>

	<p class="card-category">Retail Commission : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Receipt" and payment_type like "Commission" and year(jv_date)="'.$year.'" '),2);?></p>
											</div>

										</div>

									</div>

							</div>

						</div>

						<div class="col-sm-6 col-lg-3">

							<div class="card p-3">

								<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Purchase : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Purchase" and year(jv_date)="'.$year.'" '),2);?></p>

												<h4 class="card-title">Payment :<?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Payment" and year(jv_date)="'.$year.'" '),2);?></h4>

<p class="card-category">Supplier Commission : <?php echo number_format(find_a_field('journal','sum(dr_amt)','tr_from like "Payment" and status like "Paid" and `narration` LIKE "%Commission%" and year(jv_date)="'.$year.'" '),2);?></p>
											</div>

										</div>

									</div>

							</div>

						</div>

						<div class="col-sm-6 col-lg-3">

							<div class="card p-3">

								<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Expense</p>

												<h4 class="card-title"><?php echo number_format(find_a_field('journal','sum(cr_amt)','tr_from like "Expense" and year(jv_date)="'.$year.'" '),2);?></h4>

											</div>

										</div>

									</div>

							</div>

						</div>

						<!--<div class="col-sm-6 col-lg-3">

							<div class="card p-3">

								<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												<p class="card-category">Cash : <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000007 and year(jv_date) ="'.$year.'" '),2);?></p>

												<h4 class="card-title">Bank : <?php echo number_format(find_a_field('journal','sum(dr_amt-cr_amt)','ledger_id=1000008 and year(jv_date) ="'.$year.'" '),2);?></h4>

											</div>

										</div>

									</div>

							</div>

						</div>-->

					</div>
                  </div>



				</div>

			</div>





			</div>





<?php include('../template/footer.php');?>