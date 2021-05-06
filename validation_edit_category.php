<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Édition Catégorie</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<header>
    <nav>
      <ul class="group_menus">
        <li class="menus"><a href="./index.php">Accueil</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_article.php">Articles</a></li>
        <li class="menus"><a href="./ajout_article.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_category.php">Catégories</a></li>
        <li class="menus"><a href="./ajout_category.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_tag.php">Tags</a></li>
        <li class="menus"><a href="./ajout_tag.php">Ajout</a></li>
      </ul>
      <ul class="group_menus">
        <li class="menus"><a href="./aff_user.php">Utilisateurs</a></li>
        <li class="menus"><a href="./ajout_user.php">Inscription</a></li>
      </ul>
    </nav>
    <div class="coco">
      <ul class="connect">
        <li class="sous_menus btn_co"><a href="./connexion.php">Connexion</a></li>
        <li class="sous_menus btn_deco"><a href="./deconnexion.php">Déconnexion</a></li>
      </ul>
    </div>
  </header>
  
<main>
  <div class="alert-container">
    <?php

    $id = htmlspecialchars($_POST['id']);

    $nom = htmlspecialchars($_POST['nom']);
    $nomLen = strlen($nom);
    $nomBool= false;
    if (strlen($nom)<=3) {
      echo "<h3 class=\"error\">Le nom est trop court : $nomLen caractères(s)</h3>";
    } else {
      $nomBool = true;
      echo "<h3 class=\"success\">Le nom est valide</h3>";
    }

    if($nomBool) {
      
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      $sth = $req->prepare('UPDATE category SET name = :name WHERE id=:id');
      
      $sth->execute(array(
        'name' => strip_tags($nom),
        'id' => $id
      ));
      
    }

    ?>
  </div>
  <button><a href="./aff_category.php">Retour à la liste</a></button>
</main>

  
</body>
</html>