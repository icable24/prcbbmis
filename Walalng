
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
$dfname="Full Name";
$dmname="";
$dlname= "";
$daddress = "Address";
$dcontact = "Contact";
$dtype = "Donor Type";

$tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$did.'</td>
          <td style="border: 1px solid #ffffff; width: 110px;">'.$dfname.$dmname.$dlname.'</td>
          <td style="border: 1px solid #ffffff; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$dcontact.'</td>
          <td style="border: 1px solid #ffffff; width: 90px;">'.$dtype.'</td>
      </tr>';

while($row = mysqli_fetch_array($select_query)){
  $did = $row["did"];
  $dfname = $row["dfname"];
  $dmname = $row["dmname"];
  $dlname = $row["dlname"];
  $daddress = $row["daddress"];
  $dcontact = $row["dcontact"];
  $dtype = $row["dtype"];
  
  // -----------------------------------------------------------------------------

  $tbl = $tbl . '
      <tr>
          <td style="border: 1px solid #000000; width: 130px;">'. 'D01-' .$did.'</td>
          <td style="border: 1px solid #000000; width: 110px;">'.$dfname.$dmname.$dlname.'</td>
          <td style="border: 1px solid #000000; width: 130px;">'.$daddress.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dcontact.'</td>
          <td style="border: 1px solid #000000; width: 80px;">'.$dtype.'</td>
      </tr>';
  }  
  $tbl = $tbl . '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');



//==============================================================

$pdf->Output('donor_report.pdf', 'I');
?>