<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardC extends CI_Controller {

 function  __consturct(){
    parent::__consturct();
 }
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('dashboard');
	    $this->load->view('includes/footer');
	}
}

?>