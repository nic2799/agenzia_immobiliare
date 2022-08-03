<?php
session_start();
$sessionusername = $_SESSION['username'];

$sessionruolo = $_SESSION['proprietario'];
if($sessionusername=='' || !($sessionruolo=='proprietario')){
    header( "location: ../Login_.php" );
}
?>