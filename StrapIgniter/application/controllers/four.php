<?php
 class Four extends CI_Controller
{
    public function index()
    {
        $this->load->view('include/header',array('title'=>"Hyper circle: Oops!"));
        $this->load->view('include/navbar');
        $this->load->view('four');
        $this->load->view('include/footer');

    }

    public  function LoginFailed()
    {
        $this->load->view('include/header',array('title'=>"Hyper circle: Oops!"));
        $this->load->view('include/navbar');
        $this->load->view('login_failed');
        $this->load->view('include/footer');
    }
}
