<?php
session_start();
$con = new PDO ('mysql:host=localhost;dbname=id3146784_reservme','id3146784_kehli','papounetweb');

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  // echo "connecté";

  $sql="SELECT * FROM salle";
  $stmt=$con->prepare($sql);
  $stmt->execute();
  $results=$stmt->fetchAll();

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Accueil Salle</title>
    <meta name="keyword" content="application web reservation salle reunion">
    <meta name="description" content="salaries entreprises">
    <meta name="author" content="KEHLI Fatima">
    <meta name="identifier-URL" content="www.monsite.com">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="5 days">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <img class="logo-mobile-blanc" src="assets/img/R-logo-bis.png" alt="logo">
            <a class="nav-link" href="accueilAdmin.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueilSalle.php">Salle</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="utilisateur.php">Utilisateurs</a>
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
        <li><i class="fas fa-home"></i><a href="accueilAdmin.php">Accueil</a></li>
        <li><i class="fas fa-plus"></i><a href="accueilSalle.php">Salle</a></li>
        <li><i class="fas fa-info-circle"></i><a href="utilisateur.php">Utilisateurs</a></li>
      </ul>
    </nav>

    <h2>Liste des salles</h2>
    <table class="tab-salle">
      <tr>
      <th><p class="text">id</p></th>
      <th><p class="text">Nom</p></th>
      <th><i class="far fa-edit"></i></th>
      <th><i class="far fa-trash-alt"></i></th>
      </tr>
      <tbody>
        <?php
          foreach ($results as $result):?>
          <tr>
            <td><?php echo $result['id_salle']; ?></td>
            <td><?php echo $result['nom']; ?></td>
            <td><a href="modifier_salle.php?id_s=<?php echo $result['id_salle']; ?>">modifier</a></td>
            <td><a style="background: red; text-decoration: none; color:white; margin:10px; border-radius:5px; padding:5px;" href="supprimer_salle.php?id_s=<?php echo $result['id_salle']; ?>">supprimer</a></td>
          </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
          <a class="ajout" href="ajoutSalle.php">Ajouter Salle</a>

          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
