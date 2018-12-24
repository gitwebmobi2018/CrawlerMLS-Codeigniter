<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Showcart extends CI_Controller {

	function __construct() {
	parent::__construct();

    }
public function index(){
  $result = array();
  $results = array();
  $user_id = $_SESSION['id'];
  $this->db->select('*');
   $this->db->from('login_detail');
   $this->db->where('id', $user_id);
  $query = $this->db->get();
  if( $query->num_rows()>0 ){

  foreach ($query->result() as $login){
    $proerties = explode(" ", $login->cart);
    foreach($proerties as $p){
      $this->db->select('*');
       $this->db->from('property');
       $this->db->where('id', $p);
       array_push($result, $this->db->get()->result());

    }

  }
}

$results['results'] = $result;
$this->load->view('cart', $results);


}
}
?>
