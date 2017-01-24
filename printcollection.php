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

Blood Service



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
  
// $tbl = '<table style="width: 638px;" cellspacing="0">';

$did = $_REQUEST['id'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM collection where donorcollectid = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($did));
$collect = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();



// $tbl = $tbl . '
//       <tr>
//           <td style="border: 1px solid #ffffff; width: 130px;">'.'Donor ID: '.$did.'</td>
//           <td style="border: 1px solid #ffffff; width: 110px;">'.'Unit Serial Number' .$collect['unitserialno'].'</td>
//       </tr>';
$tbl = '<body>
<h2>Thanks! You\'ve really made a difference</h2>
<br><br><br><br>
On behalf of everyone you\'ve helped by giving blood -- thank you.<br><br>

Few People in the Philippines have the special gift of being able to give blood. That\'s why we rely on you to regularly give blood every twelve weeks. This ensures we have safe levels for everyone who needs it throughout the year.<br><br>

Attached is your personal blood donor ID card. Each time you donate please bring it along with you. If you need to update any of your details, such as your home address, either call us on (034) 434 9286, or visit our office.<br><br>

That way, we can always be in touch so you can help those who need it most. <br><br><br><br>

Yours Sincerely,
</body>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
//==============================================================

$pdf->Output('donor_acknowledgement_'.$did.'.pdf', 'I');
?>