<?php
include_once 'process.php';

session_start(); 
	
	$email = $_SESSION['email'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173616_pt2 WHERE fld_staff_email = '$email'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);

	$sid = $readrow['fld_staff_id'];
	$name = $readrow['fld_staff_name'];
	$phone = $readrow['fld_staff_phone'];
	$email= $readrow['fld_staff_email'];
	$pos = $readrow['fld_staff_position'];
	$pass = $readrow['fld_staff_password'];
		
if($email==''){
	header("location:login.php");
	}
	else {
	header("");
	}
?>