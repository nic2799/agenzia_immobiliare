<?php    
require('connection.php');

    
$email = $_POST['email'];
$password = $_POST['password'];


$conn = $GLOBALS['mysqli'];//mysqli non è visibile all'interno della fun



$sql = "SELECT * FROM utente WHERE email='$email'";





$res = $conn->query($sql);
//$row = $res->rowCount();
$row = $res->fetch_assoc();




if($row>0){
    if($row['password']==$password){
        echo 'corretto';
        session_start();
        $_SESSION['username'] = $row['username'];
        
        if($row['ruolo']=='admin'){
        $_SESSION['admin'] = $row['ruolo'];
           
         header( "location: ../esame-swbd/admin/index.php" );
           
        }else if($row['ruolo']=='cliente'){
            $_SESSION['cliente'] = $row['ruolo'];
            header( "location: ../esame-swbd/cliente/index.php" );
        }else{
            $_SESSION['proprietario'] = $row['ruolo'];
            header( "location: ../esame-swbd/proprietario/index.php");
        }
            

        
    }else{
        echo'no';
     
        ;}
   
   
  

}else{echo "utente non trovato";}
