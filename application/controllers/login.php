<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	function __construct() {
	parent::__construct();
  $this->load->model('login_model','login');
  $this->load->model('user');
  $this->load->model('property');
  $this->load->library('pagination');
  $this->load->helper('url');
  $this->load->model('notification');
    }
public function index(){
  if(isset($_POST['email'])){

    if($this->login->update_login() == "User"){
        $params = array();
        $limit_per_page = 12;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->property->get_total();

        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->property->get_current_page_records($limit_per_page,  $page*$limit_per_page);
            $params["total_records"] = $total_records;

            $config['base_url'] = base_url() . 'properties/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $config['num_links'] = 6;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="container"> ';
            $config['full_tag_close'] = '</div>';

            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink" style="background-color: #AC9C9C"> >';
            $config['first_tag_close'] = '</span>';

            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink" style="background-color: #AC9C9C">>';
            $config['last_tag_close'] = '</span>';

            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink" style="background-color: #AC9C9C">> ';
            $config['next_tag_close'] = '</span>';

            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink" style="background-color: #AC9C9C">>';
            $config['prev_tag_close'] = '</span>';

            $config['cur_tag_open'] = '<span class="curlink" style="background-color: #AC9C9C">>';
            $config['cur_tag_close'] = '</span>';

            $config['num_tag_open'] = '<span class="numlink" style="background-color: #AC9C9C">>';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);

            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

        $this->load->view('index', $params);


    }else if($this->login->update_login() == "Admin"){
      $data['users'] = $this->user->get_users()->result();
$data['msg'] = "";
      $this->load->view('admin', $data);

    }else if($this->login->update_login() == "error"){
			$this->load->view('login');
		}

}else{
		if(isset($_SESSION["email"])){
		if($_SESSION["role"] == 0){
			$params = array();
			$limit_per_page = 12;
			$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
			$total_records = $this->property->get_total();

			if ($total_records > 0)
			{
					// get current page records
					$params["results"] = $this->property->get_current_page_records($limit_per_page,  $page*$limit_per_page);
					$params["total_records"] = $total_records;

					$config['base_url'] = base_url() . 'properties/index';
					$config['total_rows'] = $total_records;
					$config['per_page'] = $limit_per_page;
					$config["uri_segment"] = 3;

					$config['num_links'] = 2;
					$config['use_page_numbers'] = TRUE;
					$config['reuse_query_string'] = TRUE;

					$config['full_tag_open'] = '<div class="row" ';
					$config['full_tag_close'] = '</div>';

					$config['first_link'] = 'First Page';
					$config['first_tag_open'] = '<span class="firstlink" style="background-color: #AC9C9C"> >';
					$config['first_tag_close'] = '</span>';

					$config['last_link'] = 'Last Page';
					$config['last_tag_open'] = '<span class="lastlink" style="background-color: #AC9C9C">>';
					$config['last_tag_close'] = '</span>';

					$config['next_link'] = 'Next Page';
					$config['next_tag_open'] = '<span class="nextlink" style="background-color: #AC9C9C">> ';
					$config['next_tag_close'] = '</span>';

					$config['prev_link'] = 'Prev Page';
					$config['prev_tag_open'] = '<span class="prevlink" style="background-color: #AC9C9C">>';
					$config['prev_tag_close'] = '</span>';

					$config['cur_tag_open'] = '<span class="curlink" style="background-color: #AC9C9C">>';
					$config['cur_tag_close'] = '</span>';

					$config['num_tag_open'] = '<span class="numlink" style="background-color: #AC9C9C">>';
					$config['num_tag_close'] = '</span>';

					$this->pagination->initialize($config);

					// build paging links
					$params["links"] = $this->pagination->create_links();
			}

			$this->load->view('index', $params);

		}else if($_SESSION["role"] == 1){
			$data['users'] = $this->user->get_users()->result();
$data['msg'] = "";
			$this->load->view('admin', $data);

		}}else{
    $this->load->view('login');
		}
  }

}

function pagination(){
  $params = array();
  $limit_per_page = 12;
  $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
  $total_records = $this->property->get_total();

  if ($total_records > 0)
  {
      // get current page records
      $params["results"] = $this->property->get_current_page_records($limit_per_page,  $page*$limit_per_page);
      $params["total_records"] = $total_records;

      $config['base_url'] = base_url() . 'property/list';
      $config['total_rows'] = $total_records;
      $config['per_page'] = $limit_per_page;
      $config["uri_segment"] = 3;

      $config['num_links'] = 2;
      $config['use_page_numbers'] = TRUE;
      $config['reuse_query_string'] = TRUE;

      $config['full_tag_open'] = '<div class="pagination" ';
      $config['full_tag_close'] = '</div>';

      $config['first_link'] = 'First Page';
      $config['first_tag_open'] = '<span class="firstlink" style="background-color: #AC9C9C"> >';
      $config['first_tag_close'] = '</span>';

      $config['last_link'] = 'Last Page';
      $config['last_tag_open'] = '<span class="lastlink" style="background-color: #AC9C9C">>';
      $config['last_tag_close'] = '</span>';

      $config['next_link'] = 'Next Page';
      $config['next_tag_open'] = '<span class="nextlink" style="background-color: #AC9C9C">> ';
      $config['next_tag_close'] = '</span>';

      $config['prev_link'] = 'Prev Page';
      $config['prev_tag_open'] = '<span class="prevlink" style="background-color: #AC9C9C">>';
      $config['prev_tag_close'] = '</span>';

      $config['cur_tag_open'] = '<span class="curlink" style="background-color: #AC9C9C">>';
      $config['cur_tag_close'] = '</span>';

      $config['num_tag_open'] = '<span class="numlink" style="background-color: #AC9C9C">>';
      $config['num_tag_close'] = '</span>';

      $this->pagination->initialize($config);

      // build paging links
      $params["links"] = $this->pagination->create_links();
  }

  $this->load->view('index', $params);


}

function register(){
    $this->login->register();
    $data['users'] = $this->user->get_users()->result();
		$data['msg'] = "";
    $this->load->view('admin', $data);
}

function userRegister(){
	$email  = $this->input->post('email');
	//$first_name  = $this->input->post('first_name');
	//$last_name  = $this->input->post('last_name');
	//$password  = $this->input->post('password');
	$userExist = $this->login->checkUser();
	if($userExist == "True"){
		$data['emailErr'] = "Email Address Already Registered";
		$this->load->view('login', $data);
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$data['emailErr'] = "Invalid email address";
		$this->load->view('login', $data);
	}else{
		$this->login->register();
        $params = array();
        $limit_per_page = 12;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->property->get_total();

        if ($total_records > 0)
        {
            // get current page records
            $params["results"] = $this->property->get_current_page_records($limit_per_page,  $page*$limit_per_page);
            $params["total_records"] = $total_records;

            $config['base_url'] = base_url() . 'properties/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;

            $config['num_links'] = 6;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['full_tag_open'] = '<div class="container"> ';
            $config['full_tag_close'] = '</div>';

            $config['first_link'] = 'First Page';
            $config['first_tag_open'] = '<span class="firstlink" style="background-color: #AC9C9C"> >';
            $config['first_tag_close'] = '</span>';

            $config['last_link'] = 'Last Page';
            $config['last_tag_open'] = '<span class="lastlink" style="background-color: #AC9C9C">>';
            $config['last_tag_close'] = '</span>';

            $config['next_link'] = 'Next Page';
            $config['next_tag_open'] = '<span class="nextlink" style="background-color: #AC9C9C">> ';
            $config['next_tag_close'] = '</span>';

            $config['prev_link'] = 'Prev Page';
            $config['prev_tag_open'] = '<span class="prevlink" style="background-color: #AC9C9C">>';
            $config['prev_tag_close'] = '</span>';

            $config['cur_tag_open'] = '<span class="curlink" style="background-color: #AC9C9C">>';
            $config['cur_tag_close'] = '</span>';

            $config['num_tag_open'] = '<span class="numlink" style="background-color: #AC9C9C">>';
            $config['num_tag_close'] = '</span>';

            $this->pagination->initialize($config);

            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

        $this->load->view('index', $params);
}


}

function delete_user(){
  $id = $this->input->post('id');
  $this->user->delete_user($id);
}
function logout(){
	
	unset($_SESSION["email"]);
	unset($_SESSION["role"]);
    unset($_SESSION["id"]);
	unset($_SESSION["cart"]);
	unset($_SESSION["first_name"]);
	$this->load->view('login');

}
function addToCart(){

	$property_id = $this->input->post('property_id');
	$user_id = $this->input->post('user_id');
	$this->db->select('*');
	 $this->db->from('login_detail');
	 $this->db->where('id', $user_id);
	$query = $this->db->get();
	if( $query->num_rows()>0 ){

	foreach ($query->result() as $login){
	 $cartProperty = $login->cart;
	 $cartProperty .= " ".$property_id;
	 $data = array(
			'cart' => $cartProperty
	);
	$this->db->where('id', $user_id);
	$this->db->update('login_detail', $data);
	$this->notification->notifyAdmin();
	echo "Added";


	}
	}
	else{
		echo "Error";
	}
}

function removeFromCart(){

	$property_id = $this->input->post('property_id');
	$user_id = $this->input->post('user_id');
	$this->db->select('*');
	 $this->db->from('login_detail');
	 $this->db->where('id', $user_id);
	$query = $this->db->get();
	if( $query->num_rows()>0 ){

	foreach ($query->result() as $login){
	 $cartProperty = $login->cart;
	 $cartProperty = explode(" ",$cartProperty);
	 $new_array=array_diff($cartProperty,array($property_id));
	 $cartProperty = implode(" ",$new_array);
	 $data = array(
			'cart' => $cartProperty
	);
	$this->db->where('id', $user_id);
	$this->db->update('login_detail', $data);
	echo "deleted";



	}
	}
	else{
		echo "Error";
	}
}

function change(){


	$data['msg'] = $this->login->change();
	$data['users'] = $this->user->get_users()->result();

	$this->load->view('admin', $data);

}

}
