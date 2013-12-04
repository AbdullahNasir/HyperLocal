<?


Class Business extends CI_Model
	{
		public $BusinessID;
		public $Name;
		public $Lat;
		public $Long;
		public $Phone;
		public $Email;
		public $Website;
		public $Address;
		public $fbAddress;
		public $HasBranches;
		public $Rating;
		public $Branches;
        public $Password;
		
		
		function __construct()
		{
			parent::__construct();	
		}
		public  function AddBusiness()
		{
			$Query = "Call AddBusiness('".$this->Name."',".$this->Lat.","
			.$this->Long.","
			.$this->Phone.","
			.$this->Email.",".$this->Website.",".$this->Address.",".$this->fbAddress.",'"
			.$this->Password."');";
			
			//echo $Query;
			
			$this->load->model('Databaseutil');
			$result = Databaseutil::InsertRecord($Query);
			
		
			$id = mysqli_fetch_row($result);
			
			var_dump($id);
			
			echo $id[0];

            redirect(base_url());
		}
		
		public function RateBusiness($UserID,$Rating,$Review)
		{
			$Query = "Call RatePlace(".$UserID.",".$this->BusinessID.",".$Rating.",".$Review.")";
			$this->load->model('Databaseutil');
			Databaseutil::InsertRecord($Query);
		}
		
	}
	
	?>