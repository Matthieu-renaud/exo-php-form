<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajout Article</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>

<header>
    <nav>
      <ul class="group_menus">
        <li class="menus"><a href="./index.html">Accueil</a></li>
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
        <li class="menus"><a href="./users.php">Utilisateurs</a></li>
        <li class="menus"><a href="./inscription.html">Inscription</a></li>
      </ul>
    </nav>
  </header>

  <form action="./validation_ajout_article.php" method="post">
    <h1>Ce n'est pas un formulaire, c'est une création d'article,<br> je valide et je m'applique</h1>
    <div class="form-container">
      <label for="nom">Nom</label>
      <input class="input" type="text" name="nom" id="nom">
    </div>
    <div class="form-container">
      <label for="contenu">Contenu</label>
      <input class="input" type="text" name="contenu" id="contenu">
    </div>
    <div class="form-container">
      <label for="category">Catégorie</label>
      <select id="category" name="category">
        <?php
        
        $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      
        $stmt = $req->prepare("SELECT name, id FROM category ORDER BY name");
        $stmt->execute();
        
        $resultat = $stmt->fetchAll();

        for ($i=0; $i < count($resultat); $i++) { 
          echo "<option "; 
          if ($resultat[$i]['name'] == "Autre")
          echo "selected ";
          echo "value=\"{$resultat[$i][1]}\">{$resultat[$i][0]}</option>";
        }
        
        ?>
        </select>
    </div>
    <input type="submit" value="Validation avec Création d'Article">
  </form>

</body>
</html>