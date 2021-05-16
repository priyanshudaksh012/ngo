<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutModel extends CI_Model {

	public function WhoWeAreData(){

return      $this->db->select("*")
                     ->get("who_we_are")->result_array();
	}

	public function WhoWeAreUpdate($data){
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
         'paragraph1'=>$data['paragraph1'],
          'paragraph2'=>$data['paragraph2'],
         'paragraph3'=>$data['paragraph3'],
        'paragraph4'=>$data['paragraph4'],
       'paragraph5'=>$data['paragraph5'],
      'path'=>$path];
      return $this->db->where(['id'=>1])
                     ->update('who_we_are',$set);

	}//Update About

  public function MeetOurTeamData(){
return     $this->db->select("*")
                    ->from("meet_our_team")
                    ->get()->result_array();
  }//MeetOurTeamData....


  public function MeetOurTeamUpdate($data){
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
    $set=['name'=>$data['name'],
          'instagram'=>$data['instagram'],
          'facebook'=>$data['facebook'],
          'paragraph'=>$data['paragraph'],
          'path'=>$path];
  
  return $this->db->where(['id'=>$data['member_id']])
                     ->update('meet_our_team',$set);

  }//MeetOurTeamUpdate

  public function AboutAjax($id){
    return $this->db->select("*")
                    ->where(['id'=>$id])
                    ->get("meet_our_team")->result();
  }


}
