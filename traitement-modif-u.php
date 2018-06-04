<?php
session_start();
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare("UPDATE utilisateur SET nom = :nom, email = :email  WHERE id_utilisateur = :id LIMIT 1");
      $statement->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
      $statement->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
      $statement->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
      $data = $statement->execute();

header('Location:utilisateur.php');
exit;
?>
