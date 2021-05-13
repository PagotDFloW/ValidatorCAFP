<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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

			<form method="POST" action="form.php">
				<fieldset>
					<legend>Inscription</legend> 
					
					<div class="form-group">
	                    <label for="nom">Nom</label>
	                    <input type="text" class="form-control" id="nom" placeholder="ABDALLAH">
                 	</div>
                 	<br/>

                 	<div class="form-group">
	                    <label for="prenom">Prénom</label>
	                    <input type="text" class="form-control" id="prenom" placeholder="Cheikh">
                 	</div>
                 	<br/>
                 
                 	<div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" id="email" placeholder="exemple@exemple.com">
                    </div>
                    <br/>
                 
                 	<div class="form-group">
	                   <label for="password">Mot de passe</label>
	                   <input type="password" class="form-control" id="mdp">
                 	</div>
                 	<br/>

                 	<div class="form-group">
	                   <label for="password">Confirmez votre mot de passe</label>
	                   <input type="password" class="form-control" id="mdp">
                 	</div>
                 	<br/>
						
				
						<div class = "erreur-connexion">
							<?php
								$matchFound = (isset($_GET["erreur"]) && trim($_GET["erreur"]) == 'erreurInscription');
								if($matchFound){
									echo '<p>Login existe, veuillez vous connectez.</p>';
								}
							
							?>
						<input type="submit" class="btn btn-primary" name="valider" value="S'inscrire"/>
						</div>
				</fieldset>
			</form>
			</td>
		</tr>
</table>
</div>
				
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</body>
</html>