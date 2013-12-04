<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DeskHub
 * Date: 2/14/13
 * Time: 12:51 AM
 * To change this template use File | Settings | File Templates.
 */
class Products extends Main_Controller {

       public function index(){
           $this->load->view('include/header',array('title'=>"Hyper circle: Product!"));
           $this->load->view('include/navbar');
           $this->load->view('product');
           $this->load->view('include/footer');
       }

    public function DeleteProduct($ProductID)
    {
        echo"delete product started for ".$ProductID;
        $this->load->model('Product');
        $Product = new Product();
        $Product->DeleteProduct($ProductID);
        json_encode(true);

    }





}
