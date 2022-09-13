<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'cadastrobovinos';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
/*
if(mysqli_connect_errno())
    echo "deu ruim".mysqli_connect_error();
else
    echo "deu bom";
    */
?>