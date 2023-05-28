<?php
    session_start();
    include ('../common/library.php');  
    include ('../common/helper.php'); 
    $sale_no = $_REQUEST['sale_no'];
    
    $sql = $conn->query("select * from sales_master where group_for=".$_SESSION['group_for']."  and s_no='".$sale_no."'");
    $s_data = $sql->fetch_assoc();
    
    if($s_data['dealer_code'] > 0){
        $dealer_name=find_a_field('customer_info','business_name','id='.$s_data['dealer_code']);
        $dealer_mobile=find_a_field('customer_info','mobile_no','id='.$s_data['dealer_code']); 
        $dealer_address=find_a_field('customer_info','customer_address','id='.$s_data['dealer_code']);
    }
    else {
        $dealer_name=$s_data['dealer_name'];
        $dealer_mobile=$s_data['dealer_address'];
        $dealer_address=$s_data['contact'];
    }
    
    
    
    
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
    <div class="container mt-1">
        <div class="">
		<div class="col text-center">
			<input  id="printpagebutton" type="button" value="print" onClick="printpage()"/>
		</div>
	</div>
        <div class="row mb-4">
            <div class="col-2">
                <div class="logo">
				
			
					<img src="../../assets/img/logo.jpg" style="" alt="navbar brand" class="navbar-brand">
				
				
			</div>
            </div>
            <div class=col-8></div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <b>Customer Name:</b>
                    </div>
                    <div class="col-6"><p><?php echo $dealer_name;?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Address:</b>
                    </div>
                    <div class="col-6"><p><?php echo $dealer_address;?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Phone:</b>
                    </div>
                    <div class="col-6"><p><?php echo $dealer_mobile;?></p></div>
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="row">
                    <div class="col-12">
                        <p> <b>Date: </b><?php echo $s_data['sales_date'];?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <table border="1" width="100%" style="margin:0 auto" cellpadding="5">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Rate</th>
                    <th>Qty</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                
                <? $s_details = $conn->query("select * from sales_order where group_for=".$_SESSION['group_for']."  and  s_no=".$sale_no."");
                while($data = $s_details->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo find_a_field('item_info','item_name','item_id='.$data['item_id']) ?></td>
                    <td><?php echo $data['unit']?></td>
                    <td><?php echo $data['rate']?></td>
                    
                    <td><?php echo $data['qty']?></td>
                    
                    <td class="text-right"><?php echo $data['amount']; $tot_amt += $data['amount'];  ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot class="text-right">
                <tr>
                    <td colspan="4">Total</td>
                    <td><?php echo number_format($tot_amt,2);?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row mb-2">
        <div class="col text-center">
            <h3><u>Payment Details</u></h3>
        </div>
    </div>
    <div class="row mb-5">
        <table border="1" width="100%" style="margin:0 auto"cellpadding="5">
            <thead>
                <tr>
                    <th>Collection Amount</th>

                    <th>Type</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                
                 <? $p_details = $conn->query("select * from payment where group_for=".$_SESSION['group_for']."  and  s_no=".$sale_no."");
                while($data = $p_details->fetch_assoc()){
                    
                    $discount += $data['discount_amount'];
                    $due +=$data['due_amt'];
                ?>
                <tr>
                    <td></td>
                    <td><?php echo $data['payment_types']?></td>
                    <td class="text-right"><?php echo number_format($data['payment_amount'],2)?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot class="text-right">

                <tr>
                    <td colspan="2">Discount</td>
                    <td><?php echo  number_format($discount,2); ?></td>
                </tr>
                <tr>
                    <td colspan="2">Due Amount</td>
                    <td><?php echo  number_format($due,2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row pt-5 text-center">
					<div class="col-4">
						<br><br><br><br><br>
						<hr class="w-50">
						<p>Order Received By</p>
					</div>
					<div class="col-4">
						
						<br><br><br><br><br>
						<hr class="w-50">
						<p>Order Placed By</p>
					</div>
					<div class="col-4">
						
						<br><br><br><br><br>
						<hr class="w-50">
						<p>Order Authorized By</p>
					</div>
				</div>
</body>
</html>
