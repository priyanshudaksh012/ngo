<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OurCauseModel extends CI_Model {

	public function GreeningPlanetData(){

return      $this->db->select("*")
                     ->get("greening_planet")->result_array();
	}

  public function GreeningPlanetUpdate($data){
        $config = array(
'upload_path' => "./assets/ngo/",
'allowed_types' => "gif|jpg|png|jpeg",
'overwrite' => TRUE,
'max_height' => "1277",
'max_width' => "1920"
);
$this->load->library('upload', $config);
$this->upload->do_upload('image1');  
$img=$this->upload->data();
if(!empty($img['file_name'])):
  $path1=$img['file_name'];
else:
  $path1=$data['path1'];
endif;

$this->upload->do_upload('image2');  
$img2=$this->upload->data();
if(!empty($img2['file_name'])):
  $path2=$img2['file_name'];
else:
  $path2=$data['path2'];
endif;
   $set=['paragraph1'=>$data['paragraph1'],
         'paragraph2'=>$data['paragraph2'],
         'paragraph2a'=>$data['paragraph2a'],
         'paragraph2b'=>$data['paragraph2b'],
         'paragraph2c'=>$data['paragraph2c'],
         'paragraph2d'=>$data['paragraph2d'],
         'paragraph3'=>$data['paragraph3'],
         'paragraph4'=>$data['paragraph4'],
         'paragraph5'=>$data['paragraph5'],
         'paragraph6'=>$data['paragraph6'],
         'paragraph7'=>$data['paragraph7'],
         'paragraph8'=>$data['paragraph8'],
         'heading'=>$data['heading'],
         'headinga'=>$data['headinga'],
         'headingb'=>$data['headingb'],
         'headingc'=>$data['headingc'],
         'path1'=>$path1,
         'path2'=>$path2];
      return $this->db->where(['id'=>1])
                     ->update('greening_planet',$set);


  }//Update Our Cause Model...0

  public function RecentActivitesData(){
 return   $this->db->select("*")
             ->from("recent_activites")
              ->get()->result_array();
  }//RecenActivitesData....

  public function RecentActivitesAjax($id){
    return $this->db->select("*")
                   ->where(['id'=>$id])
                   ->get("recent_activites")->result_array();
  }//RecentActivitesAjax....

  public function RecentActivitesUpdate($data){
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
   $set=['heading'=>$data['heading'],
         'dates'=>$data['dates'],
          'coming_soon'=>$data['coming_soon'],
          'path'=>$path];
      return $this->db->where(['id'=>1])
                     ->update('recent_activites',$set);
  }//RecentActivitesData

  public function WasteManagementData(){
return    $this->db->select("*")
                   ->get("waste_management")->result_array();
  }//WasteManagementData

  public function WasteManagementUpdate($data){
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

   $set=['paragraph1'=>$data['paragraph1'],
         'paragraph2'=>$data['paragraph2'],
         'paragraph3'=>$data['paragraph3'],
         'paragraph4'=>$data['paragraph4'],
         'paragraph5'=>$data['paragraph5'],
         'paragraph6'=>$data['paragraph6'],
         'paragraph7'=>$data['paragraph7'],
         'paragraph8'=>$data['paragraph8'],
         'paragraph9'=>$data['paragraph9'],
         'heading'=>$data['heading'],
         'headinga'=>$data['headinga'],
         'headingb'=>$data['headingb'],
         'headingc'=>$data['headingc'],
         'headingd'=>$data['headingd'],
         'path'=>$path,
         'heading2'=>$data['heading2'],
         'paragraph10'=>$data['paragraph10']
         ];
return $this->db->where(['id'=>1])
               ->update('waste_management',$set);

  }

}
