<?php 
include ('../common/library.php');
include ('../common/helper.php');

$invoice_no = $_GET['sale_no'];?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Invoice No: <?=$invoice_no?></title>
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<script src="/cdn-cgi/apps/head/Bx0hUCX-YaUCcleOh3fM_NqlPrk.js"></script>
<link rel="stylesheet" href="theme.css" type="text/css" />
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<link rel="stylesheet" href="print.css" type="text/css" />
<style type="text/css" media="all">
body { color: #000; }
#wrapper { max-width: 480px;; margin: 0 auto; padding-top: 20px; }
.btn { border-radius: 0; margin-bottom: 5px; }
.bootbox .modal-footer { border-top: 0; text-align: center; }
h3 { margin: 5px 0; }
.order_barcodes img { float: none !important; margin-top: 5px; }
@media print {
.no-print { display: none; }
#wrapper { max-width: 480px; width: 100%; min-width: 250px; margin: 0 auto; }
.no-border { border: none !important; }
.border-bottom { border-bottom: 1px solid #ddd !important; }
table tfoot { display: table-row-group; }
}
</style>
</head>
<?php
    $sql = "SELECT * FROM pos_sale_detail WHERE sale_no = '$invoice_no'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);
?>
<body>
<div id="wrapper">
<div id="receiptData">
<div id="receipt-data">
<div class="text-center">
<!-- <img src=""> -->

<h3>
RBD.Reliance-রিলায়েন্স </h3>
<p>Shop#5, 1st Floor, Rose Valley Shopping Mall, 29, Rangking Street, Wari, Dhaka-1203 <br>
Tel: 01603444265
<br>
VAT Registration No: 
<br>
Invoice No: <?=$invoice_no;?> <br></p>
</div>
<p>Date: <?php echo $row->entry_at;?><br>
Sales Associate: <?php echo find_a_field('users','name','user_id='.$row->entry_by);?><br>
Customer: <?php echo find_a_field('customer_info','customer_name','id='.$row->customer);?> </p>
<div style="clear:both;"></div>
<table class="table table-condensed">
<thead>
    <tr>
        <th>SL &nbsp;&nbsp; Description &nbsp;&nbsp; Quantity x Price - Discount</th>
        <th>Sub Total</th>
    </tr>
</thead>    
<tbody>
    <?php 
        $sql_d = "SELECT d.*, i.item_name,i.item_code,i.uom FROM pos_sale_detail d, item_info i WHERE i.item_id=d.item_id and d.sale_no = '$invoice_no'";
        $result_d = mysqli_query($conn, $sql_d);
        $i = 1;
        while($row_d = mysqli_fetch_object($result_d)){
            $color = find_a_field('color_list','color','id='.$row_d->color);
    ?>
    
    <tr>
        <td class="no-border border-bottom">
        <small># <?=$i++?>: &nbsp;&nbsp;<?=$row_d->item_code;?>-<?=$row_d->item_name;?>-<?=$color;?>-<?=$row_d->uom;?> </small> <?=$row_d->qty; $total_qty += $row_d->qty;?> X <?=number_format($row_d->rate,2);?> (-<? if($row_d->discount>0) 
        echo $row_d->discount; $total_dis+=$row_d->discount; ?>) </td>
        <td class="no-border border-bottom text-right">tk<?=number_format($row_d->grand_total,2); $sub+=$row_d->grand_total;?></td>
    </tr>
    <?php } ?>

</tbody>
<tfoot>
<tr>
<th>Total Item(s): <?=$total_qty;?></th>
<th style="text-align:left "></th>
</tr>
<tr>
<th>Sub Total</th>
<th class="text-right">tk<?=number_format($sub,2);?></th>
</tr>
</tr>
<tr>
    <th>Tax</th>
    <th class="text-right">tk<?=$tax = find_a_field('pos_discount_vat','vat_amt','sale_no='.$invoice_no);?></th>
</tr>
<tr>
    <th>Grand Total</th>
    <th class="text-right">tk<?=number_format($total = $sub+$tax,2) ?></th>
</tr>
<tr>
    <th>Total Discount</th>
    <th class="text-right">tk<?=number_format($total_dis,2) ?></th>
</tr>
<tr>
<th>Paid Amount</th>
<th class="text-right">tk<?=number_format($paid = find_a_field('pos_payment_info','grand_total','sale_no='.$invoice_no),2);?></th>
</tr>
<tr>
<th>Paid By:</th>
<th class="text-right"><?=find_a_field('pos_payment_info','payment_mode','sale_no='.$invoice_no);?></th>
</tr>
<tr>
<th>Account Note: <?=find_a_field('pos_payment_info','payment_note','sale_no='.$invoice_no);?></th>
<th style="font-weight: normal;text-align: right;"></th>
</tr>
</tfoot>
</table>
<p class="text-center"> ধন্যবাদ , আবার আসবেন।</p>
</div>
<div style="clear:both;"></div>
</div>
<div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
<hr>
<span class="pull-right col-xs-12">
<button onclick="window.print();" class="btn btn-block btn-primary">Print</button> </span>
<div style="clear:both;"></div>
<div class="col-xs-12" style="background:#F5F5F5; padding:10px;">
<p style="font-weight:bold;">
Please don't forget to disble the header and footer in browser print settings.
</p>
<p style="text-transform: capitalize;">
<strong>FF:</strong> File &gt; Print Setup &gt; Margin &amp; Header/Footer Make all --blank--
</p>
<p style="text-transform: capitalize;">
<strong>chrome:</strong> Menu &gt; Print &gt; Disable Header/Footer in Option &amp; Set Margins to None
</p>
</div>
<div style="clear:both;"></div>
</div>
</div>
<script src="https://dshop.drestora.com/assets/dist/js/print/jquery-2.0.3.min.js"></script>
<script src="https://dshop.drestora.com/assets/dist/js/print/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
window.print();
});
</script>
</body>
</html>