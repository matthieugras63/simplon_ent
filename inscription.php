<?php
require_once 'connect.php';
session_start()
?>
<!DOCTYPE html>
<html>
<head>
  <title>INSCRIPTION</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style.css" media="screen" type="text/css" />
</head>
<body class="Admin">
  <?php require_once 'menu.php' ?>
  <div class="bloc">

    <div class="form">
      <h1>Inscription<h1><br>
      <form method="post" action="inscription.php">
          Prénom : <br><input class="input" type="text" name="firstname"><br>
          Nom : <br><input class="input" type="text" name="lastname"><br>
          Email : <br><input class="input" type="email" name="email"><br>
          Identifiant : <br><input class="input" type="fonction" name="login"><br>
          Mot de passe : <br><input class="input" type="password" name="password"><br>
          Confirmation du mot de passe : <br><input class="input" type="password" name="repeatpassword"><br>
          Fonction : <br><select name="function">
                            <option value="">-- choose your function --</option>
                            <option value="parent">Parent</option>
                            <option value="professeur">Professeur</option>
                            <option value="administration">Administration</option>
                        </select><br>
          <input type="submit" name="submit" value="Valider">
      </form>
    </div>
  </div>
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])){
   /* on test si les champ sont bien remplis */
    if (!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']) AND !empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['repeatpassword']) AND !empty($_POST['function']))
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($_POST['password'])>=6)
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['repeatpassword'])
            {
                // On crypte le mot de passe
                $_POST['password'] = sha1($_POST['password']);
                // on se connecte à MySQL et on sélectionne la base

                    $function = htmlspecialchars($_POST['function']);
                //On créé la requête
                $req = "INSERT INTO user VALUES (NULL,'".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['login']."','".$_POST['password']."','".$function."')";
                $send=mysqli_query($link,$req);
                /* execute et affiche l'erreur mysql si elle se produit */
                if (!$send)
                {
                    printf("Message d'erreur : %s\n", $link->error);
                }
            // on ferme la connexion
            mysqli_close($link);
            }
            else echo "Les mots de passe ne sont pas identiques";
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}

?>
