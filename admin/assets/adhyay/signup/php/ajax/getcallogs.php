<?php
    require_once '../config.php';
    if(isset($_POST)){
        $userid = $_POST['userid'];
        $usertpe = $_POST['usertpe'];
        $callogs = $_POST['callogs'];

        if( $usertpe != 'admin' ){
            echo json_encode(0);
            return;
        }

        if($callogs == null || $callogs == ''){
            echo json_encode(0);
            return;
        }

        $callogs = explode(',',$callogs);
        $query = "SELECT `roomid`, `password`, `adminid`, `active`, `users`, `userscount`, `startime`, `endtime` FROM `rooms` WHERE";
        
        for( $i=0 ; $i < sizeof($callogs) ; $i++ ){
            $rno = $callogs[$i];
            $query = $i == 0 ? $query." `roomid`='".$rno."'" : $query." OR `roomid`='".$rno."'";
        }
        
        $query_exec = mysqli_query($conn,$query);
        $arr = array();
        
        while( $row = mysqli_fetch_array($query_exec) ){
            $roomid = $row['roomid'];
            $password = $row['password'];
            $adminid = $row['adminid'];
            $active = $row['active'];
            $users = $row['users'];
            $userscount = $row['userscount'];
            //$arr[] = $row;
           
            $link=$domain."/?r=$roomid&p=$password";
            
            if( $userid != $adminid ){
                $arr[] = array(
                    'roomid'=> $roomid,
                    'status'=> $active,
                    'userscount' => $userscount,
                    'role'=> 'client'
                );
            }else{
                $arr[] = array(
                    'roomid'=> $roomid,
                    'status'=> $active,
                    'users' => $users,
                    'userscount' => $userscount,
                    'role'=> 'admin',
                    'link'=> $link
                );
            }
            
        }
        echo json_encode($arr);
    }
?>