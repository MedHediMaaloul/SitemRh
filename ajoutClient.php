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
      <h3 style="color:#05DD9A;"><i class="fa fa-angle-right"></i> Ajouter Nouveau Client</h3>
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
                <form class="contact-form php-mail-form" method="POST">    

                  <div class="form-group">
                    <input type="text" name="nom_entreprise" class="form-control" id="nom_entreprise" placeholder="Nom Entreprise" data-rule="required" data-msg="Ecrire le nom de l'entreprise">
                    <label style=" color: #D8000C;text-align: center;" class="error" for="nom_entreprise" id="nom_entreprise_error"> </label>
                  </div
                  >                    
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email_client" placeholder="Email" data-rule="required" data-msg="Ecrire l'Email">
                    <label  style=" color: #D8000C;text-align: center;" class="error" for="email_client" id="email_client_error"> </label>
                  </div>

                  <div class="form-group">
                    <input type="number" class="form-control" name="numTel" id="numTel_client" placeholder="Téléphone" data-rule="required" data-msg="Ecrire numéro de téléphone">
                    <label style=" color: #D8000C;text-align: center;" class="error" for="numTel_client" id="numTel_client_error"> </label>
                  </div>

                  <div class="form-group">
                    <input class="form-control" name="adresse" id="adresse_client" placeholder="Adresse" data-rule="required" data-msg="Ecrire l'adresse de l'entreprise">
                    <label style=" color: #D8000C;text-align: center;" class="error" for="adresse_client" id="adresse_client_error"> </label>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" name="commentaire" id="commentaire_client" placeholder="Commentaire" rows="5" ></textarea>
                  </div>
                  <button type="submit" id="btn_ajout_client" class="btn btn-success ">Ajouter un Client</button>
                </form>
              </div>
            </div>
            <?php } ?>
            <hr>
            <p id="message_client"></p>
            <p id="message_client_update"></p>

            <div class="table" id="client-list"></div>
          </div>
            
          <!-- update client -->
              
          <div class="modal fade" id="update-client" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modifier Client</h5>
                      <button type="button" class="close" data-dismiss="modal"
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="update_client_Form" autocomplete="off"
                    class="form-horizontal form-material">
                    <div class="form-group mb-4">
                      <input type="hidden" id="idClient">
                    </div>
                    <p id="message"></p>

                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Nom Entreprise<span
                      class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nomEntreprise"  data-rule="required" data-msg="Ecrire le nom d'entreprise ">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Email Client<span
                      class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="emailClient"  data-rule="required" data-msg="Ecrire l'email de client">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Téléphone Client<span
                      class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="numTelClient"  data-rule="required" data-msg="Ecrire le numéro de client">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Adresse Client<span
                      class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="adresseClient" data-rule="required" data-msg="Ecrire l'adresse de client">
                    </div>
                    <div class="form-group mb-4">
                      <label class="col-md-12 p-0">Commentaire Client</label>
                      <textarea class="form-control" id="commentaireClient" rows="5" data-rule="required" data-msg="Ecrire quelque chose"></textarea>
                    </div>                             
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-success" id="btn_modifi_client">Modifier</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                </div>
              </div>
            </div>
          </div>           
          <!-- end update client-->     
                          
          <!-- delete client model -->
          <div class="modal fade" id="delete_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Supprimer Client</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Voulez-vous supprimer le client ?</p>
                  <button class="btn btn-success" id="btn_delete_client">Supprimer client</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end client modal -->
            </div>
          </div>
        </section>
      </section>
      <?php
    include ('gestion/footer.php');
    ?>
  </section>
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
</body>

</html>



