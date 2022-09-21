<?php
include_once('gestion/connect_db.php');
global $conn ;

$query= "INSERT into reunion(sujet_reunion,id_employe,debut_reunion,fin_reunion)
    values('".$_POST["id_sujetReunion"]."','".$_POST["id_liste_employe"]."','".$_POST["id_DebutReunion"]."','".$_POST["id_finReunion"]."')";

$result=mysqli_query($conn,$query);

if ($result) {
    echo "Ajouté avec succès ";
} else {
    echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
}
?>
