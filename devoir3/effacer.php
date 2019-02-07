<head>
<style>

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
<title>Effacer</title>
</head>
<body>
<h1>Effacer</h1>
<BR>
  
  <?php
  include 'config.php';
    //---------- supprimer UPDATE FORM----------------------
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM inscription WHERE id = '$id'");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
      while($inscription = mysqli_fetch_assoc($query)) {
        $id = $inscription['id'];
      $nom = $inscription['nom'];
      $prenom = $inscription['prenom'];
      $sexe = $inscription['sexe'];
      $enreg = $inscription['enreg'];

      echo"Id<i> ".$id."</i><br>" ;
      echo"Nom <i>".$nom."</i><br>" ;
     echo"Prenom<i> ".$prenom."</i><br>";
     echo"Sexe <i>".$sexe."</i><br>";
     echo"Date enregistrement <i>".$enreg."</i><br>";


  ?>
  <p>Voulez-vous vraiment supprimer  <?php echo'<i>'.$nom.'</i>'; ?></br></p>

  <form method = "POST" action = "">
  <input type = "hidden" name = "id" value = "<?php echo'<i>'.$id.'</i>'; ?>">

  <input type = "submit" name = "Effacer" value = "Effacer">
   </form>

  <?php
  }

  }
//-----------Effacer ACTION ----------------------------
  if(isset($_POST['Effacer'])){
    $id = $_POST['id'];
    $deleteQuery = "DELETE FROM inscription  WHERE id='$id'";
    $conn->query($deleteQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("./users.php")'; // -->
    echo ' </script>';
    mysqli_close($conn);
  }
  ?>

</body>
</html>
