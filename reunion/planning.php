<?php 
include('gestion/header_sidebar.php');
?>
<?php 

	require_once('gestion/connect_bd_calendar.php');
		$sql = "SELECT id_reunion AS id, sujet_reunion AS title, debut_reunion AS start, fin_reunion AS end, '#05DD9A' AS color
				FROM reunion ";
		$req = $bdd->prepare($sql);
		$req->execute();
		$events = $req->fetchAll();
		
?>
  <!-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

	
	<!-- FullCalendar -->
	<link href='reunion/css/fullcalendar.css' rel='stylesheet' />

	    <!-- jQuery Version 1.11.1 -->
		<script src="reunion/js/jquery.js"></script>



<section id="container">
      <?php include ('gestion/menu.php'); ?>
      <section id="main-content">
        <section class="wrapper" style="background: #fff;">
          <h3 style="color:#05DD9A;"> <i class="fa fa-angle-right"></i> Liste des Projets en Cours </h3>
          <div class="row mt">
            <div class="col-md-12">
			<div id="calendar"></div>
			</div>
          </div>
        </section>
      </section>
      <?php
          include ('gestion/footer.php');
          ?>
  </section>




<script>
	$(document).ready(function(){
		$('#calendar').fullCalendar({
			code: 'fr',
			header: {
				left: 'today,prev,next',
				right: 'basicDay,basicWeek,month'
			},
			defaultDate: Date.now(),
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			
        
			events: [
			<?php 
			$id_emp=$_SESSION['id_personne'];
			$query="SELECT * FROM reunion where id_employe=$id_emp";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				
				foreach($events as $event): 
					$start =$event['start'];
					$end =$event['end'];
					if ($row['id_reunion']==$event['id'])
					{
						
			?>
				    {
				    	id: '<?php echo $event['id']; ?>',
				    	title: '<?php echo $event['title']; ?>',
				    	start: '<?php echo $start;?>',
				    	end: '<?php echo $end; ?>',
				    	color: '<?php echo $event['color'] ; ?>',
				    	
				    },

				<?php } 
					endforeach; }?>
			
			<?php 
			if (($_SESSION['Role']) == "Responsable") {
				foreach($events as $event): 
					$start =$event['start'];
					$end =$event['end'];
					
			?>
				    {
				    	id: '<?php echo $event['id']; ?>',
				    	title: '<?php echo $event['title']; ?>',
				    	start: '<?php echo $start;?>',
				    	end: '<?php echo $end; ?>',
				    	color: '<?php echo $event['color'] ; ?>',
				    	
				    },

				<?php endforeach;}?>
			]
			
		});
	});
</script>
	


</body>

</html>