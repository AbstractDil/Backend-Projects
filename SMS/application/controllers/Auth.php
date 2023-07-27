<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
        
        
    }


    // Admin Login Verify 

public function Admin_Login_Verify(){

    // check if user is already logged in

    if($this->session->userdata('uid')){

        redirect(base_url('Admin_Dashboard/Home'));

    }
    else{

        

        $user_email = $this->input->post('email');
        $user = $this->Auth_model->check_user_email($user_email);

        if(!empty($user)){

            if($user['UserType'] == "Admin"){

            $password = $this->input->post('password');

            if(password_verify($password, $user['pwd'])){

                // store session data

                $this->session->set_userdata('std_id', $user['Student_Id']);
                $this->session->set_userdata('email', $user['email']);
                $this->session->set_userdata('name', $user['Fname']);
                $this->session->set_userdata('lname', $user['Lname']);
                $this->session->set_userdata('role', $user['UserType']);
                // created on 
               //  $this->session->set_userdata('Date_Time', $user['Date_Time']);
                $this->session->set_userdata('logged_in', TRUE);

                // update activity

                $activity = '1';

                $std_id = $user['Student_Id'];
                

                $this->Auth_model->update_activity($std_id,$activity);

                // flash message

                $this->session->set_flashdata('success', 'You have successfully logged in.');
                redirect(base_url('admin/dashboard'));

            }
            else{

                // flash message

                $this->session->set_flashdata('error', 'Incorrect password. Please try again.');
                redirect(base_url('admin/login'));

            }
        }
        else{

            // flash message

            $this->session->set_flashdata('error', 'You are not authorized to access this page.');
            redirect(base_url('admin/login'));

        }


}
else{
            
            // flash message
    
            $this->session->set_flashdata('error', 'Email does not exists. Please try again.');
            redirect(base_url('admin/login'));
    
    }
}


}


// admin logout


public function logout(){

    // check if get ueamil is set



  if($this->session->userdata('logged_in') == FALSE )
  {
    $this->session->set_flashdata('error', 'You need to login to access logout.');
    redirect(base_url('admin/login'));
  }else{

    // update activity

   $activity = '0';

    $uid = $this->session->userdata('uid');

    $this->Auth_model->update_activity($uid,$activity);

    // destroy session
    $this->session->unset_userdata('logged_in');

    $this->session->sess_destroy();

   
    redirect(base_url('admin/login'));
  
  }


}

}

?>