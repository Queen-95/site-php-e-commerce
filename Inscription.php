<?php

require_once "BDD.php";




if (!empty($_POST)){
    extract($_POST);
    $valid = true;
}

if (isset($_POST["Inscription"])){
    $Pseudo = htmlentities(trim($Pseudo));
    $dateNaiss = htmlentities(trim($dateNaiss));
    $villeCli = htmlentities(trim($villeCli));
    $Email = htmlentities(strtolower(trim($Email)));
    $motdepasse = trim($motdepasse);
}

if(empty($Pseudo)){
    $valid = false;
    $er_pseudo = ("veuilliez remplir le champs ");
}

if(empty($dateNaiss)){
    $valid = false;
    $er_dateNaiss = ("veuilliez remplir le champs ");
}

if(empty($villeCli)){
    $valid = false;
    $er_villeCli = ("veuilliez remplir le champs ");
}

if(empty($Email)){
    $valid = false;
    $er_Email = ("veuilliez remplir le champs ");
 }elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i",$Email)){
     $valid = false;
     $er_Email = "L' email est pas bon";
 }


if(empty($motdepasse)){
    $valid = false;
    $er_motdepasse = "veuilliez remplir le champs";

}elseif($motdepasse != $confmotdepasse) {
    $valid = false;
    $er_motdepasse = " la confirmation du mot de passe doit être identique au mot de passe";
}

if($valid){

    $motdepasse = crypt($motdepasse,"secret");
    $date_creation_compte = date ('Y-m-d H:i:d');
    $query = $db->prepare ("INSERT INTO Client(IDCli,pseudo,dateNaiss,villeCLI,Email,motdepasse) 
    VALUES(?, ?, ?, ?, ?");
    $query->execute(
    array($IDCli,$Pseudo, $dateNaiss, $villeCli, $Email, $motdepasse));

    header("Location: Html.php");
    exit;

    if (isset($_POST['Inscription'])){

        if(isset($_SESSION['IDCli'])){
            echo"<script>alert('Inscription reussie')</script>";
            echo"<script>windows.location = 'Html.php'</script>";
        }
    }

    if (isset($_POST['Connexion'])){

        if(isset($_SESSION['IDCli'])){
            echo"<script>alert('Connexion reussie')</script>";
            echo"<script>windows.location = 'Html.php'</script>";
        }
    }
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inscription.css"/>
    <title>Clothes Shop</title>
   <header><div id= "ClothesShop-section-header" class= "ClothesShop-section">
    <nav class="slide-nav_wrapper">
    <ul id="SlideNav" class="slide-nav">
    <li class="slide-nav_item border-bottom">
    <form action="Connexion.php" method="post">
    <button type="submit" name="Connexion" class="btn">Connexion</button>
    </form>
    </li>
    <li class="slide-nav__item meduim-up--hide">
    </li>
    </ul>
    </header>
    <body>
    <form action="Html.php" method="post">
    <div>
        <label for="name">Pseudo :</label>
        <input type="text" id="name" name="user_pseudo">
    </div>
    <div>
        <label for="VilleCli">Ville :</label>
        <textarea id="text" name="user_VilleClient"></textarea>
    </div>   
    <div>
        <label for="DateNaiss">Date de naissance :</label>
        <textarea id="text" name="user_DateNaissance"></textarea>
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="user_mail">
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
    <button type="submit" name="Inscription" class="btn">s'inscrire</button>
    </div> 
    </div>
    </form>

    </body>

    </html>