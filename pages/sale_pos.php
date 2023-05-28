<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$page_name="Pos";  

include ('../common/library.php');
include ('../common/helper.php');

//include ('../template/header.php'); 
//include ('../template/sidebar.php');

if($_GET['lineDel']>0){
	$del = $conn->query('delete from pos_sale_detail where id="'.$_GET['lineDel'].'"');
}
	
	
	if(isset($_POST['completed'])){
		 
		 $find_sql = $conn->query('select * from pos_sale_detail where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 while($get_data=$find_sql->fetch_assoc()){
			 $jinsert = $conn->query('insert into journal_item set journal_date="'.$get_data['sale_date'].'",warehouse="'.$_SESSION['warehouse'].'",item_id="'.$get_data['item_id'].'",color="'.$get_data['color'].'",rate="'.$get_data['rate'].'",item_ex="'.$get_data['qty'].'",tr_no="'.$get_data['sale_no'].'",tr_from="Sales",group_for="'.$_SESSION['group_for'].'",entry_by="'.$_SESSION['user_id'].'",entry_at="'.date('Y-m-d H:i:s').'"');
			 }
		 
		 $update = $conn->query('update pos_sale_detail set status="CHECKED" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 $sale_no = $_SESSION['pos_sale_no'];
		 unset($_SESSION['pos_sale_no']);
		 unset($_SESSION['sequence']);
		 $url = 'invoice_print.php?sale_no='.$sale_no;
		 //header('location:'.$url.'');
     echo "<script>window.open('".$url."','_blank');</script>";
		}
		
		if(isset($_POST['hold'])){
		 
		 $hold = $conn->query('update pos_sale_detail set status="HOLD" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 unset($_SESSION['pos_sale_no']);
		 unset($_SESSION['sequence']);
		
		}
		
		if(isset($_POST['reset'])){
		 unset($_SESSION['pos_sale_no']);
		 unset($_SESSION['sequence']);
		 header('location:sale_pos.php');
		}
		
		if(isset($_POST['unhold'])){
		 $_SESSION['pos_sale_no'] = $_POST['hold_sale_no'];
		 $unhold = $conn->query('update pos_sale_detail set status="MANUAL" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		
		}
		
		if(isset($_POST['sales_edit'])){
		 $_SESSION['pos_sale_no'] = $_POST['sales_no_for_edit'];
		 $unhold = $conn->query('update pos_sale_detail set status="MANUAL" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 header('location:sale_pos.php');
		}
		
		if(isset($_POST['cancel'])){
		 
		 $delete = $conn->query('delete from pos_sale_detail where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 $del = $conn->query('delete from pos_payment_info where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 $del2 = $conn->query('delete from pos_discount_vat where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 unset($_SESSION['pos_sale_no']);
		 unset($_SESSION['sequence']);
		 header('location:sale_pos.php');
		
		}
		
		if(isset($_POST['payment_save'])){
			$payment_mode = $_POST['payment_mode'];
			$pay_sql = $conn->query('select p.sale_no,sum(p.pure_amt) as sub_total,sum(grand_total) as total,sum(p.discount) as discount,sum(v.vat_amt) as total_vat,c.customer_name,c.id as cid from pos_sale_detail p left join customer_info c on c.id=p.customer left join pos_discount_vat v on v.sale_no=p.sale_no where 1 and p.sale_no="'.$_SESSION['pos_sale_no'].'" group by p.sale_no');
		 $pay_data=$pay_sql->fetch_assoc();
		 $del = $conn->query('delete from pos_payment_info where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 $pay_insert = $conn->query('insert into pos_payment_info set sale_no="'.$_SESSION['pos_sale_no'].'",customer="'.$pay_data['customer'].'",sub_total="'.$pay_data['sub_total'].'",vat_amt="'.$pay_data['total_vat'].'",discount_amt="'.$pay_data['discount'].'",grand_total="'.$pay_data['total'].'",payment_mode="'.$payment_mode.'", paid_amount="'.$_POST['paid_amount'].'", due_amount="'.$_POST['due_amount'].'", entry_by="'.$_SESSION['user_id'].'",entry_at="'.date('Y-m-d H:i:s').'",payment_note="'.$_POST['payment_note'].'"');
		 
		 $max_jv_no = find_a_field('journal','max(jv_no)','1')+1;
		 if($payment_mode=='Cash'){
			 $debit_ledger = '1000007';
			 }elseif($payment_mode=='Bank'){
				 $debit_ledger = '1000008';
				 }elseif($payment_mode=='Nagad'){
				 $debit_ledger = '1000267';
				 }elseif($payment_mode=='Bkash'){
				 $debit_ledger = '1000268';
				 }
				 $credit_ledger = '1000259';
				 $delete = $conn->query('delete from journal where tr_no="'.$_SESSION['pos_sale_no'].'" and tr_from="POS Collection"');
		 $dr = $conn->query('insert into journal set jv_no="'.$max_jv_no.'",jv_date="'.date('Y-m-d').'",ledger_id="'.$debit_ledger.'",dr_amt="'.$_POST['paid_amount'].'",narration="Pos Sales Collection",tr_from="POS Collection",tr_no="'.$_SESSION['pos_sale_no'].'",customer_id="'.$pay_data['cid'].'",group_for="'.$_SESSION['group_for'].'",entry_at="'.date('Y-m-d H:i:s').'",entry_by="'.$_SESSION['user_id'].'"');
		 
		 $cr = $conn->query('insert into journal set jv_no="'.$max_jv_no.'",jv_date="'.date('Y-m-d').'",ledger_id="'.$credit_ledger.'",cr_amt="'.$_POST['paid_amount'].'",narration="Pos Sales Collection",tr_from="POS Collection",tr_no="'.$_SESSION['pos_sale_no'].'",customer_id="'.$pay_data['cid'].'",group_for="'.$_SESSION['group_for'].'",entry_at="'.date('Y-m-d H:i:s').'",entry_by="'.$_SESSION['user_id'].'"');
		 
		 
		 $find_sql = $conn->query('select * from pos_sale_detail where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 while($get_data=$find_sql->fetch_assoc()){
			 $jinsert = $conn->query('insert into journal_item set journal_date="'.$get_data['sale_date'].'",warehouse="'.$_SESSION['warehouse'].'",item_id="'.$get_data['item_id'].'",color="'.$get_data['color'].'",rate="'.$get_data['rate'].'",item_ex="'.$get_data['qty'].'",tr_no="'.$get_data['sale_no'].'",tr_from="Sales",group_for="'.$_SESSION['group_for'].'",entry_by="'.$_SESSION['user_id'].'",entry_at="'.date('Y-m-d H:i:s').'"');
			 }
		 
		 $update = $conn->query('update pos_sale_detail set status="CHECKED" where sale_no="'.$_SESSION['pos_sale_no'].'"');
		 $sale_no = $_SESSION['pos_sale_no'];
		 unset($_SESSION['pos_sale_no']);
		 unset($_SESSION['sequence']);
		 $url = 'invoice_print.php?sale_no='.$sale_no;
     echo "<script>window.open('".$url."','_blank');</script>";
	 
			/*$msg = '<span style="color:green; font-size:16px; font-weight:bold">Payment Success</span>';*/
			}
		
	$data_sql = 'select * from pos_sale_detail where sale_no="'.$_SESSION['pos_sale_no'].'"';
	$all_sql = $conn->query($data_sql);
	$all=$all_sql->fetch_assoc();
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">
<title>RBD POS</title>
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logos/squanchy.jpg" >
<link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/squanchy.jpg">
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/squanchy.jpg">
<!-- jQuery -->
<!-- Bootstrap4 files-->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/> 
<link href="assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
<link href="assets/css/OverlayScrollbars.css" type="text/css" rel="stylesheet"/>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Font awesome 5 -->
<style>
	.avatar {
  vertical-align: middle;
  width: 35px;
  height: 35px;
  border-radius: 50%;
}
.bg-default, .btn-default{
	background-color: #f2f3f8;
}
.btn-error{
	color: #ef5f5f;
}
</style>
<!-- custom style -->
</head>
<body>
<section class="header-main">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2">
	<div class="brand-wrap">
        
		<img class="logo" src="assets/images/logos/squanchy.jpg">
		<h2 class="logo-text">RBD POS&nbsp;<?=$msg?></h2>
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-2 col-sm-3">
		<!--<form action="#" class="search-wrap">-->
			<div class="input-group">
			    <input type="text" id="search_box" name="search_box" class="form-control" placeholder="Search" onChange="search_item(this.value);">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		<!--</form>--> <!-- search-wrap .end// -->
	</div>
    <div class="col-lg-3 col-sm-3">
  <input type="hidden" name="customer_id" id="customer_id" value="<? if($all['customer']>0) echo $all['customer']; else echo '73'?>">
  <input type="text" name="cname" id="cname" class="form-control" list="cstmr" value="<? if($all['customer']>0) echo find_a_field('customer_info','customer_name','id="'.$all['customer'].'"'); else echo 'Walk-in Customer#01XXXXXXXXXXX';?>" placeholder="Enter Customer">
  <datalist id="cstmr">
  <?php
   $sql = $conn->query('select concat(customer_name,"|",mobile_no) as customer from customer_info where 1');
   while($customer=$sql->fetch_assoc()){
	   echo '<option>'.$customer['customer'].'</option>';
	   }
  ?>
  </datalist>
  </div>
  <div class="col-lg-2 col-sm-2">
  <input type="number" name="cphone" id="cphone" class="form-control" value="<?=find_a_field('customer_info','mobile_no','id="'.$all['customer'].'"')?>" placeholder="Phone Number"><span id="cmsg"></span>
 
  </div>
  <div class="col-lg-1 col-sm-1">
  <input type="submit" name="new_customer" id="new_customer" value="Save" class="btn btn-info" onClick="add_customer();">
  </div>
    <div class="col-lg-1 col-sm-3">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
            <a href="./sales_list.php" target="_blank" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-list"></i></a>
			</div> 
			
		</div>	
	</div>
    <div class="col-lg-1 col-sm-3">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
            <a href="./index.php" target="_blank" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-home"></i></a>
			</div> 
			
		</div>	
	</div>
</div>
	</div> 
</section>


<section class="section-content padding-y-sm bg-default ">
<div class="container-fluid">
<div class="row">
	<div class="col-md-6 card padding-y-sm card ">
		<ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
	<li class="nav-item">
		<button class="nav-link active show" data-toggle="pill" type="button" name="ctBtn" id="ctBtn" onClick="getItem(999)" style="border:0px;">All&nbsp;<i class="fa fa-tags"></i></button></li>
        <?php
         $get_cat = $conn->query('select * from category_info where 1');
		 while($cat = $get_cat->fetch_assoc()){
		?>
	<li class="nav-item">
		
		<button type="button" data-toggle="pill" class="nav-link" name="ctBtn" id="ctBtn" onClick="getItem(<?=$cat['id']?>)" style="border:0px;"><?=$cat['category']?>&nbsp;<i class="fa fa-tags "></i></button></li>
	    <?php
		 }
		?>
</ul>
<span   id="items">
<div class="row">
  
 <?php
         $item_sql = $conn->query('select * from item_info where 1');
		 while($item = $item_sql->fetch_assoc()){
			 $img = find_a_field('item_photo','item_photo','item_id="'.$item['item_id'].'"');
			 $overall_stock = find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$item['item_id'].'" and warehouse="'.$_SESSION['warehouse'].'"');
		?>
    <div class="col-md-5">
      <figure class="card card-product">
        <div class="img-wrap"> 
          <img src="../files/item/<?=$img?>">
        </div>
        <figcaption class="info-wrap">
          <a href="#" class="title"><?=$item['item_name']?>-<?=$item['item_code']?></a>
          <div class="action-wrap">
          <?
           if($overall_stock>0){
		  ?>
            <button type="button" name="ctBtn" id="ctBtn" class="btn btn-primary btn-sm float-right" onClick="addItem(<?=$item['item_id']?>)" style="border:0px;"><i class="fa fa-cart-plus"></i></button>
            <? } else{?>
             <button type="button" name="ctBtn" id="ctBtn" class="btn btn-primary btn-sm float-right" style="border:0px;">Stock Out</button>
            <? } ?>
            <div class="price-wrap h5">
              <span class="price-new"><?=$item['price']?></span>
            </div> <!-- price-wrap.// -->
          </div> <!-- action-wrap -->
        </figcaption>
      </figure> <!-- card // -->
    </div> <!-- col // -->
 
 <?php } ?>
</div>
</span>
 <!-- row.// -->


	</div>
    
<div class="col-md-6">

 <!--<fieldset style="border: 2px solid;
    background: burlywood;
    padding: 5%;">
<legend>Customer Info&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="cmsg" style="color:green; font-size:30px; font-weight:bold;"></span></legend>-->

<div class="row">
	<div class="col-md-12">
		<input type="text" name="barcode_item" id="barcode_item" class="form-control" placeholder="Barcode Scanner" onKeyUp="barcode_finder(this.value);" style="background:honeydew;">
	</div>
</div>
  <!--<div class="row">
  <div class="col-md-4">
  <input type="submit" name="new_customer" id="new_customer" value="+ Add" class="btn btn-info" onClick="add_customer();" style="margin-top:5px;">
  </div>
  </div>-->
<!--</fieldset>-->
<div class="card" style="overflow: scroll;">
<span id="cartss">	
<table class="table" style="font-size:10px;padding: 0.2rem;">
<thead class="text-muted">
<tr>
  <th style="padding: 0.2rem;" scope="col">Item</th>
  <th style="padding: 0.2rem;" scope="col" width="120">Stock</th>
  <th style="padding: 0.2rem;" scope="col" width="120">Qty</th>
  <th style="padding: 0.2rem;" scope="col" width="120">Color</th>
  <th style="padding: 0.2rem;" scope="col" width="120">Price</th>
  <th style="padding: 0.2rem;" scope="col" width="100">Discount</th>
  <th style="padding: 0.2rem;" scope="col" class="text-right" width="100">Delete</th>
</tr>
</thead>
<tbody>
<?php
$getitem = $conn->query('select p.id,i.item_name,p.rate,p.qty,p.pure_amt,p.discount,p.color from pos_sale_detail p, item_info i where i.item_id=p.item_id and p.sale_no="'.$_SESSION['pos_sale_no'].'"');
while($data=$getitem->fetch_assoc()){
	if (strlen($data['item_name']) > 15)
   $item_name = substr($data['item_name'], 0, 15) . '..';
?>
<tr>
	<td style="padding: 0.2rem;"><?=$item_name?></td>
	<td style="padding: 0.2rem;" class="text-center"> 
		<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
			<button type="button" class="m-btn btn m-btn btn btn-sm" onClick="minusQty(<?=$data['id']?>)"><i class="fa fa-minus"></i></button>
			<button type="button" class="m-btn btn m-btn btn btn-sm"><span id="showQty<?=$data['id']?>"><?=$data['qty']?></span></button>
			<button type="button" class="m-btn btn m-btn btn btn-sm" onClick="plusQty(<?=$data['id']?>)"><i class="fa fa-plus"></i></button>
		</div>
	</td>
    <td style="padding: 0.2rem;">
      <select name="color<?=$data['id']?>" id="color<?=$data['id']?>" style="width: 80px;" class="" onChange="color_change(<?=$data['id']?>)">
      <option></option>
       <?php
   $color_sql = $conn->query('select c.id,c.color from item_photo i, color_list c where i.color=c.id and i.item_id="'.$data['item_id'].'" group by i.color asc');
   while($color_data=$color_sql->fetch_assoc()){
	   echo '<option '.($color_data['id']==$data['color']?' selected':'').' value="'.$color_data['id'].'">'.$color_data['color'].'</option>';
	   }
  ?>
      </select>
    </td>
	<td style="padding: 0.2rem;"> 
		<div class="price-wrap"> 
			<var class="price"><span id="pure<?=$data['id']?>"><?=$data['pure_amt']?></span></var> 
		</div> <!-- price-wrap .// -->
	</td>
    <td style="padding: 0.2rem;">
      <input type="text" name="item_discount<?=$data['id']?>" id="item_discount<?=$data['id']?>" onChange="itemDiscount(<?=$data['id']?>)" value="<?=$data['discount']?>" style="width:100%">
    </td>
	<td style="padding: 0.2rem;" class="text-right"> 
	<a href="?lineDel=<?=$data['id']?>" class="btn btn-outline-danger btn-sm"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
<?php } ?>
</tbody>
</table>
</span>
</div> <!-- card.// -->





<div class="box">
<dl class="dlist-align">
  <dt>Tax %: </dt>
  <dd class="text-right"><input type="text" name="vat_percent" id="vat_percent" class="form-control" onChange="vatCal(this.value)"></dd>
</dl>
<dl class="dlist-align">
  <dt>Tax Amount:</dt>
  <dd class="text-right"><span id="taxAmount">0</span></dd>
</dl>
<dl class="dlist-align">
  <dt>Discount:</dt>
  <dd class="text-right"><span id="showDiscount">0</span></dd>
</dl>
<dl class="dlist-align">
  <dt>Sub Total:</dt>
  <dd class="text-right"><span id="subTotal">0</span></dd>
</dl>
<dl class="dlist-align">
  <dt>Total: </dt>
  <dd class="text-right h4 b"><span id="grandTotal">0</span></dd>
</dl>
<form method="post">
<div class="row">
	<div class="col-md-3">
		<input type="submit" name="cancel" id="cancel" class="btn  btn-danger btn-lg btn-block" value="Cancel">
	</div>
	<div class="col-md-3">
		<input type="submit" name="hold" id="hold" class="btn  btn-warning btn-lg btn-block" value="Hold">
	</div>
    
    <div class="col-md-3">
		<button type="button" id="payment_button" class="btn  btn-info btn-lg btn-block" data-toggle="modal" data-target="#payment_modal" disabled>Payment</button>
	</div>
    
    <div class="col-md-3">
		<input type="submit" name="reset" id="reset" class="btn  btn-warning btn-lg btn-block" value="Reset">
	</div>
</div><br>

<div class="row">
<div class="col-md-12">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Hold List</button>
  
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#done_sale">All Sales</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Hold Sales List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <div class="modal-body">
          <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sale No</th>
        <th>Qty</th>
        <th>Total Amount</th>
        <th>Customer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?
        $hold_sql = $conn->query('select sale_no,sum(qty) as qty,sum(grand_total) as total,c.customer_name from pos_sale_detail p left join customer_info c on c.id=p.customer where 1 and p.status="HOLD" group by p.sale_no');
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
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  <div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Payment Info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <div class="modal-body">
          <table class="table table-bordered">
    
    <tbody>
      <?
        $pay_sql = $conn->query('select p.sale_no,sum(p.pure_amt) as sub_total,sum(grand_total) as total,sum(p.discount) as discount,sum(v.vat_amt) as total_vat,c.customer_name from pos_sale_detail p left join customer_info c on c.id=p.customer left join pos_discount_vat v on v.sale_no=p.sale_no where 1 and p.sale_no="'.$_SESSION['pos_sale_no'].'" group by p.sale_no');
		    $pay_data=$pay_sql->fetch_assoc();

        $payment_data = 'select * from pos_payment where sale_no="'.$_SESSION['pos_sale_no'].'"';
        $payment_sql = $conn->query($payment_data);
        if($payment_sql->num_rows>0)
          $payment_row = $payment_sql->fetch_object();
        
		  ?>
      <tr>
        <td>Customer</td>
        <td>:</td>
        <td><div id="pcustomer"><?=$pay_data['customer_name']?></div></td>
      </tr>
      <tr>
        <td>Sales No</td>
        <td>:</td>
        <td><div id="psale_no"><?=$pay_data['sale_no']?></div></td>
      </tr>
      <tr>
        <td>Sub Total</td>
        <td>:</td>
        <td><div id="psub_total"><?=$pay_data['sub_total']?></div></td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>:</td>
        <td><div id="pvat"><?=$pay_data['total_vat']?></div></td>
      </tr>
      <tr>
        <td>Discount</td>
        <td>:</td>
        <td><div id="pdiscount"><?=$pay_data['discount']?></div></td>
      </tr>
      <tr>
        <td>Payable.</td>
        <td>:</td>
        <td><div id="ptotal"><?=$pay_data['total']?><input type="text" name="payable_amtt" id="payable_amtt" value="<?=$pay_data['total']?>"></div></td>
      </tr>
      <tr>
        <td>Payment Type</td>
        <td>:</td>
        <td>
        <select name="payment_mode" id="payment_mode" class="form-control">            
         
         <option <?php if($payment_row->payment_mode=="Cash") echo 'selected' ;?>>Cash</option>
         <option <?php if($payment_row->payment_mode=="Bank") echo 'selected' ;?>>Bank</option>
         
         <option <?php if($payment_row->payment_mode=="Bkash") echo 'selected' ;?>>Bkash</option>
         <option <?php if($payment_row->payment_mode=="Nagad") echo 'selected' ;?>>Nagad</option>
        </select>
        </td>
      </tr>

      <tr>
        <td>Paid Amount</td>
        <td>:</td>
        <td><input type="text" name="paid_amount" id="paid_amount" 
        value="<? if($payment_row->paid_amount>0) echo $payment_row->paid_amount; else echo $pay_data['total'];?>" 
        class="form-control"></td>
      </tr>
      <tr>
        <td>Due Amount</td>
        <td>:</td>
        <td>
          <input type="text" name="due_amount" id="due_amount" value="<?php echo $payment_row->due_amount;?>" readonly class="form-control">
        </td>
      </tr>
      <!--this section just to help -->
      <tr>
        <td>Given Amount</td>
        <td>:</td>
        <td><input id="given_amount" name="given_amount" value=""  class="form-control" /></td>
      </tr>
      <tr>
        <td>Change Amount</td>
        <td>:</td>
        <td><div id="change_amount"></div></td>
        </tr>
        
        <tr>
        <td>Note</td>
        <td>:</td>
        <td><input type="text" name="payment_note" id="payment_note"></td>
        </tr>
      <tr>
        <td colspan="3"><input type="submit" name="payment_save" id="payment_save" value="Confirm Payment" class="btn btn-info"></td>
        
      </tr>
      
    </tbody>
  </table>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  <!--Completed Sales List-->
  <div class="modal fade" id="done_sale" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">All Sales List</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        
        <div class="modal-body">
        <span id="sales_list">
          <table class="table table-bordered">
    <thead>
      <tr>
        <td colspan="5">
        <level>From : </level><input type="date" name="sfdate" id="sfdate">
        <level> To : </level> <input type="date" name="stdate" id="stdate">&nbsp;<br>
        <level>Invoice No :</level> <input type="text" name="invoice_no" id="invoice_no">
        <button id="sfilter" type="button" name="sfileter" class="btn btn-info" onClick="get_sales_list()">Search</button></td>
      </tr>
      <tr>
        <th>Sale No</th>
        <th>Qty</th>
        <th>Total Amount</th>
        <th>Customer</th>
        <th>Action</th>
      </tr>
    </thead>
   
    <tbody>
    
      <?
	    
        $hold_sql = $conn->query('select sale_no,sum(qty) as qty,sum(grand_total) as total,c.customer_name from pos_sale_detail p left join customer_info c on c.id=p.customer where 1 and p.status!="HOLD" and p.sale_date="'.date('Y-m-d').'" group by p.sale_no');
		 while($hold_data=$hold_sql->fetch_assoc()){ ?>
      <tr>
        <td><?=$hold_data['sale_no']?></td>
        <td><?=$hold_data['qty']?></td>
        <td><?=$hold_data['total']?></td>
        <td><?=$hold_data['customer_name']?></td>
        <td><input type="hidden" name="sales_no_for_edit" id="sales_no_for_edit" value="<?=$hold_data['sale_no']?>"><input type="submit" name="sales_edit" id="sales_edit" value="Edit" class="btn btn-info"></td>
      </tr>
      <? } ?>
      
    </tbody>
   
  </table>
  </span>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  </div>
</div>


</form>


</div> 

	</div>
    
</div>
</div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/OverlayScrollbars.js" type="text/javascript"></script>
<script>
	$(function() {
	//The passed argument has to be at least a empty object or a object with your desired options
	//$("body").overlayScrollbars({ });
	$("#items").height(552);
	$("#items").overlayScrollbars({overflowBehavior : {
		x : "hidden",
		y : "scroll"
	} });
	$("#cart").height(445);
	$("#cart").overlayScrollbars({ });
});
</script>

<script>
/*Function for get item by category*/
function getItem(str) {
  if (str=="") {
    document.getElementById("items").innerHTML="Not Found";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("items").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getItem_ajax.php?catId="+str,true);
  xmlhttp.send();
}


/*Function for add item in the right side list*/
function addItem(str) {
  if (str=="") {
    //document.getElementById("cart").innerHTML="Not Found";
    return;
  }
  var customer = document.getElementById("customer_id").value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("cartss").innerHTML=this.responseText;
	  all_checker();
    }
  }
  xmlhttp.open("GET","addItem_ajax.php?item_id="+str+"&&customer="+customer,true);
  xmlhttp.send();
  
}

/*Function for plus qty*/
function plusQty(str) {
	var color = document.getElementById("color"+str).value;
  if (color=="") {
    alert('Please select color!')
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var parts = this.responseText.split('#');
      document.getElementById("showQty"+str).innerHTML=parts[0];
	  document.getElementById("color_stock"+str).innerHTML=parts[2];
	  if(parts[1]>0){
		  alert('Stock Out');
	  }
	  all_checker();
    }
  }
  xmlhttp.open("GET","plusQty_ajax.php?lineId="+str+"&&color="+color,true);
  xmlhttp.send();
  
}

/*Function for minus qty*/
function minusQty(str) {
  var color = document.getElementById("color"+str).value;
  if (color=="") {
    alert('Please select color!')
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var parts = this.responseText.split('#');
      document.getElementById("showQty"+str).innerHTML=parts[0];
	  document.getElementById("pure"+str).innerHTML=parts[1];
	  document.getElementById("color_stock"+str).innerHTML=parts[2];
	  all_checker();
    }
  }
  xmlhttp.open("GET","minusQty_ajax.php?lineId="+str+"&&color="+color,true);
  xmlhttp.send();
  
}


/*Function for amount check*/
function all_checker() {
  
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var parts = this.responseText.split('#');
      
	  document.getElementById("subTotal").innerHTML=parts[0];
	  document.getElementById("psub_total").innerHTML=parts[0];
	  document.getElementById("grandTotal").innerHTML=parts[1];
	  document.getElementById("ptotal").innerHTML=parts[1];
      document.getElementById("paid_amount").value=parts[1];
	  document.getElementById("showDiscount").innerHTML=parts[2];
	  document.getElementById("pdiscount").innerHTML=parts[2];
	  document.getElementById("taxAmount").innerHTML=parts[3];
	  document.getElementById("pvat").innerHTML=parts[3];
	  document.getElementById("pcustomer").innerHTML=parts[4];
	  document.getElementById("psale_no").innerHTML=parts[5];
	  if(parts[1]>0 && (parts[6]==0 || parts[6]=='')){
		  document.getElementById("payment_button").removeAttribute("disabled","");
		  }
		  
		  if(parts[6]>0){
		  document.getElementById("payment_button").setAttribute("disabled","disabled");
		  }
    }
  }
  xmlhttp.open("GET","allChecker_ajax.php",true);
  xmlhttp.send();
  
}


/*Function for item wise discount*/
function itemDiscount(str) {
	var discount = (document.getElementById("item_discount"+str).value)*1;
	
  if (str=="") {
    //document.getElementById("cart").innerHTML="Not Found";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		
      //document.getElementById("showDiscount").innerHTML=this.responseText;
	  
	  all_checker();
    }
  }
  xmlhttp.open("GET","itemDiscount_ajax.php?lineId="+str+"&&discount="+discount,true);
  xmlhttp.send();
  
}

/*Function for vat calculation*/
function vatCal(str) {
	
	
  if (str=="") {
    //document.getElementById("cart").innerHTML="Not Found";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		
      //document.getElementById("showDiscount").innerHTML=this.responseText;
	  
	  all_checker();
    }
  }
  xmlhttp.open("GET","vatCal_ajax.php?vat_percent="+str,true);
  xmlhttp.send();
  
}


/*Function for new customer*/
function add_customer() {
	
	
  var xmlhttp=new XMLHttpRequest();
  var cname1 = document.getElementById("cname").value;
  var cphone1 = document.getElementById("cphone").value;
  var cid1 = document.getElementById("customer_id").value;

  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
		var customer = this.responseText.split('::');
    document.getElementById("customer_id").value=customer[0];
	  document.getElementById("cname").value=customer[1];
	  document.getElementById("cphone").value=customer[2];
	  document.getElementById("cmsg").innerHTML=customer[3];
	  
	  
	  all_checker();
    }
  }
  xmlhttp.open("GET","add_customer_ajax.php?cname="+cname1+"&&cphone="+cphone1+"&&cid="+cid1,true);
  xmlhttp.send();
  
}

/*Function for Search Item*/
function search_item(str) {
	
	
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("items").innerHTML=this.responseText;
	  
	  //all_checker();
    }
  }
  xmlhttp.open("GET","item_search_ajax.php?ref="+str,true);
  xmlhttp.send();
  
}


/*Function for barcode*/
function barcode_finder(str) {
	
	
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("cartss").innerHTML=this.responseText;
	  document.getElementById("barcode_item").value='';
	  
	  all_checker();
    }
  }
  xmlhttp.open("GET","add_barcode_item_ajax.php?barcode="+str,true);
  xmlhttp.send();
  
}


/*Function for color change*/ 
function color_change(str) {
  if (str=="") {
    //document.getElementById("cart").innerHTML="Not Found";
    return;
  }
  
  
  var color = document.getElementById("color"+str).value;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.getElementById("color_stock"+str).innerHTML=this.responseText;
	  all_checker();
    }
  }
  xmlhttp.open("GET","color_change_ajax.php?lineId="+str+"&&color="+color,true);
  xmlhttp.send();
  
}

/*Function for due amount*/
$(document).ready(function(){
  $("#paid_amount").keyup(function(){
    var paid_amount = $("#paid_amount").val();
    var grandTotal = $("#ptotal").html();
    var due_amount = grandTotal - paid_amount;
    $("#due_amount").val(due_amount);
  });

  $("#given_amount").keyup(function(){
    var given_amount = $("#given_amount").val();
    var paid_amount = $("#paid_amount").val();
    var change_amount = given_amount - paid_amount;
    $("#change_amount").html(change_amount);
  });

});


function get_sales_list() {
  
    var inv_no = document.getElementById("invoice_no").value;
	var sfdate = document.getElementById("sfdate").value;
	var stdate = document.getElementById("stdate").value;
   
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
       document.getElementById("sales_list").innerHTML=this.responseText;
	  
    }
  }
  xmlhttp.open("GET","all_sales_list_ajax.php?inv_no="+inv_no+"&&sfdate="+sfdate+"&&stdate="+stdate,true);
  xmlhttp.send();
  
}


onload = addItem;
</script>
</body>
</html>