<!-- Sidebar -->

		<div class="sidebar sidebar-style-2">			

			<div class="sidebar-wrapper scrollbar scrollbar-inner">

				<div class="sidebar-content">

					<ul class="nav nav-primary">

						<li class="nav-item active">

							<a href="index.php">

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

							<a data-toggle="collapse" href="#base">

								<i class="fas fa-layer-group"></i>

								<p>Setup</p>

								<span class="caret"></span>

							</a>

							<div class="collapse <?php if($page_name=="users"||$page_name=="customer_setup"||$page_name=="suppliers" || 
							$page_name=="item_info" || $page_name=="banner_image" || $page_name=="categories"){ echo 'show' ;} ?>" id="base">

								<ul class="nav nav-collapse">

									<li class="<?php if($page_name=="users"){ echo 'nav-item active' ;} ?>">

										<a href="../pages/users.php">

											<span class="sub-item">User Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='customer_setup') echo 'nav-item active' ;?>">

										<a href="../pages/customer_setup.php">

											<span class="sub-item">Customer Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='suppliers') echo 'nav-item active' ;?>">

										<a href="../pages/suppliers.php">

											<span class="sub-item">Supplier Setup</span>

										</a>

									</li>

									<li class="<? if($page_name=='banner_image') echo 'nav-item active' ;?>">

										<a href="../pages/banner_image.php">

											<span class="sub-item">Banner Image</span>

										</a>

									</li>

									<li class="<? if($page_name=='categories') echo 'nav-item active' ;?>">

										<a href="../pages/categories.php">

											<span class="sub-item">Category info</span>

										</a>

									</li>

									<li class="<? if($page_name=='item_info') echo 'nav-item active' ;?>">

										<a href="../pages/item_info.php">

											<span class="sub-item">Item info</span>

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

							<div class="collapse" id="sidebarLayouts">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='purchase_entry') echo 'nav-item active' ;?>">

										<a href="purchase_entry.php">

											<span class="sub-item">Create Purchase</span>

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

							<div class="collapse" id="forms">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='sale_entry') echo 'nav-item active' ;?>">

										<a href="sale_entry.php?clear=1">

											<span class="sub-item">Sales Entry</span>

										</a>

									</li>
                                    
                                    <li class="<? if($page_name=='delivery') echo 'nav-item active' ;?>">

										<a href="delivery_process.php">

											<span class="sub-item">Delivery Process</span>

										</a>

									</li>

									<!--<li class="<? //if($page_name=='sale_entry') echo 'nav-item active' ;?>">

										<a href="sales_list.php">

											<span class="sub-item">Sales Edit/Delete</span>

										</a>

									</li>-->

									

									<li class="<? if($page_name=='purchase_entry') echo 'nav-item active' ;?>"> 

										<a href="cash_collection.php">

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

							<a data-toggle="collapse" href="#forms">

								<i class="fas fa-pen-square"></i>

								<p>Loan Menu</p>

								<span class="caret"></span>

							</a>

							<div class="collapse" id="forms">

								<ul class="nav nav-collapse">

									
									<li class="<? if($page_name=='loan_history') echo 'nav-item active' ;?>"> 

										<a href="loan_history.php">

											<span class="sub-item">Loan History</span>

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

							<a data-toggle="collapse" href="#forms">

								<i class="fas fa-pen-square"></i>

								<p>Expense</p>

								<span class="caret"></span>

							</a>

							<div class="collapse" id="forms">

								<ul class="nav nav-collapse">

									<li class="<? if($page_name=='sale_entry') echo 'nav-item active' ;?>">

										<a href="add_expense.php?clear=1">

											<span class="sub-item">Add Expense</span>

										</a>

									</li>

									

									<li class="<? if($page_name=='purchase_entry') echo 'nav-item active' ;?>">

										<a href="expense_report.php">

											<span class="sub-item">Expense Report</span>

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

