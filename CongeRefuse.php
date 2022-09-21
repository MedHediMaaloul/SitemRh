<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
<body>
  <section id="container">
    <?php include ('gestion/menu.php'); ?>
    <section id="main-content">
      <section class="wrapper">
      <h3 style="color:#05DD9A;"><i class="fa fa-angle-right"></i> Liste des Congés refusés</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">                  
              <hr>
              <div class="table" id="liste_conge_refus"></div>
              
            </div>
                            
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

