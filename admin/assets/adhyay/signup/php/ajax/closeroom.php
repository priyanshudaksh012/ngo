<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $userid = $_POST['userid'];
        $usertype = $_POST['usertype'];
        $roomid = $_POST['roomid'];
        $roompassword = $_POST['roompassword'];

        if($usertype != 'admin'){
            echo json_encode(0);
            return;
        }

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

        if( $userid != $data['adminid'] ){
            echo json_encode(0);
            return;
        }
        date_default_timezone_set('Asia/Calcutta'); 
        $date = date('Y-m-d H:m:s');
        $query = "UPDATE `rooms` SET `active`='0',`endtime`='$date' WHERE `roomid`='$roomid'";
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec != '1' ){
            echo json_encode(0);
            return;
        }else{
            echo json_encode(1);
        }

    }else{
        echo json_encode(0);
    }
?>