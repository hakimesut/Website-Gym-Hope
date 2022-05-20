
<?php 
  include_once 'session.php';
?>

    

<font style="font-size: 15px;">
<nav class="navbar navbar-default" style="background-color:#777777;>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  style="color:white"  class="navbar-brand" href="index.php">GymHope</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
    <ul class="nav navbar-nav" >
      <li>
        <a  style="color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="products.php">Add Products</a></li>
            <li><a href="catalogue.php">Search Product</a></li>
        </ul>
      </li>
      <li><a style="color:white"     href="customers.php">Customers</a></li>
      <li><a style="color:white"  href="staffs.php">Staffs</a></li>
      <li><a style="color:white"  href="orders.php">Orders</a></li>
</ul>





<ul class="nav navbar-nav navbar-right">
      <li>
      <a style="color:white"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $name; ?> (<?php echo $pos; ?>)</a>
        <ul class="dropdown-menu">
           <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>   Logout</a></li>
        </ul>
      </li>
      <li>
        <a style="color:white"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>   Logout</a></li>
        </ul>
      </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>
</font>