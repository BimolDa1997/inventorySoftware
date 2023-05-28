



<?php



    session_start();



    include ('../common/library.php');  



    include ('../common/helper.php'); 



    



    



    $fdate= $_REQUEST['fdate'];



    $tdate= $_REQUEST['tdate'];



    



    



    



?>



<!DOCTYPE html>



<html lang="en">



<head>



  <meta charset="utf-8">



  <meta name="viewport" content="width=device-width, initial-scale=1">



  <title>Mollik Plaza</title>







  <!-- Google Font: Source Sans Pro -->



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">



  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">



  <link rel="stylesheet" href="../assets/css/atlantis.min.css">



  



  



  <!-- Font Awesome -->



  



  <style>



      body{



          background-color:#fff;



          color:#000;



      }



      .logo img{



          width:100%;



      }



  </style>



  <script>



		



		function printpage() {



       



        var printButton = document.getElementById("printpagebutton");



       



        printButton.style.visibility = 'hidden';



        



        window.print()



        printButton.style.visibility = 'visible';



    }



		



		



		



		



		



		



		



		



		



	</script>



  



</head>



<body>



    <div class="container-fluid">







		<div class="col text-center">



			<input  id="printpagebutton" type="button" value="print" onClick="printpage()"/>



		</div>







	



	<?php if($_REQUEST['master_report']==1) { ?>

	<div class="row">
     <div class="col-12 text-center">
      <h3><u>Employee Basic Information</u></h3>
      <h4>Period : <?=date('M-Y')?></h4>
      </div>
       <div class="col-12">
             <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">
                 <thead>
                   <tr>
                         <th>Sl</th>
                         <th>Employee Name</th>
                         <th>Designation</th>
                         <th>Department</th>
                         <th>Joining Date</th>
                         <th>Mobile No</th>
                         <th>NID</th>
                         <th>Mother Name</th>
                         <th>Father Name</th>
                         <th>Present Address</th>
                         <th>Permanenet Address</th>
                   </tr>
                 </thead>
                 <tbody>
                     <?php
                      $sql = "select * from employee_info where 1";
					  $qry = $conn->query($sql);
					  while($data = $qry->fetch_assoc()){
                       ?>
                       <tr>
                         <td><?=++$i?></td>
                         <td><?=$data['emp_name']?></td>
                         <td><?=$data['designation']?></td>
                         <td><?=$data['department']?></td>
                         <td><?=$data['joining_date']?></td>
                         <td><?=$data['mobile_no']?></td>
                         <td><?=$data['nid_no']?></td>
                         <td><?=$data['mother_name']?></td>
                         <td><?=$data['father_name']?></td>
                         <td><?=$data['present_address']?></td>
                         <td><?=$data['permanent_address']?></td>
                       </tr>
	                <?php } ?>
                    </tbody>
                   </table>
                  </div>
                 </div>
             <?php } ?>

      <?php if($_REQUEST['master_report']==2) { ?>

	<div class="row">
     <div class="col-12 text-center">
      <h3><u>Payroll Report</u></h3>
      <h4>Period : <?=date('M-Y')?></h4>
      </div>
       <div class="col-12">
             <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0" style="border-collapse:collapse;">
                 <thead>
                   <tr>
                         <th>Sl</th>
                         <th>Employee Name</th>
                         <th>Designation</th>
                         <th>Department</th>
                         <th>Joining Date</th>
                         <th>Gross Salary</th>
                         <th>Total Days</th>
                         <th>Holyday+Friday</th>
                         <th>Absent</th>
                         <th>Leave</th>
                         <th>Late</th>
                         <th>Mobile Bill</th>
                         <th>Absent Deduction</th>
                         <th>Late Deduction</th>
                         <th>Total Deduction</th>
                         <th>Total Payable</th>
                   </tr>
                 </thead>
                 <tbody>
                     <?php
                      $payroll_sql = "select p.*,e.emp_name,e.joining_date from payroll p, employee_info e where 1 and p.emp_id=e.emp_id and p.month='".$_POST['month']."' and p.year='".$_POST['year']."'";
					  $payroll_qry = $conn->query($payroll_sql);
					  while($payroll_data = $payroll_qry->fetch_assoc()){
						  $total_payable +=$payroll_data['total_payable'];
                       ?>
                       <tr>
                         <td><?=++$i?></td>
                         <td><?=$payroll_data['emp_name']?></td>
                         <td><?=$payroll_data['designation']?></td>
                         <td><?=$payroll_data['department']?></td>
                         <td><?=$payroll_data['joining_date']?></td>
                         <td><?=$payroll_data['gross_salary']?></td>
                         <td><?=$payroll_data['td']?></td>
                         <td><?=$payroll_data['hd']?></td>
                         <td><?=$payroll_data['ab']?></td>
                         <td><?=$payroll_data['lv']?></td>
                         <td><?=$payroll_data['lt']?></td>
                         <td><?=$payroll_data['mobile_bill']?></td>
                         <td><?=$payroll_data['absent_deduction']?></td>
                         <td><?=$payroll_data['other_deduction']?></td>
                         <td><?=$payroll_data['total_deduction']?></td>
                         <td><?=$payroll_data['total_payable']?></td>
                       </tr>
	                <?php } ?>
                      <tr>
                         <td colspan="15"><strong>Total</strong></td>
                         <td><strong><?=$total_payable?></strong></td>
                      </tr>
                    </tbody>
                   </table>
                  </div>
                 </div>
             <?php } ?>

    </div>


    	<!--   Core JS Files   -->



	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>



	<script src="../../assets/js/core/popper.min.js"></script>



	<script src="../../assets/js/core/bootstrap.min.js"></script>







	<!-- jQuery UI -->



	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>



	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>







	<!-- jQuery Scrollbar -->



	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>











	<!-- Chart JS -->



	<script src="../../assets/js/plugin/chart.js/chart.min.js"></script>







	<!-- jQuery Sparkline -->



	<script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>







	<!-- Chart Circle -->



	<script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>







	<!-- Datatables -->



	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>







	<!-- Bootstrap Notify -->



	<script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>







	<!-- jQuery Vector Maps -->



	<script src="../../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>



	<script src="../../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>







	<!-- Sweet Alert -->



	<script src="../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>







	<!-- Atlantis JS -->



	<script src="../../assets/js/atlantis.min.js"></script>



    <script >



		$(document).ready(function() {



			$('.basic-datatables').DataTable({



			    "paging": false,



			    buttons: [



            'copy', 'csv', 'excel', 'pdf', 'print'



        		]



			});







			$('#multi-filter-select').DataTable( {



				"pageLength": 5,



				initComplete: function () {



					this.api().columns().every( function () {



						var column = this;



						var select = $('<select class="form-control"><option value=""></option></select>')



						.appendTo( $(column.footer()).empty() )



						.on( 'change', function () {



							var val = $.fn.dataTable.util.escapeRegex(



								$(this).val()



								);







							column



							.search( val ? '^'+val+'$' : '', true, false )



							.draw();



						} );







						column.data().unique().sort().each( function ( d, j ) {



							select.append( '<option value="'+d+'">'+d+'</option>' )



						} );



					} );



				}



			});







			// Add Row



			$('#add-row').DataTable({



				"pageLength": 5,



			});







			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';







			$('#addRowButton').click(function() {



				$('#add-row').dataTable().fnAddData([



					$("#addName").val(),



					$("#addPosition").val(),



					$("#addOffice").val(),



					action



					]);



				$('#addRowModal').modal('hide');







			});



		});



	</script>



</body>



</html>







