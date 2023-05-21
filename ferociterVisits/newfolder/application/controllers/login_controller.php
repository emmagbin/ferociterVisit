<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class login_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('Service_Category_Model');
	}

	public function index()
	{

		//$this->load->view('login');
		// $this->load->view('login');


		$page['page'] = 'login';
		$this->load->view('website/head', $page);
		$this->load->view('website/' . $page['page']);
		$this->load->view('website/footer');
	}


	public function unlockuser($userid)
	{
		$data = array(
			'isLogin' => 0
		);
		$this->db->set($data);
		$this->db->where('id', $userid);
		$this->db->update("login", $data);
	}
}
