<?php
session_start();
$sessionusername = $_SESSION['username'];
$sessionruolo = $_SESSION['admin'];
if($sessionusername=='' || !($sessionruolo=='admin')){
    require_once 'logout.php';
    header( "location: ../Login_.php" );
}
?>