<?php
session_start();
include('gestion/connect_db.php');
	if (isset($_POST['login']))
		{
			$email=$_POST['email'];
			$password=$_POST['password'];
			if ($email=="" && $password==""){
				echo ("<script language='javascript'>
				window.alert('Les champs sont vides.')
				window.location.href='javascript:history.back()'
			    </script>");

			}else if($email=="" ) {
				echo ("<script language='javascript'>
				window.alert('Créer votre email s il vous plait.')
				window.location.href='javascript:history.back()'
			    </script>");

			  }else if($password=="" ) {
				echo ("<script language='javascript'>
				window.alert('Créer votre mot de passe s il vous plait.')
				window.location.href='javascript:history.back()'
				</script>");
			  }else{
			
			$query=mysqli_query($conn,"select * from `personne` as P 
			left join role as R on R.id_role =P.role_personne 
			where password_personne='$password' && email_personne='$email'");
 
			$num_row 	= mysqli_num_rows($query);
 
			if ($num_row > 0) 
				{			
					$row= mysqli_fetch_array($query);

					$_SESSION['id_personne']=$row['id_personne'];
					$_SESSION['Role']=$row['nom_role'];
					$_SESSION['Poste']=$row['poste_personne'];

					
					header('location:index.php');
 
				}
			else
				{
					$_SESSION['message']="utilisateur non validé";
					header("Location: login.php");
				}
		}
		}
		
  ?>
