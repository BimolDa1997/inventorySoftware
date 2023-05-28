`<?php
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
		
	   <?php
	 	    if($_POST['action']=="Black List"){
				$query = "update web_users set status = 'Block' where user_id in (".implode(",",$_POST['chk']).") ";
				$result =  $conn->query($query);
				if($result){
					echo "<div class='alert alert-success'>User Blocked Successfully</div>";
				}
			}	
			
			if($_POST['action']=="Special Discount"){
				$query = "update web_users set coupon_code = '".$_POST['coupon']."' where user_id in (".implode(",",$_POST['chk']).") ";
				$result =  $conn->query($query);
				if($result){
					echo "<div class='alert alert-success'>Special Discount Updated Successfully</div>";
				}
			}

			if($_POST['action']=="Customer Group"){
				$query = "update web_users set customer_group = '".$_POST['customer_group']."' where user_id in (".implode(",",$_POST['chk']).") ";
				$result =  $conn->query($query);
				if($result){
					echo "<div class='alert alert-success'>Customer Group Updated Successfully</div>";
				}
			}



			if($_POST['action']=="Send SMS"){

				//Text Sms For Manual SMS

				$msg ='';
				function sms($dest_addr,$sms_text){

				//$url = "https://api.mobireach.com.bd/SendTextMessage?Username=mollik&Password=Mplaza@123&From=MollikPlaza";

				$fields = array(
					'Username'      => "mollik",
					'Password'      => "Mplaza@123",
					'From'          => "MollikPlaza",
					'To'            => $dest_addr,
					'Message'       => $sms_text
				);

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, count($fields));
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
				$result = curl_exec($ch);
				curl_close($ch);

				}

				$count = 0;
				$query = "select * from web_users where user_id in (".implode(",",$_POST['chk']).") ";
				$result =  $conn->query($query);
				while($row = mysqli_fetch_array($result)){
					$count++;
						echo $recipients ="88".$row['mobile']."";
						
						echo $massage  = "".$_POST['sms']."";
						//$sms_result=sms($recipients, $massage);
					}	
				

				$msg = 'Successfuly sent message to '.$count.' people.';
			}
			
	   ?>
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
