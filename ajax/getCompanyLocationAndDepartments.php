<?php
/*
 * GidiJobs
 * AJAX Company Location Interface
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
 * $Id: getCompanyLocationAndDepartments.php 2359 2007-04-21 22:49:17Z will $
 */

include_once('./lib/Companies.php');


$interface = new SecureAJAXInterface();

if (!$interface->isRequiredIDValid('companyID', false))
{
    $interface->outputXMLErrorPage(-1, 'Invalid company ID.');
    die();
}

$siteID = $interface->getSiteID();

$companyID = $_REQUEST['companyID'];

/* Get an array of the company's location data. */
$companies = new Companies($siteID);

$locationArray = $companies->getLocationArray($companyID);
if (empty($locationArray))
{
    $interface->outputXMLErrorPage(-2, 'No location data.');
    die();
}

/* Get departments. */
$departmentsRS = $companies->getDepartments($companyID);
$departmentsString = htmlspecialchars(
    ListEditor::getStringFromList($departmentsRS, 'name')
);

/* Send back the XML data. */
$interface->outputXMLPage(
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "    <address>"     . $locationArray['address'] . "</address>\n" .
    "    <city>"        . $locationArray['city'] . "</city>\n" .
    "    <state>"       . $locationArray['state'] . "</state>\n" .
    "    <zip>"         . $locationArray['zip'] . "</zip>\n" .
    "    <departments>" . $departmentsString . "</departments>\n" .
    "</data>\n"
);

?>
