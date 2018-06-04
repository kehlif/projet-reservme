<?php
session_start();
$id = $_SESSION['id_utilisateur'];

  $con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  // echo "connecté";

  if(isset($_POST['reserver'])) {
    $dateDebut = $_POST['db'];
    $dateFin = $_POST['df'];
    $heureDebut = $_POST['hd'];
    $heureFin = $_POST['hf'];
    $idSalle = $_POST['choix'];
    $id = $_SESSION['id_utilisateur'];


    // $sql="SELECT s.nom as label,u.nom, r.id_reservation, date_debut, date_fin FROM reservation r JOIN utilisateur u JOIN salle s WHERE r.id_u = $id AND  u.id_utilisateur = $id AND r.id_salle = s.id_salle";
    // $sql = "SELECT date_debut, date_fin FROM reservation";
    // $stmt->bindValue(":label", $_POST['choix'], PDO::PARAM_STR);
    // $stmt=$con->prepare($sql);
    // $stmt->execute();
    // $data=$stmt->fetch
    // $queryG= "SELECT r.heure_debut, r.heure_fin, r.date_debut, r.date_fin, s.nom as label
    // FROM reservation r, salle s WHERE  r.id_salle = s.id_salle";
    // $select = $con->prepare($queryG);
    // // $select->setFetchMode(PDO::FETCH_ASSOC);
    // $select->execute();
    // $data=$select->fetch();
    // var_dump($data);
    // $select = $con->prepare($sql);
    // $select->setFetchMode(PDO::FETCH_ASSOC);
    // $select->execute();
    // $data=$select->fetchAll();
    // echo "<pre>";
    // var_dump($data);
    // var_dump($data["date_debut"]);
    // echo "</pre>";
    // var_dump($data);
    // if($dateDebut >= $data['date_debut'] && $dateFin <= $data['date_fin']){
    //   echo "erreur";
    //   exit("erreur");
    //
    // if($dateDebut = $dateFin){
    //   echo "erreur";
    //   exit("erreur");
    //
    // }else{
    //   exit("no erreur");
    //
    //
    //faire test avec && opérateurs
    // if($dateDebut == $data['date_debut']){
    //   echo "good erreur";
    //   var_dump($data['date_debut']);
    //   exit("erreur");
    // }elseif($dateDebut > $data['date_debut']){
    //    echo '<script>alert("TON TEXTE bis");</script>';
    //    var_dump($data['date_debut']);
    //    var_dump($dateDebut);
    $insert = $con->prepare("INSERT INTO reservation (heure_debut, heure_fin, date_debut, date_fin, id_salle, id_u) VALUES (:heureDebut, :heureFin, :dateDebut, :dateFin, :idSalle, :id)");
    $insert->bindParam(':dateDebut',$dateDebut);
    $insert->bindParam(':dateFin',$dateFin);
    $insert->bindParam(':heureDebut',$heureDebut);
    $insert->bindParam(':heureFin',$heureFin);
    $insert->bindParam(':idSalle', $idSalle, PDO::PARAM_INT);
    $insert->bindParam(":id", $id, PDO::PARAM_INT);
    $insert->execute();
}
header("Location:accueil.php");
exit;

 ?>
