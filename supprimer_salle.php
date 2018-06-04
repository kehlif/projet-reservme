<?php
session_start();
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare('DELETE FROM salle WHERE id_salle=:id');
      $statement->bindValue(":id", $_GET['id_s'], PDO::PARAM_INT);
      $data = $statement->execute();


header('Location:accueilSalle.php');
exit;
?>
