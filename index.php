<?php //header('Location:pages/index.php');?>

<script>
window.location.href = "pages/login.php";
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>RBD.Reliance Inventory Software</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




<style>
.intro {
    min-height:100vh;
    max-height:100vh;
    
    background-repeat:no-repeat;
    background-position: center;
    background-size: cover;
    	
	
}
}
.intro  img {
	width:100%;

}
.typing{
	display: flex;
  	justify-content: center;
}
.typewriter h1 {
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid black; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: .15em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(40, end),
    blink-caret .75s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: black; }
}

</style>

</head>

<body>
    
    
    
    <div class="wrapper">

		<div class="container-fulid intro d-flex align-items-center">


		
		<div class="container ">
		<div class="typing mb-5">
			<div class="typewriter">
				<h1 class="display-3 text-muted">RBD.Reliance</h1>
			</div>
		</div>
		
					<div class="row mt-5 mb-5">
					    
						<div class="col">
							<a href="pages/login.php" target="_blank">
								<div class="card p-3">
									<div class="d-flex align-items-center">
										<span class="stamp stamp-md bg-secondary mr-3">
											<i class="fa fa-industry mt-2 p-1"></i>
										</span>
										<div>
										<h4 class="mb-1">Inventory</h4>
										</div>
									</div>
								</div>
							</a>	
						</div>
						
						
						
						
					</div>
		
		</div>
		
		
		
		
	</div>	
		
		</div>	
		
		
    

</body>
</html>

       