<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Édition Tag</title>
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
    if (strlen($nom)<=5) {
      echo "<h3 class=\"error\">Le nom est trop court : $nomLen caractères(s)</h3>";
    } else {
      $nomBool = true;
      echo "<h3 class=\"success\">Le nom est valide</h3>";
    }
    
    $contenu = htmlspecialchars($_POST['contenu']);
    $contenuLen = strlen($contenu);
    $contenuBool= false;
    if (strlen($contenu)<=10) {
      echo "<h3 class=\"error\">Le contenu est trop court : $contenuLen caractères(s)</h3>";
    } else {
      $contenuBool = true;
      echo "<h3 class=\"success\">Le contenu est valide</h3>";
    }
    
    $category = ($_POST['category']);
    $categoryBool= false;
    if ($category<1) {
      echo "<h3 class=\"error\">La categorie n'a pas été sélectionné</h3>";
    } else {
      $categoryBool = true;
      echo "<h3 class=\"success\">La categorie est valide</h3>";
    }

    if($nomBool && $contenuBool && $categoryBool) {
      
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      $sth = $req->prepare('UPDATE article SET name = :name, contenu_article = :contenu, category_id = :category WHERE id=:id');
      
      $sth->execute(array(
        'name' => strip_tags($nom),
        'contenu' => strip_tags($contenu),
        'category' => strip_tags($category),
        'id' => $id
      ));
      
    }

    ?>
  </div>
  <button><a href="./aff_article.php">Retour à la liste</a></button>
</main>

  
</body>
</html>