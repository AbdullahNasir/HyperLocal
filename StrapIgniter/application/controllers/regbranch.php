<? if (!defined('BASEPATH')) die();

class Regbranch extends Main_Controller {

public function index(){
    $this->load->view('include/header',array('title'=>"Hyper circle: Branches!"));
    $this->load->view('include/navbar');
    $this->load->view('include/leftnavbar');
    $this->load->view('branch');
    $this->load->view('include/footer');
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

}

?>