<?php
session_start();
 //include ('../common/library.php');  
 //include '../db/db.php';
 
include "../lib/db/connection.php";
include ('../common/helper.php');

 

	//include 'database.php';
	$sql = $conn->query("SELECT * FROM purchase_order where group_for=".$_SESSION['group_for']." and purchase_no=".$_SESSION['purchase_no']."");
	//$result = $conn->query($sql);
	
		while($dt = $sql->fetch_assoc()) {
		$stock = find_a_field('journal_item','sum(item_in-item_ex)',' warehouse="'.$_SESSION['warehouse'].'" and color = "'.$dt['color'].'" and item_id ='.$dt['item_id']);
		$uom   = find_a_field('item_info','uom','item_id='.$dt['item_id']);
?>	
		<tr>
			<!--<td><?=$dt['item_id'];?></td>
			<td>&nbsp;</td>
			<td><?=$dt['unit'];?></td>
			<td><?=$dt['qty'];?></td>
			<td><?=$dt['rate'];?></td>
			<td><?=$dt['amount'];?></td>
			<td colspan="2"><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>-->
			
			
			<td><input name="item_name_<?=$dt['id'];?>" type="hidden"  id="item_name_<?=$dt['id'];?>" value="<?=$dt['item_id']?>" />
				<?=find_a_field2('item_info','concat(item_code,"-",item_name)','item_id='.$dt['item_id']);?>

				<input type="hidden" name="update_id_<?=$dt['id'];?>" id="update_id_<?=$dt['id'];?>" value="<?=$dt['id'];?>" />
				<input type="hidden" name="purchase_no" id="purchase_no" value="<?=$_SESSION['purchase_no'];?>" /></td>
			<td>
				<input name="color_<?=$dt['id'];?>"  id="color_<?=$dt['id'];?>" type="hidden" value="<?=$dt['color'];?>" />
				<?=find_a_field2('color_list','color','id='.$dt['color']);?>
			</td>	
			<td><input type="text"  name="stock_<?=$dt['id'];?>"  class="form-control form-control" id="stock_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=$stock?>" readonly></td>
			<td><input type="text"  name="unit_<?=$dt['id'];?>"  class="form-control form-control" id="unit_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=$uom?>" required></td>
			<td><input type="text"  name="rate_<?=$dt['id'];?>"  class="form-control form-control" id="rate_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<?=$dt['rate'];?>" required></td>
			<td><input type="text"  name="qty_<?=$dt['id'];?>"  class="form-control form-control" id="qty_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<?=$dt['qty'];?>" required></td>
			<td><input type="text"  name="amount_<?=$dt['id'];?>" class="form-control form-control" id="amount_<?=$dt['id'];?>" value="<?=$dt['amount'];?>" required></td>
			<td><input type="button" name="edit_<?=$dt['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?=$dt['id'];?>" ></td>
			<td><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>
			
			
			
				
			
		</tr>
<?php	
	}
	
	
	//mysqli_close($conn);
?>
 
