<?php
  include_once 'staffs_crud.php';
  include_once 'session.php';
?>
  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Gym Hope : Staffs</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
  * {
    margin: 0;
    padding: 0;
  }
</style>
</head>

<body style="background-image: url('products/background6.jpg'); size:100%;">
   
  <?php include_once 'nav_bar.php'; ?>
  <?php if($pos==="Admin"){ ?>
 <br>
 <br>
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="background-color:#777777;box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.4); width:50%;">
      <div class="page-header">
      <center><h2 style="font-weight:bold; color:white;">Create New Staff</h2></center>
      </div>


    <form action="staffs.php" method="post" class="form-horizontal">


      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Staff ID</label>
          <div class="col-sm-9">
          <input name="sid" type="text" class="form-control" id="sid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>" required>
        </div>
        </div>


      <div class="form-group">
          <label for="fname" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
        </div>
        </div>

       

      <div class="form-group">
          <label for="phone" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Phone Number</label>
          <div class="col-sm-9">
      <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>" required> 
      </div>
        </div>



        <div class="form-group">
          <label for="email" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Email Address</label>
          <div class="col-sm-9">
      <input name="email" type="text" class="form-control" id="email" placeholder="Email Address" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required> 
      </div>
        </div>



        <div class="form-group">
          <label for="position" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Position</label>
          <div class="col-sm-9">
            <select name="position" class="form-control" id="position" required="">
              <option value="">Please Select</option>
              <option value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_position']=="Admin") echo "selected"; ?>>Admin</option>
              <option value="Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_position']=="Staff") echo "selected"; ?>>Staff</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label for="password" class="col-sm-3 control-label" style="font-weight:bold; color:white;">Password</label>
          <div class="col-sm-9">
      <input type="password"  name="pass" class="form-control" id="password" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required> 
      </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
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
        <center><h2>Staff List</h2></center>
      </div>
      <table class="table table-striped table-bordered"  style="box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);">
        <tr>
          <th>Staff ID</th>
          <th>Name</th>
          <th>Phone Number</th>
          <th>Email Address</th>
          <th>Position</th>
          <?php if($pos==="Admin"){ ?>
          <th></th>
          <?php }?>
        </tr>
      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173616_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
      <tr>
        <td><?php echo $readrow['fld_staff_id']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td><?php echo $readrow['fld_staff_position']; ?></td>
        <?php if($pos==="Admin"){ ?>
        

        <td>
        <a href="staffs.php?edit=<?php echo $readrow['fld_staff_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
        <a href="staffs.php?delete=<?php echo $readrow['fld_staff_id']; ?>" onclick="return confirm('Are you sure to delete?');"class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
        <?php } ?>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173616_pt2");
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
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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