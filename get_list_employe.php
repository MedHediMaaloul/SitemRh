<?php
include ('gestion/connect_db.php');
global $conn;
$id_projet= $_POST['id_projet'];
if ($_POST['id_projet']) {
   
    $query = "SELECT domaine_projet FROM projet where id_projet='$id_projet'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $domaine_projet = $row[0];    
        $value = '
        <div class="form-group mb-4"> 
        <label class="col-md-12 p-0">Liste Employé<span class="text-danger">*</span></label>
        <select name="list_employe" id="list_employe" class="form-group">
        <option value="Choisissez" selected disabled>Choisissez un employé</option>
        ';
        
        if ($domaine_projet == 'Design') {
            $query1 = "SELECT * FROM personne where poste_personne='Designeur'" ;
            $result1 = mysqli_query($conn, $query1);
            if ($result1->num_rows > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    $value .= '<option value="' . $row1['id_personne'] . '">' . $row1['nom_personne'] . '  '. $row1['prenom_personne'] . '</option>';
                }
            }else {
                $value .= '<option disabled style="background-color:red; color:white;" value="0">Vide</option>';
            }
        }else if ($domaine_projet == 'Developpement') {
            
            $query1 = "SELECT * FROM personne where poste_personne='Developpeur'" ;
            $result1 = mysqli_query($conn, $query1);
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                
                $value .= '<option value="' . $row1['id_personne'] . '">' . $row1['nom_personne'] . '  '. $row1['prenom_personne'] . '</option>';
                }
        }else {
            $value .= '<option disabled style="background-color:red; color:white;" value="0">Vide</option>';
        }
            
        }else if ($domaine_projet == 'Marketing') {
             
            $query1 = "SELECT * FROM personne where poste_personne='CM'" ;
            $result1 = mysqli_query($conn, $query1);
        if ($result1->num_rows > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                
                $value .= '<option value="' . $row1['id_personne'] . '">' . $row1['nom_personne'] . '  '. $row1['prenom_personne'] . '</option>';
                }
        }else {
            $value .= '<option disabled style="background-color:red; color:white;" value="0">Vide</option>';
        }
            
        }        
       
        $value .= '</select></div>';


echo json_encode(['status' => 'success', 'html' => $value]);

}
?>
