<?php
/*
 * GidiJobs
 * Update 112- fix bad UTF8 filenames
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
 * $Id: 114.php 2359 2007-04-21 22:49:17Z will $
 */

function getAllFilesInDirectory($directory)
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

function update_114($db)
{
    $attachments = $db->query('SELECT * FROM attachment');
    while ($attachment = mysql_fetch_assoc($attachments))
    {
        $newFilename = $attachment['stored_filename'];
        for ($i = 0; $i < strlen($newFilename); $i++)
        {
            if (ord($newFilename[$i]) > 128 || ord($newFilename[$i]) < 32)
            {
                $newFilename[$i] = '_';
            }
        }

        if ((!file_exists('attachments/' . $attachment['directory_name'] . '/' . $attachment['stored_filename']) &&
             is_dir('attachments/' . $attachment['directory_name'])) ||
            $newFilename != $attachment['stored_filename'])
        {
            $filesInDirectory = getAllFilesInDirectory('attachments/'.$attachment['directory_name'].'/');
            if (count($filesInDirectory) == 1)
            {
                rename ('attachments/'.$attachment['directory_name'].'/'.$filesInDirectory[0], 'attachments/'.$attachment['directory_name'].'/'.$newFilename);
                $db->query('UPDATE attachment SET stored_filename = "' . addslashes($newFilename) . '" WHERE attachment_id = '.$attachment['attachment_id']);
            }
        }
    }
}

?>
