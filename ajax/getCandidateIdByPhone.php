<?php
/*
 * GidiJobs
*/

$interface = new SecureAJAXInterface();

include ('lib/Candidates.php');

    if (!isset($_REQUEST['phone']))
    {
        die ('Invalid E-Mail address.');
    }
    
    $siteID = $interface->getSiteID();
    
    $phone = $_REQUEST['phone'];
    
    $candidates = new Candidates($siteID);
    
    $output = "<data>\n";
    
    $candidateID = $candidates->getIDByPhone($phone);
    
    if ($candidateID == -1)
    {
        $output .=
            "    <candidate>\n" .
            "        <id>-1</id>\n" .
            "    </candidate>\n";        
    }
    else
    {
        $candidateRS = $candidates->get($candidateID);
    
        $output .=
            "    <candidate>\n" .
            "        <id>"         . $candidateID . "</id>\n" .
            "        <name>"         . $candidateRS['candidateFullName'] . "</name>\n" .
            "    </candidate>\n";
    }
    $output .=
        "</data>\n";
    
    /* Send back the XML data. */
    $interface->outputXMLPage($output);
  
?>


