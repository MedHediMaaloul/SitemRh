<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste des Employés</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              
              <hr>
              <p id="message"></p>

              <p id="message_up"></p>
              <div class="table" id="liste_employes"></div>
              
            </div>
              <!-- delete employe model -->
              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer Employé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Voulez-vous supprimer l'employé ?</p>
                    <button class="btn btn-success" id="btn_delete">Supprimer</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end employe modal -->
            
          <!-- update employe -->
              
          <div class="modal fade" id="update-employe" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modifier Emplyé</h5>
                      <button type="button" class="close" data-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="update_employe_Form" autocomplete="off"
                    class="form-horizontal form-material">
                    <div class="form-group mb-4">
                      <input type="hidden" id="idEmploye">
                    </div>
                    <p id="messagee"></p>

                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Nom Employé<span
                      class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nomEmploye" >
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Prénom Employé<span
                      class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="prenomEmploye">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Téléphone<span
                      class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="numTelEmploye" >
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Email<span
                      class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="emailEmploye">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Num CIN<span
                      class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="numCINEmploye" >
                    </div>  
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Poste<span
                      class="text-danger">*</span></label>
                      <select id="poste" class="form-control" >
                                <option value="Choisissez" selected disabled>Choisissez Poste</option>
                                <option value="Designeur">Designeur</option>
                                <option value="Developpeur">Développeur</option>
                                <option value="CM">CM</option>
                            </select>  
                    </div>      
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Salaire<span
                      class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="salaire" >
                    </div>                   
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success" id="btn_modifi_employe">Modifier</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                </div>
              </div>
            </div>
          </div>           
          <!-- end update employe-->     
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

