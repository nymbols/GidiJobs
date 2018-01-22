<?php
/*
 * GidiJobs
 * AJAX New List Name Interface
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
 * $Id: deleteList.php 3198 2007-10-14 23:36:43Z will $
 */


include_once('./lib/StringUtility.php');
include_once('./lib/ActivityEntries.php');
include_once('./lib/SavedLists.php');


$interface = new SecureAJAXInterface();

if (!$interface->isRequiredIDValid('savedListID'))
{
    $interface->outputXMLErrorPage(-1, 'Invalid saved list ID.');
    die();
}

$siteID = $interface->getSiteID();

$savedListID = $_REQUEST['savedListID'];

$savedLists = new SavedLists($siteID);

/* Write changes. */
$savedLists->delete($savedListID);

$interface->outputXMLPage(
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "    <response>success</response>\n" .
    "</data>\n"
);

?>
