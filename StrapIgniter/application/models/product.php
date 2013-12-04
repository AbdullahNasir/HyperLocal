<?

include 'databaseutil.php';

class Product extends CI_Model
	{
		public $ProductID;
		public $BusinessID;
		public $TagsArray;
		public $ProductName;
		public $Price;
		public $Availability;
		public $Rating;
	    public $ProductDesc;
	    public $ProductImage;

		function __construct(){
			parent::__construct();
			$ProductImage='';
		}
		
		public function AddProduct()
		{
			//$Query = "Call AddProduct(".$this->BusinessID.",'".$this->ProductName
			//."',".$this->Price.",'".$this->ProductDesc."')";
			$Query = 'INSERT INTO products( BusinessID, CategoryID, ProductName, Price,ProductDescription)'
            	 .' VALUES ('.$this->BusinessID.',1,"'.$this->ProductName.'",'.$this->Price.',"'.$this->ProductDesc.'");';
            $this->load->model('Databaseutil');
			$result = Databaseutil::InsertRecordReturnID($Query);
            $this->ProductID = $result;
            for($i=0;$i< count($this->TagsArray);$i++)
            {

                $Query = "Call AddTags(".$this->ProductID.",'".$this->TagsArray[$i]."');";
                Databaseutil::InsertRecord($Query);
            }
            if($this->ProductImage != '')
            {
            	$Query = 'UPDATE products SET ImgPath="'.$this->ProductImage.'" WHERE ProductID='.$this->ProductID.';';
            	Databaseutil::InsertRecord($Query);
            }
            
            return true;
		}
		
		public function RateProduct($UserID,$Rating,$Review)
		{
			$Query = "Call RateProduct(".$UserID.",".$this->ProductID.",".$Rating.",".$Review.")";

			
			Databaseutil::InsertRecord($Query);
		}

         public function  GetProducts($BusinessID)
         {
             $Query = "Call GetProducts(".$BusinessID.")";



            return Databaseutil::RetieveData($Query);
         }

        public function  DeleteProduct($ProductID)
        {
           $Query = "Call DeleteProduct(".$ProductID.")";

            return Databaseutil::RetieveData($Query);

        }




}
	
	?>