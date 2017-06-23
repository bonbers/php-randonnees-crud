<?php

include ('connect.php');

$req = $bdd->query('SELECT * FROM hiking');
while ($data = $req->fetch()){

 ?>

 <p><b>Nom de la randonnée :</b> <?php echo ($data->name); ?></p>
 <p><b>Difficulté :</b> <?php echo ($data->difficulty); ?></p>
  <p><b>Distance :</b> <?php echo ($data->distance); ?></p>
   <p><b>Durée:</b> <?php echo ($data->duration); ?></p>
    <p><b>Dénivelé :</b> <?php echo ($data->height_difference); ?></p>
  <a class="delete" id=<?php echo ($data->id) ?>>Supprimer</a>
<?php

}

?>
