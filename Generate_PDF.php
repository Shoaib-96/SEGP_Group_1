<?php
require ('fpdf/fpdf.php');
class PDF extends FPDF{
function generate_Data($Query){
$servername="localhost";
$username="username";
$password="password";
// Create connection
$conn = new mysqli($servername, "root", "","test");
// Check connection
if ($conn->connect_error) {
    die("Connection failed:".$conn->connect_error);
}
else{
		if($result=$conn->query($Query)){
			if($result->num_rows){
				$rows=$result->fetch_all(MYSQLI_ASSOC);       // MYSQLI_ASSOC this is for getting the assisated array.
			}
		}
		return $rows;
	}
}
function width_of_tables($variable){
	switch($variable){
		case "pats":
				$width = array(10,55,55,30,40);
				return $width;
		default:
			$width = array(15,35,45,7,23,40,25);
			return $width;
			
	}
}
function getQuery($variable){
	switch ($variable){
		case "students":
		  return "select * from students order by name ASC";
		case "year 2":
			return "select * from students where year='2' order by name ASC";
		case "year 3":
			return "select * from students where year='3' order by name ASC";
		case "year 4":
			return "select * from students where year='4' order by name ASC";
		case "pats":
			return "select * from pats order by ID ASC";
	}
}
function Table($header, $data,$columnNames,$width)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.1);
	$this->SetFont('','B');
	$vertical_width=5;
	$Orientation='L';
	// Header
	//$w = array(25,35,45,10,25,50);
	for($i=0;$i<count($header);$i++)
		$this->Cell($width[$i],$vertical_width,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	
	foreach($data as $row)
	{
		for($i=0;$i<count($header);$i++){
			$this->Cell($width[$i],$vertical_width,$row[$columnNames[$i]],'LR',0,$Orientation,$fill);
		}
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($width),0,'','T');
}
}
$pdf = new PDF();
$variable=$_POST['selectOption'];
if($variable=="pats"){
	$columnNames=array("ID","name","email","contact","department");
	$header = array("ID","Name","Email","Contact","Department");
}
else{
	$columnNames=array("UOB","name","email","year","contact","pat_name","Department");
	$header = array('UOB','Name','Email','Year','Contact','PAT','Department');
}
$width=$pdf->width_of_tables($variable);
$Query=$pdf->getQuery($variable);
$data = $pdf->generate_Data($Query);
$pdf->SetFont('Arial','',8);
$pdf->AddPage();
$pdf->Table($header,$data,$columnNames,$width);
$pdf->Output();
?>
