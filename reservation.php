<?php
session_start();


  $con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  // $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $sql="SELECT * FROM salle";
  // echo "connecté";

  $stmt=$con->prepare($sql);
  $stmt->execute();
  $results=$stmt->fetchAll();

  $queryG= "SELECT r.heure_debut, r.heure_fin, r.date_debut, r.date_fin, s.nom as label
  FROM reservation r, salle s WHERE  r.id_salle = s.id_salle";
  $select = $con->prepare($queryG);
  $select->setFetchMode(PDO::FETCH_ASSOC);
  $select->execute();
  $data=$select->fetchAll();
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
    <title>Réservation</title>
    <link rel="stylesheet" href="assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tablet.css">
    <link rel="stylesheet" href="assets/css/phone.css">
  </head>
  <body>
    <header id="haut-page">
      <div class="entete">
        <img class="logo-accueil" src="assets/img/R-logo-bis.png" alt="logo">
        <h2>Reserv'me</h2>
        <?php
        echo "<p class=\"name\" style='color:white; margin-left:86%;margin-top:30px;font-size:20px;'>" .$_SESSION['nom']."</p>";
        ?>
        <a href="deconnexion.php"><i class="fas fa-power-off"></i></a>
      </div>
    </header>
    <!--  navigation bootstrap -->
    <nav id="navbar" class="navbar navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fond" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="accueil.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reservation.php">Réservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="details.php">Détails</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="deconnexion.php">Déconnexion</a>
          </li>
        </ul>
      </div>
        <img class="logo-mobile" src="assets/img/R-logo.png" alt="logo">
    </nav>
    <nav class="nav-accueil">
      <ul>
        <li><i class="fas fa-home"></i><a href="accueil.php">Accueil</a></li>
        <li><i class="fas fa-plus"></i><a href="reservation.php">Reservations</a></li>
        <li><i class="fas fa-info-circle"></i><a href="details.php">Détails</a></li>
      </ul>
    </nav>
    <h1 class="titre-reservation">Réserver une salle</h1>
    <form id="reservation" action="traitement-reservation.php" method="post">
      <label for="">Nom Salle</label>
      <select name="choix">
      <option value="">Choisir une salle</option>
      <?php foreach ($results as $res) { ?>
        <option value="<?php echo $res["id_salle"]; ?>"><?php echo $res["nom"]; ?></option>
      <?php } ?>
      </select><br>
      <label for="">Date de Début</label>
      <input type="date" name="db" value="" placeholder="jj/mm/aaaa"><br>
      <label for="">Date de Fin</label>
      <input type="date" name="df" value="" placeholder="jj/mm/aaaa"><br>
      <label for="">Heure de Début</label>
      <input type="time" name="hd" value="" placeholder="--:--"><br>
      <label for="">Heure de Fin</label>
      <input type="time" name="hf" value="" placeholder="--:--"><br>
      <input type="submit" name="reserver" value="Réserver ">
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
