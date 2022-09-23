<?php
require_once('connect_db.php');
session_start();



function ajoutUser(){
    global $conn ;
    $nom=isset($_POST['nom']) ? $_POST['nom'] : null ;
    $prenom=isset($_POST['prenom']) ? $_POST['prenom'] : null ;
    $numCIN=isset($_POST['numCIN']) ? $_POST['numCIN'] : null ;
    $numTel=isset($_POST['numTel']) ? $_POST['numTel'] : null ;
    $email=isset($_POST['email']) ? $_POST['email'] : null ;
    $password=isset($_POST['password']) ? $_POST['password'] : null ;
    $role=isset($_POST['role']) ? $_POST['role'] : null ;
    $poste=isset($_POST['poste']) ? $_POST['poste'] : null ;

    
    $selectEmail = mysqli_query($conn, "SELECT * FROM personne WHERE email_personne = '".$_POST['email']."'");
    $selectCIN = mysqli_query($conn, "SELECT * FROM personne WHERE cin_personne!='0' and cin_personne = '".$_POST['numCIN']."'");
    
    if(mysqli_num_rows($selectEmail)) {
        exit('Cette email est déjà utilisée');
    }else if(mysqli_num_rows($selectCIN)) {
        exit('Ce numéro de CIN est déjà utilisé');
    }
    else {
        
        $query= "INSERT into personne(nom_personne,prenom_personne,numTel_personne,email_personne,password_personne,cin_personne,role_personne,poste_personne,salaire_personne)
        values('$nom','$prenom','$numTel','$email','md5($password)','$numCIN','$role','$poste','0')";
        $result=mysqli_query($conn,$query);

    if ($result) {
        echo "Ajouté avec succès ";
        // header("Location: login.php");

    } else {

        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}
}



function ajoutProjet(){
    global $conn ;
    $domaine=isset($_POST['domaine']) ? $_POST['domaine'] : null ;
    $nomClient=isset($_POST['nomClient']) ? $_POST['nomClient'] : null ;
    $titre_projet=isset($_POST['titre_projet']) ? $_POST['titre_projet'] : null ;
    $priorite=isset($_POST['priorite']) ? $_POST['priorite'] : null ;
    $description=isset($_POST['description']) ? $_POST['description'] : null ;
    $doc_projet_file=$_FILES["doc_projet"];

    $unique_id = hash("sha256", strval(rand(100, 999999)) + strval(time()));
    $doc_projet_filname = $unique_id . "_docproject." . strtolower(pathinfo($doc_projet_file["name"], PATHINFO_EXTENSION));
    move_uploaded_file($doc_projet_file["tmp_name"], "uploads/".$doc_projet_filname);

    $query= "INSERT into projet(id_client,domaine_projet,titre_projet,priorite_projet,description_projet,pieceJointe_projet,etat_projet,etat_projet_supprime)
        values('$nomClient','$domaine','$titre_projet','$priorite','$description','$doc_projet_filname','En attente','T')";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
        echo "Ajouté avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}



function ajout_Client(){

    global $conn ;
    $nom_entreprise=isset($_POST['nom_entreprise']) ? $_POST['nom_entreprise'] : null ;
    $email=isset($_POST['email']) ? $_POST['email'] : null ;
    $numTel=isset($_POST['numTel']) ? $_POST['numTel'] : null ;
    $adresse=isset($_POST['adresse']) ? $_POST['adresse'] : null ;
    $commentaire=isset($_POST['commentaire']) ? $_POST['commentaire'] : null ;
    $selectEmail = mysqli_query($conn, "SELECT * FROM client WHERE email_client= '".$_POST['email']."'");

    if(mysqli_num_rows($selectEmail)) {
        exit('Cette email est déjà utilisée');
    }else{
        echo $query= "insert into client(nom_entreprise_client,email_client,numTel_client,adresse_client,commentaire_client,etat_client)
        values('$nom_entreprise','$email','$numTel','$adresse','$commentaire','T')";
        $result=mysqli_query($conn,$query);
        
        if ($result) {
            echo "Ajouté avec succès ";
        } else {
            echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
        }
    }
    
}




function ajout_Conge(){
    global $conn ;
    $id_employe=isset($_POST['id_employe']) ? $_POST['id_employe'] : null ;
    $raisonConge=isset($_POST['raisonConge']) ? $_POST['raisonConge'] : null ;
    $autre=isset($_POST['autre']) ? $_POST['autre'] : null ;
    $debutConge=isset($_POST['debutConge']) ? $_POST['debutConge'] : null ;
    $FinConge=isset($_POST['FinConge']) ? $_POST['FinConge'] : null ;
    $description=isset($_POST['description']) ? $_POST['description'] : null ;
    // $nbreJour=isset($_POST['nbreJour']) ? $_POST['nbreJour'] : null ;

    $query= "INSERT into conge(id_employe,raison_conge,autre_raison_conge,debut_conge,fin_conge,nbre_jour,description_conge,etat_conge)
        values('$id_employe','$raisonConge','$autre','$debutConge','$FinConge','$nbreJour','$description','En attente')";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
        echo "Envoyée avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}




function ajout_fichePaie(){
    global $conn ;

    $list_employe=isset($_POST['list_employe']) ? $_POST['list_employe'] : null ;
    $prime=isset($_POST['prime']) ? $_POST['prime'] : null ;
    $Conge_mois= isset($_POST['Conge_mois']) ? $_POST['Conge_mois'] : null ;
    $mois= isset($_POST['mois']) ? $_POST['mois'] : null ;
    $annee= isset($_POST['annee']) ? $_POST['annee'] : null ;

    $query= "INSERT into fiche_de_paie(id_employe_fiche_paie,prime_fiche_paie,conge_mois_fiche_paie,mois_fiche_paie,annee_fiche_paie)
        values('$list_employe','$prime','$Conge_mois','$mois','$annee')";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
        echo "Ajouté avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}


function ajout_facture(){
    global $conn ;
   
    $doc_facture_file=$_FILES["doc_facture"];

    $unique_id = hash("sha256", strval(rand(100, 999999)) + strval(time()));
    $doc_facture_filename = $unique_id . "." . strtolower(pathinfo($doc_facture_file["name"], PATHINFO_EXTENSION));
    move_uploaded_file($doc_facture_file["tmp_name"], "facture/".$doc_facture_filename);

    $query= "INSERT into facture(fiche_facture)
        values('$doc_facture_filename')";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
        echo "Ajoutée avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}



function updateUser(){
    global $conn ;
    $id= $_POST['id'];
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'] ;
    $numTel= $_POST['numTel'];
    $numCIN= $_POST['numCIN'];
    $password= $_POST['password'];
    $poste= $_POST['poste'];
    $user_file=$_FILES["user"];
    $unique_id = hash("sha256", strval(rand(100, 999999)) + strval(time()));
    $user_filename = $unique_id . "." . strtolower(pathinfo($user_file["name"], PATHINFO_EXTENSION));
    move_uploaded_file($user_file["tmp_name"], "user_Img/".$user_filename);

    $query2 = "SELECT * FROM personne WHERE id_personne='$id'";
    
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        if($password=="********")
        {
                
                $password=$row2['password_personne'];
            
            
        }else{
            $password= md5($_POST['password']);
        }
        if($user_file == "")
        {      
            $user_filename=$row2['image_personne'];
        }
    }
    
    if($_SESSION['Role'] != "Comptable"){
        $select = "SELECT * FROM personne WHERE cin_personne = '$numCIN' and  id_personne!='$id'";
        $result_select=mysqli_query($conn,$select);
        $row = mysqli_num_rows($result_select);
        if($row) {
            exit('Ce numéro de CIN est déjà utilisé');
        }
        else {
            $update = "UPDATE personne SET nom_personne='$nom', prenom_personne='$prenom',numTel_personne='$numTel',password_personne='$password',cin_personne='$numCIN',poste_personne='$poste',image_personne='$user_filename' WHERE id_personne='$id'";
            $result=mysqli_query($conn,$update);
        }
    }else {
        $update = "UPDATE personne SET nom_personne='$nom', prenom_personne='$prenom',numTel_personne='$numTel',password_personne='$password',poste_personne='$poste',image_personne='$user_filename' WHERE id_personne='$id'";
        $result=mysqli_query($conn,$update);
    }
      
    if ($result) {
        echo "Les informations sont mises à jour avec succès ";
    }
}


function affiche_projet()
{
    global $conn;

    if($_SESSION['Role'] == "Responsable"){
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-users"></i> Client</th>
                <th><i class="fa fa-question-circle"></i> Domaine</th>
                <th><i class="fa fa-pencil"></i> Titre Projet</th>
                <th><i class=" fa fa-bookmark"></i> Priorité</th>
                <th><i class="fa fa fa-pencil-square"></i> Description</th>
                <th><i class="fa fa fa-history"></i> Etat</th>
                <th><i class="fa fa fa-cloud-download"></i> Pièce jointe</th>
                <th></th>
            </tr>            
        </thead>';
    }else {
            $value = '
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-users"></i> Client</th>
                        <th><i class="fa fa-pencil"></i> Titre Projet</th>
                        <th><i class=" fa fa-bookmark"></i> Priorité</th>
                        <th><i class="fa fa fa-pencil-square"></i> Description</th>
                        <th><i class="fa fa fa-history"></i> Etat</th>
                        <th><i class="fa fa fa-cloud-download"></i> Pièce jointe</th>
                        <th></th> 
                    </tr>            
                </thead>';
    }

    if($_SESSION['Role']=="Employe"){ 
        $employe = $_SESSION['id_personne'];
        $poste = $_SESSION['Poste'];
        if($poste == "CM"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet = 'Marketing'
            AND affect_projet.id_employe = $employe";
        }else if($poste == "Designeur"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet ='Design'
            AND affect_projet.id_employe = $employe";
        }else if($poste == "Developpeur"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet = 'Developpement'
            AND affect_projet.id_employe = $employe";
        } 
    }else{
        $query = "SELECT * 
        FROM projet AS P
        LEFT JOIN client AS C ON C.id_client = P.id_client";
    }   

    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        
        if($row['etat_projet_supprime'] =="T"){
             if($row['etat_projet'] !="Termine"){
                $value .= '
                <tbody>
                <tr>
                <td>' . $row['nom_entreprise_client'] . '</td>';
                if (($_SESSION['Role']) == "Responsable") {

                $value .= '<td>' . $row['domaine_projet'] . '</td>';

                }

                $value .='<td>' . $row['titre_projet'] . '</td>
                <td>' . $row['priorite_projet'] . '</td>
                <td>' . $row['description_projet'] . '</td>';
                if($row['etat_projet'] =="En attente"){
                    $value .= '
                <td style="background-color:#C1FFEC;" width="100px">' . $row['etat_projet'] . '</td>
                ';             
                }else if($row['etat_projet'] =="En cours"){
                    $value .= '
                    <td style="background-color:#7DFFD6;" width="100px">' . $row['etat_projet'] . '</td>
                    ';        
                }
                    $value .= '
                <td> <a href="uploads/' . $row['pieceJointe_projet'] . '" target="_blank"><i class="fa fa-picture-o"></i></a></td>
                ';
                if (($_SESSION['Role']) == "Responsable") {
                    
                             $value .= '<td>
                             <button type="button" class="btn btn-primary btn-xs" id="btn_affect_projet" data-id3=' . $row['id_projet'] . '><i class="fa fa-sort-down"></i></button> 
                             <button type="button" class="btn btn-primary btn-xs" id="btn_modifier_responsable" data-id=' . $row['id_projet'] . '><i class="fa fa-pencil"></i></button> 
                             <button type="button" class="btn btn-danger btn-xs" id="btn_supprimer_responsable" data-id1=' . $row['id_projet'] . '><i class="fa fa-trash-o"></i></button> 
        
                             </td></tr>';
                            
                            
                } else {
                    $value .= '   <td>
                    <button type="button" class="btn btn-primary btn-xs" id="btn_modifier_employe" data-id2=' . $row['id_projet'] . '><i class="fa fa-pencil"></i></button> 
                    </td></tr>';
                }
            }
        }
    }
    $value .= '</tbody></table>';

    echo json_encode(['status' => 'success', 'html' => $value]);
}




function affiche_liste_fiche_paie()
{
    global $conn;  
    $x=1;          
    if($_SESSION['Role'] == "Comptable"){

         $value = '
         <table class="table table-striped table-advance table-hover">
             <thead>
                 <tr>
                     <th>Fiche N°</th>
                     <th> Employé</th>
                     <th>Prime (dt)</th>
                     <th>Congé de mois</th>
                     <th>Mois</th>
                     <th>Année</th>
                     <th>Action</th>
                 </tr>            
            </thead>';
    }else {
        $value = '
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>                
                <th>Fiche N°</th>
                <th>Date</th>
                <th>Télécharger Fiche de paie</th>
                </tr>            
            </thead>';
    }
    
    $query = "SELECT * FROM fiche_de_paie ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id=$row['id_employe_fiche_paie'];
        $result2=mysqli_query($conn,"select nom_personne,prenom_personne from personne where id_personne='$id'");
                while ($row2 = mysqli_fetch_assoc($result2)) {

                    $value .= '
                    <tbody>
                    <tr>';
                    if($_SESSION['Role'] == "Comptable"){
                 
                            $value .= '
                            <td>' . $x++ . '</td>
                            <td>' . $row2['nom_personne'] . '  ' . $row2['prenom_personne'] . '</td>
                            <td>' . $row['prime_fiche_paie'] . '</td>
                            <td>' . $row['conge_mois_fiche_paie'] . '</td>
                            <td>' . $row['mois_fiche_paie'] . '</td>
                            <td>' . $row['annee_fiche_paie'] . '</td>
                            <td>
                            
                            <button type="button" class="btn btn-primary btn-xs" id="btn_download_fiche_paie" data-id2=' . $row['id_fichePaie'] . '><i class="fa fa-cloud-download"></i></button> 
                            <button type="button" class="btn btn-primary btn-xs" id="btn_modifier_fiche_paie" data-id=' . $row['id_fichePaie'] . '><i class="fa fa-pencil"></i></button> 
                            <button type="button" class="btn btn-danger btn-xs" id="btn_supprimer_fiche_paie" data-id1=' . $row['id_fichePaie'] . '><i class="fa fa-trash-o"></i></button> 
                            </td>
                            ';
                                
                    
                    }else if($_SESSION['id_personne']==$row['id_employe_fiche_paie'] ){
                            $value .= '
                            <td>' . $x++ . '</td>
                            <td>' . $row['mois_fiche_paie'] . '/' . $row['annee_fiche_paie'] . '</td>
                            <td> <button type="button" class="btn btn-primary btn-xs" id="btn_download_fiche_paie" data-id2=' . $row['id_fichePaie'] . '><i class="fa fa-cloud-download"></i></button> 
                            </td>';
                    }
                }
    }   
        $value .= '</tr></tbody></table>';
            
            echo json_encode(['status' => 'success', 'html' => $value]);
}
        




function affiche_liste_facture()
{
    global $conn;

    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa fa-file"></i> Facture</th>';
                if($_SESSION['Role'] == "Responsable"){
                    $value .= '<th>Action</th>';
                }
                    $value .= '</tr> 
                    </thead>';
                    
    
            $query = "SELECT * 
                FROM facture ";
  
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
                    $value .= '
                    <tbody>
                    <tr>
                <td> <a href="facture/' . $row['fiche_facture'] . '" target="_blank">' . $row['fiche_facture'] . '</a></td>
                ';
                if (($_SESSION['Role']) == "Responsable") {
                    
                             $value .= '<td>
                             <button type="button" class="btn btn-danger btn-xs" id="btn_supprimer_facture" data-id=' . $row['id_facture'] . '><i class="fa fa-trash-o"></i></button> 
                             </td>';
                            
                            
                } 
    }
    $value .= '</tr></tbody></table>';

    echo json_encode(['status' => 'success', 'html' => $value]);

}


function delete_Projet(){
  
    global $conn;
    $id_projet = $_POST['Delete_ProjetID'];

    $query = "UPDATE projet SET etat_projet_supprime='S' WHERE id_projet='$id_projet'";

    $result=mysqli_query($conn,$query);

    if ($result) {
        echo "<div class='text-success'>Supprimé avec succès</div>";
    } else {
        echo "<div class='text-danger'>Erreur</div>";
    }
}




function delete_facture(){
  
    global $conn;
    $id_projet = $_POST['DeleteID'];

    $query = "DELETE FROM `facture` WHERE id_facture='$id_projet'";

    $result=mysqli_query($conn,$query);

    if ($result) {
        echo "<div class='text-success'>Supprimé avec succès</div>";
    } else {
        echo "<div class='text-danger'>Erreur</div>";
    }
}




function delete_fiche_paie(){
  
    global $conn;
    $id_projet = $_POST['DeleteID'];

    $query = "DELETE FROM `fiche_de_paie` WHERE id_fichePaie='$id_projet'";

    $result=mysqli_query($conn,$query);

    if ($result) {
        echo "<div class='text-success'>Supprimé avec succès</div>";
    } else {
        echo "<div class='text-danger'>Erreur</div>";
    }
}


function affiche_client()
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user"></i> Nom Entreprise</th>
                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                <th><i class="fa fa-phone"></i> Téléphone</th>
                <th><i class=" fa fa-bookmark"></i> Adresse</th>
                <th><i class="fa fa-edit"></i> Commentaire</th>
                <th></th>
                
            </tr>            
        </thead>';
        
        $query = "SELECT * FROM client ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['etat_client'] =="T"){

        $value .= '
        <tbody>
        <tr>
        <td>' . $row['nom_entreprise_client'] . '</td>
        <td>' . $row['email_client'] . '</td>
        <td>' . $row['numTel_client'] . '</td>
        <td>' . $row['adresse_client'] . '</td>
        <td>' . $row['commentaire_client'] . '</td>
        <td><button type="button" class="btn btn-primary btn-xs" id="btn_modifier_client" data-id3=' . $row['id_client'] . '><i class="fa fa-pencil"></i></button> 
        <button type="button" class="btn btn-danger btn-xs" id="btn_supprimer_client" data-id4=' . $row['id_client'] . '><i class="fa fa-trash-o"></i></button> 
        </td></tr>';
        
    }
}
    $value .= '</tbody></table>';

    echo json_encode(['status' => 'success', 'html' => $value]);
}




function affiche_projet_termines()
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-users"></i> Client</th>
                <th><i class="fa fa-question-circle"></i> Domaine</th>
                <th><i class="fa fa-pencil"></i> Titre Projet</th>
                <th><i class=" fa fa-bookmark"></i> Priorité</th>
                <th><i class="fa fa fa-pencil-square"></i> Description</th>
                <th><i class="fa fa fa-history"></i> Etat</th>
                <th><i class="fa fa fa-cloud-download"></i> Pièce jointe</th>
                <th></th>
            </tr>            
        </thead>';

    if($_SESSION['Role']=="Employe"){ 
        $employe = $_SESSION['id_personne'];
        $poste = $_SESSION['Poste'];
        if($poste == "CM"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet = 'Marketing'
            AND affect_projet.id_employe = $employe";
        }else if($poste == "Designeur"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet ='Design'
            AND affect_projet.id_employe = $employe";
        }else if($poste == "Developpeur"){
            $query = "SELECT * 
            FROM affect_projet
            LEFT JOIN projet as P ON P.id_projet = affect_projet.id_projet
            LEFT JOIN client AS C ON C.id_client = P.id_client
            WHERE P.domaine_projet = 'Developpement'
            AND affect_projet.id_employe = $employe";
        } 
    }else{
        $query = "SELECT * 
        FROM projet AS P
        LEFT JOIN client AS C ON C.id_client = P.id_client";
    }   

    
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['etat_projet'] =="Termine"){
        $value .= '
        <tbody>
        <tr>
        <td>' . $row['nom_entreprise_client'] . '</td>
        <td>' . $row['domaine_projet'] . '</td>
        <td>' . $row['titre_projet'] . '</td>
        <td>' . $row['priorite_projet'] . '</td>
        <td>' . $row['description_projet'] . '</td>
        <td style="background-color:#05DD9A;color: #f2f2f2; " width="100px"	>' . $row['etat_projet'] . '</td>
        <td><a href="uploads/' . $row['pieceJointe_projet'] . '" target="_blank"><i class="fa fa-picture-o"></i></a></td>
        </tr>
        ';
    }} 
    
    $value .= '</tbody></table>';
    echo json_encode(['status' => 'success', 'html' => $value]);
}





function affiche_archive_client()
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user"></i> Nom Entreprise</th>
                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                <th><i class="fa fa-phone"></i> Téléphone</th>
                <th><i class=" fa fa-bookmark"></i> Adresse</th>
                <th><i class="fa fa-edit"></i> Commentaire</th>
                
            </tr>            
        </thead>';
        
        $query = "SELECT * FROM client ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['etat_client'] =="S"){

        $value .= '
        <tbody>
        <tr>
        <td>' . $row['nom_entreprise_client'] . '</td>
        <td>' . $row['email_client'] . '</td>
        <td>' . $row['numTel_client'] . '</td>
        <td>' . $row['adresse_client'] . '</td>
        <td>' . $row['commentaire_client'] . '</td>
        </tr>';
        
    }
}
    $value .= '</tbody></table>';

    echo json_encode(['status' => 'success', 'html' => $value]);
}


function affiche_liste_employes()
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user"></i> Nom Employé</th>
                <th><i class="fa fa-user"></i> Prénom Employé</th>
                <th><i class="fa fa-phone"></i> Téléphone</th>
                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                <th><i class="fa fa-edit"></i> Num CIN</th>  
                <th><i class="fa fa-question-circle"></i> Poste</th>                
                <th><i class="fa fa-question-circle"></i> Salaire</th>                

                <th><i class="fa fa-trash-o"></i> Supprimer</th>
            </tr>            
        </thead>';
        $query = "SELECT * FROM personne as P 
        left join role as R on R.id_role =P.role_personne ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if($row['nom_role'] == "Employe" && $row['etat_personne']!="S" ){
            $value .= '
            <tbody>
            <tr>
            <td>' . $row['nom_personne'] . '</td>
            <td>' . $row['prenom_personne'] . '</td>
            <td>' . $row['numTel_personne'] . '</td>
            <td>' . $row['email_personne'] . '</td>
            <td>' . $row['cin_personne'] . '</td>
            <td>' . $row['poste_personne'] . '</td>
            <td>' . $row['salaire_personne'] . '</td>
            <td><button type="button" class="btn btn-primary btn-xs" id="btn_modifier_employee" data-id2=' . $row['id_personne'] . '><i class="fa fa-pencil"></i></button> 
            <button type="button" class="btn btn-danger btn-xs" id="btn_supprimer_employe" data-id=' . $row['id_personne'] . '><i class="fa fa-trash-o"></i></button> 
            </td>
            </tr>';
        }
    }
    $value .= '</tbody></table>';
    
    echo json_encode(['status' => 'success', 'html' => $value]);
}



function get_data_projet()
{
    global $conn;
    $update_ID = $_POST['update_ID'];

    $query = "SELECT * FROM projet WHERE id_projet='$update_ID'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $update_projet = [];
        $update_projet[0] = $update_ID;
        $update_projet[1] = $row['domaine_projet'];
        $update_projet[2] = $row['titre_projet'];
        $update_projet[3] = $row['priorite_projet'];
        $update_projet[4] = $row['description_projet'];

    }
    echo json_encode($update_projet);
}



  
function update_projet_responsable(){
    global $conn;
    $domaine_projet = $_POST['domaine'];
    $id_projet = $_POST['id_projet'];
    $titre_projet = $_POST['titre'];
    $priorite_projet = $_POST['priorite'];
    $description_projet = $_POST['description'];

    $query = "UPDATE projet SET domaine_projet='$domaine_projet',titre_projet='$titre_projet',priorite_projet='$priorite_projet',description_projet='$description_projet' WHERE id_projet='$id_projet'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Les informations sont mises à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}




function get_etat_data()
{
    global $conn;
    $update_ID = $_POST['update_ID'];

    $query = "SELECT etat_projet FROM projet WHERE id_projet='$update_ID'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $etat_data = [];
        $etat_data[0] = $row['etat_projet'];
        $etat_data[1] = $update_ID;
        
        
    }
    echo json_encode($etat_data);
}



  
function update_etat_employe(){
    global $conn;
    $etatID = $_POST['etat'];
    $id_projet = $_POST['id_projet'];


    $query = "UPDATE projet SET etat_projet='$etatID' WHERE id_projet='$id_projet'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "L'etat est mis à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}



function get_data_client()
{
    global $conn;
    $idClient = $_POST['update_ID'];

    $query = "SELECT * FROM client WHERE id_client='$idClient'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $update_client= [];
        $update_client[0] = $idClient;
        $update_client[1] = $row['nom_entreprise_client'];
        $update_client[2] = $row['email_client'];
        $update_client[3] = $row['numTel_client'];
        $update_client[4] = $row['adresse_client'];
        $update_client[5] = $row['commentaire_client'];


    }
    echo json_encode($update_client);
}

  
function update_client(){
    global $conn;    
    $id_client = $_POST['id_client'];
    $nom_entreprise = $_POST['nom_entreprise'];
    $email_client = $_POST['email_client'];
    $numTel_client = $_POST['numTel_client'];
    $adresse_client = $_POST['adresse_client'];
    $commentaire_client = $_POST['commentaire_client'];

    $query = "UPDATE client SET nom_entreprise_client='$nom_entreprise',email_client='$email_client',numTel_client='$numTel_client',adresse_client='$adresse_client',commentaire_client='$commentaire_client' WHERE id_client='$id_client'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Les informations sont mises à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}


function delete_client(){
  
    global $conn;
    $id_client = $_POST['DeleteID'];

    $query = "UPDATE client SET etat_client='S' WHERE id_client='$id_client'";

    $result=mysqli_query($conn,$query);

    if ($result) {
        echo "<div class='text-success'>Supprimé avec succès</div>";
    } else {
        echo "<div class='text-danger'>Erreur</div>";
    }
}


function delete_employe(){
  
    global $conn;
    $id_employe = $_POST['deleteID'];

    $query = "UPDATE personne SET etat_personne='S' WHERE id_personne='$id_employe'";

    $result=mysqli_query($conn,$query);

    if ($result) {
        echo "<div class='text-success'>Supprimé avec succès</div>";
    } else {
        echo "<div class='text-danger'>Erreur</div>";
    }
}




  
function affecter_Emplye(){
    global $conn;
    $employe = $_POST['IDemploye'];
    $id_projet = $_POST['id_projet'];
    $exist = mysqli_query($conn, "SELECT * FROM affect_projet WHERE id_projet = '".$_POST['id_projet']."'");

    if(mysqli_num_rows($exist)) {
        exit('Ce projet est déjà affecté');
    
    }
    else {
        $query= "INSERT into affect_projet(id_projet,id_employe)
        values($id_projet,$employe)";        
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Le projet est affecté avec succès ";
        } else {
            echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
        }
        
    }
    

}




function affiche_Liste_conge()  
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
            <th>Nom Employé</th>
            <th>Email Employé</th>
            <th>Téléphone Employé</th>
            <th>Num CIN</th> 
            <th>Poste Employé</th>
            <th>raison de la demande de congé</th>
            <th>Nombre de jours</th>
            <th>Description</th>
            <th>Etat</th>';
            if($_SESSION['Role'] == "Responsable"){
                $value .= '<th></th>';
            }
                
            $value .= '</tr>            
        </thead>';
        
        $query = "SELECT * FROM conge ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id_employe=$row['id_employe'];
        $query1 = "SELECT * FROM personne WHERE id_personne='$id_employe'";
            $result1 = mysqli_query($conn, $query1);
            while ($row1 = mysqli_fetch_assoc($result1)) {
                if(	($_SESSION['id_personne'])==$row['id_employe']){

                    if($row['etat_conge'] =="accepter"){
           
                        $value .= '
                        <tbody>
                        <tr  >
                        <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                        <td>' . $row1['email_personne'] . '</td>
                        <td>' . $row1['numTel_personne'] . '</td>
                        <td>' . $row1['cin_personne'] . '</td>
                        <td>' . $row1['poste_personne'] . '</td>
                        <td>' . $row['raison_conge'] . '</td>
                        <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                        <td>' . $row['description_conge'] . '</td>
                        <td style="background-color:#7DFFD6;">' . $row['etat_conge'] . '</td>
                        </tr>';
                    }else
                    if($row['etat_conge'] =="En attente"){
                       
                        $value .= '
                        <tbody>
                        <tr >
                        <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                        <td>' . $row1['email_personne'] . '</td>
                        <td>' . $row1['numTel_personne'] . '</td>
                        <td>' . $row1['cin_personne'] . '</td>
                        <td>' . $row1['poste_personne'] . '</td>
                        <td>' . $row['raison_conge'] . '</td>
                        <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                        <td>' . $row['description_conge'] . '</td>
                        <td style="background-color:#C1FFEC;" >' . $row['etat_conge'] . '</td>
                        </tr>';
                        
                    }else 
                    {
                       
                        $value .= '
                        <tbody>
                        <tr >
                        <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                        <td>' . $row1['email_personne'] . '</td>
                        <td>' . $row1['numTel_personne'] . '</td>
                        <td>' . $row1['cin_personne'] . '</td>
                        <td>' . $row1['poste_personne'] . '</td>
                        <td>' . $row['raison_conge'] . '</td>
                        <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                        <td>' . $row['description_conge'] . '</td>
                        <td style="background-color:#05DD9A;" >' . $row['etat_conge'] . '</td>
                        </tr>';
                        
                    }


                }else if($_SESSION['Role'] == "Responsable"){


                    if($row['etat_conge'] =="accepter"){
           
                        $value .= '
                        <tbody>
                        <tr  >
                        <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                        <td>' . $row1['email_personne'] . '</td>
                        <td>' . $row1['numTel_personne'] . '</td>
                        <td>' . $row1['cin_personne'] . '</td>
                        <td>' . $row1['poste_personne'] . '</td>
                        <td>' . $row['raison_conge'] . '</td>
                        <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                        <td>' . $row['description_conge'] . '</td>
                        <td style="background-color:#7DFFD6;">' . $row['etat_conge'] . '</td>
                        <td><button type="button" class="btn btn-primary btn-xs" id="btn_modifier_etat_conge" data-id=' . $row['id_conge'] . '><i class="fa fa-pencil"></i></button> 
                        </td></tr>';
                    }else
                    if($row['etat_conge'] =="En attente"){
                       
                        $value .= '
                        <tbody>
                        <tr >
                        <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                        <td>' . $row1['email_personne'] . '</td>
                        <td>' . $row1['numTel_personne'] . '</td>
                        <td>' . $row1['cin_personne'] . '</td>
                        <td>' . $row1['poste_personne'] . '</td>
                        <td>' . $row['raison_conge'] . '</td>
                        <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                        <td>' . $row['description_conge'] . '</td>
                        <td style="background-color:#C1FFEC;" >' . $row['etat_conge'] . '</td>
                        <td><button type="button" class="btn btn-primary btn-xs" id="btn_modifier_etat_conge" data-id=' . $row['id_conge'] . '><i class="fa fa-pencil"></i></button> 
                        </td></tr>';
                    }
                  
                }
    }
}
    $value .= '</tbody></table>';

    echo json_encode(['status' => 'success', 'html' => $value]);
}





function affiche_Liste_conge_refuse()  
{
    global $conn;
    $value = '
    <table class="table table-striped table-advance table-hover">
    <thead>
    <tr>
    <th>Nom Employé</th>
    <th>Email Employé</th>
    <th>Téléphone Employé</th>
    <th>Num CIN</th> 
    <th>Poste Employé</th>
    <th>raison de la demande de congé</th>
    <th>Nombre de jours</th>
    <th>Description</th>
    <th>Etat</th>
    </tr>            
    </thead>';
    
    $query = "SELECT * FROM conge ";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $id_employe=$row['id_employe'];
        $query1 = "SELECT * FROM personne WHERE id_personne='$id_employe'";
        $result1 = mysqli_query($conn, $query1);
        while ($row1 = mysqli_fetch_assoc($result1)) {
            if($row['etat_conge'] =="refuser"){
                
                $value .= '
                <tbody>
                <tr >
                <td>' . $row1['nom_personne'] . '  ' . $row1['prenom_personne'] . '</td>
                <td>' . $row1['email_personne'] . '</td>
                <td>' . $row1['numTel_personne'] . '</td>
                <td>' . $row1['cin_personne'] . '</td>
                <td>' . $row1['poste_personne'] . '</td>
                <td>' . $row['autre_raison_conge'] . '</td>
                <td>' . $row['debut_conge'] . ' <br>' . $row['fin_conge'] . '</td>
                <td>' . $row['description_conge'] . '</td>
                <td style="background-color:#05DD9A;" >' . $row['etat_conge'] . '</td>
                </td></tr>';
            }
            
        }
    }
    $value .= '</tbody></table>';
    echo json_encode(['status' => 'success', 'html' => $value]);
}
    
    



function get_etat_conge()
{
    global $conn;
    $update_ID = $_POST['update_ID'];

    $query = "SELECT etat_conge FROM conge WHERE id_conge='$update_ID'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $etat_data = [];
        $etat_data[0] = $row['etat_conge'];
        $etat_data[1] = $update_ID;
        
        
    }
    echo json_encode($etat_data);
}



  
function update_etat_conge(){
    global $conn;
    $etatID = $_POST['etat'];
    $id_conge = $_POST['id_conge'];


    $query = "UPDATE conge SET etat_conge='$etatID' WHERE id_conge='$id_conge'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "L'état est mis à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}


function get_data_fichePaie()
{
    global $conn;
    $getID = $_POST['update_ID'];

    $query = "SELECT * FROM fiche_de_paie WHERE id_fichePaie='$getID'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $data_fichePaie = [];
        $data_fichePaie[0] =$row['id_employe_fiche_paie'];
        $data_fichePaie[1] = $row['prime_fiche_paie'];
        $data_fichePaie[2] = $row['conge_mois_fiche_paie'];
        $data_fichePaie[3] = $row['mois_fiche_paie'];
        $data_fichePaie[4] = $row['annee_fiche_paie'];
        $data_fichePaie[5] = $getID;
        
        
    }
    echo json_encode($data_fichePaie);
}



  
function update_fichePaie(){
    global $conn;

    $list_employe=$_POST['list_employe'];
    $prime=$_POST['prime'];
    $Conge_mois=$_POST['Conge_mois'];
    $mois=$_POST['mois'];
    $annee=$_POST['annee'];
    $idFichePaie=$_POST['idFichePaie'];
    $query = "UPDATE fiche_de_paie SET id_employe_fiche_paie='$list_employe',prime_fiche_paie='$prime',conge_mois_fiche_paie='$Conge_mois',mois_fiche_paie='$mois',annee_fiche_paie='$annee' WHERE id_fichePaie='$idFichePaie'";


    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Mise à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}


function get_data_employe()
{
    global $conn;
    $idEmploye = $_POST['update_ID'];

    $query = "SELECT * FROM personne WHERE id_personne='$idEmploye'";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $update_employe= [];
        $update_employe[0] = $idEmploye;
        $update_employe[1] = $row['nom_personne'];
        $update_employe[2] = $row['prenom_personne'];
        $update_employe[3] = $row['numTel_personne'];
        $update_employe[4] = $row['email_personne'];
        $update_employe[5] = $row['cin_personne'];
        $update_employe[6] = $row['poste_personne'];
        $update_employe[7] = $row['salaire_personne'];

    }
    echo json_encode($update_employe);
}

  
function update_employe(){
    global $conn;    

    $idEmploye= $_POST['idEmploye'];
    $nomEmploye= $_POST['nomEmploye'];
    $prenomEmploye= $_POST['prenomEmploye'];
    $numTelEmploye= $_POST['numTelEmploye'];
    $emailEmploye= $_POST['emailEmploye'];
    $numCINEmploye= $_POST['numCINEmploye'];
    $poste= $_POST['poste'];
    $salaire= $_POST['salaire'];

    $query = "UPDATE personne SET nom_personne='$nomEmploye',prenom_personne='$prenomEmploye',numTel_personne='$numTelEmploye',email_personne='$emailEmploye',cin_personne='$numCINEmploye',poste_personne='$poste',salaire_personne='$salaire' WHERE id_personne='$idEmploye'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Les informations sont mises à jour avec succès ";
    } else {
        echo "<div class='text-danger'> Veuillez vérifier votre requête</div> ";
    }
}



?>
        