<?

class Branch extends Main_Controller {

    public function index(){
        $this->load->view('include/header',array('title'=>"Hyper circle: Branches!"));
        $this->load->view('include/navbar');
        $this->load->view('branch');
        $this->load->view('include/footer');
     }


    public function getBranches($businessid)
    {
        $this->load->model('Branches');
        $Branches = new Branches();
        $result = $Branches->GetBranches($businessid);
        $Items = array();
        while($row = $result->fetch_array())
        {
           $Items["".$row["Branch Name"].""] = $row["BranchID"];
        }
        echo json_encode($Items);

    }

    public function  RegisterBranch()
    {
        $Count =1;

        for($i=0;$i<$Count;$i++)
        {
            $this->load->model('Branches');
            $brancharr = new $this->Branches();
            $var = 'Name';
            $brancharr->BranchName = "'".$_POST[$var]."'";
            session_start();
            $brancharr->BusinessID =$_SESSION['id'];
            $var = 'Lat';
            $brancharr->Lat = $_POST[$var];
            $var = 'Long';
            $brancharr->Long = $_POST[$var];
            $var = 'Phone';
            $brancharr->phone = "'".$_POST[$var]."'";
            $var = 'Address';
            $brancharr->Address = "'".$_POST[$var]."'";
            $brancharr->AddBranch();
        }
        redirect(base_url("DashBoard/Branches"));
    }

    public function DeleteBranch($BranchId)
    {
        echo "delete branch started for ".$BranchId;
        $this->load->model('Branches');
        $Branches = new Branches();
        $Branches->DeleteBranch($BranchId);
        json_encode(true);
    }

}



?>