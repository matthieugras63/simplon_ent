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

if (!empty($_POST['cancelDay']) && !empty($_POST['child'])) {
  $cancel = $_POST['cancelDay'];
  $name = $_POST['child'];

  /* Here, we will check if the date the user want to cancel isn't already booked */
  $checkIfExist = "SELECT id,id_student,date FROM reservation WHERE date ='$cancel' AND id_student = (SELECT id_student FROM student WHERE firstname = '$name' AND id_user = 1) ;";
  $req = mysqli_query($link, $checkIfExist);
  $donnees = mysqli_fetch_row($req);

  /* If the query return at least one row, it  means that the date is already booked */

  if ($donnees[0] == NULL) {
    $msgErr .= "<br/> Cette date n'est pas réservée pour " . $_POST['child']. " ( " . $_POST['cancelDay']." )";
  } else {
    /* If not, we insert the value into the database */
    $del = "DELETE FROM reservation WHERE id_student = (SELECT id_student FROM student WHERE firstname = '$name' AND id_user = 1) AND date = '$cancel';"; /* Add between quotes $_SESSION */
    $req = mysqli_query($link, $del);
    $msgSucc .="<br/> Date annulée avec succès pour " . $_POST['child']. " le " . $_POST['cancelDay']."" ;
  }
}

/* Here, we will check if the input is empty when the user click on submit. If yes, error message appear */
if (isset($_POST["submitDay"])) {



  if(empty($_POST['child'])){
    $msgErr .= "<br/> Veuillez sélectionner un enfant pour lequel annuler une date";
  }
  if(empty($_POST["cancelDay"])) {
    $msgErr .= "<br/> Veuillez saisir une date à annuler";
  }
}
?>


<body>
  <h1>Annulation d'une réservation</h1>


  <div class="reservation">

    <span ><?php echo "<font color='red'>$msgErr</font>" ;?></span>
    <span ><?php echo "<font color='green'>$msgSucc</font>";?></span>



    <form class="" action="cancel.php" method="post">
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
        <label for="">Annuler une réservation</label>
        <input class="inputDate" type="date" name="cancelDay" value="">
      </p>
      <input class="inputDate3" type="submit" name="submitDay" value="Annuler">
    </form>
  </div>

  <button class="retour">Retour</button>

  <script type="text/javascript" src="scripts/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>
