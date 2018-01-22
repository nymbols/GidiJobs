<?php
/*
 * GidiJobs
 * Attachments Reindexing Tool
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
 */

include_once('./config.php');
include_once('./lib/DatabaseConnection.php');
include_once('./lib/ModuleUtility.php');

if (file_exists('INSTALL_BLOCK'))
{
    $interface = new SecureAJAXInterface();
}

set_time_limit(0);
@ini_set('memory_limit', '256M');

$reindexed = 0;

include_once('lib/Attachments.php');

if (file_exists('INSTALL_BLOCK') && ($_SESSION['CATS']->getAccessLevel(ACL::SECOBJ_ROOT) < ACCESS_LEVEL_SA))
{
    die('No permision.');
}

$db = DatabaseConnection::getInstance();
 
$rs = $db->getAllAssoc('SELECT site_id, attachment_id, directory_name, stored_filename FROM attachment WHERE text = "" OR isnull(text) AND resume = 1');

foreach ($rs as $index => $data)
{
    /* Attempt to reindex file. */
    $storedFilename = './attachments/'.$data['directory_name'].'/'.$data['stored_filename'];
    
    $documentToText = new DocumentToText();
    $documentType = $documentToText->getDocumentType(
        $storedFilename
    );

    $fileContents = @file_get_contents($storedFilename);

    /* If we're creating a file from text contents, we can skip
     * extracting because we already know the text contents.
     */
    if ($fileContents !== false && $documentType == DOCUMENT_TYPE_TEXT)
    {
        $extractedText = $fileContents;
    }
    else if (!file_exists($storedFilename))
    {
        /* Can't extract text from a file that doesn't exist. */
        $extractedText = '';
    }
    else
    {
        $documentToText->convert($storedFilename, $documentType);

        if (!$documentToText->isError())
        {
            $extractedText = $documentToText->getString();
            
            $reindexed++;
            
            $db->query('UPDATE attachment SET text = '.$db->makeQueryString($extractedText).' WHERE attachment_id = '.$data['attachment_id']);
        }
    }
}

echo ($reindexed);

?>
