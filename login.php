<?php

include_once 'database.php';
session_start();
if(isset($_SESSION["email"]))
    {
        header("location:index.php");
    }


try{

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"])){


            $query = "SELECT * FROM tbl_staffs_a173616_pt2  WHERE fld_staff_email = :email AND fld_staff_password = :password  ";

            $stmt = $conn-> prepare($query);
            $stmt->execute(  
                array(  
                     'email'     =>     $_POST["email"],  
                     'password'     =>     $_POST["password"]  
                )  
           );  
           $count = $stmt->rowCount();  
           if($count > 0) {  
               
               $_SESSION["email"] = $_POST["email"];  
                header("location:login_success.php");  
           }  
           else  
           {  
               echo '<script>alert("Invalid User. Please try again.")</script>';  
           } 
    }

}
catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Gym Hope : Login</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">


 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body style="background-image: url('products/background.jpg'); size:100%;">
<div class="LoginForm">
        <div class="LOGOBACKGROUND">
            <img src="products/gym.png">
        </div>
           
        <div class="login-form">
            <form method="post">
              <h2 class="title">Welcome back</h2>
                <div class="input-div email">
                    <div class="iconuser">
                        <i class="fas fa-user"></i>
                    </div>
                 <div class="foruemailpass">
                  <h5>Email</h5>
                  <input type="text" name="email" class="input"  required="">
              </div>
            </div>


            <div class="input-div pass">
                <div class="iconuser">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="foruemailpass">
                    <h5>Password</h5>
                    <input type="password" name="password" class="input" required="">
                </div>
            </div>
            <br><br>
            <input type="submit" name="login" class="btn btn-info" value="Login" >
        
            </form>

        </div>
       
    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
 
</body>
</html>