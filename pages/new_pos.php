<?php 
date_default_timezone_set("Asia/Dhaka");
$page_name="Product Info";  

include ('../common/library.php');

include ('../common/helper.php');

include ('../template/header.php'); 

include ('../template/sidebar.php');
if($_GET['clear']>0){
	unset($_SESSION['sale_no']);
	}
function new_order_no(){
	 
	 global $conn;
	 
	 $max_order_no = find_a_field('sales_master','max(s_no)','entry_by="'.$_SESSION['user_id'].'"');
	 if($max_order_no>0){
		  $order_no = $max_order_no+1;
		 }else{
			  $order_no = $_SESSION['user_id']+1;
			 }
	
	   return $order_no;
	}
	
	


if(isset($_POST['master_submit'])){
	
	//Customer Check
   $dealerr = explode("#",$_POST['dealer_id']);
   $dealer = $dealerr[1];
   if($dealer==0 || $dealer==''){
   $check_customer = find_a_field('customer_info','customer_name','customer_name="'.$dealerr[0].'"');
   if($check_customer==''){
	    $c_sql = $conn->query('insert into customer_info set customer_name="'.$dealerr[0].'",mobile_no="'.$_POST['contact_no'].'"');
		$dealer = $conn->insert_id;
	   }
   }
   $ymd = date('Ymd');
   $order_no = $_POST['s_no'];
   $manual_s_no = $ymd.$order_no;
   $customer_type = $_POST['customer_type'];
   $sales_date = $_POST['sales_date'];
   
   $order_note = $_POST['order_note'];
   $customer_note = $_POST['customer_note'];
   $delivery_mode = $_POST['delivery_mode'];
   $sql = "insert into sales_master(`s_no`,`manual_s_no`,`sales_date`,`dealer_type`,`dealer_code`,`delivery_mode`,`group_for`,`entry_by`,`order_note`,`customer_note`) Values('".$order_no."','".$manual_s_no."','".$sales_date."','".$customer_type."','".$dealer."','".$delivery_mode."','".$_SESSION['group_for']."','".$_SESSION['user_id']."','".$order_note."','".$customer_note."')";
    $master =$conn->query($sql);
   $_SESSION['sale_no'] = $order_no;
   
	}
	
	if(isset($_POST['add_item'])){
	
   $order_no = $_SESSION['sale_no'];
   $customer_type = $_POST['customer_type'];
   $sales_date = $_POST['sales_date'];
   $dealerr = explode("#",$_POST['dealer_id']);
   $dealer = $dealerr[1];
   $desc = $_POST['description'];
   $delivery_mode = $_POST['delivery_mode'];
   
   $item = explode("#",$_POST['item_id']);
   $item_id = $item[1];
   $qty = $_POST['qty'];
   $rate = $_POST['rate'];
   $amount = $_POST['amount'];
   $color = $_POST['color'];
   
   $detail_sql = "insert into sales_order(`s_no`,`s_date`,`customer_id`,`item_id`,`qty`,`rate`,`amount`,`group_for`,`warehouse`,`color`) Values('".$_SESSION['sale_no']."','".$sales_date."','".$dealer."','".$item_id."','".$qty."','".$rate."','".$amount."','1','".$_SESSION['warehouse_id']."','".$color."')";
    $details =$conn->query($detail_sql);
   
	}
	
	if(isset($_POST['confirm'])){
		$master_update = $conn->query('update sales_master set status="CHECKED" where s_no="'.$_SESSION['sale_no'].'"');
		$details_update = $conn->query('update sales_order set status="DELIVERED" where s_no="'.$_SESSION['sale_no'].'"');
		$select = $conn->query("select * from sales_order where s_no='".$_SESSION['sale_no']."'");
		 while( $item_data = $select->fetch_assoc()){ 
		 $journal_item = $conn->query("INSERT INTO `journal_item`(`journal_date`, `item_id`, `rate`, `item_ex`, `tr_no`, `tr_from`,`entry_by`,`warehouse`) VALUES ('".$item_data['s_date']."','".$item_data['item_id']."','".$item_data['rate']."','".$item_data['qty']."','".$item_data['s_no']."','Sales','".$_SESSION['user_id']."' ,'".$_SESSION['warehouse']."')");
}
		unset($_SESSION['sale_no']);
		}
		
		if(isset($_POST['full_delete'])){
		$master_delete = $conn->query('delete from sales_master where s_no="'.$_SESSION['sale_no'].'"');
		$details_delete = $conn->query('delete from sales_order where s_no="'.$_SESSION['sale_no'].'"');
		unset($_SESSION['sale_no']);
		}





if(isset($_POST['update'])){

  $update_id = $_POST['update_item_id'];
  $item_name = $_POST['item_name'];
  $uom = $_POST['uom'];
  $item_group = $_POST['item_group'];
  $brand = $_POST['brand'];
  $status = $_POST['status'];
  $group_for = $_POST['group_for'];
  $slug = $_POST['slug'];

  $category_id = $_POST['category_id'];
  $category = explode("#",$category_id);
  if($category[2]==1){
	  $cat_id = $category[1];
	  $sub_cat_id = '';
	  $sub_sub_cat_id = '';
	  }elseif($category[2]==2){
		  $cat_id = find_a_field('sub_category_info','category_id','id="'.$category[1].'"');
	      $sub_cat_id = $category[1];
	      $sub_sub_cat_id = '';
		  }
		  elseif($category[2]==3){
		     $cat_id = find_a_field('sub_sub_category_info','category_id','id="'.$category[1].'"');
	         $sub_cat_id = find_a_field('sub_sub_category_info','sub_category_id','id="'.$category[1].'"');
	         $sub_sub_cat_id = $category[1];
		  }
		  
  $item_color = $_POST['item_color'];
  $size = $_POST['size'];
  $item_code = $_POST['item_code'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $featured = $_POST['featured'];
  $description_t = $_POST['description_t'];
  $updated_by = $_SESSION['user_id'];
  $updated_at = date('Y-m-d H:i:s');
  $tags = $_POST['tags'];

  
  if($update_id>0){

  $update = "update item_info set item_name='".$item_name."', slug='".$slug."',uom='".$uom."',item_group='".$item_group."',brand='".$brand."',status='".$status."'
  ,group_for='".$group_for."' ,category_id='".$cat_id."',item_color='".$item_color."',size='".$size."',item_code='".$item_code."'
  ,price='".$price."',description='".$description."',featured='".$featured."', description_t='".$description_t."', 
  sub_category_id='".$sub_cat_id."',sub_sub_category_id='".$sub_sub_cat_id."', updated_by='".$updated_by."', updated_at='".$updated_at."', tags='".$tags."' where item_id='".$update_id."'";
  
  //$update_jitem="UPDATE `journal_item` SET `id`=[value-1],`journal_date`=date("Y-m-d"),`warehouse`=[value-3],`item_id`='".$update_id."',`rate`=[value-5],`item_in`=[value-6],`item_ex`=[value-7],`tr_no`=[value-8],`tr_from`="Opening",`entry_at`=[value-10],`entry_by`='".$entry_by."' WHERE 1";

$conn->query($update);

  }
  
if($update==true){

 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/


 //Item photo
if($_FILES['item_file']['name']!=''){
	$i = 1;
	foreach($_FILES['item_file']['name'] as $key=>$val){
		$i++;
		$item_file_name=$_FILES['item_file']['name'][$key];
		$item_file_tmp_name=$_FILES['item_file']['tmp_name'][$key];
		$item_file_size=$_FILES['item_file']['size'][$key];
		$item_file_type=$_FILES['item_file']['type'][$key];
		$item_file_error=$_FILES['item_file']['error'][$key];
		$item_file_ext=explode('.',$item_file_name);
		$time = time();
		$item_file_ext=strtolower(end($item_file_ext));
		$item_file_name=$time.$i.'.'.$item_file_ext;
		$item_file_path='../files/item/'.$item_file_name;
		move_uploaded_file($item_file_tmp_name,$item_file_path);
		if($item_file_ext!=''){
		$insert_photo=$conn->query("insert into item_photo(`item_id`,`item_photo`) Values('".$update_id."','".$item_file_name."')");
		}
	}

}


    $r_file_name = $_FILES['docs']['name'];
	$r_file_size = $_FILES['docs']['size'];
	$r_file_temp = $_FILES['docs']['tmp_name'];
	$color_name = $_POST['color'];
	if($r_file_size>0 && $color_name!=''){
		
	for($r=0; $r<count($r_file_name);$r++){

	$r_div[$r] = explode('.', $r_file_name[$r]);
	$r_file_ext = strtolower(end($r_div[$r]));
	$allowed = array('jpg', 'png', 'gif','jpeg','PNG');
	if(in_array($r_file_ext,$allowed)){
	$r_unique_image = uniqid().'.'.$r_file_ext;
	$r_uploaded_image = '../files/item/'.$r_unique_image;
	$dd = move_uploaded_file($r_file_temp[$r], $r_uploaded_image);
	$color = $color_name[$r];
	

	$ii_query = $conn->query('INSERT INTO `item_photo`(`item_id`, `item_photo`, `color`) VALUES ("'.$update_id.'","'.$r_unique_image.'","'.$color.'")');
		
	
	}
	else{
	$type= 0;
	$msg='Invalid Attached Document Format';	    
	}
	}
	}

//Item photo end

// insert suggested items

if($_POST['suggested_item1']!=''){
	$suggested_item = $_POST['suggested_item1'];
		$insert_suggested_item = $conn->query("insert into suggested_item(`item_id`,`suggested_item_id`) Values('".$update_id."','".$suggested_item."')");	
}
if($_POST['suggested_item2']!=''){
	$suggested_item = $_POST['suggested_item2'];
		$insert_suggested_item = $conn->query("insert into suggested_item(`item_id`,`suggested_item_id`) Values('".$update_id."','".$suggested_item."')");	
}

  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">Item Successfully Updated.</span>';

  }else{
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';

 }
}
 



$max = $conn->query("select max(item_id)+1 as item_code from item_info where 1");
$c_data = $max->fetch_assoc();
$max_item_id = $c_data['item_code'];

// item info
if($_GET['line_del']>0)
{
	$deleted_id=$_GET['line_del'];
	$delete = $conn->query('delete from sales_order where id="'.$deleted_id.'"');
}
$sqls = $conn->query('select * from sales_master where s_no="'.$_SESSION['sale_no'].'"');
$sales = $sqls->fetch_assoc();
?>



		<div class="main-panel">

			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg; ?></h4>
									</div>
								</div>

<div class="card-body">

	<!-- Modal -->

	<form action="new_pos.php" method="post" enctype="multipart/form-data">
			<div class="modal-content">

				<div class="modal-header no-bd">

					<h5 class="modal-title">

						<span class="fw-mediumbold">Order</span> 

						<span class="fw-light">Information</span>

					</h5>

				</div>

				<div class="">
					<p class="small">Make Sure Fillup All Field<?=$sql?></p>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Order No <span style="color:#FF0000; font-size:15px;">*</span></label>
									
                                    <input type="hidden" name="s_no"  id="s_no" value="<?php if($_SESSION['sale_no']>0) echo $_SESSION['sale_no']; else echo new_order_no();?>" class="form-control" placeholder="Item Code" required><input type="text" name="s_no2"  id="s_no2" value="<?php if($_SESSION['sale_no']>0) echo date('Ymd').$_SESSION['sale_no']; else echo date('Ymd').new_order_no();?>" class="form-control" placeholder="Item Code" style="font-size:16px; font-weight:bold;" readonly required>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Sales Date<span style="color:#FF0000; font-size:15px;">*</span></label>
									<input type="date" name="sales_date"  id="sales_date" value="<?=$sales['sales_date']?>"  class="form-control" placeholder="Item Name" required>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Customer <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input name="dealer_id"  class="form-control form-control" id="dealer_id" list="party" value="<?php if($sales['dealer_code']>0) echo find_a_field('customer_info','customer_name','id="'.$sales['dealer_code'].'"').'#'.$sales['dealer_code'];?>" onChange="customer_data()" required/>
                                    <datalist id="party">
									<?php $d_s = $conn->query("select * from customer_info where status='Active'");
									while($dealer = $d_s->fetch_assoc()){?>
                                    <option value="<?php echo $dealer['customer_name']."#".$dealer['id'];?>"><?php echo $dealer['customer_name']."-".$dealer['id'];?></option>
                                     <?php } ?>
                                      </datalist>

								</div>
							</div>
                            
                            
                            <div class="col-sm-3">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Contact No. <span style="color:#FF0000; font-size:15px;">*</span></label>
									<input name="contact_no"  class="form-control form-control" id="contact_no" value=""/>
                                    

								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Delivery Mode <span style="color:#FF0000; font-size:15px;">*</span></label>
									<select name="delivery_mode"  class="form-control form-control" id="delivery_mode" required>
                                     <option></option>
                                                      <option <?=($sales['delivery_mode']=='H2H')? 'selected' : ''?>>H2h</option>
                                                      <option <?=($sales['delivery_mode']=='Courier')? 'selected' : ''?>>Courier</option>
                                                      <option <?=($sales['delivery_mode']=='Pathao')? 'selected' : ''?>>Pathao</option>
                                                       </select>

								</div>
							</div>

							
                            
                           

							


							<div class="col-md-6">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Customer Type</label>
									<select name="customer_type"  class="form-control form-control" id="customer">
                                    <option></option>
                                     <option <?php echo ($sales['dealer_type']=="Facebook")? 'selected':''?> value="Facebook">Facebook</option>
                                     <option <?php echo($sales['dealer_type']=="Whatsapp")? 'selected':''?> value="Whatsapp">Whatsapp</option>
                                     <option <?php echo($sales['dealer_type']=="Instagram")? 'selected':''?> value="Instagram">Instagram</option>
                                     <option <?php echo($sales['dealer_type']=="Phone")? 'selected':''?> value="Phone">Phone</option>
                                     <option <?php echo($sales['dealer_type']=="Web")? 'selected':''?> value="Web">Web</option>
                                     </select>

								</div>
							</div>

							

							<div class="col-md-3">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Order Note: </label>
									<input type="text" name="order_note" id="order_note" class="form-control" placeholder="Description" value="<?=$sales['order_note'];?>">
								</div>
							</div>
                            
                            <div class="col-md-3">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Customer Note: </label>
									<input type="text" name="customer_note" id="customer_note" class="form-control" placeholder="Description" value="<?=$sales['customer_note'];?>">
								</div>
							</div>
                            
                            <?
                             if($_SESSION['sale_no']>0){
							?>
                            <div class="col-md-3">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Product: </label>
									<input type="text" name="item_id" id="item_id" class="form-control" list="item" onChange="get_item_info()">
                                    <datalist id="item">
                                    <?php $item_sql = $conn->query("select * from item_info where 1");
									while($item = $item_sql->fetch_assoc()){?>
                                    <option value="<?php echo $item['item_name']."#".$item['item_id'];?>"><?php echo $item['item_name']."-".$item['item_id'];?></option>
                                     <?php } ?>
                                    </datalist>
								</div>
							</div>
                            
                            <div class="col-md-1">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Stock: </label>
									<input type="text" name="present_stock" id="present_stock" readonly class="form-control" style="font-size:18px; font-weight:bold;">
                                    
								</div>
							</div>
                            
                            <div class="col-md-2">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Color: </label>
									<select name="color" id="color" class="form-control">
                                    <option></option>
                                    <? $color_sql = $conn->query('select * from color_list where 1');
									   while($color=$color_sql->fetch_assoc()){
										   echo '<option value="'.$color['id'].'">'.$color['color'].'</option>';
										   }
									?>
                                    </select>
                                    
								</div>
							</div>
                            
                             <div class="col-md-1">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Qty: </label>
									<input type="text" name="qty" id="qty" onKeyUp="amt_cal()" class="form-control">
                                    
								</div>
							</div>
                            
                            
                            
                            <div class="col-md-1">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Rate: </label>
									<input type="text" name="rate" id="rate" onKeyUp="amt_cal()" class="form-control">
                                    
								</div>
							</div>
                            
                            <div class="col-md-2">
								<div class="form-group form-group-default" style="background:antiquewhite;">
									<label>Amount: </label>
									<input type="text" name="amount" id="amount" readonly class="form-control" style="font-size:18px; font-weight:bold;">
                                    
								</div>
							</div>
                            
                            <div class="col-md-2">
                              <input type="submit" name="add_item" id="add_item" value="Add Item" class="btn btn-info">
                            </div>
                            <div class="col-md-12">
                            <table class="table table-striped">
  <thead>
    <tr style="background:#ccc;">
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Qty</th>
      <th scope="col">Rate</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?
     $get_sql = $conn->query('select s.*,i.item_name from sales_order s, item_info i where i.item_id=s.item_id and s.s_no="'.$_SESSION['sale_no'].'"');
	 while($data=$get_sql->fetch_assoc()){
		 $total_amt +=$data['amount'];
	?>
    <tr>
      <th scope="row"><?=++$i;?></th>
      <td><?=$data['item_name']?></td>
      <td><?=$data['qty']?></td>
      <td><?=$data['rate']?></td>
      <td><?=$data['amount']?></td>
      <td><a href="?line_del=<?=$data['id']?>">X</a></td>
    </tr>
    <? } ?>
  </tbody>
  <tfoot>
  <tr style="background:#ccc;">
      <th colspan="4" scope="col"><strong>Total</strong></th>
      
      <th scope="col"><strong><?=number_format($total_amt,2)?></strong></th>
      <th></th>
    </tr>
    </tfoot>
</table>
</div>
<? } ?>
						<!--<script>
							CKEDITOR.replace( 'description' );
						</script>-->
							 <div class="col-md-12" align="center">
								
									<? if($_SESSION['sale_no']>0){?>
									<input type="submit" name="confirm" id="confirm" value="Confirm Order" class="btn btn-success">
                                    <input type="submit" name="full_delete" id="full_delete" value="Cancel" class="btn btn-danger">
                                    <? }else{?>
                                    <input type="submit" name="master_submit" id="master_submit" value="Add New" class="btn btn-success">
                                    <? } ?>
								
							</div>

							
				</div>

				
			</div>
	</form>
</div>

							</div>

						</div>

					</div>





			</div>


<script>
	// slug generate
	function slugGen(item_name){
		var item_name = item_name;
		var slug = item_name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
		$('#slug').val(slug);
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>

$(document).ready(function(e) {
	
	//function new_img(){
	//alert("Function Working..");
	$("#increase").click(function(){
		$("#increase").after("<span id='upload'><input class='docs' id='docs' name='docs[]' type='file' class='form-control' style='border:1px solid #ccc'><input type='text' name='color[]' id='color' placeholder='Color..'><input type='button' value='X' id='decreament' class='btn1' style='width:50px;height:31px; background:red; color:#fff'> </span>");
		$("#decreament").click(function(){
		$('#upload').remove();
		})
		
		});
	//}
	
	
		});




</script>

<script type="text/javascript">
function amt_cal(){
	 const qty = (document.getElementById('qty').value)*1;
	 const rate = (document.getElementById('rate').value)*1;
	 const total_amt = qty*rate;
	 document.getElementById('amount').value = total_amt;
	}
	
	
	//For Customer Info
	function customer_data(){
	    $(document).ready(function() {
	    $.ajax({
		url: "pos_customer_info_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
			dealer_id: $("#dealer_id").val()
		},
		success: function(data){
			
		$("#contact_no").val(data.dealer_info.mobile_no);
		//$("#c_address").attr("readonly","readonly");
		}
		})
		});
		}
		
		//For Item Info
		function get_item_info(){
	    $(document).ready(function() {
	    $.ajax({
		url: "item_info_ajax.php",
		method: "POST",
		dataType:"json",
		data:{
			item_id: $("#item_id").val()
		},
		success: function(data){
		$("#present_stock").val(data.item_info.stock);
		//$("#c_address").attr("readonly","readonly");
		}
		
		})
		});
		}

</script>


<?php include('../template/footer.php');?>