<?php 
  session_start();
include ('../common/library.php');
include ('../common/helper.php');    

$item_id= $_GET['barcode'];
$item_id = find_a_field('item_info','item_id','item_code="'.$item_id.'"');
if($item_id>0){
$item_price = find_a_field('item_info','price','item_id="'.$item_id.'"');

	 $max_order_no = find_a_field('pos_sale_detail','max(sequence)','sale_date="'.date('Y-m-d').'"');
	 if($max_order_no>0){
		  $order_no = $max_order_no+1;
		 }else{
			  $order_no = 1;
			 }
	
	
$customer = '';
$qty = '0';
$pure_amt = '';
$tax_amount = '';
$discount = '';
$warehouse_id = $_SESSION['warehouse'];
$group_for = $_SESSION['group_from'];
if($_SESSION['pos_sale_no']==0 || $_SESSION['pos_sale_no']==''){
$sale_no= $_SESSION['pos_sale_no']=date('Ymd').$order_no;
$sequence = $_SESSION['sequence']=$order_no;
}else{
	$sale_no = $_SESSION['pos_sale_no'];
	$sequence = $_SESSION['sequence'];
	}
$overall_stock = find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$item_id.'" and warehouse="'.$_SESSION['warehouse'].'"');
if($overall_stock>0){
//$sql = 'insert into pos_sale_detail set sequence="'.$sequence.'",sale_no="'.$sale_no.'",item_id="'.$item_id.'",rate="'.$item_price.'",qty="1",pure_amt="'.$item_price.'",grand_total="'.$item_price.'",sale_date="'.date('Y-m-d').'",entry_by="'.$_SESSION['user_id'].'",entry_at="'.date('Y-m-d H:i:s').'",warehouse="'.$warehouse_id.'",group_for="'.$group_for.'"';

$sql = 'insert into pos_sale_detail set sequence="'.$sequence.'",sale_no="'.$sale_no.'",item_id="'.$item_id.'",rate="'.$item_price.'",qty="1",pure_amt="0",grand_total="0",sale_date="'.date('Y-m-d').'",entry_by="'.$_SESSION['user_id'].'",entry_at="'.date('Y-m-d H:i:s').'",warehouse="'.$warehouse_id.'",group_for="'.$group_for.'"';
$insert = $conn->query($sql);

if($_SESSION['pos_sale_no']>0 && $custmer>0){
$update_master = $conn->query('update pos_sale_detail set customer="'.$custmer.'" where sale_no="'.$_SESSION['pos_sale_no'].'"');
}
}
}
?>

<div class="card">
	
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
$getitem = $conn->query('select p.id,p.item_id,i.item_name,i.item_code,p.rate,p.qty,p.pure_amt,p.discount,p.color from pos_sale_detail p, item_info i where i.item_id=p.item_id and p.sale_no="'.$_SESSION['pos_sale_no'].'"');
while($data=$getitem->fetch_assoc()){
	if (strlen($data['item_name']) > 15)
   $item_name = substr($data['item_name'], 0, 15) . '..';
   $stock = find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$data['item_id'].'" and warehouse="'.$_SESSION['warehouse'].'" and color="'.$data['color'].'"');
   $un_del_stock = find_a_field('pos_sale_detail','sum(qty)','item_id="'.$data['item_id'].'" and warehouse="'.$_SESSION['warehouse'].'" and status in ("MANUAL","HOLD","PENDING") and color="'.$data['color'].'"');
   $stock = $stock-$un_del_stock;
?>
<tr>
	<td style="padding: 0.2rem;"><?=$item_name?>-<?=$data['item_code']?></td>
    <td style="padding: 0.2rem;"><span id="color_stock<?=$data['id']?>"><?=$stock?></span></td>
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
			<var class="price"><span id="pure<?=$data['id']?>"><?=$data['rate']?></span></var> 
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
