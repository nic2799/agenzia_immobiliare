<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styleLogin.css">
    <?php 
  
    
    ?>

</head>
<body>


<div class="login">
<h1 class ="text-center">Registrati</h1>
     
<div class="col">
    

<img src="casa.gif" class="rounded mx-auto d-block" alt="" height="220px" width="">  
  
  
<form class="form" action="reg.php" id=usernameform name="ausernameform" method="post">
  
        <input type="text" class = "form-control" name="username"placeholder="inserisci username"/>
        <input type="email" class = "form-control" name="email" placeholder="inserisci email"/>
        <input type="password" class = "form-control"name ="password" placeholder="inserisci password"/>
        <input type="text" class = "form-control" name ="Nome" placeholder="nome"/>
        <input type="text" class = "form-control" name ="Cognome" placeholder="cognome"/>
        
        
        <label for="proprietario" class ="radio-inline"><input type="radio" name="ruolo" value="proprietario"
        id="proprietario"> Proprietario</label>

        <label for="cliente" class="radio-inline"><input type="radio" name="ruolo" value="cliente"
        id="cliente"> cliente</label>
        
        
   
        
        <button type ="submit" class="btn btn-dark" value="Aggiorna" onclick="location.href='login1.php'">REGISTRATI</button>
       
    </form>
  </div>


    
</div>


</body>
</html>