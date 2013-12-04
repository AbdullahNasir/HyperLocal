<?

include 'Databaseutil.php';

Class Promotion extends CI_Model
	{
		public $PromotionID;
		public $BusinessID;
		public $PromotionImage;
		public $promotionText;
		public $validFrom;
		public $validTill;
		public $IsValidOnAllBranches;
		public $Rating;
		public $PromotionBranches;
        public $PromotionTagArray;
        public $PromotionDescription;

    function __construct(){
        parent::__construct();
        $PromotionImage='';
    }
		
		public function AddPromotion()
		{
            $Query = 'INSERT INTO `promotions`(`BusinessID`, `PromotionText`, `ValidFrom`, `ValidTill`,`PromotionDescription`)'
                .' VALUES ( '.$this->BusinessID .',"'.$this->promotionText.'" , "'.$this->validFrom.'", "'.$this->validTill.'", "'.$this->PromotionDescription.'");';
            
            if($this->PromotionImage != '')
            {
               $Query = 'INSERT INTO `promotions`(`BusinessID`, `PromotionText`, `ValidFrom`, `ValidTill`,`PromotionDescription`,`PromotionImage`)'
                .' VALUES ( '.$this->BusinessID .',"'.$this->promotionText.'" , "'.$this->validFrom.'", "'.$this->validTill.'", "'.$this->PromotionDescription.'","'.$this->PromotionImage.'");';
            }
            
            //echo $Query;
            $result = Databaseutil::InsertRecordReturnID($Query);
			$this->PromotionID = $result;
            //echo"===>";var_dump($this->PromotionTagArray);
            for($i=0;$i< count($this->PromotionTagArray);$i++)
            {
                $Query = "Call AddPromotionTags(".$this->PromotionID.",'".$this->PromotionTagArray[$i]."');";
                Databaseutil::InsertRecord($Query);
                //echo $Query;
            }

            self::AddPromotionBranches();
            return true;
		}
	
		public function AddPromotionBranches()
		{
			for ($i=0; $i <count($this->PromotionBranches) ; $i++) 
			{ 
				$Query = "Call AddPromotionBranches(".$this->PromotionID.",".$this->PromotionBranches[$i].")";
				//echo $Query;
                Databaseutil::InsertRecord($Query);
			}
		}
	
		public function RatePromotion($UserID,$Rating,$Review)
		{
			$Query = "Call RatePromotion(".$UserID.",".$this->PromotionID.",".$Rating.",".$Review.")";
			echo $Query;
			Databaseutil::InsertRecord($Query);
		}

        public  function GetPromotion($BusinessID)
        {
            $Query = "Call GetPromotions(".$BusinessID.");";
            return Databaseutil::RetieveData($Query);
        }

        public function  DeletePromotion($PromotionID)
        {
            $Query = "Call DeletePromotion(".$PromotionID.")";

            return Databaseutil::RetieveData($Query);

        }

}

	?>