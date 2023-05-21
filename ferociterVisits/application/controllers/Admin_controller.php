
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //  $this->load->model('companyinfo_model');
        $this->load->model('companyinfo_model', '', TRUE);
        $this->load->model('User', '', TRUE);
        $this->load->model('visitors_model', '', TRUE);
    }

    public function dashboardData()
    {

        $date = date("Y-m-d");
        $query = $this->db->query("select
(SELECT   count(*) FROM visitors ) as visitors,
 (SELECT   count(*) FROM visiting ) as visiting,
 (SELECT   count(*) FROM users ) as users,
 (SELECT count(*) from visiting where DATE(datetime) = '$date') as today_visits,
  (SELECT   count(*) FROM visitors WHERE gender='Male' ) as males,
  (SELECT   count(*) FROM visitors WHERE gender='Female' ) as Female,
 

  (SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '1') as janvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '2') as febvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '3') as marvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '4') as aprvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '5') as mayvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '6') as junvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '7') as jlyvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '8') as augvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '9') as sepvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '10') as octvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '11') as novvisiting,
 ( SELECT IFNULL(count(*), 0) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '12') as deccvisiting,

(SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '1' and visiting.visit_purpose='1' ) as jan_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '2' and visiting.visit_purpose='1') as feb_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '3' and visiting.visit_purpose='1') as mar_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '4' and visiting.visit_purpose='1') as apr_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '5' and visiting.visit_purpose='1') as may_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '6' and visiting.visit_purpose='1') as jun_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '7' and visiting.visit_purpose='1') as jly_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '8' and visiting.visit_purpose='1') as aug_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '9' and visiting.visit_purpose='1') as sep_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '10' and visiting.visit_purpose='1') as oct_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '11' and visiting.visit_purpose='1') as nov_officail,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '12' and visiting.visit_purpose='1') as decc_officail,
 
 (SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '1' and visiting.visit_purpose='2' ) as jan_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '2' and visiting.visit_purpose='2') as feb_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '3' and visiting.visit_purpose='2') as mar_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '4' and visiting.visit_purpose='2') as apr_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '5' and visiting.visit_purpose='2') as may_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '6' and visiting.visit_purpose='2') as jun_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '7' and visiting.visit_purpose='2') as jly_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '8' and visiting.visit_purpose='2') as aug_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '9' and visiting.visit_purpose='2') as sep_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '10' and visiting.visit_purpose='2') as oct_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '11' and visiting.visit_purpose='2') as nov_private,
 ( SELECT count(*) FROM visiting WHERE YEAR(`datetime`) =YEAR(CURDATE()) AND MONTH(`datetime`) = '12' and visiting.visit_purpose='2') as decc_private");
        return $query->result();
        // $users['admindashboard'] = $results;
    }

    public function index()
    {
        $companyinfo = new companyinfo_model;
        $ttt = $companyinfo->get_company_information();
        if (count($ttt) > 0) {
            foreach ($ttt as $value) {
                $logo = $value->logo;
                $company_name = $value->company_name;
            }
        }
        $page['logo'] = $logo;
        $page['company_name'] = $company_name;
        $page['page'] = 'login';
        $page['title'] = "login";
        $page['name'] = "Admin" . " " . $page['title'];
        $this->load->view('views/' . $page['page'], $page);
    }


    function logout()
    {

        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $userid = $session_data['id'];
            // $result = $this->unlockuser($userid);

            $this->session->unset_userdata('logged_in');
            session_destroy();
            redirect('login', 'refresh');
        }
    }

    public function reset()
    {
        $companyinfo = new companyinfo_model;
        $ttt = $companyinfo->get_company_information();
        if (count($ttt) > 0) {
            foreach ($ttt as $value) {
                $logo = $value->logo;
            }
        }
        $page['logo'] = $logo;
        $page['page'] = 'reset';
        $page['title'] = "reset";
        $page['name'] = "Admin" . " " . $page['title'];
        $this->load->view('views/' . $page['page'], $page);
    }



    public function dashboard()
    {



        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];

            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $call_visitor_model = new visitors_model();
            $todays_visitors = $call_visitor_model->all_visitors_today();

            $page['todays_visitors'] = $todays_visitors;

            $page['all_visitors_not_logged_out'] = $call_visitor_model->all_visitors_not_logged_out();


            $page['dashboardData'] = $this->dashboardData();


            // var_dump($call_visitor_model->all_visitors_not_logged_out());
            // die;







            // $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
            // $myphoto = $user['Systemuserphoto']['0']["photo"];
            // $notifications['Systemuserphoto'] = $myphoto;




            $page['page'] = $this->uri->segment(1);

            $page['title'] = "dashboard";
            $page['name'] = "Admin" . " / " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    //
    // ======================CRUDE====================================
    public function systemSettings()
    {


        // var_dump($this->input->post('myimaging'));
        // die;


        $company_information = new companyinfo_model;
        $company_information->insertUpdate_company_information();
        // $this->session->unset_userdata('logo');

        // $this->session->set_userdata('logo', $this->input->post('myimaging'));

        // $this->session->set_userdata(
        //     array(
        //         'logo'  =>  $this->input->post('myimaging')
        //     )
        // );

        // $this->session->set_userdata('logged_in', $sess_array);

        $notification = array(
            'message' => 'Company Information Has Been Updated Successfull',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('settings');
    }



    public function successNotify()
    {
        $notification = array(
            'message' => 'Successfull',
            'alert-type' => 'success'
        );
        return $notification;
    }

    public function visitorexist()
    {
        $notification = array(
            'message' => 'Visitor Exist In The System Already',
            'alert-type' => 'warning'
        );
        return $notification;
    }
    public function tryagian()
    {
        $notification = array(
            'message' => 'Retry Again',
            'alert-type' => 'error'
        );
        return $notification;
    }

    public function newvisitor()
    {
        $insertvisitors = new visitors_model;
        $result =  $insertvisitors->insertvisitors_information();
        if ($result == 0) {
            $notification = array(
                'message' => 'Retry Again',
                'alert-type' => 'error'
            );
        } else if ($result == 1) {
            $notification = array(
                'message' => 'Successfull',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Visitor With Contact Exist In The System Already',
                'alert-type' => 'warning'
            );
        }

        $this->session->set_flashdata($notification);
        redirect('booklog');
    }

    public function regularVisitor()
    {
        $insertvisitors = new visitors_model;
        $insertvisitors->insertvisiting_information();

        // var_dump($insertvisitors->insertvisiting_information());
        // die;

        $notification = array(
            'message' => 'Logged In Successful',
            'alert-type' => 'success'
        );

        $this->session->set_flashdata($notification);
        redirect('booklog');
    }
    public function check_contact()
    {
        $insertvisitors = new visitors_model;
        $result =  $insertvisitors->searchvisitors_information();
        echo json_encode($result);
    }

    public function check_contact_logout()
    {
        $insertvisitors = new visitors_model;
        $result =  $insertvisitors->searchvisitors_informationLogout();
        echo json_encode($result);
    }



    public function visitor_logout()
    {
        $insertvisitors = new visitors_model;
        $result =  $insertvisitors->logoutvisitors();

        if ($result == true) {
            $notification = array(
                'message' => 'Log Out Successful',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Try Again',
                'alert-type' => 'warning'
            );
        }

        $this->session->set_flashdata($notification);
        redirect('booklog');
    }

    public function AdminloggoutVisitor()
    {
        $loggout = new visitors_model;
        $result = $loggout->admin_loggout_visitor();
        echo json_encode($result);
    }

    public function AddSystemUser()
    {
        $newUser = new User;
        $email = $this->input->post('email');
        $userExistance = $newUser->check_whether_user_exist($email);

        if ($userExistance < 1) {
            $result = $newUser->adding_system_user();
            if ($result == true) {
                $notification = array(
                    'message' => 'System User Added Successfully',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Try Again',
                    'alert-type' => 'warning'
                );
            }
        } else {
            $notification = array(
                'message' => 'System User With Email Exist',
                'alert-type' => 'error'
            );
        }
        $this->session->set_flashdata($notification);
        redirect('users');
    }

    public function updateSystemUser()
    {
        $updateSystemUser = new User;
        $result = $updateSystemUser->updating_system_user();
        if ($result >= 1) {
            $notification = array(
                'message' => 'System User Updated Successfully',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Error Please Try Updating Again',
                'alert-type' => 'warning'
            );
        }
        $this->session->set_flashdata($notification);
        redirect('users');
    }

    public function user_reset_lock_unlock()
    {
        $action = $this->input->post('action');
        $rlu = new User;
        $result = $rlu->user_reset_lock_unlock();
        if ($result == true) {
            $notification = array(
                'message' => 'System User ' . $action . ' Successful',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'System User ' . $action . ' Not Successful',
                'alert-type' => 'warning'
            );
        }
        $this->session->set_flashdata($notification);
        redirect('users');
    }

    public function reporting()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;
            //  die;
            $reportin = new visitors_model;
            $reports = $reportin->system_reports();

            // var_dump($reports);
            // die;



            $page['reports'] = $reports;

            $companyinfo = new companyinfo_model;



            $ttt = $companyinfo->get_company_information();

            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $id = $value->id;
                    $company_address = $value->company_address;
                    $company_name = $value->company_name;
                    $company_website = $value->company_website;
                    $logo = $value->logo;
                }
            } else {
                $id = 0;
                $company_address = $company_name = $company_website = '';
            }


            $page['company_name'] = $company_name;
            $page['company_address'] = $company_address;
            $page['company_website'] = $company_website;
            $page['logo'] = $logo;


            $ReportPeriod = str_replace("/", "-", $this->input->post('from')) . "    To     " .  str_replace("/", "-", $this->input->post('to'));
            $page['reportperiod'] = $ReportPeriod;

            $reportType = $this->input->post('report');
            $page['reportingType'] = $reportType;
            if ($reportType == "1") {

                if (count($reports) > 0) {
                    foreach ($reports as $value) {

                        $last_name = $value->last_name;
                        $other_names = $value->other_names;
                    }
                    $page['reportType'] = "visitor " . $last_name . " " . $other_names . "(" . $this->input->post('visitor') . ")";
                } else {
                    $page['reportType'] = "Visitor Unknown";
                }
            } elseif ($reportType == "2") {
                $page['reportType'] = "Stuff (" . $this->input->post('visitor') . ")";
            } elseif ($reportType == "4") {
                $reportType =  $this->input->post('visitor');
                if ($reportType == "1") {
                    $page['reportType'] = "Visits Purpose (Official)";
                } else {
                    $page['reportType'] = "Visits Purpose (Private )";
                }
            } else {
                redirect('reports', 'refresh');
            }



            $page['reportSubmit'] = "reportSubmit";
            $page['page'] = "reports";
            $page['title'] = "reports";
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    // ========================ENDs====================================
    public function visitors()
    {

        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $visitorsinfo = new visitors_model;
            // $companyAdmin = new User;

            $visitors = $visitorsinfo->get_visitors_information();

            $page['visitors'] = $visitorsinfo->get_visitors_information();

            // $ttt = $companyinfo->get_company_information();



            // $user['Systemuser'] = $session_data['Systemuser'];
            // $myname = $user['Systemuser']['0']["fullname"];
            // $notifications['Systemuser'] = $myname;

            // $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
            // $myphoto = $user['Systemuserphoto']['0']["photo"];
            // $notifications['Systemuserphoto'] = $myphoto;

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function visitorVisits()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;
            // var_dump($this->uri->segment(2));
            $contact = $this->uri->segment(2);

            $visitorsinfo = new visitors_model;
            // var_dump($visitorsinfo->get_visitor_information($contact));
            // die;
            $page['visits'] = $visitorsinfo->get_visitor_visits($contact);

            $page['visitor'] = $visitorsinfo->get_visitor_information($contact);

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function User()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;
            // var_dump($this->uri->segment(2));
            // die;
            $id = $this->uri->segment(2);

            $userInfo = new User;
            $user = $userInfo->get_user_information($id);
            $page['user'] = $user['0'];
            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    public function users()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;


            $allUser = new User;
            // var_dump($visitorsinfo->get_visitor_information($contact));
            // die;
            $page['users'] = $allUser->get_all_users();

            //  $page['users'] = $allUser->get_all_users_with_access();

            $page['allowed'] = $allUser->get_all_users_with_access();



            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addUser()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    public function editUser()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $id = $this->uri->segment(2);

            $userInfo = new User;
            $page['User'] = $userInfo->get_user_information($id);

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function reports()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $my_visited_stuf = new visitors_model();
            $page['select_visited_stuff'] = $my_visited_stuf->select_visited_stuff();

            $page['select_visitors'] = $my_visited_stuf->select_visitors();



            // select_visited_stuff
            // $visitor = $this->input->post('visitor');
            // $from = $this->input->post('visitor');
            // $to = $this->input->post('visitor');



            // if (($visitor == "") || ($from == "") || ($to == "")) {
            //     $page['report'] = "";

            //     var_dump("no");
            // } else {



            //     $reportin = new visitors_model;

            //     $reports = $reportin->system_reports();


            //     var_dump($reports);
            //     $page['report'] = $reports;
            // }


            //  die;

            $page['reportSubmit'] = $this->uri->segment(1);

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function settings()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                }
            }
            $page['logo'] = $logo;

            $companyinfo = new companyinfo_model;
            $companyAdmin = new User;

            $companyAdminInfo = $companyAdmin->get_Admin_information();

            $ttt = $companyinfo->get_company_information();

            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $id = $value->id;
                    $company_address = $value->company_address;
                    $company_name = $value->company_name;
                    $company_website = $value->company_website;
                    $logo = $value->logo;
                }
                $Array_result_companyAdminInfo = $companyAdminInfo['0'];
            } else {
                $id = 0;
                $company_address = $company_name = $company_website = '';

                $Array_result_companyAdminInfo =
                    array(
                        'id' => "",
                        'last_name' => "",
                        'other_names' => "",
                        'email' => "",
                        'contact' => "",
                        'position' => "",
                    );
            }

            $page['id'] = $id;
            $page['company_name'] = $company_name;
            $page['company_address'] = $company_address;
            $page['company_website'] = $company_website;
            // var_dump($logo);
            // die;
            $page['logo'] = $logo;
            $page['companyAdminInfo'] = $Array_result_companyAdminInfo;

            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view('views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            $notification = array(
                'message' => 'Please Enter Login Credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function booklog()
    {



        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];
            $page['fullname'] = $session_data['fullname'];
            $companyinfo = new companyinfo_model;
            $ttt = $companyinfo->get_company_information();
            if (count($ttt) > 0) {
                foreach ($ttt as $value) {
                    $logo = $value->logo;
                    $company_name = $value->company_name;
                }
            }
            $page['logo'] = $logo;
            $page['company_name'] = $company_name;


            $company_stuff = new User;
            $page['all_active_stuff'] = $company_stuff->get_all_stuff_for_visitor();


            $page['page'] = $this->uri->segment(1);
            $page['title'] = $this->uri->segment(1);
            $page['name'] = "Admin" . " " . $page['title'];
            $this->load->view($page['page'], $page);
        } else {
            //If no session, redirect to login page
            $notification = array(
                'message' => 'Please Enter Login Credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }






    public function lockuser($userid)
    {
        $data = array(
            'isLogin' => 1
        );
        $this->db->set($data);
        $this->db->where('id', $userid);
        $this->db->update("login", $data);
    }

    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
        LIMIT 5");

        $joblocations = $query->result();
        return $joblocations;
    }


    public function index11()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $users['id'] = $session_data['id'];
            $users['email'] = $session_data['email'];
            //var_dump($users['email']); die;
            $users['role'] = $session_data['role'];

            if ($users['email'] !== 'admin@gmail.com') {

                // $user['Systemuser'] = $session_data['Systemuser'];
                // $myname=$user['Systemuser']['0']["fullname"];
                // $users['Systemuser'] =$myname;

                // $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                //  $myphoto=$user['Systemuserphoto'];
                // $users['Systemuserphoto'] =$myphoto;


                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $users['Systemuser'] = $myname;
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $users['Systemuserphoto'] = $myphoto;
            } else {
                $users['Systemuser'] = 'System Administrator';
                $users['Systemuserphoto'] = 0;
            }








            $data = array(
                'isLogin' => 1
            );

            $this->db->set($data);
            $this->db->where('id', $users['id']);
            $this->db->update("login", $data);



            $userid = $session_data['id'];
            $users['positions'] = $this->all_jobs();

            //$users['adminjobview']=$this->all_jobs();





            $male = 'Male';
            $query = $this->db->query(" select
(SELECT   count(*) FROM jobseeker ) as jobseeker,
 (SELECT   count(*) FROM jobdetial ) as jobdetial,
 (SELECT   count(*) FROM jobapplications ) as jobapplications,
 (SELECT   count(*) FROM jobseeker WHERE gender='Male' ) as males,
  (SELECT   count(*) FROM jobseeker WHERE gender='Female' ) as Female,

 (SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as jantotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as martotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as maytotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as juntotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlytotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as septotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as decctotalviewed,

(SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as jan,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as feb,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as mar,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as apr,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as may,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as jun,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jly,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as aug,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sep,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as oct,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as nov,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as decc,


(SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as janjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as marjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as mayjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as junjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlyjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sepjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as deccjobseeker,

 (SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as janjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as marjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as mayjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as junjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlyjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sepjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as deccjobdetial,
 (SELECT   sum(totalviewed) FROM jobdetial ) as totalviewed ");
            $results = $query->result();
            $users['admindashboard'] = $results;
            //var_dump($results); die;
            //             $users['totalMales']=$results->totalMales;
            //                   $users['totalFemales']=$results->totalFemales;
            //                         $users['totalActive']=$results->totalActive;
            //                               $users['totalNotActive']=$results->totalNotActive;

            $query = $this->db->query(" select
(SELECT   count(*) FROM jobapplications WHERE jobseeker_id='$userid') as totalJobsappliedfor ");
            $results = $query->row();
            $users['totalJobsappliedfor'] = $results->totalJobsappliedfor;


            $page['page'] = 'index';
            // $this->load->view('users', $users);
            $this->load->view('admin/' . $page['page'], $users);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }



    public function profileoverview()
    {
        $page['page'] = 'profileoverview';
        $this->load->view('admin/' . $page['page']);
    }

    public function personalinformation()
    {
        $page['page'] = 'personalinformation';
        $this->load->view('admin/' . $page['page']);
    }

    public function accountinformation()
    {
        $page['page'] = 'accountinformation';
        $this->load->view('admin/' . $page['page']);
    }

    public function changepassword()
    {
        $page['page'] = 'changepassword';
        $this->load->view('admin/' . $page['page']);
    }

    public function notificationSettings()
    {
        $page['page'] = 'notificationSettings';
        $this->load->view('admin/' . $page['page']);
    }



    public function staff()
    {
        $page['page'] = 'staff';
        $this->load->view('admin/' . $page['page']);
    }

    public function signups()
    {
        $page['page'] = 'signups';
        $this->load->view('admin/' . $page['page']);
    }

    public function positions()
    {
        $page['page'] = 'positions';
        $this->load->view('admin/' . $page['page']);
    }

    public function jobLocation()
    {
        $page['page'] = 'jobLocation';
        $this->load->view('admin/' . $page['page']);
    }
    public function jobIndustries()
    {
        $page['page'] = 'jobIndustries';
        $this->load->view('admin/' . $page['page']);
    }













    public function notifications()
    {

        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $notifications['id'] = $session_data['id'];
            $notifications['email'] = $session_data['email'];
            $notifications['role'] = $session_data['role'];

            $user['Systemuser'] = $session_data['Systemuser'];
            $myname = $user['Systemuser']['0']["fullname"];
            $notifications['Systemuser'] = $myname;

            $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
            $myphoto = $user['Systemuserphoto']['0']["photo"];
            $notifications['Systemuserphoto'] = $myphoto;




            // $notifications['locations']=$this->all_joblocations();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'notifications';
            $this->load->view('admin/' . $page['page'], $notifications);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


        //emmagbin@yahoo.comfb86o
    }
    public function savedjobs()
    {




        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $savedjobs['id'] = $session_data['id'];
            $savedjobs['email'] = $session_data['email'];
            $savedjobs['role'] = $session_data['role'];

            $user['Systemuser'] = $session_data['Systemuser'];
            $myname = $user['Systemuser']['0']["fullname"];
            $savedjobs['Systemuser'] = $myname;

            // $notifications['locations']=$this->all_joblocations();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'savedjobs';
            $this->load->view('admin/' . $page['page'], $savedjobs);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }









    public function pdf()
    {

        $fname = $this->uri->segment(2);
        $tofile = realpath("assets/cvs/" . $fname . ".pdf");
        header('Content-Type: application/pdf');
        readfile($tofile);
    }



    public function Resetpassword()
    {
        $email = trim($this->input->post('resetemail'));
        $query = $this->db->query("select * from login where email='$email' ");
        $result = $query->num_rows();
        if ($result == 1) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 5);


            require_once(APPPATH . 'third_party/PHPMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->IsSMTP(); /* we are going to use SMTP */
            $mail->SMTPAuth   = true; /* enabled SMTP authentication */
            $mail->SMTPSecure = "ssl";  /* prefix for secure protocol to connect to the server */
            $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
            $mail->Port       = 465;                   /* SMTP port to connect to GMail */
            $mail->Username   = "emmagbin@gmail.com";  /* user email address */
            $mail->Password   = "0249273086";            /* password in GMail */
            $mail->SetFrom('emmagbin@gmail.com', 'firm anchor consult');  /* Who is sending */
            $mail->isHTML(true);
            $mail->Subject    = "Firm Achor Consult Reset Login Password";
            $mail->Body      = "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'
 xmlns:v='urn:schemas-microsoft-com:vml'
 xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='format-detection' content='date=no' />
    <meta name='format-detection' content='address=no' />
    <meta name='format-detection' content='telephone=no' />
    <title>Email Template</title>
    

    <style type='text/css' media='screen'>
        /* Linked Styles */
        body { padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none }
        a { color:#a88123; text-decoration:none }
        p { padding:0 !important; margin:0 !important } 

        /* Mobile styles */
        </style>
        <style media='only screen and (max-device-width: 480px), only screen and (max-width: 480px)' type='text/css'>
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) { 
            div[class='mobile-br-5'] { height: 5px !important; }
            div[class='mobile-br-10'] { height: 10px !important; }
            div[class='mobile-br-15'] { height: 15px !important; }
            div[class='mobile-br-20'] { height: 20px !important; }
            div[class='mobile-br-25'] { height: 25px !important; }
            div[class='mobile-br-30'] { height: 30px !important; }

            th[class='m-td'], 
            td[class='m-td'], 
            div[class='hide-for-mobile'], 
            span[class='hide-for-mobile'] { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

            span[class='mobile-block'] { display: block !important; }

            div[class='wgmail'] img { min-width: 320px !important; width: 320px !important; }

            div[class='img-m-center'] { text-align: center !important; }

            div[class='fluid-img'] img,
            td[class='fluid-img'] img { width: 100% !important; max-width: 100% !important; height: auto !important; }

            table[class='mobile-shell'] { width: 100% !important; min-width: 100% !important; }
            td[class='td'] { width: 100% !important; min-width: 100% !important; }
            
            table[class='center'] { margin: 0 auto; }
            
            td[class='column-top'],
            th[class='column-top'],
            td[class='column'],
            th[class='column'] { float: left !important; width: 100% !important; display: block !important; }

            td[class='content-spacing'] { width: 15px !important; }

            div[class='h2'] { font-size: 44px !important; line-height: 48px !important; }
        } 
    </style>
</head>
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none'>
    <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#1e1e1e'>
        <tr>
            <td align='center' valign='top'>
                <!-- Top -->
                <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#161616'>
                    <tr>
                        <td align='center' valign='top'>
                            <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                <tr>
                                    <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                    
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                </td>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- END Top -->

                <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                    <tr>
                        <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                            <!-- Header -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'><a href='#' target='_blank'><img src='https://firmanchorconsult.com/assets/admin/dist/assets/media/logos/logo.png' border='0' width='203' height='27' alt='' /></a></div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='hide-for-mobile'>
                                            <div class='text-nav' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:22px; text-align:center'>
                                                <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>HOME</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/jobs' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>JOB BOARD</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/services' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>SERVICES</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>ABOUT</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CONTACT US</span></a>
                                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>LOGIN</span></a>
                                            </div>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='20' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                        </div>
                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Header -->

                            <!-- Main -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td>
                                        <!-- Head -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#d2973b'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/JJxrFRyVRr20CJD3pOx9_top_left.jpg' border='0' width='27' height='27' alt='' /></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' height='3' bgcolor='#e6ae57'>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='24' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/SNcoUN5kSfCDagqSBEZ4_top_right.jpg' border='0' width='27' height='27' alt='' /></td>
                                                        </tr>
                                                    </table>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            

                                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='5' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h2' style='color:#ffffff; font-family:Georgia, serif; min-width:auto !important; font-size:60px; line-height:64px; text-align:center'>
                                                                    <em> welcome!</em>
                                                                </div>
                                                                <div class='h3-2-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px'>Firm Anchor Consult</div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Head -->

                                        <!-- Body -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>We Use this opportunity to officailly welcome you to Firm Anchor Consult System</div>
                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>Your Login Details is as follows</div>
                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>EMAIL: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $email . "</span></a></strong>
                                                                </div>
                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>PASSWORD: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $password . "</span></a></strong>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <!-- Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td align='center'>
                                                                            <table width='210' border='0' cellspacing='0' cellpadding='0'>
                                                                                <tr>
                                                                                    <td align='center' bgcolor='#d2973b'>
                                                                                        <table border='0' cellspacing='0' cellpadding='0'>
                                                                                            <tr>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='50' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>
</td>
                                                                                                <td bgcolor='#d2973b'>
                                                                                                    <div class='text-btn' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:16px; line-height:20px; text-align:center'>
                                                                                                        <a href='https://firmanchorconsult.com/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CLICK TO LOGIN</span></a>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='40' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                

                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='text-2' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:14px; line-height:22px; text-align:left'>
                                                                    <em><center>Firm Anchor Consult does not only give you candidates that meet your needs but talented employees that stay with your company and make remarkable contributions to company success.</center></em>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Body -->


                                    </td>
                                </tr>
                            </table>
                            <!-- END Main -->
                            
                            <!-- Footer -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

        
                                        <div class='text-footer' style='color:#666666; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:18px; text-align:center'>
                                            House No. 110 Housing Down,<span class='mobile-block'></span> Adenta,<span class='mobile-block'></span> Accra
                                            <br />
                                            <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>www.firmanchorconsult.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            <a href='mailto:email@yoursitename.com' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>firmanchorconsult@gmail.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            Phone: <a href='tel:+233 242 550316 ' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>+233 242 550316 </span></a>
                                        </div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Footer -->
                        </td>
                    </tr>
                </table>
                <div class='wgmail' style='font-size:0pt; line-height:0pt; text-align:center'><img src='https://d1pgqke3goo8l6.cloudfront.net/oD2XPM6QQiajFKLdePkw_gmail_fix.gif' width='600' height='1' style='min-width:600px' alt='' border='0' /></div>
            </td>
        </tr>
    </table>
</body>
</html>
";
            $destino = $email; // Who is addressed the email to
            $mail->AddAddress($destino, $email);
            if (!$mail->Send()) {
                $return = "Password reset Failed Try Again After Some time";
                echo ($return);
            } else {
                $return = "Password reset Completed Please Check Your mail For New Password";
                // $notification=array(
                //                  'message'=>$return
                //                  'alert-type'=>'success'
                //                );
                //                $this->session->set_flashdata($notification);
                // redirect('login');

                echo ($return);
            }



            // $passwordCombination = $usermail . $this->input->post('role');
            //  $pass = hash('sha512', $passwordCombination);




        } else {
            echo "Email Address Does Not Exist In Firm Achor System";
        }
    }









    public function send_mail()
    {
        require_once(APPPATH . 'third_party/PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); /* we are going to use SMTP */
        $mail->SMTPAuth   = true; /* enabled SMTP authentication */
        $mail->SMTPSecure = "ssl";  /* prefix for secure protocol to connect to the server */
        $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
        $mail->Port       = 465;                   /* SMTP port to connect to GMail */
        $mail->Username   = "emmagbin@gmail.com";  /* user email address */
        $mail->Password   = "0249273086";            /* password in GMail */
        $mail->SetFrom('emmagbin@gmail.com', 'firm anchor consult');  /* Who is sending */
        $mail->isHTML(true);
        $mail->Subject    = "Mail Subject";
        $mail->Body      = "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'
 xmlns:v='urn:schemas-microsoft-com:vml'
 xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='format-detection' content='date=no' />
    <meta name='format-detection' content='address=no' />
    <meta name='format-detection' content='telephone=no' />
    <title>Email Template</title>
    

    <style type='text/css' media='screen'>
        /* Linked Styles */
        body { padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none }
        a { color:#a88123; text-decoration:none }
        p { padding:0 !important; margin:0 !important } 

        /* Mobile styles */
        </style>
        <style media='only screen and (max-device-width: 480px), only screen and (max-width: 480px)' type='text/css'>
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) { 
            div[class='mobile-br-5'] { height: 5px !important; }
            div[class='mobile-br-10'] { height: 10px !important; }
            div[class='mobile-br-15'] { height: 15px !important; }
            div[class='mobile-br-20'] { height: 20px !important; }
            div[class='mobile-br-25'] { height: 25px !important; }
            div[class='mobile-br-30'] { height: 30px !important; }

            th[class='m-td'], 
            td[class='m-td'], 
            div[class='hide-for-mobile'], 
            span[class='hide-for-mobile'] { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

            span[class='mobile-block'] { display: block !important; }

            div[class='wgmail'] img { min-width: 320px !important; width: 320px !important; }

            div[class='img-m-center'] { text-align: center !important; }

            div[class='fluid-img'] img,
            td[class='fluid-img'] img { width: 100% !important; max-width: 100% !important; height: auto !important; }

            table[class='mobile-shell'] { width: 100% !important; min-width: 100% !important; }
            td[class='td'] { width: 100% !important; min-width: 100% !important; }
            
            table[class='center'] { margin: 0 auto; }
            
            td[class='column-top'],
            th[class='column-top'],
            td[class='column'],
            th[class='column'] { float: left !important; width: 100% !important; display: block !important; }

            td[class='content-spacing'] { width: 15px !important; }

            div[class='h2'] { font-size: 44px !important; line-height: 48px !important; }
        } 
    </style>
</head>
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none'>
    <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#1e1e1e'>
        <tr>
            <td align='center' valign='top'>
                <!-- Top -->
                <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#161616'>
                    <tr>
                        <td align='center' valign='top'>
                            <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                <tr>
                                    <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                    
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                </td>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- END Top -->

                <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                    <tr>
                        <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                            <!-- Header -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'><a href='#' target='_blank'><img src='https://firmanchorconsult.com/assets/admin/dist/assets/media/logos/logo.png' border='0' width='203' height='27' alt='' /></a></div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='hide-for-mobile'>
                                            <div class='text-nav' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:22px; text-align:center'>
                                                <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>HOME</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/jobs' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>JOB BOARD</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/services' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>SERVICES</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>ABOUT</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CONTACT US</span></a>
                                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>LOGIN</span></a>
                                            </div>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='20' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                        </div>
                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Header -->

                            <!-- Main -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td>
                                        <!-- Head -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#d2973b'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/JJxrFRyVRr20CJD3pOx9_top_left.jpg' border='0' width='27' height='27' alt='' /></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' height='3' bgcolor='#e6ae57'>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='24' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/SNcoUN5kSfCDagqSBEZ4_top_right.jpg' border='0' width='27' height='27' alt='' /></td>
                                                        </tr>
                                                    </table>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            

                                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='5' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h2' style='color:#ffffff; font-family:Georgia, serif; min-width:auto !important; font-size:60px; line-height:64px; text-align:center'>
                                                                    <em> welcome!</em>
                                                                </div>
                                                                <div class='h3-2-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px'>Firm Anchor Consult</div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Head -->

                                        <!-- Body -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>We Use this opportunity to officailly welcome you to Firm Anchor Consult System</div>
                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>Your Login Details is as follows</div>
                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>EMAIL: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>emmagbin@gmail.com</span></a></strong>
                                                                </div>
                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>PASSWORD: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>4562789498</span></a></strong>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <!-- Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td align='center'>
                                                                            <table width='210' border='0' cellspacing='0' cellpadding='0'>
                                                                                <tr>
                                                                                    <td align='center' bgcolor='#d2973b'>
                                                                                        <table border='0' cellspacing='0' cellpadding='0'>
                                                                                            <tr>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='50' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>
</td>
                                                                                                <td bgcolor='#d2973b'>
                                                                                                    <div class='text-btn' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:16px; line-height:20px; text-align:center'>
                                                                                                        <a href='https://firmanchorconsult.com/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CLICK TO LOGIN</span></a>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='40' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                

                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='text-2' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:14px; line-height:22px; text-align:left'>
                                                                    <em><center>Firm Anchor Consult does not only give you candidates that meet your needs but talented employees that stay with your company and make remarkable contributions to company success.</center></em>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Body -->


                                    </td>
                                </tr>
                            </table>
                            <!-- END Main -->
                            
                            <!-- Footer -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

        
                                        <div class='text-footer' style='color:#666666; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:18px; text-align:center'>
                                            House No. 110 Housing Down,<span class='mobile-block'></span> Adenta,<span class='mobile-block'></span> Accra
                                            <br />
                                            <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>www.firmanchorconsult.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            <a href='mailto:email@yoursitename.com' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>firmanchorconsult@gmail.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            Phone: <a href='tel:+233 242 550316 ' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>+233 242 550316 </span></a>
                                        </div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Footer -->
                        </td>
                    </tr>
                </table>
                <div class='wgmail' style='font-size:0pt; line-height:0pt; text-align:center'><img src='https://d1pgqke3goo8l6.cloudfront.net/oD2XPM6QQiajFKLdePkw_gmail_fix.gif' width='600' height='1' style='min-width:600px' alt='' border='0' /></div>
            </td>
        </tr>
    </table>
</body>
</html>
";
        $destino = "obed4rynar@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        if (!$mail->Send()) {
            var_dump("false");
            die;
        } else {
            // return true;
            var_dump("true");
            die;
        }
    }
}


// 2) Go to https://www.google.com/settings/security/lesssecureapps