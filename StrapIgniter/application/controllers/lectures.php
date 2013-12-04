<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DeskHub
 * Date: 11/17/12
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */
class Lectures extends Main_Controller
{
    public  function index()
    {
        $this->load->view('include/header.php');
        $this->load->view('lectures.php');
        $this->load->view('include/footer.php');
    }

    public  function Lecture($n)
    {

    }
}
