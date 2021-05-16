<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller  {

   public function __construct(){
    parent::__construct();
	$this->load->model("LoginModel","L");
    }

	public function index()
	{
      $res=$this->L->Login($this->input->post());
         if($res==1){
           return     redirect("DashboardC");
          }else{
          $this->session->set_userdata("success","Username Or Password Doesn't Match ");
       return     redirect("Welcome");
              }

	}// function end here.....


  public function Logout(){
return    redirect("Welcome");
  }
}
