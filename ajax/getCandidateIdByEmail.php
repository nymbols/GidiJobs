<?php
/*
 * GidiJobs
 * AJAX Data Item Job Orders Interface
 *
 *
 *
 * $Id: getCandidateIdByEmail.php 3078 2007-09-21 20:25:28Z will $
 */

$interface = new SecureAJAXInterface();

include ('lib/Candidates.php');

if (!isset($_REQUEST['email']))
{
    die ('Invalid E-Mail address.');
}

$siteID = $interface->getSiteID();

$email = $_REQUEST['email'];

$candidates = new Candidates($siteID);

$output = "<data>\n";

$candidateID = $candidates->getIDByEmail($email);

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
