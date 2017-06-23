<?php
include('connect.php');
//----------------------On défini les variables------------------------------//
      $name=$_POST['name'];
      $difficulty=$_POST['difficulty'];
      $distance=$_POST['distance'];
            $duration=$_POST['duration'];
            $height_difference=$_POST['height_difference'];
// ---------------Requete pour injecter dans la table------------------------//
      $req = $bdd->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:name,:difficulty, :distance, :duration, :height_difference)");
      $req->execute(array(
      'name' => $name,
      'difficulty' => $difficulty,
      'distance' => $distance,
      'duration' => $duration,
      'height_difference' => $height_difference
      ));


      header('location: index.php');
