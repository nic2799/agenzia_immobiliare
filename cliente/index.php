<?php
require_once 'autentificazione.php';
//session_start();
//$sessionusername = $_SESSION['username'];
//if($sessionusername==''){
    
  //  header( "location: ../Login_.php" );
//}
//?>
<?php

require_once 'view/top.php';
require_once '../functions.php';


$pageUrl = $_SERVER['PHP_SELF'];
$updateurl = 'updateRecord.php';
$orderBy = getParam('orderBy','id_immobile'); //leggiamo il parametro record per page se non lo trova sul url allora lo da quello di default
$recordsPerPage = getConfig('recordsPerPage');//cera par sull ul
$cerca = getParam('cerca','');
//$test = getParam('test','');
$page = getParam('page',1);
//$recordsPerPage = getParam('recordsPerPage',getConfig('recordsPerPage'));


require_once 'view/navbar.php';



?>

<!-- Begin page content -->
<main role = "main" class ="container">
  
<?php // session_start();
//require_once '../functions.php';

        ?>


    <h1 class="mt-5"> Benvenuto <?=$sessionusername?>, queste sono le case in vendita...</h1>
    <?php      
        $params = [
            'cerca' => $cerca,
            'orderBy' => $orderBy,//se non ha nulla allora sara id ritornera getparam// verifica se esiste valore associato alla chiave 
            'recordsPerPage' => $recordsPerPage,
            'page' => $page,
            //'test' => $test,
             
        
        ];
        
        $totalImmobili = countUserImmobili();
        $numPages = ceil($totalImmobili/$recordsPerPage);
        

        
        $immobile = getImmobili($params);
        
        
        require_once 'view/listaimmobili.php';
    

    ?>
    
  
</main>
<?php 

?>


