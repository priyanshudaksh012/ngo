<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePage extends CI_Controller {
   public function __construct(){
   	parent::__construct();
   
	$this->load->model("HomePageModel","H");
   }

   public function CurrentProject(){
   		$this->load->view('includes/header');
	$this->load->view('includes/sidebar');
       $data=$this->H->CurrentProject();
   	$this->load->view("CurrentProject",['D'=>$data]);
   	$this->load->view("includes/footer");
   	$this->load->view("js/currentproject");
   }

   public function CurrentProjectUpdate(){
   	 $res=$this->H->CurrentProjectUpdate($this->input->post());
   	 if($res==1):
		$this->session->set_userdata('success',"Current Projects Updated Successfully....");
		redirect("HomePage/CurrentProject");
	else:
		$this->session->set_userdata('danger',"Something Went Wrong");
	endif;
   }//CurrentProjectUpdate...

    public function  CurrentProjectAjax(){
    $data=$this->H->CurrentProjectAjax($this->input->post("id"));
	print_r(json_encode($data));
    }//CurrentProjectAjax

    public function LatestNewsView(){
    	   		$this->load->view('includes/header');
	$this->load->view('includes/sidebar');
       $data=$this->H->LatestNewsData();
   	$this->load->view("LatestNews",['D'=>$data]);
   	$this->load->view("includes/footer");
   	$this->load->view("js/news");

    } //LatestNewsView

    public function LatestNewsUpdate(){
    $res=$this->H->LatestNewsUpdate($this->input->post());
     if($res==1):
		$this->session->set_userdata('success',"Latest News Updated Successfully....");
		redirect("HomePage/LatestNewsView");
	else:

		$this->session->set_userdata('danger',"Something Went Wrong");
	redirect("HomePage/LatestNewsView");
	endif;

    }//LatesNewsUpdates

        public function  LatestNewsUpdateAjax(){
    $data=$this->H->LatestNewsUpdateAjax($this->input->post("id"));
	print_r(json_encode($data));
    }//CurrentProjectAjax


}
