<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
    <tr> <th colspan="5">Case totali in vendita <?=$totalusers?> numero di pagine <?=$numPages?></th></tr>
    <tr>
        <th>ID</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>indirizzo</th><!--quidi di base diamo questa stringa username ecc a orderby poi href è sulla pagina stessa e imponiamo orderby a quella stringa -->
        <th>   username proprietario  </th>
        <th>prezzo</th>
        <th>Descrizione</th>
        <th>immagine</th>
        <th>stato</th>
        <th>update/delete</th>
       
       


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
                <td><?=$immobili['indirizzo']?></td>
                <td><?=$immobili['username_del_proprietario']?></td>
                <td><?=$immobili['prezzo']?></td>
                <td><?=$immobili['descrizione']?></td>
            <td> <img src="<?=$immobili['immagine']?>"  height="150" width="170"></td>
            <td><?=$immobili['stato']?></td>
         
                <td> 
                    
                    <div class="row">
                        <div class = "col-md-4">
                        <a onclick="return confirm('sei sicuro')" class ="btn btn-danger" href="<?=$updateurl?>?id_immobile=<?=$immobili['id_immobile']?>"> elimina <i class="fas fa-ban"></i>
                    </a>
                    </div>
                    </div>
                    <div class="row">
                        <div class = "col-md-4">
                        <a  class ="btn btn-success" href="http://localhost/SWBD/esame-swbd/admin/aggiorna_immobile.php?id=<?=$immobili['id_immobile']?>&indirizzo=<?=$immobili['indirizzo']?>&prezzo=<?=$immobili['prezzo']?>&descrizione=<?=$immobili['descrizione']?>&immagine=<?=$immobili['immagine']?>&userdelprop=<?=$immobili['username_del_proprietario']?>&state=<?=$immobili['stato']?>">
                    update <i class="fas fa-edit"></i>
                    </a>
                    </div>
                    </div>
                    
                       
                        
                </td>
        
        </tr>
        <?php
        }
        
    }else{
        echo '<tr> <td colspan="5"> no found </td> </tr>'; 
        
    }
    ?>
   


   </tbody>


</table>