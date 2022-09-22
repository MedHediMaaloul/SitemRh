<html>
<?php
include ('gestion/header_sidebar.php');
?>

<body>
<section id="container">

  <?php
  include ('gestion/menu.php');
  ?>
  <section id="main-content">
    <section class="wrapper">
      <div class="container">
        <div class="main-body">
          
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">acceuil</a></li>
              <li class="breadcrumb-item"><a href="profile.php">profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">ModifierProfile</li>
            </ol>
          </nav>
          

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <?php 
                  if ($row['image_personne']!=""){
                  echo '<img src="user_Img/'.$row['image_personne'] .'" class="img-circle" height="110" width="110" style=" margin-top:25px;" >';
                  }else{
                    echo ' <img src="user_Img/user.png" alt="Admin" class="rounded-circle" width="100" style=" margin-top:25px;">';
                  }
                  ?>
                    <div class="mt-3" style=" margin-top:25px;">
                      <h4><?php echo $row['nom_personne']; ?>  <?php echo $row['prenom_personne']; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['nom_role']; ?></p>
                      <?php if($row['nom_role'] == "Employe"){ ?>
                        <p class="text-secondary mb-1"><?php echo $row['poste_personne']; ?></p>
                        <?php } ?>
                        
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-9 text-secondary">
                      <input type="hidden" name="id" id="id" class="form-control" value=<?php echo $row['id_personne']; ?>>
                    </div>
                  </div>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="nom" id="nom" class="form-control" value=<?php echo $row['nom_personne']; ?>>
                    </div>
                  </div>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Prénom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="prenom" id="prenom" class="form-control" value=<?php echo $row['prenom_personne']; ?>>
                    </div>
                  </div>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Téléphone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input  type="number" name="numTel" id="numTel" class="form-control" value=<?php echo $row['numTel_personne']; ?>>
                    </div>
                  </div>
                  <?php
                  if($row['nom_role'] == "Employe" || $row['nom_role'] == "Responsable"){
                  ?>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Numéro CIN</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input  type="number" name="numCIN" id="numCIN" class="form-control" value=<?php echo $row['cin_personne']; ?>>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  if($row['nom_role'] == "Employe" ){
                  ?>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Poste</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                                                 
                                <select name="poste" id="poste" class="form-control">
                                    <option value=<?php echo $row['poste_personne']; ?> selected ><?php echo $row['poste_personne']; ?></option>
                                    <option value="Designeur">Designeur</option>
                                    <option value="Developpeur">Developpeur</option>
                                    <option value="CM">CM</option>
                                </select>
                            </div>  
                  </div>
                  <?php
                  }
                  ?>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mot de passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" name="password" id="password" class="form-control" value=<?php echo $row['password_personne']; ?>>
                    </div>
                  </div>
                  <div class="row mb-3" style=" margin-top:25px; margin-left: 15px;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Photo de profil</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                   
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Ajouter image</span>
                        <input type="file" id="user" >
                      
                      <label style=" color: #D8000C;text-align: center;" class="error" for="user" id="user_error"> </label>
                    </div>
                  </div>
                   
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-success "name="btn-update" id="btn-update" >Enregistrer</button>
                        <a class="btn btn-danger" id="btn-close" href="profile.php">Annuler</a>

                      </div>
                                   

                    </div>
                  </div>
                  <p id="message"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  
</section>
</section>
</section>
</body>
</html>

