<?php

/*session_start();
if (!isset($_SESSION["IDCli"])) {
    header("Location: Connexion.php");
    exit();
}*/
require_once "BDD.php"

?>

<?php
if (isset($_POST['Deconnexion'])){

    if(isset($_SESSION['IDCli'])){
        echo"<script>alert('Deconnexion reussie')</script>";
        echo"<script>window.location = 'Connexion.php'</script>";
    }
}

if (isset($_POST['Mon panier'])){

    if(isset($_SESSION['IDCli'])){
        echo"<script>alert('Voici votre panier')</script>";
        echo"<script>window.location = 'Html.php'</script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Html.css"/>
    <title>Clothes Shop</title>
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
<div>
    <form action="Panier.php" method="post">
    <button type="submit" name="Mon panier" class="btn">Mon panier</button>
    </form>
    </div> 
    <div>
    <form action="Connexion.php" method="post">
    <button type="submit" name="Deconnexion" class="btn">Deconnexion</button>
    </form>
    </div>    
    </header>

<body>

<div>
<img src="php-site-e-commerce/Photo Shop e-commerce/SweatF1.jpg" alt="Sweat Femme 1"/><img src="php-site-e-commerce/Photo Shop e-commerce/tshirtF2.jpg" alt="T-shirt Femme 2"/>
<p>14,99€</p><p>9,99€</p>
<img src="php-site-e-commerce/Photo Shop e-commerce/sweatF2.jpg" alt="Sweat Femme 2"/><img src="php-site-e-commerce/Photo Shop e-commerce/tshirtF2.jpg" alt="T-shirt Femme 1"/>
<p>14,99€</p><p>9,99€</p>
<img src="php-site-e-commerce/Photo Shop e-commerce/Sweat1.jpg" alt ="Sweat Homme 1"/><img src="php-site-e-commerce/Photo Shop e-commerce/TshirtH1.jpeg" alt="T-shirt Homme 1"/>
<p>14,99€</p><p>9,99€</p>
<img src="php-site-e-commerce/Photo Shop e-commerce/Sweat2.jpg" alt ="Sweat Homme 2"/><img src="php-site-e-commerce/Photo Shop e-commerce/tshirt4.jpg" alt="T-shirt Homme 2"/>
<p>14,99€</p><p>9,99€</p>

</div>


</body>

</html>