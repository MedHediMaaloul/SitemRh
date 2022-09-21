<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
      <h3 style="color:#05DD9A;"><i class="fa fa-angle-right"></i> Liste des Congés</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              <hr>
              <p id="message"></p>

              <div class="table" id="liste_conge"></div>
              
            </div>
            

            <!-- update etat conge -->
            
            <div class="modal fade" id="update-etat_conge" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Accepter ou Refuser</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update-etat_conge_Form" autocomplete="off"
                            class="form-horizontal form-material">
                            <div class="form-group mb-4">
                              <input type="hidden" id="etat_conge">
                            </div>                                
                            <div class="form-group mb-4">
                              <label class="col-md-12 p-0">Etat<span
                              class="text-danger">*</span></label>
                              <div class="col-md-12 border-bottom p-0">
                                <select name="duree" id="etat"
                                class="form-control p-0 border-0" >
                                <option value="En attente">En attente</option>
                                <option value="accepter">Accepter</option>
                                <option value="refuser">Refuser</option>
                              </select>
                            </div>
                          </div>            
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-success" id="btn_modifi_etat_conge">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>           
              
            <!-- end update etat conget-->
                
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

