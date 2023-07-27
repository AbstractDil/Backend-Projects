<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pages extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_crud_model');


        
        
        
    }



    /*=============  Testing Routes  Start =============*/


    public function test()
    {
        $data['title'] = 'Notices'; // Capitalize the first letter
        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/notice', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

    /*=============  Testing Routes  End =============*/


    /********* Admin Login ************/


    public function admin_login()
    {
        $data['title'] = 'Admin Login'; // Capitalize the first letter
        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/login', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

    /********* Admin Dashboard ************/

	
	public function admin_dashboard()

    {


        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }

  //get total students
        $query4 = $this->db->get('student');
        $data['users'] = $query4->num_rows();
// get notices
        $query5 = $this->db->get('notices');
        $data['notices'] = $query5->num_rows();
 
  // get total online user

  $this->db->where('activity', 1);
  $query11 = $this->db->get('student');
  $data['online'] = $query11->num_rows();

  // get total earning from fees table

    $this->db->select_sum('amount_paid');
    $query12 = $this->db->get('fees');
    $data['earning'] = $query12->row()->amount_paid;

    // get total earning from fees table for this month

    $this->db->select_sum('amount_paid');
    $this->db->where('MONTH(date)', date('m'));
    $query13 = $this->db->get('fees');
    $data['earning_month'] = $query13->row()->amount_paid;


    $data['notice'] = $this->Admin_crud_model->notice_fetch();
    $data['user'] = $this->Admin_crud_model->user_fetch();



        $data['title'] = 'Admin Dashboard'; // Capitalize the first letter
        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/dashboard', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

    /********** Notice & Slider ************/

    // View  UI 

    public function notice()
    {

        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }
        $data['title'] = 'Notices'; // Capitalize the first letter
        $data['notices'] = $this->Admin_crud_model->notice_fetch();

        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/notice', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

   // Edit  UI

   public function edit_notice($notice_id)
   {

    if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }
      
    $data['notice'] = $this->Admin_crud_model->notice_fetch_by_id($notice_id);
    $data['title'] = 'Edit Notice';
    
    $this->load->helper('url');
    $this->load->view('Admin/templates/header', $data);
    $this->load->view('Admin/pages/editNotice', $data);
    $this->load->view('Admin/templates/footer', $data);
   }


   /********************  List Of Students **********************/

     // View  UI 

     public function student()
     {


        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }

        $data['user'] = $this->Admin_crud_model->user_fetch();
              $data['title'] = 'List of Students'; // Capitalize the first letter
              $this->load->helper('url');
              $this->load->view('Admin/templates/header', $data);
              $this->load->view('Admin/pages/studentList', $data);
              $this->load->view('Admin/templates/footer', $data);

        /*
        if($this->session->userdata('logged_in') == FALSE || $this->session->userdata('role') == 'Student')
            {
              $this->session->set_flashdata('error', 'Unauthorized Access. Please login to continue.');
              redirect(base_url('Admin_Login'));
          
            }else{

              if($this->session->userdata('role') == 3){
                $this->session->set_flashdata('error', 'Unauthorized Access.');
                redirect(base_url('admin/dashboard'));
            }else{
              $data['user'] = $this->Admin_crud_model->user_fetch();
              $data['title'] = 'List of Students'; // Capitalize the first letter
              $this->load->helper('url');
              $this->load->view('Admin/templates/header', $data);
              $this->load->view('Admin/pages/studentList', $data);
              $this->load->view('Admin/templates/footer', $data);
         }
        }
        */

    }

        // view a particular  user  details


        public function view_student($uid){

            if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }

            $data['user'] = $this->Admin_crud_model->user_fetch_by_id($uid);
            $data['payments'] = $this->Admin_crud_model->payment_fetch_by_uid($uid);
                $data['title'] = 'View Student';
                
                $this->load->helper('url');
                $this->load->view('Admin/templates/header', $data);
                $this->load->view('Admin/pages//viewStudent', $data);
                $this->load->view('Admin/templates/footer', $data);

            /* ******** Please Note:-  $uid -> Student ID ********* */
            /*

            if($this->session->userdata('logged_in') == FALSE || $this->session->userdata('role') == 1 ||
            $this->session->userdata('role') == 2 || $this->session->userdata('role') == 0)
                {
                $this->session->set_flashdata('error', 'Unauthorized Access. Please login to continue.');
                redirect(base_url('Admin_Login'));

                }else{

                if($this->session->userdata('role') == 3){
                    $this->session->set_flashdata('error', 'Unauthorized Access.');
                    redirect(base_url('Admin_Dashboard/Home'));
                }else{

                $data['user'] = $this->Admin_crud_model->user_fetch_by_id($uid);
                $data['title'] = 'View User';
                
                $this->load->helper('url');
                $this->load->view('Admin/template/header', $data);
                $this->load->view('Admin/viewUser', $data);
                $this->load->view('Admin/template/footer', $data);
                }
                        
        }
    }
    */
        
     }


        // Edit  UI

        // edit user 

        public function edit_student($uid){


            if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }


            $data['user'] = $this->Admin_crud_model->user_fetch_by_id($uid);
            $data['title'] = 'Edit User';
            
            $this->load->helper('url');
            $this->load->view('Admin/templates/header', $data);
            $this->load->view('Admin/pages/editStudent', $data);
            $this->load->view('Admin/templates/footer', $data);

            /*


            if($this->session->userdata('logged_in') == FALSE || $this->session->userdata('role') == 1 ||
            $this->session->userdata('role') == 2 || $this->session->userdata('role') == 0)
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please login to continue.');
            redirect(base_url('Admin_Login'));

            }else{
                    
            $data['user'] = $this->Admin_crud_model->user_fetch_by_id($uid);
            $data['title'] = 'Edit User';
            
            $this->load->helper('url');
            $this->load->view('Admin/template/header', $data);
            $this->load->view('Admin/editUser', $data);
            $this->load->view('Admin/template/footer', $data);
        }
        */
    }


    /*  **********  Students UI ends ************ */


    /**********  Payments  ************/

    //  form View  UI

    public function make_payment($id)
    {

        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }
        $data['title'] = 'Make Payment'; // Capitalize the first letter
        $data['std'] = $this->Admin_crud_model->user_fetch_by_id($id);

        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/payment', $data);
        $this->load->view('Admin/templates/footer', $data);
    }


    // Tuition Fees Table 

    public function tuition_fees_table()
    {

        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }

        $data['title'] = 'Tuition Fees'; // Capitalize the first letter
        $data['tuition_fees_details'] = $this->Admin_crud_model->fetch_data();

        $this->load->helper('url');
        $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/payment-table', $data);
        $this->load->view('Admin/templates/footer', $data);
    }

   
    // payment receipt

    public function view_receipt()
    {

        if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }

        $std_id = $_GET['std_id'];
        $txn_id = $_GET['txn_id'];

        if(empty($std_id) || empty($txn_id) || strlen($std_id) < 10 || strlen($txn_id) < 6 || strlen($std_id) > 10 || strlen($txn_id) > 6 ){

            // send message to user

            $this->session->set_flashdata('error', 'Invalid Request');

            redirect(base_url('admin/tuition-fees-table'));
        }
       

        else{

       

        $data['title'] = 'Payment Receipt'; // Capitalize the first letter
        $data['payment_data'] = $this->Admin_crud_model->payment_data_fetch_by_id($std_id, $txn_id);

        $this->load->helper('url');
       $this->load->view('Admin/templates/header', $data);
        $this->load->view('Admin/pages/viewReceipt', $data);
        $this->load->view('Admin/templates/footer', $data);
    }
}
    
// edit payment ui 

public function edit_payment()


{


    if(!$this->session->userdata('logged_in') == TRUE || !$this->session->userdata('role') == "Admin")
            {
            $this->session->set_flashdata('error', 'Unauthorized Access. Please Login First!');
            redirect(base_url('admin/login'));

            }


    $std_id = $_GET['std_id'];
    $txn_id = $_GET['txn_id'];

    if(empty($std_id) || empty($txn_id) || strlen($std_id) < 10 || strlen($txn_id) < 6 || strlen($std_id) > 10 || strlen($txn_id) > 6 ){

        // send message to user

        $this->session->set_flashdata('error', 'Invalid Request');

        redirect(base_url('admin/tuition-fees-table'));
    }
    else{

    $data['title'] = 'Edit Payment'; // Capitalize the first letter
    $data['payment_data'] = $this->Admin_crud_model->payment_data_fetch_by_id($std_id, $txn_id);

    $this->load->helper('url');
    $this->load->view('Admin/templates/header', $data);
    $this->load->view('Admin/pages/editPayment', $data);
    $this->load->view('Admin/templates/footer', $data);
}

}
    

}
