<?php

error_reporting(E_ERROR | E_PARSE);

class Dashboard extends Main_Controller{

    public function index(){

        redirect('/../Dashboard/Products');
    }

    public function products($success){

        $ProductArray = Array();
        $this->load->model('Product');
        $Product = new $this->Product();
        @session_start();
        $BusineesID = $_SESSION['id'];
        $result = $Product->GetProducts($BusineesID);
        $i = 0;
        while($row = $result->fetch_row())
        {
            $ProductArray[$i] = $row;
            $i++;
        }
        $this->load->view('include/header',array('title'=>"Hyper circle: Product!"));
        $this->load->view('include/navbar');
        $this->load->view('include/dashboardmenu');

        if(!isset($_GET['success']))
        {
            // when called normally to show products
            $this->load->view('product_dashboard',array('Products'=>$ProductArray));

        }
        else
        {
            // when called for a success or faliure message
            if(trim($_GET['success']) == "true")
            {
                $this->load->view('product_dashboard',array('Products'=>$ProductArray, 'success'=>true));
            }
            else if ($_GET['success'] == "false")
            {
                $this->load->view('product_dashboard',array('Products'=>$ProductArray, 'success'=>false));
            }
        }

        $this->load->view('include/footer');
    }


    public function promotions(){

        $PromotionArray = Array();

        $this->load->model('Promotion');

        $Product = new $this->Promotion();

        @session_start();

        $BusineesID = $_SESSION['id'];

        $result = $Product->GetPromotion($BusineesID);

        $i = 0;

        while($row = $result->fetch_row())
        {
            $PromotionArray[$i] = $row;
            $i++;

        }



        $this->load->view('include/header',array('title'=>"Hyper circle: Product!"));
        $this->load->view('include/navbar');
        $this->load->view('include/dashboardmenu');

        if(!isset($_GET['success']))
        {
            // when called normally to show products
            $this->load->view('promotion_dashboard',array('Promotions'=>$PromotionArray));

        }
        else
        {
            // when called for a success or faliure message
            if(trim($_GET['success']) == "true")
            {
                $this->load->view('promotion_dashboard',array('Promotions'=>$PromotionArray, 'success'=>true));
            }
            else if ($_GET['success'] == "false")
            {
                $this->load->view('promotion_dashboard',array('Promotions'=>$PromotionArray, 'success'=>false));
            }
        }

        $this->load->view('include/footer');
    }

    public  function branches(){

        $BranchesArray = Array();

        $this->load->model('Branches');

        $Product = new $this->Branches();

        @session_start();

        $BusineesID = $_SESSION['id'];

        $result = $Product->GetBranches($BusineesID);

        $i = 0;

        while($row = $result->fetch_row())
        {
            $BranchesArray[$i] = $row;
            $i++;

        }


        $this->load->view('include/header',array('title'=>'Hyper circle: Branches!'));
        $this->load->view('include/navbar');
        $this->load->view('include/dashboardmenu');
        $this->load->view('branch_dashboard',array('Branches'=>$BranchesArray));
        $this->load->view('include/footer');

    }

    public function profile(){
        $this->load->view('include/header',array('title'=>"Hyper circle: Home!"));
        $this->load->view('include/navbar');
        $this->load->view('include/dashboardmenu');
        $this->load->view('frontpage');
        $this->load->view('include/footer');
    }


    public  function  analytics($type)
    {
        $this->load->view('include/header',array('title'=>'Hyper circle: Home!'));
        $this->load->view('include/navbar');
        $this->load->view('include/dashboardmenu');
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $pageViews = 0;
        $visitors=array();
        switch($type)
        {
            case "":
                $type="Today";
                //echo "Today Loading";
                $pageViews = $tmp->GetTotalBusinessPageViewsToday();
                //echo $pageViews;
                $visitors = $tmp->GetUsersWhoVisitedProductToday();
                break;
            case "Today":
                //echo "Today2 Loading";
                $pageViews = $tmp->GetTotalBusinessPageViewsToday();
                $visitors = $tmp->GetUsersWhoVisitedProductToday();
                break;
            case "Monthly":
                //echo "Monthly Loading";
                $pageViews = $tmp->GetTotalBusinessViewsThisMonth();
                $visitors = $tmp->GetUsersWhoVisitedProductThisMonth();
                break;
            case "Yearly":
                //echo "Yearly Loading";
                $pageViews = $tmp->GetTotalBusinessViewsThisYear();
                $visitors = $tmp->GetUsersWhoVisitedProductThisYear();
                break;
        }
        $this->load->view('analytics_dashboard',array('pageviews'=> $pageViews, 'visitors' => $visitors));
        $this->load->view('include/footer');
    }
}

?>