<?php

	
	Class Business
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
		
		public  function AddBusiness()
		{
			$Query = "Call AddBusiness('".$this->Name."',".$this->Lat.","
			.$this->Long.","
			.$this->Phone.","
			.$this->Email.",".$this->Website.",".$this->Address.",".$this->fbAddress.","
			.$this->HasBranches.");";
			
			echo $Query;
			
			DatabaseUtil::InsertRecord($Query);
			
			echo "Success";
			
		}
		
		public function RateBusiness($UserID,$Rating,$Review)
		{
			$Query = "Call RatePlace(".$UserID.",".$this->BusinessID.",".$Rating.",".$Review.")";
			
			DatabaseUtil::InsertRecord($Query);
		}
		
	}
	
	class Branches
	{
		public $BranchID;
		public $BranchName;
		public $BusinessID;
		public $Lat;
		public $Long;
		public $Address;
		public $phone;
		
		public  function AddBranch()
		{
			$Query="Call AddBranches(".$this->BusinessID.",".$this->BranchName.",".$this->Lat.","
			.$this->Long.",".$this->Address.",".$this->phone.")";
			
			DatabaseUtil::InsertRecord($Query);
		}
	}
	
	class Product
	{
		public $ProductID;
		public $BusinessID;
		public $CategoryID;
		public $ProductName;
		public $Price;
		public $Availability;
		public $Rating;
		
		public function AddProduct()
		{
			$Query = "Call AddProduct(".$this->BusinessID.",".$this->CategoryID.",".$this->ProductName
			.",".$this->Price.")";
			
			echo $Query;
			
			DatabaseUtil::InsertRecord($Query);
			
		}
		
		public function RateProduct($UserID,$Rating,$Review)
		{
			$Query = "Call RateProduct(".$UserID.",".$this->ProductID.",".$Rating.",".$Review.")";
			
			echo $Query;
			
			DatabaseUtil::InsertRecord($Query);
		}
		
		
	}
	
	Class Promotion
	{
		public $PromotionID;
		public $BusinessID;
		public $PromotionImage;
		public $promotionText;
		public $ValidFrom;
		public $validTill;
		public $IsValidOnAllBranches;
		public $Rating;
		public $PromotionBranches;
		
		public function AddPromotion()
		{
	 
			
			$Query = "Call AddPromotion(".$this->BusinessID.",".$this->promotionText.","
			.$this->PromotionImage.",".$this->ValidFrom.","
			.$this->ValidFrom.",".$this->IsValidOnAllBranches.")";
			
			
			if ($this->IsValidOnAllBranches == 'true')
			{
				echo $Query;
				
				DatabaseUtil::InsertRecord($Query);
			}
			
			else 
			{
				echo $Query;
				
				$result = DatabaseUtil::RetieveData($Query);
				
				$data = $result->fetch_row();
				
				$this->PromotionID = $data[0];
				
				
			}
			
			
		}
	
		public function AddPromotionBranches()
		{
			for ($i=0; $i <count($this->PromotionBranches) ; $i++) 
			{ 
				$Query = "Call AddPromotionBranches(".$this->PromotionID.",".$this->PromotionBranches[$i].")";
				
				echo $Query;
				
				DatabaseUtil::InsertRecord($Query);	
			}
		}
	
		public function RatePromotion($UserID,$Rating,$Review)
		{
			$Query = "Call RatePromotion(".$UserID.",".$this->PromotionID.",".$Rating.",".$Review.")";
			
			echo $Query;
			
			DatabaseUtil::InsertRecord($Query);
		}
		
	}
	

	

?>