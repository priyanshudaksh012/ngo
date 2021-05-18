<?php
class SgiFunction{

   public function conn(){
      require('connect.php');
      return $conn;
    }

   public function Banner(){
    $ok=mysqli_query($this->conn(),"SELECT * FROM banner");
    $arr=[];
        while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
        endwhile;
        return $arr;
   }//Banner Function End here....


   public function CurrentProject(){
    $ok=mysqli_query($this->conn(),"SELECT * FROM current_projects");
    $arr=[];
        while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
        endwhile;
        return $arr;
   } // CurrentProject

   public function LatestNews(){
    $ok=mysqli_query($this->conn(),"SELECT * FROM latest_news");
    $arr=[];
    while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
      endwhile;
      return $arr;
    }//LatestNews

     public function whoWeAre(){
    $ok=mysqli_query($this->conn(),"SELECT * FROM who_we_are ");
    $arr=[];
    while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
      endwhile;
      return $arr;
    }//WhoWeAre

 
     public function MeetOurTeam(){
     $ok=mysqli_query($this->conn(),"SELECT * FROM meet_our_team");
    $arr=[];
    while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
      endwhile;
      return $arr;
    }//WhoWeAre

    public function GreeningPlanet(){
     $ok=mysqli_query($this->conn(),"SELECT * FROM greening_planet");
      $arr=[];
     while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
      endwhile;
      return $arr;
    }//WhoWeAre

    public function RecentActivites(){
      $ok=mysqli_query($this->conn(),"SELECT * FROM recent_activites");
      $arr=[];
      while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
       endwhile;
       return $arr;
    }//RecentActivites

    public function WasteManagement(){
      $ok=mysqli_query($this->conn(),"SELECT * FROM waste_management");
      $arr=[];
      while($k=mysqli_fetch_array($ok)):
        array_push($arr,$k);
       endwhile;
       return $arr;
    }//WasteManagement

  

  
}// ClassEnd here....

 ?>
