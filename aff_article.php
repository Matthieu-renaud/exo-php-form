<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste Article</title>
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


  <table id="table_article">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Contenu</th>
        <th>Categorie</th>
        <th>ID Categorie</th>
        <th class="modif">Modification</th>
        <th class="suppr">Suppression</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      
      $stmt = $req->prepare("SELECT  article.id, article.name, article.contenu_article, category.name, category.id FROM article LEFT JOIN category ON article.category_id = category.id");
      $stmt->execute();
      
      $resultat = $stmt->fetchAll();

      for ($i=0; $i < count($resultat); $i++) { 
        echo "<tr>";
        for ($j=0; $j < count($resultat[$i])/2+1; $j++) { 
          echo "<td>{$resultat[$i][$j]}</td>";
        }
        print_r("<td class=\"modif\"><button id=\"modif{.$i}\"><a href=\"./edit_article.php?id={$resultat[$i][0]}\">Modifier</a></button></td>");
        print_r("<td class=\"suppr\"><button id=\"suppr{.$i}\"><a href=\"./del_article.php?id={$resultat[$i][0]}\">Supprimer</a></button></td>");
        echo "</tr>";
      }
      
      ?>

    </tbody>
  </table>

</body>
</html>