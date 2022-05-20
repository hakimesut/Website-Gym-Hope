<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a173616_pt2(fld_product_id, fld_product_name, fld_product_price, fld_product_category, fld_product_brand, fld_product_stock, fld_product_warranty, fld_product_image) VALUES(:pid, :name, :price, :category, :brand, :stock, :warranty, :image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_INT);
      $stmt->bindParam(':image', $image, PDO::PARAM_STR);
   
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $brand =  $_POST['brand'];
    $stock = $_POST['stock'];
    $warranty = $_POST['warranty'];
    $image = $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo("products/$image",PATHINFO_EXTENSION));


    //meow
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
    echo '<script type="text/javascript">';
    echo 'alert("File is an image - '. $check["mime"] .'.");';
    echo '</script>';
    $uploadOk = 1;
    } else {
    echo '<script type="text/javascript">';
    echo 'alert("File is not an image.");';
    echo '</script>';
    $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists("products/$image")) {
    echo '<script type="text/javascript">';
    echo 'alert("Sorry, file already exists.");';
    echo '</script>';
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 10000000) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Sorry, your file is too large.");';
    echo '</script>';
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo '<script type="text/javascript">';  
    echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");';
    echo '</script>';
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Sorry, your file was not uploaded.");';
    echo '</script>'; 
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "products/$image")) {

      echo '<script type="text/javascript">'; 
      echo 'alert("The file '. htmlspecialchars( basename( $_FILES["image"]["name"])).' has been uploaded.");';
      echo '</script>';
      
      $stmt->execute();
    
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }


  }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a173616_pt2 SET fld_product_id = :pid,
        fld_product_name = :name, fld_product_price = :price, fld_product_category = :category,
        fld_product_brand = :brand, fld_product_stock = :stock, fld_product_warranty = :warranty, fld_product_image = :image
        WHERE fld_product_id = :oldpid");
     
     $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
     $stmt->bindParam(':name', $name, PDO::PARAM_STR);
     $stmt->bindParam(':price', $price, PDO::PARAM_INT);
     $stmt->bindParam(':category', $category, PDO::PARAM_STR);
     $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
     $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
     $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
     $stmt->bindParam(':image', $image, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $brand =  $_POST['brand'];
    $stock = $_POST['stock'];
    $warranty = $_POST['warranty'];
    $image = $_FILES['image']['name'];
    $oldpid = $_POST['oldpid'];


    move_uploaded_file($_FILES['image']['tmp_name'], "products/$image");

    echo '<script type="text/javascript">'; 
    echo 'alert("The file '. htmlspecialchars( basename( $_FILES["image"]["name"])).' has been uploaded.");';
    echo '</script>';



     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a173616_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a173616_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?> 