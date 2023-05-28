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
	  
	  
#invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 100mm;
  background: #fff;
 }
 
  h1 {
    font-size: 1.5em;
    color: #222;
  }
  h2 {
    font-size: 0.9em;
  }
  h3 {
    font-size: 1.2em;
    font-weight: 300;
    line-height: 2em;
  }
  p {
    font-size: 0.7em;
    color: #666;
    line-height: 1.2em;
  }

  #top,
  #mid,
  #bot {
    /* Targets all id with 'col-' */
    border-bottom: 1px solid #eee;
  }

  #top {
    min-height: 25px;
  }
  #mid {
    min-height: 80px;
  }
  #bot {
    min-height: 50px;
  }

  #top .logo {
    //float: left;
    height: 60px;
    width: 60px;
    background: url(../../assets/img/logo.jpg) no-repeat;
    background-size: 60px 60px;
  }
  .clientlogo {
    float: left;
    height: 60px;
    width: 60px;
    background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
    background-size: 60px 60px;
    border-radius: 50px;
  }
  .info {
    display: block;
    //float:left;
    margin-left: 0;
  }
  .title {
    float: right;
  }
  .title p {
    text-align: right;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  td {
    //padding: 5px 0 5px 15px;
    //border: 1px solid #EEE
  }
  .tabletitle {
    //padding: 5px;
    font-size: 0.5em;
    background: #eee;
  }
  .service {
    border-bottom: 1px solid #eee;
  }
  .item {
    width: 24mm;
  }
  .itemtext {
    font-size: 0.5em;
  }

  #legalcopy {
    margin-top: 5mm;
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
        
	<div id="invoice-POS">

  <center id="top">
    <!--<div class="logo"></div>-->
    <div class="info">
      <h2>RBD.Reliance</h2>
    </div>
    <!--End Info-->
  </center>
  <!--End InvoiceTop-->

  <!--End Invoice Mid-->

  <div id="bot">

    <div id="table">
      <table>
        <? $ss = "select d.*,s.customer,s.address,s.mobile_1,i.item_name,c.color from delivery_info d left join sales_order s on s.s_no=d.s_no and s.customer='".$customer."' left join item_info i on i.item_id=d.item_id left join color_list c on c.id=d.color where s.s_no=d.s_no and d.s_no='".$order_no."'";
        $qry = $conn->query($ss);
        while($data = $qry->fetch_assoc()){
          $amount=($data['sales_qty']*$data['unit_price']); $tot_amt += $amount;
        }  
        ?>

<? $test = '<table>
	   
     <tr class="tabletitle">
       <td class="item">
         <h2>Item</h2>
       </td>
       <td class="Hours">
         <h2>Qty</h2>
       </td>
       <td class="Rate">
         <h2>Sub Total</h2>
       </td>
     </tr>';
 
 //$test=json_encode($test)
 
 // qr code table
 $qr_details = 
     'order_no: '.$order_no 
     .',customer:'.$customer
     .',address:'.$s_data['address']
     .',mobile:'.$s_data['mobile_1']
     .',email:'.$s_data['email']
     .',delivery_date:'.$s_data['delivery_date']
     .',agency:'.$s_data['agency']
     .',total:'.$tot_amt;

 ?>

        <tr>
          <td>Order No:</td>
          <td><?php echo $order_no;?></td>
          <td rowspan="7">
          <div id="legalcopy">
            <img src="https://chart.googleapis.com/chart?chs=100x100&amp;cht=qr&amp;chl=<?php echo $qr_details;?>;" alt="QR code">
            
          </div>
          </td>
        </tr>
        <tr>
          <td>Date:</td>
          <td><?php echo $s_data['delivery_date'];?></td>
        </tr>
        <tr>
          <td>Delivery Agency:</td>
          <td><?php echo $s_data['agency'];?></td>
        </tr>
        <tr>
          <td>Customer:</td>
          <td><?php echo $customer;?></td>
        </tr>
        <tr>
          <td>Address:</td>
          <td><?php echo $s_data['address'];?></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><?php echo $s_data['email'];?></td>
        </tr>
        <tr>
          <td>Phone:</td>
          <td><?php echo $s_data['mobile_1'];?></td>
        </tr>
        
        <tr>
          <td></td>
          <td class="Rate">
            <h2>Total</h2>
          </td>
          <td class="payment">
            <h2><?php echo number_format($tot_amt,2);?></h2>
          </td>
        </tr>

      </table>
    </div>
    <!--End Table-->
    <p class="legal"><strong>Thank you for your business!</strong></p>
  </div>
  <!--End InvoiceBot-->
</div>
<!--End Invoice-->
    
    
    
</body>
</html>
