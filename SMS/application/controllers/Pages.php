<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portal_home_model');

    }

    // Test 

   

    // home page view

    public function home()
    {
        


        if($this->session->userdata('logged in')){
            $std_id = $this->session->userdata('std_id');
        }

        $data['title'] = 'Home'; // Capitalize the first letter
        $data['notice'] = $this->Portal_home_model->notice_fetch();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }


    // payment receipt

    public function payment_receipt()
    {

        $std_id = $_GET['std_id'];
        $txn_id = $_GET['txn_id'];

        if(empty($std_id) || empty($txn_id) || strlen($std_id) < 10 || strlen($txn_id) < 6 || strlen($std_id) > 10 || strlen($txn_id) > 6 ){

            // send message to user

            $this->session->set_flashdata('error', 'Invalid Request');

            redirect(base_url(''));
        }
       

        else{

       

        $data['title'] = 'Payment Receipt'; // Capitalize the first letter
        $data['payment_data'] = $this->Portal_home_model->payment_data_fetch_by_id($std_id, $txn_id);

        $this->load->helper('url');
       $this->load->view('templates/header', $data);
        $this->load->view('pages/receipt', $data);
        $this->load->view('templates/footer', $data);
    }
}
    

public function dashboard()
    {

        if(!$this->session->userdata('logged_in')){
            // flash message
            $this->session->set_flashdata('error', 'Please login to access this page.');
            redirect(base_url(''));
        }

        
        $std_id = $this->session->userdata('std_id');

        $data['notice'] = $this->Portal_home_model->notice_fetch();

        $data['payment'] = $this->Portal_home_model->get_payment_history($std_id);

        $data['title'] = 'Student Dashboard'; // Capitalize the first letter
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('Student_Dashboard/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function profile(){

        if(!$this->session->userdata('logged_in')){
            // flash message
            $this->session->set_flashdata('error', 'Please login to access this page.');
            redirect(base_url(''));
        }

        $data['title'] = 'Profile'; // Capitalize the first letter
        // fetch data using session id 

        $std_id = $this->session->userdata('std_id');
        $data['profile'] = $this->Portal_home_model->get_profile($std_id);

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('Student_Dashboard/profile', $data);
        $this->load->view('templates/footer', $data);

    }

    public function payment_history(){

        if(!$this->session->userdata('logged_in')){
            // flash message
            $this->session->set_flashdata('error', 'Please login to access this page.');
            redirect(base_url(''));
        }

        $data['title'] = 'Payment History'; // Capitalize the first letter
        // fetch data using session id 

        $std_id = $this->session->userdata('std_id');

        $data['payment'] = $this->Portal_home_model->get_payment_history($std_id);

        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('Student_Dashboard/pmtHist', $data);
        $this->load->view('templates/footer', $data);

    }


}


?>