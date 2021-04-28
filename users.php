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
            <!-- <th>Prénom</th>
            <th>Nom</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>ID</th> -->
        </tr>
    </thead>
    <tbody>
      <!-- <tr>
          <td>The table body</td>
          <td>with two columns</td>
          <td>with two columns</td>
          <td>with two columns</td>
          <td>with two columns</td>
      </tr> -->
      
      <?php
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      
      $stmt = $req->prepare("SELECT firstname AS prénom, lastname AS nom, pseudo, email, id FROM users");
      $stmt->execute();
      
      $resultat = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      echo $resultat;
      
      ?>
    </tbody>
  </table>

</body>
</html>