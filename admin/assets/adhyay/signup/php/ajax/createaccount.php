<?php
    require_once '../config.php';

    if( isset($_POST) ){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "INSERT INTO `users`(`name`, `password`, `email`) VALUES ('$name','$password','$email')";
        $query_exec = mysqli_query($conn,$query);

        if( $query_exec == 1 ){
            echo json_encode(1);    //  ACCOUNT IS SUCCESSFULLY ADDED
            return;
        }else{
            echo json_encode(0);    //  ERROR OCCURED WHILE ADDING ACCOUNT
            return;
        }
     
    }else{  
        echo json_encode(0);        //  IF REQUEST IS WRONG 
        return;
    }
?>