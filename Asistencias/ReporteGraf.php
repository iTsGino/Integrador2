<?php
require('../fpdf/fpdf.php');
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$SelectPag = $_REQUEST['Course'];
$DniAlu = $_REQUEST['Dni'];
$grafico= $_REQUEST['variable'];
$sql = $Con->prepare("SELECT NomAlu, ApeAlu FROM alumno where DniAlu='$DniAlu';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    $Alumno = $row['NomAlu']. ' ' .$row['ApeAlu'];
}

$sql2 = $Con->prepare("SELECT * FROM asistencias WHERE DniAlu = '$DniAlu';");
$sql2->execute();
$res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
$Numero = 1;
$ConP = 0;
$ConR = 0;
$ConF = 0;
foreach ($res2 as $row) {
    if($row['attendance'] == 'Presente'){
        $ConP += $Numero;
    } elseif ($row['attendance'] == 'Retraso') {
        $ConR += $Numero;
    } else {
        $ConF += $Numero;
    }
}

class PDF extends FPDF{
    //Cabecera de Pagina
    function Header(){
        //Arial bold 15
        $this->SetFont('Arial', 'B', 11);
        //Moverse a la derecha
        $this->Cell(60);
        //Titulo
        $this->Cell(70,10,utf8_decode('Reporte Gráfico de Asistencias'),0,0,'C');
        //Salto de Linea
        $this->Ln(20);       
    }

    //Pie de Pagina
    function Footer(){
        //Posicion: a 1.5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Numero de Pagina
        $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
    }
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf->Cell(50,10,'Reporte Curso: ',0,0,'C',0);
$pdf->Cell(40,10,$SelectPag,0,0,'C',0);
//Salto de Linea
$pdf->Ln(10);
$pdf->Cell(38,10,'Alumno: ',0,0,'C',0);
$pdf->Cell(68,10,utf8_decode($Alumno),0,0,'C',0);
//Salto de Linea
$pdf->Ln(20);
$pdf->SetFillColor(248, 249, 252);
$pdf->Cell(50,10,'Asistencias',1,0,'C',1);
$pdf->Cell(50,10,'Retrasos',1,0,'C',1);
$pdf->Cell(50,10,'Faltas',1,0,'C',1);
//Salto de Linea
$pdf->Ln(10);
$pdf->Cell(50,10,$ConP,1,0,'C',0);
$pdf->Cell(50,10,$ConR,1,0,'C',0);
$pdf->Cell(50,10,$ConF,1,0,'C',0);
//Salto de Linea
$pdf->Ln(20);
$pdf->image($grafico, 20, 90, 210, 0, 'png');

$pdf->Output();
?>
