<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajout Salle</title>
    <meta name="keyword" content="application web reservation salle reunion">
    <meta name="description" content="salaries entreprises">
    <meta name="author" content="KEHLI Fatima">
    <meta name="identifier-URL" content="www.monsite.com">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="5 days">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        echo "<p class=\"name\" style='color:white; margin-left:86%;margin-top:30px;font-size:20px;'>" .$_SESSION['nom']."</p>";
        ?>
          <a href="deconnexion.php"><i class="fas fa-power-off"></i></a>
      </div>
    </header>
    <nav class="nav-accueil">
      <ul>
        <li><i class="fas fa-home"></i><a href="accueilAdmin.php">Accueil</a></li>
        <li><i class="fas fa-plus"></i><a href="accueilSalle.php">Salle</a></li>
        <li><i class="fas fa-info-circle"></i><a href="utilisateur.php">Utilisateurs</a></li>
      </ul>
    </nav>
    <h2>Ajouter Salle</h2>
    <form id="reservation" class="" action="traitement-ajoutSalle.php" method="post">
      <label for="">Nom salle</label>
      <input type="text" name="salle" value="" placeholder="Entrez le nom"><br>
      <input type="submit" name="ajout" value="Ajouter">
    </form>

  </body>
  </html>
