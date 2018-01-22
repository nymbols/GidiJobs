<?php
/*
 * GidiJobs
 * AJAX Edit List Name Interface
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
 * $Id: editListName.php 3198 2007-10-14 23:36:43Z will $
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

if (!isset($_REQUEST['savedListName']))
{
    $interface->outputXMLErrorPage(-1, 'Invalid name.');
    die();
}

$siteID = $interface->getSiteID();

$savedListID = $_REQUEST['savedListID'];
$savedListName = $_REQUEST['savedListName'];

$savedLists = new SavedLists($siteID);

/* Validate the lists - if name is in use or name is blank, fail. */
if ($savedLists->getIDByDescription($savedListName) != -1 && $savedLists->getIDByDescription($savedListName) != $savedListID)
{
    $interface->outputXMLPage(
        "<data>\n" .
        "    <errorcode>0</errorcode>\n" .
        "    <errormessage></errormessage>\n" .
        "    <response>collision</response>\n" .
        "</data>\n"
    );  
    die;  
}

if ($savedListName == '')
{
    $interface->outputXMLPage(
        "<data>\n" .
        "    <errorcode>0</errorcode>\n" .
        "    <errormessage></errormessage>\n" .
        "    <response>badName</response>\n" .
        "</data>\n"
    );  
    die;  
}

/* Write changes. */
$savedLists->updateListName($savedListID, $savedListName);

$interface->outputXMLPage(
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "    <response>success</response>\n" .
    "</data>\n"
);

?>
