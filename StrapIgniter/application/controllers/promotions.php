<?

class Promotions extends CI_Controller {

    public function  __construct()
    {
        parent::__construct();
    }

    public function DeletePromotion($PromotionID)
    {
        echo "delete promotion started for ".$PromotionID;
        $this->load->model('Promotion');
        $Promotion = new Promotion();
        $Promotion->DeletePromotion($PromotionID);
        json_encode(true);

    }
}

?>