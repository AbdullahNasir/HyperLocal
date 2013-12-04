<?

class Branches extends Main_Controller {

public function index(){
    $this->load->view('include/header',array('title'=>"Hyper circle: Branches!"));
    $this->load->view('include/navbar');
    $this->load->view('branch');
    $this->load->view('include/footer');
 }

}

?>