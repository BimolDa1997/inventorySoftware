<?php 
 include ('../common/library.php');
    session_start();
    
    $timeNow    = date("Y-m-d H:i:s");
    
    if(isset($_POST['submit'])){
        
        $pass1= $_POST['pass1'];
        $pass2=$_POST['pass2'];

        
        $id = $_SESSION['user_id'];
        
        $update = $conn->query("update users set password='".$pass1."',updated_at='".$timeNow."' where user_id='".$id."'");

        if($update==true)
  {
  echo '<script>window.location.href = "login.php";</script>';
  $msg =  '<span style="color:green; font-weight:bold; font-size:18px;">User Successfully Updated.</span>';
  
  }
  else
  {
  $msg =  '<span style="color:red; font-weight:bold; font-size:18px;">Plesae Try Again!</span>';
 }
                }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mollik Plaza</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a  class="h1"><b>Mollik Plaza</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Password" required>
          
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Confirm Password" required>
          
        </div>
        <span id='message'></span>
        <div class="row">
          <div class="col-12">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Change password" />
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

<script>
    $('#pass1, #pass2').on('keyup', function () {
  if ($('#pass1').val() == $('#pass2').val()) {
    $('#message').html('Password Matched').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>

</body>
</html>
