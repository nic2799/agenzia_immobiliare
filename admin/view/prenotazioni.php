<?php
$pegeUrl = $_SERVER['PHP_SELF'];
?>
<table class = "table table-striped">
   <thead>
    <tr> <th colspan="5">date delle prenotazioni</th></tr>
    <tr>
    <th>id prenotazione</th>
    <th>id immobile</th>
        <th>anno/mese/giorno</th><!-- o anche page senza serve o scrivi direttamente $_SERVER[..] poi passiamo orderby-->
        <th>proprietario</th>
        <th>cliente prenotato</th>
    
       
       


    </tr>
   </thead>
   <tbody>
    <?php
    if($prenotati){
        foreach($prenotati as $prenotato){
           // echo $immobili['immagine'] ;
            ?>
            
        
            <tr>
            <td><?=$prenotato['id_prenotazione']?></td>
            <td><?=$prenotato['idimmobile']?></td>
                <td><?=$prenotato['data']?></td>
                <td><?=$prenotato['usernameProp']?></td>
                <td><?=$prenotato['clientePrenotato']?></td>
                
                
                
            <style>

            </style>
            
                <td> 
                    
                    
                    
                       
                        
                </td>
        
        </tr>
        <?php
        }
        echo '<tr> <td colspan = "5"> ';
       
      echo '</td> </tr>';
    }else{
        echo '<tr> <td colspan="5"> no found </td> </tr>'; 
        
    }
    ?>
   


   </tbody>


</table>