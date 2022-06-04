<?php
    $serveur = "localhost";
    $identifiant_bdd = "user";
    $motdepasse_bdd = "pwd";
    $bdd = "homeclik";
    $conn = mysqli_connect($serveur,$identifiant_bdd,$motdepasse_bdd,$bdd);
    if(!$conn){
        die("Erreur de connexion à la bdd");
    }
    date_default_timezone_set('Europe/Paris');
?>
