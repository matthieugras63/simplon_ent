<?php session_start(); ?>

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

    <nav class="bloc3">
      <form class="parent" action="parent.php" method="post">
          <input type="submit" value="Parent">
      </form>
      <form class="professeur" action="professeur.php" method="post">
          <input type="submit" value="Professeur">
      </form>
      <form class="administration" action="administration.php" method="post">
          <input type="submit" value="Administration">
      </form>
    </nav>

  </div>
</div>
</body>
</html>
