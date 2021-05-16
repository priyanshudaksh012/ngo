<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {


  public function __construct(){
    parent::__construct();
	$this->load->model("AboutModel","A");
    }

	public function whoWeAre()
	{  
		$data=$this->A->whoWeAreData();
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('who_we_are',['D'=>$data]);
	    $this->load->view('includes/footer');
	}

	public function whoWeAreUpdate(){
	$res=$this->A->whoWeAreUpdate($this->input->post());

	if($res==1){
     $this->session->set_userdata("success","Who We Are Updated Successfullyy...");
     redirect("About/whoWeAre");
	}else{
     $this->session->set_userdata("danger","Something Went Wrong");
     redirect("About/whoWeAre");

	 }
	}//Who We Are Update...


	public function MeetOurTeam(){
      $this->load->view('includes/header');
	  $this->load->view('includes/sidebar');
	  $data=$this->A->MeetOurTeamData();
	  $this->load->view('meet_our_team',['D'=>$data]);
	  $this->load->view('includes/footer');
	  $this->load->view("js/about");
	}//MeetOurTeam...

	public function MeetOurTeamUpdate(){
	$res=$this->A->MeetOurTeamUpdate($this->input->post());
     if($res){
        $this->session->set_userdata("success","Member Updated Successfully");
        redirect("About/MeetOurTeam");
     }else{
            $this->session->set_userdata("danger","Something Went Wrong");
        redirect("About/MeetOurTeam");
      }
	}//MeetOurTeam

	   public function  AboutAjax(){
    $data=$this->A->AboutAjax($this->input->post("id"));
	print_r(json_encode($data));
    }//AboutAjax
}

?>