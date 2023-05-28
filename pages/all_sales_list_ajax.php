<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$inv_no = $_GET['inv_no'];
$sfdate = $_GET['sfdate'];
$stdate = $_GET['stdate'];
if($inv_no>0){
	$con = ' and p.sale_no="'.$inv_no.'"';
	}
if($sfdate!='' && $stdate!=''){
	 $con = ' and p.sale_date between "'.$sfdate.'" and "'.$stdate.'"';
	}

?>

	<table class="table table-bordered">
    <thead>
      <tr>
        <td colspan="5">
        <level>From :</level><input type="date" name="sfdate" id="sfdate" value="<?=$sfdate?>">
        <level> To :</level> <input type="date" name="stdate" id="stdate" value="<?=$stdate?>"><br>
        <level>Invoice No :</level> <input type="text" name="invoice_no" id="invoice_no" value="<?=$inv_no?>">
        <button id="sfilter" type="button" name="sfileter" onClick="get_sales_list()">Search</button></td>
      </tr>
      <tr>
        <th>Sale Noo</th> 
        <th>Qty</th>
        <th>Total Amount</th>
        <th>Customer</th>
        <th>Action</th>
      </tr>
    </thead>
   
    <tbody> 
    
      <?
	    
        $hold_sql = $conn->query('select sale_no,sum(qty) as qty,sum(grand_total) as total,c.customer_name from pos_sale_detail p left join customer_info c on c.id=p.customer where 1 and p.status!="HOLD" '.$con.' group by p.sale_no');
		 while($hold_data=$hold_sql->fetch_assoc()){ ?>
      <tr>
        <td><?=$hold_data['sale_no']?></td>
        <td><?=$hold_data['qty']?></td>
        <td><?=$hold_data['total']?></td>
        <td><?=$hold_data['customer_name']?></td>
        <td><input type="hidden" name="hold_sale_no" id="hold_sale_no" value="<?=$hold_data['sale_no']?>"><input type="submit" name="unhold" id="unhold" value="Edit" class="btn btn-info"></td>
      </tr>
      <? } ?>
      
    </tbody>
   
  </table>	