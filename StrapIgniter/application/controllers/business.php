<?php

class Business extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('include/header',array('title'=>"Hyper circle: Business!"));
        $this->load->view('include/navbar');
        $this->load->view('business_landing_page');
        $this->load->view('include/footer');

    }
}