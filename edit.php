<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modification</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
   
<header>
    <nav>
      <ul>
        <li class="menus"><a href="./index.html">Accueil</a></li>
        <li class="menus"><a href="./users.php">Utilisateurs</a></li>
        <li class="menus"><a href="./inscription.html">Inscription</a></li>
      </ul>
    </nav>
  </header>

  <?php
  
  $id = htmlspecialchars($_GET['id']);

  $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
        
  $stmt = $req->prepare("SELECT firstname, lastname, pseudo, email FROM users WHERE id=:id");
  $stmt->execute(array(
    'id' => $id
  ));

  $resultat = $stmt->fetchAll();

  ?>

  <form action="./edition.php" method="post">
    <h1>Ce n'est pas un formulaire, c'est une modification,<br> je valide et je me sauve</h1>
    <div class="form-container">
      <label for="prenom">Prénom</label>
      <input class="input" type="text" name="prenom" id="prenom" value="<?php echo $resultat[0]['firstname'] ?>">
    </div>
    <div class="form-container">
      <label for="nom">Nom</label>
      <input class="input" type="text" name="nom" id="nom" value="<?php echo $resultat[0]['lastname'] ?>">
    </div>
    <div class="form-container">
      <label for="pseudo">Pseudo</label>
      <input class="input" type="text" name="pseudo" id="pseudo" value="<?php echo $resultat[0]['pseudo'] ?>">
    </div>
    <div class="form-container">
      <label for="email">Email</label>
      <input class="input" type="email" name="email" id="email" value="<?php echo $resultat[0]['email'] ?>">
    </div>
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    <input type="submit" value="Validation avec Modification">
  </form>

</body>
</html>