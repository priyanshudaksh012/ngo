<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


	public function Login($data){
      $email=$data['email'];
      $password=$data['password'];
return      $this->db->select("*")
                     ->where(['email'=>$email,'password'=>$password])
                     ->get("admin")->num_rows();
	}
}
