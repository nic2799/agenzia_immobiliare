<?php
session_start();
$sessionusername = $_SESSION['username'];
$sessionruolo = $_SESSION['admin'];
if($sessionusername=='' || !($sessionruolo=='admin')){
    
    header( "location: ../Login_.php" );
}
?>