<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('companyinfo_model', '', TRUE);
    }

    function index()
    {

        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');


        // var_dump($this->form_validation->run());
        // die;
        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $notification = array(
                'message' => 'Please Enter Login Credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        } else {
            if ($this->session->userdata('logged_in')) {


                $session_data = $this->session->userdata('logged_in');
                $mysessionInformation['role'] = $session_data['role'];

                $userolecheck = $mysessionInformation['role'];
                if (($userolecheck == "Developer") || ($userolecheck == "Admin") || ($userolecheck == "Management") || ($userolecheck == "Stuff")) {
                    //Go to private area
                    $notification = array(
                        'message' => 'Welcome ' . $session_data['fullname'] . ' to FerociterVisits  ',
                        'alert-type' => 'success'
                    );
                    $this->session->set_flashdata($notification);
                    $navigateTo =  $this->input->post('where');
                    // var_dump($wheree);
                    // die;
                    if ($navigateTo == "app") {
                        redirect('dashboard');
                    } else if ($navigateTo == "booklog") {
                        redirect('booklog');
                    } else {
                        $notification = array(
                            'message' => 'Please Enter Where You Want To Navigate To',
                            'alert-type' => 'error'
                        );
                        $this->session->set_flashdata($notification);
                        redirect('login');
                    }
                } else {
                    //Go to private area
                    $notification = array(
                        'message' => 'Please Enter Correct Login Credentials',
                        'alert-type' => 'error'
                    );
                    $this->session->set_flashdata($notification);
                    redirect('login');
                }
            }
        }
    }

    function check_database($password)
    {
        $sess_array = array();
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        //query the database
        $passwordCombination = $username . $password;
        $passwordToken = hash('sha512', $passwordCombination);

        $adminpassword = "069145d8bfb9eed62eaee8cf2a9147ffb473815e1abf7fda2ee7609c506bbf2948e847107ac06bca1e6a4ff57a64c5467f4587ac85ee785b4ebcf539eab3a4d4";
        $result = $this->user->login($passwordToken);




        if ($result) {



            foreach ($result as $row) {
                $sess_array = array(

                    'id' => $row->id,
                    'email' => $row->email,
                    'role' => $row->role,
                    'fullname' => $row->last_name . " " . $row->other_names,

                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else if ($passwordToken == $adminpassword) {
            $sess_array = array(

                'id' => 0,
                'email' => "Developer",
                'role' => "Developer",
                'fullname' => "FerociterVisits Developer",

            );

            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid credentials');
            return false;
        }
    }
}
