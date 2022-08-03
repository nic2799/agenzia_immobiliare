<?php
require_once 'view/top.php';
require_once '../functions.php';
require_once 'autentificazione.php';
require_once 'updateRecord.php';

$pageUrl = $_SERVER['PHP_SELF'];//serve per la navBar nella vavBar c'è pageUrl

 
$cerca = getParam('cerca','');




require_once 'view/navbar.php';?>

<main role = "main" class ="container">

<?php // session_start();
//require_once '../functions.php';

        ?>
   
        
        
       
       


      

    <h1 class="mt-5">  Registrati </h1>
    <?php
 
    
        
        $params = [
            'cerca' => $cerca,
           //se non ha nulla allora sara id ritornera getparam// verifica se esiste valore associato alla chiave 
           
            
            
           
        
        ];
        
        
        

        
        $prenotati = getPrenotati($params);
        
        
        require_once 'view/prenotazioni.php';
    

    ?>
    