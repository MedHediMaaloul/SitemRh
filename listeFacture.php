<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
      <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Liste des Factures</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              
              <hr>
              <p id="message"></p>

              <div class="table" id="facture-list"></div>
              
            </div>
            
            <!-- delete facture model -->
            <div class="modal fade" id="delete_facture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer Facture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Voulez-vous supprimer le projet ?</p>
                    <button class="btn btn-success" id="btn_delete_facture">Supprimer</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end delete modal -->

                
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

