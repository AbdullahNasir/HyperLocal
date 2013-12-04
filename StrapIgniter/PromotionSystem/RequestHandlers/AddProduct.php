<?php
    
    include '../Classes.php';
	
	$Count = $_POST['Count'];
	
	$BusinessID = $_POST['BusinessID'];
	
	for ($i=0; $i < $Count; $i++) 
	{ 
		$product  = new Product();
		
		$product->BusinessID = $BusinessID;
		
		$var = "Cat".$i;
		
		$product->CategoryID = $_POST[$var];
		
		$var = "Name".$i;
		
		$product->ProductName = "'".$_POST[$var]."'";
		
		$var = "Price".$i;
		
		$product->Price = $_POST[$var];
		
		$product->AddProduct();
	
	}
?>