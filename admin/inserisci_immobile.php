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
          
<img src="gifa3.gif" class="rounded mx-auto d-block" alt="" height="240px" width="">  
  
  
  <form class="form" action="<?=$updateurl?>" id=homeform name="homeform" method="post">
    
          <input type="text" class = "form-control" name="indirizzo" placeholder="inserisci indirizzo"/>
          <input type="number" class = "form-control" name="prezzo" placeholder="inserisci prezzo"/>
          <input type="text" class = "form-control"name ="descrizione" placeholder="inserisci descrizione"/>
          <input type="url" class = "form-control" name ="immagine" placeholder="inserisci url immagine"/>
          <input type="text" class = "form-control" name ="username_del_proprietario" placeholder="inserisci username del proprietario"/>
         
          
          
          
          
          
          
          
          
     
          
          <button type ="submit" class="btn btn-dark" value="Aggiorna" onclick="location.href='index.php'">invia</button>
       
         
      </form>
    </div>



  
</table>