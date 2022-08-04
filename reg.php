<?php 
require('connection.php');
$conn = $GLOBALS['mysqli'];
if(isset($_POST['username'])){
        $username = ($_POST["username"]);
    $email = ($_POST["email"]);
    $password = $_POST["password"];
    $Nome= $_POST["Nome"];
    $Cognome = $_POST["Cognome"];
    $ruolo = $_POST["ruolo"];
  
    
    
   echo $ruolo;
   echo $username;

    
        $query  = "INSERT into `utente` (username, email, password, Nome, Cognome, ruolo)
                     VALUES ('$username','$email','$password', '$Nome', '$Cognome','$ruolo')";
       $res = $conn->query($query);
        if ($res) {
            session_start();
            $_SESSION['username']=$username;
;
            if($ruolo == 'cliente'){
                $_SESSION['cliente']=$ruolo;
                header( "location: ../esame-swbd/cliente/index.php" );
              
              

            }else if($ruolo == 'proprietario'){
                $_SESSION['proprietario']=$ruolo;
                header( "location: ../esame-swbd/proprietario/index.php");
            
            }else{
                $_SESSION['admin']=$ruolo;
                header( "location: ../esame-swbd/admin/index.php");

            }
        } else {
            echo "<div class='columns is-centered is-mobile'> 
            <div class='box'>
            <div class='form'>
            <h3>Errore nella Registrazione. Uno o piu' campi non sono corretti o già in utilizzo.</h3><br/>
            <p class='link'>Clicca qui per <a href='http://localhost:80/SWBD/Registrazione.php'>registrarti</a> di nuovo.</p>
            </div></div></div>";
        }
   
    
   
}//session_start();
?>