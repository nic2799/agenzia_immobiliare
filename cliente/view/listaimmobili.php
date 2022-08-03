<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
    <tr> <th colspan="5">Case totali in vendita <?=$totalImmobili?> numero di pagine <?=$numPages?></th></tr>
    <tr>
        <th>ID</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>indirizzo</th><!--quidi di base diamo questa stringa username ecc a orderby poi href è sulla pagina stessa e imponiamo orderby a quella stringa -->
        <th>prezzo</th>
        <th>Descrizione</th>
        <th>immagine</th>
        <th>acquista/elimina</th>
       
       


    </tr>
   </thead>
   <tbody>
    <?php
    if($immobile){
        foreach($immobile as $immobili){
           // echo $immobili['immagine'] ;
            ?>
            
        
            <tr>
                <td><?=$immobili['id_immobile']?></td>
                <td>   <?=$immobili['indirizzo']?> </td>
                <td>  <?=$immobili['prezzo']    ?>  </td>
                <td><?=$immobili['descrizione']?></td>
            <td> <img src="<?=$immobili['immagine']?>"  height="150" width="170"></td>
            <style>

            </style>
            
                <td> 
                    <div class="row">
                        <div class = "col-md-4">
                        <a class ="btn btn-success" href="<?=$updateurl?>?id=<?=$immobili['id_immobile']?>">
                    acquista <i class="fas fa-cart-plus "></i>
                    </a> </div>
                    </div>
                    <div class="row">
                        
                        <form class="form" action="<?=$updateurl?>?id_imm=<?=$immobili['id_immobile']?>&prop=<?=$immobili['username_del_proprietario']?>" id=homeform name="homeform" method="post">
                        
                           <input class="form-control "  type="date" name = "data_prenotazione" id="data_prenotazione" value="data_prenotazione" placeholder="Search" aria-label="Search">
                        
                           <button class="btn btn-light btn-sm" type="submit"> prenota  <i class="fas fa-share"></i></button>
                          
                          </form>
                          </div>
                    </div>
                    </div>
                   
                
                    
                       
                        
                </td>
        
        </tr>
        <?php
        }
        echo '<tr> <td colspan = "5"> ';
       require_once 'navigation.php';
      echo '</td> </tr>';
    }else{
        echo '<tr> <td colspan="5"> no found </td> </tr>'; 
        require_once 'navigation.php';
    }
    ?>
   


   </tbody>


</table>