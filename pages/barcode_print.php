<?php 
// date_default_timezone_set("Asia/Dhaka");
// $page_name="Product Info";  

// include ('../common/library.php');

// include ('../common/helper.php');

// include ('../template/header.php'); 

// include ('../template/sidebar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<style>
#myTable {
    transform:rotate(270deg);
}
.myTable{
	width:297px;
}
</style>

<script src="./assets/JsBarcode.all.min.js"></script>

		<div class="main-panel">

			<div class="content">
                     <div class="row">
						<div class="col-md-12">
							<div class="card">
							
<div class="card-body">



	<div class="table-responsive">
	<div id="printableArea">
<?php
	if(isset($_POST['submit'])){
		$ids = $_POST['ids'];
		$pn = $_POST['pname'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

	foreach($_POST['ids'] as $code){	
	if($qty[$code]>0){
		$qts = $qty[$code];
	}else{
		$qts = 1;
	}

	for($i=0;$i<$qts;$i++){
?>

	<table class="myTable">
		<tr>
			<td>
				<table style="margin-right:20px" >
					<tbody>
						<!-- <tr>
							<td style="text-align: center;width: 15px;font: ;-size: 12px"> <b>RBD</b></td>
						</tr>
						<tr>
							<td style="text-align: center;width: 15px;font: ;-size: 13px"> <span><?php echo $pn[$code];?></span></td>
						</tr> -->
						<!-- <tr>
							<td style="text-align: center;width: 15px;font-size: 12px"> <span><?php echo $code;?></span></td>
						</tr> -->
						<tr>
							<td style="text-align:center"> 
								<span style="font-size:12px"><?php echo $code;?></span><br>
								<img style="min-width: 120px;" id="barcode_<?php echo $code;?>" src=""><br>
								<span style="font-size:12px" >Price: <?=$price[$code];?></span>
							</td>
						</tr>
						<!-- <tr>
							<td style="text-align: center;width: 15px;font-size: 12px;"><span>tk<?=$price[$code];?></span></td>
						</tr> -->
					</tbody>
				</table>
			</td>
			<td>
				<table style="margin-left:20px" > 
					<tbody>
						<!-- <tr>
							<td style="text-align: center;width: 15px;font: ;-size: 12px"> <b>RBD</b></td>
						</tr>
						<tr>
							<td style="text-align: center;width: 15px;font: ;-size: 13px"> <span><?php echo $pn[$code];?></span></td>
						</tr> -->
						<!-- <tr>
							<td style="text-align: center;width: 15px;font-size: 12px"> <span><?php echo $code;?></span></td>
						</tr> -->
						<tr>
							<td style="text-align:center"> 
								<span style="font-size:12px"><?php echo $code;?></span><br>
								<img style="min-width: 100px;" id="barcode_<?php echo $code;?>" src=""><br>
								<span style="font-size:12px" >Price: <?=$price[$code];?></span>
							</td>
						</tr>
						<!-- <tr>
							<td style="text-align: center;width: 15px;font-size: 12px;"><span>tk<?=$price[$code];?></span></td>
						</tr> -->
					</tbody>
				</table>
			</td>
		</tr>
	</table>

<?php } } } ?>
</div>	 			
	</div>

</div>

							</div>

							<button id="area" onclick="hide(); window.print();">Print this page</button>

						</div>

					</div>





			</div>

<script>
	<?php
		if(isset($_POST['submit'])){
			$ids = $_POST['ids'];
			foreach($_POST['ids'] as $code){
	?>
		JsBarcode("#barcode_<?php echo $code;?>", "<?php echo $code;?>", {
			format: "CODE128",
			displayValue: false,
			width: 1,
			height: 20,
			fontSize: 18,
			fontOptions: "",
			textMargin: 0,
			font: "monospace",
			textAlign: "center",
			textPosition: "bottom",
			textMargin: 10,
			background: "#ffffff",
			lineColor: "#000000",
			margin: 0,
			marginTop: undefined,
			marginBottom: undefined,
			marginLeft: 5,
			marginRight: undefined
		});
	<?php } } ?>

	function hide(){
		document.getElementById("area").style.display = "none";
	}
</script>



<body>
	
</body>
</html>
<?php //include('../template/footer.php');?>