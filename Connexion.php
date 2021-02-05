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
    $query = $db->prepare("UPDATE Client SET n_motdepasse = 0 WHERE IDCli = ?",
    $query->execute(
    array($data["IDCli"])));

$data = $req->fetch();

if ($data["IDCli"] == ""){
    $valid = false;
    $err_Email = "L'Email ou le mot de passe est incorrecte";
}    

if (isset($_POST['Connexion'])){

    if(isset($_SESSION['IDCli'])){
        echo"<script>alert('Connexion reussie')</script>";
        echo"<scripte>window.location = 'Html.php'</script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleConnexion.css"/>
    <header><div id= "ClothesShop-section-header" class= "ClothesShop-section">
    <nav class="slide-nav_wrapper">
    <ul id="SlideNav" class="slide-nav">
    <li class="slide-nav_item border-bottom">
    <a> Acceuil </a>
    </li>
    <li class="slide-nav__item meduim-up--hide">
    <button type="button" value="Achat"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
    <div type="sunmit" name="s'inscrire" class="btn">s'inscrire</button>
    </div>
    </ul>
    </header>
    <body>

    <form action="/ma-page-de-connexion" method="post">
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
    

    </body>



    </html>