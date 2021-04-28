<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vérification</title>
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

<main>
  <div class="alert-container">
    <?php


    if(isset($_POST['prenom']) && !empty($_POST['prenom'])) {
      $nom = htmlspecialchars($_POST['prenom']);
      if(!isset($_COOKIE['prenom']) || empty($_COOKIE['prenom']))
        setcookie('prenom', $nom, time() + 3600 * 24 * 365, null, null, false, true);
    }
    $prenom = htmlspecialchars($_POST['prenom']);
    $prenomLen = strlen($prenom);
    $prenomBool= false;
    if (strlen($prenom)<=4) {
      echo "<h3 class=\"error\">Le prénom est trop court : $prenomLen caractères(s)</h3>";
    } else {
      $prenomBool = true;
      echo "<h3 class=\"success\">Le prénom est valide</h3>";
    }

    if(isset($_POST['nom']) && !empty($_POST['nom'])) {
      $nom = htmlspecialchars($_POST['nom']);
      if(!isset($_COOKIE['nom']) || empty($_COOKIE['nom']))
        setcookie('nom', $nom, time() + 3600 * 24 * 365, null, null, false, true);
    }
    $nom = htmlspecialchars($_POST['nom']);
    $nomLen = strlen($nom);
    $nomBool= false;
    if (strlen($nom)<=4) {
      echo "<h3 class=\"error\">Le nom est trop court : $nomLen caractères(s)</h3>";
    } else {
      $nomBool = true;
      echo "<h3 class=\"success\">Le nom est valide</h3>";
    }

    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
      $nom = htmlspecialchars($_POST['pseudo']);
      if(!isset($_COOKIE['pseudo']) || empty($_COOKIE['pseudo']))
        setcookie('pseudo', $nom, time() + 3600 * 24 * 365, null, null, false, true);
    }
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $pseudoLen = strlen($pseudo);
    $pseudoBool= false;
    if (strlen($pseudo)<=4) {
      echo "<h3 class=\"error\">Le pseudo est trop court : $pseudoLen caractères(s)</h3>";
    } else {
      $pseudoBool = true;
      echo "<h3 class=\"success\">Le pseudo est valide</h3>";
    }

    if(isset($_POST['email']) && !empty($_POST['email'])) {
      $nom = htmlspecialchars($_POST['email']);
      if(!isset($_COOKIE['email']) || empty($_COOKIE['email']))
        setcookie('email', $nom, time() + 3600 * 24 * 365, null, null, false, true);
    }
    $email = htmlspecialchars($_POST['email']);
    $emailLen = strlen($email);
    $emailBool= false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<h3 class=\"error\">L'email n'est pas valide</h3>";
    } else {
      $emailBool = true;
      echo "<h3 class=\"success\">L'email est valide</h3>";
    }


    $mdp = htmlspecialchars($_POST['mdp']);
    $mdpLen = strlen($mdp);
    $mdpBool= false;
    if (strlen($mdp)<=6) {
      echo "<h3 class=\"error\">Le mot de passe est trop court : $mdpLen caractères(s)</h3>";
    } else {
      $mdpBool = true;
      echo "<h3 class=\"success\">Le mot de passe est valide</h3>";
    }

    $confmdp = htmlspecialchars($_POST['confmdp']);
    $confmdpLen = strlen($confmdp);
    $confmdpBool= false;
    if ($confmdp!=$mdp) {
      echo "<h3 class=\"error\">Les mots de passe ne sont pas identiques";
    } else {
      $confmdpBool = true;
      echo "<h3 class=\"success\">Les mots de passe sont identiques</h3>";
    }

    if($nomBool && $prenomBool && $pseudoBool && $emailBool && $mdpBool && $confmdpBool) {
      echo "<h2 class=\"success\">Tous les champs sont valides</h2>";
      $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
      
      $req = new PDO('mysql:host=localhost;dbname=my_blog', 'root', '');
      $sth = $req->prepare('INSERT INTO users (firstname, lastname, pseudo, mdp,  email) VALUES(:firstname, :lastname, :nickname, :pwd, :email)');
      
      $sth->execute(array(
        'firstname' => $prenom,
        'lastname' => $nom,
        'nickname' => $pseudo,
        'pwd' => $mdpHash,
        'email' => $email
      ));
      
    } else {
      echo "<h2 class=\"error\">Tous les champs ne sont pas valides</h2>";
    }

    ?>
  </div>
  <button><a href="./inscription.html">Retour au formulaire</a></button>
</main>


</body>
</html>
