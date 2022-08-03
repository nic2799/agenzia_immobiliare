<?php

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
    $username_del_proprietario = $_POST['username_del_proprietario'];
   
    
 

    $conn = $GLOBALS['mysqli'];
 
 $query  = "INSERT into `immobili` (indirizzo,prezzo,descrizione,immagine,username_del_proprietario)
 VALUES ('$indirizzo','$prezzo','$descrizione','$immagine','$username_del_proprietario')";

 //$test = "INSERT into `utente` (username,email,password,Nome,Cognome)
 //VALUES ('$username','$email','$password','$Nome','$Cognome')";
  $res = $conn->query($query);
  //$tes = $conn->query($test);

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

if(isset($_POST['ruolo'])){

}




function getPrenotati(array $params = []){
  $conn = $GLOBALS['mysqli'];
  $cerca = array_key_exists('cerca', $params) ? $params['cerca'] : '';
  $records = [];
   // $session = $params['sessionUsername'];
    
  $sql = "SELECT * FROM prenotazioni  ";
  
  if($cerca){
    $sql .= "WHERE usernameProp LIKE '%$cerca%' ";
    $sql .= "OR clientePrenotato LIKE '%$cerca%' ";
    $sql .= "OR data LIKE '%$cerca%' ";
    $sql .= "OR idimmobile LIKE '%$cerca%' ";
}
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