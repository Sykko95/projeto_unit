<?php 
    include 'conn.php';
    $conn->close();
    session_destroy();
    header ("Location: ./login.php");
?>