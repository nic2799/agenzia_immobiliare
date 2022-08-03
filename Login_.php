<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
   
    <link rel="stylesheet" href="styleLogin.css">
    <title>Document</title>
</head>
<body>



    
   <div class ="login">
    <h1 class ="text-center">Login</h1>
    <form action ="identificazione.php" method="post">
        <div class="form-group">
            <label class ="form-label" for="email">Email address</label>
            <input class = "form-control" type="email" name ="email" id="email">
        </div>
        <div class="form-group">
            <label class = "form-label" for="password">Password</label>
            <input class = "form-control" type="password" name="password" id="password">

        </div>
        
       
        
        <input class="btn btn-success w-100" type="submit" value="Sign in">
        
        <a href="http://localhost/SWBD/esame-swbd/Registrazione.php">Registrati</a>
        
        
    </form>
   </div>
   
    

   
   
   
</body>
</html>