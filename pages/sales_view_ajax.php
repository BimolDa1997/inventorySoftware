<?php
session_start();
 include ('../common/library.php');  
 include ('../common/helper.php');  
 //include '../db/db.php';

 

	//include 'database.php';
	$sql = $conn->query("SELECT * FROM sales_order where s_no=".$_SESSION['sale_no']."");
	//$result = $conn->query($sql);
	
		while($dt = $sql->fetch_assoc()) {
		$unit = find_a_field('item_info','uom','item_id="'.$dt['item_id'].'"');
		$dealer_id = find_a_field('sales_master','dealer_code','s_no="'.$_SESSION['sale_no'].'"');
		
        $dealer_name = find_a_field('sales_master','dealer_name','s_no="'.$_SESSION['sale_no'].'"');
		$customer_address = find_a_field('sales_master','dealer_address','s_no="'.$_SESSION['sale_no'].'"');
		
?>	
		<tr>
			<!--<td><?=$dt['item_id'];?></td>
			<td>&nbsp;</td>
			<td><?=$dt['unit'];?></td>
			<td><?=$dt['qty'];?></td>
			<td><?=$dt['rate'];?></td>
			<td><?=$dt['amount'];?></td>
			<td colspan="2"><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>-->
			
			
			<td><input type="hidden" name="cdealername" id="cdealername" value="<? if($dealer_name!='') echo $dealer_name."<#>".$customer_address;?>" /><select name="item_name_<?=$dt['id'];?>"  class="form-control form-control" id="item_name_<?=$dt['id'];?>" onchange="edit(<?=$dt['id'];?>)">
				 <option></option>
				<? $itm = $conn->query("select * from item_info where status='Active'");
                    while($item = $itm->fetch_assoc()){
					?>
					<option <?=($dt['item_id']==$item['item_id'])? 'selected':''?> value="<?=$item['item_id']?>"><?=$item['item_name']?></option>
                     <? } ?>
				</select><input type="hidden" name="update_id_<?=$dt['id'];?>" id="update_id_<?=$dt['id'];?>" value="<?=$dt['id'];?>" />
				<input type="hidden" name="s_no" id="s_no" value="<?=$_SESSION['sale_no'];?>" /></td>
			<td><input type="text"  name="co_party_<?=$dt['id'];?>"  class="form-control form-control" id="co_party_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="" required></td>
			<td><input type="text"  name="stock_<?=$dt['id'];?>"  class="form-control form-control" id="stock_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<?=find_a_field('journal_item','sum(item_in-item_ex)','item_id="'.$dt['item_id'].'"')?>" required></td>
			<td><input type="text"  name="unit_<?=$dt['id'];?>" list="new_unit_<?=$dt['id'];?>"  class="form-control form-control" id="unit_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>)" value="<? if($dt['unit']!='') echo $dt['unit']; else  echo $unit;?>" required>
			<datalist id="new_unit_<?=$dt['id'];?>">
																	 <? 
																	  $s = $conn->query("select unit  as unit_name from sales_order where 1 group by unit");
																	  while($unit = $s->fetch_assoc()){
																	 ?>
                                                                        <option value="<?=$unit['unit_name']?>">
                                                                       <? } ?>
                                                                     </datalist> 
			</td>
			<td><input type="text"  name="rate_<?=$dt['id'];?>"  class="form-control form-control" id="rate_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<?=$dt['rate'];?>" required></td>
			<td><input type="text"  name="qty_<?=$dt['id'];?>"  class="form-control form-control" id="qty_<?=$dt['id'];?>" onkeyup="edit(<?=$dt['id'];?>);cal(<?=$dt['id'];?>);" value="<?=$dt['qty'];?>" required></td>
			<td><input type="text"  name="amount_<?=$dt['id'];?>" class="form-control form-control" id="amount_<?=$dt['id'];?>" value="<?=$dt['amount'];?>" required></td>
			
			<td><button onclick="deleteData(<?=$dt['id'];?>)" class="btn btn-danger">X</button></td>
			<td><div class="loader" id="updateload_<?=$dt['id'];?>" align="center" title="Internet maybe slow" style="display:none;"></div><!--<input type="button" name="edit_<?=$dt['id'];?>" class="btn btn-primary" value="Edit" id="edit_<?=$dt['id'];?>" >--></td>
			
			
			
				
			
		</tr>
		<script>window.onload = party;</script>
<?php	
	}
	
	
	//mysqli_close($conn);
?>
 
