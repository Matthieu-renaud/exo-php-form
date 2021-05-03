<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation Ajout Article</title>
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
    <?php

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
      $sth = $req->prepare('INSERT INTO article (name, contenu_article, category_id) VALUES(:name, :contenu, :category)');
      
      $sth->execute(array(
        'name' => strip_tags($nom),
        'contenu' => strip_tags($contenu),
        'category' => strip_tags($category)
      ));
      
    }
    
    function string2url($chaine) { 
      $chaine = trim($chaine); 
      $chaine = strtr($chaine, 
      "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", 
      "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"); 
      $chaine = lcfirst(ucwords($chaine));
      $chaine = preg_replace('#([^.a-z0-9]+)#i', '', $chaine); 
              $chaine = preg_replace('#-{2,}#','',$chaine); 
              $chaine = preg_replace('#-$#','',$chaine); 
              $chaine = preg_replace('#^-#','',$chaine); 
      return $chaine; 
      }

      
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      $cmd = $req->prepare('SELECT name, id, CONCAT(name, id) FROM tag');
      $appel = $req->prepare('SELECT count(*) FROM tag');
      
      $cmd->execute();
      $appel->execute();
      
      $res = $cmd->fetchAll();
      $nbr = $appel->fetchAll();


      print_r($_POST['exemple16']);

      // if(!empty($case)){
      //   echo"Vous avez coché la case";}
      //   else
      //   {echo"Vous n'avez pas coché la case";
      // }
      
      // for ($i=0; $i < $nbr[0][0]; $i++) { 
      //   $idconcat = string2url($res[$i][2]);
      //   if ($_POST[$idconcat]=='on')
      //   echo 'cc';
      // }

      // $check = htmlspecialchars($_POST['contenu']);


    ?>
  </div>
  <button><a href="./ajout_article.php">Retour au formulaire</a></button>
</main>

  
</body>
</html>