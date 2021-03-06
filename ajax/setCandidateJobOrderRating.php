<?php
/*
 * GidiJobs
 * AJAX Pipeline Rating Interface
 *
*
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * $Id: setCandidateJobOrderRating.php 1479 2007-01-17 00:22:21Z will $
 */

include_once('./lib/Pipelines.php');


$interface = new SecureAJAXInterface();

if ($_SESSION['CATS']->getAccessLevel('pipelines.editRating') < ACCESS_LEVEL_EDIT)
{
    $interface->outputXMLErrorPage(-1, ERROR_NO_PERMISSION);
    die();
}

if (!$interface->isRequiredIDValid('candidateJobOrderID'))
{
    $interface->outputXMLErrorPage(-1, 'Invalid candidate-joborder ID.');
    die();
}

if (!$interface->isRequiredIDValid('rating', true, true) ||
    $_REQUEST['rating'] < -6 || $_REQUEST['rating'] > 5)
{
    $interface->outputXMLErrorPage(-1, 'Invalid rating.');
    die();
}

$siteID = $interface->getSiteID();

$candidateJobOrderID = $_REQUEST['candidateJobOrderID'];
$rating              = $_REQUEST['rating'];

$pipelines = new Pipelines($siteID);
$pipelines->updateRatingValue($candidateJobOrderID, $rating);

$newRating = $pipelines->getRatingValue($candidateJobOrderID);

$output =
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "    <newrating>" . $newRating . "</newrating>\n" .
    "</data>\n";

/* Send back the XML data. */
$interface->outputXMLPage($output);

?>
