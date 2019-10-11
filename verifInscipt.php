
<?php
var_dump();
if (isset($_POST['submit']))
{
   /* on test si les champ sont bien remplis */
    if (empty($_POST['last_name']) and empty($_POST['first_name']) and empty($_POST['email']) and empty($_POST['function']) and empty($_POST['login'])and empty($_POST['password']) and empty($_POST['repeatpassword']))
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
                require_once 'connect.php';
                //On créé la requête
                $link = "INSERT INTO user VALUES ('".$_POST['last_name']."','".$_POST['first_name']."','".$_POST['email']."','".$_POST['function']."','".$_POST['login']."','".$_POST['password']."')";
                /* execute et affiche l'erreur mysql si elle se produit */
                if (!$c->query($sql))
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
<!DOCTYPE html>
<html>
<head>
  <title>INSCRIPTION</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body class="Admin">
  <?php require_once 'menu.php' ?>
  <div class="bloc">

    <div class="form">
      <h1>Inscription<h1><br>
        <p> <?php $message ?>

    </div>
  </div>
</body>
</html>
