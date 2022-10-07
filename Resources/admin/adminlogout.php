<?php
    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_password']);
    // unset($_SESSION['user_id_generated']);
    session_destroy();
    header("location:../front.php");
?>