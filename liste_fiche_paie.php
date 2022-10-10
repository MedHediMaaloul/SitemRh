<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste des Fiches de paie</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              
              <hr>
              <p id="message"></p>

              <div class="table" id="liste_fiche_paie"></div>
              
            </div>
              <!-- delete fiche paie model -->
              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer Fiche de paie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Voulez-vous supprimer le fiche de paie ?</p>
                    <button class="btn btn-success" id="delete_fiche_paie">Supprimer</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end delet modal -->

            
          <!-- update fiche paie -->
          <div class="modal fade" id="update-fichePaie" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Fiche de paie</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="update_fichePaie_Form" autocomplete="off"
              class="form-horizontal form-material">
                    <div class="form-group mb-4">
                      <input type="hidden" id="idFichePaie">
                    </div>
                    
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Employé<span
                              class="text-danger">*</span></label>
                      <select name="list_employe" id="list_employe" class="form-control mt-100">
                        <option value="Choisissez" selected disabled>Choisissez un employé</option>
                        <?php  include('gestion/connect_db.php');
                              global $conn;
                              $resultat = mysqli_query($conn,"SELECT * FROM personne WHERE role_personne='1'");  
                              if ($resultat->num_rows > 0) {
                                  while ($row = $resultat->fetch_assoc()) {
                                       echo '<option value="' . $row['id_personne'] . '">' . $row['nom_personne'] . '  '. $row['prenom_personne'] . '</option>
                                       ';
                                  }
                              }
                        ?>
                      </select>
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Prime (DTN)<span
                              class="text-danger">*</span></label>
                      <input id="prime" type="number" class="form-control mt-100" placeholder="Prime (DTN)">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Congés du mois<span
                              class="text-danger">*</span></label>
                      <select name="Conge_mois" id="Conge_mois" class="form-control mt-100">
                        <option value="Choisissez" selected disabled>Choisissez congés du mois</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Mois<span
                              class="text-danger">*</span></label>
                      <select name="mois" id="mois" class="form-control mt-100">
                        <option value="Choisissez" selected disabled>Choisissez un mois</option>
                        
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                        
                      </select>
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Année<span
                              class="text-danger">*</span></label>
                      <input type="number" name="annee" id="annee" class="form-control mt-100" placeholder="Choisissez une année" min="2022">
                    </div>                             
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success" id="btn_modifi_fichePaie">Modifier</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                </div>
              </div>
            </div>
          </div>           
          <!-- end update fiche paie-->     
        </div>
      </div>
    </section>
  </section>
  <?php
    include ('gestion/footer.php');
    ?>
  </section>
</body>


</html>

