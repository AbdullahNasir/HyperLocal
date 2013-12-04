<?php

include '../Classes.php';

	$Count = $_POST['Count'];
	
	for($i=0;$i<$Count;$i++)
	{
		$brancharr = new Branches();
		
		$var = 'Name'.$i;
		
		$brancharr->BranchName = "'".$_POST[$var]."'";
		
		$brancharr->BusinessID = $_POST['BusinessID'];
		
		$var = 'Lat'.$i;
		
		$brancharr->Lat = $_POST[$var];
		
		$var = 'Long'.$i;
		
		$brancharr->Long = $_POST[$var];
		
		$var = 'Phone'.$i;
		
		$brancharr->phone = "'".$_POST[$var]."'";
		
		$var = 'Address'.$i;
		
		$brancharr->Address = "'".$_POST[$var]."'";
		
		$brancharr->AddBranch();
		
		
	}


echo "All Branches Successfully Added.";
	
    
?>