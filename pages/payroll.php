<?php 
$page_name="Payroll Generate"; 
include ('../common/library.php');
include ('../common/helper.php');  
include ('../template/header.php'); 
include ('../template/sidebar.php');
 
 $max_emp_id = find_a_field('employee_info','max(emp_id)+1','1');
 if($max_emp_id==''){
	 $max_emp_id = 100001;
	 }

if(isset($_POST['payroll_generate'])){
	
	$month = $_POST['month'];
	$year = $_POST['year'];
	
  $select =$conn->query("select * from employee_info where 1");
   while($c_data = $select->fetch_assoc()){
	   
  $del = $conn->query('delete from payroll where emp_id="'.$c_data['emp_id'].'" and month="'.$month.'" and year="'.$year.'"');   
  $gross_salary = $c_data['gross_salary'];
  $basic_salary = $c_data['basic_salary'];
  $house_rent = $c_data['house_rent'];
  $medical = $c_data['medical'];
  $mobile_bill = $c_data['mobile_bill'];
  $conveyance = $c_data['conveyance'];
  $emp_id   = $c_data['emp_id'];
  $td   = $_POST['td'.$c_data['emp_id']];
  $hd   = $_POST['hd'.$c_data['emp_id']];
  $ab   = $_POST['ab'.$c_data['emp_id']];
  $lv   = $_POST['lv'.$c_data['emp_id']];
  $lt   = $_POST['lt'.$c_data['emp_id']];
  $deduction   = $_POST['deduction'.$c_data['emp_id']];
  $entry_by   = $_POST['entry_by'];
  $entry_at   = $_POST['entry_at'];
  
  $working_day = $td-$ab;
  
  $absent_deduction = ($gross_salary/$td)*$ab;
  $total_deduction = $absent_deduction+$deduction;
  $total_payable = $gross_salary-$total_deduction;
  
  
  $insert =$conn->query("insert into payroll
  (`emp_id`,
  `month`,
  `year`,
  `td`,
  `hd`,
  `ab`,
  `lv`,
  `lt`,
  `gross_salary`,
  `basic_salary`,
  `house_rent`,
  `medical`,
  `conveyance`,
  `mobile_bill`,
  `absent_deduction`,
  `other_deduction`,
  `total_deduction`,
  `total_payable`,
  `entry_at`,
  `entry_by`) 
  
  Values
  
  ('".$emp_id."',
  '".$month."',
  '".$year."',
  '".$td."',
  '".$hd."',
  '".$ab."',
  '".$lv."',
  '".$lt."',
  '".$gross_salary."',
  '".$basic_salary."',
  '".$house_rent."',
  '".$medical."',
  '".$conveyance."',
  '".$mobile_bill."',
  '".$absent_deduction."',
  '".$deduction."',
  '".$total_deduction."',
  '".$total_payable."',
  '".$entry_at."',
  '".$entry_by."')");
  
  $total_payable = 0;
  $absent_deduction = 0;
   }

}


if(isset($_POST['update'])){

  $update_id   = $_POST['update_id'];
  $emp_name   = $_POST['emp_name'];
  $designation      = $_POST['designation'];
  $department   = $_POST['department'];
  $joining_date       = $_POST['joining_date'];
  $nid_no     = $_POST['nid_no'];
  $mobile_no       = $_POST['mobile_no'];
  $email  = $_POST['email'];
  $present_address  = $_POST['present_address'];
  $permanent_address   = $_POST['permanent_address'];
  $mother_name   = $_POST['mother_name'];
  $father_name   = $_POST['father_name'];
  $gross_salary   = $_POST['gross_salary'];
  $basic_salary   = $_POST['basic_salary'];
  $house_rent   = $_POST['house_rent'];
  $conveyance   = $_POST['conveyance'];
  $medical   = $_POST['medical'];
  $mobile_bill   = $_POST['mobile_bill'];
  $password   = $_POST['password'];
  
  $entry_by   = $_SESSION['user_id'];
  $entry_at   = date('Y-m-d H:i:s');
  
  if($update_id>0){
  $update = $conn->query("update employee_info set emp_name='".$emp_name."',designation='".$designation."',department='".$department."',joining_date='".$joining_date."',nid_no='".$nid_no."',mobile_no='".$mobile_no."',email='".$email."',present_address='".$present_address."',permanent_address='".$permanent_address."',mother_name='".$mother_name."',father_name='".$father_name."',gross_salary='".$gross_salary."',basic_salary='".$basic_salary."',house_rent='".$house_rent."',conveyance='".$conveyance."',medical='".$medical."',mobile_bill='".$mobile_bill."',password='".$password."',edit_by='".$entry_by."',edit_at='".$entry_at."' where emp_id='".$update_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">User Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}



if(isset($_POST['delete'])){

  $delete_id  = $_POST['delete_id'];

  
  if($delete_id>0){
  $update = $conn->query("update users set del='1' where user_id='".$delete_id."'");
  }
  
  if($update==true)
  {
 /* echo '<script>window.location.href = "customer_setup.php";</script>';*/
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">User Successfully Deleted.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
}
/*while($c_data = $select->fetch_assoc()){
 $p++;
 $code[$p] = $c_data['id'];
 $business_name[$p] = $c_data['business_name'];
 $propritor_name[$p] = $c_data['propritor_name'];
 $mobile_no[$p] = $c_data['mobile_no'];
 $credit_limit[$p] = $c_data['credit_limit'];
 $entry_by[$p] = $c_data['entry_by'];
} 
*/ ?>

		
		<div class="main-panel">
			<div class="content">
				

                     <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"><?=$msg?></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add New
										</button>
									</div>
								</div>
								<div class="card-body">
									
									<div class="table-responsive">
                                      <form name="" method="post">
										<table id="add-row" class="display table table-striped table-hover"> 
											<thead>
                                            
                                                <tr>
                                                   <td colspan="8">Year : <select name="year" id="year" class="form-control" style="border:2px solid;"><option>2022</option></select></td>
                                                </tr>
                                                <tr>
                                                   <td colspan="8">Month : <select name="month" id="month" class="form-control" style="border:2px solid;">
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
                                                   </select></td>
                                                </tr>
                                                <tr>
                                                   <td colspan="8" style="border-bottom:3px solid #000;" align="center"><input type="submit" name="show" id="show" value="Next" class="btn btn-success"></td>
                                                </tr>
                                                <tr>
                                                   <td colspan="8" style="border-bottom:3px solid #000;"></td>
                                                </tr>
                                                <?
                                                  if(isset($_POST['show'])){
													  $mon = $_POST['month'];
													  $year = $_POST['year'];
													  $make_date = $year.'-'.$mon.'-01';
													  $m_days = date('t',strtotime($make_date));
												?>
                                                
												<tr>
													<th>Emp ID</th>
													<th>Name</th>
													<th>Designation</th>
													<th>Total Days</th>
													<th>Holiday</th>
													<th>Absent</th>
                                                    <th>Leave</th>
                                                    <th>Late</th>
                                                    <th>Deduction</th>
													
												</tr>
											</thead>
										    <tbody>
											<?php
											 $select =$conn->query("select * from employee_info where 1");
											 while($c_data = $select->fetch_assoc()){ 
                                                 $all = find_all('payroll','month='.$_POST['month'].' and year='.$_POST['year'].' and emp_id='.$c_data['emp_id']);
												 
												 ?>
												<tr>
												    <td><?=$c_data['emp_id'];?></td>
													<td><?=$c_data['emp_name']?></td>
													<td><?=$c_data['designation']?></td>
													<td><input type="text" name="td<?=$c_data['emp_id']?>" id="td<?=$c_data['emp_id']?>" value="<?=$m_days?>" class="form-control" style="border:2px solid;" readonly></td>
													<td><input type="text" name="hd<?=$c_data['emp_id']?>" id="hd<?=$c_data['emp_id']?>" value="<?=$all['hd']?>" class="form-control" style="border:2px solid;"></td>
													<td><input type="text" name="ab<?=$c_data['emp_id']?>" id="ab<?=$c_data['emp_id']?>" value="<?=$all['ab']?>" class="form-control" style="border:2px solid;"></td>
													<td><input type="text" name="lv<?=$c_data['emp_id']?>" id="lv<?=$c_data['emp_id']?>" value="<?=$all['lv']?>" class="form-control" style="border:2px solid;"></td>
                                                    <td><input type="text" name="lt<?=$c_data['emp_id']?>" id="lt<?=$c_data['emp_id']?>" value="<?=$all['lt']?>" class="form-control" style="border:2px solid;"></td>
                                                    <td><input type="text" name="deduction<?=$c_data['emp_id']?>" id="deduction<?=$c_data['emp_id']?>" value="<?=$all['other_deduction']?>" class="form-control" style="border:2px solid;"></td>
													
												</tr>
												<?php } ?>
                                                <tr>
                                                   <td colspan="8" style="border-bottom:3px solid #000;"></td>
                                                </tr>
												<tr>
                                                  <td colspan="8" align="center"><input type="submit" name="payroll_generate" id="payroll_generate" value="Generate Payroll" class="btn btn-success"></td>
                                                </tr>
											</tbody>
                                            <? } ?>
										</table>
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</div>


			</div>


<?php include('../template/footer.php');?>