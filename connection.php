<?php
//require_once 'config.php';//se in config avremo solo $config ma se abbiamo return //non include perche questo require obbliga ad avere il file
//var_dump($config);
$config = require 'config.php';



$mysqli = new mysqli(//è   conn
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password'],
    $config['mysql_db'],
   

);
unset($config);//distruggo


if($mysqli->connect_error){
    die($mysqli->connect_error);

}else{
    echo ' connessione riuscita ';
    
}