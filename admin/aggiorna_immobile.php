<?php
require_once 'autentificazione.php';

require_once 'view/top.php';
require_once '../functions.php';

$updateurl = 'updateRecord.php';
require_once 'view/navbar.php';



?>

<!-- Begin page content -->
<main role = "main" class ="container">
  
<?php // session_start();
//require_once '../functions.php';

        ?>
        
        <table class = "table ">
          <div class="row">
       
          </div>
          <style>
            .center {
            margin: auto;
            width: 80%;
           
            padding: 50px;
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 6px 0;
  box-sizing: border-box;
}

          </style>
  
    
        
        <div class="center">
          
<?php

   $idimmobile = $_GET['id'];
   $indirizzo = $_GET['indirizzo'];
   $prezzo = $_GET['prezzo'];
   $descrizione = $_GET['descrizione'];
   $immagine = $_GET['immagine'];
   $user_del_prop = $_GET['userdelprop'];
   $state = $_GET['state'];
   echo $indirizzo . ' ' .$prezzo;
?> 
  
  
  <form class="form" action="<?=$updateurl?>?id_immobil=<?=$idimmobile?>&ind=<?=$indirizzo?>&prezz=<?=$prezzo?>&desc=<?=$descrizione?>&imm=<?=$immagine?>&userprop=<?=$user_del_prop?>&state=<?=$state?>" id=homeform name="homeform" method="post">
    
          <input type="text" class = "form-control" name="indirizzo" placeholder="inserisci indirizzo"/>
          <input type="number" class = "form-control" name="prezzo" placeholder="inserisci prezzo"/>
          <input type="text" class = "form-control"name ="descrizione" placeholder="inserisci descrizione"/>
          <input type="url" class = "form-control" name ="immagine" placeholder="inserisci url immagine"/>
          <input type="text" class = "form-control" name ="username_del_proprietario" placeholder="inserisci username del proprietario"/>
          <input type="text" class = "form-control" name ="stato" placeholder="inserisci stato"/>
          
          
          
          
          
          
          
          
          
          
          <button type ="submit" onclick="return confirm('sei sicuro')"  class="btn btn-dark" value="Aggiorna" >invia</button>
       
         
      </form>
    </div>



  
</table>