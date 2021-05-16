<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $userid = $_POST['userid'];
        $usertype = $_POST['usertype'];
        $currentpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);

        if( $usertype != 'admin' ){
            echo json_encode(0);
            return;
        }

        $query = "SELECT `userid`, `name`, `password` FROM `users` WHERE `userid`='$userid'";
        $query_exec = mysqli_query($conn,$query);

        $data = null;

        while($row = mysqli_fetch_array($query_exec)){
            $data = $row;
        }

        if( $data == null ){
            echo json_encode(0);
            return;
        }

        if( $currentpassword != $data['password'] ){
            echo json_encode(-1);
            return;
        }

        $query = "UPDATE `users` SET `password`='$newpassword' WHERE `userid` = '$userid'";
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec != 1 ){
            echo json_encode(0);
            return;
        }else{
            session_start();
            $_SESSION['yu']['password'] = $newpassword;
            echo json_encode(1);
            return;
        }

    }else{
        echo json_encode(0);
        return;
    }
?>