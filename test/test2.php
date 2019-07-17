<?php
include_once('PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php');

$inputFileName = 'test.xlsx';
$bank=array();
$bank=["","COMMERCIAL BANK","DOHA BANK - SME","DOHA BANK - OLD","	
DOHA BANK - EURO","DOHA BANK - PROJEC","DOHA BANK - CALL"];

print_r($bank);die;
/*check point*/

// Read the existing excel file
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);

// Update it's data
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Add column headers
$execlCount=1;
for($i=1;$i<8;$i++){
	echo $objPHPExcel->getActiveSheet()
			->getValue('H1');
}
$objPHPExcel->getActiveSheet()
			->getValue('H1', 'EDITED Mode');
			
// Generate an updated excel file
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $inputFileName . '"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');


?>