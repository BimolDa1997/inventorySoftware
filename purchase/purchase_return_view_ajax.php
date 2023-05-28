<?php
session_start();
 //include ('../common/library.php');  
 //include '../db/db.php';
 
include "../lib/db/connection.php";
include ('../common/helper.php');

 

	//include 'database.php';
	$sql = $conn->query("SELECT * FROM purchase_return_details where group_for=".$_SESSION['group_for']." and purchase_no=".$_SESSION['purchase_no']."");
	//$result = $conn->query($sql);
	
		while($dt = $sql->fetch_assoc()) {
		$stock = find_a_field('journal_item','sum(item_in-item_ex)',' warehouse="'.$_SESSION['warehouse'].'" and item_id ='.$dt['item_id']);
		$damage_stock = find_a_field('damage_item','sum(item_in-item_ex)',' warehouse="'.$_SESSION['warehouse'].'" and item_id ='.$dt['item_id']);
		$uom   = find_a_field('item_info','uom','item_id='.$dt['item_id']);
		$srate = find_a_field('journal_item','rate',' warehouse="'.$_SESSION['warehouse'].'" and tr_from in ("Opening","Purchase")  and item_id ='.$dt['item_id'].' order by journal_date desc');
?>	
		<tr>
			<td><select name="item_name_<?=$dt['id'];?>"  class="form-control form-control" id="item_name_<?=$dt['id'];?>" onchange="edit(<?=$dt['id'];?>)">
				 <option></option>
				<? $itm = $conn->query("select * from item_info where status='Active'");
                    while($item = $itm->fetch_assoc()){
					?>
					<option <?=($dt['item_id']==$item['item_id'])? 'selected':''?> value="<?=$item['item_id']?>"><?=$item['item_name']?></option>
                     <? } ?>
				</select><input type="hidden" name="update_id_<?=$dt['id'];?>" id="update_id_<?=$dt['id'];?>" value="<?=$dt['id'];?>" />
				<input type="hidden" name="purchase_no" id="purchase_no" value="<?=$_SESSION['purchase_no'];?>" /></td>

		<td>
			<input type="hidden"  name="color_<?=$dt['id'];?>"  class="form-control" id="color_<?=$dt['id'];?>" value="<?=$dt['color'];?>" />
			<input type="text"   class="form-control" value="<?=find_a_field('color_list','color','id='.$dt['color']);?>">
		</td>	
			<td><input type="text"  name="stock_<?=$dt['id'];?>"  class="form-control form-control" id="stock_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=$stock?>"  readonly=""></td>
			<td><input type="text"  name="damage_stock_<?=$dt['id'];?>"  class="form-control form-control" id="damage_stock_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=$damage_stock?>" readonly="" ></td>
			
			<td><input type="text"  name="unit_<?=$dt['id'];?>"  class="form-control form-control" id="unit_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=$uom?>" required></td>
	<td><input type="text"  name="rate_<?=$dt['id'];?>"  class="form-control form-control" id="rate_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<? if($dt['rate']>0) echo $dt['rate']; else echo $srate;?>" required></td>
			<td><input type="text"  name="qty_<?=$dt['id'];?>"  class="form-control form-control" id="qty_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<?=$dt['qty'];?>" required></td>
			<td><input type="text"  name="damage_qty_<?=$dt['id'];?>"  class="form-control form-control" id="damage_qty_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<? if($dt['damage_qty']>0) echo $dt['damage_qty']; else echo  $damage_stock; ?>" required></td>
			<td><input type="text"  name="amount_<?=$dt['id'];?>" class="form-control form-control" id="amount_<?=$dt['id'];?>" value="<? if($dt['amount']>0) echo $dt['amount']; else echo ($srate*$damage_stock);?>" required></td>
			<td><input type="button" name="edit_<?=$dt['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?=$dt['id'];?>" ></td>
			<td><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>
			
			
			
				
			
		</tr>
<?php	
	}
	
	
	//mysqli_close($conn);
?>
 
