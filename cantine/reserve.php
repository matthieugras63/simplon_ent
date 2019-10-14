<?php require_once "../connect.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

/* variables containing messages initialized */
$msgSucc = $msgErr =  '';


/* Check if input is empty or not */

if (!empty($_POST['reserveDay']) && !empty($_POST['child'])) {
  $reserve = $_POST['reserveDay'];
  $name = $_POST['child'];


  /* Here, we will check if the date the user want to reserve isn't already booked */
  $checkIfExist = "SELECT id,id_student,date FROM reservation WHERE date ='$reserve' AND id_student = (SELECT id_student FROM student WHERE firstname = '$name' AND id_user = 1);";
  $req = mysqli_query($link, $checkIfExist);
  $donnees = mysqli_fetch_row($req);

  /* If the query return at least one row, it  means that the date is already booked */

  if ($donnees[0] !== NULL) {
    $msgErr .= "<br/> Cette date est déjà réservée pour " . $_POST['child']. " ( " . $_POST['reserveDay']." )";
  } else {
    /* If not, we insert the value into the database */
    $add = "INSERT INTO reservation (id_student,date) VALUES ((SELECT id_student FROM student WHERE firstname = '$name' AND id_user = 1),'$reserve');"; /* Add between quotes $_SESSION */
    $req = mysqli_query($link, $add);
    $msgSucc .="<br/> Date réservée avec succès pour " . $_POST['child']. " le " . $_POST['reserveDay']."" ;
  }
}

/* Here, we will check if the input is empty when the user click on submit. If yes, error message appear */
if (isset($_POST["submitDay"])) {



  if(empty($_POST['child'])){
    $msgErr .= "<br/> Veuillez sélectionner un enfant pour lequel réserver une date";
  }
  if(empty($_POST["reserveDay"])) {
    $msgErr .= "<br/> Veuillez saisir une date à réserver";
  }
}
?>


<body>
  <h1>Réservation de la cantine</h1>


  <div class="reservation">

    <span ><?php echo "<font color='red'>$msgErr</font>" ;?></span>
    <span ><?php echo "<font color='green'>$msgSucc</font>";?></span>



    <form class="" action="reserve.php" method="post">
      <p>
        <label for="child"><br><br>Enfant :</label>
        <select name="child" id="child">
          <option value="">Sélectionnez un enfant</option>

          <?php

          $selectChild = "SELECT firstname, lastname, id_student FROM student WHERE id_user = 1 ORDER BY firstname ASC";
          $req = mysqli_query($link, $selectChild);

          while ($result = mysqli_fetch_row($req)){
            for ($i=0; $i < count($result) ; $i+=3) {
              ?>
              <option value="<?php echo $result[$i]; ?>"> <?php echo $result[$i] ." " . $result[$i+1]; ?></option>
              <?php
            }
          }
          ?>
        </select>
      </p>
      <p>
        <label for="">Réserver un jour</label>
        <input class="inputDate" type="date" name="reserveDay" value="">
      </p>
      <input class="inputDate2" type="submit" name="submitDay" value="Valider">
    </form>
  </div>

  <button class="retour">Retour</button>

  <script type="text/javascript" src="scripts/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>
