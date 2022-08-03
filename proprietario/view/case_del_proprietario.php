<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
   
    <tr>
        <th>ID</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>indirizzo</th><!--quidi di base diamo questa stringa username ecc a orderby poi href è sulla pagina stessa e imponiamo orderby a quella stringa -->
        <th>prezzo</th>
        <th>Descrizione</th>
        <th>immagine</th>
        <th>acquistata/venduta</th>
       
       


    </tr>
   </thead>
   <tbody>
    <?php

    if($immobile){
        foreach($immobile as $immobili){
           // echo $immobili['immagine'] ;
           $name_gif= ($immobili['stato']=='acquistata') ? 'sold.gif' : 'sale.jpg'
            ?>
           
        
            <tr>
                <td><?=$immobili['id_immobile']?></td>
                <td>   <?=$immobili['indirizzo']?> </td>
                <td>  <?=$immobili['prezzo']    ?>  </td>
                <td><?=$immobili['descrizione']?></td>
            <td> <img src="<?=$immobili['immagine']?>"  height="150" width="170"></td>
            
          
            <td> <img src="<?=$name_gif?>" height="140" width=""/></td>
            
             
            <style>

            </style>
            
                
        
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