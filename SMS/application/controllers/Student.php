<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Kolkata');


class Student extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
        
        
    }

    




    // user login 

public function processlogin(){


   /*
    *   This code is for login after google captcha starts here
    */
   
   

        $std_id = $this->input->post('std_id');


        $user = $this->Auth_model->check_std_id($std_id);

        if(!empty($user)){

        

       

            // check if user is active

            if($user['activity'] == 0){

            // check if password is correct

            if(password_verify($this->input->post('pwd'), $user['pwd'])){

                // store session data

                $this->session->set_userdata('std_id', $user['Student_Id']);

                $this->session->set_userdata('name', $user['Fname']);

                $this->session->set_userdata('lname', $user['Lname']);
               
                $this->session->set_userdata('usertype', $user['UserType']);
                
                $this->session->set_userdata('logged_in', TRUE);

                // update activity

                $activity = '1';
               

                $std_id = $user['Student_Id'];
                

                $this->Auth_model->update_activity($std_id,$activity);

                // flash message

                $this->session->set_flashdata('success', 'You have successfully logged in.');
                redirect(base_url('student/dashboard'));

            }
            else{

                // flash message

                $this->session->set_flashdata('error', 'Incorrect password. Please try again.');
                redirect(base_url(''));

            }
        }else{
                
                // flash message
    
                $this->session->set_flashdata('error', 'Please logout from the system to login again.');

                // reduect after 3 seconds 

                //header('Refresh: 3; URL = '.base_url('logout?std_id='.$user_email.'').' ');
                
                redirect(base_url('logout?std_id='.$std_id.''));
        }

        


    }
    else{
            
            // flash message
    
            $this->session->set_flashdata('error', 'Incorrect Student ID. Please try again.');
            redirect(base_url(''));
    
    }

    /*
    *   This code is for login after google captcha ends here
    */
        



}


// user logout

public function logout(){

    // check if get ueamil is set


 $std_id = $_GET['std_id'];


if(empty($std_id)){

  if($this->session->userdata('logged_in') == FALSE )
  {
    $this->session->set_flashdata('error', 'You need to login to access logout.');
    redirect(base_url());
  }else{

    // update activity

   $activity = '0';

    $uid = $this->session->userdata('std_id');

    $this->Auth_model->update_activity($uid,$activity);

    // destroy session
    $this->session->unset_userdata('logged_in');

    $this->session->sess_destroy();

    
   
    redirect(base_url());
  }}
  else{

    // update activity 

    $activity = '0';

     $check =  $this->Auth_model->update_activity_std_id($std_id,$activity);

        if($check){
    
            // destroy session
    
            $this->session->set_flashdata('error', 'You are already logged in. Please logout from the system to login again.');

    
            redirect(base_url('login'));
    
        }
        else{
    
            // flash message
    
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect(base_url('login'));
    
        }
  }


}

}


?>