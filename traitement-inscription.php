<?php
session_start();


  $con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  // echo "connecté";

  if(isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $insert = $con->prepare("INSERT INTO utilisateur (nom, email, mdp) VALUES (:nom, :email, :mdp)");
    $insert->bindParam(':nom',$nom);
    $insert->bindParam(':email',$email);
    $insert->bindParam(':mdp',$mdp);
    $insert->execute();

}
header("Location:connexion.php");
exit;

?>
