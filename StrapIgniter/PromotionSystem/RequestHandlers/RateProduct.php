<?php
    
    include '../Classes.php';
   
   $product = new Product();
   
   $product->ProductID = $_POST['ProductID'];
   
   $UserID = $_POST['UserID'];
   
   $Rating = $_POST['Rating'];
   
   $Review = "'".$_POST['Review']."'";
   
   $product->RateProduct($UserID, $Rating, $Review);
   
?>