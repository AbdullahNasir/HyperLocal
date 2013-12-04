<?

Class Databaseutil extends CI_Model
	{
		
		 function __construct()
		 {
		 	parent::__construct();
		 }
		 public static function GetConnObject()
		 {
		 	$mySqli = new mysqli('localhost', 'root', '', 'promotionsystem');
			
			if (mysqli_connect_errno()) {
    			 printf("Connect failed: %s\n", mysqli_connect_error());
   				 exit();
			
			}
			
	      	return $mySqli;
		 }
		
		public static  function InsertRecord($Query)
		{
			$mySqli = Databaseutil::GetConnObject();
			
			$result = $mySqli->query($Query);
			
			$mySqli->close();
			
			return $result;
		}

		public static  function InsertRecordReturnID($Query)
		{
			$mySqli = Databaseutil::GetConnObject();
			
			$result = $mySqli->query($Query);
			
			$result = $mySqli->insert_id;

			$mySqli->close();
			
			return $result;
		}
		
		public static function RetieveData($Query)
		{
			$mySqli = Databaseutil::GetConnObject();
			
			$result = $mySqli->query($Query);
			
			$mySqli->close();
		
			return $result;
		}

        public static  function InsertRecordReturnRowsAffected($Query)
        {
            $mySqli = Databaseutil::GetConnObject();

            $mySqli->query($Query);

            $result = $mySqli->affected_rows;

            $mySqli->close();

            return $result;
        }
		
	}
	
	?>