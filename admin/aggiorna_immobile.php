<?php
require_once 'autentificazione.php';

require_once 'view/top.php';
require_once '../functions.php';

$updateurl = 'updateRecord.php';
require_once 'view/navbar.php';



?>

<!-- Begin page content -->
<main role = "main" class ="container">
<h1 class="mt-5"> Scegli uno o più parametri da aggiornare</h1>
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
  
   
?> <style>
  .imageborder {
    
  border: 4px groove;
  border-radius: 5px;
  padding: 2px;
}

</style>
  
  
  <form class="form" action="<?=$updateurl?>?id_immobil=<?=$idimmobile?>&ind=<?=$indirizzo?>&prezz=<?=$prezzo?>&desc=<?=$descrizione?>&imm=<?=$immagine?>&userprop=<?=$user_del_prop?>&state=<?=$state?>" id=homeform name="homeform" method="post">
    
          <input type="text" class = "form-control" name="ind" placeholder="indirizzo attuale <?=$indirizzo?> clicca per cambiarlo"/>
          <input type="number" class = "form-control" name="prez" placeholder="prezzo attuale <?=$prezzo?> clicca per cambiarlo"/>
          <input type="text" class = "form-control"name ="desc" placeholder="descrizione attuale <?=$descrizione?> clicca per cambiarlo"/>
          <input type="text" class = "form-control" name ="username_del_proprietario" placeholder="username del proprietario attuale <?=$user_del_prop?> clicca per cambiarlo"/>

          <input type="url" class = "form-control" name ="imm" placeholder="clicca per cambiare immagine"/>
          
          <img src="   <?=$immagine?>    "   class = "imageborder" height="180" width="220">
          
        
        <select class="form-control" name="stato" id="cars">
          <option value="" selected disabled hidden>stato attuale della casa è <?=$state?> clicca per cambiarlo </option>
  <option value="acquistata">venduta</option>
  <option value="nonAcquistata">non venduta</option>
  
</select>
          
          
          
          
          
          
          
          
          
          
          <button type ="submit" onclick="return confirm('sei sicuro')"  class="btn btn-dark" value="Aggiorna" >invia</button>
       
         
      </form>
    </div>



  
</table>