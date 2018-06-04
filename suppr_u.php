<?php
session_start();
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $donnee = $con->prepare('DELETE FROM utilisateur WHERE id_utilisateur = :id');
      $donnee->bindValue(":id", $_GET['id_u'], PDO::PARAM_INT);
      $data = $donnee->execute();

header('Location:utilisateur.php');
exit;
?>
