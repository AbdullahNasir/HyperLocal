<?php if (!defined('BASEPATH')) die();



class Register extends Main_Controller {

    public function index()
    {
        //Show interface to choose between user and company
        self::Company();
    }

    public  function User()
    {
        // register user controller function
        $this->load->view('include/header',array('title'=>"Hyper circle: Register!"));
        $this->load->view('include/navbar');
        $this->load->view('register_user');
        $this->load->view('include/footer');
    }
    public  function Company()
    {
        //register company controller function
        $this->load->view('include/header',array('title'=>"Hyper circle: Register!"));
        $this->load->view('include/navbar');
        $this->load->view('register_company');
        $this->load->view('include/footer');
    }
	
	public function RegisterCompany()
	{
	$this->load->model('Business');
		
	$business = new $this->Business();

	if(isset($_POST['Address']))
	{$business->Address = "'".$_POST['Address']."'";}
	else {$business->Address = 'null';}
	
	if (isset($_POST['Email']))
	{$business->Email ="'". $_POST['Email']."'";}
	else {$business->Email='null';}
	
	if (isset($_POST['password']))
	{$business->Password = $_POST['password'];}
	else{$business->Password='null';}
	
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
	}

    public  function RegisterProduct()
    {
        $this->load->model('Product');

        session_start();

        $Product = new Product();

        $Product->BusinessID = $_SESSION['id'];
        $Product->ProductName = $_POST['Name'];
        $Product->Price = $_POST['Price'];
        $Product->ProductDesc = $_POST['Desc'];
        $Product->TagsArray = preg_split("/[,]+/",$_POST['Tags']);
        $Product->ProductImage = $_POST['ImgPath'];

        if ($Product->AddProduct())
        {
            echo 'success';
        }

        else
        {
            echo 'Something messed up, We are looking into it right now try Again Later';
        }
    }

    public  function RegisterPromotion()
    {
        $this->load->model('Promotion');
        session_start();
        $Promotion = new Promotion();
        $Promotion->BusinessID = $_SESSION['id'];
        $Promotion->promotionText = $_POST['promotionText'];
        $Promotion->validFrom = date("m/d/y",strtotime($_POST['validFrom']));
        $Promotion->validTill = date("m/d/y",strtotime($_POST['validTill']));
        $Promotion->PromotionTagArray = preg_split("/[,]+/",$_POST['Tags']);
        $Promotion->PromotionBranches = preg_split("/[,]+/",$_POST['Branches']);
        $Promotion->PromotionDescription = $_POST['promotionDescription'];
        $Promotion->PromotionImage = $_POST['ImgPath'];

        if ($Promotion->AddPromotion())
        {
            echo 'success';
        }
        else
        {
            echo 'Something messed up, We are looking into it right now try Again Later';
        }

    }





}
