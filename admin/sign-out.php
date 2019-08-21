<?php
    session_start();
    // session Destroy
    session_destroy();
    // redirect to login page
    header('location:sign-in.php');

?>