<?php

require_once '../connection.php';
require_once '../functions.php';
require ('autentificazione.php');






if(isset($_GET['id'])){
    $id_immobile = $_GET['id'];
    $state='acquistata';
   // echo 'a' . $id;
    
    
     
     $conn = $GLOBALS['mysqli'];
     $query = "UPDATE immobili SET stato='acquistata' WHERE id_immobile = $id_immobile"; 
     $res = $conn->query($query);
     header("Location: http://localhost:80/SWBD/esame-swbd/cliente/index.php");
     
   
   

}


if(isset($_GET['id_imm'])){
  $id_immobile = $_GET['id_imm'];
  $user = $_GET['prop'];
  $data = $_POST['data_prenotazione'];
  
echo ' '.$data.' '.$id_immobile .' ' . $sessionusername;
$conn = $GLOBALS['mysqli'];



$sql = "INSERT into `prenotazioni`  (data, idimmobile,usernameProp,clientePrenotato) VALUES ('$data','$id_immobile','$user','$sessionusername')  ";
$res = $conn->query($sql);
header("Location: http://localhost:80/SWBD/esame-swbd/cliente/index.php");
?>
 
<?php

}
 ?>