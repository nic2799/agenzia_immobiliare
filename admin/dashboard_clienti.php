<?php
require_once 'view/top.php';
require_once '../functions.php';
require_once 'autentificazione.php';

$pageUrl = $_SERVER['PHP_SELF'];
$updateurl = 'updateRecord.php';

$cerca = getParam('cerca','');


$role = getParam('ruolo','proprietario');

require_once 'view/navbar.php';?>

<main role = "main" class ="container">

<?php // session_start();
//require_once '../functions.php';

        ?>
   
        
        
       
       


      

    <h1 class="mt-5"> <?=$role?> Registrati </h1>
    <?php
 
    
        
        $params = [
            'cerca' => $cerca,
           //se non ha nulla allora sara id ritornera getparam// verifica se esiste valore associato alla chiave 
           
             'role' => $role,
        
        ];
        
        $totalusers = countUser($params);
        
        

        
        $users = getUserClienti($params);
        
        
        require_once 'view/clienti_list.php';
    

    ?>
    