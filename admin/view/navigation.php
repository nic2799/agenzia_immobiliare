
<?php
$pageUrl = $_SERVER['PHP_SELF'];?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
    
    <?php for($i = 1; $i<= $numPages+1; $i++){
      $class = $i == $page ? ' active' : '';//per colorare gli indici
      
      
      ?>
    <li class="page-item<?=$class?>"><a class="page-link" href="<?="$pageUrl?page=$i"?>"><?=$i?></a>
    </li><?php } ?>
   
  </ul>
</nav>
