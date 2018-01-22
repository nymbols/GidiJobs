<?php
/*
 * GidiJobs
 * GidiJobs Optional Components List
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
 * $Id: OptionalComponents.php 2693 2007-07-12 16:55:36Z brian $
 */

//TODO:  Parse optional components in module zip files.

$optionalComponents['usZipCodes']['name'] = 'United States Zip Code Lookup';
$optionalComponents['usZipCodes']['description'] = 'This contains cities, states, and geographical locations for each zip code in the United States.';
$optionalComponents['usZipCodes']['installCode'] = '
    $schema = @file_get_contents(\'db/upgrade-zipcodes.sql\');
    MySQLQueryMultiple($schema);
    CATSUtility::changeConfigSetting(\'US_ZIPS_ENABLED\', "true");
';
$optionalComponents['usZipCodes']['removeCode'] = '
    MySQLQuery(\'DELETE FROM zipcodes\');
    CATSUtility::changeConfigSetting(\'US_ZIPS_ENABLED\', "false");
';
$optionalComponents['usZipCodes']['detectCode'] = '
    $rs = MySQLQuery(\'SELECT * FROM zipcodes\');

    if ($rs && mysql_fetch_row($rs))
    {
        return true;
    }
    else
    {
        return false;
    }
';

?>
