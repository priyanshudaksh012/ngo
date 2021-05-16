<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $userid = $_POST['userid'];
        $usertype = $_POST['usertype'];
        $username = $_POST['username'];
        $rating = $_POST['rating'];
        $message = $_POST['message'];
        $roomid = $_POST['roomid'];

        $query = "INSERT INTO `feedback`( `userid`, `usertype`, `username`, `rating`, `message`, `roomid`) VALUES ('$userid','$usertype','$username','$rating','$message','$roomid')";
        $query_exec = mysqli_query($conn,$query);

        if($query_exec != 1){
            echo json_encode(0);
            return;
        }

        echo json_encode(1);
        return;

    }
?>