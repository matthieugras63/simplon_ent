<?php   session_start();
require_once "connect.php";

if(isset($_POST['connect'])){
    if(!empty($_POST['login']) AND !empty($_POST['mdp'])){
        $login = htmlspecialchars($_POST['login']);
    $mdp = sha1($_POST['mdp']);
    $findreq = "SELECT count(id) from user where login='$login' and password = '$mdp'";
    $findsend = mysqli_query($link,$findreq);
    $find = mysqli_fetch_array($findsend);
    if($find[0]==1){
        $sessionreq = "SELECT id,login,function FROM user where login='$login' and password= '$mdp'";
        $sessionsend = mysqli_query($link,$sessionreq);
        $sessionresult = mysqli_fetch_array($sessionsend);
        $_SESSION['id'] = $sessionresult[0];
        $_SESSION['login'] = $sessionresult[1];
        $_SESSION['function'] = $sessionresult[2];
    }else{
        $error = "Votre mot de passe ou votre identifiant est incorrect.";
    }
    }else{
        $error = "Vous devez compléter tous les champs.";
    };
    if(empty($_POST['login'])){
        $error .= "Vous devez complété votre identifiant";
    };
    if(empty($_POST['mdp'])){
        $error .= "Vous devez renseigner votre mot de passe.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <title>Accueil Simplon ENT</title>
</head>
<body class="admin">
    <main>
        <?php if(!isset($_SESSION['id'])){ ?> 
        <div class="form">
        <form method="post">
        <h2>Connexion:</h2>
        <label for="login">Identifiant:</label>
        <input type="text" class="input" name="login" placeholder="Votre identifiant" value="<?php if(isset($_POST['login'])){echo $_POST['login'];} ?>">
        <label for="mdp">Mot de passe:</label>
        <input type="password" class="input" name="mdp" placeholder="Votre mot de passe">
        <input type="submit" value="Me connecter" name="connect">
        <a href="">Mot de passe oublié</a>
        <?php if(isset($error)){ echo $error;} ?>
        </form>
        
        </div>
        <?php }else{ 
            require_once "menu.php";?>
            <h2> Bienvenue <?php echo $_SESSION['login']; ?></h2>
        <?php } ?>
    </main>
    
</body>
</html>