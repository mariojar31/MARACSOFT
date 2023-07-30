<?php 
require "../librerias/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

include("../secciones/curso_select.php");
FUN::print_lista_curso($_GET['id_curso']);

//Estilos
$border_style=\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK;

$excel= new Spreadsheet();
$hoja_activa=$excel->getActiveSheet();
$hoja_activa->setTitle("Listado de Estudiantes");

$hoja_activa->getColumnDimension('A')->setWidth(5);
$hoja_activa->setCellValue('A1','No');
$hoja_activa->getColumnDimension('B')->setWidth(45);
$hoja_activa->setCellValue('B1','Nombre del Estudiante');
$hoja_activa->getColumnDimension('C')->setWidth(22);
$hoja_activa->setCellValue('C1','Doc de Identidad');

$hoja_activa->getStyle('A1:C1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$hoja_activa->getStyle('A1:C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$hoja_activa->getStyle('A1:C1')->getFill()->getStartColor()->setARGB('D3D3D3');

$fila=2;
$count=1;

foreach($listado_estudiantes as $rows){
    $hoja_activa->getStyle('A'.$fila)->getBorders()->getAllBorders()->setBorderStyle(TRUE);
    $hoja_activa->setCellValue('A'.$fila,$count);
    $hoja_activa->getStyle('B'.$fila)->getBorders()->getAllBorders()->setBorderStyle(TRUE);
    $hoja_activa->setCellValue('B'.$fila,$rows[0]['apellido_estudiante']);
    $hoja_activa->getStyle('C'.$fila)->getBorders()->getAllBorders()->setBorderStyle(TRUE);
    $hoja_activa->setCellValue('C'.$fila,$rows[0]['documento_estudiante']);
    $fila++; 
    $count++;
}

$hoja_activa->insertNewRowBefore(1, 5);

$texto=new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$texto->createText('Curso: ');
$bold_text=$texto->createTextRun($nombre_curso);
$bold_text->getFont()->setBold(TRUE);
$hoja_activa->getCell('A4')->setValue($texto);

$encabezado_text=new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$encabezado_text->createTextRun('MAR ACADEMIC SOFTWARE')->getFont()->setBold(TRUE);
$hoja_activa->getCell('A1')->setValue($encabezado_text);
$encabezado_text2=new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$encabezado_text2->createTextRun('Listado de Estudiantes')->getFont()->setBold(TRUE);
$hoja_activa->getCell('A2')->setValue($encabezado_text2);

$hoja_activa->mergeCells('A1:E1');
$hoja_activa->mergeCells('A2:E2');

$hoja_activa->getStyle('A1:E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$hoja_activa->getStyle('A1:E2')->getBorders()->getOutline()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="lista_estudiantes_'.$nombre_curso.'.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>                  