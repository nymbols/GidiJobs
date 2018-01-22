<?php
/*
 * GidiJobs
 * AJAX Backup interface
 *
*
 *
 *
 *
 * Version 1.1 (the "License"); you may not use this file except in
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
 * $Id: processMassImportItem.php 2359 2007-04-21 22:49:17Z will $
 */


include_once('lib/Attachments.php');

$interface = new SecureAJAXInterface();

if (!isset($_SESSION['CATS']->massImportFiles) ||
    !isset($_SESSION['CATS']->massImportDirectory))
{
    die ('No mass import in progress.');
}

if (count($_SESSION['CATS']->massImportFiles) == 0)
{
    die ('done');
}

$dups = 0;
$success = 0;
$processed = 0;
// FIXME: Count failures.

for ($i = 0; $i < 50; ++$i)
{
    if (count($_SESSION['CATS']->massImportFiles) == 0)
    {
        continue;
    }
    
    $fileName = array_pop($_SESSION['CATS']->massImportFiles);

    $fullFilename = $_SESSION['CATS']->massImportDirectory . '/' . $fileName;

    $attachmentCreator = new AttachmentCreator($_SESSION['CATS']->getSiteID());
    $attachmentID = $attachmentCreator->createFromFile(
        DATA_ITEM_BULKRESUME, 0, $fullFilename, false, '', true, true
    );

    if ($attachmentCreator->isError())
    {
        //Nothing
    }
    else if ($attachmentCreator->isTextExtractionError())
    {
        //Nothing
    }
    else if ($attachmentCreator->duplicatesOccurred())
    {
        ++$dups;
    }
    else
    {
        ++$success;
    }
    
    ++$processed;
}

echo $dups, ',', $success, ',', $processed;

?>
