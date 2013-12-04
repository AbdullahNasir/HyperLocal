<?php
    
    include '../Classes.php';
	
	$business = new Business();
	
	if(isset($_POST['Address']))
	{$business->Address = "'".$_POST['Address']."'";}
	else {$business->Address = 'null';}
	
	if (isset($_POST['Email']))
	{$business->Email ="'". $_POST['Email']."'";}
	else {$business->Email='null';}
	
	if (isset($_POST['HasBranches']))
	{$business->HasBranches = $_POST['HasBranches'];}
	else{$business->HasBranches='null';}
	
	if (isset($_POST['Lat']))
	{$business->Lat = $_POST['Lat'];}
	else {$business->Lat = 'null';}
	
	if (isset($_POST['Long']))
	{$business->Long = $_POST['Long'];}
	else {$business->Long='null';}
	
	if (isset($_POST['Name']))
	{$business->Name = $_POST['Name'];}
	else{echo "Name is missing";}
	
	if (isset($_POST['Phone']))
	{$business->Phone = "'".$_POST['Phone']."'";}
	else{$business->Phone= 'null';}
	
	if (isset($_POST['Website']))
	{$business->Website = "'".$_POST['Website']."'";}
	else{$business->Website='null';}
	
	
	if (isset($_POST['fb']))
	{$business->fbAddress = "'".$_POST['fb']."'";}
	else{$business->fbAddress='null';}
	
	$business->AddBusiness(); 
    
?>