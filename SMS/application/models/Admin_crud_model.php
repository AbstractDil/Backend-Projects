<?php

defined('BASEPATH') OR exit('No direct script access allowed');







class Admin_crud_model extends CI_Model{



    /*=============  Student Model  Start =============*/

    // create user

    public function insert_user($data)
    
    {

        $this->db->insert('student', $data);

        if ($this->db->affected_rows() > 0) {

            return true;

        } else {

            return false;

        }

    }

    // fetch all user model

    public function user_fetch(){
        $this->db->order_by('Date_Time', 'DESC');

        $query = $this->db->get('student');
        

        return $query->result_array();


    }

    // fetch user by id model

    public function user_fetch_by_id($uid){
      
        $this->db->select('*');
        $this->db->where('Student_Id',$uid);
       $query =  $this->db->get('student');
       return $query->result();
    }


    // edit user model

    public function update_user($uid,$data){
        $this->db->where('Student_Id', $uid);
        $this->db->update('student', $data);
        // check if update success
        if ($this->db->affected_rows() > 0) {
 
            return true;

        } else {

            return false;

        }

    }


    // change user password model

    public function change_password($sid,$data){
        $this->db->where('Student_Id', $sid);
        $this->db->update('student', $data);
        // check if update success
        if ($this->db->affected_rows() > 0) {
 
            return true;

        } else {

            return false;

        }

    }

    // delete user model

    public function user_delete($uid){
        $this->db->where('Student_Id', $uid);
        $this->db->delete('student');

        // check 

        if ($this->db->affected_rows() > 0) {
 
            return true;

        } else {

            return false;

        }

    }

    /*=============  Student Model  End =============*/

    /*=============  Notice & Slider Model  Start =============*/

    // create notice model

     // create notice model

     public function notice_insert($data){
        $this->db->insert('notices', $data);
        // check if insert success
        if ($this->db->affected_rows() > 0) {
 
            return true;

        } else {

            return false;

        }
    }

    // fetch all notice model

    public function notice_fetch(){
        // order by Date DESC
        $this->db->order_by('Date_Time', 'DESC');
        $query = $this->db->get('notices');
        return $query->result_array();
    }

   // fetch notice by id model


   public function notice_fetch_by_id($notice_id){
      
    $this->db->select('*');
    $this->db->where('sno',$notice_id);
   $query =  $this->db->get('notices');
   return $query->result();
}

// edit notice model 

public function notice_update($id,$data){
    $this->db->where('sno', $id);
    $this->db->update('notices', $data);
    // check if update success
    if ($this->db->affected_rows() > 0) {

        return true;

    } else {

        return false;

    }

}


// delete notice model

public function notice_delete($id){
    $this->db->where('sno', $id);
    $this->db->delete('notices');

    // check 

    if ($this->db->affected_rows() > 0) {

        return true;

    } else {

        return false;

    }
}

/* ============= Notice & Slider Model End ============= */

/* ============= payment Start ============= */

// create payment model

public function tuition_fees_insert($data){
    
    $this->db->insert('fees', $data);

    // check if insert success
    if ($this->db->affected_rows() > 0) {

        return true;

    } else {

        return false;

    }
}

// fetch data from two tables

public function fetch_data(){
    $this->db->select('fees.*, student.Student_Id, student.photo, student.Fname, student.Lname, student.fees,student.class');
    $this->db->from('fees');
    $this->db->join('student', 'student.Student_Id = fees.Student_Id');
    $query = $this->db->get();
    return $query->result_array();

}

/* ============= Payment Model Start ============= */

// fetch payment data by id model from fees table and student table where student id is equal to fees table student id and fees table student id is equal to student id from payment receipt page 

public function payment_data_fetch_by_id($std_id, $txn_id){
  
    $this->db->select('fees.*, student.*');
    $this->db->from('fees');
    $this->db->join('student', 'fees.Student_Id = student.Student_Id');
    $this->db->where('fees.Student_Id', $std_id);
    $this->db->where('fees.Transaction_Id', $txn_id);
    $query = $this->db->get();
    return $query->result_array();
}




// edit payment model

public function payment_update($txn_id,$data){
    $this->db->where('Transaction_Id', $txn_id);
    $this->db->update('fees', $data);
    // check if update success
    if ($this->db->affected_rows() > 0) {

        return true;

    } else {

        return false;

    }

}

// payment fetch by uid 

public function payment_fetch_by_uid($uid){
    $this->db->order_by('date', 'DESC');

    $this->db->select('*');
    $this->db->where('Student_Id',$uid);
   $query =  $this->db->get('fees');
   return $query->result();
}


// delete payment model

public function payment_delete($txn_id){
    $this->db->where('Transaction_Id', $txn_id);
    $this->db->delete('fees');

    // check 

    if ($this->db->affected_rows() > 0) {

        return true;

    } else {

        return false;

    }
}

/* ============= Payment Model End ============= */





}