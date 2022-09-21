<html lang="en">
  <?php include ('gestion/header_sidebar.php'); ?>
  <head>
    <style>      
      .btn-success {
        margin-top:30px;
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  </head>

  <body>
    <section id="container">
      <?php include ('gestion/menu.php'); ?>
      <section id="main-content">
        <section id="main-content">
          <section class="wrapper">
            <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Créer Réunion</h3>
            <p id="message"></p>

            <div class="row mt">
              <div class="col-md-12">                
                <form class="contact-form php-mail-form" id="multiple_select_form">
                  <div >
                    <label for="inputText" class="col-md-12 p-0">1.Titre Réunion</label>
                    <div class="col-md-12">
                      <input id="sujetReunion" type="text" class="form-control" placeholder="Titre">
                    </div>
                  </div>
                  <div >
                    <div >
                      <label class="col-md-12 p-0">2.Liste des Employés</label>
                      <div class="col-md-12">
                        <select class="form-control selectpicker" name="list_employe" id="list_employe" data-live-search="true" multiple>       
                          <option value="Choisissez" disabled>Choisissez Employés</option>

                          <?php
                          include('gestion/connect_db.php');
                          global $conn;
                          $resultat = mysqli_query($conn,"SELECT * FROM personne WHERE role_personne='1'");  
                          if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                              echo '<option value="' . $row['id_personne'] . '">' . $row['nom_personne'] . ' ' . $row['prenom_personne'] . '</option>';
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div>
                      <label for="inputDate"  class="col-md-12 p-0">3.Début de réunion.</label>
                      <div class="col-md-12">
                        <input type="datetime-local" id="DebutReunion" class="form-control">
                      </div>
                    </div>                
                    <div>
                      <label for="inputDate"  class="col-md-12 p-0">4.Fin de réunion.</label>
                      <div class="col-md-12">
                        <input type="datetime-local" id="finReunion" class="form-control">
                      </div>
                    </div>
                    <div class="showback">
                    <input type="hidden" id="id_liste_employe" name="id_liste_employe" />
                    <input type="hidden" id="id_sujetReunion" name="id_sujetReunion" />
                    <input type="hidden" id="id_DebutReunion" name="id_DebutReunion" />
                    <input type="hidden" id="id_finReunion" name="id_finReunion" />


                      <button type="submit" name="submit" id="btn_ajout_reunion" class="btn btn-success ">Créer un réunion</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            
          </section>
        </section>
      </section>
      <?php include ('gestion/footer.php'); ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
 
    <script>
      $(document).ready(function(){
        $('.selectpicker').selectpicker();

       
        $('#multiple_select_form').on('submit', function(event){
          event.preventDefault();
          $('#id_liste_employe').val($('#list_employe').val());
          $('#id_sujetReunion').val($('#sujetReunion').val());
          $('#id_DebutReunion').val($('#DebutReunion').val());
          $('#id_finReunion').val($('#finReunion').val());
          var form_data = $(this).serialize();
          if($('#list_employe').val() != ''&& $('#sujetReunion').val() != '' && $('#DebutReunion').val() != '' && $('#finReunion').val() != '')
          {
            $.ajax({
              url:"ajoutReunion.php",
              method:"POST",
              data:form_data,
              success:function(data)
              {
                $('#id_liste_employe').val('');
                $('#sujetReunion').val('');
                $('#DebutReunion').val('');
                $('#finReunion').val('');
                $('.selectpicker').selectpicker('val', '');
               
                $("#message").addClass("alert alert-success").html(data);
        
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
            })
          }
          else
          {
            alert("Remplir le Formulaire!");
            return false;
          }
        });
      });
    </script>
          
</body>
</html>
        

  
  

