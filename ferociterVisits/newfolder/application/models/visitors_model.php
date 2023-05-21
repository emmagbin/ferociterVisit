<?php
class visitors_model extends CI_Model
{

    //SELECT `id`, `last_name`, `other_names`, `contact`, `email`, `picture`, `signature`, `from_where`, `datetime` FROM `visitors` WHERE 1
    private $_table = "visitors";
    private  $visiting = "visiting";

    public function get_visitors_information()
    {
        return $this->db->get($this->_table)->result();
    }

    public function all_visitors_today()
    {
        //   select * from visiting where DATE(datetime) = '2020-10-23';
        // return date("Y-m-d");
        $this->db->select('visiting.*,visitors.*');
        $this->db->from('visiting');
        $this->db->join('visitors', 'visitors.contact=visiting.contact', 'inner');
        $this->db->where('DATE(visiting.datetime)', date("Y-m-d"));
        //  $this->db->where('visiting.datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
        $query = $this->db->get();
        return $query->result();
    }


    public function all_visitors_not_logged_out()
    {
        //   select * from visiting where DATE(datetime) = '2020-10-23';
        // return date("Y-m-d");
        $this->db->select('visiting.*,visitors.*');
        $this->db->from('visiting');
        $this->db->join('visitors', 'visitors.contact=visiting.contact', 'inner');
        $this->db->where('visiting.visit_status', 1);
        //  $this->db->where('visiting.datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_visitor_visits($contact)
    {

        $this->db->select('*');
        $this->db->from('visiting');
        $this->db->where('contact', $contact);
        $query = $this->db->get();
        return $query->result();

        return $this->db->get($this->_table)->result();
    }

    public function get_visitor_information($contact)
    {
        $this->db->select('*');
        $this->db->from('visitors');
        $this->db->where('contact', $contact);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }


    public function check_contact($contact)
    {
        $this->db->select('contact');
        $this->db->from('visitors');
        $this->db->where('contact', $contact);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_contact_visited_today($contact)
    {
        $this->db->select('contact,datetime');
        $this->db->from('visitors');
        $this->db->where('contact', $contact);
        //$this->db->where('datetime', date("Y-m-d"));
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function check_Whethere_contact_has_any_login($contact)
    {
        $this->db->where('contact', $contact); // OTHER CONDITIONS IF ANY
        $this->db->where('visit_status', 1); // OTHER CONDITIONS IF ANY
        $this->db->from('visiting'); //TABLE NAME
        return $this->db->count_all_results();
    }


    public function admin_loggout_visitor()
    {
        $update_data = array('visit_status' => '0');
        $this->db->where('contact', $this->input->post('contact'));
        return   $this->db->update('visiting', $update_data);
    }





    public function visitors_logout_today($contact)
    {
        $this->db->select('id,contact,datetime');
        $this->db->from('visiting');
        $this->db->where('contact', $contact);
        $this->db->where('visit_status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function visitors_table()
    {
        $visitor = array(
            'last_name' => $this->input->post('last_name'),
            'other_names' => $this->input->post('other_names'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'picture' => $this->input->post('email'),
            'signature' => $this->input->post('email'),
            'from_where' => $this->input->post('from_where'),
        );
        return $visitor;
    }


    public function visiting_table()
    {
        $visiting = array(
            'contact' => $this->input->post('contact'),
            'visiting_who' => $this->input->post('visitingwho'),
            'visit_purpose' => $this->input->post('visit_purpose'),
            'receptionist' => "ima", //$this->input->post('company_name'),
            'visit_status' => 1, // $this->input->post('company_address'),
        );
        return $visiting;
    }


    public function insertvisitors_information()
    {
        $visitor = $this->visitors_table();

        $visiting = $this->visiting_table();

        $contact = $this->input->post('contact');
        $contact_check = $this->check_contact($contact);
        if (count($contact_check) < 1) {
            $result = $this->db->insert('visitors', $visitor);
            if ($result == true) {
                return  $this->db->insert('visiting', $visiting);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 2;
        }
    }
    public function searchvisitors_information()
    {
        // $datetoday = $this->db->get($this->visiting)->result();
        // return $datetoday;

        $contact = $this->input->post('contact');
        $contact_check = $this->check_contact_visited_today($contact);

        // $date = $contact_check['0']['datetime'];
        // return substr($date, 0, 10);


        // 2020-10-02

        // date("Y-m-d")

        if (count($contact_check) == 1) {
            // if (substr($date, 0, 10) == date("Y-m-d")) {
            $has_login = $this->check_Whethere_contact_has_any_login($contact);
            if ($has_login >= 1) {
                $loggedIn = "loggedIn";
                return $loggedIn;
            } else {
                return true;
            }

            // } else {
            //     return false;
            // }
        } else {
            return false;
        }
    }



    public function searchvisitors_informationLogout()
    {
        $contact = $this->input->post('contact');
        $contact_check = $this->visitors_logout_today($contact);

        if (!empty($contact_check)) {
            if (count($contact_check) == 1) {
                $date = $contact_check['0']['datetime'];
                if (substr($date, 0, 10) == date("Y-m-d")) {
                    $id = $contact_check['0']['id'];
                    return  $id;
                } else {
                    return "adminRole";
                }
            } else {
                return "adminRole";
            }
        } else {
            return false;
        }
    }
    public function logoutvisitors()
    {

        $update_data = array('visit_status' => '0');
        $this->db->where('id', $this->input->post('visit_ID'));
        return   $this->db->update('visiting', $update_data);
    }

    public function insertvisiting_information()
    {
        $visiting = $this->visiting_table();
        return  $this->db->insert('visiting', $visiting);
    }


    public  function system_reports()
    {
        $report = $this->input->post('report');

        $ff = date("Y-m-d h:i:s", strtotime(str_replace("/", "-", $this->input->post('from'))));

        $tt = date("Y-m-d h:i:s", strtotime(str_replace("/", "-", $this->input->post('to'))));
        // return $report;
        if ($report == "1") {


            $this->db->select('visiting.*,visitors.*');
            $this->db->from('visitors');
            $this->db->join('visiting', 'visitors.contact=visiting.contact', 'inner');
            $this->db->where('visiting.contact', $this->input->post('visitor'));
            $this->db->where('visiting.datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
            $query = $this->db->get();
            return $query->result();
        } elseif ($report == "2") {




            $this->db->select('visiting.*,visitors.*');
            $this->db->from('visitors');
            $this->db->join('visiting', 'visitors.contact=visiting.contact', 'inner');
            $this->db->where('visiting_who', $this->input->post('visitor'));
            $this->db->where('visiting.datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
            $query = $this->db->get();
            return $query->result();
        } elseif ($report == "3") {
            $this->db->select('*');
            $this->db->from('visiting');
            $this->db->where('visit_purpose', $this->input->post('visitor'));
            $this->db->where('datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
            $query = $this->db->get();
            return $query->result();
        } elseif ($report == "4") {

            //SELECT `id`, `contact`, `visiting_who`, `visit_purpose`, `receptionist`, `visit_status`, `datetime`, `datetimeLogout` FROM `visiting` WHERE 1
            $this->db->select('visiting.*,visitors.*');
            $this->db->from('visiting');
            $this->db->join('visitors', 'visitors.contact=visiting.contact', 'inner');
            $this->db->where('visit_purpose', $this->input->post('visitor'));
            $this->db->where('visiting.datetime BETWEEN "' . $ff . '" and "' . $tt . '"');
            $query = $this->db->get();
            return $query->result();
        }
    }


    public function select_visited_stuff()
    {
        $this->db->select('distinct(visiting_who)');
        $this->db->from('visiting');

        $query = $this->db->get();
        return $query->result();
    }

    public function select_visitors()
    {
        $this->db->select('last_name,other_names,contact');
        $this->db->from('visitors');

        $query = $this->db->get();
        return $query->result();
    }
}
