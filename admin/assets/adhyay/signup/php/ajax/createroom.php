<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $usertype = $_POST['usertype'];
        $userid = $_POST['userid'];
        $username = $_POST['username'];
        $roompassword = $_POST['roompassword'];
        $users = array();
        $users[] = array(
            'userid' => $userid,
            'usertype' => $usertype,
            'username' => $username
        ); 

        //Find User if exists

        $query = "SELECT `name`, `password`, `email`, `dp`, `logs` FROM `users` WHERE `userid` = '$userid'";
        $query_exec = mysqli_query($conn,$query);
        $user = null;
        
        while( $row = mysqli_fetch_array($query_exec) ){
            $user = $row;
        }
        
        if( $user == null ){    //If user try to hack
            echo json_encode(0);
            return;
        }
        
        if( $usertype != 'admin' ){ //If user is not admin from application
            echo json_encode(0);
            return;
        }
        
        date_default_timezone_set('Asia/Calcutta'); 
        $date = date('Y-m-d H:m:s');
        $query = "INSERT INTO `rooms`(`password`, `adminid`, `active`, `users`, `userscount`,`startime`) VALUES ('$roompassword','$userid','1','".json_encode($users)."',1,'$date')";
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec != 1 ){
            echo json_encode(0);
        }

        $roomid = mysqli_insert_id($conn);

        $logs = $user['logs'];
        if( $logs == null ){
            $logs = $roomid.'';
        }else{
            $logs = $logs.','.$roomid;
        }

        $query = "UPDATE `users` SET `logs`='$logs' WHERE `userid` = '$userid'";    //Update Call Logs of the user
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec != 1 ){
            echo json_encode(0);
        }

        echo json_encode($roomid);
        
    }
?>