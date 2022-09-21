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
  </head>
  <body>
    <section id="container">
      <?php include ('gestion/menu.php'); ?>
      <section id="main-content">
        <section id="main-content">
          <section class="wrapper">
            <p id="message"></p>
            <div class="row mt">
              <div class="col-md-12">
                <form class="contact-form php-mail-form">
                  <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Demande Congé</h3>      
                  <div >
                    <div class="col-md-12">                      
                      <input type="hidden" name="id_employe" id="id_employe" class="form-control" value=<?php echo $row['id_personne']; ?>>
                    </div>
                  </div>
                  <div >
                    <label class="col-md-12 p-0" style=" margin-top:25px;">1.La raison de la demande de congé.</label>
                    <div class="col-md-12">
                      <select class="form-control" aria-label="Default select example" id="raisonConge" onchange="choice()">
                        <option value="Choisissez" selected disabled>Choisissez La raison de la demande</option>                  
                        <option value="Maladie" >Congé de maladie</option>
                        <option value="Raisons_familiales">Raisons familiales</option>
                        <option value="Vacance">Vacance</option>
                        <option value="Autre">Autre</option>
                      </select>
                    <label style=" color: #D8000C;text-align: center;" class="error" for="raisonConge" id="raisonConge_error"> </label>
                    </div>

                  </div>
                <div id="sh1" style="display:none;">
                  <div class="col-md-12" style=" margin-top:20px;">
                    <div>
                      <input type="text" id="autre" class="form-control" placeholder="Autre">
                    </div>
                  </div>  
                </div> 
                <div>
                  <div class="col-md-6">
                    <label for="inputDate"  class="col-md-12 p-0">2.Début de congé.</label>
                    <input type="date" class="form-control" id="debutConge" >
                    <label style=" color: #D8000C;text-align: center;" class="error" for="debutConge" id="debutConge_error"> </label>

                  </div>
                  <div class="col-md-6">
                    <label for="inputDate"  class="col-md-12 p-0">3.Fin de congé.</label>
                    <input type="date" class="form-control" id="FinConge" >
                    <label style=" color: #D8000C;text-align: center;" class="error" for="FinConge" id="FinConge_error"> </label>

                  </div>
                </div>
                <div>
                  <label for="inputPassword" class="col-md-12 p-0">4.Description</label>
                  <div class="col-md-12">
                    <textarea class="form-control" id="description" style="height: 100px" placeholder="Description"></textarea>
                    <label style=" color: #D8000C;text-align: center;" class="error" for="description" id="description_error"> </label>
                  </div>
                </div>
                
                <div class="showback">
                  <button type="submit" id="btn_ajout_conge" class="btn btn-success ">Ajouter un Congé</button>
                </div>          
              </form>
            </div>              
          </div>
        </section>
      </section>    
    </section>  

    <?php include ('gestion/footer.php'); ?>
    
  </section>                      

  <script>
    function choice(){
      if(document.getElementById('raisonConge').value == "Autre") {
        document.getElementById("sh1").style.display = 'block';
      }
    };
    </script>
    
   
    <script>
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10){
        dd='0'+dd
      } 
      if(mm<10){
        mm='0'+mm
      } 
      
      today = yyyy+'-'+mm+'-'+dd;
      tomorrow = yyyy+'-'+mm+'-'+dd;
      
      document.getElementById("debutConge").setAttribute("min", today);
      document.getElementById("FinConge").setAttribute("min", tomorrow);
      
      </script>
  </body>
  </html>