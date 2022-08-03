<?php

require_once 'updateRecord.php';
//session_start();
//$sessionusername = $_SESSION['username'];
//if($sessionusername==''){
    
  //  header( "location: ../Login_.php" );
//}
//?>
<?php

require_once 'view/top.php';
require_once '../functions.php';
require_once 'autentificazione.php';




//$recordsPerPage = getParam('recordsPerPage',getConfig('recordsPerPage'));


require_once 'view/navbar.php';



?>

<!-- Begin page content -->
<main role = "main" class ="container">
  
<?php // session_start();
//require_once '../functions.php';

        ?>


    <h1 class="mt-5"> Benvenuto <?=$sessionusername?>, queste sono le prenotazioni</h1>
    <?php      
      $params = [
       
        
       
      
        'sessionUsername' => $sessionusername,
        //'test' => $test,
         
    
    ];
        
        $prenotati = getPrenotati($params);
        
        
        require_once 'view/prenotazioni.php';
    

    ?>
    
  
</main>
<?php 

?>


