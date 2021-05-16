<?php
    require_once './config.php';
    // session_start();
    // if( isset($_SESSION['yu']) ){
    //     unset($_SESSION['yu']);
    // }
    // if( isset($_SESSION['tempyu'] ){
    //     unset($_SESSION['tempyu']);
    // }
    session_start();
    session_destroy();
    // session_commit();
    //header("Location: $domain");

?>

<script>
    window.location.href=window.location.origin;
</script>