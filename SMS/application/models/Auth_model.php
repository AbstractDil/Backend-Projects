<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{


    
   // check username exist or not
   public function check_std_id($std_id)
   {
       $query = $this->db->get_where('student', array('Student_Id' => $std_id));
       return $query->row_array();
   }


   // update user activity status
    public function update_activity($std_id, $activity)
    {
         $this->db->where('Student_Id', $std_id);
         $this->db->update('student', array('activity' => $activity, 'last_login' => date('Y-m-d H:i:s')));
    }

    public function update_activity_std_id($std_id, $activity)
    {
         $this->db->where('Student_Id', $std_id);
         $this->db->update('student', array('activity' => $activity));

         // check updated or not

            if ($this->db->affected_rows() > 0) {
    
                return true;

            } else {

                return false;

            }
    }


     // update user model

     public function update_user($std_id,$data){
        $this->db->where('Student_Id', $std_id);
        $this->db->update('student', $data);
        // check if update success
        if ($this->db->affected_rows() > 0) {
 
            return true;

        } else {

            return false;

        }

    }

      // check username exist or not
   public function check_user_email($user_email)
   {
       $query = $this->db->get_where('student', array('email' => $user_email));
       return $query->row_array();
   }


}
?>