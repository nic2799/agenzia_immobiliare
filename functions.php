<?php
require_once '../connection.php';

function getConfig($param){
    $config = require '../config.php';
    
    return array_key_exists($param, $config) ? $config[$param] : null;//se esiste la chiave param in array config ritorna quella chiave altrimenti null
    

}

function getRandName(){
    $id_immobile = ['ROBERTO','GIOVANNI','MARIO','PAOLO'];
    $indirizzo = ['ROSSI','RE','ARIAS','SMITH'];
     $rand1 = mt_rand(0, count($id_immobile)-1);
     $rand2 = mt_rand(0, count($id_immobile)-1);
    return $id_immobile[$rand1].' '.$indirizzo[$rand2];

}


function getParam($param, $default = null){//default se non passiamo sara nal
   return !empty($_REQUEST[$param])? $_REQUEST[$param]: $default;//ci ritorna la get a quella chiave ovvero lindirizzo e in user list indirizzo qundo clicco vado
//request possiamo leggere un paramentro sia via get che post

}

//echo getRandName();

function getRandEmail($name){
    $domains = ['google.com' , 'yahoo.com', 'libero.it'];
    $rand1 = mt_rand(0, count($domains)-1);

    return strtolower(str_replace(' ','.',$name).mt_rand(10,99).'@'.$domains[$rand1]);

}

//echo getRandEmail(getRandName());

function getRandFiscalCode(){
    $i = 16;
    $res = '';

    while($i>0){
        $res .= chr(mt_rand(65,90));
        $i--;
    }
    return $res;
}
//echo getRandFiscalCode();
function getRandomAge(){
    return mt_rand(0, 120);
}
//echo getRandomAge();




function insertRandom($totale, mysqli $conn){
    while($totale>0){
    $id_immobile = getRandName();
    $indirizzo = getRandEmail($id_immobile);
    $prezzo = getRandomAge();
   
     $sql  = "INSERT into `immobili` (id_immobile, indirizzo,prezzo)
      VALUES ('$id_immobile','$indirizzo','$prezzo')";
    
    echo $totale.' '.$sql;

    $res = $conn->query($sql);
    if(!$res){
        echo $conn->error.'<br>';
    }else{
        $totale--;
    }
}

}
//insertRandom(5, $mysqli);
global $start;

function getImmobili( array $params = []){
    $conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun
    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_immobile';//varabile temporanea//prendi il valore di params associato alla stringa orderby
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 5;
    $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
    $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $sessionadmin = $_SESSION['admin'];
   $start = 5 *($page -1);
    if($start<0){
        $start = 0;
    }
    
    

    
   // $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $records = [];
    
    
    $sql = 'SELECT * FROM immobili ';
    
    if($cerca){
        $sql .= "WHERE indirizzo LIKE '%$cerca%' ";
        $sql .= " OR descrizione LIKE '%$cerca%'";
        
    }
    $sql.= " ORDER BY id_immobile LIMIT $start, 5 ";
    //echo $sql;
    
   
    
    $res = $conn->query($sql);
    
    
    if($res){
        if(!($sessionadmin=='admin')){
        
        while($row = $res->fetch_assoc()){// fecth assoc crea un array associativo dalla query
            if($row['stato']=='nonAcquistata' || $row['stato']==''){
       $records[]=$row;
        }else{
            //echo ' no ';
        }
    }
}else{
    while($row = $res->fetch_assoc()){
        $records[]=$row;
    }

}
      

    }else{echo "problema";}

  
      
    return $records;

}

//var_dump(getUser());

//echo getConfig('recordsPerPage');


function countUserImmobili( array $params =[]){
    $conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun
    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_immobile';//varabile temporanea//prendi il valore di params associato alla stringa orderby
    $limit = array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 5;
    $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $records = [];
    
    $total=0;
    $sql = "SELECT COUNT(*) as total FROM immobili WHERE stato = 'nonAcquistata'";
   
    
    $sql.= " ORDER BY id_immobile LIMIT 0, 5";//devi togliere orderby sia qui che sopra e mettere una chiave 
    
   
    
    $res = $conn->query($sql);
    
    if($res){
        $row = $res->fetch_assoc();// fecth assoc crea un array associativo dalla query
       $records[]=$row;
       $total=$row['total'];
        
      

    }else{echo "problema";}
  
      
    return $total;

}

echo countUserImmobili();
function countUser( array $params = []){
    $conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun
    //$orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'username';//varabile temporanea//prendi il valore di params associato alla stringa orderby
    $limit = array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;
    $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $role =array_key_exists('role', $params) ? $params['role'] : '';
    $records = [];
    
    $totale=0;
    $sql = "SELECT COUNT(*) as totale FROM utente WHERE ruolo ='$role' ";
   
    
    $sql.= " ORDER BY username LIMIT 0, 10";//devi togliere orderby sia qui che sopra e mettere una chiave 
    
   
    
    $res = $conn->query($sql);
    
    if($res){
        $row = $res->fetch_assoc();// fecth assoc crea un array associativo dalla query
       $records[]=$row;
       $totale=$row['totale'];
        
      

    }else{echo "problemaz";}
  
      
    return $totale;



}echo countUser();


function insertData(){




    if(isset($_GET['test'])){
        $test = $_GET['test'];
        $conn = $GLOBALS['mysqli'];
     
     $query  = "INSERT into `immobili` (indirizzo)
     VALUES ('$test')";
      $res = $conn->query($query);
    echo $test;
    }
}
function getUserClienti(array $params = []){
    $conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun
    $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_immobile';//varabile temporanea//prendi il valore di params associato alla stringa orderby
    $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 5;
    $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
    $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $role =array_key_exists('role', $params) ? $params['role'] : '';
    $start = 5 *($page -1);
    if($start<0){
        $start = 0;
    }


    
   // $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
    $records = [];
    
    
    $sql = "SELECT * FROM utente  WHERE ruolo ='$role' ";
    
    if($cerca){
        $sql .= "OR username LIKE '%$cerca%' ";
        $sql .= " OR email LIKE '%$cerca%'";
        
    }
    //$sql.= " ORDER BY username LIMIT $start, 100";
    //echo $sql;
    
   
    
    $res = $conn->query($sql);
    
    
    if($res){
        
        while($row = $res->fetch_assoc()){// fecth assoc crea un array associativo dalla query
           
       $records[]=$row;
       
          //  echo ' no ';
        }
    }else{echo 'prob';}
   
      


  
      
    return $records;

}


   

