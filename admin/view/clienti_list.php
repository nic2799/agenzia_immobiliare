<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
    <tr> <th colspan="5">TOTAL USER <?=$totalusers?> </th></tr>
    <tr>
        <th>ID</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>indirizzo</th><!--quidi di base diamo questa stringa username ecc a orderby poi href è sulla pagina stessa e imponiamo orderby a quella stringa -->
        <th>prezzo</th>
        <th>Descrizione</th>
        <th>ruolo</th>
       
       


    </tr>
   </thead>
   <tbody>
   <form class = "d-flex" method ="get" action="<?=$pageUrl?>" id = "cercaform">
   <select class ="d-flex" id = "ruolo" name = "ruolo" >
   <option name = "ruolo" value="proprietario">Proprietari</option>
    <option  name = "ruolo" value="cliente">Clienti</option>
   </select>
   
        <button class="btn btn-light btn-sm" type="submit"> Search  <i class="fas fa-search"></i></button></form>
    <?php
    if($users){
        foreach($users as $utente){
           // echo $immobili['immagine'] ;
            ?>
        
            <tr>
                <td><?=$utente['username']?></td>
                <td>   <?=$utente['email']?> </td>
                <td>  <?=$utente['Nome']    ?>  </td>
                <td><?=$utente['Cognome']?></td>
               <td> <?=$utente['ruolo']?> </td>
            
                <td> 
                   
                        <div class = "col-md-6">
                        <a onclick="return confirm('sei sicuro')" class ="btn btn-success" href="<?=$updateurl?>?username=<?=$utente['username']?>">
                    elimina <i class="fas fa-ban"></i>
                    </a>
                    </div>
                    
                        </div>
                        
                </td>
        
        </tr>
        <?php
        }
        echo '<tr> <td colspan = "5"> ';
       
      echo '</td </tr>';
    }else{
        
        echo '<tr> <td colspan="5"> no found </td> </tr>'; 
    }
    ?>
   


   </tbody>


</table>