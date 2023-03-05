<?php
    session_start();
    session_unset();
    session_destroy();

    // echo "logged out successfully";
    echo '<script>alert(" logged out successfully");setTimeout(()=>{window.location.replace("../index.html");},500);</script>';
    // header("Location: ../index.html"); 
?>