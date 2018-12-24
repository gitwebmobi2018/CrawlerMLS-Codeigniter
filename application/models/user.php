<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// $this->load->library('email');
class User extends CI_Model{
    function __construct(){
          // Call the Model constructor
        parent::__construct();

    }
    function get_users(){
      $this->db->select('*');
       $this->db->from('login_detail');
       $this->db->where('role', 0);
       return $this->db->get();


    }

    function delete_user($id){
      $this -> db -> where('id', $id);
      $this -> db -> delete('login_detail');
    }


}
