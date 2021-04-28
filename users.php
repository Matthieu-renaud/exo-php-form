<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs</title>
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


  <table>
    <thead>
      <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Pseudo</th>
        <th>Email</th>
        <th>ID</th>
        <th class="modif">Modification</th>
      </tr>
    </thead>
    <tbody>

      <?php

      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      
      $stmt = $req->prepare("SELECT firstname, lastname, pseudo, email, id FROM users");
      $stmt->execute();
      
      $resultat = $stmt->fetchAll();

      for ($i=0; $i < count($resultat); $i++) { 
        echo "<tr>";
        for ($j=0; $j < count($resultat[$i])/2; $j++) { 
          echo "<td>{$resultat[$i][$j]}</td>";
        }
        print_r("<td class=\"modif\"><button id=\"submit{.$i}\"><a href=\"#\">Modifier</a></button></td>");
        echo "</tr>";
      }
 
      // print_r($resultat);
      // print_r($resultat[0]['pseudo']);
      // var_dump($resultat);
      // print_r(count($resultat[0])/2);
      
      ?>

    </tbody>
  </table>

</body>
</html>