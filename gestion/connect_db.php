<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $DBname     = "sitem_db";

    // Créer une connexion
    $conn = mysqli_connect($servername, $username, $password, $DBname);

    // Vérifier la connexion
    if (!$conn) {
        die("La connexion a échoué: " . mysqli_connect_error());
    }
   


?>