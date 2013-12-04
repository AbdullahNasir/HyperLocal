<?php

class Analytics extends CI_Controller
{
    public function Business($businessID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddBusinessPageView($businessID,$date);
        echo "OK";
    }

    public function BusinessWithUser($businessID,$userID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddBusinessPageViewUser($businessID,$userID,$date);
        echo "OK";
    }

    public function Product($productID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddProductPageView($productID,$date);
        echo "OK";
    }

    public function ProductWithUser($ProductID, $userID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddProductPageViewUser($ProductID,$userID,$date);
        echo "OK";
    }

    public function Promotion($promotionID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddPromotionPageView($promotionID,$date);
        echo "OK";
    }

    public function PromotionWithUser($PromotionID,$userID)
    {
        $date = date("Y-m-d");
        $this->load->model('Analyticsmodel');
        $tmp = new Analyticsmodel();
        $tmp->AddPromotionPageViewUser($PromotionID,$userID,$date);
        echo "OK";
    }
}