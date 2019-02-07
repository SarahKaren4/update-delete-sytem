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


select{
  margin-top:10px;
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
i{
  color:blue;
}
</style>
<title>MODIFIER</title>
</head>
<body>
<h1>MODIFIER</h1>
<BR>
 
  <?php
  include 'config.php';
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM inscription  WHERE id = '$id'");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
      while($inscription  = mysqli_fetch_assoc($query)) {
      $nom = $inscription ['nom'];
      $prenom = $inscription ['prenom'];
      $sexe = $inscription ['sexe'];


  ?>
  <p>MODIFIER LES INFORMATIONS DE <?php echo'<i >'.$nom.'</i>'; ?></br>
  </p>
  <form method = "POST" action = "">
  <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
  Nom : <input type = "text" name = "nom" value = "<?php echo $nom; ?>"><BR>
  Prenom : <input type = "text" name = "prenom" value = "<?php echo $prenom; ?>"><BR>
  Mot de passe : <input type = "password" name = "pwd"><BR>
  <select name="sexe">
    <option value="<?php echo $sexe;?>"></option>
    <option name='sexe' value="homme">Homme</option>
    <option name='sexe' value="femme">Femme</option>
    
  </select>
  <div class='form-group'>
  <input type = "submit" name = "Modifier"  value = "Modifier">
      </div>
   </form>

  <?php
  }

  }
//-----------Modifier ACTION ----------------------------
  if(isset($_POST['Modifier'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $pwd = $_POST['pwd'];
    // Check if field doesn't contain only white spaces
    if($pwd!=""){
    $pwd = md5($pwd);
    $UpdateQuery = "UPDATE inscription  SET  nom = '$nom', prenom = '$prenom', pwd = '$pwd', sexe = '$sexe' WHERE id='$id'";
    $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./users.php")'; // -->
    echo ' </script>';
    }else{
      $UpdateQuery = "UPDATE inscription  SET  nom = '$nom', prenom = '$prenom', sexe = '$sexe'  WHERE id='$id'";
      $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./users.php")'; // -->
    echo ' </script>';
    }
    mysqli_close($conn);
  }
  ?>

</body>
</html>
