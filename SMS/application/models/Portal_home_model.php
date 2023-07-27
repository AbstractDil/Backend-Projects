<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_home_model extends CI_Model {



  /* ============= Notice Model Start ============= */  

// fetch all notice model

 public function notice_fetch(){
    $this->db->order_by('Date_Time', 'DESC');
    $query = $this->db->get('notices');
   return $query->result_array();
}

// fetch notice by slug model

public function notice_fetch_by_slug_url($url_slug){
     
   $this->db->select('*');
   $this->db->where('url_slug',$url_slug);
  $query =  $this->db->get('notices');
  return $query->result();

}

/* ============= Notice Model End ============= */



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

/* ============= Payment Model End ============= */

/*get student data*/

public function get_profile($std_id){
    $this->db->select('*');
    $this->db->where('Student_Id', $std_id);
    $query = $this->db->get('student');
    return $query->result_array();

}

/*get payment data*/

public function get_payment_history($std_id){
  // order by date time
    $this->db->order_by('date', 'DESC');
    $this->db->select('*');
    $this->db->where('Student_Id', $std_id);
    $query = $this->db->get('fees');
    return $query->result_array();
}

}

?>