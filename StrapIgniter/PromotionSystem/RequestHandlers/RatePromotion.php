<?php
    
    include '../Classes.php';
   
  $promotion = new Promotion();
   
  $promotion->PromotionID = $_POST['PromotionID'];
   
   $UserID = $_POST['UserID'];
   
   $Rating = $_POST['Rating'];
   
   $Review = "'".$_POST['Review']."'";
   
  $promotion->RatePromotion($UserID, $Rating, $Review);
    
?>