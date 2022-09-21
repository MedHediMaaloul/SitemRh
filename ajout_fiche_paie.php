<html lang="en">
    <?php include ('gestion/header_sidebar.php'); ?>
    <head>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                background: linear-gradient(to right, #05DD9A, #7DFFD6);
                font-family: 'Ruda', sans-serif;
                
            }
            
            h3 {
                margin-bottom: 50px;
                color: #05DD9A;
            }
            
            
            
            .file-drop-area {
                position: relative;
                display: flex;
                align-items: center;
                width: 570px;
                max-width: 50%;
                padding: 40px;
                border: 1px dashed rgba(0, 0, 0, 0.4);
                border-radius:8px;
                transition: 0.2s;
                margin-bottom: 30px;
                margin-left: 15px;
                margin-right: 20px;
                
            }
            .choose-file-button {
                flex-shrink: 0;
                background-color: rgba(125, 255, 214, 0.3);
                border: 1px solid rgba(5, 221, 154, 0.2);
                border-radius: 3px;
                padding: 8px 15px;
                margin-right: 20px;
                font-size: 12px;
                text-transform: uppercase;
            }
            
            
            .file-message {
                font-size: small;
                font-weight: 300;
                line-height: 1.4;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .file-input {
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 100%;
                cursor: pointer;
                opacity: 0;
                
            }
            
            .mt-100{
                margin-top:25px;                
            }
            .btn-success {
                margin-bottom: 20px;
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
          <section class="wrapper site-min-height">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">  
                          <div class="container d-flex justify-content-center mt-100">
                              <div class="row">
                                    <h3><i class="fa fa-angle-right"></i> Ajouter fiche de paie</h3>
                                    <p id="message"></p>
                                    <div class="col-md-12">                                
                                        <select name="list_employe" id="list_employe" class="form-control mt-100">
                                            <option value="Choisissez" selected disabled>Choisissez un employé</option>
                                            <?php 
                                                include('gestion/connect_db.php');
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
                                    <div class="col-md-6">                
                                        <input id="prime" type="number" class="form-control mt-100" placeholder="Prime (DTN)">
                                    </div>
                                    <div class="col-md-6">                                
                                        <select name="Conge_mois" id="Conge_mois" class="form-control mt-100">
                                        <option value="Choisissez" selected disabled>Choisissez congés du mois</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            
                                        
                                        </select>
                                    </div>
                                  
                                    <div class="col-md-6">                                
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
                                    <div class="col-md-6">                
                                    <input type="number" name="annee" id="annee" class="form-control mt-100" placeholder="Choisissez une année" min="2022">
                                    </div>   
                                </div>
                                <input type="submit" value="Ajouter" name="ajout_fiche-paie"  id="ajout_fiche-paie"  class="btn btn-success mt-100"> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php include ('gestion/footer.php');?>
    </section>
    <script>
      document.querySelector("input[type=number]")
      .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
   </script>

</body>
</html>

    
    
    