<?php

require_once('tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
       // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetY(15);
        $this->SetFont('times', 'B', 24);
        // Title
        $this->Cell(0, 15, 'Philippine Red Cross ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', 'R', 12);
        // Title
        $this->Cell(0, 10, 'Philippine Red Cross Blood Bank Management Information System', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
//start of argument
  if(!empty($_POST)){


      $categ=$_POST['categ'];
      $categ1=$_POST['categ1'];



//state2
//patient
if($categ == 'patient'){
  // create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('Patient Report');
$pdf->SetSubject(' ');
$pdf->SetKeywords(' ');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'R', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Patient Report



EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//$pdf->SetFont('helvetica', '', 9);
//$pdf->AddPage();




//==============================================================
include 'dbconnect.php';

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "prcbbmis");

$db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

//$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

$query = "SELECT * FROM `patient`";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';


    $pid = "Patient ID";
    $pfname = "Name";
    $paddress = "Address";
    $pbirthdate = "Birthdate";
    $pgender = "Gender";
    $pcontact = "Contact";
$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #ffffff; width: 50px;">'.$pfname.'</td>
          <td style="border: 1px solid #ffffff; width: 150px;">'.$paddress.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #ffffff; width: 80px;">'.$pgender.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$pcontact.'</td>

      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $pid = $row["pid"];
  $pfname = $row["pfname"];
  $paddress = $row["paddress"];
  $pbirthdate = $row["pbirthdate"];
  $pgender = $row["pgender"];
  $pcontact = $row["pcontact"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #ffffff; width: 50px;">'.$pfname.'</td>
          <td style="border: 1px solid #ffffff; width: 150px;">'.$paddress.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #ffffff; width: 80px;">'.$pgender.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$pcontact.'</td>

      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('donor_report.pdf', 'I');
}
  //state1
  //donor
  if($categ == 'donor'){
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('Donor Report');
$pdf->SetSubject(' ');
$pdf->SetKeywords(' ');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'R', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report



EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//$pdf->SetFont('helvetica', '', 9);
//$pdf->AddPage();




//==============================================================
include 'dbconnect.php';

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "prcbbmis");

$db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

//$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

$query = "SELECT * FROM `donor`";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$did = "Donor ID";
$dfname = "Name";
$daddress = "Address";
$dcontact = "Contact";
$dtype = "Donor Type";

$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #ffffff; width: 110px;">'.$dfname.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$dcontact.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$dtype.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $daddress = $row["daddress"];
  $dcontact = $row["dcontact"];
  $dtype = $row["dtype"];
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('patient_report.pdf', 'I');
}

//state3
//Blood Inventory
elseif($categ == 'inventory'){
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('Inventory Report');
$pdf->SetSubject(' ');
$pdf->SetKeywords(' ');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'R', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Inventory Report



EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//$pdf->SetFont('helvetica', '', 9);
//$pdf->AddPage();




//==============================================================
include 'dbconnect.php';

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "prcbbmis");

$db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

//$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

$query = "SELECT * FROM inventory";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$unitserialno = "Unit Serial Number";
$component = "component";
$status = "Status";
$bloodinfo = "Blood Info";





$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #ffffff; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$status.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$bloodinfo.'</td>
         
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $unitserialno = $row["unitserialno"];
  $component = $row["component"];
  $status = $row["status"];
  $bloodinfo = $row["bloodinfo"];

  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$bloodinfo.'</td>
         
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('inventory_report.pdf', 'I');
}
//state5
//BloodCollection
if($categ1 == 'collection'){
  // create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('MBD Donor Report');
$pdf->SetSubject(' ');
$pdf->SetKeywords(' ');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'R', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Blood Collection Report



EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//$pdf->SetFont('helvetica', '', 9);
//$pdf->AddPage();




//==============================================================
include 'dbconnect.php';

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "prcbbmis");

$db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


$query = "SELECT * FROM collection";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$donorcollectid = "Collection ID";
$cfname = "Name";
$collectiondate = "Date Collected";
$unitserialno = "Blood Bag Number";
$bagtype = "Bag Type";


$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 80px;">'.$donorcollectid.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$cfname.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$collectiondate.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$bagtype.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  echo implode(",", $row);
  $donorcollectid = $row["donorcollectid"];
  $cfname = $row["cfname"];
  $collectiondate = $row["collectiondate"];
  $unitserialno = $row["unitserialno"];
  $bagtype = $row["bagtype"];
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 80px;">'.$donorcollectid.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$cfname.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$collectiondate.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$bagtype.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_clean();
$pdf->Output('BloodCollection_report.pdf', 'I');
}
elseif($categ1 == 'request'){
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('MBD Bloor Request Report');
$pdf->SetSubject(' ');
$pdf->SetKeywords(' ');


// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'R', 12);
$pdf = new pdf('L','pt','A3');
$pdf->SetFont('Arial','',10);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Blood Request Report



EOD;


// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//$pdf->SetFont('helvetica', '', 9);
//$pdf->AddPage();




//==============================================================
include 'dbconnect.php';

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "prcbbmis");

$db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


$query = "SELECT * FROM bloodrequest";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$reqid = "Request ID";
$status = "status";
$pid = "Patient ID";
$component = "component";
$quantity = "quantity";
$amount = "amount";


$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$reqid.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$component.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$quantity.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$amount.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  echo implode(",", $row);
  $reqid = $row["reqid"];
  $status = $row["status"];
  $pid = $row["pid"];
  $component = $row["component"];
  $quantity = $row["quantity"];
  $amount = $row["amount"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$reqid.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #ffffff; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$component.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$quantity.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$amount.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_clean();
$pdf->Output('BloodRequest_report.pdf', 'I');
}
}
?>