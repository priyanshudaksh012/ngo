<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $usertype = $_POST['usertype'];
        $userid = $_POST['userid'];
        $roompassword = $_POST['roompassword'];
        $username = $_POST['username'];
        $roomid = $_POST['roomid'];

        $query = "SELECT `password`, `adminid`, `active`, `users`, `userscount`, `startime`, `endtime` FROM `rooms` WHERE `roomid` = '$roomid'";
        $query_exec = mysqli_query($conn,$query);

        $data = null;

        while( $row = mysqli_fetch_array($query_exec) ){
            $data = $row;
        }

        if( $data == null ){
            echo json_encode(0);
            return;
        }

        if($data['active'] != '1'){
            echo json_encode(0);
            return;
        }

        if( $data['adminid'] == $userid && $usertype == 'admin' ){
            echo json_encode(1);
            return;
        }


        $users = json_decode($data['users'],false);
        
        for( $i=0 ; $i < sizeof($users) ; $i++){
            if( $users[$i]->userid == $userid ){
                echo json_encode(1);    //If client already exists then also return
                return;
            }
        }

        $users[] = array(
            'userid' => $userid,
            'usertype' => $usertype,
            'username' => $username
        );
        $userscount = $data['userscount'];

        $userscount++;
        $query = "UPDATE `rooms` SET `users`= '" . json_encode($users) ."',`userscount`='$userscount'  WHERE `roomid`='$roomid'";
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec != '1' ){
            echo json_encode(0);
            return;
        }

        //Now user is registered or not

        $query = "SELECT `name`, `password`, `email`, `dp`, `logs` FROM `users` WHERE `userid` = '$userid'";
        $query_exec = mysqli_query($conn,$query);
        $user = null;

        while( $row = mysqli_fetch_array($query_exec) ){
            $user = $row;
        }

        if( $user != null ){

            $logs = $user['logs'];

            if( $logs == null ){
                $logs = $roomid.'';
            }else{
                $logs = $logs.','.$roomid;
            }

            $query = "UPDATE `users` SET `logs`='$logs' WHERE `userid`='$userid'";
            $query_exec = mysqli_query($conn,$query);

            if( $query_exec != 1 ){
                echo json_encode(0);
                return;
            }

        }

        echo json_encode(1);
        return;
        

    }else{
        echo json_encode(0);
        return;
    }
?>