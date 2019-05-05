<?php
    session_start(); 
    require('connect.php');
    echo json_encode($_SESSION);
?>