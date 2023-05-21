<?php
class User extends CI_Model
{


    private $_table = "users";

    function login($logintoken)
    {

        $status = 0;
        // $query= $this->db->query("select usersfullname, useremail, logintoken from sysLoanUsers where  finame
        // logintoken='$logintoken' ");

        // $delete_flag="N";

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('logintoken', $logintoken);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function get_all_users()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_all_users_with_access()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('stuffAccessLevel', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_stuff_for_visitor()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('stuffLockUnlock', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_information($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Admin_information()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('createdBy', "Developer");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_Users_information()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("createdBy !=", "Developer");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function userTable()
    {
        $passwordToken = hash('sha512', $this->input->post('email') . $this->input->post('contact'));
        $users = array(
            'last_name' => $this->input->post('last_name'),
            'other_names' => $this->input->post('other_names'),
            'email' => $this->input->post('email'),
            'logintoken' => $passwordToken,
            'contact' => $this->input->post('contact'),
            'position' => $this->input->post('position'),
            'role' => $this->input->post('role'),
            'datetime' => date("Y-m-d h:i:s"),
            'status' => 1,
            'createdBy' => $this->input->post('createdBy'),
        );
        return $users;
    }
    public function check_whether_user_exist($email)
    {
        $this->db->where('email', $email);
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function adding_system_user()
    {
        return $this->db->insert('users', $this->userTable());
        $email = $this->input->post('email');
        $userExistance = $this->check_whether_user_exist($email);
        return $userExistance;
        if ($userExistance == 0) {
            return $this->db->insert('users', $this->userTable());
        } else {
            return $userExistance;
        }
    }
    //INSERT INTO `users`(`id`, `last_name`, `other_names`, `email`, `logintoken`, `contact`, `position`, `role`, `datetime`, `status`, `createdBy`)

    public function updating_system_user()
    {
        $update_data = array(
            'last_name' => $this->input->post('last_name'),
            'other_names' => $this->input->post('other_names'),
            'contact' => $this->input->post('contact'),
            'position' => $this->input->post('position'),
            'role' => $this->input->post('role'),
        );
        // return $this->input->post('id');

        $this->db->where('id', $this->input->post('id'));
        return   $this->db->update('users', $update_data);
    }



    public function user_reset_lock_unlock()
    {
        $action = $this->input->post('action');
        if ($action == "reset") {
            $passwordToken = hash('sha512', $this->input->post('email') . $this->input->post('contact'));
            $update_data = array('logintoken' => $passwordToken);
        } elseif ($action == "lock") {
            $update_data = array('status' => '0');
        } elseif ($action == "unlock") {
            $update_data = array('status' => '1');
        } elseif ($action == "allow") {
            $update_data = array('stuffAccessLevel' => '1');
        } elseif ($action == "decline") {
            $update_data = array('stuffAccessLevel' => '0');
        } elseif ($action == "lockstuff") {
            $update_data = array('stuffLockUnlock' => '0');
        } elseif ($action == "unlockstuff") {
            $update_data = array('stuffLockUnlock' => '1');
        }


        $this->db->where('id', $this->input->post('id'));
        return   $this->db->update('users', $update_data);
    }
}
