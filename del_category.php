<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retrait Catégorie</title>
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

  <main>
    <div class="alert-container">
      
      <div class="info">Vous avez séléctionné cette ligne :</div>
      
      <br>

      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>ID</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $id = htmlspecialchars($_GET['id']);

          $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
          
          $stmt = $req->prepare("SELECT name, id FROM category WHERE id=:id");
          $stmt->execute(array(
            'id' => $id
          ));
          
          $resultat = $stmt->fetchAll();

          for ($i=0; $i < count($resultat); $i++) { 
            echo "<tr>";
            for ($j=0; $j < count($resultat[$i])/2; $j++) { 
              echo "<td>{$resultat[$i][$j]}</td>";
            }
            echo "</tr>";
          }
          
          ?>

        </tbody>
      </table>

      <br>

      <form action="./validation_del_category.php" method="post">
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <input type="submit" value="Valider la Suppression">
      </form>

    </div>
    <button><a href="./aff_category.php">Retour à la liste</a></button>
  </main>

</body>
</html>