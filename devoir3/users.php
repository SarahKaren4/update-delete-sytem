<?php
session_start();
include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  width:12%;
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

td:hover {background-color:#f5f5f5;}
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
<p align='center'>Les Membres</p>
<?php
  //---------- DISPLAY IMAGES FROM TABLE----------------------
  include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM inscription");
    $rows = mysqli_num_rows($query);
    $i=1;
    if($rows!=0){
  ?>
  <p align='center'>Utilisateurs :<?php echo $rows;?> </p>
  <table border="1">
  <tr><th><B>Identifiant</B></th><th><B>Nom</B></th><th><B>Prenom</B></th><th><B>Sexe</B></th><th><B>Photo</B></th><th><B>Date D'enregistrement</B></th><th><B>Modifier</B></th><th><B>Effacer</B></th></tr>
  <?php
  while($pict = mysqli_fetch_assoc($query)) {
    $enreg = $pict['enreg'];
    $id = $pict['id']; 
    $nom = $pict['nom'];
    $prenom = $pict['prenom'];
    $img = $pict['img'];
    $sexe = $pict['sexe'];

  ?>

  <tr><td><?php echo $i++ ;?></td>
  <td><?php echo $nom ;?></a></td>
  <td><?php echo htmlentities($pict['prenom'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlentities($pict['sexe'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php
if($sexe=='femme')
{
	echo "<img src='download (1).png'>";
}
elseif($sexe=='homme')
{
  echo "<img src='download.png'>";
}
?></td>
  <td><?php echo $pict['enreg'];?></td>
<td>
<form method = "POST" action = "modifier.php?id=<?php echo addslashes($pict['id']); ?>">
 <input type = "hidden" name = "id"  value = "<?php echo $id; ?>"<BR>
  <input type = "submit" name = "modifier"  style="background:url(update.png) no-repeat; width:230px; border:0px; height:200px"
 value = "">
  
   </form>
</td>
<td><form method = "POST" action = "effacer.php?id=<?php echo addslashes($pict['id']); ?>">
 <input type = "hidden" name = "id"  value = "<?php echo $id; ?>"<BR>
  <input type = "submit" name = "supprimer" style="background:url(effacer.png) no-repeat; width:230px; border:0px; height:200px" value = "">
   </form>
</td>

  </tr>
  <?php
  }
}
  ?>
<footer></footer>

</body>
</html>