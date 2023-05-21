
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class websiteController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('Service_Category_Model');

    }

    public function index()
    {

        $page['page'] = 'index';
        $page['title'] = "website";
        $this->load->view($page['page']);
    }


    public function register()
    {
        $page['page'] = 'register';
        $page['title'] = "website";
        $this->load->view($page['page']);
    }

    public function reset()
    {
        $page['page'] = 'reset';
        $page['title'] = "website";
        $this->load->view($page['page']);
    }

    public function category()
    {
        $page['page'] = 'category';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }


    public function login()
    {
        $page['page'] = 'login';
        $page['title'] = "website";
        $this->load->view($page['page']);
    }
    public function logout()
    {
        $page['page'] = 'login';
        $page['title'] = "website";
        $this->load->view($page['page']);
    }


    public function productDetails()
    {
        $page['page'] = 'productDetails';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function productcart()
    {
        $page['page'] = 'cart';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }
    public function guestCheckout()
    {
        $page['page'] = 'guestCheckout';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function Checkout()
    {
        $page['page'] = 'Checkout';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function deliveryInfo()
    {
        $page['page'] = 'deliveryInfo';

        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function selectpayment()
    {
        $page['page'] = 'selectpayment';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function orderconfirmed()
    {
        $page['page'] = 'orderconfirmed';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page']);
    }

    public function sellerpolicy()
    {
        $page['page'] = 'sellerpolicy';
        $page['loggedin'] = 'not';

        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function returnpolicy()
    {
        $page['page'] = 'returnpolicy';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function supportpolicy()
    {
        $page['page'] = 'supportpolicy';
        $page['loggedin'] = 'not';

        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function beseller()
    {
        $page['page'] = 'beseller';
        $page['loggedin'] = 'not';

        $this->load->view('website/views/website/' . $page['page'], $page);
    }

    public function track_your_order()
    {
        $page['page'] = 'track_your_order';
        $page['loggedin'] = 'not';

        $this->load->view('website/views/website/' . $page['page'], $page);
    }
    public function affiliate()
    {
        $page['page'] = 'affiliate';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/' . $page['page'], $page);
    }


    public function registration()
    {
        $page['page'] = 'registration';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/' . $page['page'], $page);
    }
    public function compare()
    {
        $page['page'] = 'compare';
        $page['loggedin'] = 'not';
        $this->load->view('website/views/' . $page['page'], $page);
    }



    public function recent_jobs()
    {

        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
    ORDER BY created_at ASC
    LIMIT 10
    ");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function index11()
    {

        $jobs['recent_jobs'] = $this->recent_jobs();

        //If no session, redirect to login page
        $page['usersfullname'] = "";
        $page['page'] = 'index';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobs);
        $this->load->view('website/footer');
    }

    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
    ORDER BY created_at DESC
    ");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function all_categories()
    {
        $query = $this->db->query("select categoryname  from jobcategory");

        $categoryname = $query->result();
        return $categoryname;
    }

    public function all_joblocations()
    {
        $query = $this->db->query("select locationname from joblocation");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function jobs()
    {

        $categoryname = $this->input->post('categoryname');
        $locationname = $this->input->post('locationname');
        if ($locationname == "All" || $categoryname == "All" || $locationname == "" || $categoryname == "") {
            //$this->load->library('../controllers/JobsPortal_Controller');
            $jobs['all_jobs'] = $this->all_jobs();
        } else {
            $query = $this->db->query("select *
    FROM jobdetial where joblocation='$locationname' and JobCategory='$categoryname'
    ORDER BY created_at DESC
    ");

            $advancejobsearch = $query->result();
            // echo json_encode($advancejobsearch);
            $jobs['all_jobs'] = $advancejobsearch;
        }

        $jobs['categoryname'] = $this->all_categories();

        $jobs['locationname'] = $this->all_joblocations();
        // var_dump($jobs['categoryname']); die;
        $page['page'] = 'jobs';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobs);
        // $this->load->view('admin/' . $page['page'] , $joblocations);
        $this->load->view('website/footer');
    }

    public function jobdetial($jobid)
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2 and jobdetial.id='$jobid'
    ");

        $jobdetial = $query->result();
        return $jobdetial;
    }

    public function job_details()
    {

        $jobid = trim($this->uri->segment(3));
        $jobdetial['jobdetial'] = $this->jobdetial($jobid);

        // var_dump($jobdetial['jobdetial']); die;

        $page['page'] = 'job_details';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobdetial);
        $this->load->view('website/footer');
    }

    public function service()
    {

        $page['page'] = 'services';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function about()
    {

        $page['page'] = 'about';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function contact()
    {

        $page['page'] = 'contact';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function WebsiteControl()
    {
        $pagename = 'WebsiteControl';
        $page['title'] = $pagename;
        $this->load->view('website/' . $pagename, $page);
    }
}
