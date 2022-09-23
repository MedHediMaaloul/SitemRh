<?php
	session_start();
  include('gestion/connect_db.php');
	$userid=$_SESSION['id_personne'];
 

	$resultat=mysqli_query($conn,"select * from `personne` as P 
  left join role as R on R.id_role =P.role_personne 
  where id_personne='$userid'");
  $row=mysqli_fetch_array($resultat);
?>
<header class="header black-bg">
<div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><img src="images/logo_sitem.png" width="80px"/></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
 
              </li>
              <li>
                <a href="index.php">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Déconnexion</a></li>
        </ul>
      </div>
    </header>


    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php">
          <?php 
                  if ($row['image_personne']!=""){
                  echo '<img src="user_Img/'.$row['image_personne'] .'" class="img-circle" height="110" width="110">';
                  }else{
                    echo ' <img src="user_Img/user.png" alt="Admin" class="rounded-circle" width="100">';
                  }
                  ?>
          </a></p>
          <h5 class="centered"><?php echo $row['nom_personne']; ?>  <?php echo $row['prenom_personne']; ?></h5>
          <p class="centered"><?php
          if ( $row['nom_role']=="Employe") {
            echo $row['poste_personne'];
          }else{
            echo $row['nom_role'];
          }
          ?></p>

          

          <?php
            
            if($row['nom_role'] == "Responsable"){
          ?>      
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user-plus"></i>
              <span>Client</span>
              </a>
            <ul class="sub">
              <li><a href="ajoutClient.php">Liste des Clients en cours</a></li>
              <li><a href="archiveClient.php">Archivage des clients</a></li>
            </ul>
          </li>
          <?php
             }
            if($row['nom_role'] == "Employe" || $row['nom_role'] == "Responsable"){
          ?>
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span>Projet</span>
              </a>
            <ul class="sub">
              <li><a href="ajout_Projet.php">Liste des Projets en cours</a></li>
              <li><a href="archiveProjet.php">Archivage des Projets</a></li>
            </ul>
          </li>
          <?php
             }
            if($row['nom_role'] == "Responsable" ){
          ?>
          <li class="sub-menu">
            <a href="liste_employes.php">
              <i class="fa fa-users"></i>
              <span>Liste Employés</span>
              </a>
          </li>
          <?php
             }
            if($row['nom_role'] == "Employe" || $row['nom_role'] == "Responsable"){
          ?>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Congé</span>
            </a>
            <ul class="sub">
              <?php if($row['nom_role'] == "Employe" ){ ?>
                <li><a href="ajoutConge.php">Ajouter Congé</a></li>
                <?php }
                ?>
                <li><a href="affiche_listeConge.php">Consultation Congé</a></li>
                <?php if($row['nom_role'] == "Responsable" ){ ?>
                <li><a href="CongeRefuse.php">Liste des Congés refusés</a></li>
                <?php }
                ?>
            </ul>
          </li>
            <?php } ?>
             


          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Fiche de paie</span>
              </a>
            <ul class="sub">
              <?php if($row['nom_role'] == "Comptable" ){ ?>
              <li><a href="ajout_fiche_paie.php">Ajouter Fiche de paie</a></li>
              <?php }?>
              <li><a href="liste_fiche_paie.php">Liste Fiche de paie</a></li>
         
            </ul>
          </li>
         

          <?php
            if($row['nom_role'] == "Responsable" || $row['nom_role'] == "Comptable"){
          ?>

          <li class="sub-menu">
          
          <a href="javascript:;">
            <i class="fa fa-file"></i>
            <span>Facture</span>
            </a>
          <ul class="sub">
            <?php if($row['nom_role'] == "Responsable" ){ ?>
            <li><a href="ajoutFacture.php">Ajouter Facture</a></li>
            <?php }
            ?>
            <li><a href="listeFacture.php">Liste Facture</a></li>
          </ul>
          </li>

          <?php
             }
            if($row['nom_role'] == "Employe" || $row['nom_role'] == "Responsable"){
          ?>
          <li class="sub-menu">
          
          <a href="javascript:;">
            <i class="fa fa-group"></i>
            <span>Réunion</span>
            </a>
          <ul class="sub">
            <?php if($row['nom_role'] == "Responsable" ){ ?>
            <li><a href="ajout_reunion.php">Ajouter Réunion</a></li>
            <?php }
            ?>
            <li><a href="reunion.php">Réunion</a></li>
          </ul>
          </li>
          <?php
             }
          ?>

        </ul>
      </div>
    </aside>
    <!--sidebar end-->
    

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="js/main.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="lib/jquery.sparkline.js"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="lib/gritter-conf.js"></script>



<!-- FullCalendar -->
<script src='reunion/js/moment.min.js'></script>
<script src='reunion/js/fullcalendar.min.js'></script>
<!-- 
    <script type="application/javascript">
      $(document).ready(function() {
        $("#date-popover").popover({
          html: true,
          trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
          $(this).hide();
        });
        
        $("#my-calendar").zabuto_calendar({
          action: function() {
            return myDateFunction(this.id, false);
          },
          action_nav: function() {
            return myNavFunction(this.id);
          },
          ajax: {
            url: "show_data.php?action=1",
            modal: true
          },
          legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });
    
    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
     -->