<?php
include ("./classes/validationurl.class.php");
include ("./classes/extractErrCss.class.php");
include ("./classes/extractErrHtml.class.php");
include ("./classes/recupLink.class.php");


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
        </div>
        </div>
    </div>
    </nav>


<form class="row g-3" id="ValidateUrlForm" method="post" action="./index.php">
  <div class="col-auto">
    <label for="inputUrl" id="labValidUrl">Entrer votre url</label>
  </div>
  <div class="col-auto">
    <input type="text" class="form-control" id="inputUrl" placeholder="http://www.exemple.com" name="UrlValid" value="<?php if(isset($_POST['UrlValid'])){echo $_POST['UrlValid'];}?>">
  </div>
  <div class="col-auto">
    <button class="btn btn-primary mb-3" id="Validate">Lancer la vérification</button>
  </div>
</form>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>






<ul class="nav nav-tabs" id="myTab" role="tablist">
<?php
    if (isset($_POST["UrlValid"])){
      $lastChar = substr($_POST['UrlValid'],-1);

      if($lastChar != "/"){
        $_POST["UrlValid"].="/";

      }
      
      $getLink= new RecupLink($_POST['UrlValid']);
      $EachLink = $getLink->getLink();

      if($EachLink){
        $TabSize = sizeof($EachLink);
        for ($i=0; $i< $TabSize; $i++){
          $Link= $EachLink[$i];
          $idForLabel = "tabs$i";
          $RealUrl = $_POST['UrlValid'].$Link;
          if ($i==0){
?>
<li class="nav-item" role="presentation">
  <button class="nav-link active" id="<?php echo $idForLabel?>-tab" data-bs-toggle="tab" data-bs-target="<?php echo "#".$idForLabel?>" type="button" role="tab" aria-controls="<?php echo $idForLabel?>" aria-selected="true"><?php echo $Link?></button>
</li> 
<?php
          }
else{
  ?>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="<?php echo $idForLabel?>-tab" data-bs-toggle="tab" data-bs-target="<?php echo "#".$idForLabel?>" type="button" role="tab" aria-controls="<?php echo $idForLabel?>" aria-selected="false"><?php echo $Link?></button>
</li>
  <?php
}
        }
?>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="css-tab" data-bs-toggle="tab" data-bs-target="#css" type="button" role="tab" aria-controls="css" aria-selected="false">Code CSS</button>
</li>
</ul>

<div class="tab-content" id="myTabContent">


<?php
        for ($i=0; $i< $TabSize; $i++){
          $Link= $EachLink[$i];
          $idForLabel = "tabs$i";
          $RealUrl = $_POST['UrlValid'].$Link;
          // echo "<h2>Examen de la page ".$RealUrl."</h2>";
          $getUrl = new ValidationUrl($RealUrl);
          

          $HT_Errors = $getUrl->GetHtmlErrors();
          $extract_HtmlErrors= new ExtractHtmlErrors($HT_Errors);
          if ($i==0){
          
?>
<div class="tab-pane fade show active" id="<?php echo $idForLabel;?>" role="tabpanel" aria-labelledby="<?php echo $idForLabel;?>-tab">
<?php
          }
          else{
            ?>
<div class="tab-pane fade" id="<?php echo $idForLabel;?>" role="tabpanel" aria-labelledby="<?php echo $idForLabel;?>-tab">

<?php
          }
          echo $extract_HtmlErrors->extract();

          // $Css_Errors= $getUrl->GetCssErrors();
          // $extract_CssErrors = new ExtractCssErrors($Css_Errors);
          // echo $extract_CssErrors->extract();

?>
</div>
<?php       
}
        
      }
?>
<div class="tab-pane fade" id="css" role="tabpanel" aria-labelledby="css-tab">

<?php
      $getUrl = new ValidationUrl($_POST['UrlValid']);
      $Css_Errors= $getUrl->GetCssErrors();
      $extract_CssErrors = new ExtractCssErrors($Css_Errors);
      echo $extract_CssErrors->extract();

    }
?>
</div>
</div>



</body>
</html>



