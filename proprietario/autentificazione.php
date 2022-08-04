<?php
session_start();
$sessionusername = $_SESSION['username'];

$sessionruolo = $_SESSION['proprietario'];
if($sessionusername=='' || !($sessionruolo=='proprietario')){
    require_once 'logout.php';
    header( "location: ../Login_.php" );
}
?>