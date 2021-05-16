<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePageModel extends CI_Model {

   public function CurrentProject(){
return     $this->db->select("*")
              ->from("current_projects")
              ->get()->result_array();
   }//current data

   public function CurrentProjectUpdate($data){
   $config = array(
   'upload_path' => "./assets/ngo/",
   'allowed_types' => "gif|jpg|png|jpeg",
   'overwrite' => TRUE,
   'max_height' => "400",
   'max_width' => "600"
    );
   $this->load->library('upload', $config);
   $this->upload->do_upload('image');  
   $img=$this->upload->data();
   if(!empty($img['file_name'])):
   $path=$img['file_name'];
   else:
   $path=$data['path'];
   endif;

   $set=["cause_heading"=>$data['cause_heading'],
         "cause_paragraph"=>$data['cause_paragraph'],
          "cause_button"=>$data['cause_button'],
          "path"=>$path];
return   $this->db->where(['id'=>$data['position_id']])
            ->update('current_projects',$set) ;   
   }// CurrentProjectUpdate()
   
   public function CurrentProjectAjax($id){
  return  $this->db->select("*")
              ->where(["id"=>$id])
              ->get('current_projects')->result();
   }

   public function LatestNewsData(){
   	return $this->db->select("*")
   	                ->get("latest_news")->result_array();
   }// LatestNewsDAta function end here...

   public function LatestNewsUpdateAjax($id){
   	return $this->db->select("*")
   	                ->where(['id'=>$id])
   	                ->get("latest_news")->result(); 
   }// LatestNewsUpdateAjax end here....

   public function LatestNewsUpdate($data){
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

 $set=["news_paragraph"=>$data['news_paragraph'],
          "news_dates"=>$data['news_dates'],
          "path"=>$path];
return $this->db->where(['id'=>$data['news_id']])
                ->update('latest_news',$set) ;   
   }

}
