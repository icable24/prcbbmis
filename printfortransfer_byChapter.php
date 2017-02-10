<?php
include 'login_success.php';
require 'dbconnect.php';

$id = $_REQUEST['id'];

$pdo = Database::connect();
$bycountry = $pdo->prepare("SELECT * FROM transfer WHERE rtid = ?");
$bycountry->execute(array($id));
$bycountry = $bycountry->fetch(PDO::FETCH_ASSOC);



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

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Philippine Red Cross');
$pdf->SetTitle('Request for Blood Transfer');
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


Blood Bank Management Information System

Requisition for Blood Transfer

(Chapter and Hospital)



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

$rtid = $_REQUEST['id'];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM transfer where rtid = ? ";
$q = $pdo->prepare($sql);
$q->execute(array($rtid));
$transfer = $q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();


// $tbl = $tbl . '
//       <tr>
//           <td style="border: 1p x solid #ffffff; width: 130px;">'.'Donor ID: '.$did.'</td>
//           <td style="border: 1px solid #ffffff; width: 110px;">'.'Unit Serial Number' .$collect['unitserialno'].'</td>
//       </tr>';
$tbl = '<body><p style="font-size: 11px; align-text: left">'.'<b>Date Needed:</b>&nbsp;&nbsp;&nbsp;'. $transfer['dateneeded'] .'<br><br>'.'<b>Name:</b>&nbsp;&nbsp;&nbsp;'. $transfer['requester'] .'<br><br>'.'<b>A:</b>&nbsp;&nbsp;&nbsp;'. $transfer['positiveA'] .'<br><br>'.'<b>A-:</b>&nbsp;&nbsp;&nbsp;'. $transfer['negativeA'] .'<br><br>'.'<b>B:</b>&nbsp;&nbsp;&nbsp;'. $transfer['positiveB'] .'<br><br>'.'<b>B-:</b>&nbsp;&nbsp;&nbsp;'. $transfer['negativeB'] .'<br><br>'.'<b>O:</b>&nbsp;&nbsp;&nbsp;'. $transfer['positiveO'] .'<br><br>'.'<b>O-:</b>&nbsp;&nbsp;&nbsp;'. $transfer['negativeO'] .'<br><br>'.'<b>AB:</b>&nbsp;&nbsp;&nbsp;'. $transfer['positiveAB'] .'<br><br>'.'<b>AB-:</b>&nbsp;&nbsp;&nbsp;'. $transfer['negativeAB'] .'<br><br>'.'<b>Fresh Frozen Plasma:</b>&nbsp;&nbsp;&nbsp;'. $transfer['ffpqty'] .'<br><br>'.'<b>Platelet Concentrate:</b>&nbsp;&nbsp;&nbsp;'.$transfer['pcqty'].'<br><br>'.'<b>Whole Blood:</b>&nbsp;&nbsp;&nbsp;'.$transfer['wbqty'].'<br><br>'.'<b>Cryoprecipitate:</b>&nbsp;&nbsp;&nbsp;'.$transfer['cqty']. '<br><br>'.'<b>Blood Bank Name:</b>&nbsp;&nbsp;&nbsp;' .$transfer['bankname']. '<br><br>'.'<b>Blood Bank Address:</b>&nbsp;&nbsp;&nbsp;' .$transfer['bankaddress'].'<br><br>'.'<b>Contact Number:</b>&nbsp;&nbsp;&nbsp;' .$transfer['contactdetails'].'<br><br>'.'<b>Reason:</b>&nbsp;&nbsp;&nbsp;'.$transfer['reason'].'<br><br>'.'</p>' ;

$tbl = $tbl . '
Approved By,

</body>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
//==============================================================

$pdf->Output('requsition_for_transfer_'.$rtid.'.pdf', 'I');
?>