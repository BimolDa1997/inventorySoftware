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
	  $today = date('Y-m-d');
	  $last7days = date('Y-m-d',strtotime('-7 days'));
	  $lastMonth = date('Y-m-d',strtotime('-30 days'));
	  $todayVisitor = find_a_field('web_visitors','count(id)','visited_date="'.$today.'"');
	  $lastWeekVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$last7days.'" and "'.$today.'"');
	  $lastMonthVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$lastMonth.'" and "'.$today.'"');
	  $overallVisitor = find_a_field('web_visitors','count(id)','1');
	  
	  $janS = date('Y-01-01');
	  $janE = date('Y-01-31'); 
	  $janVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$janS.'" and "'.$janE.'"');
	  
	  $febS = date('Y-02-01');
	  $febE = date('Y-02-28'); 
	  $febVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$febS.'" and "'.$febE.'"');
	  
	  $marS = date('Y-03-01');
	  $marE = date('Y-03-31'); 
	  $marVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$marS.'" and "'.$marE.'"');
	  
	  $aprS = date('Y-04-01');
	  $aprE = date('Y-04-30'); 
	  $aprVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$aprS.'" and "'.$aprE.'"');
	  
	  $mayS = date('Y-05-01');
	  $mayE = date('Y-05-31'); 
	  $mayVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$mayS.'" and "'.$mayE.'"');
	  
	  $junS = date('Y-06-01');
	  $junE = date('Y-06-30'); 
	  $junVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$junS.'" and "'.$junE.'"');
	  
	  $julS = date('Y-07-01');
	  $julE = date('Y-07-31'); 
	  $julVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$julS.'" and "'.$julE.'"');
	  
	  $augS = date('Y-08-01');
	  $augE = date('Y-08-31'); 
	  $augVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$augS.'" and "'.$augE.'"');
	  
	  $sepS = date('Y-09-01');
	  $sepE = date('Y-09-30'); 
	  $sepVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$sepS.'" and "'.$sepE.'"');
	  
	  $octS = date('Y-10-01');
	  $octE = date('Y-10-31'); 
	  $octVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$octS.'" and "'.$octE.'"');
	  
	  $novS = date('Y-11-01');
	  $novE = date('Y-11-30'); 
	  $novVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$novS.'" and "'.$novE.'"');
	  
	  $decS = date('Y-12-01');
	  $decE = date('Y-12-31'); 
	  $decVisitor = find_a_field('web_visitors','count(id)','visited_date between "'.$decS.'" and "'.$decE.'"');
	  
	  
	  
 ?>
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">VISITOR INFORMATION</h4>
					<div class="row">

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-primary card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												

												<h4 class="card-title">TODAY VISIT :</h4> <h1><?=$todayVisitor?></h1>
												
											

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

												
												<h4 class="card-title">LAST 7 DAY VISITOR :</h4> <h1><?=$lastWeekVisitor?></h1>
												

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

												

                                             <h4 class="card-title">LAST MONTH VISITOR :</h4> <h1><?=$lastMonthVisitor?></h1>
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

												<h4 class="card-title">OVERALL VISITOR :</h4> <h1><?=$overallVisitor?></h1>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">THIS YEAR VISITOR GRAPH</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="lineChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">THIS YEAR VISITOR COMPARISON</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="barChart"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">LOCATION WISE ORDER CHART</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">LOCATION WISE SALES CHART</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<!--<div class="card">
								<div class="card-header">
									<div class="card-title">Radar Chart</div>

								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="radarChart"></canvas>
									</div>
								</div>
							</div>-->
						</div>
						<!--<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Bubble Chart</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="bubbleChart"></canvas>
									</div>
								</div>
							</div>
						</div>-->
						<!--<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Multiple Line Chart</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="multipleLineChart"></canvas>
									</div>
								</div>
							</div>
						</div>-->
						<!--<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Multiple Bar Chart</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="multipleBarChart"></canvas>
									</div>
								</div>
							</div>
						</div>-->
						<!--<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Chart with HTML Legends</div>
								</div>
								<div class="card-body">
									<div class="card-sub">
										Sometimes you need a very complex legend. In these cases, it makes sense to generate an HTML legend. Charts provide a generateLegend() method on their prototype that returns an HTML string for the legend.
									</div>
									<div class="chart-container">
										<canvas id="htmlLegendsChart"></canvas>
									</div>
									<div id="myChartLegend"></div>
								</div>
							</div>
						</div>-->
					</div>
				</div>
                
                
                <?
				 
                 $decS = date('Y-12-01');
	             $decE = date('Y-12-31'); 
	             $todaySales = find_a_field('delivery_info','sum(amount)','delivery_date="'.$today.'" and status="CONFIRMED"');
				 $sevenDaysSales = find_a_field('delivery_info','sum(amount)','delivery_date between "'.$last7days.'" and "'.$today.'" and status="CONFIRMED"');
				 $lastMonthSales = find_a_field('delivery_info','sum(amount)','delivery_date between "'.$lastMonth.'" and "'.$today.'" and status="CONFIRMED"');
				 $overallSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED"');
				 
				 $janS = date('Y-01-01');
	  $janE = date('Y-01-31'); 
	  $janSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$janS.'" and "'.$janE.'"');
	  
	  $febS = date('Y-02-01');
	  $febE = date('Y-02-28'); 
	  $febSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$febS.'" and "'.$febE.'"');
	  
	  $marS = date('Y-03-01');
	  $marE = date('Y-03-31'); 
	  $marSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$marS.'" and "'.$marE.'"');
	  
	  $aprS = date('Y-04-01');
	  $aprE = date('Y-04-30'); 
	  $aprSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$aprS.'" and "'.$aprE.'"');
	  
	  $mayS = date('Y-05-01');
	  $mayE = date('Y-05-31'); 
	  $maySales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$mayS.'" and "'.$mayE.'"');
	  
	  $junS = date('Y-06-01');
	  $junE = date('Y-06-30'); 
	  $junSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$junS.'" and "'.$junE.'"');
	  
	  $julS = date('Y-07-01');
	  $julE = date('Y-07-31'); 
	  $julSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$julS.'" and "'.$julE.'"');
	  
	  $augS = date('Y-08-01');
	  $augE = date('Y-08-31'); 
	  $augSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$augS.'" and "'.$augE.'"');
	  
	  $sepS = date('Y-09-01');
	  $sepE = date('Y-09-30'); 
	  $sepSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$sepS.'" and "'.$sepE.'"');
	  
	  $octS = date('Y-10-01');
	  $octE = date('Y-10-31'); 
	  $octSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$octS.'" and "'.$octE.'"');
	  
	  $novS = date('Y-11-01');
	  $novE = date('Y-11-30'); 
	  $novSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$novS.'" and "'.$novE.'"');
	  
	  $decS = date('Y-12-01');
	  $decE = date('Y-12-31'); 
	  $decSales = find_a_field('delivery_info','sum(amount)','status="CONFIRMED" and delivery_date between "'.$decS.'" and "'.$decE.'"');
				?>
                
                <div class="page-inner">
					<h4 class="page-title">SALES INFORMATION</h4>
					<div class="row">

						<div class="col-sm-6 col-md-3">

							<div class="card card-stats card-primary card-round">

								<div class="card-body">

									<div class="row">

										

										<div class="col-12 col-stats">

											<div class="numbers">

												

												<h4 class="card-title">TODAY :</h4> <h1><?=number_format($todaySales,2)?></h1>
												
											

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

												
												<h4 class="card-title">LAST 7 DAY :</h4> <h1><?=number_format($sevenDaysSales,2)?></h1>
												

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

												

                                             <h4 class="card-title">LAST MONTH :</h4> <h1><?=number_format($lastMonthSales,2)?></h1>
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

												<h4 class="card-title">OVERALL :</h4> <h1><?=number_format($overallSales,2)?></h1>

											</div>

										</div>

									</div>

								</div>

							</div>

						</div>

						

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">LAST MONTH SALES GRAPH</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="salesGraph"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">LAST YEAR SALES COMPARISON</div>
								</div>
								<div class="card-body">
									<div class="chart-container">
										<canvas id="salesBar"></canvas>
									</div>
								</div>
							</div>
						</div>
						
						
						
					</div>
				</div>
                
                
                
                
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Chart JS -->
	<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script>
		lineChart = document.getElementById('lineChart').getContext('2d'),
		salesGraph = document.getElementById('salesGraph').getContext('2d'),
		salesBar = document.getElementById('salesBar').getContext('2d'),
		barChart = document.getElementById('barChart').getContext('2d'),
		pieChart = document.getElementById('pieChart').getContext('2d'),
		doughnutChart = document.getElementById('doughnutChart').getContext('2d');
		//radarChart = document.getElementById('radarChart').getContext('2d'),
		//bubbleChart = document.getElementById('bubbleChart').getContext('2d'),
		//multipleLineChart = document.getElementById('multipleLineChart').getContext('2d'),
		//multipleBarChart = document.getElementById('multipleBarChart').getContext('2d'),
		//htmlLegendsChart = document.getElementById('htmlLegendsChart').getContext('2d');

		var myLineChart = new Chart(lineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Active Users",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [<?=$janVisitor?>, <?=$febVisitor?>, <?=$marVisitor?>, <?=$aprVisitor?>, <?=$mayVisitor?>, <?=$junVisitor?>, <?=$julVisitor?>, <?=$augVisitor?>, <?=$sepVisitor?>, <?=$octVisitor?>, <?=$novVisitor?>, <?=$decVisitor?>]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'bottom',
					labels : {
						padding: 10,
						fontColor: '#1d7af3',
					}
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});
		
		var myLineChart2 = new Chart(salesGraph, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Sales Comparison",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [<?=$janSales?>, <?=$febSales?>, <?=$marSales?>, <?=$aprSales?>, <?=$maySales?>, <?=$junSales?>, <?=$julSales?>, <?=$augSales?>, <?=$sepSales?>, <?=$octSales?>, <?=$novSales?>, <?=$decSales?>]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'bottom',
					labels : {
						padding: 10,
						fontColor: '#1d7af3',
					}
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});
		
		

		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "Visitor",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: [<?=$janVisitor?>, <?=$febVisitor?>, <?=$marVisitor?>, <?=$aprVisitor?>, <?=$mayVisitor?>, <?=$junVisitor?>, <?=$julVisitor?>, <?=$augVisitor?>, <?=$sepVisitor?>, <?=$octVisitor?>, <?=$novVisitor?>, <?=$decVisitor?>],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});
		
		var myBarChart2 = new Chart(salesBar, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "Sales Comparison",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: [<?=$janSales?>, <?=$febSales?>, <?=$marSales?>, <?=$aprSales?>, <?=$maySales?>, <?=$junSales?>, <?=$julSales?>, <?=$augSales?>, <?=$sepSales?>, <?=$octSales?>, <?=$novSales?>, <?=$decSales?>],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});

		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					data: [
					
					<?php
					$i=0;
					 $sql = $conn->query('select sum(amount) as amt from carts c, orders o where c.order_id=o.order_id group by o.delivery_location');
					 while($data=$sql->fetch_assoc()){
						 if($i>0){
							 echo ',';
							 }
						 echo $data['amt'];
						 $i++;
						 }
					?>
					
					],
					backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
					borderWidth: 0
				}],
				labels: [
				 <?php
					$j=0;
					 $sql2 = $conn->query('select d.location from delivery_location d, orders o where d.id=o.delivery_location group by o.delivery_location');
					 while($data2=$sql2->fetch_assoc()){
						 if($j>0){
							 echo ',';
							 }
						 echo "'".$data2['location']."'";
						 $j++;
						 }
					?>
				] 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})

		var myDoughnutChart = new Chart(doughnutChart, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
					<?php
					$k=0;
					 $sql = $conn->query('select sum(amount) as amt from carts c, orders o where c.order_id=o.order_id group by o.delivery_location');
					 while($data=$sql->fetch_assoc()){
						 if($k>0){
							 echo ',';
							 }
						 echo $data['amt'];
						 $k++;
						 }
					?>
					
					],
					backgroundColor: ['#f3545d','#fdaf4b','#1d7af3']
				}],

				labels: [
				<?php
					$s=0;
					 $sql2 = $conn->query('select d.location from delivery_location d, orders o where d.id=o.delivery_location group by o.delivery_location');
					 while($data2=$sql2->fetch_assoc()){
						 if($s>0){
							 echo ',';
							 }
						 echo "'".$data2['location']."'";
						 $s++;
						 }
					?>
				]
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});

		/*var myRadarChart = new Chart(radarChart, {
			type: 'radar',
			data: {
				labels: ['Running', 'Swimming', 'Eating', 'Cycling', 'Jumping'],
				datasets: [{
					data: [20, 10, 30, 2, 30],
					borderColor: '#1d7af3',
					backgroundColor : 'rgba(29, 122, 243, 0.25)',
					pointBackgroundColor: "#1d7af3",
					pointHoverRadius: 4,
					pointRadius: 3,
					label: 'Team 1'
				}, {
					data: [10, 20, 15, 30, 22],
					borderColor: '#716aca',
					backgroundColor: 'rgba(113, 106, 202, 0.25)',
					pointBackgroundColor: "#716aca",
					pointHoverRadius: 4,
					pointRadius: 3,
					label: 'Team 2'
				},
				]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				}
			}
		});*/

		/*var myBubbleChart = new Chart(bubbleChart,{
			type: 'bubble',
			data: {
				datasets:[{
					label: "Car", 
					data:[{x:25,y:17,r:25},{x:30,y:25,r:28}, {x:35,y:30,r:8}], 
					backgroundColor:"#716aca"
				},
				{
					label: "Motorcycles", 
					data:[{x:10,y:17,r:20},{x:30,y:10,r:7}, {x:35,y:20,r:10}], 
					backgroundColor:"#1d7af3"
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'bottom'
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}],
					xAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});*/

		/*var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Python",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [30, 45, 45, 68, 69, 90, 100, 158, 177, 200, 245, 256]
				},{
					label: "PHP",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [10, 20, 55, 75, 80, 48, 59, 55, 23, 107, 60, 87]
				}, {
					label: "Ruby",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [10, 30, 58, 79, 90, 105, 117, 160, 185, 210, 185, 194]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			}
		});*/

		/*var myMultipleBarChart = new Chart(multipleBarChart, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "First time visitors",
					backgroundColor: '#59d05d',
					borderColor: '#59d05d',
					data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
				},{
					label: "Visitors",
					backgroundColor: '#fdaf4b',
					borderColor: '#fdaf4b',
					data: [145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312,356],
				}, {
					label: "Pageview",
					backgroundColor: '#177dff',
					borderColor: '#177dff',
					data: [185, 279, 273, 287, 234, 312, 322, 286, 301, 320, 346, 399],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom'
				},
				title: {
					display: true,
					text: 'Traffic Stats'
				},
				tooltips: {
					mode: 'index',
					intersect: false
				},
				responsive: true,
				scales: {
					xAxes: [{
						stacked: true,
					}],
					yAxes: [{
						stacked: true
					}]
				}
			}
		});*/

		// Chart with HTML Legends
/*
		var gradientStroke = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke.addColorStop(0, '#177dff');
		gradientStroke.addColorStop(1, '#80b6f4');

		var gradientFill = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill.addColorStop(0, "rgba(23, 125, 255, 0.7)");
		gradientFill.addColorStop(1, "rgba(128, 182, 244, 0.3)");

		var gradientStroke2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke2.addColorStop(0, '#f3545d');
		gradientStroke2.addColorStop(1, '#ff8990');

		var gradientFill2 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill2.addColorStop(0, "rgba(243, 84, 93, 0.7)");
		gradientFill2.addColorStop(1, "rgba(255, 137, 144, 0.3)");

		var gradientStroke3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientStroke3.addColorStop(0, '#fdaf4b');
		gradientStroke3.addColorStop(1, '#ffc478');

		var gradientFill3 = htmlLegendsChart.createLinearGradient(500, 0, 100, 0);
		gradientFill3.addColorStop(0, "rgba(253, 175, 75, 0.7)");
		gradientFill3.addColorStop(1, "rgba(255, 196, 120, 0.3)");

		var myHtmlLegendsChart = new Chart(htmlLegendsChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [ {
					label: "Subscribers",
					borderColor: gradientStroke2,
					pointBackgroundColor: gradientStroke2,
					pointRadius: 0,
					backgroundColor: gradientFill2,
					legendColor: '#f3545d',
					fill: true,
					borderWidth: 1,
					data: [154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
				}, {
					label: "New Visitors",
					borderColor: gradientStroke3,
					pointBackgroundColor: gradientStroke3,
					pointRadius: 0,
					backgroundColor: gradientFill3,
					legendColor: '#fdaf4b',
					fill: true,
					borderWidth: 1,
					data: [256, 230, 245, 287, 240, 250, 230, 295, 331, 431, 456, 521]
				}, {
					label: "Active Users",
					borderColor: gradientStroke,
					pointBackgroundColor: gradientStroke,
					pointRadius: 0,
					backgroundColor: gradientFill,
					legendColor: '#177dff',
					fill: true,
					borderWidth: 1,
					data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500",
							beginAtZero: false,
							maxTicksLimit: 5,
							padding: 20
						},
						gridLines: {
							drawTicks: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 20,
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "500"
						}
					}]
				}, 
				legendCallback: function(chart) { 
					var text = []; 
					text.push('<ul class="' + chart.id + '-legend html-legend">'); 
					for (var i = 0; i < chart.data.datasets.length; i++) { 
						text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
						if (chart.data.datasets[i].label) { 
							text.push(chart.data.datasets[i].label); 
						} 
						text.push('</li>'); 
					} 
					text.push('</ul>'); 
					return text.join(''); 
				}  
			}
		});

		var myLegendContainer = document.getElementById("myChartLegend");

		// generate HTML legend
		myLegendContainer.innerHTML = myHtmlLegendsChart.generateLegend();

		// bind onClick event to all LI-tags of the legend
		var legendItems = myLegendContainer.getElementsByTagName('li');
		for (var i = 0; i < legendItems.length; i += 1) {
			legendItems[i].addEventListener("click", legendClickCallback, false);
		}*/

	</script>


</body>
</html>