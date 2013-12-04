<?php

include '../Classes.php';

	$promotion = new Promotion();
	
	$promotion->BusinessID = $_POST['BusinessID'];
	
	$promotion->IsValidOnAllBranches = $_POST['IsValid'];
	
	$promotion->promotionText = "'".$_POST['Text']."'";
	
	$promotion->ValidFrom = "'".$_POST['ValidFrom']."'";
	
	$promotion->validTill = "'".$_POST['ValidTill']."'";
	
	$promotion->PromotionImage = "''";
		
	if ($promotion->IsValidOnAllBranches == 'false')
	{
		$promotion->AddPromotion();
		
		$Count = $_POST['Count'];
		
		for ($i=0; $i < $Count ; $i++) 
		{ 
			$var = "BranchID".$i;
		
			$promotion->PromotionBranches[$i] = $_POST[$var];	
		}
		
		$promotion->AddPromotionBranches();
	}
	
	else 
	{
		$promotion->AddPromotion();		
	}
    
?>