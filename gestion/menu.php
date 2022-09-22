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
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.php">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.php">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.php">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.php">
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.php">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
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
                <a href="index.php">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.php">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
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
            <li><a href="listeReunion.php">Réunion</a></li>
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
    
    <script src="vendor/jquery/jquery.min.js"></script>
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
    <!--script for this page-->
    <script src="lib/sparkline-chart.js"></script>
    <script src="lib/zabuto_calendar.js"></script>
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
    