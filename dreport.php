<?php
include 'login_success.php';
require 'dbconnect.php';


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
        date_default_timezone_set("Asia/Taipei");
        $uname = $_SESSION['login_username'];

        $pdo = Database::connect();
        $user = $pdo->prepare("SELECT * FROM user WHERE username = '$uname'");
        $user->execute();
        $user = $user->fetch(PDO::FETCH_ASSOC);
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', 'R', 8);
        // Title
       // $this->Cell(0, 10, 'Printed by: ' . $user['fname'] . ' ' .  substr($user['mname'], 0, 1) . '. ' . $user['lname'] , 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 10,'Printed by: '. $user['fname'] . ' ' .  substr($user['mname'], 0, 1) . '. ' . $user['lname'] . '              '. date("m-d-Y H:i:s"), 0, false, 'L', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// echo $_POST['sdate'];
// echo $_POST['edate'];
//start of argument
  if(!empty($_POST)){



      // $categ = isset($_POST['categ']) ? $_POST['sdate'] : '0' ? $_POST['edate'] : '0';
      $categ = $_POST['categ'];
      $categ1=$_POST['categ1'];
      $categ2 = $_POST['categ2'];



//state2
//patient
if($categ == 'patient'){
  // create new PDF document
$pdf = new MYPDF(LANDSCAPE, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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

if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = DateTime::createFromFormat("Y-m-d", $_POST['sdate'])->format('m-d-Y');
    $edate = DateTime::createFromFormat("Y-m-d", $_POST['edate'])->format('m-d-Y');
    

    echo $sdate;
    echo $edate;
    // $sdate = explode('/', $sdate);
    // $sdate = $sdate[2] + "-" + $sdate[1] + "-" + $sdate[0];


    // $edate = explode('/', $edate);
    // $edate = $edate[2] + "-" + $edate[1] + "-" + $edate[0]; 

$query = "SELECT * FROM `patient` WHERE pregdate between '$sdate' and '$edate'";
$select_query = mysqli_query($db_con,$query);



   $tbl = '<table style="width: 638px;" cellspacing="0">';


    $pid = "Patient ID";
    $pfname = "Name";
    $pmname = "Middle name";
    $plname = "Last name";
    $paddress = "Address";
    $pbirthdate = "Birthdate";
    $pgender = "Gender";
    $pcontact = "Contact";
    $pregdate = "Registration Date";


$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 50px;">'.$pfname.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$paddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #000000; width: 60px;">'.$pgender.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$pcontact.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$pregdate.'</td>

      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $pid = $row["pid"];
  $pfname = $row["pfname"];
  $pmname = $row["plname"];
  $plname = $row["plname"];
  $paddress = $row["paddress"];
  $pbirthdate = $row["pbirthdate"];
  $pgender = $row["pgender"];
  $pcontact = $row["pcontact"];
  $pregdate = $row["pregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$pfname. ' ' . substr($pmname, 0, 1) . '. ' . $plname.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$paddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #000000; width: 60px;">'.$pgender.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$pcontact.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$pregdate.'</td>

      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('patient1_report.pdf', 'I');
}
if($categ == 'patient'){
  // create new PDF document
$pdf = new MYPDF(LANDSCAPE, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $pmname = "Middle name";
    $plname = "Last name";
    $paddress = "Address";
    $pbirthdate = "Birthdate";
    $pgender = "Gender";
    $pcontact = "Contact";
    $pregdate = "Registration Date";


$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$pfname.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$paddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pgender.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pcontact.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pregdate.'</td>

      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $pid = $row["pid"];
  $pfname = $row["pfname"];
  $pmname = $row["plname"];
  $plname = $row["plname"];
  $paddress = $row["paddress"];
  $pbirthdate = $row["pbirthdate"];
  $pgender = $row["pgender"];
  $pcontact = $row["pcontact"];
  $pregdate = $row["pregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$pfname. ' ' . substr($pmname, 0, 1) . '. ' . $plname.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$paddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pbirthdate.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pgender.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pcontact.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pregdate.'</td>

      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('patient1_report.pdf', 'I');
}
}
  if($categ == 'donor'){
// create new PDF document
$pdf = new MYPDF(LANDSCAPE, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
    $dnationality = "Nationality";
    $dregdate = "Registration Date";
    $dgender = "Gender";

$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$dfname .'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dnationality.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';


while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dmname = $row["dmname"];
  $dlname = $row["dlname"];
  $dgender = $row["dgender"];
  $dnationality = $row ["dnationality"];
  $daddress = $row["daddress"];
  $dcontact = $row["dcontact"];
  $dregdate = $row["dregdate"];
  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$dfname. ' ' . substr($dmname, 0, 1) . '. ' . $dlname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dnationality.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>

      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('donor1_report.pdf', 'I');
}

  //state1
  //donor
  if($categ == 'donor'){
// create new PDF document
$pdf = new MYPDF(LANDSCAPE, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = DateTime::createFromFormat("Y-m-d", $_POST['sdate'])->format('m-d-Y');
    $edate = DateTime::createFromFormat("Y-m-d", $_POST['edate'])->format('m-d-Y');
    

    echo $sdate;
    echo $edate;
    // $sdate = explode('/', $sdate);
    // $sdate = $sdate[2] + "-" + $sdate[1] + "-" + $sdate[0];


    // $edate = explode('/', $edate);
    // $edate = $edate[2] + "-" + $edate[1] + "-" + $edate[0]; 

$query = "SELECT * FROM `donor` WHERE dregdate between '$sdate' and '$edate'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $daddress = "Address";
    $dcontact = "Contact";
    $dnationality = "Nationality";
    $dregdate = "Registration Date";
    $dgender = "Gender";

$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$dfname .'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dnationality.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';


while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dmname = $row["dmname"];
  $dlname = $row["dlname"];
  $dgender = $row["dgender"];
  $dnationality = $row ["dnationality"];
  $daddress = $row["daddress"];
  $dcontact = $row["dcontact"];
  $dregdate = $row["dregdate"];
  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$dfname. ' ' . substr($dmname, 0, 1) . '. ' . $dlname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dnationality.'</td>
          <td style="border: 1px solid #000000; width: 170px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>

      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('donor_report.pdf', 'I');
}

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
$quality = "quality";





$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$bloodinfo.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$quality.'</td>
         
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $unitserialno = $row["unitserialno"];
  $component = $row["component"];
  $status = $row["status"];
  $bloodinfo = $row["bloodinfo"];
  $quality = $row["quality"];

  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$bloodinfo.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$quality.'</td>
         
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
          <td style="border: 1px solid #000000; width: 80px;">'.$donorcollectid.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$cfname.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$collectiondate.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$bagtype.'</td>
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
          <td style="border: 1px solid #000000; width: 80px;">'.$donorcollectid.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$cfname.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$collectiondate.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$bagtype.'</td>
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


$tbl = $tbl . '
      <tr>
           <td style="border: 1px solid #000000; width: 100px;">'.$reqid.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$quantity.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  echo implode(",", $row);
  $reqid = $row["reqid"];
  $status = $row["status"];
  $pid = $row["pid"];
  $component = $row["component"];
  $quantity = $row["quantity"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 100px;">'.$reqid.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$pid.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$quantity.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_clean();
$pdf->Output('BloodRequest_report.pdf', 'I');
}
elseif($categ1 == 'test'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Blood Test Report



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


$query = "SELECT * FROM bloodtest";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$testid = "Test ID";
$bagserialno = "Serial No.";
$remarks1 = "Remarks1";
$remarks2 = "Remarks2";
$remarks3 = "Remarks3";
$remarks4 = "Remarks4";
$remarks5 = "Remarks5";

$tbl = $tbl . '
      <tr>
         <td style="border: 1px solid #000000; width: 80px;">'.$testid.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$bagserialno.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks1.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks2.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks3.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks4.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks5.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  echo implode(",", $row);
  $testid = $row["testid"];
  $bagserialno = $row["bagserialno"];
  $remarks1 = $row["remarks1"];
  $remarks2 = $row["remarks2"];
  $remarks3 = $row["remarks3"];
  $remarks4 = $row["remarks4"];
  $remarks5 = $row["remarks5"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$testid.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$bagserialno.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks1.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks2.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks3.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks4.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$remarks5.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_clean();
$pdf->Output('BloodTest_report.pdf', 'I');
}
elseif($categ2 == 'deferred'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Deferred)



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


$query = "SELECT * FROM donor WHERE dremarks = 'deferred'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dremarks = "Remarks";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dremarks.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dremarks = $row["dremarks"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dremarks.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('donor1_report.pdf', 'I');
}
elseif($categ2 == 'accepted'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Accepted)


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


$query = "SELECT * FROM donor WHERE dremarks = 'Accepted'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dremarks = "Remarks";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dremarks.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dremarks = $row["dremarks"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dremarks.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('Accepted_report.pdf', 'I');
}

elseif($categ2 == 'gquality'){
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
(Good Quality)


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

$query = "SELECT * FROM inventory WHERE quality ='Good Quality'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$unitserialno = "Unit Serial Number";
$component = "component";
$status = "Status";
$amount = "Amount";
$quality = "Quality";





$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$amount.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$quality.'</td>
         
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $unitserialno = $row["unitserialno"];
  $component = $row["component"];
  $status = $row["status"];
  $amount = $row['amount'];
  $quality = $row["quality"];

  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$amount.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$quality.'</td>
         
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('inventory_report.pdf', 'I');
}

elseif($categ2 == 'pquality'){
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
(Poor Quality)


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

$query = "SELECT * FROM inventory WHERE quality ='Poor Quality'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$unitserialno = "Unit Serial Number";
$component = "component";
$status = "Status";
$amount = "Amount";
$quality = "Quality";





$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$amount.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$quality.'</td>
         
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $unitserialno = $row["unitserialno"];
  $component = $row["component"];
  $status = $row["status"];
  $amount = $row['amount'];
  $quality = $row["quality"];

  
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'.$unitserialno.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$component.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$status.'</td>
          <td style="border: 1px solid #000000; width: 100px;">'.$amount.'</td>
          <td style="border: 1px solid #000000; width: 90px;">'.$quality.'</td>
         
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('inventory_report.pdf', 'I');
}

elseif($categ2 == 'walkin'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Walk-In)


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

$query = "SELECT * FROM donor WHERE dtype = 'Walk-in'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dregdate = "Donor Registration";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dregdate = $row["dregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('Walkin.pdf', 'I');
}
elseif($categ2 == 'walkin'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Walk-In)


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
if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = DateTime::createFromFormat("Y-m-d", $_POST['sdate'])->format('m-d-Y');
    $edate = DateTime::createFromFormat("Y-m-d", $_POST['edate'])->format('m-d-Y');
    

    echo $sdate;
    echo $edate;
    // $sdate = explode('/', $sdate);
    // $sdate = $sdate[2] + "-" + $sdate[1] + "-" + $sdate[0];


    // $edate = explode('/', $edate);
    // $edate = $edate[2] + "-" + $edate[1] + "-" + $edate[0]; 

$query = "SELECT * FROM donor WHERE dtype = 'Walk-in' and dregdate between '$sdate' and '$edate'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dregdate = "Donor Registration";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dregdate = $row["dregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('Walkin.pdf', 'I');
}
}
elseif($categ2 == 'rep'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Replacement)


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

$query = "SELECT * FROM donor WHERE dtype = 'Replacement'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dregdate = "Donor Registration";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dregdate = $row["dregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('Walkin.pdf', 'I');
}
elseif($categ2 == 'rep'){
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


// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD


Philippine Red Cross Blood Bank Management Information System

Donor Report
(Replacement)


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
if(!empty($_POST['sdate']) && !empty($_POST['edate'])){
    $sdate = DateTime::createFromFormat("Y-m-d", $_POST['sdate'])->format('m-d-Y');
    $edate = DateTime::createFromFormat("Y-m-d", $_POST['edate'])->format('m-d-Y');
    

    echo $sdate;
    echo $edate;
    // $sdate = explode('/', $sdate);
    // $sdate = $sdate[2] + "-" + $sdate[1] + "-" + $sdate[0];


    // $edate = explode('/', $edate);
    // $edate = $edate[2] + "-" + $edate[1] + "-" + $edate[0]; 

$query = "SELECT * FROM donor WHERE dtype = 'Replacement' and dregdate between '$sdate' and '$edate'";
$select_query = mysqli_query($db_con,$query);

$tbl = '<table style="width: 638px;" cellspacing="0">';

$tbl = '<table style="width: 638px;" cellspacing="0">';
    $did = "Donor ID";
    $dfname = "Name";
    $dgender = "Gender";
    $daddress = "Address";
    $dtype = "Donation Type";
    $dregdate = "Donor Registration";

$tbl = $tbl . '
       <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dgender = $row["dgender"];
  $daddress = $row["daddress"];
  $dtype = $row["dtype"];
  $dregdate = $row["dregdate"];

  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 80px;">'.$did.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dfname.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dgender.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dregdate.'</td>
          
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================
ob_start();
$pdf->Output('Walkin.pdf', 'I');
}
}
}
?>