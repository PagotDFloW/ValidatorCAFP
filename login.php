<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head> 


<body>
	
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ValidatorAP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active nav-item" href="index.php">Accueil</a>
            <a class="nav-link nav-item" href="register.php">Inscription</a>
            <a class="nav-link nav-item" href="login.php">Connexion</a>
            <a class="nav-link nav-item" href="#">Contact</a>
        </div>
        </div>
    </div>
    </nav>
	
<div class="container">
<table align="center">
		<tr>		
			<td width="80%">
				
				<div>
				<form method="POST" action="#">
					<div class ="erreur-connexion">
						<?php
							$matchFound = (isset($_GET["erreur"]) && trim($_GET["erreur"]) == 'connexionErreur');
							if($matchFound){
								echo '<p>Login ou mot de passe incorrect.</p>';
							}
						
						?>
					</div>
					<fieldset>
					<legend>Connectez vous</legend> 
					<div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" id="email" placeholder="exemple@exemple.com">
                    </div>
                    
                 
                 	<div class="form-group">
	                   <label for="password">Mot de passe</label>
	                   <input type="password" class="form-control" id="mdp">
                 	</div>
                 	
					<input type="hidden" name="formtype" value="connexion" />	
					<input type="submit" name="valider" class="btn btn-primary" value="Se connecter"/>
							   
				</form>
				</div>
				</fieldset>
			</td>
		</tr>
</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


</body>
</html>



