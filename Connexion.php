<?php

require_once "BDD.php";

if (isset($_SESSION["IDCli"])){
    header("loation: Html.php");
    exit;
}

if(isset($_POST["connexion"])){
    $pseudo = htmlentities(trim($$pseudo));
    $Email = htmlentities(strtolower(trim($Email)));
    $motdepasse = trim($motdepasse);
}

if(empty($pseudo)){
    $valid = false;
    $err_pseudo = "veuilliez remplir le champs pseudo";
}

if(empty($Email)){
    $valid = false;
    $err_Email = "veuilliez remplir le champs Email";
}

if(empty($motdepasse)){
    $valid = false;
    $err_motdepasse = "veuilliez remplir le champs mot de passe";
}

$req = $db->prepare("SELECT *
            FROM Client
            WHERE Email = ? AND motdepasse = ?");
        $req->execute(   
            array($Email, crypt($motdepasse,"secret")));
$data = $req->fetch ();

if (!isset($data["IDCli"])){
    $valid = false;
    $err_Email = "L'Email ou le mot de passe est incorrecte";
}elseif($data["n_motdepasse"] == 1)
$db->prepare("UPDATE Client SET n_motdepasse = 0 WHERE IDCli = ?",
$db->execute(
    array($data["IDCli"])));

$data = $req->fetch();

if ($data["IDCli"] == ""){
    $valid = false;
    $err_Email = "L'Email ou le mot de passe est incorrecte";
}    

if (isset($_POST['Connexion'])){

    if(isset($_SESSION['IDCli'])){
        echo"<script>alert('Connexion reussie')</script>";
        echo"<script>window.location = 'Html.php'</script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Connexion.css"/>
    <header><div id= "ClothesShop-section-header" class= "ClothesShop-section">
    <nav class="slide-nav_wrapper">
    <ul id="SlideNav" class="slide-nav">
    <li class="slide-nav_item border-bottom">
    <a> Acceuil </a>
    </li>
    <li class="slide-nav__item meduim-up--hide">
</svg>
    <div> 
    <form action="Inscription.php" method="post">
    <button type="submit" name="s'inscrire" class="btn">s'inscrire</button>
    </form>
    </div>
    </ul>
    </header>
    <body>

    <form action="Html.php" method="post">
    <div>
        <label for="name">Pseudo :</label>
        <input type="text" id="name" name="user_pseudo">
    </div>

    <div>
        <label for="Mdp">Mot de passe :</label>
        <input type="password" id="pwd" name="user_password">
    </div>
    <div>
        <label for="Mdp">Confirmation du mot de passe :</label>
        <input type="password" id="pwd" name="user_ConfirmPassword">
    </div>
    <div> 
     <button type="submit" name="Connexion" class="btn">Connexion</button>
    </div> 
    </form>

    </body>



    </html>