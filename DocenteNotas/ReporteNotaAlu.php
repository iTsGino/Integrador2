<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF{
    //Cabecera de Pagina
    function Header(){
        //Arial bold 15
        $this->SetFont('Arial', 'B', 11);
        //Moverse a la derecha
        $this->Cell(60);
        //Titulo
        $this->Cell(70,10,'Reporte de Alumnos Aprobados',0,0,'C');
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
require '../Conexion/Datos.php';
$db = new Database();
$Con = $db->Conectar();

$SelectPag = $_REQUEST['Course'];
$CodCur = $_REQUEST['CodCur'];
$DniAlu = $_REQUEST['Dni'];
$sql = $Con->prepare("SELECT NomAlu, ApeAlu, Nota1, Nota2, Nota3, Prom FROM alumno a, cursos c, alumno_curso ac, detalle_nota dn
WHERE a.DniAlu = ac.DniAlu AND c.CodCur = ac.CodCur AND ac.Cod_AluCur = dn.Cod_AluCur AND c.CodCur = '$CodCur' and a.DniAlu='$DniAlu';");
$sql->execute();
$res = $sql->fetchAll(PDO::FETCH_ASSOC);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf2 = new PDF();
$pdf2->AliasNbPages();
$pdf2->AddPage();
$pdf2->SetFont('Arial','B',10);

$pdf->Cell(50,10,'Reporte Curso: ',0,0,'C',0);
$pdf->Cell(40,10,$SelectPag,0,0,'C');
//Salto de Linea
$pdf->Ln(10);

$pdf->Cell(65,10, utf8_decode('Nota Mínima Aprobatoria:'),0,0,'C');
$pdf->Cell(10,10,'12',0,0,'C');
//Salto de Linea
$pdf->Ln(20);

$pdf->SetFillColor(248, 249, 252);
$pdf->Cell(38,10,'Nombre',1,0,'C',1);
$pdf->Cell(38,10,'Apellido',1,0,'C',1);
$pdf->Cell(24,10,utf8_decode('Nota 1'),1,0,'C',1);
$pdf->Cell(24,10,utf8_decode('Nota 2'),1,0,'C',1);
$pdf->Cell(24,10,utf8_decode('Nota 3'),1,0,'C',1);
$pdf->Cell(19,10,'Promedio',1,0,'C',1);
$pdf->Cell(23,10,'Estado',1,1,'C',1);

foreach ($res as $row) {
    $Estado = $row['Prom'];

    $pdf->Cell(38,10,utf8_decode($row['NomAlu']),1,0,'C',0);
    $pdf->Cell(38,10,utf8_decode($row['ApeAlu']),1,0,'C',0);
    $pdf->Cell(24,10,$row['Nota1'],1,0,'C',0);
    $pdf->Cell(24,10,$row['Nota2'],1,0,'C',0);
    $pdf->Cell(24,10,$row['Nota3'],1,0,'C',0);
    $pdf->Cell(19,10,$row['Prom'],1,0,'C',0);
    if($Estado<12){
        $pdf->SetFillColor(255, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(23,10,'Desaprobado',1,1,'C',1);
        $pdf->SetTextColor(0, 0, 0);
    } else {
        $pdf->SetFillColor(0, 255, 0);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(23,10,'Aprobado',1,1,'C',1);
    }
}

    $pdf->Output();
?>
