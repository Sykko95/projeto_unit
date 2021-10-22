<?php 
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'unit';

    if ($conn = mysqli_connect($server,$user,$password,$db)){
        session_start();
    } else {
        die("Não foi possível acessar o bando de dados").$conn->error;
    }
?>