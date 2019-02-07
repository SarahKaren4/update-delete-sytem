<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
<style>
.mySlides {display:none;}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/style.css">
<meta charset="utf-8" />
<title></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">piece</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
            <li class="nav-item">
              <a class="nav-link" href="#">COMMANDES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">BLACK MARKET</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">BOUTIQUE</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if(isset($_SESSION['nom'])) {
                  echo''.$_SESSION['nom'];
                }
                ?>   </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="connexion.php">Connexion</a>
                <a class="dropdown-item" href="inscription.php">Inscription</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="deconnexion.php">Deconnexion</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher une piece </button>
          </form>
        </div>
      </nav>
      <div class="w3-content w3-section" style="max-width:500px; margin-left:500px; border:1px">
  <img class="mySlides" src="images/11.jpg" style="width:100%">
  <img class="mySlides" src="images/011zse047-1.jpg" style="width:100%">
  <img class="mySlides" src="images/download.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<div class='container'>
<div class='container'><h2 align='center'>Nos categories<h2></div>
<?php
  //---------- DISPLAY IMAGES FROM TABLE----------------------
  include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM categorie  ");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
  ?>

  <div class='row'>

  <?php
  while($video = mysqli_fetch_assoc($query)) {
    $img_categorie = $video['img_categorie'];
    $nom_categorie = $video['nom_categorie'];

  ?>
  
  <div class='col-lg-3'>
  <?php echo "<a href=''><img src=data:image/jpg;base64,$img_categorie width='100%' height='50%'>".$nom_categorie."</a>";?>
  <a href=''><?php echo "<br>";?></a><br>

  <a href=''><?php ?></a><br>
 
  </div>
   

  
  <br>
  <?php
  }
}

  ?>
<footer></footer>

</body>
</html>