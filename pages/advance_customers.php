<?php 

$page_name="Advanced Customers Report"; 

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

                       <form action="advance_master_report.php" target="_blank" method="post">

                           

                        <div class="row">

                        <div class="col-6">

                            <div class="col-8 ml-auto mr-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">Customer Summery Report</label>
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
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Avg.Purchase Price</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fprice" id="fprice" placeholder="min price" class="form-control" value="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="tprice" id="tprice" placeholder="max price" class="form-control" value="">
                                </div>
                           </div>

                           <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Delivery Location</label>
                                <div class="col-sm-8">
                                    <div id="party">
                                        <input list="delivery_locations" name="delivery_location" id="delivery_location" class="form-control" autocomplete="off" >
                                        <option></option>
                                        <datalist  id="delivery_locations">
                                            <?php foreign_relation('delivery_location','id','location',$_POST['delivery_location'],'1');?>
                                        </datalist>
									</div>
                                </div>
                           </div>

                           <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Purchase Times</label>
                                <div class="col-sm-4">
                                    <input type="text" name="fcount" id="fcount" placeholder="min purchase times" class="form-control" value="">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="tcount" id="tcount" placeholder="max purchase times" class="form-control" value="">
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









