<?php
/*
 * GidiJobs
 * Update 150 - rename executable attachment file names
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
 * $Id: 150.php 2359 2007-04-21 22:49:17Z will $
 */

function getAllFilesInDirectory150($directory)
{
    $files = array();

    $handle = @opendir($directory);
    if (!$handle)
    {
        return array();
    }

    while (($file = readdir($handle)) !== false)
    {
        if ($file != '.' && $file != '..')
        {
            $files[] = $file;
        }
    }

    closedir($handle);

    return $files;
}

function update_150($db)
{
    global $badFileExtensions;

    $attachments = $db->query('SELECT * FROM attachment');
    while ($attachment = mysql_fetch_assoc($attachments))
    {
        $fileExtension = substr(
            $attachment['stored_filename'],
            strrpos($attachment['stored_filename'], '.') + 1
        );

        if (!in_array($fileExtension, $badFileExtensions))
        {
            continue;
        }

        $oldFilename = $attachment['stored_filename'];
        $newFilename = $attachment['stored_filename'] . '.txt';

        $status = @rename(
            'attachments/' . $attachment['directory_name'] . '/' . $oldFilename,
            'attachments/' . $attachment['directory_name'] . '/' . $newFilename
        );
        if ($status)
        {
            $db->query(
                'UPDATE attachment SET stored_filename = '
                . $db->makeQueryString($newFilename)
                . ' WHERE attachment_id = ' . $attachment['attachment_id']
            );
        }
    }
}


?>
