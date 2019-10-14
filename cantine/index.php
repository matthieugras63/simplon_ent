
<?php require_once '../connect.php'; ?>



<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Cantine</title>
  </head>
  <body>

    <section id="section_1">
      <h1>Cantine</h1>
    </section>

    <section id="section_2"><!-- Class menu a mettre -->
      <div class="monMenu">
            <?php
						$sql = 'SELECT * FROM menu';
						$result = mysqli_query($link, $sql);

						while ($row = mysqli_fetch_array($result)) { ?>
              <div class="<?php echo $row['day'];?>">
                <h2 class="jour"><?php echo $row['day']; ?></h2>
                <ul>
                  <li><?php echo $row['plate_a']; ?></li>
                  <li><?php echo $row['plate_b']; ?></li>
                  <li><?php echo $row['plate_c']; ?></li>
                </ul>
              </div>
            <?php } ?>


      </div>


      <div class="button">
        <button class="reserv" type="button" name="button">Réserver</button>
        <button class="annul" type="button" name="button">Annuler</button>
      </div>

    </section>

    <script type="text/javascript" src="scripts/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="scripts/script.js"></script>
  </body>
</html>
