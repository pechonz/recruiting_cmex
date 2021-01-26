<?php  
 class Userverify_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           $this->db->where('NUM_OT', $username);  
           $this->db->where('Upass', $password);  
           $query = $this->db->get('tb_nuser'); 
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  
 }  