<?php
   
   include '../Classes.php';
   
   $business = new Business();
   
   $business->BusinessID = $_POST['BusinessID'];
   
   $UserID = $_POST['UserID'];
   
   $Rating = $_POST['Rating'];
   
   $Review = "'".$_POST['Review']."'";
   
   $business->RateBusiness($UserID, $Rating, $Review);
   
   
?>