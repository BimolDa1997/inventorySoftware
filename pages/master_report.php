



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
	   $con =' and d.delivery_date between "'.$_POST['fdate'].'" and "'.$_POST['tdate'].'"';
	 }

	?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Delivery Report Details</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>


	    <div class="col-12">

       <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>

	        <table border="1" id="theTable"  width="100%" cellpadding="5" cellspacing="0" style="border-collapse:collapse;">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Order No</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
	                    <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Address</th>
	                    <th>Category</th>
                        <th>Sub Category</th>
                        <th>Product Name</th>
                        <th>Color</th>
	                    <th>Qty</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>Delivery Agent</th>
                        <th>Delivery Fee</th>
                        <th>Delivery Status</th>
	                </tr>
	            </thead>

	            <tbody>

	                 <?php



					  $sql = "select d.*,s.customer,s.address,s.mobile_1,s.s_date,i.item_name,i.category_id,i.sub_category_id,c.color as color_name from delivery_info d left join item_info i on i.item_id=d.item_id left join sales_order s on s.id=d.sales_order_id left join color_list c on c.id=d.color where 1 ".$con." order by s.customer asc";



					  $s_details = $conn->query($sql);
                        while($data = $s_details->fetch_assoc()){
							 
							 $total_qty +=$data['sales_qty'];
							 $total_amt +=$data['amount'];
							 $total_delivery_fee +=$data['delivery_fee'];
							 $category = find_a_field('category_info','category','id="'.$data['category_id'].'"');
							 $subCategory = find_a_field('sub_category_info','category','id="'.$data['sub_category_id'].'"');
							
							?>



	                <tr>
	                     <td><?php echo ++$sl; ?></td>
                         <td><a href="delivery_print_view.php?delivery_no=<?php echo $data['s_no']?>&&customer=<?php echo $data['customer']?>" target="_blank"><?php echo $data['s_no']; ?></a></td>
                         <td><?php echo $data['s_date']; ?></td>
                         <td><?php echo $data['delivery_date']?></td>
                         <td><?php echo $data['customer']; ?></td>
                         <td><?=$data['mobile_1']?></td>
                         <td><?=$data['address']?></td>
                         <td><?=$category?></td>
                         <td><?=$subCategory?></td>
                         <td><?=$data['item_name']?></td>
                         <td><?=$data['color_name']?></td>
                         <td align="right"><?=$data['sales_qty']?></td>
                         <td align="right"><?=$data['unit_price']?></td>
                         <td align="right"><?=$data['amount']?></td>
                         <td align="right"><?=$data['payment_type']?></td>
                         <td align="right"><?=$data['agency']?></td>
                         <td align="right"><?=$data['delivery_fee']?></td>
                         <td><?=$data['status']?></td>
                       </tr>



	                <?php } ?>


                     <tr>
                       <td colspan="11" align="right"><strong>Total</strong></td>
                       <td align="right"><?=number_format($total_qty,2)?></td>
                       <td>&nbsp;</td>
                       <td align="right"><?=number_format($total_amt,2)?></td>
                       <td>&nbsp;</td>
                       <td>&nbsp;</td>
                       <td align="right"><?=number_format($total_delivery_fee,2)?></td>
                       
                       <td>&nbsp;</td>
                     </tr>
	            </tbody>

	            <!--<tfoot>
	                <th colspan="6">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
					<td></td>
					<td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>-->
	        </table>

	    </div>
	</div>
	<?php } ?>



	<!--sale summary report-->



<?php if($_REQUEST['master_report']==170321) { 
	 if($_POST['dealer_code']!=''){
	   		$con .=' and m.dealer_code="'.$_POST['dealer_code'].'"';
	 	}

	 if($_POST['brand']!=''){
	   $con .=' and i.brand="'.$_POST['brand'].'"';
	 }

?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Sales Summary Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
		<button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	        <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Sales Date</th>
	                    <th>Qty</th>
						<th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>

	                 <?php
					   $sql = "select m.*,sum(d.qty) qty ,sum(d.amount) amount
					  from sales_master m ,sales_order d
					  where m.s_no=d.s_no and sales_date between '".$fdate."' and '".$tdate."' ".$con."  group by d.s_date";

					  $s_details = $conn->query($sql);

                      while($data = $s_details->fetch_assoc()){

                ?>

	                <tr>
	                    <td><?php echo ++$sl; ?></td>
	                    <td><?php echo $data['sales_date']?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
						<td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>
	            <tfoot>
	                <th colspan="2">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>

	        </table>
	    </div>
	</div>

	<?php } ?>
	
	
	
<?php if($_REQUEST['master_report']==1203) { 


	 if($_POST['dealer_code']!=''){
	   		$con .=' and m.dealer_code="'.$_POST['dealer_code'].'"';
	 	}

	 if($_POST['brand']!=''){
	   $con .=' and i.brand="'.$_POST['brand'].'"';
	 }

?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Date Wise Sales Summary Report(POS)</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
		<button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	        <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Sales Date</th>
	                    <th>Qty</th>
						<th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>

	                 <?php
					   $sql = "select d.sale_date ,sum(d.qty) qty ,sum(d.grand_total) amount
					  from pos_sale_detail d
					  where d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  group by d.sale_date";

					  $s_details = $conn->query($sql);

                      while($data = $s_details->fetch_assoc()){

                ?>

	                <tr>
	                    <td><?php echo ++$sl; ?></td>
	                    <td><?php echo $data['sale_date']?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
						<td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>
	            <tfoot>
	                <th colspan="2">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>

	        </table>
	    </div>
	</div>

	<?php } ?>



<?php if($_REQUEST['master_report']==1204) { 


	 if($_POST['dealer_code']!=''){
	   		$con .=' and d.customer="'.$_POST['dealer_code'].'"';
	 	}

	 if($_POST['item_id']!=''){
	   $con .=' and d.item_id="'.$_POST['item_id'].'"';
	 }

?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Date Wise Sales Summary Report(POS)</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
		<button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	        <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
						<th>Sales Date</th>
						 <th>Customer Name</th>
						<th>Product Name</th>
						<th>Color</th>
	                    <th>Qty</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Discount</th>
						<th>Actual Sales</th>
	                </tr>
	            </thead>
	            <tbody>

	                 <?php
					   $sql = "select i.item_name, i.item_code, c.customer_name, l.color, d.sale_date ,sum(d.qty) qty, d.rate,d.pure_amt,d.discount ,sum(d.grand_total) amount
					  from pos_sale_detail d, customer_info c, item_info i, color_list l
					  where d.customer=c.id and d.item_id=i.item_id and d.color=l.id and d.warehouse=".$_SESSION['warehouse']." and d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  
					  group by d.id";

					  $s_details = $conn->query($sql);

                      while($data = $s_details->fetch_assoc()){

                ?>

	                <tr>
	                    <td><?php echo ++$sl; ?></td>
	                    <td><?php echo $data['sale_date']?></td>
						<td><?php echo $data['customer_name']?></td>
						<td><?php echo $data['item_code'].'-'.$data['item_name']?></td>
						<td><?php echo $data['color']?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
						<td><?php echo number_format($data['rate']); ?></td>
						<td><?php echo number_format($data['pure_amt']); $pure_amt +=$data['pure_amt']; ?></td>
						<td><?php echo number_format($data['discount']); $discount +=$data['discount']; ?></td>
						<td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>
	            <tfoot>
	                <th colspan="5">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
					<td></td>
					<td><?php echo number_format($pure_amt); ?></td>
					<td><?php echo number_format($discount); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>

	        </table>
	    </div>
	</div>

	<?php } ?>



<?php if($_REQUEST['master_report']==1207) { 
if($_POST['dealer_code']!=''){
		  $con .=' and d.customer="'.$_POST['dealer_code'].'"';
	}

if($_POST['item_id']!=''){
  $con .=' and d.item_id="'.$_POST['item_id'].'"';
}

?>

<div class="row">
   <div class="col-12 text-center">
	   <h3><u>Profit and Loss Report(POS)</u></h3>
	   <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
   </div>

   <div class="col-12">
   <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
		   <thead>
			   <tr class="text-center">
				   <th>Sl</th>
				   <th>Sales Date</th>
					<!-- <th>Customer Name</th> -->
				   <th>Product Name</th>
				   <th>Color</th>
				   <th>Qty</th>
				   <th>Sale Rate</th>
				   <th>Purchase Rate</th>
				   <th>Sale Amount</th>
				   <th>Sale Discount</th>
				   <th>Actual Sales</th>
				   <th>Purchase Amount</th>
				   <th>Profit/Loss</th>
			   </tr>
		   </thead>
		   <tbody>

				<?php
				  $sql = "select i.item_id,i.item_name, i.item_code, c.customer_name, l.color, l.id as clr, d.sale_date ,sum(d.qty) qty, d.rate,d.pure_amt,d.discount ,sum(d.grand_total) amount
				 from pos_sale_detail d, customer_info c, item_info i, color_list l
				 where d.customer=c.id and d.item_id=i.item_id and d.color=l.id and d.warehouse=".$_SESSION['warehouse']." and d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  
				 group by d.id";

				 $s_details = $conn->query($sql);

				 while($data = $s_details->fetch_assoc()){
					
				 $purchase_rate = find_a_field2('journal_item','avg(rate)','item_id='.$data['item_id'].' and color='.$data['clr'].' and warehouse = '.$_SESSION['warehouse']);	
		   ?>

			   <tr>
				   <td class="text-center"><?php echo ++$sl; ?></td>
				   <td class="text-center"><?php echo $data['sale_date']?></td>
				   <!-- <td><?php echo $data['customer_name']?></td> -->
				   <td><?php echo $data['item_code'].'-'.$data['item_name']?></td>
				   <td class="text-center"><?php echo $data['color']?></td>
				   <td class="text-center"><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
				   <td class="text-right"><?php echo number_format($data['rate']); ?></td>
				   <td class="text-right"><?php echo number_format($purchase_rate); ?></td>
				   <td class="text-right"><?php echo number_format($data['pure_amt']); $pure_amt +=$data['pure_amt']; ?></td>
				   <td class="text-right"><?php echo number_format($data['discount']); $discount +=$data['discount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['qty']*$purchase_rate); $tot_purchase +=$data['qty']*$purchase_rate; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']-($data['qty']*$purchase_rate)); $tot_profit +=$data['amount']-($data['qty']*$purchase_rate); ?></td>
			   </tr>
			   <?php } ?>
		   </tbody>
		   <tfoot>
				<!-- <th></th>	 -->
			   <th class="text-right" colspan="4">Total: </th>
			   <td class="text-center"><?php echo number_format($tot_qty); ?></td>
			   <td></td>
			   <td></td>
			   <td class="text-right"><?php echo number_format($pure_amt); ?></td>
			   <td class="text-right"><?php echo number_format($discount); ?></td>
			   <td class="text-right"><?php echo number_format($tot_amt); ?></td>
			   <td class="text-right"><?php echo number_format($tot_purchase); ?></td>
			   <td class="text-right"><?php echo number_format($tot_profit); ?></td>
		   </tfoot>

	   </table>
   </div>
</div>

<?php } ?>


<?php if($_REQUEST['master_report']==1208) { 
if($_POST['dealer_code']!=''){
		  $con .=' and d.customer="'.$_POST['dealer_code'].'"';
	}

if($_POST['item_id']!=''){
  $con .=' and d.item_id="'.$_POST['item_id'].'"';
}

?>

<div class="row">
   <div class="col-12 text-center">
	   <h3><u>Profit and Loss Report(POS)</u></h3>
	   <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
   </div>

   <div class="col-12">
   <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
		   <thead>
			   <tr class="text-center">
				   <th>Sl</th>
				   <th>Sales Date</th>
					<th>Customer Name</th>
				   <th>Product Name</th>
				   <th>Color</th>
				   <th>Qty</th>
				   <th>Sale Rate</th>
				   <th>Purchase Rate</th>
				   <th>Sale Amount</th>
				   <th>Sale Discount</th>
				   <th>Actual Sales</th>
				   <th>Purchase Amount</th>
				   <th>Profit/Loss</th>
			   </tr>
		   </thead>
		   <tbody>

				<?php
				  $sql = "select i.item_id,i.item_name, i.item_code, c.customer_name, l.color, l.id as clr, d.sale_date ,sum(d.qty) qty, d.rate,d.pure_amt,d.discount ,sum(d.grand_total) amount
				 from pos_sale_detail d, customer_info c, item_info i, color_list l
				 where d.customer=c.id and d.item_id=i.item_id and d.color=l.id and d.warehouse=".$_SESSION['warehouse']." and d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  
				 group by d.id";

				 $s_details = $conn->query($sql);

				 while($data = $s_details->fetch_assoc()){
					
				 $purchase_rate = find_a_field2('journal_item','avg(rate)','item_id='.$data['item_id'].' and color='.$data['clr'].' and warehouse = '.$_SESSION['warehouse']);	
		   ?>

			   <tr>
				   <td class="text-center"><?php echo ++$sl; ?></td>
				   <td class="text-center"><?php echo $data['sale_date']?></td>
				   <td><?php echo $data['customer_name']?></td>
				   <td><?php echo $data['item_code'].'-'.$data['item_name']?></td>
				   <td class="text-center"><?php echo $data['color']?></td>
				   <td class="text-center"><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
				   <td class="text-right"><?php echo number_format($data['rate']); ?></td>
				   <td class="text-right"><?php echo number_format($purchase_rate); ?></td>
				   <td class="text-right"><?php echo number_format($data['pure_amt']); $pure_amt +=$data['pure_amt']; ?></td>
				   <td class="text-right"><?php echo number_format($data['discount']); $discount +=$data['discount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['qty']*$purchase_rate); $tot_purchase +=$data['qty']*$purchase_rate; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']-($data['qty']*$purchase_rate)); $tot_profit +=$data['amount']-($data['qty']*$purchase_rate); ?></td>
			   </tr>
			   <?php } ?>
		   </tbody>
		   <tfoot>
			   <th class="text-right" colspan="5">Total: </th>
			   <td class="text-center"><?php echo number_format($tot_qty); ?></td>
			   <td></td>
			   <td></td>
			   <td class="text-right"><?php echo number_format($pure_amt); ?></td>
			   <td class="text-right"><?php echo number_format($discount); ?></td>
			   <td class="text-right"><?php echo number_format($tot_amt); ?></td>
			   <td class="text-right"><?php echo number_format($tot_purchase); ?></td>
			   <td class="text-right"><?php echo number_format($tot_profit); ?></td>
		   </tfoot>

	   </table>
   </div>
</div>

<?php } ?>


<?php if($_REQUEST['master_report']==1209) { 


?>

<div class="row">
   <div class="col-12 text-center">
	   <h3><u>Top Sales Product List(POS)</u></h3>
	   <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
   </div>

   <div class="col-12">
   <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
		   <thead>
			   <tr class="text-center">
				   <th>Sl</th>
				   <th>Sales Date</th>
					<th>Customer Name</th>
				   <th>Product Name</th>
				   <th>Color</th>
				   <th>Qty</th>
				   <th>Sale Rate</th>
				   <th>Purchase Rate</th>
				   <th>Sale Amount</th>
				   <th>Sale Discount</th>
				   <th>Actual Sales</th>
				   <th>Purchase Amount</th>
				   <th>Profit/Loss</th>
			   </tr>
		   </thead>
		   <tbody>

				<?php
				// top sales product list
				
				  $sql = "select i.item_id,i.item_name, i.item_code, c.customer_name, l.color, l.id as clr, d.sale_date ,sum(d.qty) qty, d.rate,d.pure_amt,d.discount ,sum(d.grand_total) amount
				 from pos_sale_detail d, customer_info c, item_info i, color_list l
				 where d.customer=c.id and d.item_id=i.item_id and d.color=l.id and d.warehouse=".$_SESSION['warehouse']." and d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  
				 group by d.item_id, d.color having sum(d.qty)>0 order by sum(d.qty) desc limit 100";

				 $s_details = $conn->query($sql);

				 while($data = $s_details->fetch_assoc()){
					
				 $purchase_rate = find_a_field2('journal_item','avg(rate)','item_id='.$data['item_id'].' and color='.$data['clr'].' and warehouse = '.$_SESSION['warehouse']);	
		   ?>

			   <tr>
				   <td class="text-center"><?php echo ++$sl; ?></td>
				   <td class="text-center"><?php echo $data['sale_date']?></td>
				   <td><?php echo $data['customer_name']?></td>
				   <td><?php echo $data['item_code'].'-'.$data['item_name']?></td>
				   <td class="text-center"><?php echo $data['color']?></td>
				   <td class="text-center"><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
				   <td class="text-right"><?php echo number_format($data['rate']); ?></td>
				   <td class="text-right"><?php echo number_format($purchase_rate); ?></td>
				   <td class="text-right"><?php echo number_format($data['pure_amt']); $pure_amt +=$data['pure_amt']; ?></td>
				   <td class="text-right"><?php echo number_format($data['discount']); $discount +=$data['discount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['qty']*$purchase_rate); $tot_purchase +=$data['qty']*$purchase_rate; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']-($data['qty']*$purchase_rate)); $tot_profit +=$data['amount']-($data['qty']*$purchase_rate); ?></td>
			   </tr>
			   <?php } ?>
		   </tbody>
		   <tfoot>
			   <th class="text-right" colspan="5">Total: </th>
			   <td class="text-center"><?php echo number_format($tot_qty); ?></td>
			   <td></td>
			   <td></td>
			   <td class="text-right"><?php echo number_format($pure_amt); ?></td>
			   <td class="text-right"><?php echo number_format($discount); ?></td>
			   <td class="text-right"><?php echo number_format($tot_amt); ?></td>
			   <td class="text-right"><?php echo number_format($tot_purchase); ?></td>
			   <td class="text-right"><?php echo number_format($tot_profit); ?></td>
		   </tfoot>

	   </table>
   </div>
</div>

<?php } ?>

<?php if($_REQUEST['master_report']==1210) { 


?>

<div class="row">
   <div class="col-12 text-center">
	   <h3><u>Top Sales Customer List(POS)</u></h3>
	   <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
   </div>

   <div class="col-12">
   <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
		   <thead>
			   <tr class="text-center">
				   <th>Sl</th>
					<th>Customer Name</th>
				   <th>Qty</th>
				   <th>Sale Rate</th>
				   <th>Sale Amount</th>
				   <th>Sale Discount</th>
				   <th>Actual Sales</th>
			   </tr>
		   </thead>
		   <tbody>

				<?php
				// top sales product list
				
				  $sql = "select i.item_id,i.item_name, i.item_code, c.customer_name, l.color, l.id as clr, d.sale_date ,sum(d.qty) qty, avg(d.rate) as rate,sum(d.pure_amt) as pure_amt,sum(d.discount) as discount ,sum(d.grand_total) amount
				 from pos_sale_detail d, customer_info c, item_info i, color_list l
				 where d.customer=c.id and d.item_id=i.item_id and d.color=l.id and d.warehouse=".$_SESSION['warehouse']." and d.status like 'CHECKED' and d.sale_date between '".$fdate."' and '".$tdate."' ".$con."  
				 group by d.customer having sum(d.qty)>0 order by sum(d.qty) desc limit 100";

				 $s_details = $conn->query($sql);

				 while($data = $s_details->fetch_assoc()){
					
				 $purchase_rate = find_a_field2('journal_item','avg(rate)','item_id='.$data['item_id'].' and color='.$data['clr'].' and warehouse = '.$_SESSION['warehouse']);	
		   ?>

			   <tr>
				   <td class="text-center"><?php echo ++$sl; ?></td>
				   <td><?php echo $data['customer_name']?></td>
				   <td class="text-center"><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
				   <td class="text-right"><?php echo number_format($data['rate']); ?></td>
				   <td class="text-right"><?php echo number_format($data['pure_amt']); $pure_amt +=$data['pure_amt']; ?></td>
				   <td class="text-right"><?php echo number_format($data['discount']); $discount +=$data['discount']; ?></td>
				   <td class="text-right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
				</tr>
			   <?php } ?>
		   </tbody>
		   <tfoot>
			   <th class="text-right" colspan="2">Total: </th>
			   <td class="text-center"><?php echo number_format($tot_qty); ?></td>
			   <td></td>
			   <td class="text-right"><?php echo number_format($pure_amt); ?></td>
			   <td class="text-right"><?php echo number_format($discount); ?></td>
			   <td class="text-right"><?php echo number_format($tot_amt); ?></td>
		   </tfoot>

	   </table>
   </div>
</div>

<?php } ?>

		
<?php if($_REQUEST['master_report']==1205) { 


	 if($_POST['dealer_code']!=''){
	   		$con .=' and m.dealer_code="'.$_POST['dealer_code'].'"';
	 	}

	 if($_POST['brand']!=''){
	   $con .=' and i.brand="'.$_POST['brand'].'"';
	 }

?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Customer Due Receive Report(POS)</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
		<button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	        <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Date</th>
						<th>Customer Name</th>
						<th style="text-align:right">Amount</th>
						<th>Note</th>
						<th>Entry By</th>
	                </tr>
	            </thead>
	            <tbody>

	                 <?php
					   $sql = "select c.customer_name, d.jv_date , d.cr_amt as amount, d.narration, u.name
					  from customer_info c, journal d, users u
					  where d.tr_from like 'Receipt' and c.id = d.customer_id and d.jv_date between '".$fdate."' and '".$tdate."' ".$con." and d.cr_amt > 0  and d.entry_by=u.user_id";

					  $s_details = $conn->query($sql);

                      while($data = $s_details->fetch_assoc()){

                ?>

	                <tr>
	                    <td><?php echo ++$sl; ?></td>
	                    <td><?php echo $data['jv_date']?></td>
						<td><?php echo $data['customer_name']?></td>
						<td style="text-align:right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
						<td><?php echo $data['narration'];?></td>
						<td><?php echo $data['name'];?></td>
	                </tr>
	                <?php } ?>
	            </tbody>
	            <tfoot>
	                <th style="text-align:right" colspan="2">Total</th>
	                <td></td>
	                <td style="text-align:right"><?php echo number_format($tot_amt); ?></td>
	            </tfoot>

	        </table>
	    </div>
	</div>

	<?php } ?>


<?php if($_REQUEST['master_report']==1205) { 

if($_POST['dealer_code']!=''){
		  $con .=' and m.dealer_code="'.$_POST['dealer_code'].'"';
	}

if($_POST['brand']!=''){
  $con .=' and i.brand="'.$_POST['brand'].'"';
}

?>

<div class="row">
   <div class="col-12 text-center">
	   <h3><u>Customer Due Receive Report(POS)</u></h3>
	   <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
   </div>

   <div class="col-12">
   <button id="btnExport" onClick="fnExcelReport()">Export to xls</button>
	   <table border="1" class="theTable" width="100%" cellpadding="5" cellspacing="0">
		   <thead>
			   <tr>
				   <th>Sl</th>
				   <th>Date</th>
				   <th>Customer Name</th>
				   <th style="text-align:right">Amount</th>
				   <th>Note</th>
				   <th>Entry By</th>
			   </tr>
		   </thead>
		   <tbody>

				<?php
				  $sql = "select c.customer_name, d.jv_date , d.cr_amt as amount, d.narration, u.name
				 from customer_info c, journal d, users u
				 where d.tr_from like 'Receipt' and c.id = d.customer_id and d.jv_date between '".$fdate."' and '".$tdate."' ".$con." and d.cr_amt > 0  and d.entry_by=u.user_id";

				 $s_details = $conn->query($sql);

				 while($data = $s_details->fetch_assoc()){

		   ?>

			   <tr>
				   <td><?php echo ++$sl; ?></td>
				   <td><?php echo $data['jv_date']?></td>
				   <td><?php echo $data['customer_name']?></td>
				   <td style="text-align:right"><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
				   <td><?php echo $data['narration'];?></td>
				   <td><?php echo $data['name'];?></td>
			   </tr>
			   <?php } ?>
		   </tbody>
		   <tfoot>
			   <th style="text-align:right" colspan="2">Total</th>
			   <td></td>
			   <td style="text-align:right"><?php echo number_format($tot_amt); ?></td>
		   </tfoot>

	   </table>
   </div>
</div>

<?php } ?>


	



	<?php if($_REQUEST['master_report']==2) { ?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Delivery Report Product Wise</u></h3>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">

	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Product Name</th>
	                    <th>Unit</th>
	                    <th>Rate</th>
	                    <th>Qty</th>
	                    <th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	                 <?php  $sql ="select m.*,d.* from sales_master m ,sales_order d where m.s_no=d.s_no  and m.s_no=".$_REQUEST['s_no']."";
	                 $s_details = $conn->query($sql);
                		while($data = $s_details->fetch_assoc()){
                    	$sl++;
                ?>
	                <tr>
	                    <td><?php echo $sl; ?></td>

	                    <td><?php echo find_a_field('item_info','item_name','item_id='.$data['item_id']) ?></td>
	                    <td><?php echo find_a_field('item_info','uom','item_id='.$data['item_id'])  ?></td>
	                    <td><?php echo $data['rate'];  ?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
	                    <td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>

	            <tfoot>
	                <th colspan="4">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>
	        </table>
	    </div>
	</div>

	<?php } ?>



	



	



	<?php if($_REQUEST['master_report']==3) { ?>
	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Purchase Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>
	    <div class="col-12">
	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Purchase No</th>
						 <th>Purchase Date</th>
	                    <th>Supplier Name</th>
	                    <th>Product Name</th>
						<th>Color</th>
	                    <th>Qty</th>
	                    <th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	                 <?php  $sql="select m.*,sum(d.qty) qty ,sum(d.amount) amount , i.item_name, i.item_code, s.supplier_name,d.color
	                 from purchase_master m ,purchase_order d , item_info i, supplier_info s
	                 where m.purchase_no=d.purchase_no and m.purchase_date between '".$fdate."' and '".$tdate."' and i.item_id=d.item_id and s.id=m.supplier_id  group by d.id order by m.purchase_no,i.item_id "; 

	                 $s_details = $conn->query($sql);
                while($data = $s_details->fetch_assoc()){
                    $sl++;

                ?>
	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><a href="master_report.php?master_report=4&purchase_no=<?php echo $data['purchase_no']?>" target="_blank"  ><?php echo $data['purchase_no']; ?></a></td>
						<td><?php echo date('d-m-Y',strtotime($data['purchase_date']));  ?></td>
	                     <td><?php echo $data['supplier_name'];  ?></td>
	                     <td><?php echo  $data['item_code'].' - '.$data['item_name'];  ?></td>
						 <td><?php echo find_a_field('color_list','color','id='.$data['color']);  ?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
	                    <td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>

	            <tfoot>
	                <th colspan="5">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>
	        </table>
	    </div>
	</div>
	<?php } ?>

	<?php if($_REQUEST['master_report']==444) { ?>
	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Purchase Return Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>
	    <div class="col-12">
	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Purchase No</th>
						 <th>Purchase Date</th>
	                    <th>Supplier Name</th>
	                    <th>Product Name</th>
	                    <th>Qty</th>
						<th>Damage Qty</th>
						<th>Total Qty</th>
	                    <th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	                 <?php  $sql="select m.*,sum(d.qty) qty , sum(d.damage_qty) damage_qty,sum(d.amount) amount , i.item_name, s.supplier_name
	                 from purchase_return_master m ,purchase_return_details d , item_info i, supplier_info s
	                 where m.purchase_no=d.purchase_no and m.purchase_date between '".$fdate."' and '".$tdate."' and i.item_id=d.item_id and s.id=m.supplier_id and m.status = 'COMPLETED'  group by d.id order by m.purchase_no,i.item_id "; 

	                 $s_details = $conn->query($sql);
                while($data = $s_details->fetch_assoc()){
                    $sl++;

                ?>
	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><a href="master_report.php?master_report=4&purchase_no=<?php echo $data['purchase_no']?>" target="_blank"  ><?php echo $data['purchase_no']; ?></a></td>
						<td><?php echo date('d-m-Y',strtotime($data['purchase_date']));  ?></td>
	                     <td><?php echo $data['supplier_name'];  ?></td>
	                     <td><?php echo $data['item_name'];  ?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
						<td><?php echo number_format($data['damage_qty']); $tot_damage_qty +=$data['damage_qty']; ?></td>
						<td><?php echo number_format($tot = $data['damage_qty']+$data['qty']); $tot_all_qty +=$tot; ?></td>
	                    <td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>

	            <tfoot>
	                <th colspan="5">Total</th>
	                <td><?php echo number_format($tot_qty); ?></td>
					<td><?php echo number_format($tot_damage_qty); ?></td>
					<td><?php echo number_format($tot_all_qty); ?></td>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>
	        </table>
	    </div>
	</div>
	<?php } ?>

	



	



	<!--Expense Report Summary-->



<?php if($_REQUEST['master_report']==70421) { ?>
	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Expense Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Expense No</th>
	                    <th>Expense Date</th>
	                    <th>Particulars</th>
	                    <th>Details</th>
	                    <th>Amount</th>
	                </tr>
	            </thead>

	            <tbody>
	                 <?php  $sql="SELECT j.jv_no as expense_no,j.jv_date,l.ledger_name,concat(j.narration,'##',j.tr_type) as detail,sum(j.`dr_amt`) as amt 
	                 FROM `journal` j, ledger l 

	                 WHERE j.`tr_from` LIKE 'Expense' and l.ledger_id=j.ledger_id and j.`dr_amt`>0  and j.jv_date between '".$fdate."' and '".$tdate."' group by j.jv_no,j.jv_date "; 

	                 $s_details = $conn->query($sql);
                    while($data = $s_details->fetch_assoc()){
                    $sl++;
                ?>

	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><?php echo $data['expense_no']; ?></td>
	                    <td><?php echo $data['jv_date']; ?></td>
	                    <td><?php echo $data['ledger_name'];  ?></td>
	                    <td><?php echo $data['detail'];  ?></td>
	                    <td><?php echo number_format($data['amt']); $tot_amt +=$data['amt']; ?></td>
	                </tr>
	                <?php  } ?>
	            </tbody>

	            <tfoot>
	                <th colspan="5">Total</th>
	                <td><?php echo number_format($tot_amt); ?></td>
	            </tfoot>
	        </table>
	    </div>
	</div>
	<?php } ?>


	<?php if($_REQUEST['master_report']==70422) { ?>
	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Profit and Loss Report</u></h3>
	        <h4>Date:<?php echo $fdate.'-'.$tdate; ?></h4>
	    </div>

	    <div class="col-12">
	        <table border="1" class="basic-datatables text-center" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Voucher No</th>
	                    <th>Date</th>
	                    <th>Particulars</th>
	                    <th>Details</th>
	                    <th >Amount</th>
	                </tr>
	            </thead>

	            <tbody>
	                 <?php  $sql="SELECT j.jv_no as expense_no,j.jv_date,l.ledger_name,concat(j.narration,'##',j.tr_type) as detail,sum(j.`dr_amt`) as amt 
	                 FROM `journal` j, ledger l 

	                 WHERE j.`tr_from` LIKE 'Receipt' and l.ledger_id=j.ledger_id and j.`dr_amt`>0  and j.jv_date between '".$fdate."' and '".$tdate."' group by j.jv_no,j.jv_date "; 

	                 $s_details = $conn->query($sql);
                    while($data = $s_details->fetch_assoc()){
                    $sl++;
                ?>

	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><?php echo $data['expense_no']; ?></td>
	                    <td><?php echo $data['jv_date']; ?></td>
	                    <td><?php echo $data['ledger_name'];  ?></td>
	                    <td style="text-align:left"><?php echo $data['detail'];  ?></td>
	                    <td style="text-align:right"><?php echo number_format($data['amt']); $tot_amt +=$data['amt']; ?></td>
	                </tr>
	                <?php  } ?>
	            

					<tr>
						<th colspan="5" style="text-align:right">Total Income: </th>
						<th style="text-align:right"><?php echo number_format($tot_amt); ?></th>
					</tr>

                <!-- Expenses -->
						
					<tr>
						<th colspan="6" >Expenses</th>
					</tr>

					<?php  $sql="SELECT j.jv_no as expense_no,j.jv_date,l.ledger_name,concat(j.narration,'##',j.tr_type) as detail,sum(j.`dr_amt`) as amt 
	                 FROM `journal` j, ledger l 

	                 WHERE j.`tr_from` IN ('Payment', 'Expense') and l.ledger_id=j.ledger_id and j.`dr_amt`>0  and j.jv_date between '".$fdate."' and '".$tdate."' group by j.jv_no,j.jv_date "; 

	                 $s_details = $conn->query($sql);
                    while($data = $s_details->fetch_assoc()){
                    $sl++;
                ?>

	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><?php echo $data['expense_no']; ?></td>
	                    <td><?php echo $data['jv_date']; ?></td>
	                    <td><?php echo $data['ledger_name'];  ?></td>
	                    <td style="text-align:left"><?php echo $data['detail'];  ?></td>
	                    <td style="text-align:right"><?php echo number_format($data['amt']); $tot_exp_amt +=$data['amt']; ?></td>
	                </tr>
	                <?php  } ?>
	            

					<tr>
						<th colspan="5" style="text-align:right">Total Expenses: </th>
						<th style="text-align:right"><?php echo number_format($tot_exp_amt); ?></th>
					</tr>

					<tr style="background-color:yellow">
						<th colspan="5" style="text-align:right">Profit / Loss: </th>
						<th style="text-align:right"><?php echo number_format($tot_amt-$tot_exp_amt); ?></th>
					</tr>


				</tbody>
	        </table>
	    </div>
	</div>
	<?php } ?>



	



	



	<?php if($_REQUEST['master_report']==4) { ?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Purchase Report Product Wise</u></h3>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">

	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Product Name</th>
						<th>Color</th>
	                    <th>Unit</th>
	                    <th>Rate</th>
	                    <th>Qty</th>
	                    <th>Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	                 <?php  $sql ="select m.*,d.* from purchase_master m ,purchase_order d where m.purchase_no=d.purchase_no  and m.purchase_no=".$_REQUEST['purchase_no']."";
	            $s_details = $conn->query($sql);
                while($data = $s_details->fetch_assoc()){
                    $sl++;
                ?>



	                <tr>
	                    <td><?php echo $sl; ?></td>
	                    <td><?php echo find_a_field2('item_info','concat(item_code," - ",item_name)','item_id='.$data['item_id']) ?></td>
						<td><?php echo find_a_field('color_list','color','id='.$data['color'])?></td>
	                    <td><?php echo find_a_field('item_info','uom','item_id='.$data['item_id'])  ?></td>
	                    <td><?php echo $data['rate'];  ?></td>
	                    <td><?php echo number_format($data['qty']); $tot_qty +=$data['qty']; ?></td>
	                    <td><?php echo number_format($data['amount']); $tot_amt +=$data['amount']; ?></td>
	                </tr>



	                <?php } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="4">Total</th>



	                <td><?php echo number_format($tot_qty); ?></td>



	                <td><?php echo number_format($tot_amt); ?></td>



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>



	



	<?php if($_REQUEST['master_report']==10) {



	



	



	 if($_POST['customer_type']=='Registered' || $_POST['customer_type']=='Corporate'){



	   $con .=' and c.customer_type="'.$_POST['customer_type'].'"';



	 }



	



	



	?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Over Limit Party</u></h3>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>



	                    <th>Sl</th>



	                    <th>Party Name</th>



	                    <th>Credit Limit</th>



	                    <th>Current Balance</th>



						<th>Over Balance</th>



	                </tr>



	            </thead>



	            <tbody>



	                 <?php   $sql = "select c.*,sum(j.dr_amt-j.cr_amt) as total_receivable 



	                 from customer_info c, journal j 



	                 where c.ledger_id=j.ledger_id and c.status='Active' ".$con."  group by j.ledger_id";



											  $select =$conn->query($sql);



											 while($c_data = $select->fetch_assoc()){ 



											//  if($c_data['total_receivable']>$c_data['credit_limit']){



                ?>



	                <tr>



	                    <td><?php echo ++$sl; ?></td>



	                    <td><?php echo $c_data['business_name']."-".$c_data['customer_address'];  ?></td>



	                    <td><?php echo number_format($c_data['credit_limit']); $tot_qty +=$c_data['credit_limit']; ?></td>



	                    <td><?php echo number_format($c_data['total_receivable']); $tot_amt +=$c_data['total_receivable']; ?></td>



						<td><?php echo number_format($due=$c_data['total_receivable']-$c_data['credit_limit']); $tot_over_amt +=$due; ?></td>



	                    



	                </tr>



	                <?php } //} ?>



	            </tbody>



	            <tfoot>



	                <th colspan="2">Total</th>



	                <td><strong><?php echo number_format($tot_qty); ?></strong></td>



	                <td><strong><?php echo number_format($tot_amt); ?></strong></td>



					<td><strong><?php echo number_format($tot_over_amt); ?></strong></td>



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>



	



	<?php if($_REQUEST['master_report']==20) {



	 if($_POST['tr_type']=='Sales'){



	 



	  if($_POST['dealer_code']>0){



	   



	   $con = ' and m.dealer_code="'.$_POST['dealer_code'].'"';



	  



	  }



	  if($fdate!='' && $tdate!=''){



	   



	   $con .= ' and m.sales_date between "'.$fdate.'" and "'.$tdate.'"';



	  



	  }



	 ?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Party Wise Transaction Report</u></h3><br>



			<h4>Party Name : <strong><?=find_a_field('customer_info','business_name','id="'.$_POST['dealer_code'].'"')?></strong></h4><br>



			<h6>Date Period : <?=$fdate?> To  <?=$tdate?></h6>



	        



	    </div>



	    <div class="col-12">



		



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>
	                    <th>Sl</th>
	                    <th>Sales No.</th>
						<th>Sales Date</th>
	                    <th>Product name</th>
	                    <th>Rate</th>
						<th>Qty</th>
						<th>Amount</th>
	                </tr>



	            </thead>



	            <tbody>



	                 <?php    $sql = "select s.*,c.business_name,i.item_name 



	                 



	                 from sales_order s, sales_master m,item_info i,customer_info c 



	                 



	                 where s.s_no=m.s_no and c.id=m.dealer_code and s.item_id=i.item_id ".$con."";



											  $select =$conn->query($sql);



											 while($c_data = $select->fetch_assoc()){ 



											  



                ?>



	                <tr>



	                    <td><?php echo ++$sl; ?></td>



	                    <td><a href="sales_print_view.php?sale_no=<?php echo $c_data['s_no']  ?>" target="_blank"><?php echo $c_data['s_no'];  ?></a></td>



						<td><?php echo $c_data['s_date'];  ?></td>



						<td><?php echo $c_data['item_name'];  ?></td>



						<td><?php echo $c_data['rate'];  ?></td>



						<td><?php echo $c_data['qty'];  ?></td>



	                    <td><?php echo number_format($c_data['amount']); $tot_amt +=$c_data['amount']; ?></td>



	                    



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="6">Total</th>



	                



	                <td><?php echo number_format($tot_amt); ?></td>



	            </tfoot>



	            



	        </table>



			



			



			



	    </div>



	</div>



	<?php }elseif($_POST['tr_type']=='Purchase'){



	



	  if($_POST['supplier_code']>0){



	   



	   $con = ' and m.supplier_id="'.$_POST['supplier_code'].'"';



	  



	  }



	  if($fdate!='' && $tdate!=''){



	   



	   $con .= ' and m.purchase_date between "'.$fdate.'" and "'.$tdate.'"';



	  



	  }



	 ?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Supplier Wise Transaction Report</u></h3><br>



			<h4>Supplier Name  : <strong><?=find_a_field('supplier_info','supplier_name','id="'.$_POST['supplier_code'].'"')?></strong></h4><br>



			<h6>Date Period : <?=$fdate?> To  <?=$tdate?></h6>



	        



	    </div>



	    <div class="col-12">



		



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>
	                    <th>Sl</th>
	                    <th>PO No.</th>
						<th>PO Date</th>
	                    <th>Product name</th>
	                    <th>Rate</th>
						<th>Qty</th>
						<th>Amount</th>
	                </tr>



	            </thead>



	            <tbody>



	                 <?php    $sql = "select s.*,c.supplier_name,i.item_name from purchase_order s, purchase_master m,item_info i,supplier_info c where s.purchase_no=m.purchase_no and c.id=m.supplier_id and s.item_id=i.item_id ".$con."";



											  $select =$conn->query($sql);



											 while($c_data = $select->fetch_assoc()){ 



											  



                ?>



	                <tr>



	                    <td><?php echo ++$sl; ?></td>



	                    <td><?php echo $c_data['purchase_no'];  ?></td>



						<td><?php echo $c_data['purchase_date'];  ?></td>



						<td><?php echo $c_data['item_name'];  ?></td>



						<td><?php echo $c_data['rate'];  ?></td>



						<td><?php echo $c_data['qty'];  ?></td>



	                    <td><?php echo number_format($c_data['amount']); $tot_amt +=$c_data['amount']; ?></td>



	                    



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="6">Total</th>



	                



	                <td><?php echo number_format($tot_amt); ?></td>



	            </tfoot>



	            



	        </table>



			



			



			



	    </div>



	</div>



	



	<?php } }  ?>



	



	



	<?php if($_REQUEST['master_report']==22222) { 



	   if($fdate!='' && $tdate!=''){



	     $con = ' and j.journal_date between "'.$fdate.'" and "'.$tdate.'"';



	   }



	?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Transaction Report</u></h3>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>



	                    <th rowspan="2">Sl</th>



	                    <th rowspan="2">Date</th>



	                    <th colspan="5"><div align="center">Purchase</div></th>



						<th colspan="3"><div align="center">Sales</div></th>



	                   <th colspan="5"><div align="center">Expense</div></th>



					   



	                </tr>



					<tr>



					  <th>PO No.</th>



					  <th>Product Name</th>



					  <th>Qty</th>



					  <th>Rate</th>



					  <th>Amount</th>



					



					  <th>S No.</th>



					  <th>Product Name</th>



					  <th>Qty</th>



					  <th>Rate</th>



					  <th>Amount</th>



					



					  <th>Exp No.</th>



					  <th>Purpose</th>



					  



					  <th>Amount</th>



					</tr>



	            </thead>



	            <tbody>



	                 <?php   $trSql = "select j.* from journal_item j where 1 ".$con."";



											  $trsl =$conn->query($trSql);



											 while($tr_data = $trsl->fetch_assoc()){ 



											 $sql = "select * from journal_item where id='".$tr_data['id']."' and tr_from='Purchase'";



											 $p = $conn->query($sql);



											 $purchase = $p->fetch_assoc();



											 $s = $conn->query("select * from journal_item where id='".$tr_data['id']."' and tr_from='Sales'");



											 $sales = $s->fetch_assoc();



											 $e = $conn->query("select * from journal where jv_date='".$tr_data['journal_date']."' and tr_from='Expense' and dr_amt>0");



											 $expense = $e->fetch_assoc();



											 



                ?>



	                <tr>



	                    <td><?=++$sl; ?></td>



	                    <td><?=$tr_data['journal_date'];?></td>



						<td><?=$purchase['tr_no'];?></td>



						<td><?=find_a_field('item_info','item_name','item_id="'.$purchase['item_id'].'"');?></td>



						<td><?=$purchase['item_in'];?></td>



						<td><?=$purchase['rate'];?></td>



						<td><?=$purchase['item_in']*$purchase['rate'];?></td>



						<td><?=$sales['tr_no'];?></td>



						<td><?=find_a_field('item_info','item_name','item_id="'.$sales['item_id'].'"');?></td>



						<td><?=$sales['item_ex'];?></td>



						<td><?=$sales['rate'];?></td>



						<td><?=$sales['item_in']*$sales['rate'];?></td>



						<td><?=$expense['jv_no'];?></td>



						<td><?=find_a_field('ledger','ledger_name','ledger_id="'.$expense['ledger_id'].'"')?></td>



						<td><?=$expense['dr_amt'];?></td>



	                    



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="2">Total</th>



	                <td><?php echo number_format($tot_qty); ?></td>



	                <td><?php echo number_format($tot_amt); ?></td>



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>



	



	



	<?php if($_REQUEST['master_report']==30) { 



	   if($fdate!='' && $tdate!=''){



	     $con = ' and j.jv_date between "'.$fdate.'" and "'.$tdate.'"';



	   }



	   



	   if($_POST['dealer_code']>0){



	   //$party_ledger = find_a_field('customer_info','ledger_id','id="'.$_POST['dealer_code'].'"');



	   $con .= ' and c.id="'.$_POST['dealer_code'].'"';



	   



	   $party = "Party Name : ".find_a_field('customer_info','concat(business_name,"-",customer_address)','id="'.$_POST['dealer_code'].'"')."";



	  



	  }



	  



	  if($_POST['tr_type']!=''){



	   $con .=' and j.tr_from="'.$_POST['tr_type'].'"';



	 }



	  



	?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Transaction Summary Report</u></h3>



			<h4>Date : <?=$fdate?> To <?=$tdate?> </h4><br>



			<h4><?=$party?></h4>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>



	                    <th>Sl</th>



	                    <th>Date</th>



	                    <th><div align="center">Party</div></th>



						<th><div align="center">Particular</div></th>



	                   <!--<th><div align="center">Item Name</div></th>



					   <th><div align="center">Qty</div></th>-->



					   <th><div align="center">Narration</div></th>



					   



					   <th><div align="center">Opening Balance.</div></th>



					   <th><div align="center">Amount</div></th>



					   <th><div align="center">Final Amount</div></th>



					   </tr>



					 </thead>



	            <tbody>



	                 <?php    $trSql = "select j.*,concat(c.business_name,'-',c.customer_address) as party_name 



	                 



	                 from journal j, customer_info c 



	                 



	                 where 1 ".$con." and j.group_for = '".$_SESSION['group_for']."' and c.ledger_id=j.ledger_id  group by j.tr_no, j.jv_no order by j.jv_date asc";



											  $trsl =$conn->query($trSql);



											  



											  $op=find_a_field('journal j,customer_info c','sum(j.dr_amt-j.cr_amt)','c.id="'.$_POST['dealer_code'].'" and j.group_for = '.$_SESSION['group_for'].' and c.ledger_id=j.ledger_id  and j.jv_date < "'.$fdate.'"');



											 while($tr_data = $trsl->fetch_assoc()){ 



											if($tr_data['tr_from']=='Sales'){



											$particular = 'Sales';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Sales"');



											$sales = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Sales"');



										    $sales_total = $sales_total+$sales;



											



											}

											

											elseif($tr_data['tr_from']=='Receipt'){



											$particular = 'Collection';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Receipt" ');



											$collection = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Receipt"');



											$collection_total = $collection_total+$collection;



											}

											

											elseif($tr_data['tr_from']=='Discount'){



											$particular = 'Discount';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Discount"');



											$discount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Discount"');



											$discount_total = $discount_total+$discount;



											}

											

											

											

											elseif($tr_data['tr_from']=='Advance'){



											$particular = 'Advance';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Advance"');



											$advance = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Advance"');



											$advance_total = $advance_total+$advance;



											}

											

											elseif($tr_data['tr_from']=='Opening Due'){



											$particular = 'Opening Due';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Opening Due"');



											$opening = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Opening Due"');



											$opening_total = $opening_total+$opening;



											}elseif($tr_data['tr_from']=='Opening Advance'){



											$particular = 'Opening Advance';



											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Opening Advance"');



											$opening_advanve = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and group_for = '.$_SESSION['group_for'].' and tr_from="Opening Advance"');



											$opening_advanve_total = $opening_advanve_total+$opening_advanve;



											}



											



											 



											//$balance = find_a_field('journal','sum(dr_amt-cr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Discount"');



                ?>



	                <tr>



	                    <td><?=++$sl; ?></td>



	                    <td><?=$tr_data['jv_date'];?></td>



						<td><?=$tr_data['party_name'];?></td>



						<td><?=$particular;?></td>



						<td align="right">



						    



						     <?php



						   if($tr_data['tr_from']=='Sales'){



						   $sql = 'select o.s_no,i.item_name,o.qty,o.rate,o.amount from sales_order o,item_info i where o.item_id=i.item_id and  o.s_no="'.$tr_data['tr_no'].'"'; 



						   $dt = $conn->query($sql);



						   while($do = $dt->fetch_assoc()){



						    echo '<a href="sales_print_view.php?sale_no='.$do['s_no'].'" target="_blank">'.$do['item_name'].'-'.$do['qty'].'-'.$do['rate'].'-'.$do['amount'].'</a>';



							echo '<br>';



						   } } 



						   



						   else {



						       echo $tr_data['narration']; 



						   }



						 ?>



						    



						    



						    </td>



						    



						 <td align="right"> 



						 



						 



						 <?php



					 echo $op;



					 ?>



						 



				



						 



						 </td>



						<td align="right"><?=$amount; $tot_qty+=$amount;?></td>



						<td align="right"><?php 



						   if($particular=='Sales'){



						      $final_amt = $op+$amount;



						   }elseif($particular=='Opening Due'){



						      $final_amt = $op+$amount;



						   }else{ $final_amt = $op-$amount;}



						



						     echo $final_amt;





						   



						   $op=$final_amt;



						?></td>



						



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="7">Party Balance</th>



	                <?php // $total = number_format(($sales_total+$advance_total)-($collection_total+$discount_total),2);



					//  if($total<0){



					 //  echo abs($total);



					 // }else{



					//  echo $total;



					//  }



					 ?>



					 <td align="right"><strong><?=number_format($final_amt,2)?></strong></td>



	                



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>



	



	



	



	<?php if($_REQUEST['master_report']==40) { 
	   if($fdate!='' && $tdate!=''){
	     $con = ' and date(j.entry_at)<= "'.$tdate.'"';
	   }

	   if($_POST['dealer_code']>0){
	   $con .= ' and c.id="'.$_POST['dealer_code'].'"';

	  }


	  if($_POST['item_id']>0){
	   $con .=' and j.item_id="'.$_POST['item_id'].'"';
	   $item = "Item Name : ".find_a_field('item_info','item_name','item_id="'.$_POST['item_id'].'"')."";

	  }


	   if($_POST['brand']!=''){
	   $con .=' and i.brand="'.$_POST['brand'].'"';
	  }

	?>

	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Product Stock Report</u></h3><br>
			<h4>Date : <?=$fdate?> To <?=$tdate?> </h4><br>
			<h4><?=$item?></h4>
	    </div>

	    <div class="col-12">
	        <table border="1" width="50%" cellpadding="5" cellspacing="0" style="margin:auto;">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Product Name</th>
						<th>Unit Name</th>
	                    <th><div align="center">Final Stock</div></th>
					</tr>
				</thead>

	            <tbody>
	                 <?php   $trSql = "select sum(j.item_in-j.item_ex) as final_stock,i.item_name,i.uom from journal_item j, item_info i 
					 where 1 ".$con." and i.item_id=j.item_id  group by j.item_id"; 

							$trsl =$conn->query($trSql);
							while($tr_data = $trsl->fetch_assoc()){ 
							//$balance = find_a_field('journal','sum(dr_amt-cr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Discount"');
                	?>

	                <tr>
	                    <td><?=++$sl; ?></td>
	                    <td><?=$tr_data['item_name'];?></td>
						<td><?=$tr_data['uom'];?></td>
						<td align="right"><?=$tr_data['final_stock'];?></td>
	                </tr>

	                <?php  } ?>

	            </tbody>
	        </table>
	    </div>
	</div>

	<?php } ?>



	



		<?php if($_REQUEST['master_report']==50) { 



	   if($fdate!='' && $tdate!=''){$con = ' and j.jv_date between "'.$fdate.'" and "'.$tdate.'"';}



	   if($_POST['supplier_code']>0){
	   //$party_ledger = find_a_field('customer_info','ledger_id','id="'.$_POST['dealer_code'].'"');
	   $con .= ' and c.id="'.$_POST['supplier_code'].'"';
	   $party = "Supplier Name : ".find_a_field('supplier_info','supplier_name','id="'.$_POST['supplier_code'].'"')."";

	  }


	   if($_POST['tr_type']!=''){
	   $con .=' and j.tr_from="'.$_POST['tr_type'].'"';
	 }


	?>



	<div class="row">
	    <div class="col-12 text-center">
	        <h3><u>Transaction Summary Report (Supplier)</u></h3>
			<h4>Date : <?=$fdate?> To <?=$tdate?> </h4><br>
			<h4><?=$party?></h4>
	    </div>

	    <div class="col-12">
	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">
	            <thead>
	                <tr>
	                    <th>Sl</th>
	                    <th>Date</th>
	                    <th><div align="center">Party</div></th>
						<th><div align="center">Particular</div></th>
	                  <th><div align="center">Details</div></th>
					   <!-- <th><div align="center">Qty</div></th>-->
					   <th><div align="center">Opening</div></th>
					   <th><div align="center">Amount</div></th>
					   <th><div align="center">Final Amount</div></th>
					   </tr>
					 </thead>
	            <tbody>
	                 <?php   $trSql = "select j.*,c.supplier_name from journal j, supplier_info c 
	                 where 1 ".$con." and c.ledger_id=j.ledger_id  order by j.jv_date";
											  $trsl =$conn->query($trSql);
											  $op=find_a_field('journal j,supplier_info c','sum(j.cr_amt-j.dr_amt)','c.id="'.$_POST['supplier_code'].'" and c.ledger_id=j.ledger_id  and j.jv_date < "'.$fdate.'"');

											 while($tr_data = $trsl->fetch_assoc()){ 
											if($tr_data['tr_from']=='Purchase'){
											$particular = 'Purchase';
											$amount = find_a_field('journal','sum(cr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Purchase"');
											$sales = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Purchase"');
										    $sales_total = $sales_total+$sales;
											
											
											}elseif($tr_data['tr_from']=='Payment'){
											$particular = 'Payment';
											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Payment"');
											$collection = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Payment"');
											$collection_total = $collection_total+$collection;
											
											}elseif($tr_data['tr_from']=='Purchase Return'){
											$particular = 'Purchase Return';
											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Purchase Return"');
											$collection = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Purchase Return"');
											$collection_total = $collection_total+$collection;
											
											
											}elseif($tr_data['tr_from']=='Discount'){
											$particular = 'Discount';
											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Discount"');
											$discount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Discount"');
											$discount_total = $discount_total+$discount;
											
											
											}elseif($tr_data['tr_from']=='Advance'){
											$particular = 'Advance';
											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Advance"');
											$advance = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Advance"');
											$advance_total = $advance_total+$advance;
											
											
											}elseif($tr_data['tr_from']=='Due'){
											$particular = 'Due';
											$amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Due"');
											$opening = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Due"');
											$opening_total = $opening_total+$opening;
											}




											



											 



											//$balance = find_a_field('journal','sum(dr_amt-cr_amt)','jv_no="'.$tr_data['jv_no'].'" and tr_from="Discount"');



                ?>



	                <tr>



	                    <td><?=++$sl; ?></td>



	                    <td><?=$tr_data['jv_date'];?></td>



						<td><?=$tr_data['supplier_name'];?></td>



						<td><?=$particular;?></td>



						



					<td>



						 <?



						   if($particular=='Purchase'){



						       



						        if($fdate!='' && $tdate!=''){



                    	     $con = ' and m.purchase_date between "'.$fdate.'" and "'.$tdate.'"';



                    	   }



						   $sql = "select j.tr_no,i.item_name,j.item_in,j.rate



						   from   item_info i, journal_item j



						   



						   where  i.item_id=j.item_id  and j.tr_no='".$tr_data['tr_no']."' and j.tr_from='Purchase'"; 



						   



						   $dt = $conn->query($sql);



						   while($do = $dt->fetch_assoc()){



						    echo $do['tr_no']."-".$do['item_name']."-Qty-".$do['item_in']."-Rate-".$do['rate'];



							echo '<br>';



						   } } 



						   



						   



						   else{



						       echo $tr_data['narration'];



						   } 



						 ?>



						</td>



						



						



						



						



						<td align="right">



						 



						   <?php   



						        echo $op;



						    ?>







						   



						</td>



						



						<td align="right"><?=$amount; $tot_qty+=$amount;?></td>



						



						<td align="right"><?php 
						    $tr_data['tr_from'];

						   if($tr_data['tr_from'] =='Purchase'){
						      $final_amt = $op+$amount;
						   }elseif($tr_data['tr_from']=='Due'){
						      $final_amt = $op+$amount;
						    }else{
						      $final_amt = $op-$amount;
						   }


						     echo $final_amt;
						   $op=$final_amt;



						?></td>



						



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="6">Supplier Balance</th>



	                <td align="right"><strong><?php $total = number_format(($sales_total+$advance_total)-($collection_total+$discount_total),2);



					 // if($total<0){



					  // echo abs($total).' (Advance)';



					 // }else{



					  echo $total;



					 // }



					 ?></strong></td>



					 <td align="right"><strong><?=number_format($final_amt,2)?></strong></td>



	                



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>
	
	
	
<?php if($_REQUEST['master_report']==240821) { 



	   if($fdate!='' && $tdate!=''){



	     $con = ' and j.jv_date between "'.$fdate.'" and "'.$tdate.'"';



	   }



	   



	   if($_POST['donar_id']>0){



	   //$party_ledger = find_a_field('customer_info','ledger_id','id="'.$_POST['dealer_code'].'"');



	   $con .= ' and c.donar_id="'.$_POST['donar_id'].'"';



	   $party = "Donar Name : ".find_a_field('donar_info','donar_name','donar_id="'.$_POST['donar_id'].'"')."";



	  



	  }



	  



	   if($_POST['tr_type']!=''){



	   $con .=' and j.tr_from="'.$_POST['tr_type'].'"';



	 }



	  



	?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Give Loan Summary Report</u></h3>



			<h4>Date : <?=$fdate?> To <?=$tdate?> </h4><br>



			<h4><?=$party?></h4>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>



	                    <th>Sl</th>



	                    <th>Date</th>



	                    <th><div align="center">Donar Name</div></th>



						<th><div align="center">Particular</div></th>



	                  <th><div align="center">Details</div></th>



					   <!-- <th><div align="center">Qty</div></th>-->



					   <th><div align="center">Opening</div></th>



					   <th><div align="center">Amount</div></th>



					   <th><div align="center">Final Amount</div></th>



					   </tr>



					 </thead>



	            <tbody>



	                 <?php    $trSql = "select j.*,c.donar_name 
					 
					 
					 from journal j, donar_info c 


	                 where 1 ".$con." and c.ledger_id=j.ledger_id  and j.tr_from='Loan' order by j.jv_date";



											  $trsl =$conn->query($trSql);



											  $op=find_a_field('journal j,donar_info c','sum(j.cr_amt-j.dr_amt)','c.donar_id="'.$_POST['donar_id'].'" and c.ledger_id=j.ledger_id  and j.jv_date < "'.$fdate.'" and j.tr_from="Loan"');



											 while($tr_data = $trsl->fetch_assoc()){ 



											if($tr_data['tr_from']=='Loan'){



											$particular = 'Loan';


											
											$cr_amount = find_a_field('journal','sum(cr_amt)','jv_no="'.$tr_data['jv_no'].'" and ledger_id="'.$tr_data['ledger_id'].'" and tr_from="Loan"');
											$dr_amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and ledger_id="'.$tr_data['ledger_id'].'" and tr_from="Loan"');



										    $dr_amt_total = $dr_amt_total_total+$dr_amount;
											$cr_amt_total = $cr_amt_total_total+$cr_amount;



											}

                ?>



	                <tr>



	                    <td><?=++$sl; ?></td>
	                    <td><?=$tr_data['jv_date'];?></td>
						<td><?=$tr_data['donar_name'];?></td>
						

						<td>
						 <?
						   if($cr_amount>0){
						       echo 'Loan Take';
						   } else{
						   		echo 'Loan Return';
						   }

						 ?>



						</td>
						<td><?php if($particular=="Loan") echo $tr_data['narration'];?></td>
						<td align="right">
						   <?php   
						        echo $op;
						    ?>
						</td>
						<td align="right"><?php if($cr_amount>0) { echo $cr_amount; $tot_qty+=$cr_amount; }else{ echo $dr_amount; $tot_qty+=$dr_amount;}  ?></td>



						



						<td align="right"><?php 
						    $tr_data['tr_from'];

						   if($cr_amount>0){
						      $final_amt = $op-$cr_amount;
						   }//elseif($tr_data['tr_from']=='Due'){
//						      $final_amt = $op+$amount;
//						    }
							else{
						      $final_amt = $op+$dr_amount;
						   }


						     echo $final_amt;
						   $op=$final_amt;



						?></td>



						



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="6">Company Balance</th>



	                <td align="right"><strong><?php $total = number_format($sales_total,2);



					 // if($total<0){



					  // echo abs($total).' (Advance)';



					 // }else{



					  echo $total;



					 // }



					 ?></strong></td>



					 <td align="right"><strong><?=number_format($final_amt,2)?></strong></td>



	                



	            </tfoot>



	            



	        </table>



	    </div>



	</div>



	<?php } ?>
	
	
	
	<?php if($_REQUEST['master_report']==250821) { 



	   if($fdate!='' && $tdate!=''){



	     $con = ' and j.jv_date between "'.$fdate.'" and "'.$tdate.'"';



	   }



	   



	   if($_POST['donar_id']>0){



	   //$party_ledger = find_a_field('customer_info','ledger_id','id="'.$_POST['dealer_code'].'"');



	   $con .= ' and c.donar_id="'.$_POST['donar_id'].'"';



	   $party = "Donar Name : ".find_a_field('donar_info','donar_name','donar_id="'.$_POST['donar_id'].'"')."";



	  



	  }



	  



	   if($_POST['tr_type']!=''){



	   $con .=' and j.tr_from="'.$_POST['tr_type'].'"';



	 }



	  



	?>



	<div class="row">



	    <div class="col-12 text-center">



	        <h3><u>Give Loan Summary Report</u></h3>



			<h4>Date : <?=$fdate?> To <?=$tdate?> </h4><br>



			<h4><?=$party?></h4>



	        



	    </div>



	    <div class="col-12">



	        <table border="1" class="basic-datatables" width="100%" cellpadding="5" cellspacing="0">



	            <thead>



	                <tr>



	                    <th>Sl</th>



	                    <th>Date</th>



	                    <th><div align="center">Donar Name</div></th>



						<th><div align="center">Particular</div></th>



	                  <th><div align="center">Details</div></th>



					   <!-- <th><div align="center">Qty</div></th>-->



					   <th><div align="center">Opening</div></th>



					   <th><div align="center">Amount</div></th>



					   <th><div align="center">Final Amount</div></th>



					   </tr>



					 </thead>



	            <tbody>



	                 <?php    $trSql = "select j.*,c.donar_name 
					 
					 
					 from journal j, donar_info c 


	                 where 1 ".$con." and c.ledger_id=j.ledger_id  and j.tr_from='Give Loan' order by j.jv_date";



											  $trsl =$conn->query($trSql);



											  $op=find_a_field('journal j,donar_info c','sum(j.dr_amt-j.cr_amt)','c.donar_id="'.$_POST['donar_id'].'" and c.ledger_id=j.ledger_id  and j.jv_date < "'.$fdate.'" and j.tr_from="Give Loan"');



											 while($tr_data = $trsl->fetch_assoc()){ 



											if($tr_data['tr_from']=='Give Loan'){



											$particular = 'Give Loan';


											
											$cr_amount = find_a_field('journal','sum(cr_amt)','jv_no="'.$tr_data['jv_no'].'" and ledger_id="'.$tr_data['ledger_id'].'" and tr_from="Give Loan"');
											$dr_amount = find_a_field('journal','sum(dr_amt)','jv_no="'.$tr_data['jv_no'].'" and ledger_id="'.$tr_data['ledger_id'].'" and tr_from="Give Loan"');



										    $dr_amt_total = $dr_amt_total_total+$dr_amount;
											$cr_amt_total = $cr_amt_total_total+$cr_amount;



											}

                ?>



	                <tr>



	                    <td><?=++$sl; ?></td>
	                    <td><?=$tr_data['jv_date'];?></td>
						<td><?=$tr_data['donar_name'];?></td>
						

						<td>
						 <?
						   if($dr_amount>0){
						       echo 'Give Loan';
						   } else{
						   		echo 'Loan Receive';
						   }

						 ?>



						</td>
						
							<td><?php if($particular=="Give Loan") echo $tr_data['narration'];?></td>
						<td align="right">
						   <?php   
						        echo $op;
						    ?>
						</td>
						<td align="right"><?php if($dr_amount>0) { echo $dr_amount; $tot_qty+=$dr_amount; }else{ echo $cr_amount; $tot_qty+=$cr_amount;}  ?></td>



						



						<td align="right"><?php 
						    $tr_data['tr_from'];

						   if($dr_amount>0){
						      $final_amt = $op+$dr_amount;
						   }//elseif($tr_data['tr_from']=='Due'){
//						      $final_amt = $op+$amount;
//						    }
							else{
						      $final_amt = $op-$cr_amount;
						   }


						     echo $final_amt;
						   $op=$final_amt;



						?></td>



						



	                    



	                </tr>



	                <?php  } ?>



	            </tbody>



	            <tfoot>



	                <th colspan="6">Donar Balance</th>



	                <td align="right"><strong><?php $total = number_format($sales_total,2);



					 // if($total<0){



					  // echo abs($total).' (Advance)';



					 // }else{



					  echo $total;



					 // }



					 ?></strong></td>



					 <td align="right"><strong><?=number_format($final_amt,2)?></strong></td>



	                



	            </tfoot>



	            



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

</body>



</html>







