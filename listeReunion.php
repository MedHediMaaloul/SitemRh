<html lang="en">
  <?php
      include ('gestion/header_sidebar.php');
?>
  <head>
  	
	<link rel="stylesheet" href="css/style2.css">

	</head>
  <body>
    <section id="container">
      <?php include ('gestion/menu.php'); ?>
      <section id="main-content">
        <section class="wrapper">
          <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Liste des Projets en Cours </h3>
          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">     
                <div class="content w-100">
                  <div class="calendar-container">
                    <div class="calendar"> 
                      <div class="year-header"> 
                        <span class="left-button fa fa-chevron-left" id="prev"> </span> 
                        <span class="year" id="label"></span> 
                        <span class="right-button fa fa-chevron-right" id="next"> </span>
                      </div> 
                      <table class="months-table w-100"> 
                        <tbody>
                          <tr class="months-row">
                            <td class="month">Jan</td> 
                            <td class="month">Fév</td> 
                            <td class="month">Mar</td> 
                            <td class="month">Avr</td> 
                            <td class="month">Mai</td> 
                            <td class="month">Jun</td> 
                            <td class="month">Jul</td>
                            <td class="month">Aoû</td> 
                            <td class="month">Sep</td> 
                            <td class="month">Oct</td>          
                            <td class="month">Nov</td>
                            <td class="month">Déc</td>
                          </tr>
                        </tbody>
                      </table> 
                      
                      <table class="days-table w-100"> 
                        <td class="day">Dim</td> 
                        <td class="day">Lun</td> 
                        <td class="day">Mar</td> 
                        <td class="day">Mer</td> 
                        <td class="day">Jeu</td> 
                        <td class="day">Ven</td> 
                        <td class="day">Sam</td>
                      </table> 
                      <div class="frame"> 
                        <table class="dates-table w-100"> 
                          <tbody class="tbody"></tbody> 
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="events-container">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
      <?php
          include ('gestion/footer.php');
          ?>
  </section>
  
  
                      
  <script src="js/calendrier.js"></script>
                      
</body>
                    


</html>

