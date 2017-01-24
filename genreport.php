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
        $this->SetFont('helvetica', 'I', 8);
        // Title
        $this->Cell(0, 10, 'Philippine Red Cross Blood Bank Management Information System', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

if(!empty($_POST)){

//start sang arguement
    $act_type=$_POST['category'];
    $org = isset($_POST['checkorg']) ? $_POST['checkorg'] : '0';
    $orgchoose= isset($_POST['orgrep']);
    $part_solo = isset($_POST['partcheck']) ? $_POST['partcheck'] : '0';
    $bud_rep = isset($_POST['budrep']) ? $_POST['budrep'] : '0';
    $liq_rep = isset($_POST['liqrep']) ? $_POST['liqrep'] : '0';
    $inc_rep = isset($_POST['increp']) ? $_POST['increp'] : '0';




    //state1
    //tree planting alone
    if($act_type == 'donor' && $org == '0' && $bud_rep == '0' && $inc_rep == '0' && $liq_rep == '0'){
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PRC Manager');
    $pdf->SetTitle('Donor Report');
    $pdf->SetSubject(' ');
    $pdf->SetKeywords(' ');

    // set font
    $pdf->SetFont('times', 'R', 12);

    // add a page
    $pdf->AddPage();

// set some text to print
    $txt = <<<EOD



    Planting Activity Management System

    Tree Planting Report




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

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        //$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

        $query = "SELECT orgname, regact, scheddate FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid where regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 230px;">'.$orgnamelabel.'</td>
                  <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 130px;">'.$schedlabel.'</td>

              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 230px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$schedule.'</td>

            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('treeplanting_report.pdf', 'I');
        }//end sang activity


        //******************************************************************************************************************

        //state2
        //report for all org
        elseif($org== '1' && $act_type== 'none' && $orgchoose=='' && $part_solo == '0' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Tree Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        // set font
        $pdf->SetFont('times', 'R', 12);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD




Planting Activity Management System

Organization Report




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

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        //$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

        $query = "SELECT * FROM `organization`";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $orgtypelabel="Organization Type";
        $addlabel="Address";
        $conperlabel="Contact Person";
        $connumlabel="Contact Number";

        $tbl = $tbl . '
        <tr>
            <td style="border: 0px solid #ffffff; width: 100px;">'.$orgnamelabel.'</td>
            <td style="border: 0px solid #ffffff; width: 110px;">'.$orgtypelabel.'</td>
            <td style="border: 0px solid #ffffff; width: 130px;">'.$addlabel.'</td>
            <td style="border: 0px solid #ffffff; width: 90px;">'.$conperlabel.'</td>
            <td style="border: 0px solid #ffffff; width: 90px;">'.$connumlabel.'</td>
        </tr>';

        while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $orgtype = $row["orgtype"];
            $orgadd = $row["orgadd"];
            $orgcperson = $row["orgcperson"];
            $orgcnum = $row["orgcnum"];
        // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 100px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$orgtype.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$orgadd.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$orgcperson.'</td>
                <td style="border: 1px solid #000000; width: 80px;">'.$orgcnum.'</td>
            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('org_report.pdf', 'I');
        }
        //end of report all org

        //************************************************************************************************************************

        //state3
        //report activity with org
        elseif($act_type == 'Tree Planting' && $org== '1' && $orgchoose=='' && $part_solo=='0'){
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Tree Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        // set font
        $pdf->SetFont('times', 'R', 12);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD



        Planting Activity Management System

        Tree Planting Report


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

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        //$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

        $query = "SELECT orgname, regact, scheddate, orgcperson, orgcnum FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid where regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
        $orgperson = "Contact Person";
        $connum = "Contact Number";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 160px;">'.$orgnamelabel.'</td>
                  <td style="border: 0px solid #ffffff; width: 100px;">'.$actlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 100px;">'.$orgperson.'</td>
                 <td style="border: 0px solid #ffffff; width: 90px;">'.$connum.'</td>

              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];
          $cperson = $row["orgcperson"];
          $orgcnum = $row["orgcnum"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 160px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$schedule.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$cperson.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$orgcnum.'</td>

            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('treeOrg_report.pdf', 'I');

        }//end sg two criteria, report activity with org


        //*********************************************************************************************************************


 
        //state4 (NOTE DAPAT UNOR LANG ANG MAKITA)
        //report act type with org specific
        elseif($act_type == 'Tree Planting' && $org== '1' && $orgchoose=='$orgid' && $part_solo=='0'){
         $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Tree Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        // set font
        $pdf->SetFont('times', 'R', 12);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD



        Planting Activity Management System

        Tree Planting Report



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

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        //$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

        $query = "SELECT orgname, regact, scheddate, orgcperson FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid WHERE regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
        $contactperson = "Contact Person";
 
        $tbl = $tbl . '
              <tr>
                <td style="border: 0px solid #ffffff; width: 100px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 130px;">'.$schedlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 130px;">'.$contactperson.'</td>
              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];
          $orgcperson = $row["orgcperson"];


          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 100px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$schedule.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$orgcperson.'</td>
            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('treeplanting_report.pdf', 'I');
        }// end of activity+org+specific


        //***********************************************************************************


        //state5 (NOTE DAPAT UNOR LANG ANG MAKITA)
        //org+specific
        elseif ($act_type == 'none' && $org== '1' && $orgchoose=='$orgid' && $part_solo=='0') {
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        //==============================================================
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Tree Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        // set font
        $pdf->SetFont('times', 'R', 12);

        // add a page
        $pdf->AddPage();

        // set some text to print
        $txt = <<<EOD



Planting Activity Management System

Tree Planting Report


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

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        //$db_con = mysqli_connect("127.0.0.1","root"," ","baciwadb");

        $query = "SELECT orgname, regact, scheddate, orgcperson, orgcnum FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid  ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
        $orgperson = "Contact Person";
        $connum = "Contact Number";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                  <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 110px;">'.$orgperson.'</td>
                 <td style="border: 0px solid #ffffff; width: 100px;">'.$connum.'</td>

              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];
          $cperson = $row["orgcperson"];
          $orgcnum = $row["orgcnum"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 110px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$schedule.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$cperson.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$orgcnum.'</td>

            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('treeOrg_report.pdf', 'I');
        }//end of org+specific


        //state6
        //org + part
        elseif($part_solo == '1' && $org == '1' && $act_type=="none" && $orgchoose=='') { 
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Tree Planting Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage();

            $txt = <<<EOD



            Plating Activity Management System

            Organization Report



EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, partname, partstat, scheddate FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN schedule as sched ON sched.regid=reg.regid INNER JOIN participants as partici ON partici.schedid=sched.schedid";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $partlabel="Participants";
            $partstatlable="Status";
            $schedlable="Schedule";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 250px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$partlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$partstatlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $partname = $row["partname"];
            $partstat = $row["partstat"];
            $scheddate = $row["scheddate"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 250px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$partname.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$partstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$scheddate.'</td>

                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of org+participants

        //state7
        //activity+org+participants
        elseif($part_solo == '1' && $org == '1' && $act_type=="Tree Planting" && $orgchoose=='' && $budliqincrep=='') { 
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Tree Planting Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage();

            $txt = <<<EOD



        Plating Activity Management System

        Organization Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, partname, partstat, scheddate, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN schedule as sched ON sched.regid=reg.regid INNER JOIN participants as partici ON partici.schedid=sched.schedid where regact='{$act_type}' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $partlabel="Participants";
            $partstatlable="Status";
            $schedlable="Schedule";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 150px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$partlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$partstatlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $partname = $row["partname"];
            $partstat = $row["partstat"];
            $scheddate = $row["scheddate"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 150px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$partname.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$partstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$scheddate.'</td>

                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of activity+part+org
        
        //state8
        //org+specific+participants
        
        //state9
        //treeplanting+org+specific+participants

//**************************************************************************************************************************

        //state10
        //mangrove
        elseif($act_type == 'Mangrove Planting' && $org == '0'  && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '0'){
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Mangrove Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        $pdf->SetFont('times', 'R', 12);

        $pdf->AddPage();

        $txt = <<<EOD



    Planting Activity Management System

    Mangrove Planting Report



EOD;

        $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        $query = "SELECT orgname, regact, scheddate FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid where regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 220px;">'.$orgnamelabel.'</td>
                  <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 130px;">'.$schedlabel.'</td>

              </tr>';

        while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $activity = $row["regact"];
            $schedule = $row["scheddate"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 220px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$schedule.'</td>

            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->Output('treeplanting_report.pdf', 'I');
        }//end of mangrove

//*****************************************************************************************************************

        //state11
        //mangrove+org
        elseif($act_type == 'Mangrove Planting' && $org== '1' && $orgchoose=='' && $part_solo=='0'  && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '0'){
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Mangrove Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        $pdf->SetFont('times', 'R', 12);

        $pdf->AddPage();

        $txt = <<<EOD



        Planting Activity Management System

        Mangrove Planting Report



EOD;

    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        $query = "SELECT orgname, regact, scheddate, orgcperson, orgcnum FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid where regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
        $orgperson = "Contact Person";
        $connum = "Contact Number";
 
        $tbl = $tbl . '
              <tr>
                  <td style="border: 0px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                  <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlabel.'</td>
                 <td style="border: 0px solid #ffffff; width: 110px;">'.$orgperson.'</td>
                 <td style="border: 0px solid #ffffff; width: 100px;">'.$connum.'</td>

              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];
          $cperson = $row["orgcperson"];
          $orgcnum = $row["orgcnum"];

          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$schedule.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$cperson.'</td>
                <td style="border: 1px solid #000000; width: 100px;">'.$orgcnum.'</td>

            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('mangroveorg_report.pdf', 'I');

        }// end of mangrove + org

//**************************************************************************************************************

        //state12
        //mangrove+org+specific
        elseif($act_type == 'Mangrove Planting' && $org== '1' && $orgchoose=='$orgid' && $part_solo=='0'  && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '0'){
         $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Watershed Manager');
        $pdf->SetTitle('Mangrove Planting Report');
        $pdf->SetSubject(' ');
        $pdf->SetKeywords(' ');

        $pdf->SetFont('times', 'R', 12);

        $pdf->AddPage();

        $txt = <<<EOD



        Planting Activity Management System

        Mangrove Planting Report



EOD;

    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

        //==============================================================
        include 'database.php';

        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_DATABASE", "baciwadb");

        $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        $query = "SELECT orgname, regact, scheddate, orgcperson FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
        INNER JOIN schedule as sched ON sched.regid=reg.regid WHERE regact='{$act_type}' ";
        $select_query = mysqli_query($db_con,$query);

        $tbl = '<table style="width: 638px;" cellspacing="0">';

        $orgnamelabel = "Organization Name";
        $actlabel="Activity";
        $schedlabel="Schedule Date";
        $contactperson = "Contact Person";
 
        $tbl = $tbl . '
              <tr>
                <td style="border: 0px solid #ffffff; width: 150px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$actlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 130px;">'.$contactperson.'</td>
              </tr>';

        while($row = mysqli_fetch_array($select_query)){
          $orgname = $row["orgname"];
          $activity = $row["regact"];
          $schedule = $row["scheddate"];
          $orgcperson = $row["orgcperson"];


          // -----------------------------------------------------------------------------

        $tbl = $tbl . '
      
            <tr>
                <td style="border: 1px solid #000000; width: 150px;">'.$orgname.'</td>
                <td style="border: 1px solid #000000; width: 90px;">'.$schedule.'</td>
                <td style="border: 1px solid #000000; width: 110px;">'.$activity.'</td>
                <td style="border: 1px solid #000000; width: 130px;">'.$orgcperson.'</td>
            </tr>';
        }  
        $tbl = $tbl . '</table>';
        $pdf->writeHTML($tbl, true, false, false, false, '');

        //==============================================================

        $pdf->Output('mangroveplanting_report.pdf', 'I');
        }//mangrove+org+specific

//***********************************************************************************************************************8

        //state13
        //mangrove+org+participants
        elseif($part_solo == '1' && $org == '1' && $act_type=='Mangrove Planting' && $orgchoose==''  && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '0') { 
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Mangrove Planting Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage();

            $txt = <<<EOD



        Plating Activity Management System

        Mangrove Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, partname, partstat, scheddate, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN schedule as sched ON sched.regid=reg.regid INNER JOIN participants as partici ON partici.schedid=sched.schedid where regact='{$act_type}' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $partlabel="Participants";
            $partstatlable="Status";
            $schedlable="Schedule";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 150px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$partlabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$partstatlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$schedlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $partname = $row["partname"];
            $partstat = $row["partstat"];
            $scheddate = $row["scheddate"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 150px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$partname.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$partstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$scheddate.'</td>

                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of mangrove+org+participants

//**************************************************************************************************************************

        //state14
        //mangrove+org+partcipants+specific

//**************************************************************************************************************************


        //state15
        //budget
        elseif($part_solo == '0' && $org == '0' && $act_type=='none' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }// end of budget

//*****************************************************************************************************
        
        //state16
        //liquidation

        elseif ($part_solo == '0' && $org == '0' && $act_type=='none' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of liquidation

//**************************************************************************************************************************************************8

        //state17
        //incident
        elseif ($part_solo == '0' && $org == '0' && $act_type=='none' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT * FROM incident INNER JOIN organization ON organization.orgid = incident.orgid";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            //$orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                //$orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }

//******************************************************************************************************************


        //state18
        //treeplanting + bud

        elseif($part_solo == '0' && $org == '0' && $act_type=='Tree Planting' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid WHERE regact='Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }


//******************************************************************************************************************************************************8
        
        //state19
        //liquidation+treeplanting

        elseif ($part_solo == '0' && $org == '0' && $act_type=='Tree Planting' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode WHERE regact='Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px; margins: 0px auto;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of liquidation+tree

//**************************************************************************************************************************************************************

        //state20
        //incident+tree planting
        elseif ($part_solo == '0' && $org == '0' && $act_type=='Tree Planting' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT incname, incdate, inctype, incdesc, incadd, incact, orgname FROM incident 
            INNER JOIN organization ON organization.orgid = incident.orgid WHERE incact='Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            $orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                $orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                        <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }//end of tree planting + inc

//***********************************************************************************************************************


        //state21
        //mangroveplanting + bud

        elseif($part_solo == '0' && $org == '0' && $act_type=='Mangrove Planting' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid WHERE regact='Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }


//******************************************************************************************************************************************************8
        
        //state22
        //liquidation+Mangroveplanting

        elseif ($part_solo == '0' && $org == '0' && $act_type=='Mangrove Planting' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode WHERE regact='Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 150px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 150px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        }//end of liquidation+mangrove

//**************************************************************************************************************************************************************

        //state23
        //incident+mangrove
        elseif ($part_solo == '0' && $org == '0' && $act_type=='Mangrove Planting' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT incname, incdate, inctype, incdesc, incadd, incact, orgname FROM incident 
            INNER JOIN organization ON organization.orgid = incident.orgid WHERE incact='Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            $orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                $orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                        <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }


//*****************************************************************************************************************

        //state24
        //budget + org
        elseif($part_solo == '0' && $org == '1' && $act_type=='none' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of org + budget

//*******************************************************************************************************************

        //state25
        //org+liquidation

        elseif ($part_solo == '0' && $org == '1' && $act_type=='none' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact, orgname FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 0px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of Liq + org

//****************************************************************************************************************

        //state26
        //incident + org

        elseif ($part_solo == '0' && $org == '1' && $act_type=='none' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT * FROM incident INNER JOIN organization ON organization.orgid = incident.orgid";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            $orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                $orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }

//******************************************************************************************************************************


        //state27
        //budget + org + treeplanting
        elseif($part_solo == '0' && $org == '1' && $act_type=='Tree Planting' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid WHERE regact='Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of org + budget

//*******************************************************************************************************************

        //state28
        //org+liquidation+tree planting

        elseif ($part_solo == '0' && $org == '1' && $act_type=='Tree Planting' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact, orgname FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode WHERE regact='Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 0px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of Liq + org

//****************************************************************************************************************

        //state29
        //incident + org + Treeplanting

        elseif ($part_solo == '0' && $org == '1' && $act_type=='Tree Planting' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT * FROM incident INNER JOIN organization ON organization.orgid = incident.orgid WHERE incact = 'Tree Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            $orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                $orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }

//*******************************************************************************************************************************


            //state30
            //mangrove + budget + org

            elseif($part_solo == '0' && $org == '1' && $act_type=='Mangrove Planting' && $orgchoose=='' && $bud_rep == '1' && $inc_rep == '0' && $liq_rep == '0'){
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Budget Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Budget Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT orgname, budsub, buddate, budamount, budstat, regact FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid WHERE regact='Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $budsublabel="Subject for the Budget";
            $buddatelable = "Date Issue";
            $budamountlable="Total Amount";
            $budstatlable="Status";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 180px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$buddatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$budstatlable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $budsub = $row["budsub"];
            $buddate = $row["buddate"];
            $budamount = $row["budamount"];
            $budstat = $row["budstat"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 1px solid #000000; width: 180px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$buddate.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budamount.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$budstat.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of org + budget

//*******************************************************************************************************************

        //state31
        //org+liquidation+Mangrove planting

        elseif ($part_solo == '0' && $org == '1' && $act_type=='Mangrove Planting' && $orgchoose=='' && $liq_rep == '1' && $bud_rep == '0' && $inc_rep == '0') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Liquidation Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Liquidation Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT budsub, liqdate, liqamnt, liqtotal, liqstat, regact, orgname FROM organization as org INNER JOIN registration as reg ON org.orgid=reg.orgid 
            INNER JOIN budget as bud ON bud.regid=reg.regid INNER JOIN liquidation as liq ON liq.budcode=bud.budcode WHERE regact='Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';

            $budsublabel = "Subject for the Budget";
            $orgnamelabel = "Organization Name";
            $activitylable = "Activity";
            $liqstatuslabel="Status";
            $liqdatelable = "Date Issue";
            $liqamountlable="Total Amount";
            $totallable="Liquidated Amount";

            $tbl = $tbl . '
            <tr>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$orgnamelabel.'</td>
                <td style="border: 0px solid #ffffff; width: 190px;">'.$budsublabel.'</td>
                <td style="border: 0px solid #ffffff; width: 110px;">'.$activitylable.'</td>
                <td style="border: 0px solid #ffffff; width: 80px;">'.$liqdatelable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqstatuslabel.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$liqamountlable.'</td>
                <td style="border: 0px solid #ffffff; width: 90px;">'.$totallable.'</td>

            </tr>';

            while($row = mysqli_fetch_array($select_query)){
            $budsub = $row["budsub"];
            $orgname = $row["orgname"];
            $regact = $row["regact"];
            $liqstat = $row["liqstat"];
            $liqdate = $row["liqdate"];
            $liqamnt = $row["liqamnt"];
            $liqtotal = $row["liqtotal"];
        // -----------------------------------------------------------------------------

            $tbl = $tbl . '
      
                <tr>
                    <td style="border: 0px solid #000000; width: 110px;">'.$orgname.'</td>
                    <td style="border: 1px solid #000000; width: 190px;">'.$budsub.'</td>
                    <td style="border: 1px solid #000000; width: 110px;">'.$regact.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqdate.'</td>
                    <td style="border: 1px solid #000000; width: 80px;">'.$liqstat.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqamnt.'</td>
                    <td style="border: 1px solid #000000; width: 90px;">'.$liqtotal.'</td>
                </tr>';
            }

            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('org_report.pdf', 'I');
        } // end of Liq + org

//****************************************************************************************************************

        //state32
        //incident + org + Mangrove

        elseif ($part_solo == '0' && $org == '1' && $act_type=='Mangrove Planting' && $orgchoose=='' && $liq_rep == '0' && $bud_rep == '0' && $inc_rep == '1') {
            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Watershed Manager');
            $pdf->SetTitle('Incident Report');
            $pdf->SetSubject(' ');
            $pdf->SetKeywords(' ');

            $pdf->SetFont('times', 'R', 12);

            $pdf->AddPage('L');

            $txt = <<<EOD



        Plating Activity Management System

        Incident Report


EOD;

            $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }

            include 'database.php';

            define("DB_SERVER", "localhost");
            define("DB_USER", "root");
            define("DB_PASSWORD", "");
            define("DB_DATABASE", "baciwadb");

            $db_con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

            $query = "SELECT * FROM incident INNER JOIN organization ON organization.orgid = incident.orgid WHERE incact = 'Mangrove Planting' ";
            $select_query = mysqli_query($db_con,$query);

            $tbl = '<table style="width: 638px;" cellspacing="0">';
            
            $incnamelabel = "Name";
            $incdatelabel = "Date";
            $inctypelabel = "Type of Injuries";
            $incdesclabel = "Description";
            $incaddlabel = "Address";
            $incactlabel = "Activity";
            $orgnamelabel = "Organization";

            $tbl = $tbl . '
                  <tr>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$orgnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 120px;">'.$incnamelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 80px;">'.$incdatelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 90px;">'.$inctypelabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 160px;">'.$incdesclabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 130px;">'.$incaddlabel.'</td>
                      <td style="border: 1px solid #ffffff; width: 70px;">'.$incactlabel.'</td>
                  </tr>';


            while($row = mysqli_fetch_array($select_query)){
                $incname = $row["incname"];
                $incdate = $row["incdate"];
                $inctype = $row["inctype"];
                $incdesc = $row["incdesc"];
                $incadd = $row["incadd"];
                $incact = $row["incact"];
                $orgname = $row["orgname"];
  // -----------------------------------------------------------------------------
                $tbl = $tbl . '
                    <tr>
                        <td style="border: 1px solid #000000; width: 120px;">'.$orgname.'</td>
                        <td style="border: 1px solid #000000; width: 120px;">'.$incname.'</td>
                        <td style="border: 1px solid #000000; width: 80px;">'.$incdate.'</td>
                        <td style="border: 1px solid #000000; width: 90px;">'.$inctype.'</td>
                        <td style="border: 1px solid #000000; width: 160px;">'.$incdesc.'</td>
                        <td style="border: 1px solid #000000; width: 130px;">'.$incadd.'</td>
                         <td style="border: 1px solid #000000; width: 70px;">'.$incact.'</td>
                    </tr>';
                }  
            $tbl = $tbl . '</table>';
            $pdf->writeHTML($tbl, true, false, false, false, '');

            $pdf->Output('htmlout.pdf', 'I');
        }


    }//end sang Post


?>

            