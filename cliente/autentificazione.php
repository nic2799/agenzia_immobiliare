<?php
session_start();
$sessionusername = $_SESSION['username'];

$sessionruolo = $_SESSION['cliente'];
if($sessionusername=='' || !($sessionruolo=='cliente')){
    header( "location: ../Login_.php" );
}
?>