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
     $sql ="SELECT * FROM utente WHERE username = '$username_del_proprietario' ";
     $re = $conn->query($sql);


    $row = $re->fetch_assoc();
if($row>0){
    
 $query  = " INSERT into `immobili` (indirizzo,prezzo,descrizione,immagine,username_del_proprietario)
 VALUES ('$indirizzo','$prezzo','$descrizione','$immagine','$username_del_proprietario')";

  $res = $conn->query($query);
 
  if ($res) {
  
              
    echo "<div class='columns is-centered is-mobile'> 
    <div class='box'>
    <div class='form-control'>
    <h3>inserimento avvenuto con successo  </h3><br/>
    <p class='link'>Clicca qui per <a href='http://localhost:80/swbd/esame-swbd/admin/inserisci_immobile.php'>tornare indietro</a>.</p>
    </div></div></div>";
 
} else {
    echo "<div class='columns is-centered is-mobile'> 
    <div class='box'>
    <div class='form'>
    <h3>Errore</h3><br/>
    <p class='link'>Clicca qui per <a href='http://localhost:80/swbd/esame-swbd/admin/inserisci_immobile.php'>tornare indietro</a>.</p>
    </div></div></div>";
}
    
  }else{
    
    
    
    echo "<div class='columns is-centered is-mobile'> 
    <div class='box'>
    <div class='form'>
    <h3>proprietario non trovato</h3><br/>
    <p class='link'>Clicca qui per <a href='http://localhost:80/swbd/esame-swbd/admin/inserisci_immobile.php'>tornare indietro</a>.</p>
    </div></div></div>";}


  //$tes = $conn->query($test);

  //header("Location: http://localhost:80/SWBD/esame-swbd/admin/inserisci_immobile.php");


  

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
  $pageUrl = $_SERVER['PHP_SELF'];
   // $session = $params['sessionUsername'];
    
  $sql = "SELECT * FROM prenotazioni  ";
  //$sql = "SELECT i.id_immobile ,p.id_prenotazione ,p.data, p.usernameProp, p.clientePrenotato  FROM immobili AS i , prenotazioni AS p ";
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


if(isset($_GET['id_immobil'])){
  $id = $_GET['id_immobil'];
  $ind = $_GET['ind'];
  $prez = $_GET['prezz'];
  $desc = $_GET['desc'];
  $imm = $_GET['imm'];
  $usproprietario = $_GET['userprop'];
  $stat=$_GET['state'];
  $indirizzo = $_POST['ind'];
  $prezzo = $_POST['prez'];
  $descrizione = $_POST['desc'];
  $immagine = $_POST['imm'];
  $username_del_proprietario = $_POST['username_del_proprietario'];
  $stato = $_POST['stato'];
  
  $conn = $GLOBALS['mysqli'];
  if(!$indirizzo=='' ){
$ind=$indirizzo;
  }if(!$prezzo==''){
    $prez=$prezzo;
  } if(!$descrizione==''){
    $desc = $descrizione;

  } if(!$immagine==''){
    $imm = $immagine;
  } if(!$username_del_proprietario==''){
    $usproprietario=$username_del_proprietario;
  } if(!$stato==''){
    $stat=$stato;
  }
  
 echo $usproprietario;
  $query  = "UPDATE `immobili` SET indirizzo='$ind',prezzo='$prez',descrizione='$desc',immagine='$imm',username_del_proprietario='$usproprietario',stato = '$stat'
  WHERE id_immobile = '$id'";
 
  
   $res = $conn->query($query);
   if($res){
   header("Location: http://localhost:80/SWBD/esame-swbd/admin/index.php");
   }
   

}


 ?>

