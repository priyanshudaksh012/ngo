<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OurCause extends CI_Controller {


  public function __construct(){
    parent::__construct();
	$this->load->model("OurCauseModel","O");
    }

	public function GreeningPlanet()
	{  
		$data=$this->O->GreeningPlanetData();
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('greening_planet',['D'=>$data]);
	    $this->load->view('includes/footer');
	}//GreeningPlanet..

	public function GreeningPlanetUpdate(){
		$res=$this->O->GreeningPlanetUpdate($this->input->post());
		if($res){
	     $this->session->set_userdata("success","Greening Planet Data Updated Successfully");
         redirect("OurCause/GreeningPlanet");
		}else{
	     $this->session->set_userdata("danger","Something Went Wrong....");
         redirect("OurCause/GreeningPlanet");

		}

	}//Greening planet function end here..

	public function RecentActivites(){
		$data=$this->O->RecentActivitesData();
		$this->load->view("includes/header");
		$this->load->view("includes/sidebar");
        $this->load->view('recent_activites',['D'=>$data]);
		$this->load->view("includes/footer");
		$this->load->view("js/our_cause");
	}//RecentActivites.....

	public function RecentActivitesAjax(){
   $data=$this->O->RecentActivitesAjax($this->input->post('id'));
   print_r(json_encode($data));
	}//RecentActivitesAjax..

   public function RecentActivitesUpdate(){
   	$res=$this->O->RecentActivitesUpdate($this->input->post());
   	if($res){
    $this->session->set_userdata("success","RecentActivites Updated Successfully");
    redirect("OurCause/RecentActivites");
   	}else{
    $this->session->set_userdata("danger","Something Went Wrong...");
    redirect("OurCause/RecentActivites");
   	}
   }//RecentActivitesUpdate

}

?>