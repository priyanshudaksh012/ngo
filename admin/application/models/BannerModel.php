<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerModel extends CI_Model {

	public function Banner(){

return      $this->db->select("*")
                     ->get("banner")->result_array();
	}

	public function BannerAjax($id){
		return $this->db->select("*")
		                ->where(['id'=>$id])
		                ->get("banner")->result();
	}

	public function BannerUpdate($data){
            $config = array(
'upload_path' => "./assets/ngo/",
'allowed_types' => "gif|jpg|png|jpeg",
'overwrite' => TRUE,
'max_height' => "1277",
'max_width' => "1920"
);
$this->load->library('upload', $config);
$this->upload->do_upload('image');  
$img=$this->upload->data();
if(!empty($img['file_name'])):
	$path=$img['file_name'];
else:
	$path=$data['path'];
endif;
		$set=['slide_cause'=>$data['slide_cause'],
	          'slide_heading'=>$data['slide_heading'],
	           'slide_title'=>$data['slide_title'],
	           'slide_paragraph'=>$data['slide_paragraph'],
	           'slide_button'=>$data['slide_button'],
	            'path'=>$path];
     


       return $this->db->where(['id'=>$data['banner_id']])
                       ->update('banner',$set);
	}
}
