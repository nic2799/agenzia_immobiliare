<?php
require_once 'view/top.php';
require_once '../functions.php';
require_once 'autentificazione.php';

$pageUrl = $_SERVER['PHP_SELF'];
$updateurl = 'updateRecord.php';
$orderBy = getParam('orderBy','id_immobile'); //leggiamo il parametro record per page se non lo trova sul url allora lo da quello di default
$recordsPerPage = getConfig('recordsPerPage');//cera par sull ul
$cerca = getParam('cerca','');
$test = getParam('test','');
$page = getParam('page',1);
$role = getParam('ruolo','utenti');

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
           'recordsPerPage' => $recordsPerPage,
           'page' => $page,
            'test' => $test,
            'orderBy' => $orderBy,
             'role' => $role,
        
        ];
        
        $totalusers = countUser($params);
        
        

        
        $users = getUserClienti($params);
        
        
        require_once 'view/clienti_list.php';
    

    ?>
    