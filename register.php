<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>ValidatorAP</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  

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
			<?php if(isset($_SESSION["nom"])){
			?>
			    <a class="nav-link nav-item" href="account.php"> Bonjour, <?php echo $_SESSION["prenom"]." ".$_SESSION["nom"];?> </a>

			<?php
			}
			?>
        </div>
        </div>
    </div>
    </nav>


<div class="container">
<table align="center">
		<tr>		
			<td width="70%">

			<form method="POST" action="./include/register.inc.php">
				<fieldset>
					<legend>Inscription</legend> 
					
					<div class="form-group">
	                    <label for="nom">Nom</label>
	                    <input type="text" class="form-control" id="nom" name="nom" placeholder="ABDALLAH">
                 	</div>
                 	<br/>

                 	<div class="form-group">
	                    <label for="prenom">Prénom</label>
	                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Cheikh">
                 	</div>
                 	<br/>

                 	<div class="form-group">
	                    <label for="entreprise">Entreprise</label>
	                    <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Engie">
                    </div>
                    <br/>

                    <div class="form-group">
	                    <label for="ville">Ville</label>
	                    <input type="text" class="form-control" id="ville" name="ville" placeholder="Cergy">
                    </div>
                    <br/>
                 
                 	<div class="form-group">
	                    <label for="email">Email</label>
	                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@exemple.com">
                    </div>
                    <br/>
                 
                 	<div class="form-group">
	                   <label for="password">Mot de passe</label>
	                   <input type="password" class="form-control" id="mdp" name="mdp">
                 	</div>
                 	<br/>

                 	<div class="form-group">
	                   <label for="password">Confirmez votre mot de passe</label>
	                   <input type="password" class="form-control" id="mdp" name="confirm">
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