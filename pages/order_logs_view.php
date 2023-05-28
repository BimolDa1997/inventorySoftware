<?php
    session_start();
    include ('../common/library.php');  
    include ('../common/helper.php'); 
    $cart_id = $_REQUEST['cart_id'];
	$order_id = $_REQUEST['order_id'];
    
    $sql = $conn->query("select * from orders where order_id=".$order_id." ");
    $order = $sql->fetch_assoc();
   
    
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
        <!--<div class="row mb-4">
            <div class="col-2">
                <div class="logo">
				
			
					<img src="../../assets/img/logo.jpg" style="" alt="navbar brand" class="navbar-brand">
				
				
			</div>
            </div>
            <div class=col-8></div>
        </div>-->
        <div class="row">
            <div class="col-6">
                
                <div class="row">
                    <div class="col-6">
                        <b>Order No:</b>
                    </div>
                    <div class="col-6"><p><?php echo $order['order_id'];?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Order Date::</b>
                    </div>
                    <div class="col-6"><p><?php echo $order['order_date'];?></p></div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <b>Customer Name:</b>
                    </div>
                    <div class="col-6"><p><?php echo $order['name'];?></p></div>
                </div>
            </div>
            
    </div>
    <div class="row mb-2">
        <table border="1" width="100%" style="margin:0 auto" cellpadding="5">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Phone No.</th>
                    <th>Shpping Address</th>
                    <th>Edited By</th>
                    <th>Edited At</th>
                </tr>
            </thead>
            <tbody>
                
                <? $s_details = $conn->query("select l.*,u.name as user from order_update_logs l left join users u on u.user_id=l.edit_by where l.cart_id=".$cart_id."  and  l.order_id=".$order_id."");
                while($data = $s_details->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo find_a_field('item_info','item_name','item_id='.$data['item_id']) ?></td>
                    <td><?php echo $data['qty']?></td>
                    <td><?php echo $data['rate']?></td>
                    
                    <td class="text-right"><?php echo $data['amount']?></td>
                    
                    <td><?php echo $data['mobile_no'];?></td>
                    <td><?php echo $data['shipping_address'];?></td>
                    <td><?php echo $data['user'];?></td>
                    <td><?php echo $data['edit_at'];?></td>
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
    
    
    
</body>
</html>
