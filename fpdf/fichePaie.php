<?php
if (isset($_GET['id'])){
    require_once('../gestion/connect_db.php');
    session_start();
    require('fpdf.php');
    global $conn;
    class PDF extends FPDF
    {
        function Header()
        {
            // Logo
            $this->Image('logo.png',10,6,35);
            // Police Arial gras 15
            $this->SetFont('Arial','B',12);
            // D�calage � droite
            
            $this->Cell(70);
            // Titre
            $this->Cell(30,30,'BULLETIN DE PAIE','C');
            $this->SetY(35);
            $this->Cell(220,6,utf8_decode('Société SITEM'),'R');
            $this->SetFont('Arial','',11);
            $this->SetY(48);
            $this->Cell(220,6,utf8_decode('ADRESSE : Avenue Habib Bourguiba AJIM DJERBA'),'R');
            $this->SetY(52);
            $this->Cell(220,10,utf8_decode('MATRICULE CNSS : 597141-09'),'R');
            $this->SetY(58);
            $this->Cell(220,12,utf8_decode('************************************************************************************************************************'),'R');
        }
        
    }
    $Y =10;
    $Y_Fields_Name_position = 90;
    $Y_Table_Position = 96;
    
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Ln();
    
    $id_fiche=$_GET['id'];
    $query = "SELECT * FROM fiche_de_paie where id_fichePaie=".$id_fiche;
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$row['id_employe_fiche_paie'];
            $conge_mois=$row['conge_mois_fiche_paie'];
            $mois=$row['mois_fiche_paie'];
            $annee=$row['annee_fiche_paie'];
            $prime=$row['prime_fiche_paie'];
            $result2=mysqli_query($conn,"select * from personne as P 
            left join role as R on R.id_role =P.role_personne where id_personne='$id'");
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $nom_employe=$row2['nom_personne'];
                $prenom_employe=$row2['prenom_personne'];
                $salaire=$row2['salaire_personne'];
                $numCin=$row2['cin_personne'];
                $role_personne=$row2['nom_role'];
                $column_mois = "0".$mois."/".$annee."\n";
                $column_nom_employe = $nom_employe." ".$prenom_employe."\n";
            }
        }
    }
    $total=$prime+$salaire;
    $pdf->SetFont('Arial','',11);
    $pdf->SetY($Y);
    $pdf->SetY(68);
    $pdf->Cell(220,6,'Mois :','R');
    $pdf->SetY(68);
    $pdf->SetX(22);
    $pdf->Cell(220,6,$column_mois ,'R');
    $pdf->SetY(73);
    $pdf->Cell(220,10,'Sit Fam : C','R');
    $pdf->SetY(78);
    $pdf->Cell(220,10,utf8_decode('Nom et prénom :'),'R');
    $pdf->SetY(80);
    $pdf->SetX(40);
    $pdf->Cell(220,6,$column_nom_employe,'R');
    
    $pdf->SetY(68);
    $pdf->SetX(90);
    $pdf->Cell(220,6,utf8_decode('N°CNSS : En-cours'),'R');
    $pdf->SetY(73);
    $pdf->SetX(90);
    $pdf->Cell(220,10,utf8_decode('Régime : SIVP '),'R');
    $pdf->SetY(78);
    $pdf->SetX(90);
    $pdf->Cell(220,10,'Qualification :','R');
    $pdf->SetY(78);
    $pdf->SetX(115);
    $pdf->Cell(220,10,$role_personne,'R');

    $pdf->SetY(68);
    $pdf->SetX(160);
    $pdf->Cell(220,10,'CIN :','R');
    $pdf->SetY(68);
    $pdf->SetX(170);
    $pdf->Cell(220,10,$numCin,'R');

    $pdf->SetFillColor(232,232,232);
    $pdf->SetY($Y_Fields_Name_position);
    $pdf->SetX(20);
    $pdf->Cell(70,6,'LIBELLE',1,0,'C',1);
    $pdf->SetX(90);
    $pdf->Cell(20,6,'Nbre',1,0,'C',1);
    $pdf->SetX(110);
    $pdf->Cell(50,6,'Salaire/Prime',1,0,'C',1);
    $pdf->SetX(160);
    $pdf->Cell(30,6,'Retenues',1,0,'C',1);
    $pdf->Ln();
    $pdf->SetFont('Arial','',11);
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(20);
    $pdf->Cell(70,85,"",1,'L');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(90);
    $pdf->Cell(20,85,"",1,'L');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(110);
    $pdf->Cell(50,85,"",1,'L');
    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(160);
    $pdf->Cell(30,85,"",1,'L');
    
    $pdf->SetY(96);
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Indemnité de base SIVP'),'R');
    $pdf->SetY(102);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Indemnité Complémentaire de stage'),'R');
    $pdf->SetY(108);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Indemnité du mois'),'R');
    $pdf->SetY(114);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Prime de présence'),'R');
    $pdf->SetY(120);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Prime de transport'),'R');
    $pdf->SetY(126);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Prime de rendement'),'R');
    $pdf->SetY(132);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Total à payer'),'R');
    $pdf->SetY(138);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Net à payer SITEM'),'R');
    $pdf->SetY(144);        
    $pdf->SetX(20);
    $pdf->Cell(220,10,utf8_decode('Net à payer ANETI'),'R');
    
    $pdf->SetY(108);        
    $pdf->SetX(94);
    $pdf->Cell(220,10,'26.00','R');
    
    $pdf->SetY(96);
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'000.000','C');
    $pdf->SetY(102);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'000.000','C');
    $pdf->SetY(108);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'000.000','C');
    $pdf->SetY(114);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'2.080','C');
    $pdf->SetY(120);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'36.112','C');
    $pdf->SetY(126);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,$prime,'C');
    $pdf->SetY(132);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,$total,'C');
    $pdf->SetY(138);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,$total,'C');
    $pdf->SetY(144);        
    $pdf->SetX(130);
    $pdf->MultiCell(220,10,'000.000','C');
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetY(195);
    $pdf->SetX(45);
    $pdf->Cell(30,6,'Solde D',1,0,'C',1);
    $pdf->SetX(75);
    $pdf->Cell(30,6,'C. du mois',1,0,'C',1);
    $pdf->SetX(105);
    $pdf->Cell(30,6,'CP',1,0,'C',1);
    $pdf->SetX(135);
    $pdf->Cell(30,6,'Solde C',1,0,'C',1);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',11);
    $pdf->SetY(195);
    $pdf->SetX(45);
    $pdf->MultiCell(30,20,"",1,'C');
    $pdf->SetY(195);
    $pdf->SetX(75);
    $pdf->MultiCell(30,20,('0'.$conge_mois),1,'C');
    $pdf->SetY(195);
    $pdf->SetX(105);
    $pdf->MultiCell(30,20,'0'.(2- $conge_mois),1,'C');
    $pdf->SetY(195);
    $pdf->SetX(135);
    $pdf->MultiCell(30,20,"",1,'C');
    
    $pdf->SetY(250);
    $pdf->Cell(220,10,utf8_decode('EMARGEMENT'),'R');
    
    $pdf->Output();
    
    $result->free();
    $mysqli->close();
}

?>