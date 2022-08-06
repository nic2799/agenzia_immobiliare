<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
    <tr> <th colspan="5">Case totali in vendita <?=$totalusers?> numero di pagine <?=$numPages?></th></tr>
    <tr>
        <th>ID</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>indirizzo</th><!--quidi di base diamo questa stringa username ecc a orderby poi href è sulla pagina stessa e imponiamo orderby a quella stringa -->
        <th>prezzo</th>
        <th>Descrizione</th>
        <th>immagine</th>
        
       
       


    </tr>
   </thead>
   <tbody>
    <?php
    if($immobile){
        foreach($immobile as $immobili){
           // echo $immobili['immagine'] ;
           if($immobili['stato']=='nonAcquistata'){
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
                    
                    
                    
                       
                        
                </td>
        
        </tr>
        <?php  }
        }
      
    }else{
        echo '<tr> <td colspan="5"> no found </td> </tr>'; 
       
    }
    ?>
   


   </tbody>


</table>