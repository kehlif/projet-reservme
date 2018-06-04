<?php
session_start();
?>
<?php
$id = $_SESSION['id_utilisateur'];
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare("SELECT r.id_reservation, r.heure_debut, r.heure_fin, r.date_debut, r.date_fin, s.nom as label, u.nom
      FROM reservation r, salle s, utilisateur u WHERE id_reservation = :id LIMIT 1");
      $statement->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
      $statement->execute();
      $data = $statement->fetch();

      $sql="SELECT * FROM salle";
      $stmt=$con->prepare($sql);
      $stmt->execute();
      $results=$stmt->fetchAll();
      //
      // $statement = $con->prepare("SELECT s.id_salle , s.nom as label
      //  FROM reservation r JOIN utilisateur u JOIN salle s WHERE
      //    u.id_utilisateur = $id
      //  AND r.id_salle = s.id_salle");
       $statement = $con->prepare ("SELECT s.id_salle, s.nom as label
       FROM reservation r JOIN utilisateur u JOIN salle s WHERE r.id_u = $id AND
        u.id_utilisateur = $id AND r.id_salle = s.id_salle AND id_reservation = :id ");

      $statement->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
      $statement->execute();
      $datas = $statement->fetch();

// var_dump($datas);
      // var_dump($datas);
      // echo var_dump($_GET);
      // var_dump($data);

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="keyword" content="application web reservation salle reunion">
    <meta name="description" content="salaries entreprises">
    <meta name="author" content="KEHLI Fatima">
    <meta name="identifier-URL" content="www.monsite.com">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="5 days">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifications Réservation</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tablet.css">
    <link rel="stylesheet" href="assets/css/tabletxs.css">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link rel="stylesheet" href="assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
  </head>
  <body>
    <header id="haut-page">
      <div class="entete">
        <img class="logo-accueil" src="assets/img/R-logo-bis.png" alt="logo">
        <h2>Reserv'me</h2>
        <?php
        echo "<p class=\"name\" style='color:white; margin-left:84%;margin-top:28px;font-size:24px;'>" .$_SESSION['nom']."</p>";
        ?>
        <a href="deconnexion.php"><i class="fas fa-power-off"></i></a>
      </div>
    </header>
    <a href="accueil.php"><i class="fas fa-angle-left retour"></i></a>
    <h1 class="titre-modif">Modifier une réservation</h1>
    <form id="modification" class="" action="traitement-modif-reservation.php" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id_reservation'] ?>">
      <label for="">Nom Salle</label>
      <select name="choix">
      <option value="<?php echo $datas["id_salle"]; ?>"><?php echo $datas["label"]; ?></option>
      <?php foreach ($results as $res) { ?>
        <option value="<?php echo $res["id_salle"]; ?>"><?php echo $res["nom"]; ?></option>
      <?php } ?>
      </select><br>
      <label for="">Date de Début</label>
      <input type="date" name="db" value="<?php echo $data['date_debut'] ?>"><br>
      <label for="">Date de fin</label>
      <input type="date" name="df" value="<?php echo $data['date_fin'] ?>"><br>
      <label for="">Heure de Début</label>
      <input type="time" name="hd" value="<?php echo $data['heure_debut'] ?>"><br>
      <label for="">Heure de fin</label>
      <input type="time" name="hf" value="<?php echo $data['heure_fin'] ?>"><br>
      <input type="submit" name="modifier" value="Modifier">
    </form>
  </body>
</html>
