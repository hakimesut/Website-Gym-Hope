<?php
  include_once 'products_crud.php';
  include_once 'session.php';
?>
  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Gym Hope : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style>

    *{
      margin: 0;
      padding: 0;
    }

</style>

</head>
<body style="background-image: url('products/background6.jpg'); size:100%;">
    
  <?php include_once 'nav_bar.php'; ?>
  <?php if($pos==="Admin") { ?>

   
 <br>
 <br>
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="background-color:#777777;box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.4); width:50%;">
      <div class="page-header">
      <div class="page-header">
       <center><h2 style="font-weight:bold; color:white;">Create New Product</h2></center> 
      </div>


    <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">

      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label" style="font-weight:bold; color:white;"> Product ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
        </div>
        </div>


      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
            </div>


        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Price (RM)</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
        </div>
        </div>


      <div class="form-group">
          <label for="productcategory" class="col-sm-3 control-label" style="font-weight:bold; color:white;" >Category</label>
          <div class="col-sm-9">
          <select name="category" class="form-control" id="productcategory" required>
            <option value="">Please select</option>


            <option value="Gym Flooring" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Gym Flooring") echo "selected"; ?>>Gym Flooring</option>

            <option value="Strength" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Strength") echo "selected"; ?>>Strength</option>

            <option value="Recovery" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Recovery") echo "selected"; ?>>Recovery</option>

            <option value="Aerobic&Flexibility" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Aerobic&Flexibility") echo "selected"; ?>>Aerobic&Flexibility</option>

            <option value="Accessories" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Accessories") echo "selected"; ?>>Accessories</option>


          </select>
        </div>
        </div>    

        
        <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Brand</label>
          <div class="col-sm-9">
          <input name="brand" type="text" class="form-control" id="productbrand" placeholder="Product Brand" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_brand']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="productstock" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Stock</label>
          <div class="col-sm-9">
          <input name="stock" type="text" class="form-control" id="productstock" placeholder="Product Stock" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>" required>
        </div>
        </div>


      <!--warranty-->
        <div class="form-group">
          <label for="productyear" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Warranty</label>
          <div class="col-sm-9">
          <select name="warranty" class="form-control" id="warranty" required>
            <option value="">Please select</option>
            <option value="No Warranty" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="No Warranty") echo "selected"; ?>>No Warranty</option>

            <option value="2 Months" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="2 Months") echo "selected"; ?>>2 Months</option>

            <option value="3 Months" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="3 Months") echo "selected"; ?>>3 Months</option>

            <option value="5 Months" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="5 Months") echo "selected"; ?>>5 Months</option>

            <option value="6 Months" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="6 Months") echo "selected"; ?>>6 Months</option>

            <option value="8 Months" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="8 Months") echo "selected"; ?>>8 Months</option>

            <option value="1 Years" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="1 Years") echo "selected"; ?>>1 Years</option>

           
          </select>
        </div>
        </div>  


        <div class="form-group">
          <label for="image" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Image</label>
          <div class="col-sm-9">
          <input class="btn btn-default" type="file" id="image" name="image" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>" required>
        </div>
        </div>



 

      
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span > Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <?php } ?>

  <br>
 
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <center><h2>Products List</h2></center>
      </div>
      <table class="table table-striped table-bordered"  style="box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);">
        <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price(RM)</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Stock</th>
        <th>Warranty</th>

          <th></th>
        </tr>
      <?php
      // Read
      $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a173616_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
      <tr>
      <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_category']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_stock']; ?></td>
        <td><?php echo $readrow['fld_product_warranty']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <?php if($pos==="Admin"){ ?>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
      
      <?php } ?>
      </td>
      </tr>
      <?php }
      $conn = null;
      ?>
 
      </table>
    </div>
  </div>
  <center>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
      <ul class="pagination" style="box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a173616_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
  </center>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>