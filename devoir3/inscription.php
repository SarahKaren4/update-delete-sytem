<!DOCTYPE html>
<html>
<head>
<style>
input[type="text"],input[type="password"] {
  width: 85%;
  height:30px;
  display: block;
  margin-bottom: 10px;
  border: 1px dotted black;
  border-radius: 5px;
}

input[type="button"] {
  width: 120px;
  display: block;
}
select{
  margin-left:500px;
  width: 120px;
  display: block; 
}
input[type="submit"] {
  margin-left:35%;
  background-color:skyblue;
  border-radius:10px solid black;
  border: 1px solid black;
  border-radius: 5px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/style.css">

<meta charset="utf-8" />
<title></title>
</head>
<body>
  
<script> 
  function GEEK()								 
  { 
    var nom = document.forms["RegForm"]["nom"]; 
    var prenom = document.forms["RegForm"]["prenom"]; 
    var sexe = document.forms["RegForm"]["sexe"]; 

    var password = document.forms["RegForm"]["pwd"];  

    if (nom.value == "")						 
    { 
      window.alert("Entrez votre nom s'il vous plait."); 
      nom.focus(); 
      return false; 
    } 
  
    if (prenom.value == "")						 
    { 
      window.alert("Entrez votre prenom s'il vous plait."); 
      prenom.focus(); 
      return false; 
    } 
    
    if (sexe.value == "0")						 
    { 
      window.alert("Entrez votre sexe s'il vous plait."); 
      sexe.focus(); 
      return false; 
    } 
    if (password.value == "")					 
    { 
      window.alert("Entrez votre mot de passe s'il vous plait."); 
      password.focus(); 
      return false; 
    } 
    return true; 
  }
  </script>  
      <div class="container"> 
          <div class="row"> 
              <div class="offset-md-5"></div>
           
         <p class="nav-link">Inscription</p><br>
        </div> 
      </div> 
     
    <div class="container">

    <form method="post"  name="RegForm" onsubmit="return GEEK()">
    <input  type="text" name="nom" placeholder="nom"><br>
        <input type="text" name="prenom" placeholder="prenom"><br>
  <select name="sexe">
    <option value="0">Sexe:</option>
    <option value="homme">Homme</option>
    <option value="femme">Femme</option>
    
  </select>
  
        <br>
        <input type="password" name="pwd" placeholder="Mot de passe"><br>
        &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" name="Inscription"><br>
        
        </form>          
    </div> 
  </div> 
</div> 
 
  <?php
  if(isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['pwd']) && isset($_POST['sexe'])){
    include 'config.php';
      $nom = addslashes($_POST ['nom']);
      $prenom = addslashes($_POST ['prenom']);
      $pwd = md5($_POST ['pwd']);
      $sexe = ($_POST ['sexe']);
      $query = mysqli_query($conn, "SELECT * FROM inscription WHERE nom ='$nom'");
      $rows = mysqli_num_rows($query);
      if($rows==0){
      $array = $query->fetch_assoc();
      mysqli_query($conn,'insert into inscription(id, nom, prenom, pwd, sexe) values ("","'.$nom.'", "'.$prenom.'" , "'.$pwd.'", "'.$sexe.'")');
					echo "<script>alert('Votre compte a été créé');</script>";
        header("location:users.php");
      }else{
        echo "<script>alert('Déja inscrit');</script>";

      }
      mysqli_close($conn);
    }

  ?>
  
</body>
</html>