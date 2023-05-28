<?php 
date_default_timezone_set("Asia/Dhaka");
$page_name="Product Info";  

include ('../common/library.php');

include ('../common/helper.php');

include ('../template/header.php'); 

include ('../template/sidebar.php');





?>

		<div class="main-panel">

			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
							
<div class="card-body">

	<div class="table-responsive">
    <form action="barcode_print.php" method="post">
		<input type="submit" name="submit" value="Submit" class="btn btn-info">
		<table id="add-row" class="display table table-striped table-hover basic-datatables" >
			<thead>
				<tr>
					<th>Qty</th>
					<th>Check</th>
					<th>Product code</th>
					<th>Product Name</th>
					<th>Selling Price</th>
					<th>UOM</th>
					<th>Category</th>
                    <th>Sub Category</th>
                    <th>Sub Sub Category</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
			<?php

				$select =$conn->query("select i.*,c.category as main_category,sc.category as s_category,ssc.category as ss_category from item_info i left join category_info c on c.id=i.category_id left join sub_category_info sc on sc.id=i.sub_category_id left join sub_sub_category_info ssc on ssc.id=i.sub_sub_category_id  where 1 ");

				while($c_data = $select->fetch_assoc()){ ?>
				<tr>
					<td><input type="number" style="width:80px" name="qty[<?=$c_data['item_code']?>]" id="qty" ></td>
					<td><input type="checkbox" name="ids[]" id="ids" value="<?=$c_data['item_code']?>" >
					<input type="hidden" name="pname[<?=$c_data['item_code']?>]" value="<?=$c_data['item_name']?>">
					<input type="hidden" name="price[<?=$c_data['item_code']?>]" value="<?=$c_data['price']?>">
					</td>
					<td><?=$c_data['item_code']?></td>
					<td><?=$c_data['item_name']?></td>
					<td><?=number_format($c_data['price'])?></td>
					<td><?=$c_data['uom']?></td>
					<td><?=$c_data['main_category']?></td>
                    <td><?=$c_data['s_category']?></td>
                    <td><?=$c_data['ss_category']?></td>
					<td><?=$c_data['status']?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</form>				
	</div>

</div>


							</div>

						</div>

					</div>





			</div>





<?php include('../template/footer.php');?>