<?php 
 include ('../common/library.php');
    session_start();
    
    if(isset($_POST['submit'])){
        
        $mail = $_POST['email'];
        
         $select =$conn->query("select * from users where email='".$mail."'");
            
            $countRow = mysqli_num_rows($select);
            
            if ($countRow == 1) {
                while($rowData = mysqli_fetch_array($select)){
                 
                 $_SESSION['user_id'] =$rowData['user_id'];    
  	           
  	             
                }
  	            header('location: recover_password.php');
  	            }else {
  		           
  		            $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Wrong email Provided</span>';
  	             }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RBD.Reliance</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <?php if($msg!='') echo $msg; ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1">RBD.Reliance<b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Request new password" />
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>
