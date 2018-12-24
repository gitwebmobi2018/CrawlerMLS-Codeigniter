<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Properties extends CI_Controller {

	function __construct() {
	parent::__construct();
  $this->load->model('login_model','login');
  $this->load->model('property');
  $this->load->model('notification');
  $this->load->library('pagination');
  $this->load->helper('url');
    }
public function index(){
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

function search(){
	$params["results"] = $this->property->search($_POST['higher'], $_POST['lower'], $_POST['bedrooms'], $_POST['bathrooms'], $_POST['floors'], $_POST['lot'], $_POST['construction']);
	$params["links"] = "NULL";
	$this->load->view('index', $params);
}

function searchById(){
	if($_SESSION["role"] == 0){
		  $this->load->view('login');
	  }else{
	$params["results"] = $this->property->searchById($_POST['id']);
	$params["links"] = "NULL";
	$this->load->view('index', $params);
	  }
}

function sendMessage(){
	$this->notification->sendMessage($_POST['message'], $_POST['subject']);
	$this->load->view('index1');
}

}
