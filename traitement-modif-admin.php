<?php
session_start();
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare("UPDATE reservation SET id_salle = :label,heure_debut = :heureDebut, heure_fin = :heureFin, date_debut = :dateDebut, date_fin = :dateFin  WHERE id_reservation = :id LIMIT 1");
      $statement->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
      $statement->bindValue(":label", $_POST['choix'], PDO::PARAM_STR);
      $statement->bindValue(":heureDebut", $_POST['hd'], PDO::PARAM_STR);
      $statement->bindValue(":heureFin", $_POST['hf'], PDO::PARAM_STR);
      $statement->bindValue(":dateDebut", $_POST['db'], PDO::PARAM_STR);
      $statement->bindValue(":dateFin", $_POST['df'], PDO::PARAM_STR);
      $data = $statement->execute();


        header('Location:accueilAdmin.php');
    exit;
?>
