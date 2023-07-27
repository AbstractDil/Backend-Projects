<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
-------------------------------------
Change date time zone to Asia/Kolkata
-------------------------------------
| All date and time will be in Asia/Kolkata timezone
| Do not change this timezone

*/

date_default_timezone_set('Asia/Kolkata');


/*
-------------------------------------
Code For Generate Random String 
-------------------------------------
| Generate random number based on datetime

*/

function random_strings($length_of_string)
{
return substr(bin2hex(md5(date('d/m/Y h:i:s A'))), 0, $length_of_string);
}


class Admin_crud extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('Admin_crud_model');
        
        
    }




    /*=============  Testing  Start =============*/


   

    /*=============  Testing  End =============*/


    

    /*********  Student Crud  Start ************/


    public function create_student()
    {

        
    
    
        // Check validation for user input in SignUp form
    
        
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[student.email]');
       
    
    
        if ($this->form_validation->run() == FALSE) {
            // flash message
            $this->session->set_flashdata('error', 'Email already exists. Please try again.');
            
            redirect(base_url('admin/student'));

        } else {
    
          
           $name = preg_replace('/\s+/', '', $this->input->post('Fname')); 
            $generate_password = trim($name.'@'.random_strings(3));
            
            $data = array(
                'Fname' => $this->input->post('Fname', TRUE),
                'Lname' => $this->input->post('Lname', TRUE),
                'mob' => $this->input->post('mob', TRUE),
                'class' => $this->input->post('class', TRUE),
                'school' => $this->input->post('school', TRUE),
                'fees' => $this->input->post('fees', TRUE),




                'email' => $this->input->post('email', TRUE),
                // 'password' => $this->input->post('password'),
                //'password' => $this->input->post('confirm_password'),
                // store password in hash format
                 'pwd' => password_hash($generate_password,PASSWORD_DEFAULT),
                'Student_Id' => "MS". date('Y') . random_strings(4),
                'Date_Time' => date('Y-m-d H:i:s')
                //'ip' => $this->input->ip_address()
                // 'otp' => random_strings(6),
                
    
            );
    
            $result = $this->Admin_crud_model->insert_user($data);

           if ($result) {

             
                
                // flash message
                $this->session->set_flashdata('success', 'User Added Successfully.');
              //  redirect(base_url('otp_verification?uid='.$data['uid'].''));
    
              redirect(base_url('admin/student'));
    
           }
    
             
             else {
                
                // flash message
                $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
                redirect(base_url('admin/student'));
                
            }
            
        }
    
    
    }


    // Edit user details
 
public function edit_student_confirm($uid)
{

    $data = array(
                'Fname' => $this->input->post('Fname', TRUE),
                'Lname' => $this->input->post('Lname', TRUE),
                'mob' => $this->input->post('mob', TRUE),
                'class' => $this->input->post('class', TRUE),
                'school' => $this->input->post('school', TRUE),
                'fees' => $this->input->post('fees', TRUE),
               'pwd' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),

                'update_on' => date('Y-m-d H:i:s')


    );

       $result = $this->Admin_crud_model->update_user($uid, $data);
    
       if ($result) {
    
           // flash message
           $this->session->set_flashdata('success', 'Student details has been updated.');
           redirect(base_url('admin/student'));

         } else {
                
           // flash message
           $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
           redirect(base_url('admin/student'));
            
         }

    

}

// change password

public function student_change_password($sid){

    $data = array (
        'pwd' => password_hash($this->input->post('password',TRUE), PASSWORD_DEFAULT),
        'update_on' => date('Y-m-d H:i:s')
    );

    $status = $this->Admin_crud_model->change_password($sid, $data);

    if ($status) {

        // flash message
        $this->session->set_flashdata('success', 'Password Changed Successfully.');
        redirect(base_url('admin/student'));
    }
        else {
            // flash message
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect(base_url('admin/student'));
        }


}

// delete user

public function delete_student($uid){

    $result = $this->Admin_crud_model->user_delete($uid);

    if ($result != false) {

        // flash message
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect(base_url('admin/student'));
    } else {
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/student'));
    }

}




    /*********  Student Crud  End ************/
	
	

    /********** Notice & Slider Start ************/

    
      // create notice 


public function create_notice(){

    //check if body name already exists

    $this->db->where('notice_title', $this->input->post('title'));

    $query = $this->db->get('notices');

    if($query->num_rows() > 0){

        $this->session->set_flashdata('error', ' Already Exists!');

        redirect(base_url('admin/notice'));

    }else{

    // insert data into database

    $data = array(
        'notice_title' => $this->input->post('title'),

        'notice_link' => $this->input->post('link'),
        'url_slug' => url_title($this->input->post('title'), 'dash', TRUE),
        'status' => $this->input->post('status'),
        'Date_Time' => date('Y-m-d H:i:s')
        

    );


        
     $result = $this->Admin_crud_model->notice_insert($data);

        if ($result) {
    
            // flash message
            $this->session->set_flashdata('success', 'Notice Added Successfully!');
            redirect(base_url('admin/notice'));
    
        } else {
                
            // flash message
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect(base_url('admin/notice'));
        }


}
}

// edit notice BY id 

public function edit_notice_confirm($id){

    $data = array(
        'notice_title' => $this->input->post('title'),
        'notice_link' => $this->input->post('link'),
        // 'url_slug' => url_title($this->input->post('title'), 'dash', TRUE),
        'status' => $this->input->post('status'),
       'Date_Time' => date('Y-m-d H:i:s')
    );

    $result = $this->Admin_crud_model->notice_update($id, $data);

    if ($result) {

        // flash message
        $this->session->set_flashdata('success', 'Notice Updated Successfully!');
        redirect(base_url('admin/notice'));
    } else {
            
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/notice'));
    }   

}

// delete notice by id

public function delete_notice($id){

    $result = $this->Admin_crud_model->notice_delete($id);

    if ($result != false) {

        // flash message
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect(base_url('admin/notice'));
    } else {
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/notice'));
    }
}

  


   /********************  Notice & Slider Ends  **********************/

    /********** Payment Start  ************/

    // create payment

public function create_tuition_fees(){



    // check if month already exists for student id

    $this->db->where('Student_Id', $this->input->post('std_id'));

    $this->db->where('month', $this->input->post('month'));

    $query = $this->db->get('fees');

    if($query->num_rows() > 0){

        $this->session->set_flashdata('error', 'Payment Already Exists For This Month !');

        redirect(base_url('admin/student'));

    }else{


  
    $data = array(
        'Student_Id' => $this->input->post('std_id'),
        
        'Transaction_Id' => "TR" . random_strings(4),

        'month' => $this->input->post('month'),
        
        'fees' => $this->input->post('fees'),
        'amount_paid' => $this->input->post('amount_paid'),
        'due' => $this->input->post('due'),
        'mode' => $this->input->post('mode'),
        'comment' => $this->input->post('comment'),
        'status' => $this->input->post('status'),
        'date' => date('Y-m-d H:i:s')
    );

    $result = $this->Admin_crud_model->tuition_fees_insert($data);

    if ($result) {

        // flash message
        $this->session->set_flashdata('success', 'Payment Added Successfully!');
        redirect(base_url('admin/student'));
    } else {
            
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/student'));
    }

}
}

// edit payment by id


public function edit_payment_confirm($txn_id, $std_id){

  
    $data = array(
        //'Student_Id' => $this->input->post('std_id'),
        
        //'Transaction_Id' => "TR" . random_strings(4),

        'month' => $this->input->post('month'),
        
        'fees' => $this->input->post('fees'),
        'amount_paid' => $this->input->post('amount_paid'),
        'due' => $this->input->post('due'),
        'mode' => $this->input->post('mode'),
        'comment' => $this->input->post('comment'),
        'status' => $this->input->post('status'),
        'date' => date('Y-m-d H:i:s')
    );

    $result = $this->Admin_crud_model->payment_update($txn_id,$data);

    if ($result) {

        // flash message
        $this->session->set_flashdata('success', 'Payment Details Updated Successfully!');
        redirect(base_url('admin/view-receipt?std_id='.$std_id.'&txn_id='.$txn_id));
    } else {
            
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/student'));
    }

}

// delete payment by id

public function delete_payment($std_id,$txn_id){

    $result = $this->Admin_crud_model->payment_delete($txn_id);

    if ($result != false) {

        // flash message
        $this->session->set_flashdata('success', 'Deleted Successfully.');
        redirect(base_url('admin/student/view/'.$std_id));
    } else {
        // flash message
        $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
        redirect(base_url('admin/student/view/'.$std_id.''));
    }
}



     
}
