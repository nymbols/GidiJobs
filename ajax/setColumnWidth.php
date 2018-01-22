<?php
/*
 * GidiJobs
 * AJAX Column Resizing Interface
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
 * $Id: setColumnWidth.php 2373 2007-04-24 21:57:28Z will $
 */

$interface = new SecureAJAXInterface();

$instance = $_REQUEST['instance'];
$columnName = $_REQUEST['columnName'];
$columnWidth = $_REQUEST['columnWidth'];

$columnPreferences = $_SESSION['CATS']->getColumnPreferences($instance);

foreach ($columnPreferences as $index => $data)
{
    if ($data['name'] == $columnName)
    {
        $columnPreferences[$index]['width'] = $columnWidth;
    }
}

$_SESSION['CATS']->setColumnPreferences($instance, $columnPreferences);

$output =
    "<data>\n" .
    "    <errorcode>0</errorcode>\n" .
    "    <errormessage></errormessage>\n" .
    "</data>\n";

/* Send back the XML data. */
$interface->outputXMLPage($output);

?>
