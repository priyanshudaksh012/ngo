<?php
    require_once './config.php';
    if( isset($_POST) ){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "SELECT `userid`, `name`, `password`, `email` FROM `users` WHERE `email`='$email'";
        $query_exec = mysqli_query($conn,$query);

        $data = null;

        while( $row = mysqli_fetch_array($query_exec) ){
            $data = $row;
        }

        if( $data == null ){
            header("Location: $domain/?e=user");    //IF USER DOESN'T EXISTS 
            return;
        }

        if( $data['password'] != $password ){
            header("Location: $domain/?e=pass");    //IF PASSWORD NOT MATCHED
            return;
        }

        //IF EVERTHING WENT WELL THEN CREATE SESSION

        session_start();
        $_SESSION['yu'] = array(
            'userid' => $data['userid'],
            'password' => $data['password'],
            'email' => $data['email'],
            'name' => $data['name']
        );
        
        header("Location: $domain");    //NOW SESSION IS CREATED NOW REDIRECT TO APP SCREEN
    }
?>