<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// $this->load->library('email');
class Property extends CI_Model{
    function __construct(){
          // Call the Model constructor
        parent::__construct();

    }
    function get_properties(){
      $this->db->select('*');
       $this->db->from('property');
       return $this->db->get();

    }

    function get_total(){
      return $this->db->count_all("property");
    }

    public function get_current_page_records($limit, $start)
   {
	
       $this->db->limit($limit, $start);
       $query = $this->db->get("property");

       if ($query->num_rows() > 0)
       {
           foreach ($query->result() as $row)
           {
               $data[] = $row;
           }

           return $data;
       }

       return false;
   }

function search($higher, $lower, $bedrooms, $bathrooms, $floors, $lot, $construction){

      $this->db->select('*');
      $this->db->from('property');
      $this->db->where('price >=', $lower);
      if($_POST['higher'] != "" && (int)$_POST['higher'] > (int)$_POST['lower']){
		$this->db->where('price <=', $higher);
$this->db->order_by('price', 'ASC');
	}
	if($_POST['bedrooms'] != ""){
		$this->db->or_where('bedrooms', $bedrooms);

	}
	if($_POST['bathrooms'] != ""){
		$this->db->or_where('bathrooms', $bathrooms);
		
	}
	if($_POST['floors'] != ""){
		$this->db->or_where('floors', $floors);
		
	}
	if($_POST['lot'] != ""){
		$this->db->or_where('lot', $lot);
		
	}
	if($_POST['construction'] != ""){
		$this->db->or_where('construction', $construction);
		
	}  
      return $this->db->get()->result();

   }
   
   function searchById($id){
      $this->db->select('*');
      $this->db->from('property');
      $this->db->where('id=', $id);
		  return $this->db->get()->result();
   }
}
