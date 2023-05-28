<!-- Sidebar -->

		<div class="sidebar sidebar-style-2">			

			<div class="sidebar-wrapper scrollbar scrollbar-inner">

				<div class="sidebar-content">

					<ul class="nav nav-primary">

						<li class="nav-item active">

							<a href="../../pages/index.php">

								<i class="fas fa-home"></i>

								<span class="sub-item">Dashboard</span>

							</a>

							

						</li>



						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">MIS</h4>

						</li>

						

						<li class="nav-item">

							<a data-toggle="collapse" href="#mis">

								<i class="fas fa-layer-group"></i>

								<p>MIS Setup</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="company_setup"||$page_name=="inventory_setup"){ echo 'show' ;} ?>" id="mis">

								<ul class="nav nav-collapse">

									<li class="<?php if($page_name=="company_setup"){ echo 'nav-item active' ;} ?>">

										<a href="../../mis/company_setup.php">

											<span class="sub-item">Company Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='inventory_setup') echo 'nav-item active' ;?>">

										<a href="../../mis/inventory_setup.php">

											<span class="sub-item">Inventory Setup</span>

										</a>

									</li>

								</ul>

							</div>

						</li>



						<li class="nav-item">

							<a data-toggle="collapse" href="#base">

								<i class="fas fa-layer-group"></i>

								<p>Setup</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="users"||$page_name=="customer_setup"||$page_name=="suppliers"||$page_name=="item_info" ){ echo 'show' ;} ?>" id="base">

								<ul class="nav nav-collapse">

									<li class="<?php if($page_name=="users"){ echo 'nav-item active' ;} ?>">

										<a href="../../pages/users.php">

											<span class="sub-item">User Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='customer_setup') echo 'nav-item active' ;?>">

										<a href="../../pages/customer_setup.php">

											<span class="sub-item">Customer Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='suppliers') echo 'nav-item active' ;?>">

										<a href="../../pages/suppliers.php">

											<span class="sub-item">Supplier Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='item_info') echo 'nav-item active' ;?>">

										<a href="../../pages/item_info.php">

											<span class="sub-item">Item info</span>

										</a>

									</li>

									

								</ul>

							</div>

						</li>
						
						
						<!--Greetings SMS-->
						
						<li class="nav-item">

							<a data-toggle="collapse" href="#sms">

								<i class="fas fa-layer-group"></i>

								<p>Greetings SMS</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="manual_sms" ){ echo 'show' ;} ?>" id="sms">

								<ul class="nav nav-collapse">

									<li class="<?php if($page_name=="manual_sms"){ echo 'nav-item active' ;} ?>">

										<a href="../../pages/manual_sms.php">

											<span class="sub-item">Manual SMS</span>

										</a>

									</li>

									

									

									

								</ul>

							</div>

						</li>



						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">Purchase</h4>

						</li>







						<li class="nav-item">

							<a data-toggle="collapse" href="#sidebarLayouts">

								<i class="fas fa-th-list"></i>

								<p>Purchase Menu</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="purchase_entry"||$page_name=="cash_payment"||$page_name=="purchase_list" ){ echo 'show' ;} ?>" id="sidebarLayouts">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='purchase_entry') echo 'nav-item active' ;?>">

										<a href="../../purchase/purchase_entry.php">

											<span class="sub-item">Create Purchase</span>

										</a>

									</li>

									<li class="<? if($page_name=='purchase_list') echo 'nav-item active' ;?>">

										<a href="../../purchase/purchase_list.php">

											<span class="sub-item">Purchase List</span>

										</a>

									</li>

									<li class="<? if($page_name=='cash_payment') echo 'nav-item active' ;?>">

										<a href="../../purchase/cash_payment_entry.php">

											<span class="sub-item">Payment Entry</span>

										</a>

									</li>

									

								</ul>

							</div>

						</li>



						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">Sales</h4>

						</li>







						<li class="nav-item">

							<a data-toggle="collapse" href="#forms">

								<i class="fas fa-pen-square"></i>

								<p>Sales Menu</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="sales_entry"||$page_name=="cash_collection" ){ echo 'show' ;} ?>" id="forms">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='sales_entry') echo 'nav-item active' ;?>">

										<a href="../../pages/sale_entry.php?clear=1">

											<span class="sub-item">Sales Entry</span>

										</a>

									</li>

									

									

									<li class="<? if($page_name=='cash_collection') echo 'nav-item active' ;?>">

										<a href="../../pages/cash_collection.php">

											<span class="sub-item">Cash Collection</span>

										</a>

									</li>

								</ul>

							</div>

						</li>

						

						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>
							
							
							
							
							<!--Loan receive and paid history-->
							
							<h4 class="text-section">Loan</h4>

						</li>







						<li class="nav-item">

							<a data-toggle="collapse" href="#loan">

								<i class="fas fa-pen-square"></i>

								<p>Loan Menu</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="loan_take" ||$page_name=="loan_give"){ echo 'show' ;} ?>"  id="loan">

								<ul class="nav nav-collapse">

									
									<li class="<? if($page_name=='loan_take') echo 'nav-item active' ;?>"> 

										<a href="../../pages/loan_take.php">

											<span class="sub-item">Loan Take</span>

										</a>

									</li>
									
									<li class="<? if($page_name=='loan_give') echo 'nav-item active' ;?>"> 

										<a href="../../pages/loan_give.php">

											<span class="sub-item">Loan Give</span>

										</a>

									</li>

								</ul>

							</div>

						</li>

						

						

						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">Expenses</h4>

						</li>

						

						<li class="nav-item">

							<a data-toggle="collapse" href="#formss">

								<i class="fas fa-pen-square"></i>

								<p>Expense</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="add_expense"||$page_name=="expense_report" ){ echo 'show' ;} ?>" id="formss">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='add_expense') echo 'nav-item active' ;?>">

										<a href="../../pages/add_expense.php?clear=1">

											<span class="sub-item">Add Expense</span>

										</a>

									</li>

									

									<li class="<? if($page_name=='expense_report') echo 'nav-item active' ;?>">

										<a href="../../pages/expense_report.php">

											<span class="sub-item">Expense Report</span>

										</a>

									</li>

								</ul>

							</div>

						</li>

					
                        
                        
                        <li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">HRM</h4>

						</li>
	                    <li class="nav-item">

							<a data-toggle="collapse" href="#hrm">

								<i class="fas fa-pen-square"></i>

								<p>HRM</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="basic_info"||$page_name=="salary_info"||$page_name=="payroll"||$page_name=="hrmreport" ){ echo 'show' ;} ?>" id="hrm">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='basic_info') echo 'nav-item active' ;?>">

										<a href="../../pages/hrm/basic_info.php?clear=1">

											<span class="sub-item">Add Employee</span>

										</a>

									</li>

									

									<li class="<? if($page_name=='salary_info') echo 'nav-item active' ;?>">

										<a href="../../pages/hrm/salary_info.php">

											<span class="sub-item">Salary Information</span>

										</a>

									</li>
                                    
                                    <li class="<? if($page_name=='payroll') echo 'nav-item active' ;?>">

										<a href="../../pages/hrm/payroll.php">

											<span class="sub-item">Payroll Generate</span>

										</a>

									</li>
                                    
                                    
                                    <li class="<? if($page_name=='hrmreport') echo 'nav-item active' ;?>">

										<a href="../../pages/hrm/hrm_report.php">

											<span class="sub-item">HRM Reports</span>

										</a>

									</li>

								</ul>

							</div>

						</li>					
    
						

						<li class="nav-section">

							<span class="sidebar-mini-icon">

								<i class="fa fa-ellipsis-h"></i>

							</span>

							<h4 class="text-section">Report</h4>

						</li>

						

						<li class="nav-item">

							<a data-toggle="collapse" href="#report">

								<i class="fas fa-pen-square"></i>

								<p>Advance Report</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="report"){ echo 'show' ;} ?>" id="report">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='report') echo 'nav-item active' ;?>">

										<a href="../../pages/report.php">

											<span class="sub-item">Reports</span>

										</a>

									</li>

									

								</ul>

							</div>

						</li>

					

						

					</ul>

				</div>

			</div>

		</div>

		<!-- End Sidebar -->

