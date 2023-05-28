<?php 

$page_name="Report";  

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

                    <div class="card-header">

                        <div class="card-title">Select  Report</div>

                    </div>

                    <div class="card-body">

                       <form action="master_report.php" target="_blank" method="post">

                           

                        <div class="row">

                        <div class="col-6">

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1" checked>

                                    <label class="form-check-label" for="exampleRadios1">Delivery Report Details</label>

                                </div>

                            </div>

                            

                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="170321" checked>
                                    <label class="form-check-label" for="exampleRadios1">Sales Summery Report</label>
                                </div>
                            </div>
							
							
							<div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1203" checked>
                                    <label class="form-check-label" for="exampleRadios1">Sales Summery Report (POS)</label>
                                </div>
                            </div>
							
							<div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1204" >
                                    <label class="form-check-label" for="exampleRadios1">Product Wise Sales Report (POS)</label>
                                </div>
                            </div>
							<div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1205" >
                                    <label class="form-check-label" for="exampleRadios1">Customer Due Receive Report (POS)</label>
                                </div>
                            </div>
							
                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1206" >
                                    <label class="form-check-label" for="exampleRadios1">Daily Summary Report (POS)</label>
                                </div>
                            </div>
							
							<div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1207" checked>
                                    <label class="form-check-label" for="exampleRadios1">Profit and Loss Report (POS)</label>
                                </div>
                            </div>
                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1208" checked>
                                    <label class="form-check-label" for="exampleRadios1">Customer Wise Profit and Loss Report (POS)</label>
                                </div>
                            </div>

                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1209" checked>
                                    <label class="form-check-label" for="exampleRadios1">Top Sale Product List (POS)</label>
                                </div>
                            </div>
                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1210" checked>
                                    <label class="form-check-label" for="exampleRadios1">Top Sale Customer List (POS)</label>
                                </div>
                            </div>
							

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="3" >

                                    <label class="form-check-label" for="exampleRadios1">Purchase Report</label>

                                </div>

                            </div>
							
							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="444" checked>

                                    <label class="form-check-label" for="exampleRadios1">Purchase Return Report</label>

                                </div>

                            </div>

							

							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="10" checked>

                                    <label class="form-check-label" for="exampleRadios1">Over Limit Party</label>

                                </div>

                            </div>

							

						

							

							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="30" checked>

                                    <label class="form-check-label" for="exampleRadios1">Transaction Report Summary (Party)</label>

                                </div>

                            </div>

							

							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="50" checked>

                                    <label class="form-check-label" for="exampleRadios1">Transaction Report Summary (Supplier)</label>

                                </div>

                            </div>

                            

                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="70421" checked>
                                    <label class="form-check-label" for="exampleRadios1">Expense Report</label>
                                </div>
                            </div>

                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="70422" checked>
                                    <label class="form-check-label" for="exampleRadios1">Profit and Loss Report</label>
                                </div>
                            </div>

							

							<div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="40" checked>
                                    <label class="form-check-label" for="exampleRadios1">Product Stock Report</label>
                                </div>
                            </div>
							
							
							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="takeloan" value="240821" checked>

                                    <label class="form-check-label" for="takeloan">Take Loan Report</label>

                                </div>

                            </div>
							
							
							
							<div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="giveloan" value="250821" checked>

                                    <label class="form-check-label" for="giveloan">Give Loan Report</label>

                                </div>

                            </div>

							

                        </div>

                        <div class="col-6">

                            

                            <div class="form-group row">

                                    <label for="inputEmail3" class="col-sm-4 col-form-label">From Date</label>

                                <div class="col-sm-8">

                                    <input type="date" class="form-control" value="<?=date('Y-m-01')?>" name="fdate">

                                </div>

                            </div>

                            <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">To Date</label>

                                <div class="col-sm-8">

                                    <input type="date" class="form-control" value="<?=date('Y-m-d')?>" name="tdate" >

                                </div>

                           </div>
						   
						    <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Customer List</label>
                                <div class="col-sm-8">
                                    <div id="party">
                                    <input list="dealer_codes" name="dealer_code" id="dealer_code" class="form-control" autocomplete="off" >
                                    <option></option>
                                    <datalist  id="dealer_codes">
									<?php foreign_relation('customer_info','id','concat(customer_name,"-",mobile_no)',$_POST['dealer_code'],'status="Active"');?>
									</datalist>
									</div>
                                </div>
                           </div>
						   
						   
						   <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Product List</label>
                                <div class="col-sm-8">
                                    <input name="item_id" id="item_id" list="item_ids" autocomplete="off" class="form-control">
									<datalist  id="item_ids">
										<option>All</option>
										<?php foreign_relation2('item_info','item_id','concat(item_code,"-",item_name)',$_POST['item_id'],'status="Active"');?>
									</datalist>
                                </div>
                           </div>
						   

						   <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Customer Type</label>

                                <div class="col-sm-8">

                                    <select name="customer_type" id="customer_type" class="form-control">

									<option>All</option>

									<option>Registered</option>

									<option>Corporate</option>

									</select>

                                </div>

                           </div>

						   

						   <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Transaction Type</label>

                                <div class="col-sm-8">

                                    <select name="tr_type" id="tr_type" class="form-control">

									<option></option>

									

									<option value="Receipt">Collection</option>

									<option value="Payment">Payment</option>

									<!--<option value="Advance">Advance</option>

									<option value="Sales">Sales</option>

									<option value="Purchase">Purchase</option>-->

								

									</select>

                                </div>

                           </div>

                           

                             <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Item brand</label>

                                <div class="col-sm-8">

                                    <input name="brand" id="brand" class="form-control" list="ibrand">

									<datalist id="ibrand">
									
									<?php foreign_relation('item_info','brand','brand',$brand,'1 group by brand order by brand');?>
									
									</datalist>

                                </div>

                           </div>

						   

						  

						   

						   <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Supplier List</label>

                                <div class="col-sm-8">

                                    <select name="supplier_code" id="supplier_code" class="form-control">

									<option>All</option>

									<?php foreign_relation('supplier_info','id','supplier_name',$_POST['supplier_code'],'status="Active"');?>

									</select>

                                </div>

                           </div>
						   
						   
						   <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Loan Donar</label>

                                <div class="col-sm-8">

                                    <select name="donar_id" id="donar_id" class="form-control">

									<option>All</option>

									<?php foreign_relation('donar_info','donar_id','donar_name',$_POST['donar_id'],'status="Active"');?>

									</select>

                                </div>

                           </div>

						   


                        </div>

                         

                         <div class="col text-center"><button  class="btn btn-info text-center" name="submit">Submit</button>

                        </div>

                        </div>

                    </form>

     

                    </div>

                </div>

            </div>

        </div>

</div>

</div>















<?php include('../template/footer.php');?>







<script>

    $(document).ready(function(){

        $("#customer_type").change(function(){

            

            var co_party = $(this).val();

            $.ajax({

                url:'party_ajax.php',

                method:"POST",

                data:{co_party:co_party},

                success:function(data){

                    $("#dealer_codes").html(data);

                    console.log(data);

                }

            })

            

        });

        

    });

    

    

</script>









