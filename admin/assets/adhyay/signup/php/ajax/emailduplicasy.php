<?php
    require_once '../config.php';
    if( isset($_POST) ){
        $email = $_POST['email'];
        $output = null;
        $query = "SELECT `userid` FROM `users` WHERE `email` = '$email'";
        $query_exec = mysqli_query($conn,$query);

        while( $row = mysqli_fetch_array($query_exec) ){
            $output = $row['userid'];
        }

        if( $output != null ){      //  IF email alreadu exists return 0
            echo json_encode(0);
            return;
        }

        echo json_encode(1);        //  IF EMAIL IS NOT PRESENT return 1
        return;
     
    }else{  
        echo json_encode(0);        //  IF REQUEST IS WRONG 
        return;
    }
?>