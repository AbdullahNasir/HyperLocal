<?

include 'databaseutil.php';

class Branches extends CI_Model {
	public $BranchID;
	public $BranchName;
	public $BusinessID;
	public $Lat;
	public $Long;
	public $Address;
	public $phone;
	
	function __construct()
	{
		parent::__construct();
	}
	
	public  function AddBranch()
	{
		$Query="Call AddBranches(".$this->BusinessID.",".$this->BranchName.",".$this->Lat.","
		.$this->Long.",".$this->Address.",".$this->phone.")";

        $this->load->model('Databaseutil');

        Databaseutil::InsertRecord($Query);
	}

    public  function GetBranches($BusinessID)
    {
        $Query = "Call GetBranches(".$BusinessID.")";
        return Databaseutil::RetieveData($Query);

    }

    public  function  DeleteBranch($BranchID)
    {
        $Query = "Call DeleteBranch(".$BranchID.")";

        return Databaseutil::RetieveData($Query);
    }
}

?>