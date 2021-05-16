<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerC extends CI_Controller {


  public function __construct(){
    parent::__construct();
	$this->load->model("BannerModel","B");
    }

	public function index()
	{  
		$data=$this->B->Banner();
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('banner',['B'=>$data]);
	    $this->load->view('includes/footer');
	    $this->load->view('js/banner');
	}

	public function BannerAjax(){
	$data=$this->B->BannerAjax($this->input->post("id"));
	print_r(json_encode($data));
	}

	public function BannerUpdate(){
	$res= $this->B->BannerUpdate($this->input->post());
	if($res==1):
		$this->session->set_userdata('success',"Banner Updated Successfully....");
		redirect("BannerC");
	else:
		$this->session->set_userdata('danger',"Something Went Wrong");
	endif;
	}
}

?>