
<!DOCTYPE html>
<html lang="fr">
<head>   
<meta charset="UTF-8">    
</head>  

</head>
<body>
<div class="row h-100 justify-content-center align-items-center ">
        <div class="col-lg-4 col-md-6 col-sm-8 col-5 ">
            <h1 class="text-center h1-register">S'inscrire</h1><hr>
            <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-center mb-2 mt-5">
                <form action="index.php?page=register" method="POST" class="w-100 ">
                    <div class="form-group row">
                    <div class="form-group row">
                        <label class="register">Nom d'utilisateur :</label>
                        <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                        
                    </div>
                        <label class="register">Prénom :</label>
                        <input type="text" name="firstname" class="form-control" value="<?php echo htmlspecialchars($_POST['firstname'] ?? ''); ?>">
                        
                    </div>
                    <div class="form-group row">
                        <label class="register">Nom :</label>
                        <input type="text" name="lastname" class="form-control" value="<?php echo htmlspecialchars($_POST['lastname'] ?? ''); ?>">
                        
                    </div>
                    <div class="form-group row">
                        <label class="register">Email :</label>
                        <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                        
                    </div>
                    <div class="form-group row">
                        <label class="register">Téléphone :</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">    
                    </div>
                    <div class="form-group row">
                        <label class="register">Adresse :</label>
                        <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($_POST['address'] ?? ''); ?>">
                    </div>
                    <div class="form-group row">
                        <label class="register">Mot de passe :</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label class="register">Confirmez le mot de passe :</label>
                        <input type="password" name="password_confirm" class="form-control">
                        
                    </div><br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-light">M'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>