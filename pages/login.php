
<?php
    include ('../common/library.php');  
    
    session_start();
    
    if(isset($_POST['submit'])){
        if( $_POST['username'] && $_POST['password']!==''  ){
            
            $select =$conn->query("select * from users where username='".$_POST['username']."' and password='".$_POST['password']."' and del=0");
            
            $countRow = mysqli_num_rows($select);
            
            if ($countRow == 1) {
                while($rowData = mysqli_fetch_array($select)){
                    
                  $_SESSION['username']  = $rowData['username'];
                  $_SESSION['name']      = $rowData['name'];
                  $_SESSION['email']     = $rowData['email'];
                  $_SESSION['user_id']   = $rowData['user_id'];
                  $_SESSION['group_for'] = $rowData['group_for'];
                  $_SESSION['warehouse'] = $rowData['warehouse'];
                }
                $delql = $conn->query("delete from most_visited_pages where user_id='".$rowData['user_id']."' ");
  	            header('location: index.php');
  	            }else {
  		            $msg =  '<span style="color:red; font-weight:bold; font-size:18px;text-align:center">Wrong username/password combination</span>';
  	            }
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RBD.Reliance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  
  
  <!-- Font Awesome -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <?php if($msg!='') echo $msg; ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>RBD.Reliance</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="User Name" required>

        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign In" />
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot_password.php">I forgot my password</a>
      </p>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

</body>
</html>
