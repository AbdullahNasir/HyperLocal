<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Abdullah
 * Date: 2/28/13
 * Time: 4:39 PM
 * To change this template use File | Settings | File Templates.
 */

class Getproductlist extends Main_Controller
{

function  index()
{
   // $this->load->view('include/header',array('title'=>"Hyper circle: Home!"));
    $this->load->view('include/navbar');
    $this->load->view('productlist');
    $this->load->view('include/footer');
}



}