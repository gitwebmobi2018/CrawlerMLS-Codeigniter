<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notify extends CI_Controller {

	function __construct() {
	parent::__construct();
  $this->load->model('notification');

    }
public function index(){
  $this->notification->notify();


}

}
?>
