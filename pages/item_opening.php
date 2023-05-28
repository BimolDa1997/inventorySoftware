<?php 

$page_name="Product Opening";  

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

                        <div class="card-title">Product Opening</div>

                    </div>

                    <div class="card-body">

                       <form action="" target="_blank" method="post">

                           

                        <div class="row">

                        <div class="col-6">

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                   

                                    <label class="form-check-label" for="exampleRadios1">Product Name</label>

                                </div>

                            </div>

                            

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    

                                    <label class="form-check-label" for="exampleRadios1">Product Group</label>

                                </div>

                            </div>

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                   

                                    <label class="form-check-label" for="exampleRadios1">Opening Date</label>

                                </div>

                            </div>

							
                        </div>

                        <div class="col-6">
						
						<div class="form-group row">

                                    

                                <div class="col-sm-8">

                                    <input name="item_id" id="item_id" class="form-control" list="ibrand">

									<datalist id="ibrand">
									
									<? foreign_relation('item_info','item_id','item_name',$item_id,'1 group by item_name order by item_name');?>
									
									</datalist>

                                </div>

                           </div>

                             <div class="form-group row">

                                  

                                <div class="col-sm-8">

                                    <select name="item_group" id="item_group" class="form-control">

									<option>All</option>

									<option>Finished Goods</option>

									<option>Raw</option>

									</select>

                                </div>

                           </div>

                            <div class="form-group row">

                                    

                                <div class="col-sm-8">

                                    <input type="date" class="form-control" value="<?=date('Y-m-01')?>" name="fdate">

                                </div>

                            </div>

                            
                             

						   

						   <?php /*?><div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Party List</label>

                                <div class="col-sm-8">

                                    <div id="party">

                                    <input list="dealer_codes" name="dealer_code" id="dealer_code" class="form-control" autocomplete="off" >

                                    <option></option>

                                    <datalist  id="dealer_codes">

                                        

									<?php foreign_relation('customer_info','id','concat(business_name,"-",customer_address)',$_POST['dealer_code'],'status="Active"');?>

									

									</datalist>

									</div>

                                </div>

                           </div><?php */?>

						  

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









