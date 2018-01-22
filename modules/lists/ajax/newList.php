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
 * $Id: newList.php 3198 2007-10-14 23:36:43Z will $
 */


include_once('./lib/StringUtility.php');
include_once('./lib/ActivityEntries.php');
include_once('./lib/SavedLists.php');


$interface = new SecureAJAXInterface();

if (!$interface->isRequiredIDValid('dataItemType'))
{
    $interface->outputXMLErrorPage(-1, 'Invalid saved list type.');
    die();
}

if (!isset($_REQUEST['description']))
{
    $interface->outputXMLErrorPage(-1, 'Invalid name.');
    die();
}

$siteID = $interface->getSiteID();

$savedListName = $_REQUEST['description'];
$dataItemType = $_REQUEST['dataItemType'];

$savedLists = new SavedLists($siteID);

/* Validate the lists - if name is in use or name is blank, fail. */
if ($savedLists->getIDByDescription($savedListName) != -1)
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
$savedLists->newListName($savedListName, $dataItemType);

$interface->outputXMLPage(
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "    <response>success</response>\n" .
    "</data>\n"
);

?>
