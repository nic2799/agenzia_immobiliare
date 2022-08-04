<?php
require 'autentificazione.php';
require_once '../connection.php';
require_once '../functions.php';
if(isset($_GET['id_immobile'])){
$id =  $_GET['id_immobile'];
echo 'a' . $id;


 
 $conn = $GLOBALS['mysqli'];
 $query = "DELETE FROM immobili WHERE id_immobile='$id' LIMIT 1";
 $res = $conn->query($query);
 header("Location: http://localhost:80/SWBD/esame-swbd/admin/index.php");
}
if(isset($_POST['indirizzo'])){
   
    $indirizzo = $_POST['indirizzo'];
    $prezzo = $_POST['prezzo'];
    $descrizione = $_POST['descrizione'];
    $immagine = $_POST['immagine'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Nome = $_POST['Nome'];
    $Cognome = $_POST['Cognome'];
    
 

    $conn = $GLOBALS['mysqli'];
 
 $query  = "INSERT into `immobili` (indirizzo,prezzo,descrizione,immagine)
 VALUES ('$indirizzo','$prezzo','$descrizione','$immagine')";

 $test = "INSERT into `utente` (username,email,password,Nome,Cognome)
 VALUES ('$username','$email','$password','$Nome','$Cognome')";
  $res = $conn->query($query);
  $tes = $conn->query($test);

  header("Location: http://localhost:80/SWBD/esame-swbd/admin/inserisci_immobile.php");




}




if(isset($_GET['id'])){
    $id_immobile = $_GET['id'];
    $state='acquistata';
   // echo 'a' . $id;
    
    
     
     $conn = $GLOBALS['mysqli'];
     $query = "UPDATE immobili SET stato='acquistata' WHERE id_immobile = $id_immobile"; 
     $res = $conn->query($query);
     header("Location: http://localhost:80/SWBD/esame-swbd/admin/index.php");
     
   
   

}


if(isset($_GET['username'])){
$username =  $_GET['username'];



 
 $conn = $GLOBALS['mysqli'];
 $query = "DELETE FROM utente WHERE username='$username' LIMIT 1";
 $res = $conn->query($query);

 header("Location: http://localhost:80/SWBD/esame-swbd/admin/dashboard_clienti.php");
}


function getUserYourHome( array $params = []){
  $conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun
  $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'id_immobile';//varabile temporanea//prendi il valore di params associato alla stringa orderby
  $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 5;
  $page = (int)array_key_exists('page', $params) ? $params['page'] : 0;
  $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
  $sessionusername = $_SESSION['username'];
 $start = 5 *($page -1);
  if($start<0){
      $start = 0;
  }
  
  

  
 // $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
  $records = [];
  
  
  $sql = "SELECT * FROM immobili ";
  


if($cerca){
  $sql .= "WHERE username_del_proprietario ='$sessionusername' AND indirizzo LIKE '%$cerca%' OR descrizione LIKE '%$cerca%'";
  
  
  
}else{
 $sql .="WHERE username_del_proprietario ='$sessionusername'";}

  
 
  $sql.= " ORDER BY id_immobile LIMIT $start, 5 ";
  //echo $sql;
  
 
  
  $res = $conn->query($sql);
  
  
  if($res){
      
      while($row = $res->fetch_assoc()){// fecth assoc crea un array associativo dalla query
          
     $records[]=$row;
      
  }
  
    

  }else{echo "problema";}


    
  return $records;

}


function getPrenotati(array $params = []){
  $conn = $GLOBALS['mysqli'];
  $records = [];
    $session = $params['sessionUsername'];
    
  $sql = "SELECT data FROM prenotazioni WHERE  usernameProp = '$session' ";
  $res = $conn->query($sql);

  if($res){
        
    while($row = $res->fetch_assoc()){// fecth assoc crea un array associativo dalla query
       
   $records[]=$row;
   
      //  echo ' no ';
    }
}else{echo 'prob';}

  



  
return $records;
}
 ?>