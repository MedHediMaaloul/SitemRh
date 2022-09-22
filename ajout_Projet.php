<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<head>
      <style>
       
            .btn-success {
                color: #fff;
                background-color: #05DD9A;
                border-color: #05DD9A;
            }
            .btn-success:hover {
                color: #fff;
                background-color: #7DFFD6;
                border-color: #7DFFD6;
            }
           
            </style>
</head>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
      <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Liste des Projets en Cours </h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              <?php
              if($row['nom_role'] == "Responsable"){
              ?>
              <button class="btn btn-success btn-xs" style="display:block;" id="btn" onclick="display()"><i class="fa fa-plus-circle"></i></button>
              <button class="btn btn-success btn-xs" style="display:none;" id="btn2" onclick="not_display()"><i class="fa fa-plus-circle"></i></button>
              <p>&nbsp;</p>
              <div id="sh1" style="display:none;">
                <div class="form-group">
                  <form style="font-size: 15px;" class="contact-form php-mail-form" method="POST">
                    <div class="form-group" >
                      Client : 
                      <select class="form-control"  id="nomClient" name="nomClient"  >
                        <option value="Choisissez" selected disabled>Choisissez le client</option>
                        <?php
                          include('gestion/connect_db.php');
                          global $conn;
                          $resultat = mysqli_query($conn,"SELECT * FROM client WHERE etat_client='T'");  
                          if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                  echo '<option value="' . $row['id_client'] . '">' . $row['nom_entreprise_client'] . '</option>';
                                }
                              }
                              ?>
                      </select>                        
                    </div>                    
                    <label style=" color: #D8000C;text-align: center;" class="error" for="nomClient" id="nomClient_error"> </label>
  
                    <div class="form-group">
                        Domaine : 
                        <select class="form-control" name="domaine" id="domaine">
                        <option value="Choisissez" selected disabled>Choisissez le domaine</option>
                          <option value="Marketing">Marketing</option>
                          <option value="Design">Design</option>
                          <option value="Developpement">Développement</option>

                        </select>
                    </div>
                    <label style=" color: #D8000C;text-align: center;" class="error" for="domaine" id="domaine_error"> </label>

                    <div class="form-group">
                      Priorité :                       
                      <select class="form-control"  name="perioritee" id="perioritee"  >
                        <option value="Choisissez" selected disabled>Choisissez la priorité</option>
                        <option class="btn btn-theme03" value="1">Priorité 1</option>
                        <option class="btn btn-success" value="2">Priorité 2</option>
                        <option class="btn btn-info" value="3">Priorité 3</option>
                        <option class="btn btn-primary" value="4">Priorité 4</option>
                      </select>
                    </div>
                    <label style=" color: #D8000C;text-align: center;" class="error" for="perioritee" id="periorite_error"> </label>

                    <div class="form-group">
                      <input type="text" name="titre_projet" class="form-control" id="titre_projet" placeholder="Titre Projet" >
                      <label style=" color: #D8000C;text-align: center;" class="error" for="titre_projet" id="titre_projet_error"> </label>
                    </div>                    
                    
                    <div class="form-group">
                      <textarea class="form-control" name="description" id="description" placeholder="Description" rows="5" ></textarea>

                    </div>
                    <div class="form-group">
                      <span class="btn fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Ajouter fichier</span>
                        <input type="file" id="doc_projet" >
                      </span>    
                      <label style=" color: #D8000C;text-align: center;" class="error" for="doc_projet" id="doc_projet_error"> </label>
                
                    </div>
                    <button type="submit" id="btn_ajout_projet" class="btn btn-success ">Ajouter un Projet</button>
                  </form>
                </div>
              </div>
              <script>
                var btn = document.getElementById("btn");
                btn.onclick = function() {                    
                  document.getElementById('sh1').style.display = 'block';
                  document.getElementById('btn2').style.display = 'block';
                  document.getElementById('btn').style.display = 'none';
                } 
                var btn2 = document.getElementById("btn2");
                btn2.onclick = function() {                    
                  document.getElementById('sh1').style.display = 'none';
                  document.getElementById('btn2').style.display = 'none';
                  document.getElementById('btn').style.display = 'block';
                } 
                </script>
                <?php } ?>
              <hr>
              <p id="up_message_etat"></p>
              <p id="message_projet"></p>
              <p id="message_projet2"></p>
              <p id="message_projet_responsable"></p>
              <p id="message"></p>


              <div class="table" id="projet-list"></div>
            </div>
            <!-- delete projet model -->
            <div class="modal fade" id="delete_projet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer Projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Voulez-vous supprimer le projet ?</p>
                    <button class="btn btn-success" id="btn_delete_projet">Supprimer Projet</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end delete modal -->

            <!-- update etat model employé -->
            
            <div class="modal fade" id="update-etat_employe" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier Etat</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update_Etat_Employe_Form" autocomplete="off"
                            class="form-horizontal form-material">
                            <div class="form-group mb-4">
                              <input type="hidden" id="up_id_projet_Etat">
                            </div>                                
                            <div class="form-group mb-4">
                              <label class="col-md-12 p-0">Etat<span
                              class="text-danger">*</span></label>
                              <div class="col-md-12 border-bottom p-0">
                                <select name="duree" id="etat"
                                class="form-control p-0 border-0" >
                                <option value="En attente">En attente</option>
                                <option value="En cours">En cours</option>
                                <option value="Termine">Terminé</option>
                              </select>
                            </div>
                          </div>            
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" id="btn_modifi_etat_projet">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>           
              
            <!-- end update etat model employé -->
                
            <!-- update projet responsable -->
                
                <div class="modal fade" id="update-projet_Responsable" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier Projet</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="update_projet_responsable_Form" autocomplete="off"
                                class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                  <input type="hidden" id="id_projet_responsable">
                                </div>
                                <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Domaine<span
                                  class="text-danger">*</span></label>
                                    <select id="update_domaine" class="form-control" >
                                      <option value="Marketing">Marketing</option>
                                      <option value="Design">Design</option>
                                      <option value="Developpement">Développement</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Titre Projet<span
                                  class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="up_titre_projet" placeholder="Titre Projet">
                                </div>
                                <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Priorité<span
                                  class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="up_priorite" placeholder="Priorité" >
                                </div>
                                <div class="form-group mb-4">
                                  <label class="col-md-12 p-0">Description</label>
                                    <textarea class="form-control" id="up_description" placeholder="Description" rows="5" ></textarea>
                                </div>                             
                                        
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" id="btn_modifi_projet">Modifier</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                          </div>
                        </div>
                      </div>
                    </div>           
                  
                <!-- end update projet responsable --> 
                
                
                 <!-- affect projet -->
                    
                    <div class="modal fade" id="affect_projet" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Affecter Projet</h5>
                            <button type="button" class="close" data-dismiss="modal"
                              aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="affect_projet_Form" >
                              <div class="form-group mb-4">
                                  <input type="hidden" id="id_projet">
                                </div>
                              <div name="id_list_employe" id="id_list_employe" class="form-group"></div> 
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" id="btn_affecter_projet">Affecter</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                          </div>
                        </div>
                      </div>
                    </div>           
                  <!-- end affect projet -->      
      
                </div>
              </div>
            </section>
          </section>
          <?php
    include ('gestion/footer.php');
    ?>
  
</section>
  <script>
  $(document).on("click", "#btn_affect_projet", function () {
    var id_projet = $(this).attr("data-id3");
    $("#affect_projet").modal("show");
    $.ajax({
      url: "get_list_employe.php",
      method: "post",
      data: {
        id_projet: id_projet,
      },
      
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#id_list_employe").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
    });
  });
               
  </script> 

</body>

</html>

