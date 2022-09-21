
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
              <li class="breadcrumb-item active" aria-current="page">profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          
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
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3" style=" margin-top:25px; ">
                      <h6 class="mb-0" style="margin-left: 15px;">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style=" margin-top:25px;">
                    <?php echo $row['nom_personne']; ?>
                  
                  </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                    <h6 class="mb-0" style="margin-left: 15px;">Prénom </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                   <?php echo $row['prenom_personne']; ?>
                  
                  </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="margin-left: 15px;">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email_personne']; ?> 
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="margin-left: 15px;">Téléphone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <?php echo $row['numTel_personne']; ?> 
                    </div>
                  
                  </div>
                  <?php
                  if($row['nom_role'] == "Employe" || $row['nom_role'] == "Responsable"){
                  ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="margin-left: 15px;">Numéro CIN</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['cin_personne']; ?> 
                  
                  </div>
                  </div>
                  <?php
                  }
                  ?>
                   <?php
                  if($row['nom_role'] == "Employe" ){
                  ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="margin-left: 15px;">Poste</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['poste_personne']; ?> 
                  
                  </div>
                  </div>
                  <?php
                  }
                  ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="margin-left: 15px;">Mot de passe</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      **********
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-success " target="__blank" href="updateProfile.php">Modifier</a>
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
