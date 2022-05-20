<?php
include_once 'session.php';
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Gym Hope</title>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
    <link href="css/home.css" rel="stylesheet">
    
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

<header>
     

      
      <ul>
				
				<li><a href="products.php">Products</a></li>
				<li><a href="customers.php">Customers</a></li>
        <li><a href="staffs.php">Staffs</a></li>
        <li><a class=logo href="index.php"><img src="products/dumbbell.png" width="60" height="60"></a></li>
				
				<li><a href="orders.php">Orders</a></li>	
        <li><a style="color: #883400;" href="#" disabled="disabled"><span  aria-hidden="true"></span>  <?php echo $name; ?> (<?php echo $pos; ?>)</a></li>
				<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
      
</header>

<section class="banner">
        <div class="welcome">
            <h1>Welcome to GymHope</h1>
            <h2>When Live Give You Pains, Go to The Gym.</h2>    
        </div>

       



 
    










 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     
</body>
</html>