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
  <title>RBD.Reliance</title>

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


	<?php if($_REQUEST['master_report']==1) { 

	if($_POST['fdate']!='' && $_POST['tdate']!=''){
	   $con =' and o.order_date between "'.$_POST['fdate'].'" and "'.$_POST['tdate'].'"';
	 }

	 // average order value
	 if($_POST['fprice']!='' && $_POST['tprice']!=''){

	    $con .=' and total_amount > "'.$_POST['fprice'].'"';

	    $con .=' and total_amount < "'.$_POST['tprice'].'"';
	 }

	 if($_POST['delivery_location']!=''){
	    $con .=' and o.delivery_location = "'.$_POST['delivery_location'].'"';
	 }

	 // purchase times


	?>
	<div class="row">
	<form method="post" action="action_master_report.php">
	    <div class="col-12 text-center">
	        <h3><u>Web Customer Summary Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
       <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <div class="table-responsive">
	        <table border="1" id="theTable" cellpadding="0" cellspacing="0"  class="table table-sm basic-datatables">
	            <thead>
	                <tr>
	                    <th>Sl</th>
						<th>Check</th>
						<th>Customer Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Location</th>
						<th>Address</th>
						<th>Customer Group</th>
						<th>Last Purchase Date</th>
						<th>Purchase Times</th>
						<th>Purchase Qty</th>
						<th>Purchased Amount</th>
						<th>Average Purchased Amount</th>
	                </tr>
	            </thead>
	 			
	            <tbody>
	                 <?php
					   $sql = "select u.*, o.order_date,o.delivery_location,sum(o.total_amount) as amt, avg(o.total_amount) as avgp from web_users u, orders o where 1 and u.user_id=o.user_id ".$con."
					  group by u.user_id order by o.order_date desc";
					  $s_details = $conn->query($sql);
                        while($c_data = $s_details->fetch_assoc()){
						$qty = find_a_field('carts','sum(quantity)','user_id='.$c_data['user_id'].' and order_id !="" ');
						$amt = $c_data['amt'];	
						$location = find_a_field('delivery_location','location','id='.$c_data['delivery_location'].' ');
						$purchase_times = find_a_field('orders','count(order_id)','user_id='.$c_data['user_id'].' ');
						?>
					<?php if($_POST['fcount']>0 &&  $_POST['tcount']>0){ echo $purchase_times;
						if($purchase_times > $_POST['fcount'] && $purchase_times < $_POST['tcount']){ ?>	
	                <tr>
						<td><?php echo ++$sl; ?></td>
						<td> <input type="checkbox" value="<?=$c_data['user_id']?>" name="chk[]" id="chk" class="form-control"> </td>
						<td><?=$c_data['name']?></td>
						<td><?=$c_data['mobile']?></td>
						<td><?=$c_data['email']?></td>
						<th><?=$location;?></th>
						<td><?=$c_data['address']?></td>
						<td><?=$c_data['customer_group']?></td>
						<td><? if($c_data['order_date'] !='') echo date('d-m-Y',strtotime($c_data['order_date'])); ?></td>
						<td>
							<?php echo $purchase_times;?>
						</td>
						<td><?=$qty;?></td>
						<td><?=number_format($amt,2);?></td>
						<td><?=number_format($c_data['avgp'],2);?></td>
                    </tr>
	                <?php
						}
					  }else{ ?>

<tr>
						<td><?php echo ++$sl; ?></td>
						<td> <input type="checkbox" value="<?=$c_data['user_id']?>" name="chk[]" id="chk" class="form-control"> </td>
						<td><?=$c_data['name']?></td>
						<td><?=$c_data['mobile']?></td>
						<td><?=$c_data['email']?></td>
						<th><?=$location;?></th>
						<td><?=$c_data['address']?></td>
						<td><?=$c_data['customer_group']?></td>
						<td><? if($c_data['order_date'] !='') echo date('d-m-Y',strtotime($c_data['order_date'])); ?></td>
						<td>
							<?php echo $purchase_times;?>
						</td>
						<td><?=$qty;?></td>
						<td><?=number_format($amt,2);?></td>
						<td><?=number_format($c_data['avgp'],2);?></td>
                    </tr>

					<? } }?>
                     
	            </tbody>
						
	        </table>
			<button class="btn btn-danger mt-5 ml-3" data-toggle="modal" data-target="#addRowModal">
				Action on Serach Value
			</button>

			<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">Action</span> 
							<span class="fw-light">
							on Serach Value
							</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p class="small">Make Sure Fillup All Field</p>
						
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Action List <span style="color:#FF0000; font-size:15px;">*</span></label>
										<select name="action" id="actions" class="form-control" required>
											<option value="">Select Action</option>
											<option value="Black List">Black List</option>
											<option value="Send SMS">Send SMS</option>
											<option value="Special Discount">Special Discount</option>
											<option value="Customer Group">Customer Group</option>
										</select>
									</div>
								</div>
								<div class="col-sm-12" id="message" style="display:none">
									<div class="form-group form-group-default">
										<label>Message  </label>
										<textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-sm-12" id="couponss" style="display:none">
									<div class="form-group form-group-default">
										<label>Coupon List</label>
										<input type="text" autocomplete="off" name="coupon" list="coupons"  id="coupon"  class="form-control" placeholder="coupon" >
										<datalist id="coupons">
											<?php
												foreign_relation('cu_pons','cupon_code','concat(cupon_code," #> ", type)','',' status = "Active" ');
											?>
									</div>
								</div>
								<div class="col-sm-12" id="group" style="display:none">
									<div class="form-group form-group-default">
										<label>Customer Group  </label>
										<input type="text" name="customer_group" id="customer_group"  class="form-control" placeholder="group name" >
									</div>
								</div>
								
								
					<div class="modal-footer no-bd">
						<!--<button type="button" id="addRowButton" class="btn btn-primary">Add</button>-->
						<input type="submit" name="save"  value="Submit" class="btn btn-primary" />
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		</div>	
	    </div>
		
		</form>
	</div>
	<?php } ?>

	

	<!--sale summary report-->
	<?php if($_REQUEST['master_report']==170321) {} ?>
	<?php if($_REQUEST['master_report']==2) {} ?>
	<?php if($_REQUEST['master_report']==3) {} ?>
	<?php if($_REQUEST['master_report']==70421) {} ?>
	<?php if($_REQUEST['master_report']==70422) {} ?>
	<?php if($_REQUEST['master_report']==4) {} ?>
	<?php if($_REQUEST['master_report']==10) {} ?>

	<?php if($_REQUEST['master_report']==20) {}  ?>
	<?php if($_REQUEST['master_report']==22222) {} ?>

	<?php if($_REQUEST['master_report']==30) { } ?>
	<?php if($_REQUEST['master_report']==40) {} ?>
	<?php if($_REQUEST['master_report']==50) {} ?>
	<?php if($_REQUEST['master_report']==240821) { } ?>
	
	<?php if($_REQUEST['master_report']==250821) { } ?>


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
				"pageLength": 150,
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
				"pageLength": 150,

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

<script>
 function fnExcelReport() {
  var table = document.getElementById('theTable'); // id of table
  var tableHTML = table.outerHTML;
  var fileName = 'download.xls';

  var msie = window.navigator.userAgent.indexOf("MSIE ");

  // If Internet Explorer
  if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    dummyFrame.document.open('txt/html', 'replace');
    dummyFrame.document.write(tableHTML);
    dummyFrame.document.close();
    dummyFrame.focus();
    return dummyFrame.document.execCommand('SaveAs', true, fileName);
  }
  //other browsers
  else {
    var a = document.createElement('a');
    tableHTML = tableHTML.replace(/  /g, '').replace(/ /g, '%20'); // replaces spaces
    a.href = 'data:application/vnd.ms-excel,' + tableHTML;
    a.setAttribute('download', fileName);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }
}
  </script>

<script>
		$(document).ready(function() {
			// onchage action
			$('#actions').on('change', function() {
				if ( this.value == 'Send SMS')
				{
					$("#message").show();
					$("#couponss").hide();
					$("#group").hide();
				}
				else if ( this.value == 'Special Discount')
				{
					$("#message").hide();
					$("#couponss").show();
					$("#group").hide();
				}
				else if ( this.value == 'Customer Group')
				{
					$("#message").hide();
					$("#couponss").hide();
					$("#group").show();
				}
				else
				{
					$("#message").hide();
					$("#couponss").hide();
					$("#group").hide();
				}
			});
		});
	</script>
</body>
</html>
