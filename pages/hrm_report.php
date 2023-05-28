<?php 

$page_name="HRM Reports";  

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

                       <form action="hrm_master_report.php" target="_blank" method="post">

                           

                        <div class="row">

                        <div class="col-6">

                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="1" checked>

                                    <label class="form-check-label" for="exampleRadios1">Basic Information</label>

                                </div>

                            </div>
                            
                            <div class="col-8 ml-auto mr-auto">

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="master_report" id="exampleRadios1" value="2" checked>

                                    <label class="form-check-label" for="exampleRadios1">Payroll</label>

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

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Month</label>

                                <div class="col-sm-8">

                                    <select name="month" id="month" class="form-control">

									<option></option>
									               <option <?=($_POST['month']==1)? 'selected':''?> value="1">January</option>
                                                   <option <?=($_POST['month']==2)? 'selected':''?> value="2">February</option>
                                                   <option <?=($_POST['month']==3)? 'selected':''?> value="3">March</option>
                                                   <option <?=($_POST['month']==4)? 'selected':''?> value="4">April</option>
                                                   <option <?=($_POST['month']==5)? 'selected':''?> value="5">May</option>
                                                   <option <?=($_POST['month']==6)? 'selected':''?> value="6">June</option>
                                                   <option <?=($_POST['month']==7)? 'selected':''?> value="7">July</option>
                                                   <option <?=($_POST['month']==8)? 'selected':''?> value="8">August</option>
                                                   <option <?=($_POST['month']==9)? 'selected':''?> value="9">September</option>
                                                   <option <?=($_POST['month']==10)? 'selected':''?> value="10">October</option>
                                                   <option <?=($_POST['month']==11)? 'selected':''?> value="11">November</option>
                                                   <option <?=($_POST['month']==12)? 'selected':''?> value="12">December</option>

									</select>

                                </div>

                           </div>

						   

						   <div class="form-group row">

                                    <label for="inputPassword3" class="col-sm-4 col-form-label">Year</label>

                                <div class="col-sm-8">

                                    <select name="year" id="year" class="form-control">
                                              <option>2022</option>     

									
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









