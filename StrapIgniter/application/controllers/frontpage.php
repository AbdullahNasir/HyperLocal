<?php if (!defined('BASEPATH')) die();
class Frontpage extends Main_Controller {

   public function index()
	{
        $this->load->view('include/header',array('title'=>"Hyper circle: Home!"));
        $this->load->view('include/navbar');
        $this->load->view('front_home');
        $this->load->view('include/footer');
	}

    public function home()
    {
        $this->load->view('include/header',array('title'=>"Hyper circle: Home!"));
        $this->load->view('include/navbar');
        $this->load->view('frontpage');
        $this->load->view('include/footer');
    }

    public  function Logout()
    {
        session_start();
        session_destroy();
        //echo "hello";
        redirect(base_url());
    }

    public  function Login()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            if(self::loginService($_POST['username'],$_POST['password']))
            {
                //redirect("../Dashboard");
                redirect(base_url('Dashboard/Products'));
            }

            else
            {
                //Show Login Failed Message Here
                redirect(base_url('Four/LoginFailed'));
            }
        }
    }

    public  function UserLogin()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            if(self::loginService($_POST['username'],$_POST['password']))
            {
                //redirect("../Dashboard");
                //redirect(base_url('Dashboard/Products'));
                echo json_encode("success");
            }

            else
            {
                //Show Login Failed Message Here
                //redirect(base_url('Four/LoginFailed'));
                echo json_encode("faliure");
            }
        }
    }

    private  function loginService($id,$pwd)
    {
        $this->load->model('DatabaseUtil');

        $Query = "Call BusinessLoginService('".$id."','".$pwd."');";

        $result =  Databaseutil::RetieveData($Query);

        $result = mysqli_fetch_array($result,MYSQLI_NUM);

        if($result[0]>0)
        {
            session_start();
            $_SESSION['id']=$result[1];
            $_SESSION['Name'] = $result[2];
            return true;
        }
        else
        {
           return false;
        }


    }

    private  function UserloginService($id,$pwd)
    {
        $this->load->model('DatabaseUtil');

        $Query = "Call UserLoginService('".$id."','".$pwd."');";

        $result =  Databaseutil::RetieveData($Query);

        $result = mysqli_fetch_array($result,MYSQLI_NUM);

        if($result[0]>0)
        {
            //session_start();
            $_SESSION['userid']=$result[1];
            $_SESSION['userName'] = $result[2];
            return true;
        }
        else
        {
            return false;
        }


    }
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
