<?php
    session_start();
    include ('../common/library.php');  
    include ('../common/helper.php'); 
    $order_no = $_REQUEST['delivery_no'];
    $customer = $_REQUEST['customer'];
	$ss = "select d.*,s.customer,s.address,s.mobile_1 from delivery_info d, sales_order s where s.id=d.sales_order_id and d.s_no='".$order_no."' and s.customer='".$customer."'";
    $sql = $conn->query($ss);
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
                        <b>Order No:</b>
                    </div>
                    <div class="col-6"><p><?php echo $order_no;?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Customer Name:</b>
                    </div>
                    <div class="col-6"><p><?php echo $customer;?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Address:</b>
                    </div>
                    <div class="col-6"><p><?php echo $s_data['address'];?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Phone:</b>
                    </div>
                    <div class="col-6"><p><?php echo $s_data['mobile_1'];?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b><strong>Delivery Agency:</strong></b>
                    </div>
                    <div class="col-6"><p><strong><?php echo $s_data['agency'];?></strong></p></div>
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="row">
                    <div class="col-12">
                        <p> <b>Delivery Date: </b><?php echo $s_data['delivery_date'];?></p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row mb-2">
        <table border="1" width="100%" style="margin:0 auto" cellpadding="5">
            <thead>
                <tr style="background:#B0ADAE">
                    <th>Product Description</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                
                <? $ss = "select d.*,s.customer,s.address,s.mobile_1,i.item_name,c.color from delivery_info d left join sales_order s on s.s_no=d.s_no and s.customer='".$customer."' left join item_info i on i.item_id=d.item_id left join color_list c on c.id=d.color where s.s_no=d.s_no and d.s_no='".$order_no."'";
				   $qry = $conn->query($ss);
                while($data = $qry->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$data['item_name'].'#'.$data['color']?></td>
                    <td><?php echo $data['sales_qty']?></td>
                    <td><?php echo $data['unit_price']?></td>
                    <td class="text-right"><?php echo $amount = ($data['sales_qty']*$data['unit_price']); $tot_amt += $amount;  ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot class="text-right">
                <tr style="background:#B0ADAE">
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong><?php echo number_format($tot_amt,2);?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
	

    
</body>
</html>
