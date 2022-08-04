<?php
session_start();
$sessionusername = $_SESSION['username'];

$sessionruolo = $_SESSION['cliente'];
if($sessionusername=='' || !($sessionruolo=='cliente')){
    require_once 'logout.php';
    header( "location: ../Login_.php" );
}
?>