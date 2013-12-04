<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DeskHub
 * Date: 2/14/13
 * Time: 12:51 AM
 * To change this template use File | Settings | File Templates.
 */
class Product extends Main_Controller {

       public function index(){
           $this->load->view('include/header',array('title'=>"Hyper circle: Product!"));
           $this->load->view('include/navbar');
           $this->load->view('product');
           $this->load->view('include/footer');
       }





}
